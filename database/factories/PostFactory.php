<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
      //creates a fake title and a fake content.
      'title' => $faker->realText(30),
      'content' =>$faker->realText(180),
      //assigns a page id to this post.
      'page_id' =>App\Page::inRandomOrder()->first()->id,
    ];
});
