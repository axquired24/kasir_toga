@extends('layouts.apphome')
@section('title', 'Detail Member')
@section('content')

<form action="{{ url('app/member/edit') }}" method="post" enctype="multipart/form-data" id="form">
{{ csrf_field() }}
<input type="hidden" name="id" value="{{ $member->id }}">
<div class="row">
	<div class="col-md-6">
		<div class="box box-success">
			<div class="box-header">
				<h3 class="box-title">Informasi Member </h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label>Kode Member</label>
                    <br>{{ $member->kode }}
                </div>

                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <br>{{ $member->name }}
                </div>

                <div class="form-group">
                    <label>Tempat, Tanggal Lahir</label>
                    <?php 
                        $tgl_format = date_create($member->born);
                        $tgl_lahir = date_format($tgl_format, 'd F Y');
                        $umur      = date('Y') - date_format($tgl_format, 'Y');
                    ?>
                    <br>{{ $member->tempat_lahir }}, {{ $member->born }}
                    <br><br><b>Umur</b><br> {{ $umur }} th
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <br>{{ $member->address }}                    
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <br>{{ $member->email }}
                </div>                
            </div> {{-- box-body --}}
        </div> {{-- box --}}
    </div> {{-- col-md --}}

    <div class="col-md-6">
        <div class="box box-warning">
            <div class="box-header">
                <h3 class="box-title">Detail</h3>
            </div>
            <div class="box-body">

                <div class="form-group">
                    <label>Foto </label>
                    @if($member->profile_image != '')
                    <a target="blank" href="{{ url('memberfiles/'.$member->profile_image) }}"><img src="{{ url('memberfiles/thumb-'.$member->profile_image) }}" alt="" class="img-responsive"></a>
                    @endif
                </div>

                <div class="form-group">
                    <label>Nama Ibu</label>
                    <br>{{ $member->mothers_name }}                    
                </div>

                <div class="form-group">
                    <label>Saldo sekarang (Rp)</label>
                    <br>Rp {{ number_format($member->saldo, 0, '.', ',') }}
                </div>

                <div align="center" class="form-group">
                    <a href="{{ url('app/member/list') }}" class="btn btn-lg btn-block btn-default"><span class="fa fa-chevron-left"></span>&nbsp; Kembali</a>
                </div>
            </div> {{-- box-body --}}
        </div> {{-- box --}}
    </div> {{-- col-md --}}
</div> {{-- row --}}
</form>

@push('jscode')
<script>
</script>
@endpush
@endsection