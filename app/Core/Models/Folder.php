<?php

namespace App\Core\Models;

use App\Core\Base\Model;
use App\Core\Components\Auditing\Auditable;
use App\Core\Traits\GeneratesUnique;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Doctrine\DBAL\Query\QueryBuilder;
use Illuminate\Filesystem\Filesystem;
use RepositoryLab\Repository\Contracts\Transformable;
use RepositoryLab\Repository\Traits\TransformableTrait;

/**
 * App\Core\Models\Folder.
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
 *
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
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Core\Components\Auditing\Auditing[] $audits
 * @property bool $locked
 * @property mixed $media
 * @property mixed $file
 *
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Folder whereLocked($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Folder idOrUuId($id_or_uuid, $first = true)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Folder uuid($unique_id, $first = true)
 */
class Folder extends Model implements Transformable
{
    use TransformableTrait;
    use \Cviebrock\EloquentSluggable\Sluggable;
    use SluggableScopeHelpers;
    use GeneratesUnique;
    use Auditable;
//    use CacheableEloquent;

    protected $with = ['files'];
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
        'parent_id',
    ];

    /**
     * @var Media
     */
    protected $media;
    /**
     * @var Filesystem
     */
    protected $file;
    /**
     * @var string
     */
    public $disk = 'local';

    /**
     * @var mixed
     */
    public $diskRoot;

    /**
     * @var mixed
     */
    public $rootFromProject;

    /**
     * Folder constructor.
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->media = new Media();
        $this->file = new Filesystem();
        $this->disk;
        $this->diskRoot = config('filesystems.disks.local.root');
        $this->rootFromProject = config('filesystems.disks.local.rootFromProject');
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name',
            ],
        ];
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
     * get media files in folder.
     */
    public function files()
    {
        return $this->hasMany(Media::class, 'directory_id');
    }

    /**
     * @return mixed
     */
    public function getDisk()
    {
        return $this->disk;
    }

    /**
     * @param $disk
     *
     * @return Folder
     */
    public function setDisk($disk): Folder
    {
        $this->disk = $disk;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDiskRoot(): string
    {
        return $this->diskRoot;
    }

    /**
     * @param $diskRoot
     *
     * @return Folder
     */
    public function setDiskRoot($diskRoot): Folder
    {
        $this->diskRoot = $diskRoot;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRootFromProject(): string
    {
        return $this->rootFromProject;
    }

    /**
     * @param mixed $rootFromProject
     */
    public function setRootFromProject($rootFromProject)
    {
        $this->rootFromProject = $rootFromProject;
    }

    /**
     * @param string $name
     * @return Folder
     */
    public function disk(string $name): Folder
    {
        if (!empty($name)) {
            $that = $this->setDisk($name);
            $that->setDiskRoot(config('filesystems.disks.' . $name . '.root'));
            $that->setRootFromProject(config('filesystems.disks.' . $name . '.rootFromProject'));

            return $that;
        }

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDiskRoots()
    {
        $rootFolders = $this->where([
            ['parent_id', '=', null],
            ['name', '=', ''],
            ['path_on_disk', '=', null],
        ])->get();

        return $rootFolders;
    }

    /**
     * @param $disk
     * @param null $folder
     * @return mixed
     */
    public function getDefaultFolder($disk, $folder = null)
    {
        if ($folder) {
            $newFolder = $this->disk($disk)->byDisk($folder);
        } else {
            $newFolder = $this->disk($disk)->findByField('disk', $disk)->first();
        }

        return $newFolder;
    }

    /**
     * @param Folder $folder
     * @param array $array
     *
     * @return string
     */
    public function getParentFoldersPath($folder, array $array = [])
    {
        while ($folder->parent_id != null) {
            $newParent = $this->byDisk($folder->parent_id);
            array_unshift($array, $newParent->name);

            return $this->getParentFoldersPath($newParent, $array);
        }

        return implode('/', array_filter($array));
    }

    /**
     * rewrite of delete method.
     *
     * @param $id
     *
     * @return int
     */
    public function deleteFolder($id)
    {
        $folder = $this->byDisk($id);
        $parentFoldersPath = $this->getParentFoldersPath($folder);
        $folderPath = $parentFoldersPath ? $parentFoldersPath . '/' . $folder->name : $folder->name;
        $folderFullPath = $this->getDiskRoot() . '/' . $folderPath;
        if ($this->file->isDirectory($folderFullPath)) {
            $medias = $this->media->inDirectory($this->getDisk(), $folderPath)->get();
            foreach ($medias as $media) {
                $media->delete();
            }
            $result = $this->file->deleteDirectory($folderFullPath);
        } else {
            $medias = $this->media->inDirectory($this->getDisk(), $folderPath);
            if ($medias->count() > 0) {
                foreach ($medias->get() as $media) {
                    $media->delete();
                }
            }
        }
        $this->destroy($folder->id);
    }

    /**
     * @param QueryBuilder $query
     * @param $id
     * @return $this
     */
    public function scopeFindByDisk($query, $id)
    {
        if (is_numeric($id)) {
            return $query->where('disk', '=', $this->getDisk())
                ->where('id', $id);
        } else {
            return $query->where('disk', '=', $this->getDisk())
                ->where('unique_id', $id);
        }
    }

    /**
     * @param $id
     * @param array $columns
     * @return mixed
     */
    public function byDisk($id, $columns = ['*'])
    {
        return $this->findByDisk($id)->first($columns);
    }

    /**
     * @param $query
     * @param $key
     * @param $value
     * @param string $operator
     * @return mixed
     */
    public function scopeWhereDisk($query, $key, $value, $operator = '=')
    {
        return $query->model->where('disk', '=', $this->getDisk())
            ->where($key, $operator, $value);
    }

    /**
     * @param $key
     * @param $value
     * @param string $operator
     * @param array $columns
     * @return \Illuminate\Support\Collection
     */
    public function getByFieldWhereDisk($key, $value, $operator = '=', $columns = ['*'])
    {
        return $this->whereDisk($key, $value, $operator)->get($columns);
    }

}
