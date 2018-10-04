<?php

use App\Branch;
use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'branch_id' => Branch::all()->random()->id,
        'name' => $faker->sentence,
        'price' => $faker->numberBetween(1, 100),
        'stock' => $faker->numberBetween(1, 100),
        'type' => $faker->sentence,
        'day' => $faker->dayOfWeek,
    ];
});
