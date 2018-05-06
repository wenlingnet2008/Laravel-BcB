<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\DefaultParaValue::class, function (Faker $faker) {
    return [
        "value" => $faker->catchPhrase,
        'unit' => array_random(['kw', 'w', 'v']),
        'norm_unit' => 'w',
        'change_value' => $faker->randomNumber(),
    ];
});
