<?php

use vicgonvt\Press\Post;

$factory->define(Post::class, function (Faker\Generator $faker) {
    return [
        'identifier' => str_random(),
        'slug' => str_slug($faker->sentence),
        'title' => $faker->sentence,
        'body' => $faker->paragraph,
        'extra' => json_encode(['test' => 'value']),
    ];
});