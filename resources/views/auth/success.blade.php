@extends('templates.test')

@section('content')
    <div class="all">
        <div class="content">
            <div class="container">
                <div class="col-sm-12">
                    <div class="box">
                        {{--{{dd(session())}}--}}
                        @if(session()->has('activation'))
                            <h1>Compte validé</h1>
                            <p>{{session('success')}}</p>
                        @else
                            <h1>Merci de votre inscription</h1>
                            <p>{{session('success')}}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endsection