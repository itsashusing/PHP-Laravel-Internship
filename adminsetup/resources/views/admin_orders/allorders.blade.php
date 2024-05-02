@extends('layout')
@section('title')
    All Orders
@endsection
@section('sbtitle')
    All Orders
@endsection
@section('content')
    <div class="d-flex">
        <div class="p-2">
            Show Records:
            <form id="myForm" action="{{ route('allorders') }}" method="post">
                @csrf
                <select class="form-select" onchange="submitForm()" name="select" id="pageSelect">
                    <option value="">Select Rows</option>
                    <option value="2">2</option>
                    <option value="5">5</option>
                    <option value="10">10</option>
                </select>
            </form>
        </div>
        <form action="{{ route('allorders') }}" method="post">
            @csrf
            <div class="d-flex gap-2 align-items-baseline p-2">
                <div class="h6">Filter by</div>
                <div>
                    <select name="order_status" class="form-select w-100">
                        <option value="1">New Order</option>
                        <option value="2">Pending</option>
                        <option value="3">Rejected</option>
                        <option value="4">Completed</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Find</button>
            </div>
        </form>
        <form action="{{ route('allorders') }}" method="post">
            @csrf
            <div class="d-flex gap-2 align-items-baseline p-2">
                <div class="d-flex gap-2 align-items-baseline">
                    <div>
                        <p class="text-center">Start Date</p>
                    </div>
                    <div>
                        <input name="start_date" type="date" class="">
                    </div>
                </div>
                <div class="d-flex gap-2 align-items-baseline">
                    <div>

                        <p class="text-center">End Date</p>
                    </div>
                    <div>

                        <input name="end_date" type="date" class="">
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                </div>
            </div>
        </form>
        <div>

            <form class="d-flex gap-2 p-2 " action="{{ route('allorders') }}" method="post">
                @csrf
                <input class="form-control" type="search" placeholder="Search in orders" name="search">
                <button class="btn btn-primary" type="submit">Search</button>
            </form>
        </div>
    </div>
    <div class="container-fluid table-responsive">


        <table class="table table-bordered m-4  ">
            <thead>
                <tr>
                    <th scope="col">S.No.</th>
                    <th scope="col">User</th>
                    <th class="text-center" scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total Price</th>
                    <th scope="col">Status</th>
                    <th class="text-center" colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                @if (!$orders == null)
                    @foreach ($orders as $key => $order)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $order->user->name }}</td>
                            <td>{{ $order->product->name }} <span style="float: right"><img
                                        src="{{ $order->product->image }}" style="width: 2rem"></span> </td>
                            <td>{{ $order->product->price }}</td>
                            <td>{{ $order->quantity }} </td>
                            <td>{{ $order->totalprice }} </td>
                            <td>

                                @if ($order->status == 1)
                                    <span class="text-success">New Order</span>
                                @elseif($order->status == 2)
                                    <span class="text-warning">Pending</span>
                                @elseif($order->status == 3)
                                    <span class="text-danger">Rejected</span>
                                @elseif($order->status == 4)
                                    <span class="text-success">Order Compleated</span>
                                @endif




                            </td>
                            <td class="d-flex justify-content-around">
                                @if ($order->status == 1)
                                    <a class="btn" href="{{ route('pendingorders', $order->id) }}">
                                        <i style="font-size: 1.3em" class="fa-solid fa-check"></i></a>
                                    <a class="btn" href="{{ route('rejectorders', $order->id) }}"><i
                                            style="font-size: 1.3em" class="fa-solid fa-circle-xmark"></i></a>
                                @endif
                                @if ($order->status == 3)
                                    <a class="btn" href="{{ route('pendingorders', $order->id) }}">
                                        <i style="font-size: 1.3em" class="fa-solid fa-check"></i>
                                @endif
                                @if ($order->status == 2)
                                    <a class="btn" href="{{ route('rejectorders', $order->id) }}"><i
                                            style="font-size: 1.3em" class="fa-solid fa-circle-xmark"></i></a>
                                @endif
                                @if ($order->status == 4)
                                    <span class="text-success">Order Compleated</span>
                                @endif

                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        @if ($paginate)
            {{-- {{ $orders->links() }} --}}
            {{ $orders->onEachSide(2)->links() }}
        @endif
    </div>
    <script>
        function submitForm() {
            document.getElementById("myForm").submit();
        }
    </script>
@endsection
