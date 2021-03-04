<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Trades;
use Faker\Generator as Faker;

$factory->define(Trades::class, function (Faker $faker) {
    return [
        'ticketID' => 'EST'.$faker->randomDigit,
		'units' =>  $faker->numberBetween($min = 1, $max = 10000),
		'exit_price' => $faker->randomFloat($nbMaxDecimals = 5, $min = 1, $max = 200),
		'cost' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = null),
		'profit' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = null),
    ];
});
