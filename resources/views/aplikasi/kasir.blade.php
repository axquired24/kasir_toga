@extends('layouts.apphome')
@section('title' ,'Kasir')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="content">
                    <div class="form-group">
                        <label>Kode / Nama Barang</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Kode / Nama Barang">
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-fill btn-primary">Cari</button>
                            </div>
                        </div>
                        <small class="help-block text-muted">
                            <i class="fa fa-info"></i> Masukkan dan tekan enter
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div> {{-- .row --}}

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Daftar Belanja</h4>
                </div>
                <div class="content">
                    <div class="form-group">
                        <label>Nama Member</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Nama Member (#no)" value="Member #001">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-danger">Ubah</button>
                                <button type="submit" class="btn btn-fill btn-danger">Lanjutkan <span class="fa fa-chevron-right"></span></button>
                            </div>
                        </div>
                    </div>

                    <div id="tablecontent">
                    <table class="table table-responsive table-striped table-hover">
                        <thead>
                            <th>No</th>
                            <th>Produk</th>
                            <th>Qty</th>
                            <th>Subtotal</th>
                            <th>Opsi</th>
                        </thead>
                        <tbody>
                            @for($i=0; $i<10; $i++)
                            <tr>
                                <td>asdasd 01</td>
                                <td>asdasd 02</td>
                                <td>asdasd 03</td>
                                <td>asdasd 04</td>
                                <td><a href="javascript:refreshTable()" class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus"><span class="fa fa-remove"></span></a></td>
                            </tr>
                            @endfor
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div> {{-- .row --}}
</div>{{--  container-fluid --}}

@push('jscode')
<script>
    $('#menukasir').addClass('active');
    
    <?php 
        $rute = \Route::getCurrentRoute()->getPath();
    ?>
    function refreshTable () {
        $('#tablecontent').load(' {{ env("APP_URL") . $rute }} #tablecontent ');
    }
</script>
@endpush
@endsection