@extends('layouts.apphome')
@section('title' ,'Tambah Member')
@section('content')

<div class="container-fluid">
    <form action="{{ url('app/member/add') }}" method="post" enctype="multipart/form-data" id="form">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="header">
                    <h4 class="title page-header">
                    Informasi Member
                    </h4>
                </div>
                <div class="content">
                    <div class="form-group">
                        <label>Kode Member</label>
                        <input type="text" name="kode" class="form-control" value="{{ old('kode') }}" required>
                    </div>

                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                    </div>

                    <div class="form-group">
                        <label>Tempat, Tanggal Lahir</label>
                        <div class="row">
                            <div class="col-xs-6"><input type="text" name="tempat_lahir" class="form-control" value="{{ old('tempat_lahir') }}" placeholder="Tempat Lahir" required></div>
                            <div class="col-xs-6"><input type="text" name="born" id="born" class="form-control" value="{{ old('born') }}" placeholder="Tanggal Lahir" required></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="address" id="address" class="form-control">{{ old('address') }}</textarea>
                    </div>

                </div>
            </div>
        </div> {{-- col --}}

        <div class="col-md-4">
            <div class="card">
                <div class="header">
                    <h4 class="title page-header">
                    Detail
                    </h4>
                </div>
                <div class="content">

                    <div class="form-group">
                        <label>Foto </label>
                        <input type="file" id="uploadmedia" name="uploadmedia" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Nama Ibu</label>
                        <input type="text" name="mothers_name" class="form-control" value="{{ old('mothers_name') }}" required>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Email">
                    </div>

                    <div class="form-group">
                        <label>Saldo awal (Rp)</label>
                        <input type="text" name="saldo" class="form-control" value="{{ old('saldo') }}" placeholder="Angka saja" required>
                    </div>

                    <div align="center" class="form-group">
                        <button type="submit" name="submit" class="btn btn-fill btn-primary">Simpan</button>
                        <a href="{{ url('app/member/list') }}" class="btn btn-primary">Batal</a>
                    </div>
                </div>
            </div>
        </div>
    </div> {{-- .row --}}
    </form>
</div>{{--  container-fluid --}}

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

$('#memberMenu').addClass('in');
$('#menumemberadd').addClass('active');
$('#menumember').addClass('active');

CKEDITOR.replace('address');

$("#uploadmedia").attr({'accept' : '.jpg, .png, .jpeg'})

</script>
@endpush
@endsection