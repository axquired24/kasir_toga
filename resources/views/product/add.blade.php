@extends('layouts.apphome')
@section('title' ,'Tambah Produk')
@section('content')

<div class="container-fluid">
    <form action="{{ url('app/product/add') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="header">
                    <h4 class="title page-header">
                    Informasi Produk
                    </h4>
                </div>
                <div class="content">
                    <div class="form-group">
                        <label>Kode Produk</label>
                        <input type="text" name="kode" class="form-control" value="{{ old('kode') }}" required>
                    </div>

                    <div class="form-group">
                        <label>Nama Produk</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                    </div>

                    <div class="form-group">
                        <label>Gambar Produk</label>
                        <input type="file" id="uploadmedia" name="uploadmedia" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Deskripsi Produk</label>
                        <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
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
                        <label>Kategori</label>
                        <select name="product_category_id" id="product_category_id" class="form-control" required>
                            <option value="">Pilih Kategori</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Harga Beli (Rp)</label>
                        <input type="text" name="buying_price" class="form-control" value="{{ old('buying_price') }}" placeholder="Angka saja" required>
                    </div>

                    <div class="form-group">
                        <label>Harga Jual (Rp)</label>
                        <input type="text" name="selling_price" class="form-control" value="{{ old('selling_price') }}" placeholder="Angka saja" required>
                    </div>

                    <div class="form-group">
                        <label>Stok awal (pcs)</label>
                        <input type="text" name="stock" class="form-control" value="{{ old('stock') }}" placeholder="Angka saja" required>
                    </div>

                    <div class="form-group">
                        <label>Bobot (gram)</label>
                        <input type="text" name="weight" class="form-control" value="{{ old('weight') }}" placeholder="Angka saja" required>
                    </div>

                    <div align="center" class="form-group">
                        <button type="submit" name="submit" class="btn btn-fill btn-primary">Simpan</button>
                        <a href="{{ url('app/product/list') }}" class="btn btn-primary">Batal</a>
                    </div>
                </div>
            </div>
        </div>
    </div> {{-- .row --}}
    </form>
</div>{{--  container-fluid --}}

@push('jscode')
<script>
$('#produkMenu').addClass('in');
$('#menuprodukadd').addClass('active');
$('#menuproduk').addClass('active');

CKEDITOR.replace('description');

$("#uploadmedia").attr({'accept' : '.jpg, .png, .jpeg'})

@if(old('product_category_id') != '')
    $('#product_category_id').val('{{ old("product_category_id") }}');
@endif

</script>
@endpush
@endsection