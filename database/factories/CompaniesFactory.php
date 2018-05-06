<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Company::class, function (Faker $faker) {
    return [
        "company" => $faker->company,
        "mode" => array_random(['Manufacturer', 'Distributor', 'Repairer']),
        "capital" => $faker->randomFloat(2, 1000, 900000),
        "regunit" => 'USD',
        "regyear" => $faker->year(),
        "business" => $faker->catchPhrase,
        "telephone" => $faker->phoneNumber,
        "fax" => $faker->phoneNumber,
        "email" => $faker->companyEmail,
        "address" => $faker->address,
        "homepage" => $faker->domainName,
        "content" => $faker->realText(),
    ];
});
