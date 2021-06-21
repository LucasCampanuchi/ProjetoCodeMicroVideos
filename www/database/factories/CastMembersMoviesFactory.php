<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\CastMemberMovies;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;


$factory->define(CastMemberMovies::class, function (Faker $faker) {

    $movies = DB::select('SELECT id FROM movies');
    $castMembers = DB::select('SELECT id FROM cast_members');

    $idCastMember = 0;
    $idMovies = 0;

    do{
        $idCastMember = $castMembers[random_int(0, count($castMembers)-1)]->id;
        $idMovies = $movies[random_int(0, count($movies)-1)]->id;
    
        $ifexists = DB::select('SELECT EXISTS(SELECT * FROM cast_member_movies WHERE id_cast_member = '.$idCastMember.' AND id_movies = '.$idMovies.') as exist');
    }while ($ifexists[0]->exist == 1);
     
    

    return [
        'id_cast_member' => $idCastMember,
        'id_movies' => $idMovies
    ];
    
});
