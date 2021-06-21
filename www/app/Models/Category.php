<?php

namespace App\Models;

use App\Models\Base\BaseModel;
use App\Traits\Models\Activatable;
use App\Traits\Models\UsesUuid;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends BaseModel
{
    use SoftDeletes, UsesUuid, Activatable;

    protected $fillable = ['name',
        'description',
        'is_active'
    ];

    public function moviesCategory()
    {
        return $this->hasMany(Movies::Class, 'id_categoria', 'id');
    }
}
