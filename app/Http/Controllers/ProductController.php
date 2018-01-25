<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function show($id)
    {
    	$product = Product::find($id);
    	$images = $product->images;

    	$imagesLeft = collect(); //1 coleccion vacia
    	$imagesRight = collect();//2 coleccion vacia
    	foreach ($images as $key => $image) { //itera sobre las imagenes y les asigna un key
    		if ($key%2==0) // si key modulo 2 es igual a cero colocamos la imagen en el lado Izquierdo
    			$imagesLeft->push($image);
    		else
    			$imagesRight->push($image);
    		
    	}

    	return view('products.show')->with(compact('product', 'imagesLeft', 'imagesRight'));
    }
}
