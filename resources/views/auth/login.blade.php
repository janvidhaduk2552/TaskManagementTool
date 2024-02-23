@extends('layouts.app')
@section('content')
<div class="container-scroller">
    <div class="main-panel" style="padding-top:0px;">
        <div class="content-wrapper login-back">
            <div class="mx-auto text-center mb-3" style="margin-top:150px;">
                <h1 class="text-white">TASK MANAGEMENT TOOL</h1>
            </div>
            <div class="row">
                <div class="col-md-4 "></div>
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card" style="border-radius:10px">
                        <div class="card-body">
                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                            @endif
                            <h4 class="card-title " style="font-size:20px;">LogIn</h4>
                            <p class="card-description mb-3" style="margin-top: -12px">Task Management Tool</p>
                            <form class="forms-sample" action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                        id="email" placeholder="Enter Email" />
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputConfirmPassword1">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="password" name="password" autocomplete="current-password"
                                        required="required" placeholder="Enter Password" />
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                @if (Route::has('password.request'))
                                <div class="mb-2 d-flex justify-content-end">
                                    <a class="btn btn-link text-center" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                </div>
                                @endif
                                <button type="submit" class="btn btn-md text-white w-100"
                                    style="padding: 12px 40px; background-color: #2099d8;font-size:14px;"> Submit
                                </button>
                            </form>
                            <div class="d-flex my-4 mb-2 justify-content-center">
                                <a href="{{ route('register') }}" class="ml-auto form-inline" style="text-decoration:none !important;">
                                    <h6 class="text-center text-secondary" >Didn't have
                                        an Account ? &nbsp;</h6>
                                    <h6 class="text-center"><u> Create Account </u></h6>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 "></div>
            </div>
        </div>
    </div>
</div>

@endsection