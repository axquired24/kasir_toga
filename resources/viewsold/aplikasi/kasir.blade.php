@extends('layouts.apphome')
@section('title' ,'Kasir')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="header">
                    <h4 class="title">Daftar Belanja &nbsp;
                    <small><a href="javascript:clearCart()" class="btn btn-xs btn-danger pull-right"><span class="fa fa-remove"></span> Hapus Semua</a></small>
                    <div class="clearfix"></div>
                    </h4>
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
            <div class="card">
                <div class="header">
                    <h4 class="title">Aksi Kasir</h4>
                </div>
                <div class="content">
                    <div class="form-group">
                        <label>Kode / Nama Barang</label>
                        <form method="post" action="" id="kasirform">
                        <div class="input-group">
                            <input type="text" id="nameOrKode" class="form-control" placeholder="Kode / Nama Barang">
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-fill btn-primary">Cari</button>
                            </div>
                        </div>
                        </form>
                        <small class="help-block text-muted">
                            <i class="fa fa-info"></i> Masukkan dan tekan enter
                        </small>
                    </div>

                    <hr>
                    <h3>Total : Rp <span id="totalbayar">{{ \Cart::total() }}</span></h3>
                    <br>
                    <form method="post" action="" id="memberForm">
                    <div class="form-group">
                        <label>Punya Nomor Member?</label>
                        <div class="input-group">
                            <input id="kodeMember" type="text" class="form-control" placeholder="Masukkan Kode Member">
                            <div class="input-group-btn">
                                {{-- <button type="button" class="btn btn-danger"><span class="fa fa-pencil"></span></button> --}}
                                <button type="submit" class="btn btn-fill btn-danger">Bayar <span class="fa fa-chevron-right"></span></button>
                            </div>
                        </div>
                        {{-- <small class="help-block">Ubah kode member?</small> --}}
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div> {{-- .row --}}
</div>{{--  container-fluid --}}

@push('jscode')
<script>
    $('#menukasir').addClass('active');
    $('#nameOrKode').focus();
    getCartTotal();

    <?php
        $rute = \Route::getCurrentRoute()->getPath();
    ?>

    // function refreshTable () {
    //     $('#tablecontent').load(' {{ env("APP_URL") . $rute }} #tablecontent ');
    // }

    // Datatable View
    var datatable =
    $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ url("app/cart/list/x") }}',
        columns: [
            // { data: 'rownum', name: 'rownum', searchable: false },
            { data: 'rownum', name: 'rownum' },
            { data: 'name', name: 'name' },
            { data: 'qty', name: 'qty' },
            { data: 'subtotal', name: 'subtotal' },
            { data: 'action', name: 'action' },
        ],
        order: [ [0, 'asc'] ]
    });

    function deleteCart (rowId, title) {
        var check = confirm('Hapus belanjaan: '+title+ ' ?');
        if(check == false) {
            return
        }
        $.ajax({
            method: 'POST',
            url: '{{ url("app/cart/delete") }}',
            beforeSend: function (xhr) {
              return xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
            },
            data: {
                rowId: rowId,
             },
            success:function(data){
                datatable.ajax.reload();
                getCartTotal();
            },error:function(data){
                alert("Terjadi kesalahan: "+data);
            }
        });
    }

    // Tambah ke keranjang
    function addCart(kode){
        $.ajax({
            method: 'POST',
            url: '{{ url("app/cart/add") }}',
            beforeSend: function (xhr) {
              return xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
            },
            dataType: 'json',
            data: {
                kode: kode,
             },
            success:function(data){
                // alert(data);
                console.log(data);
                datatable.ajax.reload();
                getCartTotal();
            },error:function(data){
                // console.log(data.responseText[0]);
                var respon  = $.parseJSON(data.responseText);
                alert(respon.message);
            }
        });
    };

    function addCartFromMulti (kode) {
        $('#cartModal').modal('hide');
        addCart(kode);
    }

    // Tambah ke keranjang
    function getCartTotal(){
        $.ajax({
            method: 'POST',
            url: '{{ url("app/cart/total") }}',
            beforeSend: function (xhr) {
              return xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
            },
            // dataType: 'json',
            data: {
                // kode: kode,
             },
            success:function(data){
                $('#totalbayar').html(data);
            },error:function(data){
            }
        });
    };

    function updateCartQty (rowId, name, qty) {
        valqty  = prompt('Jumlah '+name+' :', qty);
        if(valqty == '' || valqty === null) {
            return
        }
        $.ajax({
            method: 'POST',
            url: '{{ url("app/cart/update_qty") }}',
            beforeSend: function (xhr) {
              return xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
            },
            data: {
                rowId: rowId,
                qty: valqty,
             },
            success:function(data){
                datatable.ajax.reload();
                getCartTotal();
            },error:function(data){
                alert("Terjadi kesalahan: "+data);
            }
        });
    }

    function clearCart () {
        var check = confirm('Hapus semua belanjaan ?');
        if(check == false) {
            return
        }
        $.ajax({
            method: 'POST',
            url: '{{ url("app/cart/clear_cart") }}',
            beforeSend: function (xhr) {
              return xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
            },
            data: {
             },
            success:function(data){
                datatable.ajax.reload();
                getCartTotal();
            },error:function(data){
                alert("Terjadi kesalahan: "+data);
            }
        });
    }

    // Selector textbox
    $("#kasirform").submit(function(e) {
        e.preventDefault();
        var name    = $('#nameOrKode').val();

        if(name == '' || name === null) {
            return
        }
        $.ajax({
            method: 'POST',
            url: '{{ url("app/cart/getProduct/x") }}',
            beforeSend: function (xhr) {
              return xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
            },
            dataType: 'json',
            data: {
                name: name,
             },
            success:function(data){
                // alert(data);
                var tipe    = data.tipe;
                var product = data.product;
                if(tipe == 'single') {
                    addCart(name);
                    datatable.ajax.reload();
                    getCartTotal();
                }
                else if(tipe == 'multi') {
                    var produk  = '';
                    $('#cartModalLabel').html('Loading');
                    $('#cartModalContent').html('Loading');
                    $('#cartModal').modal('show');
                    var htmlcart    = '<div class="list-group">'; // Set variable kosong untuk pencarian product baru
                    for(pro in product) {
                        var productname     = product[pro].name;
                        var productkode     = product[pro].kode;
                        var productlink     = '<a class="list-group-item" href="javascript:addCartFromMulti(\''+productkode+'\')"><i class="fa fa-cube"></i>&nbsp; '+productname+' [kode:'+productkode+']</a> <br />';
                        htmlcart += productlink; // Set list link untuk tambah product
                        // console.log(product[pro].name);
                    }
                    htmlcart += '</div>';
                    var htmltitlecart    = 'Pencarian produk untuk ('+name+'): '; // Judul untuk 'modal'
                    // Set isi modal dan tampilkan
                    $('#cartModalLabel').html(htmltitlecart);
                    $('#cartModalContent').html(htmlcart);
                }
            },error:function(data){
                // console.log(data.responseText[0]);
                var respon  = $.parseJSON(data.responseText);
                alert(respon.message);
            }
        });
    }); // function - ajax kasir form

    $("#memberForm").submit(function(e) {
        e.preventDefault();
        var kodeMember = $('#kodeMember').val();
        // If no member
        if(kodeMember == '' || kodeMember === null) {
            var check = confirm('Lanjutkan tanpa kode member ?');
            if(check == false) {
                return
            }
            document.location = '{{ url("app/checkout/pay") }}';
            return
        }

        // Else, if member was set
        $.ajax({
            method: 'POST',
            url: '{{ url("app/checkout/membercheck_x") }}',
            beforeSend: function (xhr) {
              return xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
            },
            dataType: 'json',
            data: {
                kodeMember: kodeMember,
             },
            success:function(data){
                alert(data.name);
                // console.log(data);
                // var tipe    = data.tipe;
                // var product = data.product;
                // if(tipe == 'single') {
                //     addCart(name);
                //     datatable.ajax.reload();
                //     getCartTotal();
                // }
                // else if(tipe == 'multi') {
                //     var produk  = '';
                //     $('#cartModalLabel').html('Loading');
                //     $('#cartModalContent').html('Loading');
                //     $('#cartModal').modal('show');
                //     var htmlcart    = '<div class="list-group">'; // Set variable kosong untuk pencarian product baru
                //     for(pro in product) {
                //         var productname     = product[pro].name;
                //         var productkode     = product[pro].kode;
                //         var productlink     = '<a class="list-group-item" href="javascript:addCartFromMulti(\''+productkode+'\')"><i class="fa fa-cube"></i>&nbsp; '+productname+' [kode:'+productkode+']</a> <br />';
                //         htmlcart += productlink; // Set list link untuk tambah product
                //         // console.log(product[pro].name);
                //     }
                //     htmlcart += '</div>';
                //     var htmltitlecart    = 'Pencarian produk untuk ('+name+'): '; // Judul untuk 'modal'
                //     // Set isi modal dan tampilkan
                //     $('#cartModalLabel').html(htmltitlecart);
                //     $('#cartModalContent').html(htmlcart);
                // }
            },error:function(data){
                // console.log(data.responseText[0]);
                var respon  = $.parseJSON(data.responseText);
                alert(respon.message);
            }
        });
    }); // function member form
</script>
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