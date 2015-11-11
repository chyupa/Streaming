<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::insert([
            'name' => 'Razvan Toader',
            'email' => 'razvan.toader@gdm.ro',
            'password' => bcrypt('parola'),
        ]);
    }
}
