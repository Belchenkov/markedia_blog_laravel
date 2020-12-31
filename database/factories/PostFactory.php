<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence($nbWords = 4, $variableNbWords = true),
        'description' => $faker->realText(100),
        'content' => $faker->realText(150),
        'category_id' => $faker->numberBetween(1, 10),
        'views' => $faker->numberBetween(0, 50),
        'thumbnail' => $faker->imageUrl($width = 640, $height = 480)
    ];
});
