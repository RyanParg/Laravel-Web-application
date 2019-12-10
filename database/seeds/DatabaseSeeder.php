<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(OwnerTableSeeder::class);
        $this->call(PageTableSeeder::class);
        $this->call(PostTableSeeder::class);
    }
}
