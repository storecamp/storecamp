<?php

namespace App\Core\Models;

use App\Core\Base\Model;
use App\Core\Traits\GeneratesUnique;
use RepositoryLab\Repository\Contracts\Transformable;
use RepositoryLab\Repository\Traits\TransformableTrait;

class Parser extends Model implements Transformable
{
    use TransformableTrait;
    use GeneratesUnique;

    protected $table = 'parsers';
    protected $fillable = ['name', 'url', 'search_query', 'image'];

    public static function boot()
    {
        parent::boot();
    }
}
