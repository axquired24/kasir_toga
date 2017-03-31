<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use App\Models\AccountTransaction;
use App\Models\Invoice;
use Datatables;
use DB;
use Redirect;
use App\Repo\Repo;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function __construct(Repo $repo)
    {
        // Get Repo
        $this->repo     = $repo;
    }

    public function listView($list, Request $request)
    {
    	switch ($list) {
    		case 'add':
    			if(isset($request['submit'])) {
                    // Cek ada gambar
                    $data['notifikasi']     = array('cls' => 'success', 'text' => 'Member berhasil ditambahkan');
                    $data['success_url']    = 'app/member/list'; // Redirect after success
                    $data['post_url']       = 'app/member/add';
                    $data['is_new']         = true;
                    $data['id']             = null;
                    return $this->saveMember($data, $request);
    			}
                // else
    			return view('member.add');
    			break;

    		case 'edit':
                if(isset($request['submit'])) {
                    // Cek ada gambar
                    $data['notifikasi']     = array('cls' => 'success', 'text' => 'Member berhasil diupdate');
                    $data['success_url']    = 'app/member/list'; // Redirect after success
                    $data['post_url']       = 'app/member/edit?member_id='.$request['id'];
                    $data['id']             = $request['id'];
                    $data['is_new']         = false;

                    return $this->saveMember($data, $request);
                }

                $member_id     = $_GET['member_id'];
                return view('member.edit', [
                        'member' => User::find($member_id),
                    ]);
    			break;

            case 'delete':
                $id         = $request['id'];
                $member    = User::find($id);
                // Cek di Invoice
                $inv    = Invoice::where('user_id', $member->id)->first();
                if(isset($inv->id)) {
                    return 'Member tidak dapat dihapus karena tersambung dengan data berikut: History Pembelian';
                }

                if($member->profile_image != ''){
                    $del_media  = $this->deleteMedia($member->profile_image);
                }

                $member->delete();
                return $member->name . ' berhasil dihapus.';
                break;

            case 'detail':
                $member_id     = $_GET['member_id'];
                return view('member.detail', [
                        'member' => User::find($member_id),
                    ]);
                break;

            case 'tambahSaldo':
                $tambah     = (int) str_replace(',', '', $request['nabung']);
                $user_id    = $request['userId'];
                $proses = $this->tambahSaldo($user_id, $tambah);
                $ret = array(
                        'status'        => 'sukses',
                        'saldoSekarang' => number_format($proses, 0,'.', ','),
                    );
                return \Response::json($ret);
                break;

            case 'kurangiSaldo':
                $kurang     = (int) str_replace(',', '', $request['nabung']);
                $user_id    = $request['userId'];

                // Cek saldo, harus lebih besar dari dikurangi
                $user       = User::find($user_id);
                if($user->saldo < $kurang) {
                    $ret = array(
                        'status'        => 'Gagal, saldo tidak cukup.',
                        'saldoSekarang' => number_format($user->saldo, 0,'.', ','),
                    );
                    return \Response::json($ret);
                }

                $proses = $this->kurangiSaldo($user_id, $kurang);
                $ret = array(
                        'status'        => 'sukses',
                        'saldoSekarang' => number_format($proses, 0,'.', ','),
                    );
                return \Response::json($ret);
                break;

            case 'tabungan':
                return view('member.tabungan');
                break;

    		default:
    			return view('member.list');
    			break;
    	} // end switch
    }

    public function listData(Request $request)
    {
    	// Just to display mysql num rows, add this code
		DB::statement(DB::raw('set @rownum=0'));
		$table 	= User::select([DB::raw('@rownum := @rownum + 1 AS rownum'),
					'users.*'
					// Or Select all with table.*
					])
					->get();
        // if(isset)
		$datatables = Datatables::of($table);
		if($keyword = $request->get('search')['value'])
		{
			$datatables->filterColumn('rownum', 'whereRaw', '@rownum + 1 like ?', ["%{$keyword}%"]);
		}

	    return $datatables
	    		->editColumn('name', function($table) {
                    $ret_add = '';
                    if($table->profile_image != '') {
                        $ret_add = '<div class="pull-right"><img style="height: 40px" src="'.url('memberfiles/thumb-'.$table->profile_image).'" alt="Profile Picture"></div>';
                    }
	    			return stripslashes($table->name) . $ret_add . '<br><small class="text-muted">Nama Ibu: '. stripslashes($table->mothers_name) .'</small>';
	    		})
                ->editColumn('saldo', function($table) {
                    return 'Rp ' . number_format($table->saldo, 0, '.',',');
                })
	    		->addColumn('action', function($table){
	    			return
	    			'<a title="hapus" href="javascript:" onclick="deleteBtn('.$table->id.', \''.$table->name.'\')" class="btn btn-fill btn-xs btn-danger"><span class="fa fa-remove"></span></a>
    				<a title="Ubah" href="'.url("app/member/edit?member_id=".$table->id).'" class="btn btn-xs btn-primary"><span class="fa fa-pencil"></span></a>
                    <a title="Detail: '.$table->name.'" href="'.url("app/member/detail?member_id=".$table->id).'" class="btn btn-xs btn-success"><span class="fa fa-file-text"></span></a>';
	    		})
	    		->make(true);
    }

    public function tabunganData(Request $request)
    {
        // Just to display mysql num rows, add this code
        DB::statement(DB::raw('set @rownum=0'));
        $table  = User::select([DB::raw('@rownum := @rownum + 1 AS rownum'),
                    'users.*'
                    // Or Select all with table.*
                    ])
                    ->get();
        // if(isset)
        $datatables = Datatables::of($table);
        if($keyword = $request->get('search')['value'])
        {
            $datatables->filterColumn('rownum', 'whereRaw', '@rownum + 1 like ?', ["%{$keyword}%"]);
        }

        return $datatables
                ->editColumn('name', function($table) {
                    $ret_add = '';
                    if($table->profile_image != '') {
                        $ret_add = '<div class="pull-right"><img style="height: 40px" src="'.url('memberfiles/thumb-'.$table->profile_image).'" alt="Profile Picture"></div>';
                    }
                    return stripslashes($table->name) . $ret_add . '<br><small class="text-muted">Nama Ibu: '. stripslashes($table->mothers_name) .'</small>';
                })
                ->editColumn('saldo', function($table) {
                    $saldo      = 'Rp ' . number_format($table->saldo, 0, '.',',');
                    $ret_add    = '&nbsp; <a title="Tambah Saldo" href="javascript:ubahSaldoBtn(\'tambahSaldo\','.$table->id.', \''.$table->name.'\', \''.$saldo.'\')" class="btn btn-fill btn-xs btn-success"><span class="fa fa-plus"></span></a>
                    <a title="Kurangi Saldo" href="javascript:ubahSaldoBtn(\'kurangiSaldo\','.$table->id.', \''.$table->name.'\', \''.$saldo.'\')" class="btn btn-fill btn-xs btn-danger"><span class="fa fa-minus"></span></a>';
                    return 'Rp ' . number_format($table->saldo, 0, '.',',') . $ret_add;
                })
                ->addColumn('action', function($table){
                    return
                    '<a target="blank" title="Histori Transaksi: '.$table->name.'" href="'.url("app/member/detail?member_id=".$table->id).'" class="btn btn-sm btn-success"><span class="fa fa-file-text"></span>&nbsp; Histori Transaksi</a>';
                })
                ->make(true);
    }

    public function cekSaldo($user_id)
    {
        $user = User::find($user_id);
        return $user->saldo;
    }

    public function tambahSaldo($user_id, $tambah)
    {
        $user = User::find($user_id);
        $user->saldo += $tambah;
        $user->save();
        $this->tambahTransaksiAkun($user_id, $tambah, 'Top up tabungan');
        return $user->saldo;
    }

    public function kurangiSaldo($user_id, $kurang)
    {
        $user = User::find($user_id);
        $user->saldo -= $kurang;
        $user->save();
        $tambah = -1 * $kurang;
        $this->tambahTransaksiAkun($user_id, $tambah, 'ambil tabungan');
        return $user->saldo;
    }

    public function tambahTransaksiAkun($user_id, $nominal, $keterangan)
    {
        // Masuk ke users table (db) -> saldo
        $account_trn    = new AccountTransaction();
        $account_trn->user_id   = $user_id;
        $account_trn->nominal   = $nominal;
        $account_trn->keterangan = $keterangan;
        $account_trn->save();
    }

    // INTERNAL REPOSITORY --------------------------------------------------------------------------
    public function deleteMedia($media_name, $path=null)
    {
            if($path == null) {
                $path   = public_path('memberfiles'.DIRECTORY_SEPARATOR);
            }

            $oldPath            = $path;
            $oldOriPath         = $oldPath . $media_name;
            $oldThumbPath       = $oldPath . 'thumb-' .$media_name;
            // Delete old file if exist | If new file success uploaded
            if (File::exists($oldOriPath)) {
                $del = File::delete($oldOriPath);
            }
            if (File::exists($oldThumbPath)) {
                $del = File::delete($oldThumbPath);
            }

            return true;
    }

    public function saveMember($data, Request $request)
    {
        $is_new         = $data['is_new'];
        $success_url    = $data['success_url'];
        $post_url       = $data['post_url'];
        $notifikasi     = $data['notifikasi'];
        $id             = $data['id'];

        $mediaform      = 'uploadmedia';

        // Validate Kode
        $ruleskode  = array(
        				'kode' => 'required|unique:users,kode',
        				'email' => 'unique:users,email',
        				);
        if($is_new == false) {
            $ruleskode  = array(
	        				'kode' => 'required|unique:users,kode,'.$request['id'],
	        				'email' => 'unique:users,email,'.$request['id'],
	        				);
        }

        $rules     = $ruleskode;

        $messages   = [
                        'kode.unique' => 'Kode Member sudah dipakai sebelumnya',
                        'email.unique' => 'Email Member sudah dipakai sebelumnya',
                    ];
        $validator = Validator::make($request->all(), $rules, $messages);

        // dd($validator);

        if ($validator->fails()) {
            return redirect($post_url)
                        ->withErrors($validator)
                        ->withInput();
        }

        // Validate Image
        if(isset($request[$mediaform]))
        {
            $rules     = [
                            $mediaform => 'required|mimes:png,gif,jpeg,jpg,bmp|max:8192',
                        ];

            $messages   = [
                            $mediaform.'.mimes' => 'Ekstensi File Gambar tidak didukung. Require(png,jpg,jpeg)',
                            $mediaform.'.required' => 'File Gambar bermasalah. Coba gambar lain/ kompres gambar dengan benar (Cek: Resolusi maksimal lebar&tinggi 2000pixel, file maksimal 8mb)',
                            $mediaform.'.max' => 'File gambar maksimal 8 MB',
                        ];
            $validator = Validator::make($request->all(), $rules, $messages);

            // dd($validator);

            if ($validator->fails()) {
                return redirect($post_url)
                            ->withErrors($validator)
                            ->withInput();
            }
        }

        // If new = create, if any = find
        if($is_new) {
            $user = new User;
        }
        else {
            $user = User::find($id);
        }

        // Image Path
        $path   = public_path('memberfiles'.DIRECTORY_SEPARATOR);
        if (!File::exists($path)) {
            $makeDir = File::makeDirectory($path, 0777, true, true);
        }

        // Image Processing
        if(isset($request[$mediaform])) {
            $oldPath            = $path;
            if(! $is_new) {
                $oldOriPath         = $oldPath . $user->profile_image;
                $oldThumbPath       = $oldPath . 'thumb-' .$user->profile_image;
            }

            // Image Processing New File
            $photo  = $request[$mediaform];
            $extension = $photo->getClientOriginalExtension();
            $allowed_filename = substr(md5(microtime()),rand(0,26),10) . "." . $extension;
            $icon_name      = 'thumb-' . $allowed_filename;

            $uploadSuccess1 = $this->repo->original( $photo, $allowed_filename, $path );
            $uploadSuccess2 = $this->repo->icon( $photo, $icon_name, $path );

            // UPDATE VALUE IN DATABASE
            $user->profile_image            = $allowed_filename;

            if(! $is_new) {
                // Delete old file if exist | If new file success uploaded
                if (File::exists($oldOriPath)) {
                    $del = File::delete($oldOriPath);
                }
                if (File::exists($oldThumbPath)) {
                    $del = File::delete($oldThumbPath);
                }
            }
        } // if isset $request
        // END Image Processing

        $user->kode              	= $request['kode'];
        $user->password             = bcrypt('123456');  // bcrypt($request['password']);
        if( isset($request['password']) ) {
            if($request['password'] != '') {
                $user->password             = bcrypt($request['password']);
            }
        }
        $user->level      			= 'member'; // $request['level'];
        $user->saldo  				= $request['saldo'];
        $user->name      			= addslashes($request['name']);
        if($request['email'] != '') {
            $user->email                = $request['email'];
        }
        $user->mothers_name     	= addslashes($request['mothers_name']);
        $user->address             	= $request['address'];
        $user->tempat_lahir        	= $request['tempat_lahir'];
        $user->born            		= $request['born'];
        $user->save();

        if($request['email'] == '') {
        	$user->email  = 'toga.' .$user->id .'@app.com'; // $request['email'];
        	$user->save();
        }

        // Jika tambah user baru
        if($is_new) {
                    $account_trn    = new AccountTransaction();
                    $account_trn->user_id   = $user->id;
                    $account_trn->nominal   = $request['saldo'];
                    $account_trn->keterangan = 'Saldo awal';
                    $account_trn->save();
        }

        return Redirect::to($success_url)->with('notifikasi', $notifikasi);
    }
}
