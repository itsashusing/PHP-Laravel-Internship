@extends('layout')
@section('content')
<div class="container">
    <div class="d-flex p-4 justify-content-center">


        <form class="border p-4 rounded" style="width:480px" action="{{ route('slider') }}" method="post"
            enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="exampleInputEmail1">
                @if ($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }} </span>
                @endif
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Discription</label>
                <input type="text" name="discription" class="form-control" id="exampleInputPassword1">
                @if ($errors->has('discription'))
                    <span class="text-danger">{{ $errors->first('discription') }} </span>
                    
                @endif
            </div>
            <div class="mb-3">
                <input class="form-control" type="file" name="image" >
                @if ($errors->has('image'))
                    <span class="text-danger">{{ $errors->first('image') }} </span>
                    
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    </div>
</div>
@endsection