@extends('layoutadmin.master')
@section('konten')
<div class="container-fluid px-4">
    <div class="row">
        <div class="col-8 table-responsive mt-4">
            <form action="/admin/actionupdateproduk" enctype="multipart/form-data" method="post">
                @csrf
                <input type="text" name="id" class="form-control"  value="{{$products->id}}" style="display: none">
                <div class="form-group">
                    <label>Nama Produk</label>
                    <input type="text" name="nama" class="form-control"  value="{{ old('nama', $products->nama) }}">
                </div>
                <div class="form-group mt-2">
                    <label>Kategori</label>
                    <select class="form-control select2" id="kategori" name="kategori" style="width: 100%;">
                        <option value="0" {{ old('kategori', $products->kategori) == 0 ? 'selected' : '' }}>Man</option>
                        <option value="1" {{ old('kategori', $products->kategori) == 1 ? 'selected' : '' }}>Woman</option>
                        <option value="2" {{ old('kategori', $products->kategori) == 2 ? 'selected' : '' }}>Semua Gender</option>

                    </select>
                </div>
                {{-- <div class="form-group mt-2">
                    <label>Stock Barang</label>
                    <input type="text" name="stok" class="form-control">
                </div> --}}
                <div class="form-group mt-2">
                    <label>Harga</label>
                    <input type="text" name="harga" class="form-control" value="{{ old('harga', $products->harga) }}">
                </div>
                <div class="form-group mt-2">
                    <label>Deskripsi</label>
                    <input type="text" name="deskripsi" class="form-control" value="{{ old('deskripsi', $products->deskripsi) }}">
                </div>
                <div class="form-group">
                    <label>Bukti Foto</label><br>
                    <input type="file" id="gambar" name="gambar" accept="image/png, image/jpeg">
                </div>                
                <br>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection