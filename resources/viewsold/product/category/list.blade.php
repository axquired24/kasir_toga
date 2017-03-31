@extends('layouts.apphome')
@section('title' ,'Kategori Produk')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">
                    Kategori Produk
                    <a href="javascript:addBtn()" class="btn btn-fill btn-danger pull-right"> <span class="fa fa-plus"></span> Tambah Baru</a>
                    </h4>
                </div>
                <br>
                <div class="content">
                    <div id="tablecontent">
                    <table id="datatable" class="table table-responsive table-striped table-hover">
                        <thead>
                            <th>No</th>
                            <th>Kategori</th>
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
$('#produkMenu').addClass('in');
$('#menuprodukcat').addClass('active');
$('#menuproduk').addClass('active');

    // Datatable View
    var datatable =
    $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ url("app/product_category/list/x") }}',
        columns: [
            { data: 'rownum', name: 'rownum', searchable: false },
            { data: 'name', name: 'name' },
            { data: 'action', name: 'action' },
        ],
        order: [ [0, 'desc'] ]
    });

    // Delete ajax function
    function deleteBtn(id, title){
      var confirmed   = confirm('Hapus Kategori: '+title +' ?');
      if(confirmed == true){
        $.ajax({
            method: 'POST',
            url: '{{ url("app/product_category/delete") }}',
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

    // Edit ajax function
    function editBtn(id, title){
      var valname   = prompt('Ubah Kategori:' , title);
        if(valname == '' || valname === null) {
            return
        }      
        $.ajax({
            method: 'POST',
            url: '{{ url("app/product_category/edit") }}',
            beforeSend: function (xhr) {
              return xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
            },
            data: {
                id: id,
                name: valname,
             },
            success:function(data){
                alert(data);
                datatable.ajax.reload();
            },error:function(data){
                alert("Terjadi kesalahan: "+data);
            }
        });
    };

    // Edit ajax function
    function addBtn(){
      var valname   = prompt('Tambah Kategori:');
        if(valname == '' || valname === null) {
            return
        }
            $.ajax({
                method: 'POST',
                url: '{{ url("app/product_category/add") }}',
                beforeSend: function (xhr) {
                  return xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
                },
                data: {
                    name: valname,
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