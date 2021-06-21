<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CastMemberMovies extends Model
{
    protected $fillable = [
        'id_cast_member', 
        'id_movies',
    ];
}
