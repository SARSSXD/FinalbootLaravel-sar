@extends('pages.master')
@section('content')
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
@endsection
