@extends('layouts/form')
@section('content')
    <h1 class="page-header">Ajouter un produit :</h1>
    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('admin.store')}}" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                {{ Form::label('name', 'Nom :') }}
                {{ Form::text('name', null, ['class' => 'form-control']) }}
                {{ Form::label('price', 'Prix :') }}
                {{ Form::text('price', null, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('category_id', 'Catégorie :') }}
                {{ Form::select('category_id', $categories, null,['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('ingredient', 'Ingrédients :') }}
                {{ Form::textarea('ingredient', null, ['class' => 'form-control', 'rows' => '2']) }}
                {{ Form::label('image', 'Image :') }}
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
                <label>
                    {{ Form::radio('add_online', '1', true) }}
                    <span class="label-body">Online</span>
                    {{Form::radio('add_online', '0', false)}}
                    <span class="label-body">Offline</span>
                </label>
            </div>

            <input type="submit" class="btn btn-success" value="Ajouter">
    </form>
@endsection