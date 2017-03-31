@extends('layouts.apphome')
@section('title', 'Ubah Produk')
@section('content')

<form action="{{ url('app/product/edit?product_id='.$product->id) }}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
<input type="hidden" name="id" value="{{ $product->id }}">
<div class="row">
	<div class="col-md-8">
		<div class="box box-success">
			<div class="box-header">
				<h3 class="box-title">Informasi Produk </h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label>Kode Produk</label>
                    <input type="text" name="kode" class="form-control" value="{{ $product->kode }}" required>
                </div>

                <div class="form-group">
                    <label>Nama Produk</label>
                    <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
                </div>

                <div class="form-group">
                    <label>Gambar Produk <br><small class="text-muted">*Upload Gambar baru untuk mengubahnya</small></label>
                    @if($product->product_image != '')
                    <img src="{{ url('productfiles/thumb-'.$product->product_image) }}" class="img-responsive" alt="">
                    @else
                    <br>Gambar Kosong
                    @endif
                    <br>
                    <input type="file" id="uploadmedia" name="uploadmedia" class="form-control">
                </div>

                <div class="form-group">
                    <label>Deskripsi Produk</label>
                    <textarea name="description" id="description" class="form-control">{{ $product->description }}</textarea>
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
                    <input type="text" name="buying_price" class="form-control" value="{{ $product->buying_price }}" placeholder="Angka saja" required>
                </div>

                <div class="form-group">
                    <label>Harga Jual (Rp)</label>
                    <input type="text" name="selling_price" class="form-control" value="{{ $product->selling_price }}" placeholder="Angka saja" required>
                </div>

                <div class="form-group">
                    <label>Stok awal (pcs)</label>
                    <input type="text" name="stock" class="form-control" value="{{ $product->stock }}" placeholder="Angka saja" required>
                </div>

                <div class="form-group">
                    <label>Bobot (gram)</label>
                    <input type="text" name="weight" class="form-control" value="{{ $product->weight }}" placeholder="Angka saja" required>
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

@if($product->product_category_id != '')
    $('#product_category_id').val('{{ $product->product_category_id }}');
@endif

$("#uploadmedia").attr({'accept' : '.jpg, .png, .jpeg'})

</script>
@endpush
@endsection