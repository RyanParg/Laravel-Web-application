<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Page;
use Faker\Generator as Faker;

$factory->define(Page::class, function (Faker $faker) {
    return [
      //create a fake title.
      'title' => $faker->realText(30),

      'content' => $faker->realText(200),
      
      //assigns a owner id to this page to enforce the one to many relationship.
      'owner_id' =>App\Owner::inRandomOrder()->first()->id,
    ];
});
