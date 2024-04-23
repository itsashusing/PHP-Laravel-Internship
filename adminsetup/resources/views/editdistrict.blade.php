@extends('layout')
@section('title')
Edit District
@endsection
@section('sbtitle')
editdistrict
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
                        <h3 class="text-center font-weight-light my-4">Edit {{ $district->name }}</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('editdistrict') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input type="text" name="id" hidden value="{{ $district->id }}">
                                        <input class="form-control" name="name" id="inputFirstName" type="text"
                                            value="{{ $district->name }}" placeholder="Enter Country name" />
                                        <label for="inputFirstName">Name</label>
                                        @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }} </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 ">
                                        <select onchange="countryof(this.value)" name="country" class="form-select"
                                            aria-label="Default select example">
                                            <option selected>Select Country</option>
                                            @foreach ($country as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('country'))
                                        <span class="text-danger">{{ $errors->first('country') }} </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 ">
                                        <select name="state" id="states" class="form-select"
                                            aria-label="Default select example">
                                            <option selected>Select State</option>

                                        </select>
                                        @if ($errors->has('state'))
                                        <span class="text-danger">{{ $errors->first('state') }} </span>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <div class="mt-4 mb-3">
                                <div class="d-grid"><button type="submit"
                                        class="btn btn-primary btn-block">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    function countryof(id) {
            console.log(id);
            var xhttp = new XMLHttpRequest();
            xhttp.open("GET", "http://127.0.0.1:8000/district/" + id, true);
            xhttp.send();
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    document.getElementById('states').innerHTML = xhttp.responseText;
                }
            }

        }
</script>
@endsection