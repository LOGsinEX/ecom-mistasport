@extends('layoutadmin.mastershop')

@section('konten')
    <div class="container-fluid px-4">
        <h3>Transaksi Saya</h3>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">No Transaksi</th>
                <th scope="col">Penerima</th>
                <th scope="col">Alamat</th>
                <th scope="col">Kode Pos</th>
                <th scope="col">Total Pembayaran</th>
                <th scope="col">Cetak Bukti</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($transaksi as $item)    
                <tr>
                  <th>{{$item->noresi}}</th>
                  <td>{{$item->penerima}}</td>
                  <td>{{$item->alamat}}</td>
                  <td>{{$item->kodepos}}</td>
                  <td>Rp. {{$item->total_pembayaran}}</td>
                  <td><a class="btn btn-outline-dark mt-auto" href="/cetaktransaksi/{{$item->id}}">Cetak Invoice</a></td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection