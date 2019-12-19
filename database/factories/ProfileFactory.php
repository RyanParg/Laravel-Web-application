<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Profile;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {
    return [
      'bio' => $faker->realText(100),

      'phone_number' => $faker->phoneNumber(),

      'user_id' =>App\User::inRandomOrder()->first()->id,
    ];
});
