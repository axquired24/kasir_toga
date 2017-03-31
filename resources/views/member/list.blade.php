@extends('layouts.apphome')
@section('title', 'Semua Member')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="box box-success">
			<div class="box-header">
				<h3 class="box-title">Daftar Member &nbsp; <a href="{{ url('app/member/add') }}" class="btn btn-danger"><span class="fa fa-plus"></span> &nbsp; Tambah Baru</a></h3>
                <a title="Refresh Tabel" href="javascript:refreshDataTable()" class="btn btn-success"><span class="fa fa-refresh"></span></a>
			</div>
			<div class="box-body">
                <table id="datatable" class="table table-bordered table-responsive table-striped table-hover">
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
	</div> {{-- col-md --}}
</div> {{-- row --}}

@push('jscode')
<script>
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

    function refreshDataTable() {
        datatable.ajax.reload();
    }    

    // Delete ajax function
    function deleteBtn(id, title){
      var confirmed   = confirm('Hapus Member: '+title +' ?');
      if(confirmed == true){
        $.ajax({
            method: 'POST',
            url: '{{ url("app/member/delete") }}',
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
</script>
@endpush
@endsection