@extends('layouts.apphome')
@section('title' ,'Semua Member')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">
                    Semua Member
                    <a href="{{ url('app/member/add') }}" class="btn btn-fill btn-danger pull-right"> <span class="fa fa-plus"></span> Tambah Baru</a>
                    </h4>
                </div>
                <br>
                <div class="content">
                    <div id="tablecontent">
                    <table id="datatable" class="table table-responsive table-striped table-hover">
                        <thead>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Saldo</th>
                            <th>Opsi</th>
                        </thead>
                        <tbody>
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
$('#memberMenu').addClass('in');
$('#menusemuamember').addClass('active');
$('#menumember').addClass('active');

    // Datatable View
    var datatable =
    $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ url("app/member/list/x") }}',
        columns: [
            // { data: 'rownum', name: 'rownum', searchable: false },
            { data: 'kode', name: 'kode' },
            { data: 'name', name: 'name' },
            { data: 'address', name: 'address' },
            { data: 'saldo', name: 'saldo' },
            { data: 'action', name: 'action' },
        ],
        order: [ [1, 'asc'] ]
    });

    // Delete ajax function
    function deleteBtn(id, title){
      var confirmed   = confirm('Hapus Produk: '+title +' ?');
      if(confirmed == true){
        $.ajax({
            method: 'POST',
            url: '{{ url("app/product/delete") }}',
            beforeSend: function (xhr) {
              return xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
            },
            data: {
                id: id,
             },
            success:function(data){
                alert(data);
                datatable.ajax.reload();
            },error:function(data){
                alert("Terjadi kesalahan: "+data);
            }
        });
      } // if confirmed true
    };

    // UbahStok ajax function
    function chgStock(id, title, stock){
      var valstock   = prompt('Ubah Stok '+title+' :' , stock);
        if(valstock == '' || valstock === null) {
            return
        }
        $.ajax({
            method: 'POST',
            url: '{{ url("app/product/chg_stock") }}',
            beforeSend: function (xhr) {
              return xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
            },
            data: {
                id: id,
                stock: valstock,
             },
            success:function(data){
                alert(data);
                datatable.ajax.reload();
            },error:function(data){
                alert("Terjadi kesalahan: "+data);
            }
        });
    };
</script>
@endpush
@endsection