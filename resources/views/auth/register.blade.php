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
                            <h4 class="card-title " style="font-size:20px;">Register</h4>
                            <p class="card-description mb-3" style="margin-top: -12px">Task Management Tool</p>
                            <form class="forms-sample" action="{{ route('register') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Name</label>
                                    <input type="email" class="form-control" name="name" value="{{ old('name') }}"
                                        required autofocus id="name" placeholder="Enter Name" />
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $name }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Email</label>
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                                        required autofocus id="email" placeholder="Enter Email" />
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputConfirmPassword1">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="password" name="password" autocomplete="new-password" required="required"
                                        placeholder="Enter Password" />
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputConfirmPassword1">Confirm Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="password-confirm" name="password_confirmation" autocomplete="new-password"
                                        required="required" placeholder="Enter Confirm Password" />
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-md w-100 text-white mb-3"
                                    style="padding: 12px 40px; background-color: #2099d8;font-size:14px;"> Submit
                                </button>
                                <div class="d-flex my-1 mb-2 justify-content-center">
                                    <a href="{{ route('login') }}" class="ml-auto form-inline" style="text-decoration:none;">
                                        <h6 class="text-center text-secondary" >Already
                                            have an
                                            Account ?&nbsp;</h6>
                                        <h6 class="text-center"><u> Login </u></h6>
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 "></div>
            </div>
        </div>
    </div>
</div>
@endsection