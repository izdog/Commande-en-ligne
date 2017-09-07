@extends('templates.test')
@section('content')
    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">

                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li><a href="/commander">Commander</a></li>
                        <li>Personnaliser</li>
                    </ul>

                </div>

                <div class="col-md-12">
                    <div class="box">
                        <h1>Personnaliser votre tartine</h1>

                        <p class="lead">La salade et sa vinaigrette avec votre tartine</p>

                        <hr>
                        @if(Session::has('success'))
                            <div class="container">
                                <div class="alert alert-success">
                                    {{  Session::get('success') }}
                                </div>
                            </div>
                        @endif
                        <form action="{{route('customize.toBasket')}}" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <h3>Une envie de ?</h3>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label for="pain">Choix du pain :</label>
                                        <select name="pain" id="pain" class="form-control">
                                            @foreach($ingredients as $ingredient)
                                                @if($ingredient->categoryIngredient->name === 'pain')
                                                    <option value="{{ $ingredient->id }}">{{ ucfirst($ingredient->name) }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="qty">Quantité :</label>
                                        <p class="buttons quantity flexLeft">
                                            <a href="#" class="btn btn-primary minus"><i class="fa fa-minus"></i></a>
                                            <input id="qty" class="form-control qty" type="text" name="quantity" value="0">
                                            <a href="#" class="btn btn-primary plus"><i class="fa fa-plus"></i></a>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <h3>Qu'allons nous picorer ?</h3>

                            <div class="form-group">
                                <h4>Légume</h4>
                                <div class="funkyradio">
                                    <div class="row">
                                    @foreach($ingredients as $ingredient)
                                        @if($ingredient->categoryIngredient->name === 'légumes')
                                            <div class="col-sm-2">
                                                <div class="funkyradio-default">
                                                    <input type="checkbox" value="{{$ingredient->id}}" name="{{$ingredient->name}}" id="{{$ingredient->name}}">
                                                    <label for="{{$ingredient->name}}"}}>{{ucfirst($ingredient->name)}}</label>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <h4>Viandes</h4>
                                <div class="funkyradio">
                                    <div class="row">
                                    @foreach($ingredients as $ingredient)
                                        @if($ingredient->categoryIngredient->name === 'viandes')
                                            <div class="col-sm-2">
                                                <div class="funkyradio-default">
                                                    <input type="checkbox" value="{{$ingredient->id}}" name="{{$ingredient->name}}" id="{{$ingredient->name}}">
                                                    <label for="{{$ingredient->name}}"}}>{{ucfirst($ingredient->name)}}</label>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <h4>Fromages</h4>
                                <div class="funkyradio">
                                    <div class="row">
                                    @foreach($ingredients as $ingredient)
                                        @if($ingredient->categoryIngredient->name === 'fromages')
                                            <div class="col-sm-2">
                                                <div class="funkyradio-default">
                                                    <input type="checkbox" value="{{$ingredient->id}}" name="{{$ingredient->name}}" id="{{$ingredient->name}}">
                                                    <label for="{{$ingredient->name}}"}}>{{ucfirst($ingredient->name)}}</label>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="form-group">
                                <h3>A quelle sauce ?</h3>
                                <h4>Sauces</h4>
                                <div class="funkyradio">
                                    <div class="row">
                                    @foreach($ingredients as $ingredient)
                                        @if($ingredient->categoryIngredient->name === 'sauces')
                                            <div class="col-sm-2">
                                                <div class="funkyradio-default">
                                                    <input type="checkbox" value="{{$ingredient->id}}" name="{{$ingredient->name}}" id="{{$ingredient->name}}">
                                                    <label for="{{$ingredient->name}}"}}>{{ucfirst($ingredient->name)}}</label>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <button type="submit" class="btn btn-primary">Valider</button>

                        </form>
                    </div>
                </div>

            </div>

         </div>


@endsection