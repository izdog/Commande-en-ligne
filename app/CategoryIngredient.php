<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryIngredient extends Model
{
    protected $fillable = ['name'];
    
    public function ingredients(){
        return $this->hasMany('App\Ingredients');
    }
}
