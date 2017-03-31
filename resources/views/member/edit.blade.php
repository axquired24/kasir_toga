@extends('layouts.apphome')
@section('title', 'Edit Member')
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
                    <label>Kode Member*</label>
                    <input type="text" name="kode" class="form-control" value="{{ $member->kode }}" placeholder="Kode Member: contoh MB001" required><small class="help-block">*Harus diisi</small>
                </div>

                <div class="form-group">
                    <label>Nama Lengkap*</label>
                    <input type="text" name="name" class="form-control" value="{{ stripslashes($member->name) }}" placeholder="Nama lengkap" required><small class="help-block">*Harus diisi</small>
                </div>

                <div class="form-group">
                    <label>Foto </label>
                    <input type="file" id="uploadmedia" name="uploadmedia" class="form-control">
                    <small class="help-block">*Re-upload gambar untuk mengubahnya</small>
                    @if($member->profile_image != '')
                    <a target="blank" href="{{ url('memberfiles/'.$member->profile_image) }}"><img src="{{ url('memberfiles/thumb-'.$member->profile_image) }}" alt="" class="img-responsive"></a>
                    @endif
                </div>

                <div class="form-group">
                    <label>Tempat, Tanggal Lahir*</label>
                    <div class="row">
                        <div class="col-xs-6"><input type="text" name="tempat_lahir" class="form-control" value="{{ $member->tempat_lahir }}" placeholder="Tempat Lahir" required></div>
                        <div class="col-xs-6"><input type="text" name="born" id="born" class="form-control" value="{{ $member->born }}" placeholder="Tanggal Lahir" required></div>
                    </div>
                    <small class="help-block">*Harus diisi</small>
                </div>

                <div class="form-group">
                    <label>Alamat*</label>
                    <textarea name="address" id="address" class="form-control" placeholder="Alamat lengkap" required>{{ $member->address }}</textarea>
                    <small class="help-block">*Harus diisi</small>
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
                    <label>Nama Ibu*</label>
                    <input type="text" name="mothers_name" class="form-control" value="{{ stripslashes($member->mothers_name) }}" placeholder="Nama Ibu kandung" required>
                    <small class="help-block">*Harus diisi</small>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $member->email }}" placeholder="Email" required>
                </div>

                <div class="form-group">
                    <label>Saldo sekarang (Rp)*</label>
                    <input type="text" name="saldo" class="form-control" value="{{ $member->saldo }}" placeholder="Angka saja" required>
                    <small class="help-block">*Harus diisi</small>
                </div>

                <div align="center" class="form-group">
                    <button type="submit" name="submit" class="btn btn-lg btn-fill btn-primary">Simpan</button>
                    <a href="{{ url('app/member/list') }}" class="btn btn-lg btn-default">Batal</a>
                </div>
            </div> {{-- box-body --}}
        </div> {{-- box --}}
    </div> {{-- col-md --}}
</div> {{-- row --}}
</form>

@push('jscode')
<script>
$('#born').datepicker({
    format : 'yyyy-mm-dd',
    language: 'id',
    container : '#form',
    beforeShow: function(input, inst)
    {
        inst.dpDiv.css({marginTop: -input.offsetHeight + 'px', marginLeft: input.offsetWidth + 'px'});
    },
});

// CKEDITOR.replace('address');

$("#uploadmedia").attr({'accept' : '.jpg, .png, .jpeg'})

</script>
@endpush
@endsection