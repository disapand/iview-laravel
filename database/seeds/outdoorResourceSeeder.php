<?php

use Illuminate\Database\Seeder;

class outdoorResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\outdoorResource::class)->times(20)->create();
    }
}
