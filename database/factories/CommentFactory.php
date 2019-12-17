<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [

      'content' => $faker->realText(200),

      //assigns a owner id to this page to enforce the one to many relationship.
      'user_id' =>App\User::inRandomOrder()->first()->id,

      'page_id' =>App\Page::inRandomOrder()->first()->id,

    ];
});
