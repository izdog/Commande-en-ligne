
@extends('templates.test')
@section('content')
    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">

                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li>Nouveau compte / S'enregistrer</li>
                    </ul>

                </div>

                <div class="col-md-6">
                    <div class="box">
                        <h1>Nouveau compte</h1>

                        <p class="lead">Pas encore de compte ?</p>

                        <hr>
                        {{--ERREUR SAISIE--}}
                        @if($errors->has('name'))
                            <div class="alert alert-danger"><strong>{{$errors->first('name')}}</strong></div>
                        @endif
                        @if($errors->has('email'))
                            <div class="alert alert-danger"><strong>{{$errors->first('email')}}</strong></div>
                        @endif
                        @if($errors->has('password'))
                            <div class="alert alert-danger"><strong>{{$errors->first('password')}}</strong></div>
                        @endif
                        {{--END--}}
                        <form class="" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                            <div class="form-group">
                                <label for="name">Nom</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                                <label for="firstname">Prenom</label>
                                <input type="text" class="form-control" id="firstname" name="firstname" value="{{ old('firstname') }}">
                            </div>
                            <div class="form-group">
                                <label for="email">Adresse e-mail</label>
                                <input type="text" name="email" class="form-control" id="email" {{ old('email') }}>
                            </div>
                            <div class="form-group">
                                <label for="password">Mot de passe</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="form-group">
                                <label for="password">Confirmer le mot de passe</label>
                                <input type="password" class="form-control" id="password" name="password_confirmation">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> S'enregistrer</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="box">
                        <h1>Connexion</h1>

                        <p class="lead">Déjà client ?</p>
                        <hr>
                        {{--ERREUR SAISIE--}}
                        @if($errors->has('email'))
                            <div class="alert alert-danger"><strong>{{$errors->first('email')}}</strong></div>
                        @endif
                        @if($errors->has('password'))
                            <div class="alert alert-danger"><strong>{{$errors->first('password')}}</strong></div>
                        @endif
                        {{--END--}}
                        <form class="" role="form" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="email">Adresse e-mail</label>
                                <input name="email" type="text" class="form-control" id="email">
                            </div>
                            <div class="form-group">
                                <label for="password">Mot de passe</label>
                                <input name="password" type="password" class="form-control" id="password">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i> Se connecter</button>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
            <!-- /.container -->
        </div>
        <!--  /.content --!>
@endsection
