<?php

use Illuminate\Database\Seeder;

class oilCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $oilCars = factory(\App\Models\oilCard::class)->times(10)->make();

        \App\Models\oilCard::insert($oilCars->toArray());
    }
}
