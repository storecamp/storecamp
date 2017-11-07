<?php

namespace App\Core\Models;

use App\Core\Base\Model;
use App\Core\Support\Cacheable\CacheableEloquent;
use App\Core\Traits\GeneratesUnique;
use RepositoryLab\Repository\Contracts\Transformable;
use RepositoryLab\Repository\Traits\TransformableTrait;

/**
 * App\Core\Models\Currency
 *
 * @property int $id
 * @property string $unique_id
 * @property string $name
 * @property string $code
 * @property string $sign
 * @property int|null $main
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Base\Model findByField($field, $value, $columns)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\Currency idOrUuId($id_or_uuid, $first = true)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\Currency uuid($unique_id, $first = true)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\Currency whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\Currency whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\Currency whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\Currency whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\Currency whereMain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\Currency whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\Currency whereSign($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\Currency whereUniqueId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\Currency whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
