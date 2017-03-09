<?php

namespace App\Core\Models;

use App\Core\Base\Model;
use App\Core\Traits\GeneratesUnique;
use RepositoryLab\Repository\Contracts\Transformable;
use RepositoryLab\Repository\Traits\TransformableTrait;

class MenuItems extends Model implements Transformable
{
    use TransformableTrait;
    use GeneratesUnique;

    public static function boot()
    {
       parent::boot();
    }
    protected $table = 'menu_items';

    protected $guarded = [];

    public function children()
    {
        return $this->hasMany(MenuItems::class, 'parent_id')
            ->with('children');
    }

    public function link($absolute = false)
    {
        if (!is_null($this->route)) {
            if (!\Route::has($this->route)) {
                return '#';
            }

            $parameters = (array) $this->getParametersAttribute();

            return route($this->route, $parameters, $absolute);
        }

        if ($absolute) {
            return url($this->url);
        }

        return $this->url;
    }

    public function getParametersAttribute()
    {
        return json_decode($this->attributes['parameters']);
    }

    public function setParametersAttribute($value)
    {
        if (is_array($value)) {
            $value = json_encode($value);
        }

        $this->attributes['parameters'] = $value;
    }

    public function setUrlAttribute($value)
    {
        if (is_null($value)) {
            $value = '';
        }

        $this->attributes['url'] = $value;
    }


}
