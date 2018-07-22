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
        \Illuminate\Database\Eloquent\Model::unguard();
        // $this->call(UsersTableSeeder::class);
//        $this->call(carSeeder::class);
//        $this->call(oilCardSeeder::class);
        $this->call(kzlxesSeeder::class);
        $this->call(sqxmsSeeder::class);
        $this->call(kzlxSqxmSeeder::class);
        \Illuminate\Database\Eloquent\Model::reguard();
    }
}
