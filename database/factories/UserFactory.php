<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Pin::class, function (Faker $faker) {
    return [
        'user_id' => function() {
            return factory(\App\User::class)->create()->id;
        },
        'category_id' => function() {
            return factory(\App\Category::class)->create()->id;
        },
        'title' => $faker->sentence($nbWords = 4),
        'link' => $faker->url
    ];
});

$factory->define(App\Board::class, function (Faker $faker) {
    return [
        'user_id' => function() {
            return factory(\App\User::class)->create()->id;
        },
        'category_id' => function() {
            return factory(\App\Category::class)->create()->id;
        },
        'title' => $faker->company,
        'link' => $faker->url
    ];
});

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'user_id' => function() {
            return factory(\App\User::class)->create()->id;
        },
        'title' => $faker->word,
    ];
});

$factory->define(App\Tag::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
    ];
});
