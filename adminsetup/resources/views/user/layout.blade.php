<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Zezmon</title>

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="/templates/user/css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Dosis:400,500|Poppins:400,700&display=swap" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="/templates/user/css/style.css" rel="stylesheet" />
    <link href="/templates/css/styles.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="/templates/user/css/responsive.css" rel="stylesheet" />
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        <header class="header_section">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg custom_nav-container">
                    <a class="navbar-brand" href="{{ route('index') }}">
                        <img src="/templates/user/images/logo.png" alt="" /><span>
                            Zezmon
                        </span>
                    </a>

                    <div class="navbar-collapse" id="">
                        <div class="container">
                            <div class=" mr-auto flex-column flex-lg-row align-items-center">
                                <ul class="navbar-nav justify-content-between ">
                                    <div class="d-none d-lg-flex">
                                        <li class="nav-item">
                                            <a class="nav-link" href="fruit.html">
                                                Customer Number : 01234567890</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="service.html">
                                                Demo@gmail.com
                                            </a>
                                        </li>
                                    </div>
                                    <div class=" d-none d-lg-flex">
                                        @if (session('userid'))
                                        <li class="nav-item d-flex">
                                            <a class="nav-link" href="{{ route('userlogout') }}">
                                                Logout
                                            </a>
                                            <a class="nav-link" href="{{ route('userprofile') }}">
                                                Profile
                                            </a>
                                        </li>
                                        @else
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('userlogin') }}">
                                                Login / Register
                                            </a>
                                        </li>
                                        @endif
                                        <form action="{{route('index')}}" class="d-flex" method="get" >
                                            <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
                                            <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button> </form>
                                        </form>
                                    </div>
                                </ul>
                            </div>
                        </div>

                        <div class="custom_menu-btn">
                            <button onclick="openNav()"></button>
                        </div>
                        <div id="myNav" class="overlay">
                            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                            <div class="overlay-content">
                                <a href="index.html">HOME</a>
                                <a href="product.html">PRODUCTS</a>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <!-- end header section -->


        @if (session('success'))
        <div class="bg-white  p-2">
            <div class="alert alert-success alert-dismissible " role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                {{ session('success') }}
            </div>
        </div>
        @endif
        @if (session('danger'))
        <div class="bg-white p-2">
            <div class="alert alert-warning alert-dismissible " role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                {{ session('danger') }}
            </div>
        </div>
        @endif

        @yield('content')

        <section class="client_section layout_padding">
            <div class="container">
                <h2>
                    What our Customer says
                </h2>
                <div id="carouselExample2Controls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row layout_padding2">
                                <div class="col-md-6">
                                    <div class="client_box">
                                        <div class="client_id-box">
                                            <div class="client_img-box">
                                                <img src="/templates/user/images/client.png" alt="" />
                                            </div>
                                            <h4>Carlac liyo</h4>
                                        </div>
                                        <div class="client_detail">
                                            <p>
                                                There are many variations of passages of Lorem Ipsum
                                                available, but the majority have suffered alteration in some
                                                form, by injected humour, or randomised words which don't look
                                                even slightly believable. If you are going to use a passage of
                                                Lorem Ipsum, you need to be sure there isn't anything
                                                embarrassing hidden in the middle of text.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="client_box">
                                        <div class="client_id-box">
                                            <div class="client_img-box">
                                                <img src="/templates/user/images/client.png" alt="" />
                                            </div>
                                            <h4>Carlac liyo</h4>
                                        </div>
                                        <div class="client_detail">
                                            <p>
                                                There are many variations of passages of Lorem Ipsum
                                                available, but the majority have suffered alteration in some
                                                form, by injected humour, or randomised words which don't look
                                                even slightly believable. If you are going to use a passage of
                                                Lorem Ipsum, you need to be sure there isn't anything
                                                embarrassing hidden in the middle of text.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row layout_padding2">
                                <div class="col-md-6">
                                    <div class="client_box">
                                        <div class="client_id-box">
                                            <div class="client_img-box">
                                                <img src="/templates/user/images/client.png" alt="" />
                                            </div>
                                            <h4>Carlac liyo</h4>
                                        </div>
                                        <div class="client_detail">
                                            <p>
                                                There are many variations of passages of Lorem Ipsum
                                                available, but the majority have suffered alteration in some
                                                form, by injected humour, or randomised words which don't look
                                                even slightly believable. If you are going to use a passage of
                                                Lorem Ipsum, you need to be sure there isn't anything
                                                embarrassing hidden in the middle of text.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="client_box">
                                        <div class="client_id-box">
                                            <div class="client_img-box">
                                                <img src="/templates/user/images/client.png" alt="" />
                                            </div>
                                            <h4>Carlac liyo</h4>
                                        </div>
                                        <div class="client_detail">
                                            <p>
                                                There are many variations of passages of Lorem Ipsum
                                                available, but the majority have suffered alteration in some
                                                form, by injected humour, or randomised words which don't look
                                                even slightly believable. If you are going to use a passage of
                                                Lorem Ipsum, you need to be sure there isn't anything
                                                embarrassing hidden in the middle of text.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row layout_padding2">
                                <div class="col-md-6">
                                    <div class="client_box">
                                        <div class="client_id-box">
                                            <div class="client_img-box">
                                                <img src="/templates/user/images/client.png" alt="" />
                                            </div>
                                            <h4>Carlac liyo</h4>
                                        </div>
                                        <div class="client_detail">
                                            <p>
                                                There are many variations of passages of Lorem Ipsum
                                                available, but the majority have suffered alteration in some
                                                form, by injected humour, or randomised words which don't look
                                                even slightly believable. If you are going to use a passage of
                                                Lorem Ipsum, you need to be sure there isn't anything
                                                embarrassing hidden in the middle of text.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="client_box">
                                        <div class="client_id-box">
                                            <div class="client_img-box">
                                                <img src="/templates/user/images/client.png" alt="" />
                                            </div>
                                            <h4>Carlac liyo</h4>
                                        </div>
                                        <div class="client_detail">
                                            <p>
                                                There are many variations of passages of Lorem Ipsum
                                                available, but the majority have suffered alteration in some
                                                form, by injected humour, or randomised words which don't look
                                                even slightly believable. If you are going to use a passage of
                                                Lorem Ipsum, you need to be sure there isn't anything
                                                embarrassing hidden in the middle of text.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExample2Controls" role="button" data-slide="prev">

                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExample2Controls" role="button" data-slide="next">

                        <span class="sr-only">Next</span>
                    </a>
                </div>

            </div>
            <div class="container">
                <div class="item_container">
                    <div class="row">
                        <div class="col-sm-7">
                            <h3>
                                Best offers on any makeup items
                            </h3>
                            <p>
                                Contrary to popular belief, Lorem Ipsum is not simply random
                                text. It has roots in a piece of classical
                            </p>
                            <div>
                                <a href="">
                                    Shop Now
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="item_img-box">
                                <img src="/templates/user/images/items.png" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end client section -->

        <!-- sign section -->
        <section class="sign_section layout_padding2">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <h3>
                            Sign up for Newsletter
                        </h3>
                        <p>
                            There are many variations of passages of Lorem Ipsum available,
                            but the majority have suffered
                        </p>
                    </div>
                    <div class="col-md-7">
                        <form action="">
                            <input type="email" placeholder="Enter your email" />
                            <button>
                                Sign Up
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- end sign section -->

        <!-- info section -->
        <section class="info_section layout_padding">
            <div class="container links_container">
                <div class="row ">
                    <div class="col-md-3">
                        <h3>
                            CUSTOMER SERVICE
                        </h3>
                        <ul>
                            <li>
                                <a href="">
                                    International Help
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    Contact Customer Care
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    Return Policy
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    Privacy Policy
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    Shipping Information
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    Promotion Terms
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h3>
                            LET US HELP YOU
                        </h3>
                        <ul>
                            <li>
                                <a href="">
                                    Your Account
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    Your Orders
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    Shipping Rates & Policies
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    Amazon Prime
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    Returns & Replacements
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    Help
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h3>
                            INFORMATION
                        </h3>
                        <ul>
                            <li>
                                <a href="">
                                    About Us
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    Careers
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    Sell on shop
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    Press & News
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    Competitions
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    Terms & Conditions
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h3>
                            OUR SHOP
                        </h3>
                        <ul>
                            <li>
                                <a href="">
                                    Daily Deals
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    App Only Deals
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    Our Hottest Products
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    Gift Vouchers
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    Trending Product
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    Hot Flash Sale
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="follow_container">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="app_container">
                                <h3>
                                    DOWNLOAD OUR APPS

                                </h3>
                                <div>
                                    <img src="/templates/user/images/google-play.png" alt="">
                                    <img src="/templates/user/images/apple-store.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 ">
                            <div class="info_social">
                                <div>
                                    <a href="">
                                        <img src="/templates/user/images/fb.png" alt="">
                                    </a>
                                </div>
                                <div>
                                    <a href="">
                                        <img src="/templates/user/images/twitter.png" alt="">
                                    </a>
                                </div>
                                <div>
                                    <a href="">
                                        <img src="/templates/user/images/linkedin.png" alt="">
                                    </a>
                                </div>
                                <div>
                                    <a href="">
                                        <img src="/templates/user/images/instagram.png" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- end info section -->

        <!-- footer section -->
        <section class="container-fluid footer_section">
            <p>
                Copyright &copy; 2019 All Rights Reserved By
                <a href="https://html.design/">Free Html Templates</a>
            </p>
        </section>
        <!-- footer section -->

        <script type="text/javascript" src="/templates/user/js/jquery-3.4.1.min.js"></script>
        <script type="text/javascript" src="/templates/user/js/bootstrap.js"></script>
        <script src="/templates/js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
        </script>

        <script>
            function openNav() {
                document.getElementById("myNav").style.width = "100%";
            }

            function closeNav() {
                document.getElementById("myNav").style.width = "0%";
            }

        </script>
</body>

</html>
