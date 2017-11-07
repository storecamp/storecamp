<?php

namespace App\Core\Models;

use App\Core\Base\Model;
use App\Core\Traits\GeneratesUnique;
use RepositoryLab\Repository\Contracts\Transformable;
use RepositoryLab\Repository\Traits\TransformableTrait;

/**
 * App\Core\Models\Parser
 *
 * @property int $id
 * @property string $unique_id
 * @property string $name
 * @property string|null $image
 * @property string $url
 * @property string|null $search_query
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Base\Model findByField($field, $value, $columns)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\Parser idOrUuId($id_or_uuid, $first = true)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\Parser uuid($unique_id, $first = true)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\Parser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\Parser whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\Parser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\Parser whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\Parser whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\Parser whereSearchQuery($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\Parser whereUniqueId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\Parser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\Parser whereUrl($value)
 * @mixin \Eloquent
 */
class Parser extends Model implements Transformable
{
    use TransformableTrait;
    use GeneratesUnique;

    protected $table = 'parsers';
    protected $fillable = ['name', 'url', 'search_query', 'image'];

    public static function boot()
    {
        parent::boot();
    }
}
