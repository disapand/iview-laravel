<?php

use Illuminate\Database\Seeder;

class carSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cars = factory(\App\Models\Car::class)->times(10)->make();

        \App\Models\Car::insert($cars->toArray());
    }
}
