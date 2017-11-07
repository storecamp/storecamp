<?php

namespace App\Core\Models;

use App\Core\Base\Model;
use App\Core\Traits\GeneratesUnique;
use RepositoryLab\Repository\Contracts\Transformable;
use RepositoryLab\Repository\Traits\TransformableTrait;

/**
 * Class Menu.
 *
 * @property int $id
 * @property string $unique_id
 * @property string $name
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Core\Models\MenuItems[] $items
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Core\Models\MenuItems[] $parent_items
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Base\Model findByField($field, $value, $columns)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\Menu idOrUuId($id_or_uuid, $first = true)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\Menu uuid($unique_id, $first = true)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\Menu whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\Menu whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\Menu whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\Menu whereUniqueId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\Menu whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Menu extends Model implements Transformable
{
    use TransformableTrait;
    use GeneratesUnique;

    /**
     * @var array
     */
    protected $fillable = [];

    public static function boot()
    {
        parent::boot();
    }

    /**
     * @var string
     */
    protected $table = 'menus';

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items()
    {
        return $this->hasMany(MenuItems::class);
    }

    /**
     * @return mixed
     */
    public function parent_items()
    {
        return $this->hasMany(MenuItems::class)
            ->whereNull('parent_id');
    }
}
