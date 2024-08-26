@extends('layoutadmin.mastershop')
@section('konten')
<div class="container px-4 px-lg-5 mt-5">
    <div class="row gx-6 gx-lg-8 row-cols-8 row-cols-md-8 row-cols-xl-10">
        <div class="col mb-9">
            <div class="card h-100">
                <!-- Product image-->
                <img class="card-img-top" src="{{ asset('storage/photos/'.$products->gambar) }}" alt="..." />
                <!-- Product details-->
                <div class="card-body p-4">
                    <div class="text-center">
                        <!-- Product name-->
                        <h5 class="fw-bolder">{{$products->nama}}</h5>
                        <!-- Product Description-->
                        <p>{{$products->deskripsi}}</p>
                        <!-- Product price-->
                        RP. {{$products->harga}}
                    </div>
                </div>
                <!-- Product actions-->
                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                    @auth    
                    <div class="text-center">
                        <form action="/tambah-keranjang/{{auth()->user()->id}}/{{$products->id}}" method="post">
                            @csrf
                            <label for="">Stok tersedia : {{$products->stok}}</label><br>
                            <input type='number' name="jumlah" min='1' max='{{$products->stok}}'>
                            <button type="submit" class="btn btn-outline-dark mt-auto">Submit</button>
                        </form>
                        {{-- <a class="btn btn-outline-dark mt-auto" href="/tambah-keranjang/{{auth()->user()->id}}/{{$products->id}}">Add to cart</a> --}}
                    </div>
                    @endauth
                    @guest
                    <div class="text-center">
                        *Anda belum login, <a href="/login">Login</a>  terlebih dahulu
                        {{-- <a class="btn btn-outline-dark mt-auto" href="/login" >Add to cart</a> --}}
                    </div>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>
@endsection