@extends('layout')
@section('title')
Address List
@endsection
@section('sbtitle')
addressList
@endsection
@section('content')
<div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Country</th>
                <th scope="col">State</th>
                <th scope="col">District</th>
                <th scope="col">Area</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($address as $item)
            <tr>
                <td> {{$item->countries->name}} </td>
                <td> {{$item->states->name}} </td>
                <td> {{$item->district->name}} </td>
                <td> {{$item->name}} </td>
                <td>
                    <form action="{{route('areadelete',$item->id)}}" method="post">
                        @csrf
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection