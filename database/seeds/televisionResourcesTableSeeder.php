<?php

use Illuminate\Database\Seeder;

class televisionResourcesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $televisionResource = factory(\App\Models\televisionResources::class)->times(10)->make();

        \App\Models\televisionResources::insert($televisionResource->toArray());
    }
}