@extends('layout')
@section('title')
Add Product
@endsection
@section('sbtitle')
addproduct
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
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">Add a product</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('addproducts') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" name="name" id="inputFirstName" type="text"
                                            value="{{ old('name') }}" placeholder="Enter Product name" />
                                        <label for="inputFirstName">Product name</label>
                                        @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }} </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input class="form-control" value="{{ old('price') }}" name="price" id="price"
                                            type="number" placeholder="Enter Price" />
                                        <label for="price">Price</label>
                                        @if ($errors->has('price'))
                                        <span class="text-danger">{{ $errors->first('price') }} </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-floating">
                                    <input class="form-control" value="{{ old('quantity') }}" name="quantity" id="quantity"
                                        type="number" placeholder="Enter quantity" />
                                    <label for="quantity">Quantity</label>
                                    @if ($errors->has('quantity'))
                                    <span class="text-danger">{{ $errors->first('quantity') }} </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" value="{{ old('discription') }}" name="discription"
                                    id="discription" type="text" placeholder="name@example.com" />
                                <label for="discription">Discriptions</label>
                                @if ($errors->has('discription'))
                                <span class="text-danger">{{ $errors->first('discription') }} </span>
                                @endif
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <div>
                                            <select name="category" class="form-select " onchange="catof(this.value)"
                                                aria-label="form-select-sm example">
                                                <option>Select category</option>
                                                @foreach ($cat as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}
                                                </option>
                                                @endforeach

                                            </select>
                                            @if ($errors->has('category'))
                                            <span class="text-danger">{{ $errors->first('category') }}
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 ">
                                        <div>
                                            <select id="category" name="subcategory" class="form-select "
                                                aria-label="form-select-sm example">
                                                <option>Select Sub Category</option>

                                            </select>
                                            @if ($errors->has('subcategory'))
                                            <span class="text-danger">{{ $errors->first('subcategory') }}
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-floating mb-3 col-6">
                                        <div>
                                            <span>Poster Image</span>
                                            <input class="form-control" name="image1" id="image1" type="file" />
                                            @if ($errors->has('image1'))
                                            <span class="text-danger">{{ $errors->first('image1') }} </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-floating mb-3 col-6">
                                        <div>
                                            <span>Slider Image</span>
                                            <input class="form-control" multiple name="image2[]" id="image2"
                                                type="file" />
                                            @if ($errors->has('image2'))
                                            <span class="text-danger">{{ $errors->first('image2') }} </span>
                                            @endif
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <div class="mt-4 mb-0">
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

<script>
    function catof(id) {

            var xhttp = new XMLHttpRequest();
            xhttp.open('GET', 'http://127.0.0.1:8000/addproducts/' + id, true);
            xhttp.send();
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    document.getElementById('category').innerHTML = xhttp.responseText;
                }
            }
        }
</script>
@endsection