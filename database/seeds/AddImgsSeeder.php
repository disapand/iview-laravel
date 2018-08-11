<?php

use Illuminate\Database\Seeder;

class AddImgsSeeder extends Seeder
{
    /**
     * @throws Exception
     *
     */
    public function run()
    {
        $img = \App\Models\televisionResourcesImg::findOrFail(1);
        $tvs = \App\Models\televisionResources::all();
        foreach ($tvs as $tv) {
            $times = random_int(3, 5);
            for ($i = 0; $i < $times; $i ++){
                \App\Models\televisionResourcesImg::create([
                    'television_resources_id' => $tv->id,
                    'url' => $img->url,
                ]);
            }
        }
    }
}
