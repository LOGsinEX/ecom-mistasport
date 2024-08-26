@extends('layoutadmin.mastershop')

@section('konten')
    <div class="container-fluid px-4">
        <h3>Checkout</h3>
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Produk & Harga Total
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <table class="table table-borderless">
                            <thead>
                              <tr>
                                <th scope="col"></th>
                                <th scope="col">Product</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Total Harga</th>
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
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Data Transaksi
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <form action="/checkout/action" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Nama Penerima</label>
                                <input type="text" name="penerima" class="form-control">
                            </div>
                            <div class="form-group mt-2">
                                <label>Alamat</label>
                                <textarea class="form-control" name="alamat" rows="3"></textarea>
                            </div>
                            <div class="form-group mt-2">
                                <label>Kode Pos</label>
                                <input type="text" name="kodepos" class="form-control">
                            </div>
                            <input type="text" value="{{$totalharga}}" name="totalpembayaran" class="form-control" style="display: none">
                            <button type="submit" class="btn btn-primary mt-2">Lanjutkan Pesanan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
@endsection