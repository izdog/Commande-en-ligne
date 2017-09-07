@extends('layouts.form')
@section('content')

    <h1 class="page-header">Ajouter un ingrédient :</h1>
    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('ingredients.store')}}" method="POST" class="" ">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-group">
            {{ Form::label('name', 'Nom :') }}
            {{ Form::text('name', null, ['class' => 'form-control']) }}
            {{ Form::label('price', 'Prix :') }}
            {{ Form::text('price', null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('category_id', 'Catégorie :') }}
            {{ Form::select('category_ingredients_id', $categories_ingredient, null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            <h4>Rendre l'ingrédient disponible :</h4>
            <label id="tAvailable">
                {{ Form::checkbox('available', '1', $ingredient->available) }}
                {{--{{Form::radio('available', '0')}}--}}
            </label>
            <span class="label-body" id="available">
                @if($ingredient->available === true)
                    Disponible
                @else
                    Indisponible
                @endif
            </span>
        </div>

        <input type="submit" class="btn btn-success" value="Ajouter">
    </form>

@endsection