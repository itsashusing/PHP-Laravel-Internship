@extends('user.layout')
@section('content')
<div class="bg-white p-4 ">
    <div class="w-50 border rounded bg-dark p-4" style="position: relative; left:25%">
        <form action="{{ route('userlogin') }}" method="POST">
            @csrf

            <div class=" mb-3">
                <label class="text-white">Email address</label>
                <input class="form-control" value="{{ old('email') }}" name="email" type="email"
                    placeholder="name@example.com" />
                @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }} </span>
                @endif
            </div>
            <div class=" mb-3 mb-md-0">
                <label class="text-white">Password</label>
                <input class="form-control" id="inputPassword" name="password" type="password"
                    placeholder="Create a password" />
                @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }} </span>
                @endif


            </div>
            <div class="mt-3 mb-0">
                <div class="d-grid"><button type="submit" class="btn btn-primary btn-block">Login</button></div>
            </div>
        </form>
    </div>
</div>
@endsection