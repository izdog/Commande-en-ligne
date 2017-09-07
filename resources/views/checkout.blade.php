@extends('templates.test')
@section('content')

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li>Mode de paiement</li>
                    </ul>
                </div>

                <div class="col-md-9" id="checkout">

                    <div class="box">
                        <form method="get" action="{{ route('paymentMethod') }}">
                            <h1>Selectionner votre mode de paiement</h1>
                            <ul class="nav nav-pills nav-justified">
                                <li class="active"><a href="#"><i class="fa fa-money"></i><br>Mode de paiement</a>
                                </li>
                                <li class="disabled"><a href="checkout4.html"><i class="fa fa-eye"></i><br>Résumé de la commande</a>
                                </li>
                            </ul>

                            <div class="content">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="box payment-method">

                                            <h4>Paypal</h4>

                                            <p>We like it all.</p>

                                            <div class="box-footer text-center">

                                                <input type="radio" name="payment" value="paypal">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="box payment-method">

                                            <h4>Payment gateway</h4>

                                            <p>VISA and Mastercard only.</p>

                                            <div class="box-footer text-center">

                                                <input type="radio" name="payment" value="payment2">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.row -->

                            </div>
                            <!-- /.content -->

                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="basket.html" class="btn btn-default"><i class="fa fa-chevron-left"></i>Retour vers le panier</a>
                                </div>
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-primary">Continuer<i class="fa fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->


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
                <!-- /.col-md-3 -->

            </div>
            <!-- /.container -->
        </div>
@endsection