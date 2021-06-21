<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Genres;
use Faker\Generator as Faker;


$factory->define(Genres::class, function (Faker $faker) {
    return [
        'name' => $faker->userName
    ];
});
