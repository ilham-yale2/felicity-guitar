@extends('layout.admin')

@section('title', 'Admin Dashboard')

@section('page', 'Dashboard')

@section('content')
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">
            <div class="post">
                <div class="post-details">
                    <div class="post-content pt-2">
                        <h2 class="title mb-3"><a href="#">Welcome Back {{ Auth::user()->name }}</a></h2>
                        <div class="row">
                            <div class="col-md-6 col-xl-3">
                                <div class="card stat-widget">
                                    <div class="card-body">
                                        <h5 class="card-title">Product Total</h5>
                                        <h2>{{$total}}</h2>
                                        <p>TOTAL</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3">
                                <div class="card stat-widget">
                                    <div class="card-body">
                                        <h5 class="card-title">Total Product Ready</h5>
                                        <h2>{{$ready}}</h2>
                                        <p>TOTAL</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3">
                                <div class="card stat-widget">
                                    <div class="card-body">
                                        <h5 class="card-title">Total Product Sold</h5>
                                        <h2>{{$sold}}</h2>
                                        <p>TOTAL</p>
                                    </div>
                                </div>
                            </div>
                            </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
@endsection
