@extends('layouts.apphome')
@section('title', 'Semua Produk')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="box box-success">
			<div class="box-header">
				<h3 class="box-title">Daftar Produk &nbsp; <a href="{{ url('app/product/add') }}" class="btn btn-danger"><span class="fa fa-plus"></span> &nbsp; Tambah Baru</a>
                <a title="Refresh Tabel" href="javascript:refreshDataTable()" class="btn btn-success"><span class="fa fa-refresh"></span></a>
                </h3>
			</div>
			<div class="box-body">
                <table id="datatable" class="table table-responsive table-striped table-bordered table-hover">
                    <thead>
                        <th>Kode</th>
                        <th>Produk</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Opsi</th>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
			</div>
		</div>
	</div> {{-- col-md --}}
</div> {{-- row --}}

@push('jscode')
<script>
    // Datatable View
    var datatable =
    $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ url("app/product/list/x") }}',
        columns: [
            // { data: 'rownum', name: 'rownum', searchable: false },
            { data: 'kode', name: 'kode' },
            { data: 'name', name: 'name' },
            { data: 'category_name', name: 'category_name' },
            { data: 'selling_price', name: 'selling_price' },
            { data: 'stock', name: 'stock' },
            { data: 'action', name: 'action' },
        ],
        order: [ [4, 'asc'] ]
    });

    @if(isset($_POST['searchDatatable']))
        // datatable.column(1).search('{{ $_POST['searchDatatable'] }}').draw();
        // $('#datatable_filter input').val('{{ $_POST['searchDatatable'] }}');
    @endif

    function refreshDataTable() {
        datatable.ajax.reload();
    }

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