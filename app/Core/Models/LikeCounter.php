<?php

namespace App\Core\Models;

use App\Core\Traits\GeneratesUnique;
use Illuminate\Database\Eloquent\Model;
use RepositoryLab\Repository\Contracts\Transformable;
use RepositoryLab\Repository\Traits\TransformableTrait;

class LikeCounter extends Model implements Transformable
{
    use TransformableTrait;
    use GeneratesUnique;

    public static function boot()
    {
        parent::boot();
    }

    /**
     * @var string
     */
    protected $table = 'likes_counter';

    /**
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function likeable()
    {
        return $this->morphTo();
    }
}
