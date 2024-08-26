@extends('layoutadmin.master')

@section('konten')
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Data Stock
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
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
                <tfoot>
                    <tr>
                        <th scope="col">No Transaksi</th>
                        <th scope="col">Penerima</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Kode Pos</th>
                        <th scope="col">Total Pembayaran</th>
                        <th scope="col">Cetak Bukti</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($transaksi as $item)    
                    <tr>
                        <th>{{$item->noresi}}</th>
                        <td>{{$item->penerima}}</td>
                        <td>{{$item->alamat}}</td>
                        <td>{{$item->kodepos}}</td>
                        <td>Rp. {{$item->total_pembayaran}}</td>
                        <td><a class="btn btn-success mt-auto" href="/cetaktransaksi/{{$item->id}}">Cetak Invoice</a></td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection