<?php

use Illuminate\Database\Seeder;

class transformResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\transformResourceImg::class)->times(20)->create();
    }
}
