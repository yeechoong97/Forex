<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'user_id' => 'EST'.$faker->randomDigit,
        'name' => $faker->name,
        'username' => $faker->firstName(),
        'phone' => '0123456789',
        'avatar' => $faker->randomElement(["https://res.cloudinary.com/fyp202105/image/upload/v1614037855/Avatar/Avatar-1.png","https://res.cloudinary.com/fyp202105/image/upload/v1614037855/Avatar/Avatar-2.png","https://res.cloudinary.com/fyp202105/image/upload/v1614037855/Avatar/Avatar-3.png","https://res.cloudinary.com/fyp202105/image/upload/v1614037855/Avatar/Avatar-4.png","https://res.cloudinary.com/fyp202105/image/upload/v1614037855/Avatar/Avatar-5.png","https://res.cloudinary.com/fyp202105/image/upload/v1614037855/Avatar/Avatar-6.png","https://res.cloudinary.com/fyp202105/image/upload/v1614037855/Avatar/Avatar-7.png","https://res.cloudinary.com/fyp202105/image/upload/v1614037855/Avatar/Avatar-8.png","https://res.cloudinary.com/fyp202105/image/upload/v1614037855/Avatar/Avatar-9.png","https://res.cloudinary.com/fyp202105/image/upload/v1614037855/Avatar/Avatar-10.png","https://res.cloudinary.com/fyp202105/image/upload/v1614037856/Avatar/Avatar-11.png","https://res.cloudinary.com/fyp202105/image/upload/v1614037856/Avatar/Avatar-12.png","https://res.cloudinary.com/fyp202105/image/upload/v1614037856/Avatar/Avatar-13.png","https://res.cloudinary.com/fyp202105/image/upload/v1614037856/Avatar/Avatar-14.png","https://res.cloudinary.com/fyp202105/image/upload/v1614037855/Avatar/Avatar-15.png","https://res.cloudinary.com/fyp202105/image/upload/v1614037855/Avatar/Avatar-16.png"]),
        'email' => $faker->unique()->safeEmail,
        'tutorial' => $faker->randomElement([1,0]),
        'password' => Str::random(10)
    ];
});
