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
       'parent_id' => null,
   ];
});

$factory->state(Category::class, 'two', function (Faker $faker){
    return [
        'parent_id' => $faker->numberBetween(1, 10),
    ];
});

$factory->state(Category::class, 'three', function (Faker $faker){
    return [
        'parent_id' => $faker->numberBetween(11, 20),
    ];
});
