<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Datatables;
use DB;
use Redirect;
use Response;
// use App\Models\AccountTransaction;
use App\Models\Product;
// use App\Models\ProductCategory;
use App\Models\Option;
use App\Models\Transaction;
use App\Models\Invoice;
use App\User;

class LaporanController extends Controller
{
    public function listView($list, Request $request)
    {
    	$listdua 	= '';
    	if(isset($_GET['paramdua'])){
    	  	$listdua 	= $_GET['paramdua'];
    	}
    	
    	switch ($list) {
    		case 'invoice':
    			return view('laporan.invoice');
    			break;

    		case 'transaksi':
    			if($listdua == 'pilihrange') {
    				return view('laporan.transaksi-pilihrange');
    			}
    			// else
    			return view('laporan.transaksi-pilihrange');
    			break;

    		default:
    			return view('laporan.invoice');
    			break;
    	}
    }

    public function invoiceData(Request $request)
    {
    	// Just to display mysql num rows, add this code
		DB::statement(DB::raw('set @rownum=0'));
		$table 	= Invoice::select([DB::raw('@rownum := @rownum + 1 AS rownum'),
					'invoices.*',
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
	    	->addColumn('transactions', function($table) {
	    		$transactions = Transaction::where('form_id', $table->transaction_form_id)->get();
	    		$ret = '';
	    		foreach($transactions as $trn) {
	    			$ret .= $trn->product->name . ' ('.$trn->qty.' pcs)<br>';
	    		}
	    		return $ret;
	    	})
	    	->editColumn('user_id', function($table) {
	    		$ret = 'Bukan member';
	    		if($table->user_id != 0) {
	    			$ret = $table->user->name;
	    		}
	    		return $ret;
	    	})
	    	->editColumn('transaction_total', function($table) {
	    		return 'Rp ' . number_format($table->transaction_total, 0, '.', ',');
	    	})
	    	->editColumn('created_at', function($table) {
	    		return date_format($table->created_at, 'd F Y (H:i:s)');
	    	})
	    		// ->editColumn('created_at', function($table) {
	    		// 	return 'Rp ' . number_format($table->selling_price, 0, ',','.');
	    		// })
       //          ->editColumn('transaction_total', function($table) {
       //              if($table->stock <= $this->opt->peringatan_stock) {
       //                  return '<a href="javascript:chgStock('.$table->id.', \''.$table->name.'\', \''.$table->stock.'\')" class="btn btn-xs btn-fill btn-danger" data-toggle="tooltip" data-placement="top" title="Lebih sedikit dari batas stok. Klik untuk ubah">'.$table->stock.'</a>';
       //              }
       //                  return '<a href="javascript:chgStock('.$table->id.', \''.$table->name.'\', \''.$table->stock.'\')" class="btn btn-xs btn-fill btn-success">'.$table->stock.'</a>';
       //          })
	    		// ->addColumn('action', function($table){
	    		// 	return
	    		// 	'<a title="hapus" href="javascript:" onclick="deleteBtn('.$table->id.', \''.$table->name.'\')" class="btn btn-fill btn-xs btn-danger"><span class="fa fa-remove"></span></a>
	    		// 		<a title="Ubah" href="'.url("app/product/edit?product_id=".$table->id).'" class="btn btn-xs btn-primary"><span class="fa fa-pencil"></span></a>';
	    		// })
	    		->make(true);
    }
}
