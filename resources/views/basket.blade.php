@extends('templates.test')

@section('content')
    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li>Panier</li>
                    </ul>
                </div>

                <div class="col-md-9" id="basket">

                    <div class="box">

                        <form method="post" action="{{route('update.basket')}}">
                            {{ csrf_field() }}

                            <h1>Panier</h1>
                            <p class="text-muted">Vous avez actuellement {{$nbItems}} articles dans votre panier</p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th colspan="2">Articles</th>
                                        <th>Quantité</th>
                                        <th>Prix unité</th>
                                        <th colspan="2">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($basket as $item)
                                        <tr>
                                            <td>
                                                <img src="{{url('images/'.$item->options->img)}}" alt="{{$item->name}}">
                                            </td>
                                            <td>{{$item->name}}</td>
                                            <td>
                                                <input type="number" value="{{$item->qty}}" class="form-control" name="quantity{{$item->rowId}}">
                                            </td>
                                            <td>{{$item->price}}€</td>
                                            <td>{{$item->price * $item->qty}}€</td>
                                            <td><a href="/removeFromBasket?id={{$item->rowId}}"><i class="fa fa-trash-o"></i></a>
                                        </tr>

                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th colspan="4">Total</th>
                                        <th colspan="2">{{$total}}€</th>
                                    </tr>
                                    </tfoot>
                                </table>

                            </div>
                            <!-- /.table-responsive -->

                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="category.html" class="btn btn-default"><i class="fa fa-chevron-left"></i>Continuer vos achats</a>
                                </div>
                                <div class="pull-right">
                                    <button class="btn btn-default">
                                        <i class="fa fa-refresh">
                                        </i>
                                        Mise à jour panier
                                    </button>
                                    <a href="{{route('checkout')}}" class="btn btn-primary">Procédé au paiement<i class="fa fa-chevron-right"></i></a>
                                    {{--<button type="submit" class="btn btn-primary">--}}
                                    {{--</button>--}}
                                </div>
                            </div>

                        </form>

                    </div>

                </div>
                <!-- /.col-md-9 -->

                <div class="col-md-3">
                    <div class="box" id="order-summary">
                        <div class="box-header">
                            <h3>Résumé de la commande</h3>
                        </div>
                        <p class="text-muted">Nous ne livrons pas les commandes pour l'instant.</p>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td>Sous-total</td>
                                    <th>{{$subtotal}}€</th>
                                </tr>
                                <tr>
                                    <td>Tax</td>
                                    <th>{{$tax}}€</th>
                                </tr>
                                <tr class="total">
                                    <td>Total</td>
                                    <th>{{$total}}€</th>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
                <!-- /.col-md-3 -->

            </div>
            <!-- /.container -->
        </div>
@endsection