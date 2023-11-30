@extends('pages.master')

@section('content')
    <main class="py-3 bg-dark">
        <div class="container bg-dark text-light">
            <h1>Halaman Pembayaran</h1>

            <div class="row">
                <div class="col-lg-12">
                    <p>Silahkan melakukan pembayaran dengan total harga yang sudah ditentukan ke rekening berikut</p>
                    <h3>Bank BCA</h3>
                    <p>1234567890</p>
                    <h3>Bank Mandiri</h3>
                    <p>0987654321</p>
                    <h3>Bank BNI</h3>
                    <p>1234567890</p>
                    <p>Pembayaran akan dicek secara manual dan akan dikonfirmasi ke anda jika pembayaran berhasil diterima
                        oleh admin</p>
                    <a href="{{ route('dashboard.user') }}" class="btn btn-primary">Kembali ke Dashboard</a>
                </div>
            </div>

        </div>
    </main>
@endsection
