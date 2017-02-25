<?php

namespace App\Core\Models;

use App\Core\Components\Auditing\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Core\Traits\GeneratesUnique;
use RepositoryLab\Repository\Contracts\Transformable;
use RepositoryLab\Repository\Traits\TransformableTrait;

/**
 * Class AttributeGroupDescription
 *
 * @package App\Core\Models
 * @property int $id
 * @property string $name
 * @property string $unique_id
 * @property int $attributes_group_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property bool $sort_order
 * @property string $deleted_at
 * @property-read \App\Core\Models\AttributeGroup $attributesGroup
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Core\Models\Product[] $product
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\AttributeGroupDescription whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\AttributeGroupDescription whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\AttributeGroupDescription whereUniqueId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\AttributeGroupDescription whereAttributesGroupId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\AttributeGroupDescription whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\AttributeGroupDescription whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\AttributeGroupDescription whereSortOrder($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\AttributeGroupDescription whereDeletedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Core\Components\Auditing\Auditing[] $audits
 */
class AttributeGroupDescription extends Model implements Transformable
{
    use TransformableTrait;
    use SoftDeletes;
    use GeneratesUnique;
    use Auditable;

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'attributes_group_id',
        'sort_order',
        'attr_description_id',
        'product_id',
        'value'
    ];

    /**
     * @var string
     */
    protected $table = "attributes_group_description";

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function attributesGroup()
    {
        return $this->belongsTo(AttributeGroup::class, "attributes_group_id", "id");
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function product()
    {
        return $this->belongsToMany(Product::class, "product_attribute", "attr_description_id", "product_id")->withPivot("value");
    }
}
