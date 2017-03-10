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

    protected $table = 'menu_items';

    protected $fillable = [
        'order',
        'title',
        'route',
        'parameters',
        'target',
        'icon_class',
        'color',
        'menu_id',
        'parent_id'
    ];
    protected $guarded = ['id', '_token'];

    /**
     * @return mixed
     */
    public function children()
    {
        return $this->hasMany(MenuItems::class, 'parent_id')
            ->with('children');
    }

    /**
     * @param bool $absolute
     * @return \Illuminate\Contracts\Routing\UrlGenerator|mixed|string
     */
    public function link($absolute = false)
    {
        if (!is_null($this->route)) {
            if (!\Route::has($this->route)) {
                return '#';
            }

            $parameters = (array)$this->getParametersAttribute();

            return route($this->route, $parameters, $absolute);
        }

        return $this->route;
    }

    /**
     * @return mixed
     */
    public function getParametersAttribute()
    {
        return json_decode($this->attributes['parameters']);
    }

    /**
     * @param $value
     */
    public function setParametersAttribute($value)
    {
        if (is_array($value)) {
            $value = json_encode($value);
        }

        $this->attributes['parameters'] = $value;
    }

    /**
     * @param $value
     */
    public function setOrderAttribute($value)
    {
        $this->attributes['order'] = $value ?? 0;
    }

    /**
     * @param $value
     */
    public function setUrlAttribute($value)
    {
        if (is_null($value)) {
            $value = '';
        }

        $this->attributes['url'] = $value;
    }
}
