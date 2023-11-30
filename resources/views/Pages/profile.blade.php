@extends('pages.master')

@section('content')
    <main class="py-3 bg-dark text-light">
        <div class="container">
            <h1>My Profile</h1>
            <hr>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4 mb-3">
                    <div class="card bg-dark text-light">
                        <div class="card-body text-center">
                            <a href="#" title="Image from freeiconspng.com"><img
                                    src="https://www.freeiconspng.com/uploads/am-a-19-year-old-multimedia-artist-student-from-manila--21.png"
                                    width="350" alt="Free High quality Profile Icon" /></a>
                            <h3>{{ $data->name }}</h3>
                            <p class="text-muted">{{ $data->email }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md mb-3">
                    <div class="card bg-dark">
                        <div class="card-body">
                            <form action="{{ route('updateProfile', ['user' => $data->id]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <h3>Edit Profile</h3>
                                <hr>
                                <div class="mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" name="name" class="form-control"
                                        value="{{ $data->name }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control"
                                        value="{{ $data->email }}" required>
                                </div>
                                <h3>Change Password</h3>
                                <hr>
                                <div class="mb-3">
                                    <label for="password">New Password</label>
                                    <input type="password" name="password" id="password" class="form-control">
                                </div>
                                <button class="btn btn-primary">Save Changes</button>
                                <button class="btn btn-danger"
                                    onclick="event.preventDefault(); document.getElementById('delete-form').submit();">Delete
                                    Account</button>
                            </form>
                            <form id="delete-form" action="{{ route('delete', ['user' => $data->id]) }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </main>
@endsection
