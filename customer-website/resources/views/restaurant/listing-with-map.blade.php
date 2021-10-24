
@extends('layouts.master')


@section('extraStyle')
<link href="{{ asset('css/checkbox-radio-input.css') }}" rel="stylesheet">
@endsection

@section('content')
    {{-- side bar --}}
    @include('balde_components.navs.side-bar')
    {{-- top nav bar --}}
    @include('balde_components.navs.nav-bar-v2')
    {{-- main content --}}
    <main-restaurants
        :currency_right={{setting('currency_right', false)}}
        :default_currency="`{{setting('default_currency')}}`"
    ></main-restaurants>
    {{-- footer--}}
    @include('balde_components.footer')      
@endsection
@section('extraJs')
<script src="{{asset('js/maps.js')}}"></script>
@endsection

