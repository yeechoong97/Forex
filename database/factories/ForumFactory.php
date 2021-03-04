<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Forum;
use Faker\Generator as Faker;

$factory->define(Forum::class, function (Faker $faker) {
    return [
        'forum_id' => "FOM".$faker->randomDigit,
        'user_id'=>"EST".$faker->randomDigit,
        'tag' => $faker->numberBetween($min = 1, $max = 9),
        'title' => $faker->text($maxNbChars = 20),
        'contents' => $faker->text($maxNbChars = 50)
    ];
});
