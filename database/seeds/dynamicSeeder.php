<?php

use Illuminate\Database\Seeder;

class dynamicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\dynamic::class)->times(50)->create();
    }
}
