@extends('layouts.form')
@section('content')
    <h1 class="page-header">Modifier l'horaire de <strong>{{ucfirst($schelude->day)}}</strong> </h1>

    <form action="{{ route('schelude.update', $schelude)}}" method="post">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-group">
            {{ Form::label('morning_start', 'Début midi :') }}
            {{ Form::text('morning_start', $schelude->morning_start, ['class' => 'form-control']) }}
            {{ Form::label('morning_end', 'Fin midi :') }}
            {{ Form::text('morning_end', $schelude->morning_end, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('evening_start', 'Début soirée :') }}
            {{ Form::text('evening_start', $schelude->evening_start, ['class' => 'form-control']) }}
            {{ Form::label('evening_end', 'Fin soirée :') }}
            {{ Form::text('evening_end', $schelude->evening_end, ['class' => 'form-control']) }}
        </div>

        <input type="submit" class="btn btn-success" value="Editer">
    </form>
@endsection