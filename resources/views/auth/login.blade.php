@extends('layouts.app')

@section('css_before')
<link href="{{ asset('_admin/css/pages/auth/auth.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('js_after')
@endsection

@section('content')
<div class="login login-3 wizard d-flex flex-column flex-lg-row flex-column-fluid">
    <!--begin::Aside-->
    <div class="login-aside d-flex flex-column flex-row-auto">
        <!--begin::Aside Top-->
        <div class="d-flex flex-column-auto flex-column pt-lg-40 pt-15">
            <!--begin::Aside header-->
            <a href="/" class="login-logo text-center pt-lg-25 pb-10">
                <img src="{{ asset('_admin/media/logos/logo-1.png') }}" class="max-h-100px max-h-xl-120px" alt="" />
            </a>
            <!--end::Aside header-->
        </div>
        <!--end::Aside Top-->
        <!--begin::Aside Bottom-->
        <div class="aside-img d-flex flex-row-fluid bgi-no-repeat bgi-position-x-center" style="background-position-y: calc(100% + 5rem); background-image: url({{ asset('_admin/media/svg/illustrations/login-visual-5.svg') }})"></div>
        <!--end::Aside Bottom-->
    </div>
    <!--end::Aside-->

    <!--begin::Content-->
    <div class="login-content flex-row-fluid d-flex flex-column p-10">
        <!--begin::Wrapper-->
        <div class="d-flex flex-row-fluid flex-center">
            <!--begin::Signin-->
            <div class="login-form">
                <!--begin::Form-->
                <form class="form" id="kt_login_singin_form" action="{{ route('login') }}" method="POST">
                    @csrf
                    <!--begin::Title-->
                    <div class="pb-5 pb-lg-15">
                        <h3 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">{{ __('Login') }}</h3>
{{--                        <div class="text-muted font-weight-bold font-size-h4">New Here?--}}
{{--                            <a href="custom/pages/login/login-3/signup.html" class="text-primary font-weight-bolder">{{ __('Create Account') }}</a></div>--}}
                    </div>
                    <!--begin::Title-->
                    <!--begin::Form group-->
                    <div class="form-group">
                        <label class="font-size-h6 font-weight-bolder text-dark">{{ __('E-Mail Address') }}</label>
                        <input class="form-control h-auto py-7 px-6 rounded-lg border-0 @error('email') is-invalid @enderror" type="text" name="email" value="{{ old('email') }}" autofocus required autocomplete="off" />
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <!--end::Form group-->
                    <!--begin::Form group-->
                    <div class="form-group">
                        <div class="d-flex justify-content-between mt-n5">
                            <label class="font-size-h6 font-weight-bolder text-dark pt-5">{{ __('Password') }}</label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-primary font-size-h6 font-weight-bolder text-hover-primary pt-5">{{ __('Forgot Your Password?') }}</a>
                            @endif
                        </div>
                        <input class="form-control h-auto py-7 px-6 rounded-lg border-0 @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="off" />
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <!--end::Form group-->
                    <!--begin::Action-->
                    <div class="pb-lg-0 pb-5">
                        <button type="submit" id="kt_login_singin_form_submit_button" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">{{ __('Login') }}</button>
                    </div>
                    <!--end::Action-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Signin-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Content-->
</div>
{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header"></div>--}}

{{--                <div class="card-body">--}}
{{--                    <form method="POST" action="">--}}
{{--                        @csrf--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>--}}

{{--                                @error('email')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">--}}

{{--                                @error('password')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <div class="col-md-6 offset-md-4">--}}
{{--                                <div class="form-check">--}}
{{--                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

{{--                                    <label class="form-check-label" for="remember">--}}
{{--                                        {{ __('Remember Me') }}--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row mb-0">--}}
{{--                            <div class="col-md-8 offset-md-4">--}}
{{--                                <button type="submit" class="btn btn-primary">--}}
{{--                                    {{ __('Login') }}--}}
{{--                                </button>--}}

{{--                                @if (Route::has('password.request'))--}}
{{--                                    <a class="btn btn-link" href="{{ route('password.request') }}">--}}
{{--                                        {{ __('Forgot Your Password?') }}--}}
{{--                                    </a>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
@endsection
