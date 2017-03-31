@extends('layouts.apphome')
@section('title', 'Tabungan Member')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="box box-success">
			<div class="box-header">
				<h3 class="box-title">Tabungan Member &nbsp; </h3>
                <a title="Refresh Tabel" href="javascript:refreshDataTable()" class="btn btn-success"><span class="fa fa-refresh"></span></a>
			</div>
			<div class="box-body">
                <table id="datatable" class="table table-bordered table-responsive table-striped table-hover">
                    <thead>
                        <th>Kode</th>
                        <th>Nama</th>
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
        ajax: '{{ url("app/member/tabungan/x") }}',
        columns: [
            // { data: 'rownum', name: 'rownum', searchable: false },
            { data: 'kode', name: 'kode' },
            { data: 'name', name: 'name' },
            { data: 'saldo', name: 'saldo' },
            { data: 'action', name: 'action' },
        ],
        order: [ [1, 'asc'] ]
    });

    function refreshDataTable() {
        datatable.ajax.reload();
    }

    // (\'plus\','.$table->id.', \''.$table->name.'\', \''.$saldo.'\')
    function ubahSaldoBtn(tipe, userId, userName, saldo) {
        var promptTipe = 'Kurangi Saldo sebesar (angka saja, tanpa tanda minus dsb): ';
        if(tipe == 'kurangiSaldo') {
            promptTipe = 'Tambah Saldo sebesar (angka saja, tanpa tanda minus dsb): ';
        }

        var nabung   = prompt('Saldo sekarang: '+saldo+'. '+ promptTipe, 0);
        if(nabung == '' || nabung === null) {
            return
        }

        // Else, if member was set
        $.ajax({
            method: 'POST',
            url: '{{ url("app/member") }}' + '/' + tipe,
            beforeSend: function (xhr) {
              return xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
            },
            dataType: 'json',
            data: {
                userId: userId,
                userName: userName,
                nabung: nabung,
             },
            success:function(data){
                console.log(data);
                alert('status: ' + data.status + '. Saldo sekarang: Rp ' + data.saldoSekarang);
                refreshDataTable();
            },error:function(data){
                alert('terjadi kesalahan');
                console.log(data);
            }
        });
    }; // function member form

</script>
@endpush
@endsection