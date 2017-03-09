<?php

namespace App\Core\Models;

use App\Core\Base\Model;
use App\Core\Traits\GeneratesUnique;
use RepositoryLab\Repository\Contracts\Transformable;
use RepositoryLab\Repository\Traits\TransformableTrait;

/**
 * Class Menu
 * @package App\Core\Models
 */
class Menu extends Model implements Transformable
{
    use TransformableTrait;
    use GeneratesUnique;

    protected $fillable = [];

    public static function boot()
    {
       parent::boot();
    }


    protected $table = 'menus';

    protected $guarded = [];

    public function items()
    {
        return $this->hasMany(MenuItems::class);
    }

    public function parent_items()
    {
        return $this->hasMany(MenuItems::class)
            ->whereNull('parent_id');
    }

    /**
     * Display menu.
     *
     * @param string      $menuName
     * @param string|null $type
     * @param array       $options
     *
     * @return string
     */
    public static function display($menuName, $type = null, array $options = [])
    {
        // GET THE MENU - sort collection in blade
        $menu = static::where('name', '=', $menuName)
            ->with('parent_items.children')
            ->first();

        // Check for Menu Existence
        if (!isset($menu)) {
            return false;
        }

        event('storecamp.menu.display', $menu);

        // Convert options array into object
        $options = (object) $options;

        // Set static vars values for admin menus
        if (in_array($type, ['admin', 'admin_menu'])) {
            $permissions = Permission::all();
            $prefix = trim(route('voyager.dashboard', [], false), '/');
            $user_permissions = null;

            if (!\Auth::guest()) {
                $user = User::find(\Auth::id());
                $user_permissions = $user->role->permissions->pluck('key')->toArray();
            }

            $options->user = (object) compact('permissions', 'prefix', 'user_permissions');

            // change type to blade template name - TODO funky names, should clean up later
            $type = 'menu.'.$type;
        } else {
            if (is_null($type)) {
                $type = 'default';
            } elseif ($type == 'bootstrap' && !view()->exists($type)) {
                $type = 'bootstrap';
            }
        }

        return new \Illuminate\Support\HtmlString(
            \Illuminate\Support\Facades\View::make($type, ['items' => $menu->parent_items, 'options' => $options])->render()
        );
    }
}
