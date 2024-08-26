@extends('layoutadmin.master')
@section('konten')
<div class="container-fluid px-4">
    {{-- <a href="/admin/tambah-produk" class="btn btn-primary btn-sm ml-4 my-4">Tambah Product</a> --}}
    <br>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Data Stock
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Stock</th>
                        <th>Tambah Stok</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Stock</th>
                        <th>Tambah Stok</th>
                    </tr>
                </tfoot>
                <tbody>
                    @forelse ($products as $key => $item)
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td>{{$item->nama}}</td>
                            <td>{{$item->stok}}</td>
                            <td>
                                <div class="text-center">
                                    <form action="/admin/tambah-stock/{{$item->id}}" method="post">
                                        @csrf
                                        <input type='number' name="stok" min='1' max='100'>
                                        <button type="submit" class="btn btn-success mt-auto">Tambah</button>
                                    </form>
                                    {{-- <a class="btn btn-outline-dark mt-auto" href="/tambah-keranjang/{{auth()->user()->id}}/{{$products->id}}">Add to cart</a> --}}
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>Belum ada Produk</td>
                            <td>Belum ada Produk</td>
                            <td>Belum ada Produk</td>
                            <td>Belum ada Produk</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection