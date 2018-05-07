<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\ModelPara::class, function (Faker $faker) {
    $dpid = \App\Models\DefaultPara::all()->random()->dpid;
    $value = \App\Models\DefaultParaValue::where("dpid", $dpid)->get()->random();
    $dvid = $value->dvid;
    $unit = $value->unit;

    return [
        "para" => $faker->words(2, true),
        "value" => $faker->words(3, true),
        "dpid" => $dpid,
        "dvid" => $dvid,
        "unit" => $unit,
    ];
});
