<?php

namespace App\Http\Controllers;


use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Paypal;


class PayPalController extends Controller
{
    public function bringMyMoney(){
        $x = 0;
        $cart = Cart::content();
        $params = [
            'RETURNURL' => 'http://localhost:8000/checkout/paymentMethod/paypalproccess',//route('paypalProcess'),
            'CANCELURL' => route('paypalCancel'),
            'PAYMENTREQUEST_0_AMT' => Cart::total(),
            'PAYMENTREQUEST_0_CURRENCYCODE' => 'EUR',
            'PAYMENTREQUEST_0_ITEMAMT' => Cart::total(),
        ];
        foreach($cart as $k => $item):
            $params["L_PAYMENTREQUEST_0_NAME$x"] = $item->name;
            $params["L_PAYMENTREQUEST_0_DESC$x"] = 'none';
            $params["L_PAYMENTREQUEST_0_AMT$x"] = $item->price + Cart::tax();
            $params["L_PAYMENTREQUEST_0_QTY$x"] = $item->qty;
            $x++;
        endforeach;

        $paypal = new Paypal(false, 'SetExpressCheckout');
        $response = $paypal->request($params);

        if($response != false && $response['ACK'] == 'Success'):
            $url = 'https://www.sandbox.paypal.com/webscr?cmd=_express-checkout&useraction=commit&token=' . $response['TOKEN'];
            header('Location: '.$url);
            die();
        else:
            //Erreur payment
            return false;
        endif;

    }

    public function process(){
        $cart = Cart::content();
        $token = $_GET['token'];
        $paypal = new Paypal(false, 'GetExpressCheckoutDetails');
        $response = $paypal->request(array(
            'TOKEN' => $token
        ));
        if($response):
//            dd($response);
            if($response['CHECKOUTSTATUS'] == 'PaymentActionCompleted'):
                return view('error.blade.php')->with('error', 'Ce paiement a déjà été validé');
            endif;
        else:
            var_dump($response->errors);
            die();
        endif;

        $params = [
            'TOKEN' => $token,
            'PAYERID' => $_GET['PayerID'],
            'PAYMENTACTION' => 'sale',
            'PAYMENTREQUEST_0_AMT' => $response['PAYMENTREQUEST_0_AMT'],
            'PAYMENTREQUEST_0_CURRENCYCODE' => 'EUR',
            'PAYMENTREQUEST_0_ITEMAMT' => Cart::total(),
        ];
        foreach($cart as $k => $item):
            $params["L_PAYMENTREQUEST_0_NAME$k"] = $item->name;
            $params["L_PAYMENTREQUEST_0_DESC$k"] = 'none';
            $params["L_PAYMENTREQUEST_0_AMT$k"] = $item->price + Cart::tax();
            $params["L_PAYMENTREQUEST_0_QTY$k"] = $item->qty;
        endforeach;

        $success = new Paypal(false, 'DoExpressCheckoutPayment');
        $response = $success->request($params);
        if($response):
            dd($response);
        else:
            dd($response->errors);
        endif;

        return view('process.blade.php');
    }
}
