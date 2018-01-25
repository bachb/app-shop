<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // $product->category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    // $product->images
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
    //acccesors
    public function getFeaturedImageUrlAttribute()
    {
        $featuredImage = $this->images()->where('featured', true)->first(); // busca la imagen con valor true que es la destacada
        if (!$featuredImage) {
            $featuredImage = $this->images()->first(); // Condicion si no encuentra la imagen destacada trae la primer imagen
        }
        if ($featuredImage) {
            return $featuredImage->url;// Si tiene imagend estacada traer la url desde el accesor(Atributo calculado) ProductImagess            
        }
        // default
        return '/images/products/default.png';
    }
}

