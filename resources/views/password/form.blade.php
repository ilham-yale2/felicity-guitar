@extends('layout.app')
@section('meta') @include('layout.meta') @endsection

@section('title', 'Forgot Password')

@section('css')
@endsection

@section('content')
    <div class="aboutus">
        <div class="container">
            <section class="aboutus_description py-5 ">
                <h2 class="text-center">Reset Password</h2>
                <div class="text-description">
                    <form action="{{route('reset.password.submit')}}" method="POST" class="col-md-5 col-12 mx-auto">
                        <input type="hidden" value="{{$user->code}}" name="code">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @csrf
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control form-control-lg" required type="email" placeholder="example@gmail.com"
                                name="email" id="email" autocomplete="off" value="{{$user->email}}">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input class="form-control form-control-lg" required type="password" 
                                name="password" id="password" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <input class="form-control form-control-lg" required type="password" 
                                name="confirm_password" id="confirm_password" autocomplete="off">
                        </div>
                        <button class="btn bg-orange text-white rounded w-100 mt-5" type="submit">Submit</button>
                    </form>
                </div>
            </section>
        </div>
    </div>
@endsection
