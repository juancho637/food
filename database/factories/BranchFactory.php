<?php

use App\Company;
use Faker\Generator as Faker;

$factory->define(App\Branch::class, function (Faker $faker) {
    return [
        'company_id' => Company::all()->random()->id,
        'name' => $faker->sentence,
        'address' => $faker->address,
    ];
});
