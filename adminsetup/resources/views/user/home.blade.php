@extends('user.layout')

@section('content')
<!-- slider section -->
<section class=" slider_section position-relative">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @foreach ($sliderimage as $key => $item)
            <div class="carousel-item {{$key ==0 ?'active':''}}">
                <div class="slider_item-box">
                    <div class="slider_item-container">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="offset-md-2 col-md-4">
                                    <div class="slider_item-detail">
                                        <div>

                                            <h2 class="slider_heading">
                                                {{$item->title}} <br />

                                            </h2>
                                            <p>
                                                {{$item->discription}}
                                            </p>
                                            <div class="d-flex">
                                                <a href="#products" class="slider_btn">
                                                    Order Now
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="hero_img-box">
                                        <img src="{{$item->image}}" alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>

<!-- end slider section -->
</div>

<!-- detail section -->
<section class="detail_section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <div class="detail_img-box">
                    <img src="templates/user/images/detail.png" alt="" class="w-100" />
                </div>
            </div>
            <div class=" col-lg-7">
                <div class="detail_container">
                    @foreach ($cat as $key => $item)
                    <div class="detail-box d-box-{{$key +1}}">
                        <a href="{{route('index',['category_id' =>$item->id])}}">
                            <div class="detail-content">
                                <img src="{{$item->image}}" alt="" />
                                <h5>
                                    {{$item->name}}
                                </h5>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end detail section -->

<!-- products section -->
<section id="products" class="products_section">
    <div class="heading_container">
        <h2>
            All Products In Store
        </h2>
        <p>
            Featured Product Just Arrived
        </p>
    </div>

    <div class="container layout_padding">
        <div class="product_container ">
            <div class="d-flex flex-wrap">
                @foreach ($product as $item)
                <div>
                    <a href="{{route('product',$item->id)}}">
                        <div class="product_box ">
                            <div style="overflow: hidden; width:120px; " class="product_img-box ">
                                <img class=" w-100 " style="object-fit: cover; aspect-ratio: 1/1" src="{{$item->image}}" />
                                <span class="m-2">
                                    {{$item->name}}
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
    </div>

</section>
<div class="bg-white">
    <section class="find_section layout_padding-bottom">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-8 offset-md-2">
                    <div class="find_container">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="find_container-img">
                                    <img src="/templates/user/images/find-img.png" alt="" />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <h3>
                                    Find Everything <br />
                                    From A to Z
                                </h3>
                                <p>
                                    Shop Back to school
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="shop_container">
                        <div class="row">
                            <div class="col-sm-6">
                                <p>
                                    Shoes
                                </p>
                                <h3>
                                    Shop by catagories
                                </h3>
                                <div>
                                    <a href="">
                                        View More
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="shoe_img-box">
                                    <img src="/templates/user/images/shoes.png" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="find_img-box">
                        <img src="/templates/user/images/find-hero.png" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection
