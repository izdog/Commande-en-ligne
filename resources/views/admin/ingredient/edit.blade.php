@extends('layouts.form')
@section('content')

    <h1 class="page-header">Modifier un ingrédient</h1>

    <form action="{{ route('ingredients.update', $ingredient)}}" method="post" class="" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-group">
            {{ Form::label('name', 'Nom :') }}
            {{ Form::text('name', $ingredient->name, ['class' => 'form-control']) }}
            {{ Form::label('price', 'Prix :') }}
            {{ Form::text('price', $ingredient->price, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('category_id', 'Catégorie :') }}
            {{ Form::select('category_ingredients_id', $categories_ingredient, $ingredient->category_ingredient_id, ['class' => 'form-control']) }}
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

        <input type="submit" class="btn btn-success" value="Editer">
    </form>

@endsection