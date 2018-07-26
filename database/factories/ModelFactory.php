<?php

$factory->define(App\Models\outdoorResource::class, function (Faker\Generator $faker) {
    return [
        'city' => $faker->city,
        'form' => $faker->word,
        'unit_num' => $faker->word,
        'language' => $faker->word,
        'category' => $faker->word,
        'property' => $faker->word,
        'SOV' => $faker->word,
        'visitor' => $faker->randomNumber(),
        'traffic' => $faker->randomNumber(),
        'minimum_buy' => $faker->randomNumber(),
        'format' => $faker->word,
        'number' => $faker->word,
        'time' => $faker->word,
        'media_price' => $faker->word,
        'price' => $faker->word,
        'total_num' => $faker->randomNumber(),
        'company' => $faker->company,
        'contributor' => $faker->word,
        'detail' => $faker->word,
        'country' => $faker->country,
        'name' => $faker->name,
        'requirements' => $faker->word,
        'isuse' => $faker->boolean,
    ];
});

$factory->define(App\Models\outdoorResourceImgs::class, function (Faker\Generator $faker) {
    return [
        'outdoor_resources_id' => function () {
             return factory(App\Models\outdoorResource::class)->create()->id;
        },
        'url' => $faker->url,
    ];
});

$factory->define(App\Models\televisionResources::class, function (Faker\Generator $faker) {
    return [
        'channel' => $faker->word,
        'form' => $faker->word,
        'detail' => $faker->word,
        'area' => $faker->word,
        'language' => $faker->word,
        'category' => $faker->word,
        'station' => $faker->word,
        'minimum_buy' => $faker->word,
        'time' => $faker->word,
        'company' => $faker->company,
        'contributor' => $faker->word,
        'price' => $faker->word,
        'country' => $faker->country,
        'program' => $faker->word,
        'requirements' => $faker->word,
        'isuse' => $faker->boolean,
    ];
});

$factory->define(App\Models\televisionResourcesImg::class, function (Faker\Generator $faker) {
    return [
        'television_resources_id' => function () {
             return factory(App\Models\televisionResources::class)->create()->id;
        },
        'url' => $faker->url,
    ];
});

