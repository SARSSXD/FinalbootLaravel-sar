@extends('pages.master')
@section('content')
    @if (session('user')->isAdmin == 1)
        <div class="breadcrumbs bg-dark">
            <div class="col-sm-4">
                <div class="page-header float-left bg-dark text-light">
                    <div class="page-title">
                        <h1>Dashboard Admin</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3 bg-dark text-light">
            <div class="container text-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Roles</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                @if ($item->isAdmin == 1)
                                    <td>Admin</td>
                                @else
                                    <td>User</td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div> <!-- .content -->
    @endif
    @if (session('user')->isAdmin == 0)
        <div class="breadcrumbs bg-dark">
            <div class="col-sm-4">
                <div class="page-header float-left bg-dark text-light">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3 bg-dark text-light">
            <div class="container text-center">
                <div class="row align-items-start">
                    <div class="col-8">
                        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ asset('style/images/2.png') }}" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('style/images/3.png') }}" class="d-block w-100" alt="...">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                    <div class="col-4">
                        <img src="{{ asset('style/images/1.png') }}" class="img-fluid" alt="">
                    </div>
                </div>
            </div>

            <p class="h3">Pilih Nominal Yang Ingin Anda Beli</p>
            <div class="container">
                <p class="h5">Big Sale</p>

                <div class="row">
                    @foreach ($product as $item)
                        <div class="col-6 col-md-4 col-lg-3 mb-3 bg-dark text-light">
                            <form action="{{ route('cart.store') }}" method="post">
                                @csrf
                                <div class="card bg-dark text-light">
                                    <img style="max-height: 180px;" src="{{ asset('storage/images/' . $item->gambar) }}"
                                        class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="d-flex justify-content-between">
                                            <span class="card-title m-0">{{ $item->nama_barang }}</span>
                                            <span class="badge text-bg-primary">50% Off</span>
                                        </h5>
                                        <p class="card-text">Rp.<del>{{ $item->harga * 2 }}</del> {{ $item->harga }}</p>
                                        <label for="">Jumlah</label>
                                        <input type="number" name="quantity" class="form-control">
                                        <input type="hidden" name="product_id" value="{{ $item->id }}">
                                        <button class="btn btn-primary" type="submit" style="margin-top: 10px">Add to
                                            cart</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    @endforeach

                </div>

            </div>

            {{-- <p class="h3">Masukkan Jumlah Total</p>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Jumlah</span>
                <input type="text" class="form-control" aria-label="Sizing example input"
                    aria-describedby="inputGroup-sizing-sm">
            </div>

            <p class="h3">Masukkan Nomer Whatsapp</p>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">No.WA</span>
                <input type="text" class="form-control" aria-label="Sizing example input"
                    aria-describedby="inputGroup-sizing-sm">
            </div>

            <div class="container text-center">
                <button class="btn btn-primary btn-lg" type="button">Pesan Sekarang!</button>
            </div> --}}
        </div> <!-- .content -->
    @endif
@endsection
