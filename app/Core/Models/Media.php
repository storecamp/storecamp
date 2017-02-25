<?php

namespace App\Core\Models;

use App\Core\Components\Auditing\Auditable;
use Illuminate\Database\Eloquent\Model;
use App\Core\Traits\GeneratesUnique;
use RepositoryLab\Repository\Contracts\Transformable;
use RepositoryLab\Repository\Traits\TransformableTrait;

/**
 * App\Core\Models\Media
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

    protected $fillable = ['directory_id', 'directory', 'disk', 'filename', 'extension', 'size', 'mime_type', 'aggregate_type'];
    protected $guarded = ['id'];
//    protected $with = ["folder"];

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
    public function folder()
    {
        return $this->belongsTo(Folder::class, 'directory_id');
    }
}
