<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\televisionResourcesImg::class, function (Faker $faker) {

    $url = [
        'https://fsdhubcdn.phphub.org/uploads/images/201710/14/1/s5ehp11z6s.png?imageView2/1/w/200/h/200',
        'https://fsdhubcdn.phphub.org/uploads/images/201710/14/1/Lhd1SHqu86.png?imageView2/1/w/200/h/200',
        'https://fsdhubcdn.phphub.org/uploads/images/201710/14/1/LOnMrqbHJn.png?imageView2/1/w/200/h/200',
        'https://fsdhubcdn.phphub.org/uploads/images/201710/14/1/xAuDMxteQy.png?imageView2/1/w/200/h/200',
        'https://fsdhubcdn.phphub.org/uploads/images/201710/14/1/ZqM7iaP4CR.png?imageView2/1/w/200/h/200',
        'https://fsdhubcdn.phphub.org/uploads/images/201710/14/1/NDnzMutoxX.png?imageView2/1/w/200/h/200',
    ];

    $tv = \App\Models\televisionResources::all();
    $tvId = [];
    foreach ($tv as $i) {
        array_push($tvId, $i->id);
    }

    return [
        'television_resources_id' => $faker->randomElement($tvId),
        'url' => $faker->randomElement($url),
    ];
});
