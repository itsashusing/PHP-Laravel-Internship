@extends('user.layout')
@section('content')
<div class="bg-white p-4">
    <div class="row">
        <div class="col-md-6">
            <div class="client_box row">
                <div class="col-md-6">
                    <div class="">
                        <div class="client_id-box">
                            <div class="client_img-box">
                                <img src="{{$user->image}}" alt="" />
                            </div>
                            <div class="pl-3 ">
                                <h4 class="text-start ml-4">{{$user->name}}</h4>
                                <p class="text-start ml-4">{{$user->email}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="client_detail">
                        {{-- some this others --}}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="ms-0 mt-2">
                        <button class="btn btn-sm border  btn-outline-dark" onclick="address()">Add Address</button>
                        <div class="d-flex gap-3 align-items-center">
                            <span class="h5">Status: </span>
                            @if ($user->status)
                            <span class="badge text-bg-success ">Active</span>
                            @else
                            <span class="badge text-bg-danger">Deactivate</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div id="addresslist" class="col-md-6 table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">S.No.</th>
                        <th scope="col">Village</th>
                        <th scope="col">District</th>
                        <th scope="col">State</th>
                        <th scope="col">Country</th>
                        <th colspan="2" scope="col">Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($useraddress as $key => $item)
                    <tr class="{{$item->default==" 1" ? "table-success" : "" }}">
                        <th scope="row">{{$key+1}}</th>
                        <td>{{$item->villagename}}</td>
                        {{-- <td>{{$item->default}}</td> --}}
                        <td>{{$item->userdistrict->name}}</td>
                        <td>{{$item->userstate->name}}</td>
                        <td>{{$item->usercountry->name}}</td>
                        <td class="d-flex gap-2 "><button onclick="editaddress({{$item->id}})" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#popupModal">Edit</button>
                            <form action="{{route('deleteuseraddress',$item->id)}}" method="post">
                                @csrf
                                <button class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- POPUP DIV --}}
        <div class="modal fade" id="popupModal" tabindex="-1" role="dialog" aria-labelledby="popupModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="popupModalLabel">Edit Address</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div id="modal-body" class="modal-body">
                        <div>
                            <form action="{{ route('deleteuseraddress') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 ">
                                            <input type="text" id="addressid" name="address_id" hidden>
                                            <input class="form-control" name="villagename" id="inputFirstNamepop" type="text" placeholder="Enter Village name" />
                                            <label for="inputFirstName">Village Name</label>
                                            @if ($errors->has('villagename'))
                                            <span class="text-danger">{{ $errors->first('villagename') }} </span>
                                            @endif

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 ">
                                            <select onchange="usercountryof(this.value)" name="usercountry" class="form-select" aria-label="Default select example">
                                                <option selected>Select Country</option>
                                                @foreach ($country as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('usercountry'))
                                            <span class="text-danger">{{ $errors->first('usercountry') }} </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 ">
                                            <select onchange="userstateof(this.value)" name="userstates" id="userstates" class="form-select" aria-label="Default select example">
                                                <option selected>Select State</option>
                                            </select>
                                            @if ($errors->has('userstate'))
                                            <span class="text-danger">{{ $errors->first('userstate') }} </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 ">
                                            <select name="userdistict" id="userdisticts" class="form-select" aria-label="Default select example">
                                                <option selected>Select Distirct</option>
                                            </select>
                                            @if ($errors->has('userdistict'))
                                            <span class="text-danger">{{ $errors->first('userdistict') }} </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="ms-3 form-check">
                                        <input {{$item->default==" 1" ? "checked" : ""}} type="checkbox" name="default" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Make as default</label>
                                    </div>
                                </div>
                                <div class="mt-4 mb-3">
                                    <div class="d-grid"><button type="submit" class="btn" style="background-color: #F6F1ED">Update
                                            Address</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div id="popup" style="display: none">
            <div style="width: 50%" class="position-relative">
                <span class="btn btn-sm rounded btn-danger position-absolute top-0 end-0"
                    onclick="closePopup()">close</span>
                <p>This is a pop-up div!</p>
            </div>
        </div> --}}
        <div id="address" style="display: none" class="col-md-6">
            <form action="{{ route('userprofile') }}" method="POST">
                @csrf
                <div class="row ">
                    <div class="col-6">
                        <div class="form-floating mb-3 ">
                            <input class="form-control" name="name" id="inputFirstName" type="text" placeholder="Enter Village name" />
                            <label for="inputFirstName">Village Name</label>
                            @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }} </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-floating mb-3 ">
                            <select onchange="countryof(this.value)" name="country" class="form-select" aria-label="Default select example">
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
                    <div class="col-6">
                        <div class="form-floating mb-3 ">
                            <select onchange="stateof(this.value)" name="state" id="states" class="form-select" aria-label="Default select example">
                                <option selected>Select State</option>
                            </select>
                            @if ($errors->has('state'))
                            <span class="text-danger">{{ $errors->first('state') }} </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-floating mb-3 ">
                            <select name="distict" id="disticts" class="form-select" aria-label="Default select example">
                                <option selected>Select Distirct</option>
                            </select>
                            @if ($errors->has('distict'))
                            <span class="text-danger">{{ $errors->first('distict') }} </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="d-grid"><button type="submit" class="btn" style="background-color: #F6F1ED">Add
                            Address</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- Cart Section Start from here --}}
<div class="bg-white">
    <div class="container ">
        <h1 class="text-center"> Item In your Cart</h1>
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="product-table table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cartitems as $item)
                            <tr>
                                <td class="col-sm-8 col-md-6">
                                    <div class="media"> <a class="thumbnail pull-left" href="{{route('product', $item->usercart->id)}}"> <img style="width: 5rem" class="" src="{{$item->usercart->image}}" alt="website template image"></a>
                                        <div class="media-body ms-3">
                                            <a class="h4" href="{{route('product', $item->usercart->id)}}">{{$item->usercart->name}}</a><br>
                                            @if ($item->usercart->quantity >0)
                                            <span>Status:</span><span class="text-success">In Stock </span>

                                            @else
                                            <span>Status:</span><span class="text-danger">Out of Stock</span>

                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td class="col-sm-1 col-md-1" style="text-align: center">
                                    <div class="d-flex align-items-center gap-2">
                                        <div><button onclick="increment({{$item->usercart->id}})" class="btn"><i class="bi bi-plus-lg"></i></button></div>
                                        <button class="btn" id="quantity" disabled>{{$item->quantity}}</button>

                                        <div><button onclick="decrement({{$item->usercart->id}})" class="btn"><i class="bi bi-dash-lg"></i></button></div>
                                    </div>

                                </td>
                                <td class="col-sm-1 col-md-1 text-center">
                                    <p id="price" class="price_table" hidden>{{$item->usercart->price}} </p>
                                    <p class="price_table">₹{{$item->usercart->price}} .00</p>

                                </td>
                                <td class="col-sm-1 col-md-1 text-center">
                                    {{-- {{$item->usercart->id}} --}}
                                    <p id="total" class="price_table">₹{{ \App\Models\UserCart::subtotal($item->usercart->id)}} .00</p>
                                </td>
                                <td class="col-sm-1 col-md-1">
                                    <a href="{{route('removecartitem', $item->usercart->id)}}" class="btn btn-danger text-white mx-4">Remove
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- <table class="table">
                        <tbody>
                            <tr class="cart-form">
                                <td class="actions">
                                    <div class="coupon">
                                        <input name="coupon_code" class="input-text" id="coupon_code"
                                            placeholder="Coupon code" type="text">
                                        <input class="button" name="apply_coupon" value="Apply coupon" type="submit">
                                    </div>
                                    <input class="button" name="update_cart" value="Update cart" disabled=""
                                        type="submit">
                                </td>
                            </tr>
                        </tbody>
                    </table> --}}
                </div>
                <div class="shopping-cart-cart">
                    <table>
                        <tbody>
                            <tr class="head-table">
                                <td>
                                    <h5>Cart Totals</h5>
                                </td>
                                <td class="text-right"></td>
                            </tr>
                            <tr>
                                <td>
                                    <h4>Subtotal</h4>
                                </td>
                                <td class="text-right">

                                    <h4 id="sub-total">₹{{ \App\Models\UserCart::subtotal2() }}.00</h4>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Estimated shipping</h5>
                                </td>
                                <td class="text-right">
                                    <h4>00.00</h4>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h3>Total</h3>
                                </td>
                                <td class="text-right">
                                    <h4 id="grand-total">₹{{ \App\Models\UserCart::subtotal2() }}.00
                                    </h4>
                                </td>
                            </tr>

                            <tr>
                                <td><a href="{{route('index')}}" type="button" class="btn btn-primary">Continue
                                        Shopping</a></td>
                                <td><button class="btn btn-success">Checkout</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function address() {
        console.log('Function runs');
        const address = document.getElementById('address').style.display;
        const addresslist = document.getElementById('addresslist').style.display;
        if (address == 'none') {
            document.getElementById('addresslist').style.display = 'none'
            document.getElementById('address').style.display = 'block';
        } else {
            document.getElementById('address').style.display = 'none';
            document.getElementById('addresslist').style.display = 'block'
        }
    }

    function increment(id) {
        var xhttp = new XMLHttpRequest();
        xhttp.open("GET", "http://127.0.0.1:8000/increment/" + id, true);
        xhttp.send();
        xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                location.reload();
            }
        }
    }

    function decrement(id) {
        var xhttp = new XMLHttpRequest();
        xhttp.open("GET", "http://127.0.0.1:8000/decrement/" + id, true);
        xhttp.send();
        xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                location.reload();
            }
        }
    }

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

    function stateof(id) {
        console.log('Function runs');
        console.log(id);
        var xhttp = new XMLHttpRequest();
        xhttp.open("GET", "http://127.0.0.1:8000/area/" + id, true);
        xhttp.send();
        xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                document.getElementById('disticts').innerHTML = xhttp.responseText;
            }
        }
    }

    function usercountryof(id) {
        console.log(id);
        var xhttp = new XMLHttpRequest();
        xhttp.open("GET", "http://127.0.0.1:8000/district/" + id, true);
        xhttp.send();
        xhttp.onreadystatechange = function() {
            console.log(xhttp.responseText);
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                document.getElementById('userstates').innerHTML = xhttp.responseText;

            }
        }
    }

    function userstateof(id) {
        console.log('Function runs');
        console.log(id);
        var xhttp = new XMLHttpRequest();
        xhttp.open("GET", "http://127.0.0.1:8000/area/" + id, true);
        xhttp.send();
        xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                document.getElementById('userdisticts').innerHTML = xhttp.responseText;
            }
        }
    }




    function editaddress(id) {
        var inputElement = document.getElementById("addressid");
        inputElement.value = id;
        var xhttp = new XMLHttpRequest();
        xhttp.open("GET", "http://127.0.0.1:8000/updateaddress/" + id, true);
        xhttp.send();
        xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                document.getElementById('inputFirstNamepop').value = xhttp.responseText;
            }
        }
    }

</script>
@endsection
