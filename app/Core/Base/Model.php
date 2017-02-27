<?php

namespace App\Core\Base;

use Illuminate\Database\Eloquent\Model as Eloquent;

abstract class Model extends Eloquent
{

    protected static function boot()
    {
        parent::boot();
    }

    public function __call($method, $parameters)
    {
        if ($method == 'find') {
            $this->find(...$parameters);
        }

        return parent::__call($method, $parameters);
    }

    /**
     * method find rewrite
     *
     * @param $id
     * @param array $columns
     * @return \Illuminate\Database\Eloquent\Collection|Eloquent|null|static
     */
    public function find($id, $columns = ['*'])
    {
        $newQuery = $this->newQuery();
        if (is_array($id)) {
            return $newQuery->findMany($id, $columns);
        }

        if (is_numeric($id)) {
            $newQuery->where($this->model->getQualifiedKeyName(), '=', $id);
            return $newQuery->first($columns);
        } else {
            return $newQuery->where('unique_id', '=', $id)->first($columns);
        }
    }
}