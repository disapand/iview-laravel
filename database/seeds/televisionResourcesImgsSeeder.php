<?php

use Illuminate\Database\Seeder;

class televisionResourcesImgsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $img = factory(\App\Models\televisionResourcesImg::class)->times(15)->make();

        \App\Models\televisionResourcesImg::insert($img->toArray());
    }
}
