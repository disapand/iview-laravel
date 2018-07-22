<?php

use Illuminate\Database\Seeder;

class kzlxSqxmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 60; $i ++) {
            DB::table('kzlx_sqxm')->insert([
                'kzlx_id' => random_int(1, 4),
                'sqxm_id' => random_int(1, 100),
            ]);
        }
    }
}
