<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Usuario Teste',
            'email' => 'joallissons@gmail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
