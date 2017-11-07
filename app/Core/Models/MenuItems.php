<?php

namespace App\Core\Models;

use App\Core\Base\Model;
use App\Core\Traits\GeneratesUnique;
use RepositoryLab\Repository\Contracts\Transformable;
use RepositoryLab\Repository\Traits\TransformableTrait;

/**
 * App\Core\Models\MenuItems
 *
 * @property int $id
 * @property string $unique_id
 * @property int|null $menu_id
 * @property string $title
 * @property string $target
 * @property string|null $icon_class
 * @property string|null $color
 * @property int|null $parent_id
 * @property int $order
 * @property string|null $route
 * @property mixed $parameters
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Core\Models\MenuItems[] $children
 * @property-write mixed $url
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Base\Model findByField($field, $value, $columns)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\MenuItems idOrUuId($id_or_uuid, $first = true)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\MenuItems uuid($unique_id, $first = true)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\MenuItems whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\MenuItems whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\MenuItems whereIconClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\MenuItems whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\MenuItems whereMenuId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\MenuItems whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\MenuItems whereParameters($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\MenuItems whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\MenuItems whereRoute($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\MenuItems whereTarget($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\MenuItems whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\MenuItems whereUniqueId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\MenuItems whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
        'parent_id',
    ];
    protected $guarded = ['id', '_token'];

    /**
     * @return mixed
     */
    public function children()
    {
        return $this->hasMany(self::class, 'parent_id')
            ->with('children');
    }

    /**
     * @param bool $absolute
     *
     * @return \Illuminate\Contracts\Routing\UrlGenerator|mixed|string
     */
    public function link($absolute = false)
    {
        if (!is_null($this->route)) {
            if (!\Route::has($this->route)) {
                return '#';
            }

            $parameters = (array) $this->getParametersAttribute();

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

    /**
     * @param array $params
     *
     * @throws \Exception
     *
     * @return mixed
     */
    public function createOrFirst(array $params)
    {
        if (!isset($params['menu_id']) && !isset($params['title']) && !isset($params['url'])) {
            throw new \Exception('Menu Id, Title, Url params not specified', 422);
        }
        $menuItem = $this->findWhere([
            ['menu_id', '=', $params['menu_id']], ['title', '=', $params['title']],
        ]);
        if (count($menuItem)) {
            return $menuItem->first();
        } else {
            $model = $this->updateOrCreate($params);

            return $model;
        }
    }
}
