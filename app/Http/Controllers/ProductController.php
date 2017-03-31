<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Datatables;
use DB;
use Redirect;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Option;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

// Image Repo
use App\Repo\Repo;

class ProductController extends Controller
{
    public function __construct(Repo $repo, Option $option)
    {
        // Get Repo
        $this->repo     = $repo;
        $this->opt  = $option::find(1);
    }

    public function listView($list, Request $request)
    {
    	switch ($list) {
    		case 'add':
    			if(isset($request['submit'])) {
                    // Cek ada gambar
                    $data['notifikasi']     = array('cls' => 'success', 'text' => 'Produk berhasil ditambahkan');
                    $data['success_url']    = 'app/product/list'; // Redirect after success
                    $data['post_url']       = 'app/product/add';
                    $data['is_new']         = true;
                    $data['id']             = null;
                    return $this->saveProduct($data, $request);
    			}

    			return view('product.add', [
    					'categories' => ProductCategory::all(),
    				]);
    			break;

    		case 'edit':
                if(isset($request['submit'])) {
                    // Cek ada gambar
                    $data['notifikasi']     = array('cls' => 'success', 'text' => 'Produk berhasil diupdate');
                    $data['success_url']    = 'app/product/list'; // Redirect after success
                    $data['post_url']       = 'app/product/edit?product_id='.$request['id'];
                    $data['id']             = $request['id'];
                    $data['is_new']         = false;

                    return $this->saveProduct($data, $request);
                }

                $product_id     = $_GET['product_id'];
                return view('product.edit', [
                        'categories' => ProductCategory::all(),
                        'product' => Product::find($product_id),
                    ]);
    			break;

            case 'delete':
                $id         = $request['id'];
                $product    = Product::find($id);
                $del_media  = $this->deleteMedia($product->product_image);
                if($del_media) {
                    $product->delete();
                }
                return $product->name . ' berhasil dihapus.';
                break;

            case 'chg_stock':
                if(isset($request['id'])) {
                    $product            = Product::find($request['id']);
                    $product->stock     = $request['stock'];
                    $product->save();
                    return 'Stok '. $product->name . ' berhasil diupdate';
                }
                break;

    		default:
    			return view('product.list');
    			break;
    	} // end switch
    }

    public function listData(Request $request)
    {
    	// Just to display mysql num rows, add this code
		DB::statement(DB::raw('set @rownum=0'));
		$table 	= Product::select([DB::raw('@rownum := @rownum + 1 AS rownum'),
					'products.*', 'product_categories.name as category_name'
					// Or Select all with table.*
					])
					->join('product_categories', 'products.product_category_id', '=', 'product_categories.id')
					->get();
        // if(isset)
		$datatables = Datatables::of($table);
		if($keyword = $request->get('search')['value'])
		{
			$datatables->filterColumn('rownum', 'whereRaw', '@rownum + 1 like ?', ["%{$keyword}%"]);
		}

	    return $datatables
	    		->editColumn('selling_price', function($table) {
	    			return 'Rp ' . number_format($table->selling_price, 0, ',','.');
	    		})
                ->editColumn('stock', function($table) {
                    if($table->stock <= $this->opt->peringatan_stock) {
                        return '<a href="javascript:chgStock('.$table->id.', \''.$table->name.'\', \''.$table->stock.'\')" class="btn btn-xs btn-fill btn-danger" data-toggle="tooltip" data-placement="top" title="Lebih sedikit dari batas stok. Klik untuk ubah">'.$table->stock.'</a>';
                    }
                        return '<a href="javascript:chgStock('.$table->id.', \''.$table->name.'\', \''.$table->stock.'\')" class="btn btn-xs btn-fill btn-success">'.$table->stock.'</a>';
                })
	    		->addColumn('action', function($table){
	    			return
	    			'<a title="hapus" href="javascript:" onclick="deleteBtn('.$table->id.', \''.$table->name.'\')" class="btn btn-fill btn-xs btn-danger"><span class="fa fa-remove"></span></a>
	    				<a title="Ubah" href="'.url("app/product/edit?product_id=".$table->id).'" class="btn btn-xs btn-primary"><span class="fa fa-pencil"></span></a>';
	    		})
	    		->make(true);
    }

    public function listCategoryView($list, Request $request)
    {
    	switch ($list) {
            case 'add':
                if(isset($request['name'])) {
                    $category           = new ProductCategory;
                    $category->name     = $request['name'];
                    $category->save();
                    return $category->name . ' berhasil dimasukkan';
                }
                break;

            case 'edit':
                if(isset($request['id'])) {
                    $category           = ProductCategory::find($request['id']);
                    $category->name     = $request['name'];
                    $category->save();
                    return $category->name . ': Kategori berhasil diupdate';
                }
                break;

            case 'delete':
                $id         = $request['id'];
                $product    = Product::where('product_category_id', $id)->first();
                $category   = ProductCategory::find($id);
                if(! isset($product->id)) {
                    $category->delete();
                    return 'Hapus Kategori '.$category->name.' Berhasil';
                }
                // else
                return 'GAGAL. Ada product dalam kategori '.$category->name;
                break;

    		default:
    			return view('product.category.list');
    			break;
    	}
    }

    public function listCategoryData(Request $request)
    {
    	// Just to display mysql num rows, add this code
		DB::statement(DB::raw('set @rownum=0'));
		$table 	= ProductCategory::select([DB::raw('@rownum := @rownum + 1 AS rownum'),
					'product_categories.*',
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
	    		->addColumn('action', function($table){
	    			return
	    			'<a title="hapus" href="javascript:" onclick="deleteBtn('.$table->id.', \''.$table->name.'\')" class="btn btn-fill btn-xs btn-danger"><span class="fa fa-remove"></span></a>
	    				<a title="Ubah" href="javascript:" onclick="editBtn('.$table->id.', \''.$table->name.'\')" class="btn btn-xs btn-primary"><span class="fa fa-pencil"></span></a>';
	    		})
	    		->make(true);
    }

    // INTERNAL REPOSITORY --------------------------------------------------------------------------
    public function deleteMedia($media_name, $path=null)
    {
            if($path == null) {
                $path   = public_path('productfiles'.DIRECTORY_SEPARATOR);
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

    public function saveProduct($data, Request $request)
    {
        $is_new         = $data['is_new'];
        $success_url    = $data['success_url'];
        $post_url       = $data['post_url'];
        $notifikasi     = $data['notifikasi'];
        $id             = $data['id'];

        $mediaform      = 'uploadmedia';

        // Validate Kode
        $ruleskode  = 'required|unique:products,kode';
        if($is_new == false) {
            $ruleskode  = 'required|unique:products,kode,'.$request['id'];
        }

        $rules     = [
                        'kode' => $ruleskode,
                    ];

        $messages   = [
                        'kode.unique' => 'Kode Produk sudah dipakai sebelumnya',
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
            $product = new Product;
        }
        else {
            $product = Product::find($id);
        }

        // Image Path
        $path   = public_path('productfiles'.DIRECTORY_SEPARATOR);
        if (!File::exists($path)) {
            $makeDir = File::makeDirectory($path, 0777, true, true);
        }

        // Image Processing
        if(isset($request[$mediaform])) {
            $oldPath            = $path;
            if(! $is_new) {
                $oldOriPath         = $oldPath . $product->product_image;
                $oldThumbPath       = $oldPath . 'thumb-' .$product->product_image;
            }

            // Image Processing New File
            $photo  = $request[$mediaform];
            $extension = $photo->getClientOriginalExtension();
            $allowed_filename = "i" . substr(md5(microtime()),rand(0,26),10) . "." . $extension;
            $icon_name      = 'thumb-' . $allowed_filename;

            $uploadSuccess1 = $this->repo->original( $photo, $allowed_filename, $path );
            $uploadSuccess2 = $this->repo->icon( $photo, $icon_name, $path );

            // UPDATE VALUE IN DATABASE
            $product->product_image            = $allowed_filename;

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

        $product->kode              = $request['kode'];
        $product->name              = $request['name'];
        $product->description       = $request['description'];
        $product->product_category_id   = $request['product_category_id'];
        $product->buying_price      = $request['buying_price'];
        $product->selling_price     = $request['selling_price'];
        $product->stock             = $request['stock'];
        $product->weight            = $request['weight'];
        $product->save();

        return Redirect::to($success_url)->with('notifikasi', $notifikasi);
    }
}

