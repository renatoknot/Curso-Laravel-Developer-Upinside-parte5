<?php

use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(\App\Category::class, function (Faker $faker) {

    $category = $faker->words(3, true);

    return [
        'name' => $category,
        'slug' => Str::slug($category)
    ];
});
