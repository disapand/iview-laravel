<?php

use Illuminate\Database\Seeder;

class outdoorResourceImgsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\outdoorResourceImgs::class)->times(20)->create();
    }
}
