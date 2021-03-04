<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Account;
use Faker\Generator as Faker;


$factory->define(Account::class, function (Faker $faker) {
    return [
        'user_id' => 'EST'.$faker->randomDigit,
        'balance' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = NULL),
        'margin'=> $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = NULL),
        'margin_used'=> $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100.00),
        'leverage' => $faker->randomElement(['50 : 1','40 : 1','30 : 1','20 : 1','10 : 1'])
    ];
});
