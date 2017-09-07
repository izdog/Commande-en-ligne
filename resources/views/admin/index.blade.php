@extends('layouts/form')
@section('content')
            <h1 class="page-header">Produit</h1>
            <div class="createProduct">
                <a href="{{ route('admin.create') }}" class="btn btn-primary">Ajouter un produit</a>
            </div>
            <br>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Produit</th>
                            <th>Ingredients</th>
                            <th>Prix</th>
                            <th>Catégorie</th>
                            <th>Show</th>
                            <th>Suppléments</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ ucfirst($product->name) }}</td>
                                <td>{{ ucfirst($product->ingredient) }}</td>
                                <td>{{ $product->price }} €</td>
                                <td>{{ ucfirst($product->category->name)}}</td>
                                <td>{{ $product->add_online }}</td>
                                <td>{{$product->add_on}}</td>
                                <td><a href="{{ route('admin.edit', $product)}}" class="btn btn-primary">Editer</a></td>
                                <td>
                                    {{ Form::Open(['method' => 'DELETE', 'route' => ['admin.destroy', $product]]) }}
                                        {{ csrf_field() }}
                                        {{ Form::submit('Supprimer', ['class' => 'btn btn-danger']) }}
                                    {{ Form::close() }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
@endsection