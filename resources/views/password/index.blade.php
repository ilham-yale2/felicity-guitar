@extends('layout.app')
@section('meta') @include('layout.meta') @endsection

@section('title', 'Forgot Password')

@section('css')
@endsection

@section('content')
    <div class="aboutus">
        <div class="container">
            <section class="aboutus_description py-5 ">
                <h2 class="text-center">Forgot Password</h2>
                <div class="text-description">
                    <form action="{{route('forgot.password.email')}}" method="POST" class="col-md-5 col-12 mx-auto">
                       
                        @csrf
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control form-control-lg" type="email" placeholder="example@gmail.com"
                                name="email" id="email" autocomplete="off">
                        </div>
                        <button class="btn bg-orange text-white rounded w-100 mt-5" type="submit">Submit</button>
                    </form>
                </div>
            </section>
        </div>
    </div>
@endsection
