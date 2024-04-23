@extends('layout')

@section('title')
Country
@endsection
@section('sbtitle')
addcountry
@endsection
@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ $message }} <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="d-flex ">
    <form action="{{ route('addcountry') }}" method="POST">
        @csrf
        <div class="d-flex  align-items-center p-2 gap-4">
            <div class="d-flex gap-2 align-items-center ">
                <label for="exampleInputEmail1" class="form-label">Country:</label>
                <input type="text" name="name" placeholder="Enter country name" class="form-control">

            </div>
            @if ($errors->has('name'))
            <span class="text-danger">{{ $errors->first('name') }} </span>
            @endif
            <div>
                <input class="btn btn-success" type="submit" value="Add">
            </div>
        </div>
    </form>
</div>

<div class="container mt-4 ">
    <table class="table border table-striped w-50">
        <thead>
            <tr>
                <th scope="col">S.No.</th>
                <th scope="col">Country</th>
                <th class="text-center" colspan="2" scope="col">Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($country as $key => $item)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td> {{ $item->name }} </td>
                <td><a class="btn btn-warning btn-sm" href="{{route('countryedit',$item->id)}}">Edit</a>
                </td>
                <td>
                    <form action="{{route('countrydelete',$item->id)}}" method="post">
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