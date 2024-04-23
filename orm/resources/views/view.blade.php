@extends('layout');
@section('title')
    <div class="h1">Product details</div>
@endsection
@section('content')
    <div>
        <table class="table table-bordered ">
            <thead>
                <tr>

                    <th>S.No</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Discription</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $key => $item)
                    <tr>
                        <th>{{ $key + 1 }}</th>
                        <th>{{ $item->id }} </th>
                        <td>{{ $item->name }} </td>
                        <td>{{ $item->discriptions }} </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{route('product.index')}}">Home</a>
    </div>
@endsection
