<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function index(){
        $nbItems = Cart::count();
        $categories = Category::all();
        $basket = Cart::content();
        $total = Cart::total();
        $subtotal= Cart::subtotal();
        $tax = Cart::tax();
//        dd($basket->options);
//        dd($basket);
        return view('basket', compact('basket', 'categories','nbItems', 'total', 'subtotal', 'tax'));
}

    public function update(Request $request){
        foreach ($request->all() as $k => $value):
            if($k != '_token' && is_numeric($value)):
                $rowId = str_replace('quantity', '', $k);
                Cart::update($rowId, $value);
            endif;
        endforeach;
        dd($request->all(), Cart::content(), $rowId);
        return back()->with('success','Le panier a bien été modifié');

    }

    public function checkout(){
        $categories = Category::all();
        $nbItems = Cart::count();
        $total = Cart::total();
        $subtotal= Cart::subtotal();
        $tax = Cart::tax();
        return view('checkout', compact('nbItems', 'total', 'subtotal', 'tax', 'categories'));
    }

    public function paymentMethod(){
        if($_GET):
            if($_GET['payment'] == 'paypal'):
                return redirect(route('payWithPaypal'));
            endif;
        endif;
    }
}
