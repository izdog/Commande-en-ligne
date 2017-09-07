@extends('templates.test')
@section('content')
    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li>Mon compte</li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <div class="box">
                        <h1>Mon compte</h1>
                        <p class="lead">Changer vos informations personnelles ou votre mot de passe</p>
                        <!--<p class="text-muted">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>-->

                        <h3>Changer le mot de pass</h3>

                        <form>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="password_old">Ancien mot de pass</label>
                                        <input type="password" class="form-control" id="password_old">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="password_1">Nouveau de mot pass</label>
                                        <input type="password" class="form-control" id="password_1">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="password_2">Confirmation nouveau mot de pass</label>
                                        <input type="password" class="form-control" id="password_2">
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->

                            <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Sauvegarder nouveau mot de pass</button>
                            </div>
                        </form>

                        <hr>

                        <h3>Informations personnelles</h3>
                        @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{Session::get('success')}}
                            </div>
                        @endif
                        @if(Session::has('error'))
                            <div class="alert alert-danger">
                                {{Session::get('error')}}
                            </div>
                        @endif
                        {{--<form action="{{ route('mon_compte', $user)}}" method="post" class="">--}}
                        {{Form::model($user, ['class' => ''])}}
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="firstname">Prénom</label>
                                        <input type="text" name="firstname" value="{{$user->firstname}}" class="form-control" id="firstname">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="lastname">Nom</label>
                                        <input type="text" name="name" value="{{$user->name}}" class="form-control" id="lastname">
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="adresse">Adresse</label>
                                        <input type="text" class="form-control" name="adresse" id="adresse" value="{{$user->adresse}}">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="city">Ville</label>
                                        <input type="text" class="form-control" id="city" name="city" value="{{$user->city}}">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="zip">Code postal</label>
                                        <input type="text" class="form-control" id="zip" name="zip" value="{{$user->zip}}">
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->

                            <div class="row">

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="phone">Telephone</label>
                                        <input type="text" class="form-control" id="phone" name="phone" value="{{$user->phone}}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}">
                                    </div>
                                </div>
                                <div class="col-sm-12 text-center">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Sauvegarder les changements</button>

                                </div>
                            </div>
                        {{Form::close()}}
                        {{--</form>--}}
                    </div>
                </div>

            </div>
            <!-- /.container -->
        </div>
@endsection