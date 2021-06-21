<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
    protected $fillable = [
        'name', 'description', 'synopsis', 'id_categoria', 'id_genres'
    ];

    protected $table = 'movies';

    public function moviesCategory()
    {
        return $this->belongsTo(Category::class, 'id_categoria', 'id');
    }

    public function moviesGenres()
    {
        return $this->belongsTo(Genres::class, 'id_genres', 'id');
    }

    public function moviesCastMember()
    {
        return $this->belongsToMany(CastMember::class, 'cast_member_movies', 'id_movies', 'id_cast_member');    
    }

}
