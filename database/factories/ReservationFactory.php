<?php

use App\Client;
use App\Product;
use Faker\Generator as Faker;

$factory->define(App\Reservation::class, function (Faker $faker) {
    return [
        'product_id' => Product::all()->random()->id,
        'client_id' => Client::all()->random()->id,
        'date' => $faker->dateTimeBetween('now', '+3 days'),
    ];
});
