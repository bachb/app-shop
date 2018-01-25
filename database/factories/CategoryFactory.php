<?php

use Faker\Generator as Faker;
use App\Category;

$factory->define(Category::class, function (Faker $faker) {
    return [
       'name' => ucfirst($faker->word),//aplicar mayuscula a la primera letra
       'description' => $faker->sentence(10)
    ];
});
