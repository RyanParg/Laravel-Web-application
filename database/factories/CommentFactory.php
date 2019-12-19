<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {

  $user = App\User::inRandomOrder()->first();

    return [

      'content' => $faker->realText(200),

      'user_name' => $user->name,

      //assigns a owner id to this page to enforce the one to many relationship.
      'user_id' => $user->id,

      'page_id' =>App\Page::inRandomOrder()->first()->id,

    ];
});
