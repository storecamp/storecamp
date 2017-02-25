<?php

namespace App\Core\Models;

use App\Core\Components\Auditing\Auditable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;
use App\Core\Traits\GeneratesUnique;
use RepositoryLab\Repository\Contracts\Transformable;
use RepositoryLab\Repository\Traits\TransformableTrait;

/**
 * App\Core\Models\Folder
 *
 * @property int $id
 * @property string $unique_id
 * @property int $parent_id
 * @property string $name
 * @property string $disk
 * @property string $path_on_disk
 * @property string $slug
 * @property bool $order
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Core\Models\Folder $parent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Core\Models\Folder[] $children
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Core\Models\Media[] $files
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Folder whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Folder whereUniqueId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Folder whereParentId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Folder whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Folder whereDisk($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Folder wherePathOnDisk($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Folder whereSlug($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Folder whereOrder($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Folder whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Folder whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Folder findSimilarSlugs(\Illuminate\Database\Eloquent\Model $model, $attribute, $config, $slug)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Core\Components\Auditing\Auditing[] $audits
 * @property bool $locked
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Folder whereLocked($value)
 */
class Folder extends Model implements Transformable
{
    use TransformableTrait;
    use \Cviebrock\EloquentSluggable\Sluggable;
    use SluggableScopeHelpers;
    use GeneratesUnique;
    use Auditable;

    protected $with = ["files"];
    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'order',
        'disk',
        'locked',
        'unique_id',
        'path_on_disk',
        'parent_id'
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }


    /**
     * bootable methods fix
     */
    public static function boot()
    {
        parent::boot();
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo('App\Core\Models\Folder', 'parent_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {
        return $this->hasMany('App\Core\Models\Folder', 'parent_id');
    }

    /**
     * get media files in folder
     */
    public function files() {

        return $this->hasMany(Media::class, 'directory_id');
    }
}
