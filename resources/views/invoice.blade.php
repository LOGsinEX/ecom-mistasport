<!DOCTYPE html>
<html lang="en">
<style>
    .header h1{
        text-align: center;
    }
</style>
<body>
    <div class="header">
        <h1>Invoice</h1>
    </div>
    <hr>  
    <div>
        <table class="table table-borderless">
            <tr>
                <td>Nomor Transaksi</td>
                <td>: {{$data->noresi}}</td>
            </tr>
            <tr>
                <td>Nama Pembeli</td>
                <td>: {{auth()->user()->name}}</td>
            </tr>
            <tr>
                <td>Tanggal Pemesanan</td>
                <td>: {{$data->created_at}}</td>
            </tr>
        </table>
        -----------------------------------------------------------------------------------------------------------------------------------
        <table class="table table-borderless">
            <tr>
                <td>Nama Penerima</td>
                <td> : </td>
                <td>{{$data->penerima}}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td> : </td>
                <td>{{$data->alamat}}, {{$data->kodepos}}</td>
            </tr>
        </table>
        @php
            // dd($data);                               
            $keranjang = App\Models\Cart::where('id_transaksi',$data->id)->get(); 
        @endphp
        <table class="table table-borderless" style="width: 100%">
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
                        <td align="center" >Rp. {{$product->harga}}</td>
                        <td align="center" >{{$item->jumlah}}</td>
                        <td align="center" >Rp. {{$product->harga * $item->jumlah}}</td>
                    </tr>
                    @php
                        $temp = $temp + ($product->harga * $item->jumlah);
                    @endphp
                @endforeach
                <tr>
                    <td align="center" colspan="4">TOTAL HARGA</td>
                    <td align="center" >Rp. {{$temp}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>