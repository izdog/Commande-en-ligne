<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('category')->get();
//        dd($products);
        return view('admin.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        return view('admin.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


//        dd($request->all());
        $this->validate($request, [
            'name' => 'required|unique:products|min:3',
            'ingredient' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required|numeric',
            'image' => 'required|image'

        ]);
        
        Product::create($request->all());
        return redirect(route('admin.index'))->with('success', 'Le produit "'.$request->name.'"a bien été créé');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::pluck('name', 'id');
        return view('admin.edit', compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $this->validate($request, [
            'image' => "image"
        ]);
        $product->update($request->all());
        return redirect(route('admin.index'))->with('success', 'Le produit a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = DB::table('products')
                    ->select('image')
                    ->where('id', $id)
                    ->first();
        if($file && $file->image != null):
            $filename = public_path().'/images/'.$file->image;
            dd(File::delete($filename));
        endif;

        Product::destroy($id);
        return redirect(route('admin.index'))->with('success', 'Le produit a bien été supprimé');

    }
}
