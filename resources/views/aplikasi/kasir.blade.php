@extends('layouts.apphome')
@section('title' ,'Kasir - Daftar Belanja')
@section('content')
{{-- {{ dd(\Cart::content()) }} --}}
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="box box-success">
                <div class="box-header">
                    <h4 class="box-title">Daftar Belanja &nbsp;</h4>
                    <div class="pull-right">
                        <a href="javascript:clearCart()" class="btn btn btn-danger"><span class="fa fa-remove"></span> Hapus Semua</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="content">
                    <div id="tablecontent">
                    <table class="table table-responsive table-striped table-hover" id="datatable">
                        <thead>
                            <th>No</th>
                            <th>Produk</th>
                            <th>Qty</th>
                            <th>Subtotal</th>
                            <th>Opsi</th>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-header">
                    <h4 class="title">Aksi Kasir</h4>
                </div>
                <div class="content">
                    <div class="form-group">
                        <label>Tambah Barang</label>
                        <form method="post" action="" id="kasirform">
                        <div class="input-group">
                            <input type="text" id="nameOrKode" class="form-control input-lg" placeholder="Kode / Nama Barang">
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-lg btn-fill btn-primary">Cari</button>
                            </div>
                        </div>
                        </form>
                    </div>
                    <div class="form-group">
                        <form method="post" action="" id="memberForm">
                        <div class="form-group">
                            <label><span id="namaMember">Punya Nomor Member?</span></label>
                            <div class="input-group">
                                <input id="kodeMember" type="text" class="form-control" placeholder="Masukkan Kode Member">
                                <div class="input-group-btn">
                                    {{-- <button type="button" class="btn btn-danger"><span class="fa fa-pencil"></span></button> --}}
                                    <button type="submit" class="btn btn-fill btn-success">Cek</button>
                                </div>
                            </div>
                            {{-- <small class="help-block">Ubah kode member?</small> --}}
                        </div>
                        </form>
                    </div>

                    <hr>
                    <h3>Total : Rp <span id="totalbayar">{{ \Cart::total() }}</span></h3>
                    <div class="form-group">
                        <label>Pembayaran</label>
                        <form method="post" action="{{ url('app/checkout/bayar') }}" id="bayarform">
                        {{ csrf_field() }}
                        <div class="input-group">
                            <input type="text" id="bayarInput" name="bayar_input" class="form-control input-lg" placeholder="Nominal Bayar" required>
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-lg btn-fill btn-danger">Bayar</button>
                            </div>
                        </div>
                        <input type="hidden" id="userID" name="user_id">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> {{-- .row --}}
</div>{{--  container-fluid --}}

@push('jscode')
<script src="{{ url('assets/numeraljs/numeral.min.js') }}"></script>
@include('aplikasi.kasir_inc')
@endpush

@push('modalcode')
<!-- Modal -->
{{-- harusnya .modal.fade --}}
<div class="modal" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="cartModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="cartModalLabel">Modal title</h4>
      </div>
      <div class="modal-body" id="cartModalContent">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endpush
@endsection