<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Car::class, function (Faker $faker) {
    return [
        'car_id' => $faker->word,
        'model' => $faker->name,
    ];
});
