@extends('auth.main')

@section('content')

    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row shadow">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image" style="background-image: url({{asset($general->LoginImg())}})"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">{{ $general->sitename("") }}</h1>
                                </div>
                                <form action="{{ route('validate_login') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" name="email" class="form-control" placeholder="Email" />
                                        @if($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control"
                                            placeholder="Password" />
                                        @if($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                    <button class="btn btn-primary btn-user btn-block" type="submit" name="btnlogin">Login</button>
                                    <hr>
                                    New user <a href="{{ route('registration') }}">Register</a> here
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection('content')