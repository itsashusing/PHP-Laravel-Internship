@extends('layout')
@section('title')
    Admin Dashboard
@endsection

@section('sbtitle')
    admin dashboard
@endsection

@section('content')
    <div id="page-wrapper">
        <div id="page-inner">

            <!-- /. ROW  -->

            <div class="row">
                <div class="col-lg-12 ">
                    <div class="alert alert-info">
                        <strong>Welcome {{ session('adminname') }} ! </strong>
                    </div>
                </div>
            </div>
            <!-- /. ROW  -->
            <div class="row text-center pad-top">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                    <div class="div-square">
                        <a href="blank.html">
                            <div>
                                <button class="btn btn-success">{{ $usercount }}</button>
                            </div>
                            <h4>Total Users</h4>
                        </a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                    <div class="div-square">
                        <a href="blank.html">
                            <div>
                                <button class="btn btn-success">{{ $activeusercount }}</button>
                            </div>
                            <h4>Active Users</h4>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                    <div class="div-square">
                        <a href="blank.html">
                            <div>
                                <button class="btn btn-success">{{ $cartitems }}</button>
                            </div>
                            <h4>Item in Cart</h4>
                        </a>
                    </div>

                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                    <div class="div-square">
                        <a href="blank.html">
                            <div>
                                <button class="btn btn-success">{{ $productcount }}</button>
                            </div>
                            <h4>Total Products</h4>
                        </a>
                    </div>


                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                    <div class="div-square">
                        <a href="blank.html">
                            <div>
                                <button class="btn btn-success">{{ $categorycount }}</button>
                            </div>
                            <h4>Total Categories </h4>
                        </a>
                    </div>


                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                    <div class="div-square">
                        <a href="blank.html">
                            <div>
                                <button class="btn btn-success">{{ $subcategorycount }}</button>
                            </div>
                            <h4>Total Sub-Categories </h4>
                        </a>
                        </a>
                    </div>


                </div>
            </div>
            {{-- Second Row --}}
            <div class="row text-center pad-top">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                    <div class="div-square">
                        <a href="blank.html">
                            <div>
                                <button class="btn btn-success">{{ $sale }}</button>
                            </div>
                            <h4>Total Sale</h4>
                        </a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                    <div class="div-square">
                        <a  href="blank.html">
                            <div>
                                <button class="btn btn-success">{{ $activeusercount }}</button>
                            </div>
                            <h4>Active Users</h4>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                    <div class="div-square">
                        <a href="blank.html">
                            <div>
                                <button class="btn btn-success">{{ $cartitems }}</button>
                            </div>
                            <h4>Item in Cart</h4>
                        </a>
                    </div>

                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                    <div class="div-square">
                        <a href="blank.html">
                            <div>
                                <button class="btn btn-success">{{ $productcount }}</button>
                            </div>
                            <h4>Total Products</h4>
                        </a>
                    </div>


                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                    <div class="div-square">
                        <a href="blank.html">
                            <div>
                                <button class="btn btn-success">{{ $categorycount }}</button>
                            </div>
                            <h4>Total Categories </h4>
                        </a>
                    </div>


                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                    <div class="div-square">
                        <a href="blank.html">
                            <div>
                                <button class="btn btn-success">{{ $subcategorycount }}</button>
                            </div>
                            <h4>Total Sub-Categories </h4>
                        </a>
                        </a>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
