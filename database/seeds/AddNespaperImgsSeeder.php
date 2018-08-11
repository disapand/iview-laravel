<?php

use Illuminate\Database\Seeder;

class AddNespaperImgsSeeder extends Seeder
{
    public function run()
    {
        $img = \App\Models\televisionResourcesImg::findOrFail(1);
        $newspapers = \App\Models\newspaperResource::all();
        foreach ($newspapers as $newspaper) {
            $times = random_int(3, 5);
            for ($i = 0; $i < $times; $i++ ) {
                \App\Models\newspaperResourceImg::create([
                    'newspaper_resources_id' => $newspaper->id,
                    'url' => $img->url,
                ]);
            }
        }
    }
}
