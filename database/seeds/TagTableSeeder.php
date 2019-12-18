<?php

use Illuminate\Database\Seeder;
use App\Tag;
class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Tag::class, 20)->create();

        $tags = Tag::all();

        App\Page::all()->each(function ($page) use ($tags){
          $page->tags()->attach($tags->random(rand(1,3))->pluck('id')->toArray()
        );
      });


    }
}
