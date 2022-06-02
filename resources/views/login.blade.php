@extends('layout.app')
@section('meta') @include('layout.meta') @endsection

@section('title', 'Login')

@section('css')
@endsection

@section('content')
    <div class="aboutus">
        <div class="container">
            <section class="aboutus_description py-5 ">
                <h2 class="text-center">Login</h2>
                <div class="text-description">
                    <form action="{{route('submit.sign-in')}}" method="POST" class="col-md-5 col-12 mx-auto">
                       
                        @csrf
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control form-control-lg" type="email" placeholder="example@gmail.com"
                                name="email" id="email" autocomplete="off" value="{{old('email')}}">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input class="form-control form-control-lg" type="password" placeholder="*******" name="password"
                                id="password" autocomplete="off">
                        </div>
                        <a href="{{route('forgot.password')}}">
                            <p class="text-right">Forgot Password?</p>
                        </a>
                        <div class="mt-4">
                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" value="" id="notif" name="notif"
                                    autocomplete="off">
                                <label class="form-check-label ml-3" for="notif">
                                    I am willing to receive email notification
                                </label>
                            </div>
                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" value="0" id="remember" name="remember">
                                <label class="form-check-label ml-3" for="remember">
                                    Stay logged in
                                </label>
                            </div>
                        </div>
                        
                        <button class="btn bg-orange text-white rounded w-100 mt-3" type="submit">Login</button>
                        <p class="mt-3 text-center">Not have a account ? <a href="{{route('registration')}}">register now.</a></p>
                    </form>
                </div>
            </section>
        </div>
    </div>
@endsection
