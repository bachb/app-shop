<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // $category->products 1:N
    public function products()
    {
    	return $this->hasMany(Product::Class);
    }
}