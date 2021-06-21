<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genres extends Model
{
    protected $fillable = [
        'name', 'is_active',
    ];

    public function moviesGenres()
    {
        return $this->hasMany(Movies::class, 'id_genres', 'id');    
    }
    
}
