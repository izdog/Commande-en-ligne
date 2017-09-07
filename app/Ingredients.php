<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredients extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'category_ingredients_id', 'price', 'available'];

    public function categoryIngredient(){
        return $this->belongsTo('App\CategoryIngredient', 'category_ingredients_id');
    }
}
