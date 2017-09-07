<?php

namespace App\Http\Controllers;


use App\Ingredients;
use Illuminate\Http\Request;
use App\AddOn;
use App\Category;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;

class orderController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
//        $this->middleware('schelude');
    }
    public function index(){
        $basket = Cart::content();
        $nbItems = Cart::count();
        $categories = Category::all();
        $products = Product::all();
        $total = Cart::total();

//        dd($basket);
        return view('order', compact('basket', 'total', 'categories', 'products', 'nbItems'));
    }
    public function getProductByCategory($category){
        $nbItems = Cart::count();
        $categories = Category::all();
        $basket = Cart::content();
        $products = Category::where('name', $category)->first()->products;
        return view('orderByCategory' ,compact('products', 'categories', 'basket', 'category', 'nbItems'));
    }
    public function addToBasket(){
        $id = $_GET['id'];
        $product = Product::findOrFail($id);
        $quantity = intval($_POST['quantity']);
        if(is_int($quantity) && $quantity > 0):
        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => $quantity,
            'price' => $product->price,
            'options' => ['img' => $product->image, 'desc' => $product->description]
        ]);
        endif;
        return back();
    }

    public function addToBasketCustomize(Request $request){

        $description = '';
        $ingredients = [];
        $total = 0;

        $this->validate($request, [
           'pain' => 'required',
            'quantity' => 'required'
        ]);

        $customize = $request->all();

        foreach($customize as $key => $value):
            if(is_numeric($value) && $key != 'quantity'):
                $ingredients[] = Ingredients::FindOrfail($value);
            endif;
        endforeach;

        foreach($ingredients as $ingredient):
            $description .= $ingredient->name.', ';
            $total += $ingredient->price;
        endforeach;

        Cart::add([
            'id' => rand(100,300),
            'name' => 'Votre tranche de pain',
            'qty' => $request->quantity,
            'price' => $total,
            'options' => ['img' => 'customize.jpg', 'description' => $description]

        ]);

        return back()->with('success', 'Votre tartine a bien été ajouté à votre panier');


    }

    public function removeFromBasket(){
      $rowId = $_GET['id'];
        Cart::remove($rowId);
        return back();
    }

    public function destroyBasket(){
        Cart::destroy();
    }

    public function customize(){
        $nbItems = Cart::count();
        $categories = Category::all();
        $ingredients = Ingredients::with('categoryIngredient')->get();
//        dd($ingredients);
//        $categoriesIngredients = CategoryIngredient::all();

        return view('customize', compact('categories', 'ingredients','nbItems'));
    }
//    private function pushAddOns($array){
//        $addons = [];
//        foreach($array as $key => $value ):
//            if(preg_match('#addOns#', $key)):
//                $addons[] = $value;
//            endif;
//        endforeach;
//        return $addons;
//    }


}