<?php

use App\Company;
use Faker\Generator as Faker;

$factory->define(App\Branch::class, function (Faker $faker) {
    return [
        'name' => $faker->streetName,
        'address' => $faker->address,
        'longitude' => $faker->longitude,
        'latitude' => $faker->latitude,
    ];
});
