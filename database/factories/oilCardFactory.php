<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\oilCard::class, function (Faker $faker) {

    $car = \App\Models\Car::all();
    $car_id = [];
    foreach ($car as $c) {
        array_push($car_id, $c->id);
    }

    return [
        'No' => '123465',
        'pwd' => '1234',
        'car_id' => $faker->randomElement($car_id)
    ];
});
