<?php

use Faker\Generator as Faker;
use App\Models\Series;
use App\Models\Brand;
$factory->define(Series::class, function (Faker $faker) {
    return [
        "name" => $faker->words(2, true),
        "brandid" => function(){
            return Brand::all()->random()->brandid;
        },
        "content" => $faker->realText(),
    ];
});
