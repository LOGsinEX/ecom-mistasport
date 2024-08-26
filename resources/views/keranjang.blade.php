@extends('layoutadmin.mastershop')

@section('konten')
    <div class="container-fluid px-4">
        <h3>Keranjang</h3>
        <table class="table table-borderless">
            <thead>
              <tr>
                <th scope="col"></th>
                <th scope="col">Product</th>
                <th scope="col">Harga</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Total Harga</th>
                <th scope="col">Hapus</th>
              </tr>
            </thead>
            <tbody>
                @php
                    $temp = 0;
                @endphp
                @foreach ($keranjang as $key => $item)
                    @php
                        $product = App\Models\Product::where('id',$item->id_product)->first(); 
                    @endphp
                    <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td>{{$product->nama}}</td>
                        <td>Rp. {{$product->harga}}</td>
                        <td>{{$item->jumlah}}</td>
                        <td>Rp. {{$product->harga * $item->jumlah}}</td>
                        <td><a href="/keranjang/delete/{{$item->id}}" class="btn btn-outline-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                          </svg></a></td>
                    </tr>
                    @php
                        $temp = $temp + ($product->harga * $item->jumlah);
                    @endphp
                @endforeach
                <tr>
                    <td align="center" colspan="4">TOTAL HARGA BELANJA</td>
                    <td>Rp. {{$temp}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col row-cols-6 text-center">
                <a class="badge bg-dark text-white ms-1 rounded-pill" style="height: 30px" href="/checkout">Checkout</a>
            </div>
        </div>
    </div>
@endsection