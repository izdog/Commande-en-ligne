@extends('layouts.form')
@section('content')
    <h1 class="page-header">Horaire</h1>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Jours</th>
                <th>Début midi</th>
                <th>Fin midi</th>
                <th>Début soirée</th>
                <th>Fin soirée</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
                    @foreach($scheludes as $schelude)
                        <tr>
                            <td>{{ucfirst($schelude->day)}}</td>
                            <td>{{$schelude->morning_start}}</td>
                            <td>{{$schelude->morning_end}}</td>
                            <td>{{$schelude->evening_start}}</td>
                            <td>{{$schelude->evening_end}}</td>
                            <td><a href="{{ route('schelude.edit', $schelude)}}" class="btn btn-primary">Editer</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection