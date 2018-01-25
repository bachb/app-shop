<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{	//N->1
    public function product()
    {
    	return $this->belongsTo(Product::class);
    }
}
