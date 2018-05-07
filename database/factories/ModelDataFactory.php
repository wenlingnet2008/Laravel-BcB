<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\ModelData::class, function (Faker $faker) {
    return [
        'content' => $faker->realText(),
    ];
});
