<?php

use Illuminate\Database\Seeder;
use PharIo\Manifest\Email;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Francesco',
                'email' => 'francesco@gmail.com',
                'password' => 'ciaociaociao'
            ],
            [
                'name' => 'Giancarlo',
                'email' => 'giancarlo@gmail.com',
                'password' => 'ciaociaociao'
            ],
            [
                'name' => 'Giuseppe',
                'email' => 'giuseppe@gmail.com',
                'password' => 'ciaociaociao'
            ],
            [
                'name' => 'Amedeo',
                'email' => 'amedeo@gmail.com',
                'password' => 'ciaociaociao'
            ],

        ];

        foreach ($users as $utente) {
            $user = new User();
            $user->name = $utente['name'];
            $user->email = $utente['email'];
            $user->password = bcrypt($utente['password']);
            $user->save();
        }
    }
}
