<?php

namespace App\Core\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Ramsey\Uuid\Uuid;

trait GeneratesUnique
{
    /**
     * The name of the column to look in for the unique id. You may
     * override this by setting a static $uniqueColumn property on the
     * model that uses this trait.
     *
     * @var string
     */
    public static $uniqueColumn = 'unique_id';

    /**
     * Binds creating/saving events to create UUIDs (and also prevent them from being overwritten).
     *
     * @return void
     */
    public static function bootGeneratesUnique()
    {
        static::creating(function ($model) {
            // Don't let people provide their own UUIDs, we will generate a proper one.
            $model->unique_id = Uuid::uuid4()->toString();
        });

        static::saving(function (Model $model) {
            // What's that, trying to change the UUID huh?  Nope, not gonna happen.
            if (!empty($model->getOriginal('unique_id'))) {
                $original_uuid = $model->getOriginal('unique_id');

                if ($original_uuid !== $model->unique_id) {
                    $model->unique_id = $original_uuid;
                }
            } else {
                $model->unique_id = Uuid::uuid4()->toString();
            }
        });
    }

    /**
     * Scope a query to only include models matching the supplied UUID.
     * Returns the model by default, or supply a second flag `false` to get the Query Builder instance.
     *
     *
     * @param \Illuminate\Database\Schema\Builder $query     The Query Builder instance.
     * @param string                              $unique_id The UUID of the model.
     * @param bool|true                           $first     Returns the model by default, or set to `false` to chain for query builder.
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     *
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Builder
     */
    public function scopeUuid($query, $unique_id, $first = true)
    {
        if (!is_string($unique_id) || (preg_match('/^[0-9a-f]{8}-[0-9a-f]{4}-4[0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$/', $unique_id) !== 1)) {
            throw (new ModelNotFoundException())->setModel(get_class($this));
        }

        $search = $query->where('unique_id', $unique_id);

        return $first ? $search->firstOrFail() : $search;
    }

    /**
     * Scope a query to only include models matching the supplied ID or UUID.
     * Returns the model by default, or supply a second flag `false` to get the Query Builder instance.
     *
     *
     * @param \Illuminate\Database\Schema\Builder $query     The Query Builder instance.
     * @param string                              $unique_id The UUID of the model.
     * @param bool|true                           $first     Returns the model by default, or set to `false` to chain for query builder.
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     *
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Builder
     */
    public function scopeIdOrUuId($query, $id_or_uuid, $first = true)
    {
        if (!is_string($id_or_uuid) && !is_numeric($id_or_uuid)) {
            throw (new ModelNotFoundException())->setModel(get_class($this));
        }

        if (preg_match('/^([0-9]+|[0-9a-f]{8}-[0-9a-f]{4}-4[0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12})$/', $id_or_uuid) !== 1) {
            throw (new ModelNotFoundException())->setModel(get_class($this));
        }

        $search = $query->where(function ($query) use ($id_or_uuid) {
            $query->where('id', $id_or_uuid)
                ->orWhere('unique_id', $id_or_uuid);
        });

        return $first ? $search->firstOrFail() : $search;
    }
}
