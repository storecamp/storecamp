<?php

namespace App\Core\Models;

use App\Core\Traits\GeneratesUnique;
use Illuminate\Database\Eloquent\Model;
use RepositoryLab\Repository\Contracts\Transformable;
use RepositoryLab\Repository\Traits\TransformableTrait;

class UserCounter extends Model implements Transformable
{
    use TransformableTrait;
    use GeneratesUnique;

    protected $table = 'user_counter';
    protected $fillable = ['class_name', 'object_id', 'user_id', 'action'];

    public static function boot()
    {
        parent::boot();
    }
}
