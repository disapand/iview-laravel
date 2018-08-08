<?php

use Illuminate\Database\Seeder;

class CaseImgsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\CaseImg::class)->times(60)->create();
    }
}
