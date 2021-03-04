<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'forum_id' => "FOM".$faker->randomDigit,
        'comment_id' => "COM".$faker->randomDigit,
        'user_id'=>"EST".$faker->randomDigit,
        'contents' => $faker->text($maxNbChars = 50)
    ];
});
