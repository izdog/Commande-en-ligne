<?php

namespace App\Http\Controllers;

use App\CategoryIngredient;
use App\Ingredients;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    public function index(){
        $ingredients = Ingredients::with('categoryIngredient')->get();
        return view('admin.ingredient.index', compact('ingredients'));
    }

    public function edit($id){
        $ingredient = Ingredients::findOrFail($id);
        $categories_ingredient = CategoryIngredient::pluck('name', 'id');
        return view('admin.ingredient.edit', compact('ingredient', 'categories_ingredient'));
    }

    public function create(){
        $categories_ingredient = CategoryIngredient::pluck('name', 'id');
        return view('admin.ingredient.create', compact('categories_ingredient'));
    }


    public function store(Request $request){
//        dd($request->all());
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'category_ingredients_id' => 'required',
        ]);
        Ingredients::create($request->all());
        return redirect(route('ingredients.index'))->with('success', 'L\'ingrédient a bien été ajouté');
    }


    public function update(Request $request, $id){
//        dd($request->available);
        $ingredient = Ingredients::findOrfail($id);
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'category_ingredients_id' => 'required',
        ]);
        if($request->available === null):
                $request->merge(['available' => false]);
        endif;
        $ingredient->update($request->all());
        return redirect()->back()->with('success', 'Votre ingrédient a bien été modifié');

    }
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect()->back()->with('success', 'L\'ingrédient a bien été supprimé');

    }
}
