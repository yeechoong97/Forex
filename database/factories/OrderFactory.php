<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'user_id'=> 'EST'.$faker->randomDigit,
		'ticketID'=> 'AOD'.$faker->randomDigit,
		'type'=> $faker->randomElement(['Long','Short']),
		'pair'=> $faker->randomElement(['EUR_USD','AUD_USD','GBP_USD','USD_JPY',"EUR_JPY"]),
		'margin'=> $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = null),
		'total_units'=>$faker->numberBetween($min = 1, $max = 10000),
		'available_units'=>$faker->numberBetween($min = 1, $max = 10000),
		'entry_price'=>$faker->randomFloat($nbMaxDecimals = 5, $min = 1, $max = 200),
		'status'=> $faker->randomElement([1,0]),
    ];
});
