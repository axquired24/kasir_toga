@extends('layouts.apphome')
@section('title', 'Tambah Produk')
@section('content')

<form action="{{ url('app/product/add') }}" method="post" enctype="multipart/form-data" id="form">
{{ csrf_field() }}
<div class="row">
	<div class="col-md-8">
		<div class="box box-success">
			<div class="box-header">
				<h3 class="box-title">Informasi Produk </h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label>Kode Produk</label>
                    <input type="text" name="kode" class="form-control" placeholder="Kode produk, contoh: PR001" value="{{ old('kode') }}" required>
                </div>

                <div class="form-group">
                    <label>Nama Produk</label>
                    <input type="text" name="name" class="form-control" placeholder="Nama produk" value="{{ old('name') }}" required>
                </div>

                <div class="form-group">
                    <label>Gambar Produk</label>
                    <input type="file" id="uploadmedia" name="uploadmedia" class="form-control">
                </div>

                <div class="form-group">
                    <label>Deskripsi Produk</label>
                    <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
                </div>
            </div> {{-- box-body --}}
        </div> {{-- box --}}
    </div> {{-- col-md --}}

    <div class="col-md-4">
        <div class="box box-warning">
            <div class="box-header">
                <h3 class="box-title">Detail</h3>
            </div>
            <div class="box-body">
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
                    <input type="number" name="buying_price" class="form-control" value="{{ old('buying_price') }}" placeholder="Angka saja" required>
                </div>

                <div class="form-group">
                    <label>Harga Jual (Rp)</label>
                    <input type="number" name="selling_price" class="form-control" value="{{ old('selling_price') }}" placeholder="Angka saja" required>
                </div>

                <div class="form-group">
                    <label>Stok awal (pcs)</label>
                    <input type="number" name="stock" class="form-control" value="{{ old('stock') }}" placeholder="Angka saja" required>
                </div>

                <div class="form-group">
                    <label>Bobot (gram)</label>
                    <input type="number" name="weight" class="form-control" value="{{ old('weight') }}" placeholder="Angka saja" required>
                </div>

                <div align="center" class="form-group">
                    <button type="submit" name="submit" class="btn btn-lg btn-fill btn-primary">Simpan</button>
                    <a href="{{ url('app/product/list') }}" class="btn btn-lg btn-default">Batal</a>
                </div>
            </div> {{-- box-body --}}
        </div> {{-- box --}}
    </div> {{-- col-md --}}
</div> {{-- row --}}
</form>

@push('jscode')
<script>
CKEDITOR.replace('description');

@if(old('product_category_id') != '')
    $('#product_category_id').val('{{ old("product_category_id") }}');
@endif

$("#uploadmedia").attr({'accept' : '.jpg, .png, .jpeg'})

</script>
@endpush
@endsection