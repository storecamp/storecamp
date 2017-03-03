<?php

namespace App\Core\Traits;

use App\Core\Models\Like;
use App\Core\Models\LikeCounter;

/**
 * Class Likeable.
 */
trait Likeable
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    /**
     * @return mixed
     */
    public function likeCounter()
    {
        return $this->morphOne(LikeCounter::class, 'likeable');
    }

    /**
     * @return mixed
     */
    public function getLikeCount()
    {
        return $this->likeCount;
    }

    /**
     * @param $from
     * @param null $to
     *
     * @return mixed
     */
    public function getLikeCountByDate($from, $to = null)
    {
        return Like::countByDate($this, $from, $to);
    }

    /**
     * @return int|null
     */
    public function getLikeCountAttribute(): ?int
    {
        return $this->likeCounter ? $this->likeCounter->count : 0;
    }

    /**
     * @param $user
     * @return bool
     */
    public function like($user): bool
    {
        if ($user !== null) {
            return $this->shouldLike($user);
        } else {
            return false;
        }
    }

    /**
     * @param Model $likedBy
     *
     * @return bool
     */
    public function shouldLike($likedBy): bool
    {
        if ($this->getLikedRecord($likedBy)) {
            return false;
        }

        $like = new Like();
        $like->liked_by_id = $likedBy->id;
        $like->liked_by_type = get_class($likedBy);
        $this->likes()->save($like);

        $this->incrementCounter();

        return true;
    }

    /**
     * @param Model $likedBy
     *
     * @return bool
     */
    public function dislike($likedBy): bool
    {
        if (! $like = $this->getLikedRecord($likedBy)) {
            return false;
        }
        $like->delete();
        $this->decrementCounter();

        return true;
    }

    /**
     * @param $query
     * @param Model $model
     *
     * @return mixed
     */
    public function scopeWhereLiked($query, $model)
    {
        return $query->whereHas('likes', function ($query) use ($model) {
            $query->where('liked_by_id', $model->id);
            $query->where('liked_by_type', get_class($model));
        });
    }

    /**
     * @return LikeCounter
     */
    private function incrementCounter(): ?LikeCounter
    {
        if ($counter = $this->likeCounter()->first()) {
            $counter->increment('count', 1);
            $counter->save();
        } else {
            $counter = new LikeCounter();
            $counter->fill(['count' => 1]);

            $this->likeCounter()->save($counter);
        }

        return $counter;
    }

    /**
     * @return mixed
     */
    private function decrementCounter(): ?LikeCounter
    {
        if ($counter = $this->likeCounter()->first()) {
            $counter->decrement('count', 1);
            $counter->count ? $counter->save() : $counter->delete();
        }

        return $counter;
    }

    /**
     * @param Model $model
     *
     * @return mixed
     */
    public function getLikedRecord($model)
    {
        return $this->likes()
            ->where('liked_by_id', $model->id)
            ->where('liked_by_type', get_class($model))
            ->first();
    }

    /**
     * @param $user
     * @return bool
     */
    public function liked($user): bool
    {
        if ($user !== null) {
            return $this->isLiked($user);
        } else {
            return false;
        }
    }

    /**
     * @param Model $model
     * @return bool
     */
    public function isLiked($model): bool
    {
        if ($model !== null) {
            return (bool) $this->likes()
                ->where('liked_by_id', $model->id)
                ->where('liked_by_type', get_class($model))
                ->count();
        } else {
            return false;
        }
    }
}
