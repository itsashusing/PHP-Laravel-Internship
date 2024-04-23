@extends('layout')
@section('title')
Edit Sub Category

@endsection
@section('sbtitle')
editsubcategory

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
    <div>
        <form action="{{ route('editsbcat', $sbcat->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="d-flex  align-items-center p-2 gap-4">
                <select name="category" class="form-select w-25" aria-label="Default select example">
                    <option>Salect a category</option>
                    @foreach ($cat as $item)
                    <option value='{{ $item->id }}'>{{ $item->name }}</option>
                    @endforeach
                </select>
                <div>

                    @if ($errors->has('category'))
                    <span class="text-danger">{{ $errors->first('category') }} </span>
                    @endif
                </div>
                <div class="d-flex gap-2 align-items-center ">
                    <label for="exampleInputEmail1" class="form-label h5">Sub Category:</label>
                    <input type="text" name="name" value="{{$sbcat->name}}" placeholder="Enter sub category name"
                        class="form-control">

                </div>
                @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }} </span>
                @endif

                <div>
                    <input class="form-control " type="file" name="image">
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