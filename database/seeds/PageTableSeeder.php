<?php

use Illuminate\Database\Seeder;

class PageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //creates 30 pages using faker.
      factory(App\Page::class, 30)->create();
    }
}
