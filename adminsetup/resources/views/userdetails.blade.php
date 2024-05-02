@extends('layout')
@section('title')
User Details

@endsection
@section('content')

<div class="row p-4">
    <div class="col-6">

        <div class="card" style="width: 18rem;">
            <img src="/{{$user->image}}" class="card-img-top" alt="image">
            <div class="card-body">
                <h5 class="card-title">{{strtoupper($user->name) }}</h5>
                <p class="card-text">Status:
                    @if ($user->status)
                    <span class="badge text-bg-success">Active</span>
                    @else
                    <span class="badge text-bg-danger">Deactive</span>
                    @endif

                </p>
                {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
            </div>
        </div>

    </div>
    <div class="col-6">
        <div class="card" style="width: 18rem;">

            <div class="card-body">
                <h5 class="card-title">User's Cart</h5>
                <p class="card-text table-responsive">

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cartitems as $item)

                            <tr>
                                <td>{{$item->usercart->name}} </td>
                                <td>{{$item->usercart->price}} </td>
                                <td>{{$item->quantity}} </td>

                            </tr>

                            @endforeach
                            <tr>
                                <td>Total Price</td>
                                <td class="text-center" colspan="2"> ₹{{ \App\Models\UserCart::subtotal2()}}.00</td>
                            </tr>
                        </tbody>
                    </table>
                </p>

            </div>
        </div>
    </div>
</div>
@endsection
