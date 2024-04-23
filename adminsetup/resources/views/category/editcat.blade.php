@extends('layout')
@section('title')
Edit Category

@endsection
@section('sbtitle')
editcategory

@endsection
@section('content')
<div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ $message }} <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
</div>
<div class="container">
    <form action="{{ route('editcat',2) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="d-flex  align-items-center p-2 gap-4">
            <div class="d-flex gap-2 align-items-center ">
                <label for="exampleInputEmail1" class="form-label h5">Category:</label>
                <input type="text" name="name" value="{{$cat->name}}" placeholder="Enter category name"
                    class="form-control">

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
@endsection