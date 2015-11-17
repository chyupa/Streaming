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

        User::insert([
            'role_id' => 3,
            'email' => 'razvan.toader@gdm.ro',
            'password' => bcrypt('parola'),
        ]);
        factory(App\User::class, 10)->create();
    }
}
