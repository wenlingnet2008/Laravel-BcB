<?php

use Faker\Generator as Faker;
use App\Models\Category;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->words(3, true) ,

    ];
});

$factory->state(Category::class, 'one', function (Faker $faker){
   return [
       'parentid' => 0,
   ];
});

$factory->state(Category::class, 'two', function (Faker $faker){
    return [
        'parentid' => $faker->numberBetween(1, 10),
    ];
});

$factory->state(Category::class, 'three', function (Faker $faker){
    return [
        'parentid' => $faker->numberBetween(11, 20),
    ];
});
