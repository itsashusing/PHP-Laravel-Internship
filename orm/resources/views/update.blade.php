@extends('layout')

@section('title')
    <div class="h1">Update Product</div>
@endsection

@section('content')
    <div class="d-flex">
        <div style="width: 50vw">
            @foreach ($data as $item)
                <form action="{{ route('product.update', $item->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $item->name }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Discription</label>
                        <textarea class="form-control" name="discriptions" cols="30" rows="10">{{ $item->discriptions }}</textarea>

                    </div>
            @endforeach
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
