<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Movies;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

$factory->define(Movies::class, function (Faker $faker) {

    $categories = DB::select('SELECT id FROM categories');
    $genres = DB::select('SELECT id FROM genres');

    return [
        'name' => $faker->word,
        'description' => $faker->word,
        'synopsis' => $faker->word,
        'id_categoria' => $categories[random_int(0, count($categories)-1)]->id,
        'id_genres' => $genres[random_int(0, count($genres)-1)]->id
    ];
});
