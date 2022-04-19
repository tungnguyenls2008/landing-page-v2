<?php
use Stevebauman\Location\Facades\Location;
$visitor_ip=getIp();
$visitor_location=Location::get($visitor_ip);
$device_info=getBrowserInfo();
$location='';
if ($visitor_location!=false){
    $location=$visitor_location->cityName??null
        .', '. $visitor_location->regionName??null
        .', '.$visitor_location->countryName??null
        .', lat: '.$visitor_location->latitude??null
        .', long: '.$visitor_location->longitude??null;
}
if ($visitor_ip!='::1'){
    \App\Models\Visitor::create(['ip_address'=>$visitor_ip,'location'=>$location,'device_info'=>json_encode($device_info)]);
}
?>
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Welcome to my world">
    <meta name="author" content="tungnd">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="icon" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="icon" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">

    <title>{{ config('app.name', $general->brand_name) }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" media="screen">
</head>
<body class="body-full-page">

<div class="loader"><div class="spinner"><div class="double-bounce1"></div><div class="double-bounce2"></div></div></div>

<!-- Content CLick Capture-->

<div class="click-capture"></div>

<!-- Sidebar Menu-->

<div class="menu">
    <span class="close-menu icon-cross2 right-boxed"></span>
    <div class="menu-lang right-boxed">
        <a href="{{ route('set-locale', 'en') }}" class="{{ session('locale') == 'en' ? 'active' : '' }}">ENG</a>
        <a href="{{ route('set-locale', 'ar') }}" class="{{ session('locale') == 'ar' ? 'active' : '' }}">VIE</a>
    </div>
    <ul class="menu-list right-boxed">
        <li  data-menuanchor="page1">
            <a  href="#page1">{{ __('Home') }}</a>
        </li>
        <li  data-menuanchor="page2">
            <a href="#page2">{{ __('About us') }}</a>
        </li>
        <li  data-menuanchor="page3">
            <a href="#page3">{{ __('Projects') }}</a>
        </li>
        <li  data-menuanchor="page4">
            <a href="#page4">{{ __('Services') }}</a>
        </li>
        <li  data-menuanchor="page6">
            <a href="#page6">{{ __('Reviews') }}</a>
        </li>
        <li  data-menuanchor="page7">
            <a href="#page7">{{ __('Contact') }}</a>
        </li>
    </ul>
    <div class="menu-footer right-boxed">
        <div class="social-list">
            @if(isset($contact->twitter))
                <a href="{{ $contact->twitter }}" class="icon ion-social-twitter" target="_blank"></a>
            @endif
            @if(isset($contact->facebook))
                <a href="{{ $contact->facebook }}" class="icon ion-social-facebook"></a>
            @endif
            @if(isset($contact->google))
                <a href="mailto:{{ $contact->google }}" class="icon ion-email"></a>
            @endif
            @if(isset($contact->linkedin))
                <a href="{{ $contact->linkedin }}" class="icon ion-social-linkedin"></a>
            @endif
            @if(isset($contact->instagram))
                <a href="{{ $contact->instagram }}" class="fa fa-instagram"></a>
            @endif
            @if(isset($contact->phone))
                <a href="tel:{{ $contact->phone }}" class="fa fa-mobile-phone"></a>
            @endif
        </div>
        <div class="copy">© {{ $general->brand_name }} <?php echo date("Y"); ?>. All Rights Reseverd<br> Design by Mrfocuskw</div>
    </div>
</div>

<!-- Navbar -->

<header class="navbar navbar-2 navbar-white boxed">
    <div class="navbar-bg"></div>
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>

    <a class="brand" href="#">
        <img class="brand-img" alt="" src="{{ asset('images/logo/' . $general->logo) }}">
{{--        <div class="brand-info">--}}
{{--            <div class="brand-name">{{ $general->brand_name }}</div>--}}
{{--            <div class="brand-text">creative template</div>--}}
{{--        </div>--}}
    </a>

    <div class="social-list hidden-xs">
        @if(isset($contact->twitter))
            <a href="{{ $contact->twitter }}" class="icon ion-social-twitter" target="_blank"></a>
        @endif
        @if(isset($contact->facebook))
            <a href="{{ $contact->facebook }}" class="icon ion-social-facebook" target="_blank"></a>
        @endif
        @if(isset($contact->google))
            <a href="mailto:{{ $contact->google }}" class="icon ion-email"></a>
        @endif
        @if(isset($contact->linkedin))
            <a href="{{ $contact->linkedin }}" class="icon ion-social-linkedin" target="_blank"></a>
        @endif
        @if(isset($contact->instagram))
            <a href="{{ $contact->instagram }}" class="fa fa-instagram"></a>
        @endif
        @if(isset($contact->phone))
            <a href="tel:{{ $contact->phone }}" class="fa fa-mobile-phone" target="_blank"></a>
        @endif
    </div>
</header>
<div class="copy-bottom white boxed">© {{ $general->brand_name }} <?php echo date("Y"); ?>.</div>
<div class="lang-bottom white boxed">
    <div class="menu-lang">
        <a href="{{ route('set-locale', 'en') }}" class="{{ session('locale') == 'en' ? 'active' : '' }}">ENG</a>
        <a href="{{ route('set-locale', 'ar') }}" class="{{ session('locale') == 'ar' ? 'active' : '' }}">VIE</a>
    </div>
</div>

@yield('content')
<!-- Modals success -->

<div id="success" class="modal modal-message fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></span>
                <h2 class="modal-title">Thank you</h2>
                <p class="modal-subtitle">Your message is successfully sent...</p>
            </div>
        </div>
    </div>
</div>

<!-- Modals error -->

<div id="error" class="modal modal-message fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></span>
                <h2 class="modal-title">Sorry</h2>
                <p class="modal-subtitle"> Something went wrong </p>
            </div>
        </div>
    </div>
</div>


<!-- jQuery -->

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/smoothscroll.js') }}"></script>
<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/jquery.pagepiling.js') }}"></script>



<!-- Scripts -->
<script src="{{ asset('js/scripts.js') }}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
</body>
</html>
