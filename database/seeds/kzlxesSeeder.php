<?php

use Illuminate\Database\Seeder;

class kzlxesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\kzlx::truncate();
        $category = [
            '检定',
            '校准',
            'CNAS校准',
            'CNAS测试',
        ];

        foreach ($category as $i) {
            \App\Models\kzlx::create([
                'category' => $i
            ]);
        }

    }
}
