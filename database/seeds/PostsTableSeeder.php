<?php


use App\Models\Post;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        $categories_id = Category::select('id')->pluck('id')->toArray();


        for ($i = 0; $i < 50; $i++) {
            $post = new Post();
            $post->title = $faker->words(3, true);
            $post->category_id = Arr::random($categories_id);
            $post->content = $faker->text(2000);
            $post->image = $faker->imageUrl(250, 250);
            $post->slug = Str::slug($post->title, '-');
            $post->save();
        }
    }
}
