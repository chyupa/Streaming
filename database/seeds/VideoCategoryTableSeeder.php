<?php

use Illuminate\Database\Seeder;

class VideoCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\VideoCategory::class, 100)->create();
    }
}
