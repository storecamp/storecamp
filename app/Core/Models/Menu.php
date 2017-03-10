<?php

namespace App\Core\Models;

use App\Core\Base\Model;
use App\Core\Traits\GeneratesUnique;
use RepositoryLab\Repository\Contracts\Transformable;
use RepositoryLab\Repository\Traits\TransformableTrait;

/**
 * Class Menu.
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
