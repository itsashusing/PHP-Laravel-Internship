@extends('layout')
@section('title')
Edit Country
@endsection
@section('sbtitle')
editcountry
@endsection
@section('content')

<main>
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ $message }} <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg m-5">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">Edit {{ $country->name }}</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('editcountry') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input type="text" name="id" hidden value="{{ $country->id }}">
                                        <input class="form-control" name="name" id="inputFirstName" type="text"
                                            value="{{ $country->name }}" placeholder="Enter Country name" />
                                        <label for="inputFirstName">Name</label>
                                        @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }} </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 mb-3">
                                <div class="d-grid"><button type="submit" class="btn btn-primary btn-block">Add</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection