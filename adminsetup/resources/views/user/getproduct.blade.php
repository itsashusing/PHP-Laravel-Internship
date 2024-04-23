@extends('user.layout')
@section('content')

<div class="bg-white ">
    <div class="row p-2  " style="margin-bottom: 7rem">
        <div class="col-6 ">
            <div>
                <div id="carouselExampleControls" class="carousel slide border border-white" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($product as $item)
                        <div style="overflow: hidden; " class="carousel-item active  ">
                            <img style="max-height: 300px" src="/{{$item->image}}" class="d-block w-100" alt="...">
                        </div>
                        @endforeach
                        @foreach ($product as $images)
                        @foreach ($images->productimages as $item)
                        <div style="overflow: hidden; " class="carousel-item  ">
                            <img style="max-height: 300px" src="/{{$item->images}}" class="d-block w-100" alt="...">
                        </div>
                        @endforeach
                        @endforeach
                    </div>

                </div>
                <button class="carousel-control-prev " type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="prev">
                    <i class="bi bi-arrow-left-circle-fill  rounded text-primary" style="font-size: 2rem;"
                        aria-hidden="true"></i>
                    <span class="visually-hidden">Previous</span>

                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="next">
                    <i class="bi bi-arrow-right-circle-fill  rounded text-primary" style="font-size: 2rem;"
                        aria-hidden="true"></i>
                    <span class="visually-hidden">Next</span>
                </button>

            </div>

        </div>
        <div class="  col-6">

            <div class=" p-2 border border-white">
                @foreach ($product as $item)
                <div class=" p-2 ">
                    <div class="card-body">
                        <h5 class="card-title h4">{{$item->name}}</h5>

                        <span
                            class="card-subtitle mb-2 badge rounded-pill text-bg-warning">{{$item->category->name}}</span>
                        <div class="description">
                            <p>{{ \Illuminate\Support\Str::limit($item->discriptions, $limit = 80, $end = '...') }}</p>

                        </div>



                        <a class="card-link  text-decoration-underline h3">₹{{$item->price}}.00</a>
                        @php
                        $isInCart = false;
                        foreach ($cart as $cartitem) {
                        if ($cartitem->userid == session('userid') && $cartitem->productid == $item->id) {
                        $isInCart = true;
                        break;
                        }
                        }
                        @endphp
                        @if ($isInCart)
                        <a href="{{route('removecartitem', $item->id)}}" class="btn btn-danger text-white mx-4">Remove
                            from cart</a>
                        @else
                        @if ($item->quantity > 0)
                        <a href="{{route('addtocartitem', $item->id)}}" class="btn btn-success text-white mx-4">Add to
                            cart</a>
                            <br> <span>Status:</span><span class="text-success">In Stock</span>
                        @else
                        <button disabled class="btn btn-success text-white mx-4">Add to
                            cart</button> <br> <span>Status:</span><span class="text-danger">Out of Stock</span>
                        @endif

                        @endif

                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <div>


        <!-- products section -->
        <section class="products_section">
            <div class="heading_container">
                <h2>
                    New Products In Store
                </h2>
                <p>
                    Featured Product Just Arrived
                </p>
            </div>
            <div class="container layout_padding">
                <div class="product_container">
                    @foreach ($recentproduct as $item)


                    <div>
                        <a href="{{route('product',$item->id)}}">
                            <div class="product_box ">
                                <div style="overflow: hidden; width:120px; " class="product_img-box ">
                                    <img class=" w-100 " style="object-fit: cover; aspect-ratio: 1/1"
                                        src="/{{$item->image}}" />
                                    <span class="m-2">
                                        Sale
                                    </span>
                                </div>
                                <div class="product_detail-box">
                                    <span>
                                        ${{$item->price}}.00
                                    </span>
                                    <p>
                                        {{ Illuminate\Support\Str::words($item->discriptions, 20, '...') }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach


                </div>
            </div>
        </section>
    </div>
</div>
<!-- end products section -->
@endsection

<script>

</script>