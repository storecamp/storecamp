<?php

namespace App\Core\Models;

use App\Core\Base\Model;
use App\Core\Support\Cacheable\CacheableEloquent;
use App\Core\Traits\GeneratesUnique;
use RepositoryLab\Repository\Contracts\Transformable;
use RepositoryLab\Repository\Traits\TransformableTrait;

/**
 * Class Settings.
 *
 * @property int $id
 * @property string $unique_id
 * @property string $key
 * @property array $value
 * @property string $type
 * @property string|null $details
 * @property string $locked
 * @property int $order
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Base\Model findByField($field, $value, $columns)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\Settings idOrUuId($id_or_uuid, $first = true)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\Settings uuid($unique_id, $first = true)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\Settings whereDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\Settings whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\Settings whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\Settings whereLocked($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\Settings whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\Settings whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\Settings whereUniqueId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\Settings whereValue($value)
 * @mixin \Eloquent
 */
class Settings extends Model implements Transformable
{
    use TransformableTrait;
    use GeneratesUnique;
    use CacheableEloquent;

    /**
     * @var string
     */
    protected $table = 'settings';
    /**
     * @var array
     */
    protected $fillable = ['key', 'value', 'type', 'order'];

    protected $casts = [
        'value' => 'array',
    ];
    /**
     * @var bool
     */
    public $timestamps = false;

    public static function boot()
    {
        parent::boot();
    }

    /**
     * @param $key
     * @param $group
     * @param null $default
     *
     * @return null
     */
    public function get($key, $group, $default = null)
    {
        $setting = $this->where('key', '=', $key)->first();
        if (isset($setting->id)) {
            return json_decode($setting->value);
        }

        return $default;
    }

    /**
     * @param $key
     * @param null $value
     *
     * @throws \Exception
     *
     * @return $this
     */
    public function set($key, $value = null)
    {
        $setting = $this->where('key', '=', $key);

        if (!$setting->count()) {
            $this->key = $key;
            if ($value) {
                $this->value = $value;
            } else {
                $this->value = null;
            }
            $this->save();

            return $this;
        } else {
            $locked = $setting->select('locked')->first()->locked;
            if (intval($locked) == 1) {
                throw new \Exception('Setting Cannot be updated. It is locked');
            }
            $setting = $setting->first();
            if ($value) {
                $setting->value = $value;
            } else {
                $setting->value = null;
            }
            $setting->save();

            return $setting;
        }
    }
}
