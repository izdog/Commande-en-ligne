@extends('layouts/form')
@section('content')
    <h1 class="page-header">Modifier un produit</h1>

    <form action="{{ route('admin.update', $product)}}" method="post" class="" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                {{ Form::label('name', 'Nom :') }}
                {{ Form::text('name', $product->name, ['class' => 'form-control']) }}
                {{ Form::label('price', 'Prix :') }}
                {{ Form::text('price', $product->price, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('category_id', 'Catégorie :') }}
                {{ Form::select('category_id', $categories, $product->category_id, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('ingredient', 'Ingrédients :') }}
                {{ Form::textarea('ingredient', ucfirst($product->ingredient), ['class' => 'form-control', 'rows' => '2']) }}
            </div>
            <div class="form-group">
                    {{ Form::label('image', 'Image :') }}
                    <img src="{{url('images/'.$product->image)}}" alt="" width="100" height="100" class="img-circle img-form">
                    {{ Form::file('image') }}
            </div>

            <div class="form-group">
                <h4>Activer les suppléments :</h4>
                <label class="">
                    {{ Form::radio('add_on', '1') }}
                    <span class="label-body">Oui</span>
                    {{Form::radio('add_on', '0')}}
                    <span class="label-body">Non</span>
                </label>
            </div>

            <div class="form-group">
                <h4>Afficher le produit :</h4>
                <label class="">
                    {{ Form::radio('add_online', '1') }}
                    <span class="label-body">Online</span>
                    {{Form::radio('add_online', '0')}}
                    <span class="label-body">Offline</span>
                </label>
            </div>

            <input type="submit" class="btn btn-success" value="Editer">
    </form>
@endsection