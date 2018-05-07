<?php

use Faker\Generator as Faker;
use App\Models\Brand;

$factory->define(Brand::class, function (Faker $faker) {
    return [
        'name' => $faker->words(3, true),
        'thumb' => json_encode(["thumb1"=>$faker->imageUrl()]),
        'content' => $faker->realText(),
    ];
});
