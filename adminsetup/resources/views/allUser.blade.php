@extends('layout')
@section('title')
AllUsers
@endsection
@section('sbtitle')
alluser
@endsection

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tables</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Tables</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">

                <a class="btn btn-outline-primary " href="{{ route('adduser') }}">Add User</a>
            </div>
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                DataTable Example
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered " id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Age</th>
                            <th>Password</th>
                            <th>Status</th>
                            <th class="text-center" colspan="2">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($collection as $item)
                        <tr>
                            <td> <span> <img style="width: 2em" class="rounded-circle img-thumbnail  "
                                        src="{{ $item->image }}" alt="image"> </span>{{ $item->name }}
                            </td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->age }}</td>
                            <td>{{ $item->password }}</td>

                            @if ($item->status)
                            <td> <span class="badge text-bg-success">Active</span></td>

                            @else
                            <td> <span class="badge text-bg-danger">Deactivate</span>
                            </td>
                            @endif

                            <td><a class="btn btn-outline-warning btn-sm"
                                    href="{{ route('getuser', $item->id) }}">Edit</a></td>
                            <td>
                                <form action="{{ route('delete', $item->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection