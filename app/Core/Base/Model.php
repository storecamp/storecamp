<?php

namespace App\Core\Base;

use App\Core\Support\Meta\Meta;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Str;

/**
 * Class Model.
 */
abstract class Model extends Eloquent
{
    /**
     * @var array
     */
    public $rules = [];
    /**
     * @var bool
     */
    public $useSlug = false;

    /**
     * @var string
     */
    public $uniqueId = 'unique_id';
    private $modelQuery;

    /**
     * Model constructor.
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->modelQuery = $this;
    }

    public static function boot()
    {
        parent::boot();
    }

    /**
     * Dynamically retrieve attributes on the model.
     *
     * @param string $key
     *
     * @return mixed
     */
    public function __get($key)
    {
        if ($key == 'meta') {
            $file = $this->getName();

            return $this->getMetaRelation($file);
        }

        return $this->getAttribute($key);
    }

    /**
     * Dynamically set attributes on the model.
     *
     * @param string $key
     * @param mixed $value
     *
     * @return void
     */
    public function __set($key, $value)
    {
        $this->setAttribute($key, $value);
    }

    /**
     * @param string $method
     * @param array $parameters
     *
     * @return Meta|mixed
     */
    public function __call($method, $parameters)
    {
        if (in_array($method, ['increment', 'decrement'])) {
            return $this->$method(...$parameters);
        }

        if ($method == 'find') {
            $this->finder(...$parameters);
        }

        if ($method == 'findOrFail') {
            $this->findOrFailRewrite(...$parameters);
        }

        if ($method == 'meta') {
            $file = $this->getName();

            return $this->getMetaRelation($file);
        }

        return $this->newQuery()->$method(...$parameters);
    }

    /**
     * Handle dynamic static method calls into the method.
     *
     * @param string $method
     * @param array $parameters
     *
     * @return mixed
     */
    public static function __callStatic($method, $parameters)
    {
        if ($method == 'find') {
            return (new static())->finder(...$parameters);
        }
        if ($method == 'findOrFail') {
            return (new static())->findOrFailRewrite(...$parameters);
        }

        return (new static())->$method(...$parameters);
    }

    /**
     * method find rewrite.
     *
     * @param $id
     * @param array $columns
     *
     * @throws \Exception
     *
     * @return \Illuminate\Database\Eloquent\Collection|Eloquent|null|static
     */
    private function finder($id, $columns = ['*'])
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
                    $this->primaryKey = 'slug';

                    return $newQuery->where($this->getQualifiedKeyName(), '=', $id)->first($columns);
                } else {
                    throw new \Exception('Please specify slug field in the model', 404);
                }
            }
            $this->primaryKey = $this->uniqueId;
            $newQuery = $this->newQuery();
            $newQuery->where($this->getQualifiedKeyName(), '=', $id);

            return $newQuery->first($columns);
        }
    }

    private function findOrFailRewrite($id, $columns = ['*'])
    {
        $result = $this->finder($id, $columns);

        if (is_array($id)) {
            if (count($result) == count(array_unique($id))) {
                return $result;
            }
        } elseif (!is_null($result)) {
            return $result;
        }

        throw (new ModelNotFoundException())->setModel(
            get_class($this->model), $id
        );
    }

    /**
     * @return string
     */
    private function getName()
    {
        $path = explode('\\', get_class($this));

        return Str::snake(array_pop($path));
    }

    /**
     * @param $query
     * @param $field
     * @param $value
     * @param $columns
     * @return mixed
     */
    public function scopeFindByField($query, $field, $value, $columns = ["*"])
    {
        return $query->where($field, '=', $value)->get($columns);
    }

    /**
     * @param array $where
     * @param array $columns
     * @return mixed
     */
    public function findWhere(array $where, $columns = ['*'])
    {
        foreach ($where as $field => $value) {
            if (is_array($value)) {
                list($field, $condition, $val) = $value;
                $this->modelQuery = $this->modelQuery->where($field, $condition, $val);
            } else {
                $this->modelQuery = $this->modelQuery->where($field, '=', $value);
            }
        }

        $model = $this->modelQuery->get($columns);

        return $model;
    }

    /**
     * @param $file
     *
     * @return Meta
     */
    private function getMetaRelation($file)
    {
        $meta = new Meta();
        $meta->setTable($file . '_meta');

        return $meta;
    }


    public function validate($data)
    {
        // make a new validator object
        $v = \Validator::make($data, $this->rules);
        // return the result
        return $v->passes();
    }
}
