<?php

namespace App\Core\Models;

use Illuminate\Database\Eloquent\Model;
use App\Core\Traits\GeneratesUnique;
use RepositoryLab\Repository\Contracts\Transformable;
use RepositoryLab\Repository\Traits\TransformableTrait;

class Counter extends Model implements Transformable
{
    use TransformableTrait;
    use GeneratesUnique;
    protected $table = 'counter';
    protected $fillable = array('class_name', 'object_id');

    public static function boot()
    {
       parent::boot();
    }

}
