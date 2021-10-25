<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $tag_names = ['Frontend', 'Backend', 'Fullstack', 'Devops', 'UX/UI'];

        foreach ($tag_names as $nome) {
            $tag = new Tag();
            $tag->name = $nome;
            $tag->color = $faker->hexColor();
            $tag->save();
        }
    }
}
