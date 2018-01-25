<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Product;
use App\ProductImage;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //model factories

        $categories = factory(Category::class, 4)->create();//crea 5 categorias
        //para cada categoria funcion
        $categories->each(function ($category) {
            //crea 20 productos en objeto mas no guarda
            $products = factory(Product::class, 5)->make();
            //guarda los 20 productos por cada categoria
            $category->products()->saveMany($products);


            //para cada producto antes creado funcion
            $products->each(function ($p) {
                //crea 5 imagenesen objeto mas no guarda
                $images = factory(ProductImage::class, 3)->make();
                //guarda las 5 imagenes por cada producto
                $p->images()->saveMany($images);
            });
        });

    }
}
