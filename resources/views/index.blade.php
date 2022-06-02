@extends('layout.app', ['brand' => true])
@section('meta') @include('layout.meta') @endsection
@section('title', 'Home')

@section('css')
@endsection

@section('content')
<style>
    .header .menu-wrap > li{
        padding-left: 20px;
        padding-right: 20px;
    }
    .header_top{
        margin-bottom: .5rem;
    }
    .header{
        padding-top: 25px;
    }
    body::before{
        background-image: url("{{asset('images/bg.png')}}") ;
        background-position: top;
        background-size: cover;
    }
    footer{
        display: none;
    }
    .header_logo{
        display: none
    }
</style>
@endsection
