@extends('layout')
@section('title')
    Add User
@endsection
@section('sbtitle')
    adduser
@endsection
@section('content')
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ $message }} <button type="button" class="btn-close" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                @endif
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Add a user</h3>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('createuser') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" name="name" id="inputFirstName"
                                                        type="text" value="{{ old('name') }}"
                                                        placeholder="Enter your first name" />
                                                    <label for="inputFirstName">First name</label>
                                                    @if ($errors->has('name'))
                                                        <span class="text-danger">{{ $errors->first('name') }} </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input class="form-control" value="{{ old('age') }}" name="age"
                                                        id="inputLastName" type="number" placeholder="Enter your age" />
                                                    <label for="inputLastName">Age</label>
                                                    @if ($errors->has('age'))
                                                        <span class="text-danger">{{ $errors->first('age') }} </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" value="{{ old('email') }}" name="email"
                                                id="inputEmail" type="email" placeholder="name@example.com" />
                                            <label for="inputEmail">Email address</label>
                                            @if ($errors->has('email'))
                                                <span class="text-danger">{{ $errors->first('email') }} </span>
                                            @endif
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="inputPassword" name="password"
                                                        type="password" placeholder="Create a password" />
                                                    <label for="inputPassword">Password</label>
                                                    @if ($errors->has('password'))
                                                        <span class="text-danger">{{ $errors->first('password') }} </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 ">
                                                    <input class="form-control" name="password_confirmation"
                                                        id="inputPasswordConfirm" type="password"
                                                        placeholder="Confirm password" />
                                                    <label for="inputPasswordConfirm">Confirm Password</label>
                                                    @if ($errors->has('cpassword'))
                                                        <span class="text-danger"> Confirm Password in required. </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-floating mb-3">
                                                <div>
                                                    <input class="form-control" name="image" id="inputEmail"
                                                        type="file" />
                                                    @if ($errors->has('image'))
                                                        <span class="text-danger">{{ $errors->first('image') }} </span>
                                                    @endif
                                                </div>

                                            </div>
                                        </div>
                                        <div class="mt-4 mb-0">
                                            <div class="d-grid"><button type="submit"
                                                    class="btn btn-primary btn-block">Add</button></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </main>
        </div>
    </div>
@endsection
