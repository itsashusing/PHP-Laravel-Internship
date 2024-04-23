@extends('layout')
@section('title')
Product

@endsection
@section('sbtitle')
products

@endsection
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tables</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Tables</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">

                <a class="btn btn-outline-primary " href="{{ route('addproducts') }}">Add Product</a>
            </div>
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Products Table
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered " id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Discriptions</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Sub Category</th>
                            <th class="text-center" colspan="2">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($product as $item)
                        <tr>
                            <td> <span>
                                    <div id="carouselExampleControls{{$item->id}}" class="carousel slide carousel-fade"
                                        data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            <div style="width: 5rem" class="carousel-item active">
                                                <img style="object-fit: cover; aspect-ratio: 1/1" src="{{$item->image}}"
                                                    class="w-100">
                                            </div>
                                            @foreach ($item->productimages as $pimages)
                                            <div style="width: 5rem" class="carousel-item">
                                                <img style="object-fit: cover; aspect-ratio: 1/1"
                                                    src="{{$pimages->images}}" class="w-100">
                                            </div>
                                            @endforeach
                                        </div>

                                        <a href="#carouselExampleControls{{$item->id}}" class="carousel-control-prev"
                                            type="button" data-bs-slide="prev"> <span
                                                class="carousel-control-prev-icon"></span></a>
                                        <a href="#carouselExampleControls{{$item->id}}" class="carousel-control-next"
                                            type="button" data-bs-slide="next"> <span
                                                class="carousel-control-next-icon"></span></a>

                                    </div>

                                </span>
                            </td>
                            <td class="text-center">{{ $item->name }}</td>
                            <td class="text-center">{{ $item->discriptions }}</td>
                            <td class="text-center">{{ $item->price }}</td>
                            <td class="text-center">{{ $item->category->name }}</td>
                            <td class="text-center">{{ $item->sub_category->name }}</td>
                            <td class="text-center"><a class="btn btn-outline-warning btn-sm"
                                    href="{{ route('getuser', $item->id) }}">Edit</a></td>
                            <td>
                                <form action="{{ route('delete', $item->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection