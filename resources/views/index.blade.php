@extends('templates.test')
@section('content')

    <div id="all">
        {{--{{dd(session())}}--}}
        <div id="content">
            @if(Session::has('error'))
                <div class="container">
                    <div class="alert alert-danger">
                        <strong>{{  Session::get('error') }}</strong>
                    </div>
                </div>
            @endif
            <div class="container">
                <div class="col-md-12">
                    <div id="main-slider">
                        <div class="item">
                            <img src="img/main-slider1.jpg" alt="" class="img-responsive">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="img/main-slider2.jpg" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="img/main-slider3.jpg" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="img/main-slider4.jpg" alt="">
                        </div>
                    </div>
                    <!-- /#main-slider -->
                </div>
            </div>

            <div class="box text-center" data-animate="fadeInUp">
                <div class="container">
                    <div class="col-md-12">
                        <h3 class="text-uppercase">passer vos commandes directement par notre site</h3>
                        <a href="/commander" class="btn btn-primary">Commander en ligne</a>
                        <h3 class="text-uppercase">ou par téléphone au</h3>
                        <p class="lead">03 25 46 77 80 / 06 09 90 23 08</p>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="col-md-12">
                    <div class="row" id="blog-homepage">
                        <div class="col-sm-6">
                            <div class="post">
                                <h4>Nos horraires :</h4>
                                <hr>
                                @foreach($scheludes as $schelude)
                                    <p class=""><strong>{{$schelude->day}}</strong> : {{substr($schelude->morning_start,0,-3)}} - {{substr($schelude->morning_end,0,-3)}} {{ substr($schelude->evening_start,0,-3) }} - {{substr($schelude->evening_end,0,-3)}}</p>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="post">
                                <h4>Nous trouvez :</h4>
                                <hr>
                                <div class="center-map">
                                    <div id="map" style="position: relative; overflow: hidden;">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2654.4795994952947!2d4.057840315654495!3d48.293626779236206!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47ee984e6aa8c545%3A0x3f22e907888185ac!2s6+Rue+de+l&#39;Ouest%2C+10300+Sainte-Savine!5e0!3m2!1sfr!2sfr!4v1495720006743" width="500" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection
