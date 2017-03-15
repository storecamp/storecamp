<?php

namespace App\Core\Models;

use App\Core\Base\Model;
use App\Core\Support\Cacheable\CacheableEloquent;
use App\Core\Traits\GeneratesUnique;
use RepositoryLab\Repository\Contracts\Transformable;
use RepositoryLab\Repository\Traits\TransformableTrait;

class Currency extends Model implements Transformable
{
    use TransformableTrait;
    use GeneratesUnique;
    use CacheableEloquent;

    protected $fillable = ['name', 'code', 'sign', 'main'];

    public static function boot()
    {
        parent::boot();
    }

    public function setSignAttribute($value)
    {
        if (!empty($value)) {
            $this->attributes['sign'] = $value;
        } else {
            $this->attributes['sign'] = '';
        }
    }
    public function setMainAttribute($value)
    {
        if (!empty($value)) {
            $this->attributes['main'] = $value;
        } else {
            $this->attributes['main'] = 0;
        }
    }

}
