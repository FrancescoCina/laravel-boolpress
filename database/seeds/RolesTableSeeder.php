<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use Faker\Generator as Faker;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $roles_names = ['Admin', 'Editor', 'Reviewer', 'Guest'];

        foreach ($roles_names as $name) {
            $new_role = new Role();
            $new_role->name = $name;
            $new_role->color = $faker->hexColor();
            $new_role->save();
        }
    }
}
