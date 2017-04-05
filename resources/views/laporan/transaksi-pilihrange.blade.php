@extends('layouts.apphome')
@section('title', 'Laporan Penjualan')
@section('content')
<div class="row">
	<div class="col-md-6 col-xs-12">
		<div class="box box-success">
			<div class="box-header">
				<h3 class="box-title">Pilih batas transaksi: &nbsp;</h3>
			</div>
			<div class="box-body">
                {{-- <h4>Pilih batas transaksi: </h4> --}}
                <form action="{{ url('app/laporan/transaksi?paramdua=tampilkan') }}" method="post" id="formRange">
                {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Dari</label>
                            <input type="text" id="dariRange" name="range_dari" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="">Sampai</label>
                            <input type="text" id="sampaiRange" name="range_sampai" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div align="center">
                        <button type="submit" name="submit" class="btn btn-lg btn-success">Lihat Transaksi</button>
                    </div>
                </form>
            </div>
		</div>
	</div> {{-- col-md --}}
</div> {{-- row --}}

@push('jscode')
<script>
$('#dariRange').datepicker({
    format : 'yyyy-mm-dd',
    language: 'id',
    container : '#formRange',
    beforeShow: function(input, inst)
    {
        inst.dpDiv.css({marginTop: -input.offsetHeight + 'px', marginLeft: input.offsetWidth + 'px'});
    },
});
$('#sampaiRange').datepicker({
    format : 'yyyy-mm-dd',
    language: 'id',
    container : '#formRange',
    beforeShow: function(input, inst)
    {
        inst.dpDiv.css({marginTop: -input.offsetHeight + 'px', marginLeft: input.offsetWidth + 'px'});
    },
});
</script>
@endpush
@endsection