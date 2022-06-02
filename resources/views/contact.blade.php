@extends('layout.app')
@section('title', 'Contact us')
@section('content')
    <div class="form-page">
        <section class="section-1 animate animate--up">
            <div class="container">
                <div class="text-description">
                    <h2>CONTACT US</h2>
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
                        <form action="{{route('submit.contact')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" type="text" placeholder="Name" name="name" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" type="email" placeholder="email" name="email" />
                            </div>
                            <div class="form-group">
                                <label>Subject </label>
                                <input class="form-control" type="text" placeholder="Subject " name="subject"/>
                            </div>
                            <div class="form-group">
                                <label>Message Filling </label>
                                <textarea class="form-control" placeholder="message filling " name="message"></textarea>
                            </div>
                            <div class="form-action">
                                <button class="btn btn-primary" type="submit"> Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
