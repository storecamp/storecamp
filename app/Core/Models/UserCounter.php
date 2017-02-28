<?php

namespace App\Core\Models;

use Illuminate\Database\Eloquent\Model;
use App\Core\Traits\GeneratesUnique;
use RepositoryLab\Repository\Contracts\Transformable;
use RepositoryLab\Repository\Traits\TransformableTrait;

class UserCounter extends Model implements Transformable
{
    use TransformableTrait;
    use GeneratesUnique;

    protected $table = 'user_counter';
    protected $fillable = array('class_name', 'object_id', 'user_id', 'action');

    public static function boot()
    {
       parent::boot();
    }

}
