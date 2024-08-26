@extends('layoutadmin.mastershop')
@section('head')
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">MISTA SPORTS</h1>
            <p class="lead fw-normal text-white-50 mb-0">Pusat alat olahraga no.1 di Indonesia</p>
        </div>
    </div>
</header>
    
@endsection
@section('konten')
<div class="container px-4 px-lg-5 mt-5">
    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
        @forelse ($products as $key => $item)
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Product image-->
                    <img class="card-img-top" src="{{ asset('storage/photos/'.$item->gambar) }}" alt="..." />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">{{$item->nama}}</h5>
                            <!-- Product price-->
                            RP. {{$item->harga}}
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center">
                            {{-- <a class="btn btn-outline-dark mt-auto" href="/tambah-keranjang/{{auth()->user()->id}}/{{$item->id}}">Add to cart</a> --}}
                            <a class="btn btn-outline-dark mt-auto" href="/detail-product/{{$item->id}}">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
        
        @endforelse
        
        
    </div>
</div>
@endsection