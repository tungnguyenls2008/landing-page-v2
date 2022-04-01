@extends('layouts.front')

@section('content')
    <div class="pagepiling">
        @include('home')
        @include('about')
        @include('projects')
        @include('services')
        @include('clients')
        @include('reviews')
        @include('contact')
    </div>
@endsection
