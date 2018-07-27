<?php

use Illuminate\Database\Seeder;

class newspaperResourceImgsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\newspaperResourceImg::class)->times(20)->create();
    }
}
