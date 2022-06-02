@extends('layout.app')
@section('meta') @include('layout.meta') @endsection

@section('title', 'About us')

@section('css')
@endsection
@section('content')
    <div class="aboutus">
        <div class="container">
            <section class="aboutus_description">
                <h2>About Us</h2>
                <div class="text-description">
                    <p>Lörem ipsum sasänis polynamebel, decinde tipose nere terakemi passivhus pressa då doss. Katera antede
                        dens anan. Megaskapet pektigt uck av attitydig hes. Cyntet bemudir i sonässade för att bededis
                        nevydat
                        för att garanterad traditionell specialitet pon kron mokabel: i nymosk. Reinfeldtare vihen. Ilin
                        sodibel
                        odat. Visk min medan autoras por. Vyngen käv timent, savis: och teheten inte telig om än noll än
                        peranera krosa. Anilig teogyn fastän supradade barista, pros songar dehäns. Faskapet biovebel
                        hypolig
                        tidäfertad, polypreläpp obel och fotodiktisk serade ADV. Gutent vodat. Dekall gigas tragt lyssna in.
                        Fangen tril navis son, om hybridkrig beska eftersom geonat. Or pens. Mikromominera tetranat
                        kontratos
                        dire bende. Kuvysening kokrosat i trenera och äsm läläv raskade infrak plus dirangen suprang än dir.
                        Reakägt semiv, men neseplaning migen termobel, att salig. Nollavfall ångar näde triska pofasoskapet.
                        Ser
                        telestat i repon infrangar inklusive niviskapet, teragt för att köde. Niras vyr därför att heviment
                        för
                        att anan kår, i vipresust. </p>
                </div>
            </section>
            <section class="aboutus_friends">
                <h2>business friends</h2>
                <div class="aboutus_friends-list">
                    @foreach ($partners as $item)
                    <div class="aboutus_friends-item">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="aboutus_friends-thumbnail">
                                    <img src="{{asset('storage/'.$item->image)}}" alt="thumbnail" />
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="aboutus_friends-detail">
                                    <h2>{{$item->name}}</h2>
                                    <p>
                                        {!!$item->description!!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="aboutus_friends-item">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="aboutus_friends-thumbnail"><img src="images/image 1.jpg" alt="thumbnail" />
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="aboutus_friends-detail">
                                    <h2>Name Sellers</h2>
                                    <p>Lörem ipsum nest rent delningsekonomi parasemak: pankrati yrad såsom hygisk: i
                                        lokator egont
                                        örat. Däda van mikroren men gölingar tetrare bonus malus: vin, ett kanurtad omåss.
                                        Us multise
                                        negiska kroplada tranat kektiga soråsk prekrosade kroskapet. Virebelt krost,
                                        pomiligt, nyren
                                        tranågt. Svennekoloni van och dossade ramanar, antisk nyvälig nyligt tin,
                                        tempokrati. Disåktig
                                        fengar inklusive mafona egilig or suprasåktig om heteroledes, av autor om semitt.
                                        Spen dedyhet
                                        melil. Spes nuligen adöd trinunas eller akasam med girira sedan deling plar: beskap,
                                        eurovigt.
                                        Mav pungar vir såsom dede bengen kafanåskapet. Vävis pelig. Fadull lan osk i para
                                        samt lagen.
                                        Trena tabärat dekäheten apograf prere, men vasa: </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="aboutus_friends-item">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="aboutus_friends-thumbnail"><img src="images/image 1.jpg" alt="thumbnail" />
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="aboutus_friends-detail">
                                    <h2>Name Sellers</h2>
                                    <p>Lörem ipsum nest rent delningsekonomi parasemak: pankrati yrad såsom hygisk: i
                                        lokator egont
                                        örat. Däda van mikroren men gölingar tetrare bonus malus: vin, ett kanurtad omåss.
                                        Us multise
                                        negiska kroplada tranat kektiga soråsk prekrosade kroskapet. Virebelt krost,
                                        pomiligt, nyren
                                        tranågt. Svennekoloni van och dossade ramanar, antisk nyvälig nyligt tin,
                                        tempokrati. Disåktig
                                        fengar inklusive mafona egilig or suprasåktig om heteroledes, av autor om semitt.
                                        Spen dedyhet
                                        melil. Spes nuligen adöd trinunas eller akasam med girira sedan deling plar: beskap,
                                        eurovigt.
                                        Mav pungar vir såsom dede bengen kafanåskapet. Vävis pelig. Fadull lan osk i para
                                        samt lagen.
                                        Trena tabärat dekäheten apograf prere, men vasa: </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
