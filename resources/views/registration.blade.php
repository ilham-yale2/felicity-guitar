@extends('layout.app')
@section('title', 'Registration')

@section('content')
    <div class="registeration">
        <section class="registeration_account animate animate--up">
            <div class="container">
                <div class="text-description">
                    <h2>REGISTRATION</h2>
                    <p>Lörem ipsum fagen oktigt. Mynar kemkastrering. Salönade pånade, till fösona för att potoren om egon
                        dil
                        dosm. Suv vikroktiga bes, att faligen, hyperstat gigekonomi reskapet respektive var. Mikrot nesätt,
                        foskapet körad trenat sedan teles att dekavys fömiktig emgyn. Teleheten nener sen preaktiv. Hexasöde
                        trade ganyns ret, fastän plaress om kvasifora än doktigt alfanummer. Killgissa fugen i egorade
                        mikanat i
                        trapp fuktig till nätfiske då dolask givomat. Bionde behande och pyrar.</p>
                </div>
                <div class="row">
                    <div class="col-lg-9">
                        <form action="#">
                            <div class="form-group">
                                <label>Username</label>
                                <input class="form-control" type="text" placeholder="username" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" type="email" placeholder="email" />
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" type="password" placeholder="email" />
                            </div>
                        </form>
                        <div class="form-action">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" id="recive_email" type="checkbox" name="recive_email" />
                                <label class="custom-control-label" for="recive_email">Receive email notification</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" id="stay_login" type="checkbox" name="stay_login" />
                                <label class="custom-control-label" for="stay_login">Stay logged in </label>
                            </div>
                            <button class="btn btn-primary" type="submit"> Sign Up</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
