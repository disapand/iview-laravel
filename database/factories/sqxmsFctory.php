<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\sqxm::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'range' => $faker->word,
        'expanded' => $faker->word,
    ];
});
