<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\televisionResources::class, function (Faker $faker) {

    return [
        'channel' => $faker->word,
        'form' => $faker->word,
        'detail' => $faker->sentence,
        'area' => $faker->word,
        'language' => $faker->word,
        'category' => $faker->randomElement(['综合','新闻','财经','体育','娱乐','时尚','科技','其他',
            '生活','文史','军事','旅游','八卦','音乐','电影','少儿','艺术','汽车','健康']),
        'station' => $faker->word,
        'minimum_buy' => random_int(10, 50),
        'time' => $faker->randomElement(['5','10','15','20','25','30','45','60','120']),
        'company' => $faker->name,
        'contributor' => $faker->word,
        'price' => random_int(0, 1000),
        'country' => $faker->word,
        'program' => $faker->paragraph,
        'requirements' => $faker->sentence,
        'isuse' => $faker->randomElement([true, false]),
        'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
        'deleted_at' => null,
    ];
});
