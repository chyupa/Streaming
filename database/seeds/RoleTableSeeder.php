<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Role::create([
            "name" => "user"
        ]);
        \App\Role::create([
            "name" => "studio"
        ]);
        \App\Role::create([
            "name" => "admin"
        ]);
    }
}
