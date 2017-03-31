<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Cart;
use Datatables;
use DB;
use Redirect;
use Response;
use App\Models\AccountTransaction;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Option;
use App\Models\Transaction;
use App\Models\Invoice;
use App\User;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class CashierController extends Controller
{

    public function setOption(Request $request)
    {
        $option     = Option::find(1);
        if(isset($request['peringatan_stock'])) {
            $option->peringatan_stock = $request['peringatan_stock'];
            $option->profit_konsumen = $request['profit_konsumen'];
            $option->save();
            $notifikasi = array('cls' => 'succcess', 'text' => 'Pengaturan Toko berhasil diupdate');
            return \Redirect::to('app/settings')->with('notifikasi', $notifikasi);
        }

        return view('aplikasi.option', ['option' => $option]);
    }

    public function index()
    {
    	return view('aplikasi.kasir');
    }

    public function cart($action, Request $request)
    {
    	$kode 	= $request['kode'];
    	switch ($action) {
    		case 'add':
    			$getproduct 	= $this->getProduct($kode);
    			if($getproduct['tipe'] == 'single') {
    				$addcart 	= $this->addCart($getproduct['product']->id);
    				return Response::json('Berhasil masuk ke belanjaan');
    			}
    			break;

    		case 'delete':
    			$rowId 	= $request['rowId'];
    			$del 	= Cart::remove($rowId);
    			break;

            case 'total':
                $total  = Cart::total();
                return Response::json($total);
                break;

            case 'update_qty':
                $rowId  = $request['rowId'];
                $qty    = $request['qty'];
                $update_qty = Cart::update($rowId, $qty);
                return 'Update qty berhasil';
                break;

            case 'clear_cart':
                $clear  = Cart::destroy();
                return 'Hapus semua, berhasil';
                break;

    		default:
    			$carts 	= Cart::content();
    			$total 	= Cart::total();
    			$ret 	= array('carts' => $carts, 'total' => $total);
    			return Response::json($ret);
    			break;
    	}
    }

    public function getProduct_x(Request $request)
    {
        $namaOrKode     = $request['name'];
        $product        = $this->getProduct($namaOrKode);
        if($product['tipe'] == 'error') {
            $message    = 'Produk dengan nama/kode tersebut tidak ditemukan.';
            return Response::json(array(
                'code'      =>  404,
                'message'   =>  $message
            ), 404);
        }

        return Response::json($product);
    }

    public function getProduct($namaOrKode)
    {
    	// $namaOrKode 	= $request['name'];
    	$product 		= Product::where('kode', $namaOrKode)->first();
    	if(isset($product->kode)) {
    		$ret 	= array('tipe' => 'single', 'product' => $product);
    		return $ret;
    	}

        $product        = Product::where('name', 'like', '%'.$namaOrKode.'%')->take(7)->get();
        if(count($product) != 0) {
            $ret    = array('tipe' => 'multi', 'product' => $product);
            return $ret;
        }

    	$product 		= Product::where('kode', 'like', '%'.$namaOrKode.'%')->take(7)->get();
    	if(count($product) != 0) {
    		$ret 	= array('tipe' => 'multi', 'product' => $product);
    		return $ret;
    	}

    	// else
    	$ret 	= array('tipe' => 'error', 'product' => 'Produk tidak ditemukan');
    	return $ret;
    }

    public function addCart($product_id)
    {
    	$product 	= Product::find($product_id);
        $profit     = $product->selling_price - $product->buying_price;
    	Cart::add($product->id, $product->name , 1, $product->selling_price, ['profit' => $profit]);
        // $cart->options->profit;
    	return 'Berhasil ditambahkan ke cart';
    }

    public function getCart($list, Request $request)
    {
        $carts 		= collect();
        $content 	= Cart::content();
        $i 			= 1;

        switch ($list) {
            case 'listnolink':
                foreach ($content as $cart) {
                    $carts->push([
                        'rownum'     => $i++,
                        'name'       => $cart->name . '<br> <small>  Rp ' . number_format($cart->price, 0,'.', ',') . '</small>',
                        'price'      => $cart->price,
                        'qty'        => $cart->qty,
                        'subtotal'   => 'Rp ' .number_format($cart->subtotal, 0,'.', ','),
                        'rowId'      => $cart->rowId,
                    ]);
                }
                break;

            default:
                foreach ($content as $cart) {
                    $carts->push([
                        'rownum' 	 => $i++,
                        'name'       => $cart->name . '<br> <small>  Rp ' . number_format($cart->price, 0,'.', ',') . '</small>',
                        'price'      => $cart->price,
                        'qty'        => '<a href="javascript:updateCartQty(\''. $cart->rowId .'\', \''. $cart->name .'\', \''. $cart->qty .'\')" class="btn btn-fill btn-xs btn-primary" title="Ubah Qty">'. $cart->qty .'</span></a>',
                        'subtotal'   => 'Rp ' .number_format($cart->subtotal, 0,'.', ','),
                        'rowId'      => $cart->rowId,
                        'action' 	 => '<a href="javascript:deleteCart(\''. $cart->rowId .'\', \''. $cart->name .'\')" class="btn btn-xs btn-danger" title="Hapus"><span class="fa fa-remove"></span></a>',
                    ]);
                }
                break;
        }


        return Datatables::of($carts)
        	// ->editColumn('name', function($table) {
        	// 	return $table->name . '<br> <small> Rp' . number_format($table->price, 0,',', '.') . '</small>';
        	// })
        	->make(true);
    }

    public function checkout($option=null, Request $request)
    {
        $kode   = $request['kodeMember'];
        switch ($option) {
            case 'membercheck_x':
                $member = User::where('kode', $kode)->first();
                if(! isset($member->kode)) {
                    $message   = 'Member dengan kode tersebut tidak ditemukan';
                    return Response::json(array(
                        'code'      =>  404,
                        'message'   =>  $message
                    ), 404);
                }
                // else
                return Response::json($member);
                break;

            case 'bayar':
                $user_id        = $request['user_id'];
                $dibayar        = (int) str_replace(',', '', $request['bayar_input']);
                $carts          = Cart::content();
                $total_belanja  = (int) str_replace(',', '', Cart::total());

                // Hitung Total Profit
                $total_profit   = 0;
                foreach ($carts as $cart) {
                    $total_profit += $cart->options->profit;
                }
                // return dd('Total Profit: '.$total_profit. '<br> Total Belanja: '.Cart::total());

                // Cek Apakah Cart Kosong?
                if(count($carts) == 0) {
                    $notifikasi = array('cls' => 'warning', 'text' => 'Error. Belanjaan Kosong');
                    return back()->with('notifikasi', $notifikasi);
                }
                // Cek apakah uang pembayaran Cukup
                if($dibayar < $total_belanja) {
                    $notifikasi = array('cls' => 'warning', 'text' => 'Error. Uang yang dibayarkan tidak cukup');
                    return back()->with('notifikasi', $notifikasi);
                }

                // Jika tidak bukan member yang beli, profit toko = 100%, member 0%
                $profit_toko    = $total_profit;
                $profit_member  = 0;

                // Jika Member
                $userd = '';
                if($user_id != '') {
                    // Masuk ke account transaction table (db) -> cashback
                    $option   = Option::find(1);
                    $profit_member  = ($option->profit_konsumen * $total_profit) / 100;
                    $profit_toko    = $total_profit - $profit_member;
                    // Masuk ke users table (db) -> saldo
                    $account_trn    = new AccountTransaction();
                    $account_trn->user_id   = $user_id;
                    $account_trn->nominal   = $profit_member;
                    $account_trn->keterangan = 'Pemasukan belanja';
                    $account_trn->save();

                    // Tambahkan profit ke saldo user
                    $userd  = User::find($user_id);
                    $userd->saldo += $profit_member;
                    $userd->save();
                }

                // Masuk ke transaction table
                $form_id    = str_random();
                foreach($carts as $cart) {
                    $trn    = new Transaction();
                    $trn->product_id = $cart->id;
                    $trn->product_name = $cart->name;
                    $trn->form_id = $form_id;
                    $trn->qty = $cart->qty;
                    $trn->subtotal = $cart->qty * $cart->price;
                    $trn->save();

                    // Kurangi setiap produk dari stok
                    $product    = Product::find($trn->product_id);
                    $product->stock -= $trn->qty;
                    $product->save();
                }

                // Masuk ke invoice table
                $inv    = new Invoice();
                $inv->transaction_form_id   = $form_id;
                if($user_id != ''){
                    $inv->user_id               = $user_id;
                }
                $inv->transaction_total     = $total_belanja;
                $inv->profit_toko           = $profit_toko;
                $inv->profit_member         = $profit_member;
                // dd($inv);
                $inv->save();
                // Generate Invoice Code
                $updInvoice = Invoice::find($inv->id);
                $updInvoice->invoice_code       = 'INV/' . date('dmy/') . $updInvoice->id;
                $updInvoice->save();

                // Jika Member Masukkan invoice_id ke member
                if($user_id != '') {
                    $account_trn->invoice_id   = $inv->id;
                    $account_trn->save();
                }

                // Clear Cart
                Cart::destroy();

                return view('aplikasi.checkout', [
                            'total_belanja' => $total_belanja,
                            'dibayar'       => $dibayar,
                            'carts'         => $carts,
                            'profit_member' => $profit_member,
                            'trn'           => Transaction::where('form_id', $inv->transaction_form_id)->get(),
                            'user'       => $userd,
                            ]);
                // Redirect ke Ringkasan with Kembalian
                break;

            default:
                return view('aplikasi.checkout');
                break;
        }
    }
}
