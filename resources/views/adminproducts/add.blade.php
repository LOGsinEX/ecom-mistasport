@extends('layoutadmin.master')
@section('konten')
<div class="container-fluid px-4">
    <div class="row">
        <div class="col-8 table-responsive mt-4">
            <form action="/admin/actionaddproduk" enctype="multipart/form-data" method="post">
                @csrf
                <div class="form-group">
                    <label>Nama Produk</label>
                    <input type="text" name="nama" class="form-control">
                </div>
                <div class="form-group mt-2">
                    <label>Kategori</label>
                    <select class="form-control select2" id="kategori" name="kategori" style="width: 100%;">
                        <option value="0">Man</option>
                        <option value="1">Woman</option>
                        <option value="2">Semua Gender</option>

                    </select>
                </div>
                <div class="form-group mt-2">
                    <label>Stock Barang</label>
                    <input type="text" name="stok" class="form-control">
                </div>
                <div class="form-group mt-2">
                    <label>Harga</label>
                    <input type="text" name="harga" class="form-control">
                </div>
                <div class="form-group mt-2">
                    <label>Deskripsi</label>
                    <input type="text" name="deskripsi" class="form-control">
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