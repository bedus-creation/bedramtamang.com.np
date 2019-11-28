<?php

use App\Models\Laradash\Post;
use Faker\Generator as Faker;
use App\User;

$factory->define(Post::class, function (Faker $faker) {
    $title = $faker->sentence;
    return [
        "slug" => generateUrlFromTitle($title),
        "title" => $title,
        "body" => $faker->paragraph,
        "user_id" => factory(User::class)->create()->id
    ];
});
