@extends('pages.master')

@section('content')
    <main class="py-3 bg-dark text-light">
        <div class="container">
            <h1>Cart</h1>
            <div class="row">
                <div class="col-lg-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Jumlah Pembelian</th>
                                <th scope="col">Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{ $hargaTotal = 0 }}
                            @foreach ($cartItems as $item)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $item->product->nama_barang }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $harga = $item->quantity * $item->product->harga }}</td>
                                    {{ $hargaTotal = $hargaTotal + $harga }}
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <h3>Total yang harus dibayarkan : {{ $hargaTotal }}</h3>
                    <a href="{{ url('/pembayaran') }}" class="btn btn-primary">Lanjut ke Pembayaran</a>
                </div>
            </div>




        </div>
    </main>
@endsection
