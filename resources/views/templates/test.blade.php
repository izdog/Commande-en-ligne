<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Obaju e-commerce template">
    <meta name="author" content="Ondrej Svestka | ondrejsvestka.cz">
    <meta name="keywords" content="">

    <title>
        Holyshit !
    </title>

    <meta name="keywords" content="">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>

    <!-- styles -->
    <link href="{{url('css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('css/animate.min.css')}}" rel="stylesheet">
    <link href="{{url('css/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{url('css/owl.theme.css')}}" rel="stylesheet">

    <!-- theme stylesheet -->
    <link href="{{url('css/default.css')}}" rel="stylesheet" id="theme-stylesheet">

    <!-- your stylesheet with modifications -->
    <link href="{{url('css/custom.css')}}" rel="stylesheet">

    <script src="{{url('js/respond.min.js')}}"></script>

    <link rel="shortcut icon" href="favicon.png">

</head>
<body>
<div id="top">
    <div class="container">
        <div class="col-md-6 col-md-offset-6" data-animate="fadeInDown">
            <ul class="menu">
                @if(Auth::check())
                    <li><a href="/mon_compte">Mon compte</a></li>
                    <li>
                        <a href="contact.html">Contact</a>
                    </li>
                    <li>
                        <a href="/logout">Deconnexion</a>
                    </li>
                @else
                    <li>
                        <a href="#" data-toggle="modal" data-target="#login-modal">Connexion</a>
                    </li>
                    <li>
                        <a href="/register">Inscription</a>
                    </li>
                    <li>
                        <a href="contact.html">Contact</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
        <div class="modal-dialog modal-sm">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="Login">Connexion</h4>
                </div>
                <div class="modal-body">
                    <form class="" role="form" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <input type="text" name="email" class="form-control" id="email-modal" placeholder="email" value="{{ old('email') }}">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" id="password-modal" placeholder="password">
                        </div>

                        <p class="text-center">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-sign-in"></i> Se connecter</button>
                        </p>

                    </form>

                    <p class="text-center text-muted">Pas encore enregistrer ?</p>
                    <p class="text-center text-muted"><a href="/register"><strong>Créer son compte</strong></a></p>

                </div>
            </div>
        </div>
    </div>

</div>

<!-- *** TOP BAR END *** -->
<!-- *** NAVBAR ***
_________________________________________________________ -->

<div class="navbar navbar-default yamm" role="navigation" id="navbar">
    <div class="container">
        <div class="navbar-header">

            <a class="navbar-brand home" href="/" data-animate-hover="bounce">
                <img src="{{asset('img/pp2.png')}}" alt="Picoti Picota logo" class="hidden-xs">
                <img src="{{asset('img/pp2.png')}}" alt="Picoti Picota logo" class="visible-xs"><span class="sr-only">Plop</span>
            </a>
            <div class="navbar-buttons">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <i class="fa fa-align-justify"></i>
                </button>
                @if(Auth::check())
                    <a class="btn btn-default navbar-toggle" href="/basket">
                        <i class="fa fa-shopping-cart"></i>  <span class="hidden-xs">{{$nbItems}} articles dans le panier</span>
                    </a>
                @endif
            </div>
        </div>
        <!--/.navbar-header -->

        <div class="navbar-collapse collapse" id="navigation">

            <ul class="nav navbar-nav navbar-left">
                <li class="nav-item"><a href="{{url('/')}}">Home</a>
                </li>
                <li class="nav-item"><a href="{{url('/commander')}}">Commander</a></li>
                @foreach($categories as $category)
                    <li class="nav-item"><a href="{{ url('commander/'.$category->name) }}">{{ ucfirst($category->name) }}</a></li>
                @endforeach
            </ul>

        </div>
        <!--/.nav-collapse -->

        <div class="navbar-buttons">

            <div class="navbar-collapse collapse right" id="basket-overview">
                @if(Auth::check())
                    <a href="/basket" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span class="hidden-sm">{{$nbItems}} articles dans le panier</span></a>
                @endif
            </div>

        </div>

        <div class="collapse clearfix" id="search">

            <form class="navbar-form" role="search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search">
                        <span class="input-group-btn">

			<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>

		    </span>
                </div>
            </form>

        </div>
        <!--/.nav-collapse -->

    </div>
    <!-- /.container -->
</div>
<!-- /#navbar -->

<!-- *** NAVBAR END *** -->
@yield('content')
<!-- *** FOOTER ***
_________________________________________________________ -->
<div id="footer" data-animate="fadeInUp">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <h4>Pages</h4>

                <ul>
                    <li><a href="text.html">A propos</a>
                    </li>
                    <li><a href="text.html">Terms and conditions</a>
                    </li>
                    <li><a href="faq.html">FAQ</a>
                    </li>
                    <li><a href="contact.html">Nous contacter</a>
                    </li>
                </ul>

                <hr>

                <h4>Utilisateur</h4>

                <ul>
                    <li><a href="/register" data-toggle="modal" data-target="#login-modal">Se connecter</a>
                    </li>
                    <li><a href="/register">S'enregistrer</a>
                    </li>
                </ul>

                <hr class="hidden-md hidden-lg hidden-sm">

            </div>
            <!-- /.col-md-3 -->

            <div class="col-md-3 col-sm-6">

                <h4>Navigation</h4>


                <ul>
                    <li><a href="/commander">Commander</a></li>
                    @foreach($categories as $category)
                        <li><a href="/{{ $category->name }}">{{ ucfirst($category->name) }}</a></li>
                    @endforeach
                </ul>


                <hr class="hidden-md hidden-lg">

            </div>
            <!-- /.col-md-3 -->

            <div class="col-md-3 col-sm-6">

                <h4>Nous trouver</h4>

                <p><strong>Picoti Picota</strong>
                    <br>14 rue Jules Didier
                    <br>10120
                    <br>Saint-André-les-Vergers
                </p>

                <a href="contact.html">Nous contacter</a>

                <hr class="hidden-md hidden-lg">

            </div>
            <!-- /.col-md-3 -->



            <div class="col-md-3 col-sm-6">



                <h4>Retrouver nos nouveautées</h4>

                <p class="social">
                    <a href="#" class="facebook external" data-animate-hover="shake"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="twitter external" data-animate-hover="shake"><i class="fa fa-twitter"></i></a>
                </p>


            </div>
            <!-- /.col-md-3 -->

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
</div>
<!-- /#footer -->

<!-- *** FOOTER END *** -->




<!-- *** COPYRIGHT ***
_________________________________________________________ -->
<div id="copyright">
    <div class="container">
        <div class="col-md-6">
            <p class="pull-left">© 2015 F.Florian.</p>

        </div>
        <div class="col-md-6">
            <p class="pull-right">Template by <a href="https://bootstrapious.com/e-commerce-templates">Bootstrapious.com</a>
                <!-- Not removing these links is part of the license conditions of the template. Thanks for understanding :) If you want to use the template without the attribution links, you can do so after supporting further themes development at https://bootstrapious.com/donate  -->
            </p>
        </div>
    </div>
</div>
<!-- *** COPYRIGHT END *** -->



</div>
<!-- /#all -->




<!-- *** SCRIPTS TO INCLUDE ***
_________________________________________________________ -->
<script src="{{url('js/jquery-1.11.0.min.js')}}"></script>
<script src="{{url('js/bootstrap.min.js')}}"></script>
<script src="{{url('js/jquery.cookie.js')}}"></script>
<script src="{{url('js/waypoints.min.js')}}"></script>
<script src="{{url('js/modernizr.js')}}"></script>
<script src="{{url('js/bootstrap-hover-dropdown.js')}}"></script>
<script src="{{url('js/owl.carousel.min.js')}}"></script>
<script src="{{url('js/front.js')}}"></script>
<script src="{{url('js/misc.js')}}"></script>


</body>

</html>