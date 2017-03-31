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
                    <div class="form-group" id="borncol">
                        <label>Tempat, Tanggal Lahir</label>
                        <div class="row">
                            <div class="col-xs-6"><input type="text" name="tempat_lahir" class="form-control" value="{{ old('tempat_lahir') }}" placeholder="Tempat Lahir" required></div>
                            <div class="col-xs-6"><input type="date" name="born" id="born" class="form-control" value="{{ old('born') }}" placeholder="Tanggal Lahir" required></div>
                            <date-util format="yyyy-MM-dd"></date-util>
                        </div>
                    </div>
                </div>
            </div>
        </div> {{-- col --}}
    </div> {{-- .row --}}    
    </form>
    <form action="#" id="formed">
        <label>TTL</label>
        <input type="text" id="borned">
        @include('member.datepicker')
    </form>
</div>{{--  container-fluid --}}

@push('jscode')
<script>
$('#born').datepicker({
    format : 'yyyy-mm-dd',
    language: 'id',
    container : '#borncol',
});

$('#memberMenu').addClass('in');
$('#menumemberadd').addClass('active');
$('#menumember').addClass('active');

$("#uploadmedia").attr({'accept' : '.jpg, .png, .jpeg'})

</script>
@endpush
@endsection