<?php

use Faker\Generator as Faker;
use App\Models\Series;
use App\Models\Brand;
$factory->define(Series::class, function (Faker $faker) {
    return [
        "name" => $faker->words(2, true),
        "parentid" => 0,
        "brandid" => function(){
            return Brand::first()->brandid;
        },
        "content" => $faker->realText(),
    ];
});
