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
        $this->call([TagsTableSeeder::class, CategoriesTableSeeder::class, UsersTableSeeder::class, PostsTableSeeder::class]);
    }
}
