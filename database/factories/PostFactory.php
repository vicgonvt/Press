<?php

use Illuminate\Support\Str;
use vicgonvt\Press\Post;

$factory->define(Post::class, function (Faker\Generator $faker) {
    return [
        'identifier' => Str::random(),
        'slug' => Str::slug($faker->sentence),
        'title' => $faker->sentence,
        'body' => $faker->paragraph,
        'extra' => json_encode(['test' => 'value']),
    ];
});