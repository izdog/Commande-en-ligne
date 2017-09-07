<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'ingredient', 'price', 'add_online', 'category_id', 'image'];

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function setImageAttribute($image){
//        dd($image->getClientOriginalExtension());

        if(is_object($image) && $image->isValid()):
            $image->move(public_path('/images'), $this->name.'.jpg');
        $this->attributes['image'] = $this->name.'.'.$image->getClientOriginalExtension();
        endif;
    }
}
