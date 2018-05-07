<?php

use Faker\Generator as Faker;
use App\Models\ModelNumber;

$factory->define(ModelNumber::class, function (Faker $faker) {
    return [
        "name" => $faker->words(3, true),
        "brandid" => function(){
            return \App\Models\Brand::all()->random()->brandid;
        },
        "sellnum" => $faker->numberBetween(10, 1000),
        "letter" => strtoupper($faker->randomLetter),
        "price" => $faker->numberBetween(1000, 90000),
        "thumb" => json_encode(["thumb1"=>$faker->imageUrl(), "thumb2"=>$faker->imageUrl()]),
        "linkurl" => 'test-link',
    ];
});
