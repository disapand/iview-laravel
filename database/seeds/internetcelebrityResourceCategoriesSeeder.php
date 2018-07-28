<?php

use Illuminate\Database\Seeder;

class internetcelebrityResourceCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorise = [
            ['name' => '财经'],
            ['name' => '体育'],
            ['name' => '时尚'],
            ['name' => '科技'],
            ['name' => '生活'],
            ['name' => '旅游'],
            ['name' => '八卦'],
            ['name' => '音乐'],
            ['name' => '影视'],
            ['name' => '艺术'],
            ['name' => '汽车'],
            ['name' => '健康'],
            ['name' => '漫画'],
            ['name' => '搞笑'],
            ['name' => '美食'],
            ['name' => '游戏'],
            ['name' => '亲子'],
            ['name' => '宠物'],
            ['name' => '其他'],
        ];

        \App\Models\internetcelebrityResourceCategory::insert($categorise);

    }
}
