<?php

namespace App\Core\Models;

use App\Core\Components\Auditing\Auditable;
use App\Core\Support\Cacheable\CacheableEloquent;
use RepositoryLab\Repository\Contracts\Transformable;
use RepositoryLab\Repository\Traits\TransformableTrait;

/**
 * App\Core\Models\Media.
 *
 * @property int $id
 * @property string $disk
 * @property string $directory
 * @property int $directory_id
 * @property string $filename
 * @property string $extension
 * @property string $mime_type
 * @property string $aggregate_type
 * @property int $size
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Core\Models\Folder $folder
 * @property-read string $basename
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Media whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Media whereDisk($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Media whereDirectory($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Media whereDirectoryId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Media whereFilename($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Media whereExtension($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Media whereMimeType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Media whereAggregateType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Media whereSize($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Media whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Media whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Plank\Mediable\Media inDirectory($disk, $directory, $recursive = false)
 * @method static \Illuminate\Database\Query\Builder|\Plank\Mediable\Media inOrUnderDirectory($disk, $directory)
 * @method static \Illuminate\Database\Query\Builder|\Plank\Mediable\Media whereBasename($basename)
 * @method static \Illuminate\Database\Query\Builder|\Plank\Mediable\Media forPathOnDisk($disk, $path)
 * @method static \Illuminate\Database\Query\Builder|\Plank\Mediable\Media unordered()
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Core\Components\Auditing\Auditing[] $audits
 */
class Media extends \Plank\Mediable\Media implements Transformable
{
    use TransformableTrait;
    use Auditable;
    use CacheableEloquent;

    protected $fillable = ['directory_id', 'directory', 'disk', 'filename', 'extension', 'size', 'mime_type', 'aggregate_type'];
    protected $guarded = ['id'];
    /**
     * @var int
     */
    protected $perPage = 100;
    /**
     * @var bool
     */
    protected $skipPaginate = false;
    /**
     * @var
     */
    protected $dataTypes;

    /**
     * Media constructor.
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    /**
     * bootable methods fix.
     */
    public static function boot()
    {
        parent::boot();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function folder()
    {
        return $this->belongsTo(Folder::class, 'directory_id');
    }

    /**
     * @return bool
     */
    public function isSkipPaginate(): bool
    {
        return $this->skipPaginate;
    }

    /**
     * @param bool $skipPaginate
     */
    public function setSkipPaginate(bool $skipPaginate)
    {
        $this->skipPaginate = $skipPaginate;
    }

    /**
     * @return mixed
     */
    public function getDataTypes()
    {
        return $this->dataTypes;
    }

    /**
     * @param mixed $dataTypes
     */
    public function setDataTypes(array $dataTypes)
    {
        $types = [];
        foreach ($dataTypes as $type) {
            $types[] = trim($type);
        }
        $this->dataTypes = $types;
    }

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'filename' => 'like',
        'extension' => 'like',
        'aggregate_type' => 'like',
    ];

    /**
     * @param \Illuminate\Database\Eloquent\Builder $q
     * @param $disk
     * @param $directory
     * @param null $tag
     * @param bool $recursive
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Support\Collection
     */
    public function getInDirectory($disk, $directory, $tag = null,
                                   $recursive = false)
    {
        if ($this->isSkipPaginate()) {
            $model = $this->inDirectory($disk, $directory, $tag, $recursive)->get();
        } else {
            $model = $this->inDirectory($disk, $directory, $tag, $recursive)->paginate($this->perPage);
        }

        return $model;
    }

    /**
     * method rewrite from
     * Media scopeInDirectory().
     *
     * @param $disk
     * @param $directory
     * @param null $tag
     * @param bool $recursive
     *
     * @return mixed
     */
    public function scopeInDirectory(\Illuminate\Database\Eloquent\Builder $q, $disk, $directory, $tag = null,
                                     $recursive = false)
    {
        $q->where('disk', $disk);
        $dataTypes = $this->getDataTypes();
        if ($tag) {
            $q->where('aggregate_type', 'like', $tag);
        }
        if ($recursive) {
            $directory = str_replace(['%', '_'], ['\%', '\_'], $directory);
            $q->where('directory', 'like', $directory . '%');
        } else {
            $q->where('directory', '=', $directory);
        }
        if (!empty($dataTypes)) {
            $q->whereIn('aggregate_type', $dataTypes);
        }
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $q
     * @param array $where
     * @param array $columns
     * @return \Illuminate\Database\Eloquent\Builder|mixed
     */
    public function scopeFindWhere(\Illuminate\Database\Eloquent\Builder $q, array $where, $columns = ['*'])
    {
        foreach ($where as $field => $value) {
            if (is_array($value)) {
                list($field, $condition, $val) = $value;
                $q->where($field, $condition, $val);
            } else {
                $q->where($field, '=', $value);
            }
        }

        return $q;
    }
}
