<?php

use App\Product;
use App\User;
use Faker\Generator as Faker;

$factory->define(App\Reservation::class, function (Faker $faker) {
    return [
        'product_id' => Product::all()->random()->id,
        //'user_id' => User::all()->random()->id,
        'date' => $faker->dateTimeBetween('now', '+3 days'),
    ];
});
