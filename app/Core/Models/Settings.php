<?php

namespace App\Core\Models;

use App\Core\Base\Model;
use App\Core\Support\Cacheable\CacheableEloquent;
use App\Core\Traits\GeneratesUnique;
use RepositoryLab\Repository\Contracts\Transformable;
use RepositoryLab\Repository\Traits\TransformableTrait;

/**
 * Class Settings
 * @package App\Core\Models
 */
class Settings extends Model implements Transformable
{
    use TransformableTrait;
    use GeneratesUnique;
    use CacheableEloquent;

    /**
     * @var string
     */
    protected $table = "settings";
    /**
     * @var array
     */
    protected $fillable = ['key', 'value', 'type', 'order'];

    protected $casts = [
        'value' => 'array'
    ];
    /**
     * @var bool
     */
    public $timestamps = false;
    /**
     *
     */
    public static function boot()
    {
        parent::boot();
    }

    /**
     * @param $key
     * @param $group
     * @param null $default
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
     * @return $this
     * @throws \Exception
     */
    public function set($key, $value = null)
    {
        $setting = $this->where('key', '=', $key);

        if (!$setting->count()) {
            $this->key = $key;
            if($value) {
                $this->value = $value;
            }else {
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
            if($value) {
                $setting->value = $value;
            }else {
                $setting->value = null;
            }
            $setting->save();
            return $setting;
        }
    }
}
