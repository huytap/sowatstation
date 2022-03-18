@extends('layouts.admin')
@section('css')
    <link href="{{asset('assets/admin/assets/css/pages/login/classic/login-4.css?v=7.0.6')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div class="d-flex flex-column flex-root">
        <!--begin::Login-->
        <div class="login login-4 login-signin-on d-flex flex-row-fluid" id="kt_login">
            <div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat" style="background-image: url('{{asset('assets/admin/assets/media/bg/bg-3.jpg')}}');">
                <div class="login-form text-center p-7 position-relative overflow-hidden">
                    <!--begin::Login Header-->
                    <div class="d-flex flex-center mb-15">
                        <a href="#">
                            <img src="{{asset('assets/admin/assets/media/logos/logo-letter-13.png')}}" class="max-h-75px" alt="" />
                        </a>
                    </div>
                    <!--end::Login Header-->

                    <!--begin::Login Sign in form-->
                    <div class="login-signin">
                        <div class="mb-20">
                            <h3>Sign In To Admin</h3>
                            <div class="text-muted font-weight-bold">Enter your details to login to your account:</div>
                        </div>
                        @if(Session::has('error'))
                            <x-alert type="danger" icon="flaticon-warning" content="{{Session::get('error')}}"/>
                        @endif
                        <form method="post" action="{{route('admin.login.store')}}" class="form fv-plugins-bootstrap fv-plugins-framework">
                            <div class="form-group mb-5 fv-plugins-icon-container">
                                <input class="form-control h-auto form-control-solid py-4 px-8" type="email" value="{{old('email')}}" placeholder="Email" name="email" autocomplete="off" />
                                @error('email')
                                    <div class="fv-plugins-message-container">
                                        <div data-field="memo" data-validator="notEmpty" class="fv-help-block">{{$message}}</div>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-5 fv-plugins-icon-container">
                                <input class="form-control h-auto form-control-solid py-4 px-8" type="password" placeholder="Password" name="password" />
                                @error('password')
                                    <div class="fv-plugins-message-container">
                                        <div data-field="memo" data-validator="notEmpty" class="fv-help-block">{{$message}}</div>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group d-flex flex-wrap justify-content-between align-items-center">
                                <div class="checkbox-inline">
                                    <label class="checkbox m-0 text-muted">
                                        <input type="checkbox" name="remember" />
                                        <span></span>
                                        Remember me
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">Sign In</button>
                            @csrf
                        </form>
                    </div>
                    <!--end::Login Sign in form-->
                </div>
            </div>
        </div>
        <!--end::Login-->
    </div>
@endsection