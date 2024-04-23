@extends('layout')
@section('title')
Add Category
@endsection
@section('sbtitle')
addcategory
@endsection

@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ $message }} <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="d-flex ">
    <form action="{{ route('addcategory') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="d-flex  align-items-center p-2 gap-4">
            <div class="d-flex gap-2 align-items-center ">
                <label for="exampleInputEmail1" class="form-label h5">Category:</label>
                <input type="text" name="name" placeholder="Enter category name" class="form-control">

            </div>
            @if ($errors->has('name'))
            <span class="text-danger">{{ $errors->first('name') }} </span>
            @endif
            <div>
                <input class="form-control w-75" type="file" name="image">
                @if ($errors->has('image'))
                <span class="text-danger">{{ $errors->first('name') }} </span>
                @endif
            </div>
            <div>
                <input class="btn btn-success" type="submit" value="Add">
            </div>
        </div>
    </form>
</div>
<div class="container mt-4">
    <table class="table border table-striped w-50">
        <thead>
            <tr>
                <th scope="col">S.No.</th>
                <th scope="col">Image</th>
                <th scope="col">Category Name</th>
                <th colspan="2" class="text-center" scope="col">Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($cat as $key => $item)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td><img style="width: 2rem" class="rounded-circle img-thumbnail  " src="{{ $item->image }}"
                        alt="picture"></td>
                <td> {{ $item->name }} </td>
                <td><a class="btn btn-warning btn-sm" href="{{route('editcat',$item->id)}}">Edit</a>
                <td>
                    <form action="{{route('catdelete',$item->id)}}" method="post">
                        @csrf
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection