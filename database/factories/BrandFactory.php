<?php

use Faker\Generator as Faker;
use App\Models\Brand;

$factory->define(Brand::class, function (Faker $faker) {
    return [
        'name' => $faker->words(3, true),
        'thumb' => $faker->imageUrl(),
        'content' => $faker->realText(),
    ];
});
