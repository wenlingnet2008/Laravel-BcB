<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\DefaultPara::class, function (Faker $faker) {
    return [
        "para" => $faker->words(2, true),
        "catid" => function(){
            return \App\Models\Category::all()->random()->catid;
        }
    ];
});
