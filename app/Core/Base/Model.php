<?php

namespace App\Core\Base;

use Illuminate\Database\Eloquent\Model as Eloquent;

abstract class Model extends Eloquent
{
    public $useSlug = false;
    protected static function boot()
    {
        parent::boot();
    }

    public function __call($method, $parameters)
    {
        if ($method == 'find') {
            $this->finder(...$parameters);
        }
        return parent::__call($method, $parameters);
    }

    /**
     * Handle dynamic static method calls into the method.
     *
     * @param  string  $method
     * @param  array  $parameters
     * @return mixed
     */
    public static function __callStatic($method, $parameters)
    {
        if ($method == 'find') {
            return (new static)->finder(...$parameters);
        }
        return (new static)->$method(...$parameters);
    }

    /**
     * method find rewrite
     *
     * @param $id
     * @param array $columns
     * @return \Illuminate\Database\Eloquent\Collection|Eloquent|null|static
     * @throws \Exception
     */
    public function finder($id, $columns = ['*'])
    {
        $newQuery = $this->newQuery();
        if (is_array($id)) {
            return $newQuery->findMany($id, $columns);
        }

        if (is_numeric($id)) {
            $newQuery->where($this->getQualifiedKeyName(), '=', $id);
            return $newQuery->first($columns);
        } else {
            if ($this->useSlug) {
                if (isset($this->slug) || !empty($this->slug)) {
                    $this->primaryKey = "slug";
                    return $newQuery->where($this->getQualifiedKeyName(), '=', $id)->first($columns);
                } else {
                    throw new \Exception('Please specify slug field in the model', 404);
                }
            }
            $this->primaryKey = "unique_id";
            $newQuery = $this->newQuery();
            $newQuery->where($this->getQualifiedKeyName(), '=', $id);
            return $newQuery->first($columns);
        }
    }
}