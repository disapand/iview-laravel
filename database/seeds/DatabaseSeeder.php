<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
//        $this->call(televisionResourcesTableSeeder::class);
//        $this->call(televisionResourcesImgsSeeder::class);
//        $this->call(outdoorResourceSeeder::class);
//        $this->call(outdoorResourceImgsSeeder::class);
        $this->call(transformResourceSeeder::class);
    }
}
