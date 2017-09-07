@extends('layouts.form')
@section('content')

    <h1 class="page-header">Produit</h1>
    <div class="createProduct">
        <a href="{{ route('ingredients.create') }}" class="btn btn-primary">Ajouter un produit</a>
    </div>
    <br>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Ingrédients</th>
                <th>Catégorie</th>
                <th>Disponible</th>
                <th>Prix</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
                @foreach($ingredients as $ingredient)
                    <tr>
                        <td>{{ucfirst($ingredient->name)}}</td>
                        <td>{{ucfirst($ingredient->categoryIngredient->name)}}</td>
                        <td>{{$ingredient->available}}</td>
                        <td>{{$ingredient->price}}€</td>
                        <td><a href="{{ route('ingredients.edit', $ingredient)}}" class="btn btn-primary">Editer</a></td>
                        <td>
                            {{ Form::Open(['method' => 'DELETE', 'route' => ['ingredients.destroy', $ingredient]]) }}
                            {{ csrf_field() }}
                            {{ Form::submit('Supprimer', ['class' => 'btn btn-danger']) }}
                            {{ Form::close() }}
                        </td>
                    </tr>
                @endforeach
@endsection