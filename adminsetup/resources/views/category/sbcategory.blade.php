@extends('layout')
@section('title')
Add Sub Category
@endsection
@section('sbtitle')
addsubcategory
@endsection

@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ $message }} <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="d-flex  ">
    <div>
        <form action="{{ route('addsbcategory') }}" method="POST" enctype="multipart/form-data">
            @csrf
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
                    <input type="text" name="name" placeholder="Enter sub category name" class="form-control">

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
</div>
<div class="container mt-4">
    <table class="table border table-striped w-50">
        <thead>
            <tr>
                <th scope="col">S.No.</th>
                <th scope="col">Image</th>
                <th scope="col">Sub Category </th>
                <th scope="col">Category </th>
                <th colspan="2" class="text-center" scope="col">Action</th>


            </tr>
        </thead>
        <tbody>
            @foreach ($sbCat as $key => $item)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td><img style="width: 2rem" class="rounded-circle img-thumbnail  " src="{{ $item->image }}"
                        alt="picture"></td>
                <td> {{ $item->name }} </td>
                <td> {{ $item->catetory->name }}</td>
                <td><a class="btn btn-warning btn-sm" href="{{route('editsbcat',$item->id)}}">Edit</a>
                    <td>
                        <form action="{{route('sbcatdelete',$item->id)}}" method="post">
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