<?php

namespace App\Core\Models;

use App\Core\Base\Model;
use App\Core\Components\Auditing\Auditable;
use App\Core\Support\Cacheable\CacheableEloquent;
use App\Core\Traits\GeneratesUnique;
use Illuminate\Database\Eloquent\SoftDeletes;
use RepositoryLab\Repository\Contracts\Transformable;
use RepositoryLab\Repository\Traits\TransformableTrait;

/**
 * Class AttributeGroup.
 *
 * @property int $id
 * @property string $unique_id
 * @property string $name
 * @property bool $sort_order
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\AttributeGroup whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\AttributeGroup whereUniqueId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\AttributeGroup whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\AttributeGroup whereSortOrder($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\AttributeGroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\AttributeGroup whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\AttributeGroup whereDeletedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Core\Components\Auditing\Auditing[] $audits
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\AttributeGroup idOrUuId($id_or_uuid, $first = true)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\AttributeGroup uuid($unique_id, $first = true)
 */
class AttributeGroup extends Model implements Transformable
{
    use TransformableTrait;
    use SoftDeletes;
    use GeneratesUnique;
    use Auditable;
    use CacheableEloquent;

    public static function boot()
    {
        parent::boot();
    }

    /**
     * @var array
     */
    protected $fillable = ['name', 'sort_order'];
    /**
     * @var string
     */
    protected $table = 'attributes_group';

    public function attributeGroupDescription()
    {
        $this->hasMany(AttributeGroupDescription::class, 'attributes_group_id');
    }
}
