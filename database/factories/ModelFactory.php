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

$factory->define(App\Models\transformResource::class, function (Faker\Generator $faker) {
    return [
        'city' => $faker->city,
        'form' => $faker->word,
        'unit_num' => $faker->word,
        'position' => $faker->word,
        'language' => $faker->word,
        'category' => $faker->word,
        'area' => $faker->word,
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

$factory->define(App\Models\transformResourceImg::class, function (Faker\Generator $faker) {
    return [
        'transform_resources_id' => function () {
             return factory(App\Models\transformResource::class)->create()->id;
        },
        'url' => $faker->url,
    ];
});

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt($faker->password),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\newspaperResource::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'form' => $faker->word,
        'ad_form' => $faker->word,
        'detail' => $faker->word,
        'area' => $faker->word,
        'language' => $faker->word,
        'category' => $faker->word,
        'minimum_buy' => $faker->randomNumber(),
        'format' => $faker->word,
        'cycle' => $faker->word,
        'media_price' => $faker->word,
        'price' => $faker->word,
        'circulation' => $faker->randomNumber(),
        'page' => $faker->word,
        'country' => $faker->country,
        'version' => $faker->word,
        'company' => $faker->company,
        'contributor' => $faker->word,
        'requirements' => $faker->word,
        'isuse' => $faker->boolean,
    ];
});

$factory->define(App\Models\newspaperResourceImg::class, function (Faker\Generator $faker) {
    return [
        'newspaper_resources_id' => function () {
             return factory(App\Models\newspaperResource::class)->create()->id;
        },
        'url' => $faker->url,
    ];
});

$factory->define(App\Models\onlineResource::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'category' => $faker->word,
        'form' => $faker->word,
        'detail' => $faker->word,
        'area' => $faker->word,
        'language' => $faker->word,
        'platform' => $faker->word,
        'company' => $faker->company,
        'pv' => $faker->randomNumber(),
        'uv' => $faker->randomNumber(),
        'minimum_buy' => $faker->randomNumber(),
        'format' => $faker->word,
        'media_price' => $faker->word,
        'price' => $faker->word,
        'contributor' => $faker->word,
        'link' => $faker->word,
        'country' => $faker->country,
        'requirements' => $faker->word,
        'isuse' => $faker->boolean,
    ];
});

$factory->define(App\Models\onlineResourceImgs::class, function (Faker\Generator $faker) {
    return [
        'online_resources_id' => function () {
             return factory(App\Models\onlineResource::class)->create()->id;
        },
        'url' => $faker->url,
    ];
});

$factory->define(App\Models\internetcelebrityResource::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'platform' => $faker->word,
        'ad_form' => $faker->word,
        'detail' => $faker->word,
        'area' => $faker->word,
        'language' => $faker->word,
        'fans' => $faker->randomNumber(),
        'media_price' => $faker->word,
        'price' => $faker->word,
        'company' => $faker->company,
        'contributor' => $faker->word,
        'advantage' => $faker->word,
        'country' => $faker->country,
        'cooperation' => $faker->word,
        'requirements' => $faker->word,
        'isuse' => $faker->boolean,
    ];
});

$factory->define(App\Models\internetcelebrityResourceCategory::class, function (Faker\Generator $faker) {
    return [
        'internetcelebrity_resources_id' => $faker->randomNumber(),
    ];
});

$factory->define(App\Models\internetcelebrityResourceImgs::class, function (Faker\Generator $faker) {
    return [
        'internetcelebrity_resources_id' => function () {
             return factory(App\Models\internetcelebrityResource::class)->create()->id;
        },
        'url' => $faker->url,
    ];
});

$factory->define(App\Models\ceshi::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'country' => $faker->country,
    ];
});

$factory->define(App\Models\guanlian::class, function (Faker\Generator $faker) {
    return [
        'ceshi_id' => function () {
             return factory(App\Models\ceshi::class)->create()->id;
        },
        'phone' => $faker->phoneNumber,
    ];
});

$factory->define(App\Models\CaseImg::class, function (Faker\Generator $faker) {
    return [
        'case_resources_id' => function () {
             return factory(App\Models\CaseResource::class)->create()->id;
        },
        'url' => $faker->url,
        'category' => $faker->word,
    ];
});

$factory->define(App\Models\CaseResource::class, function (Faker\Generator $faker) {
    return [
        'category' => $faker->word,
        'title' => $faker->word,
        'content' => $faker->text,
    ];
});

