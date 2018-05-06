<?php

use Faker\Generator as Faker;
use App\Models\Member;
$factory->define(Member::class, function (Faker $faker) {
    static $password;
    return [
        "name" => $faker->unique()->word,
        "password" => $password ?: $password = bcrypt('secret'),
        'email' => $faker->unique()->safeEmail,
        "gender" => $faker->titleMale,
        "true_name" => $faker->name,
        "mobile" => $faker->phoneNumber,
        "department" => 'Development',
        "career" => $faker->jobTitle,
        "regip" => $faker->ipv4,
        "auth" => $faker->md5,
        'remember_token' => str_random(10),
    ];
});
