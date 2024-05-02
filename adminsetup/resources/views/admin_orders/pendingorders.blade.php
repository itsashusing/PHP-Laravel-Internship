@extends('layout')
@section('title')
    Pending Orders
@endsection
@section('sbtitle')
    Pending Orders
@endsection
@section('content')
    <div class="container-fluid table-responsive">


        <table class="table table-bordered m-4 table-striped-columns ">
            <thead>
                <tr>
                    <th scope="col">S.No.</th>
                    <th scope="col">User</th>
                    <th class="text-center" scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total Price</th>
                    <th class="text-center" colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $key => $order)
                    <tr>
                        <th scope="row">{{ $key + 1 }} </th>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ $order->product->name }} <span style="float: right"><img src="{{ $order->product->image }}"
                                    style="width: 2rem"></span> </td>
                        <td>{{ $order->product->price }}</td>
                        <td>{{ $order->quantity }} </td>
                        <td>{{ $order->totalprice }} </td>
                        <td class="d-flex justify-content-around">
                            <a class="btn" href="{{ route('acceptorder', $order->id) }}">
                                <i style="font-size: 1.3em" class="fa-solid fa-check"></i>
                            </a>
                            <a class="btn" href="{{ route('rejectorders', $order->id) }}"><i style="font-size: 1.3em"
                                    class="fa-solid fa-circle-xmark"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
