<?php

use Illuminate\Database\Seeder;

class sqxmsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\sqxm::truncate();
        factory(\App\Models\sqxm::class)->times(100)->create();
    }
}
