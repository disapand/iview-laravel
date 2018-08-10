<?php

use Illuminate\Database\Seeder;

class insightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\insight::class)->times(50)->create();
    }
}
