@extends('layout')
@section('title')
@endsection
@section('content')
    <div class="container">
        <table class="table table-bordered ">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Discription</th>
                    <th colspan="3" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $key => $item)
                    <tr>
                        <th>{{ $key + 1 }}</th>
                        <th>{{ $item->id }} </th>
                        <td>{{ $item->name }} </td>
                        <td>{{ $item->discriptions }} </td>
                        <td><a class="btn btn-outline-primary btn-sm" href="{{ route('product.show', $item->id) }}">View</a>
                        </td>
                        <td><a class="btn btn-outline-warning btn-sm" href="{{ route('product.edit', $item->id) }}">Update</a>
                        </td>
                        <td>
                            <form action="{{ route('product.destroy', $item->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger btn-sm" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            <a class="btn btn-outline-primary" href="{{route('product.create')}}">Add More</a>
        </div>
    </div>
@endsection
