<?php

use Illuminate\Database\Seeder;

class onlineResourceImgsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\onlineResourceImgs::class)->times(20)->create();
    }
}
