@extends('pages.master')

@section('content')
    <main class="py-3 bg-dark text-light">
        <div class="container">
            <h1>New Product</h1>
            <hr>
            <form class="row" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-12 col-md-6 col-lg-4 mb-3">
                    <div class="card bg-dark text-light">
                        <div class="card-body">
                            <img src="{{ asset('assets/img/product.jpg') }}" alt=""
                                class="img-fluid img-thumbnail mb-3" id="image-preview">
                            <div>
                                <label for="image" class="form-label">Product Image</label>
                                <input class="form-control-addon-secondary" name="image" type="file" id="image" accept="image/*">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md">
                    <div class="card bg-dark text-light">
                        <div class="card-body">
                            <h3>Product Details</h3>
                            <hr>
                            <div class="mb-3">
                                <label for="name">Product Name</label>
                                <input type="text" name="product_name" id="name" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="price">Price</label>
                                <input type="number" name="price" id="price" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="stock">Stock</label>
                                <input type="number" name="stock" id="stock" class="form-control" required>
                            </div>
                            <button class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>

    <script>
        const imgInput = document.getElementById('image')
        const imgPreview = document.getElementById('image-preview')

        imgInput.onchange = evt => {
            const [file] = imgInput.files
            if (file) {
                imgPreview.src = URL.createObjectURL(file)
            }
        }
    </script>
@endsection
