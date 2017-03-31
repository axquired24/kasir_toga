@extends('layouts.apphome')
@section('title' ,'Pengaturan Toko')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header">
                    <h4 class="box-title">Pengaturan Toko &nbsp;</h4>
                </div>
                <div class="content">
                    <form method="post" action="{{ url('app/settings') }}" id="form">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Batas Peringatan Stok</label>
                            <input type="number" name="peringatan_stock" class="form-control" placeholder="Peringatan Stok" value="{{ $option->peringatan_stock }}" required>
                            <small class="help-block text-muted">
                                <i class="fa fa-info"></i> Jika stok kurang dari atau sama dengan batas, maka akan berwarna merah di daftar produk
                            </small>
                    </div> {{-- form-group --}}

                    <div class="form-group">
                        <label>Profit Konsumen (dalam %)</label>
                            <input type="number" name="profit_konsumen" class="form-control" placeholder="Profit konsumen (Angka Saja)" value="{{ $option->profit_konsumen }}" required>
                            <small class="help-block text-muted">
                                <i class="fa fa-info"></i> Pelanggan akan mendapatkan cashback sebesar (nominal)% setiap pembelian
                            </small>
                            <?php 
                                $total_belanja  = 100000;
                                $keuntungan     = (10 * $total_belanja)/100;
                                $cashback       = ($option->profit_konsumen * $keuntungan) / 100;
                                $profit         = $keuntungan - $cashback;
                            ?>
                            <div class="well">
                            <span class="help-block">* Simulasi: 
                                <br> Untuk Total Belanja <b>Rp {{ number_format($total_belanja, '0', '.', ',') }}</b>
                                <br> Contoh 10% Keuntungan Total Rp <b>Rp {{ number_format($keuntungan, '0', '.', ',') }}</b>
                                <br> Cashback (Profit Member <b>{{ $option->profit_konsumen }}%</b>) : Rp {{ number_format($cashback, '0', '.', ',') }}
                                <br> Profit Toko : Rp {{ number_format($profit, '0', '.', ',') }}
                            </span>
                            </div>
                    </div> {{-- form-group --}}

                    <button type="submit" class="btn btn-lg btn-success">Simpan Pengaturan</button>
                    </form>
                </div>
            </div>
        </div>
    </div> {{-- .row --}}
</div>{{--  container-fluid --}}
@endsection