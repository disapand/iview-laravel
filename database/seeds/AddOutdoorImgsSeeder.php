<?php

use Illuminate\Database\Seeder;

class AddOutdoorImgsSeeder extends Seeder
{
    /**
     * @throws Exception
     */
    public function run()
    {
        $img = \App\Models\televisionResourcesImg::findOrFail(1);
        $outdoors = \App\Models\outdoorResource::all();
        foreach ($outdoors as $outdoor) {
            $times = random_int(3, 5);
            for ($i = 0; $i < $times; $i++ ) {
                \App\Models\outdoorResourceImgs::create([
                    'outdoor_resources_id' => $outdoor->id,
                    'url' => $img->url,
                ]);
            }
        }
    }
}
