<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CastMember extends Model
{
    protected $fillable = [
        'name', 
        'type',
    ];

    protected $table = 'cast_members';

    public function movies()
    {

        return $this->belongsToMany(Movies::class, 'cast_member_movies', 'id_cast_member', 'id_movies');   

    }
}
