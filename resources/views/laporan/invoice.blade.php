@extends('layouts.apphome')
@section('title', 'Laporan Transaksi Penjualan')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="box box-success">
			<div class="box-header">
				<h3 class="box-title">Laporan Transaksi Penjualan &nbsp;</h3>
                <a title="Refresh Tabel" href="javascript:refreshDataTable()" class="btn btn-success"><span class="fa fa-refresh"></span></a>
			</div>
			<div class="box-body">
                <table id="datatable" class="table table-bordered table-responsive table-striped table-hover">
                    <thead>
                        <th>No</th>
                        <th>Kode Transaksi</th>
                        <th>Tanggal</th>
                        <th>Transaksi</th>
                        <th>Oleh</th>
                        <th>Total Transaksi</th>
                        {{-- <th>Opsi</th> --}}
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
        ajax: '{{ url("app/laporan/invoice/x") }}',
        columns: [
            { data: 'rownum', name: 'rownum', searchable: false },
            { data: 'invoice_code', name: 'invoice_code' },
            { data: 'created_at', name: 'created_at' },
            { data: 'transactions', name: 'transactions', searchable: false },
            { data: 'user_id', name: 'user_id', searchable: false },
            { data: 'transaction_total', name: 'transaction_total' },
            // { data: 'action', name: 'action' },
        ],
        order: [ [1, 'desc'] ]
    });

    function refreshDataTable() {
        datatable.ajax.reload();
    }
</script>
@endpush
@endsection