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

    @media(max-width:767px){
        .header_top{
        margin-top: 2.5rem;
        }
        .header_right{
            justify-content: center!important;
            padding-right: 0px!important 
        }
        body::before{
            background-image: url("{{asset('images/body-top.jpg')}}") ;
            background-position: top;
            background-size: cover;
        }
        #wrap{
            padding-top: 0px;
        }
    }
</style>
<div class="d-flex align-items-center justify-center w-100 px-5 d-block d-md-none" style="min-height: 100vh">
    <img src="{{asset('images/logo-felicity.png')}}" class="w-100" alt="">
</div>
@endsection
