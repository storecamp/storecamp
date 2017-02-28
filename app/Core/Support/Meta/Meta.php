<?php

namespace App\Core\Support\Meta;


use Illuminate\Database\Eloquent\Model;
use RepositoryLab\Repository\Contracts\Transformable;
use RepositoryLab\Repository\Traits\TransformableTrait;

class Meta extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table;

    /**
     * Fillable attributes for mass assignment.
     *
     * @var array
     */
    protected $fillable =
        [
            'meta_id',
            'meta_key',
            'meta_value',
            'meta_type',
            'metable_id',
            'metable_type'
        ];

    public function setTable($table)
    {
        return parent::setTable($table);
    }
}