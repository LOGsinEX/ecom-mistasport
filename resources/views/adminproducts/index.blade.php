@extends('layoutadmin.master')
@section('konten')
<div class="container-fluid px-4">
    <a href="/admin/tambah-produk" class="btn btn-primary btn-sm ml-4 my-4">Tambah Product</a>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Data Produk
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Detail</th>
                    </tr>
                </tfoot>
                <tbody>
                    @forelse ($products as $key => $item)
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td>{{$item->nama}}</td>
                            <td>
                                {{-- <a href="/admin/data-produk/{{$item->id}}" class="btn btn-info btn-sm">Detail</a> --}}
                                <a href="/admin/data-produk/delete/{{$item->id}}" class="btn btn-danger btn-sm">Hapus</a>
                                <a href="/admin/data-produk/update/{{$item->id}}" class="btn btn-success btn-sm">Edit</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
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