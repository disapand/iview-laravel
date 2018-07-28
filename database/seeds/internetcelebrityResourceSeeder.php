<?php

use Illuminate\Database\Seeder;

class internetcelebrityResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\internetcelebrityResourceImgs::class)->times(20)->create();

        $categories = \App\Models\internetcelebrityResourceCategory::all('id')->toArray();
        $internetcelebrities = \App\Models\internetcelebrityResource::all('id')->toArray();

        $d1 = [];
        $d2 = [];
        foreach ( $categories as $category) {
            array_push($d1, $category['id']);
        }
        foreach ($internetcelebrities as $internetcelebrity) {
            array_push($d2, $internetcelebrity['id']);
        }

        for ($i = 0; $i < 20; $i ++) {
            DB::table('category_internetcelerities')->insert(
                [
                    'internetcelebrity_resources_id' => array_rand($d2),
                    'internetcelebrity_resources_category_id' => array_rand($d1),
                ]
            );
        }
    }
}
