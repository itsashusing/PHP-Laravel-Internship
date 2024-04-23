@extends('layout')
@section('title')
State
@endsection
@section('sbtitle')
addstate
@endsection
@section('content')
<div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ $message }} <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <form action="{{ route('addstate') }}" method="post">
        @csrf
        <div class="d-flex gap-4 align-items-center p-2">
            <div>
                <select name="country" class="form-select " aria-label=".form-select-sm example">
                    <option>Select Country</option>
                    @foreach ($country as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('country'))
                <span class="text-danger">{{ $errors->first('country') }} </span>
                @endif
            </div>
            <label class="form-label h5 " for="">State</label>
            <input placeholder="Enter state name" type="text" name="name" class="form-control w-50">
            <input class="btn btn-success" type="submit" value="Add">
            @if ($errors->has('name'))
            <span class="text-danger">{{ $errors->first('name') }} </span>
            @endif
        </div>
    </form>
</div>
<div class="container">
    <table class="table table-striped w-75">
        <thead>
            <tr>
                <th scope="col">S.No</th>
                <th scope="col">Country</th>
                <th scope="col">State</th>
                <th colspan="2" class="text-center">Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($address as $key => $item)
            <tr>
                <td> {{ $key + 1 }} </td>
                <td> {{ $item->country->name }} </td>
                <td> {{ $item->name }} </td>
                <td><a class="btn btn-warning btn-sm" href="{{route('stateeditpage',$item->id)}}">Edit</a>
                <td>
                    <form action="{{route('statedelete',$item->id)}}" method="post">
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