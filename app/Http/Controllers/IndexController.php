<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Category;
use App\Schelude;

class IndexController extends Controller
{
    public function index(){
        $nbItems = Cart::count();
        $scheludes = Schelude::all();
        $categories = Category::all();
//        dd($categories, $scheludes);
        return view('index', ['categories' => $categories, 'scheludes' => $scheludes, 'nbItems' => $nbItems]);
    }
}
