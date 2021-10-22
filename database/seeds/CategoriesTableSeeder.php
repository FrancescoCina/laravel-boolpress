<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $category_names = ['HTML', 'CSS', 'PHP', 'JS', 'Laravel', 'VueJS', 'Bootstrap'];

        $categories = [

            ['name' => 'HTML', 'color' => 'danger'],
            ['name' => 'CSS', 'color' => 'primary'],
            ['name' => 'PHP', 'color' => 'info'],
            ['name' => 'JS', 'color' => 'warning'],
            ['name' => 'Laravel', 'color' => 'danger'],
            ['name' => 'VueJs', 'color' => 'success'],
            ['name' => 'Bootstrap', 'color' => 'primary'],
        ];


        foreach ($categories as $cat) {
            $category = new Category();
            $category->name = $cat['name'];
            $category->slug = Str::slug($cat['name'], '-');
            $category->color = $cat['color'];
            $category->save();
        }
    }
}
