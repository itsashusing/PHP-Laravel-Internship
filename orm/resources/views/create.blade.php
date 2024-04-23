@extends('layout')

@section('title')
    <div class="h1">Add Product</div>
@endsection

@section('content')
    <div class="d-flex">
        <div style="width: 50vw">

            <form action="{{ route('product.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="mb-3">
                    <label class="form-label">Discription</label>
                    <textarea class="form-control" name="discriptions" cols="30" rows="10"></textarea>

                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
