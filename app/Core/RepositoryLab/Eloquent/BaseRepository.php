<?php
namespace RepositoryLab\Repository\Eloquent;

use Closure;
use Exception;
use Illuminate\Contracts\Bus\Dispatcher;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Str;
use RepositoryLab\Repository\Contracts\CriteriaInterface;
use RepositoryLab\Repository\Contracts\Presentable;
use RepositoryLab\Repository\Contracts\PresenterInterface;
use RepositoryLab\Repository\Contracts\RepositoryCriteriaInterface;
use RepositoryLab\Repository\Events\RepositoryEntityCreated;
use RepositoryLab\Repository\Events\RepositoryEntityDeleted;
use RepositoryLab\Repository\Events\RepositoryEntityUpdated;
use RepositoryLab\Repository\Exceptions\RepositoryException;
use RepositoryLab\Validator\Contracts\ValidatorInterface;
use RepositoryLab\Repository\Contracts\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Container\Container as Application;
use Illuminate\Support\Collection;
use RepositoryLab\Validator\Exceptions\ValidatorException;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use ReflectionClass;

/**
 * Class BaseRepository
 * @package RepositoryLab\Repository\Eloquent
 */
abstract class BaseRepository implements RepositoryInterface, RepositoryCriteriaInterface
{

    /**
     * @var Application
     */
    protected $app;

    /**
     * @var Model
     */
    protected $model;

    /**
     * @var array
     */
    protected $fieldSearchable = [];

    /**
     * @var PresenterInterface
     */
    protected $presenter;

    /**
     * @var ValidatorInterface
     */
    protected $validator;

    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = null;

    /**
     * Collection of Criteria
     *
     * @var Collection
     */
    protected $criteria;

    /**
     * @var bool
     */
    protected $skipCriteria = false;

    /**
     * @var bool
     */
    protected $skipPresenter = false;

    /**
     * @var \Closure
     */
    protected $scopeQuery = null;

    /**
     * @var int
     */
    protected $perPage = 10;

   /**
     * @param Application $app
     * @param Dispatcher $dispatcher
     * @throws RepositoryException
     */
    public function __construct(Application $app, Dispatcher $dispatcher)
    {
        $this->app = $app;
        $this->criteria = new Collection();
        $this->makeModel();
        $this->makePresenter();
        $this->makeValidator();
        $this->boot();
        $this->dispatcher = $dispatcher;
    }

    /**
     *
     */
    public function boot()
    {

    }

    /**
     * @throws RepositoryException
     */
    public function resetModel()
    {
        $this->makeModel();
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    abstract public function model();

    /**
     * @return mixed
     */
    public function getModel()
    {

        return new $this->model();
    }
    /**
     * Specify Presenter class name
     *
     * @return string
     */
    public function presenter()
    {
        return null;
    }

    /**
     * @return mixed
     */
    public function perPage() {
        return config('repository.pagination.limit', $this->perPage);
    }

    /**
     * Handle dynamic method calls into the BaseRepository.
     *
     * @param  string  $method
     * @param  array  $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        if($this->isBaseMethod($method)) {
            return $this->$method(...$parameters);
        }
        if($this->hasScopePrefix($method)) { //handle dynamic scope call from the model
            $this->applyCriteria();
            $this->applyScope();
//            dd($method);
            if(!empty($parameters)) {
                $methodName = $this->prepareSopePrefix($method);
                $this->model = $this->model->$methodName($this->getModel()->newQuery(), ...$parameters);
            } else {
                $this->model = $this->model->$method($this->getModel()->newQuery(), ...$parameters);
            }

            return $this;
        }
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
        return (new static)->$method(...$parameters);
    }
    /**
     * Specify Validator class name of RepositoryLab\Validator\Contracts\ValidatorInterface
     *
     * @return null
     * @throws Exception
     */
    public function validator()
    {

        if (isset($this->rules) && !is_null($this->rules) && is_array($this->rules) && !empty($this->rules)) {
            if (class_exists('RepositoryLab\Validator\LaravelValidator')) {
                $validator = app('RepositoryLab\Validator\LaravelValidator');
                if ($validator instanceof ValidatorInterface) {
                    $validator->setRules($this->rules);
                    return $validator;
                }
            } else {
                throw new Exception(trans('repository::packages.prettus_laravel_validation_required'));
            }
        }

        return null;
    }

    /**
     * Set Presenter
     *
     * @param $presenter
     * @return $this
     */
    public function setPresenter($presenter)
    {
        $this->makePresenter($presenter);
        return $this;
    }

    /**
     * @return Model
     * @throws RepositoryException
     */
    public function makeModel()
    {
        $model = $this->app->make($this->model());
        if (!$model instanceof Model) {
            throw new RepositoryException("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }
        return $this->model = $model;
    }

    /**
     * @return string
     */
    public function getModelName()
    {
        $reflection = new ReflectionClass($this->model());
        return $reflection->getShortName();

    }


    /**
     * get data from config folder attached to model
     *
     * @param $configName
     * @return mixed
     * @throws RepositoryException
     */
    public function bindFromConfigModel($configName)
    {
        $configArray = config(strtolower($configName), $configName);
        if (empty($configArray) || $configArray === null) {
            throw new RepositoryException("Config file {$configName} - not found!");
        } else {
            $model = strtolower($this->getModelName());

            $confName = $configArray[$model];

            return $confName;
        }
    }


    /**
     * @param null $presenter
     * @return PresenterInterface
     * @throws RepositoryException
     */
    public function makePresenter($presenter = null)
    {
        $presenter = !is_null($presenter) ? $presenter : $this->presenter();

        if (!is_null($presenter)) {
            $this->presenter = is_string($presenter) ? $this->app->make($presenter) : $presenter;

            if (!$this->presenter instanceof PresenterInterface) {
                throw new RepositoryException("Class {$presenter} must be an instance of RepositoryLab\\Repository\\Contracts\\PresenterInterface");
            }

            return $this->presenter;
        }

        return null;
    }

    /**
     * @param null $validator
     * @return null|ValidatorInterface
     * @throws RepositoryException
     */
    public function makeValidator($validator = null)
    {
        $validator = !is_null($validator) ? $validator : $this->validator();

        if (!is_null($validator)) {
            $this->validator = is_string($validator) ? $this->app->make($validator) : $validator;

            if (!$this->validator instanceof ValidatorInterface) {
                throw new RepositoryException("Class {$validator} must be an instance of RepositoryLab\\Validator\\Contracts\\ValidatorInterface");
            }

            return $this->validator;
        }

        return null;
    }

    /**
     * Get Searchable Fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Retrieve data array for populate field select
     *
     * @param string      $column
     * @param string|null $key
     *
     * @return \Illuminate\Support\Collection|array
     */
    public function lists($column, $key = null)
    {
        return $this->makeModel()->pluck($column, $key);
    }

    /**
     * Retrieve all data of repository
     *
     * @param array $columns
     *
     * @return mixed
     */
    public function all($columns = ['*'])
    {
        $this->applyCriteria();
        $this->applyScope();

        if ($this->model instanceof \Illuminate\Database\Eloquent\Builder) {
            $results = $this->model->get($columns);
        } else {
            $results = $this->model->all($columns);
        }

        $this->resetModel();
        $this->resetScope();

        return $this->parserResult($results);
    }

    /**
     * Retrieve first data of repository
     *
     * @param array $columns
     *
     * @return mixed
     */
    public function first($columns = ['*'])
    {
        $this->applyCriteria();
        $this->applyScope();

        $results = $this->model->first($columns);

        $this->resetModel();

        return $this->parserResult($results);
    }
    /**
     * Query Scope
     *
     * @param \Closure $scope
     * @return $this
     */
    public function scopeQuery(\Closure $scope)
    {
        $this->scopeQuery = $scope;
        return $this;
    }

    /**
     * Retrieve all data of repository, paginated
     *
     * @param null   $limit
     * @param array  $columns
     * @param string $method
     *
     * @return mixed
     */
    public function paginate($limit = null, $columns = ['*'], $method = "paginate")
    {
        $this->applyCriteria();
        $this->applyScope();
        $limit = request()->get('perPage', is_null($limit) ? config('repository.pagination.limit', 10) : $limit);
        $results = $this->model->{$method}($limit, $columns);
        $results->appends(request()->query());
        $this->resetModel();

        return $this->parserResult($results);
    }


    /**
     * Retrieve all data of repository, simple paginated
     *
     * @param null  $limit
     * @param array $columns
     *
     * @return mixed
     */
    public function simplePaginate($limit = null, $columns = ['*'])
    {
        return $this->paginate($limit, $columns, "simplePaginate");
    }

    /**
     * Find data by id
     *
     * @param       $id
     * @param array $columns
     *
     * @return mixed
     */
    public function find($id, $columns = ['*'])
    {
        $this->applyCriteria();
        $this->applyScope();
        if (is_numeric($id)) {
            $model = $this->model->where("id", '=', $id)->first();
        } else {
            $model = $this->model->where('unique_id', '=', $id)->first();
        }
        if (is_array($id)) {
            if (count($model) == count(array_unique($id))) {
                $this->resetModel();

                return $this->parserResult($model);
            }
        } elseif (! is_null($model)) {
            $this->resetModel();

            return $this->parserResult($model);
        }

        throw (new ModelNotFoundException())->setModel(get_class($this->model), $id);
    }

    /**
     * Find a model by its primary key|unique_id or throw an exception.
     *
     * @param  mixed  $id
     * @param  array  $columns
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function findOrFail($id, $columns = ['*'])
    {
        $this->applyCriteria();
        $this->applyScope();
        $result = $this->find($id, $columns);
        if (is_array($id)) {
            if (count($result) == count(array_unique($id))) {
                $this->resetModel();

                return $this->parserResult($result);
            }
        } elseif (! is_null($result)) {
            $this->resetModel();

            return $this->parserResult($result);
        }
        throw (new ModelNotFoundException)->setModel(get_class($this->model), $id);
    }

    /**
     * Find data by field and value
     *
     * @param       $field
     * @param       $value
     * @param array $columns
     *
     * @return mixed
     */
    public function findByField($field, $value = null, $columns = ['*'])
    {
        $this->applyCriteria();
        $this->applyScope();
        $model = $this->model->where($field, '=', $value)->get($columns);
        $this->resetModel();

        return $this->parserResult($model);
    }


    /**
     * Find data by multiple fields
     *
     * @param array $where
     * @param array $columns
     *
     * @return mixed
     */
    public function findWhere(array $where, $columns = ['*'])
    {
        $this->applyCriteria();
        $this->applyScope();

        foreach ($where as $field => $value) {
            if (is_array($value)) {
                list($field, $condition, $val) = $value;
                $this->model = $this->model->where($field, $condition, $val);
            } else {
                $this->model = $this->model->where($field, '=', $value);
            }
        }

        $model = $this->model->get($columns);
        $this->resetModel();

        return $this->parserResult($model);
    }

    /**
     * Find data by multiple values in one field
     *
     * @param       $field
     * @param array $values
     * @param array $columns
     *
     * @return mixed
     */
    public function findWhereIn($field, array $values, $columns = ['*'])
    {
        $this->applyCriteria();
        $model = $this->model->whereIn($field, $values)->get($columns);
        $this->resetModel();

        return $this->parserResult($model);
    }

    /**
     * Find data by excluding multiple values in one field
     *
     * @param       $field
     * @param array $values
     * @param array $columns
     *
     * @return mixed
     */
    public function findWhereNotIn($field, array $values, $columns = ['*'])
    {
        $this->applyCriteria();
        $model = $this->model->whereNotIn($field, $values)->get($columns);
        $this->resetModel();

        return $this->parserResult($model);
    }

    /**
     * Save a new entity in repository
     *
     * @throws ValidatorException
     *
     * @param array $attributes
     *
     * @return mixed
     */
    public function create(array $attributes)
    {
        if (!is_null($this->validator)) {
            // we should pass data that has been casts by the model
            // to make sure data type are same because validator may need to use
            // this data to compare with data that fetch from database.
            $attributes = $this->model->newInstance()->forceFill($attributes)->toArray();

            $this->validator->with($attributes)->passesOrFail(ValidatorInterface::RULE_CREATE);
        }

        $model = $this->model->newInstance($attributes);
        $model->save();
        $this->resetModel();

        event(new RepositoryEntityCreated($this, $model));

        return $this->parserResult($model);
    }

    /**
     * Update a entity in repository by id
     *
     * @throws ValidatorException
     *
     * @param array $attributes
     * @param       $id
     *
     * @return mixed
     */
    public function update(array $attributes, $id)
    {
        $this->applyScope();

        if (!is_null($this->validator)) {
            // we should pass data that has been casts by the model
            // to make sure data type are same because validator may need to use
            // this data to compare with data that fetch from database.
            $attributes = $this->model->newInstance()->forceFill($attributes)->toArray();

            $this->validator->with($attributes)->setId($id)->passesOrFail(ValidatorInterface::RULE_UPDATE);
        }

        $_skipPresenter = $this->skipPresenter;

        $this->skipPresenter(true);

        $model = $this->findOrFail($id);
        $model->fill($attributes);
        $model->save();

        $this->skipPresenter($_skipPresenter);
        $this->resetModel();

        event(new RepositoryEntityUpdated($this, $model));

        return $this->parserResult($model);
    }
    /**
     * Update or Create an entity in repository
     *
     * @throws ValidatorException
     *
     * @param array $attributes
     * @param array $values
     *
     * @return mixed
     */
    public function updateOrCreate(array $attributes, array $values = [])
    {
        $this->applyScope();

        if (!is_null($this->validator)) {
            $this->validator->with($attributes)->passesOrFail(ValidatorInterface::RULE_UPDATE);
        }

        $_skipPresenter = $this->skipPresenter;

        $this->skipPresenter(true);

        $model = $this->model->updateOrCreate($attributes, $values);

        $this->skipPresenter($_skipPresenter);
        $this->resetModel();

        event(new RepositoryEntityUpdated($this, $model));

        return $this->parserResult($model);
    }
    /**
     * Delete a entity in repository by id
     *
     * @param $id
     *
     * @return int
     */
    public function delete($id)
    {
        $this->applyScope();

        $_skipPresenter = $this->skipPresenter;
        $this->skipPresenter(true);

        $model = $this->find($id);
        $originalModel = clone $model;

        $this->skipPresenter($_skipPresenter);
        $this->resetModel();

        $deleted = $model->delete();

        event(new RepositoryEntityDeleted($this, $originalModel));

        return $deleted;
    }

    /**
     * Check if entity has relation
     *
     * @param string $relation
     *
     * @return $this
     */
    public function has($relation)
    {
        $this->model = $this->model->has($relation);

        return $this;
    }

    /**
     * Load relations
     *
     * @param array|string $relations
     *
     * @return $this
     */
    public function with($relations)
    {
        $this->model = $this->model->with($relations);

        return $this;
    }

    /**
     * Set hidden fields
     *
     * @param array $fields
     *
     * @return $this
     */
    public function hidden(array $fields)
    {
        $this->model->setHidden($fields);

        return $this;
    }

    /**
     * Set visible fields
     *
     * @param array $fields
     *
     * @return $this
     */
    public function visible(array $fields)
    {
        $this->model->setVisible($fields);

        return $this;
    }

    /**
     * @param CriteriaInterface $criteria
     * @return $this
     * @throws RepositoryException
     */
    public function pushCriteria($criteria)
    {
        if (is_string($criteria)) {
            $criteria = new $criteria;
        }
        if (!$criteria instanceof CriteriaInterface) {
            throw new RepositoryException("Class ".get_class($criteria)." must be an instance of RepositoryLab\\Repository\\Contracts\\CriteriaInterface");
        }
        $this->criteria->push($criteria);

        return $this;
    }

    /**
     * Pop Criteria
     *
     * @param $criteria
     *
     * @return $this
     */
    public function popCriteria($criteria)
    {
        $this->criteria = $this->criteria->reject(function ($item) use ($criteria) {
            if (is_object($item) && is_string($criteria)) {
                return get_class($item) === $criteria;
            }

            if (is_string($item) && is_object($criteria)) {
                return $item === get_class($criteria);
            }

            return get_class($item) === get_class($criteria);
        });

        return $this;
    }

    /**
     * Get Collection of Criteria
     *
     * @return Collection
     */
    public function getCriteria()
    {
        return $this->criteria;
    }

    /**
     * Find data by Criteria
     *
     * @param CriteriaInterface $criteria
     * @return mixed
     */
    public function getByCriteria(CriteriaInterface $criteria)
    {
        $this->model = $criteria->apply($this->model, $this);
        $results = $this->model->get();
        $this->resetModel();
        return $this->parserResult($results);
    }

    /**
     * Skip Criteria
     *
     * @param bool $status
     * @return $this
     */
    public function skipCriteria($status = true)
    {
        $this->skipCriteria = $status;
        return $this;
    }

    /**
     * Reset all Criterias
     *
     * @return $this
     */
    public function resetCriteria()
    {
        $this->criteria = new Collection();

        return $this;
    }
    /**
     * Reset Query Scope
     *
     * @return $this
     */
    public function resetScope()
    {
        $this->scopeQuery = null;

        return $this;
    }


    /**
     * Apply scope in current Query
     *
     * @return $this
     */
    protected function applyScope()
    {
        if (isset($this->scopeQuery) && is_callable($this->scopeQuery)) {
            $callback = $this->scopeQuery;
            $this->model = $callback($this->model);
        }

        return $this;
    }

    /**
     * Apply criteria in current Query
     *
     * @return $this
     */
    protected function applyCriteria()
    {

        if ($this->skipCriteria === true) {
            return $this;
        }

        $criteria = $this->getCriteria();

        if ($criteria) {
            foreach ($criteria as $c) {
                if ($c instanceof CriteriaInterface) {
                    $this->model = $c->apply($this->model, $this);
                }
            }
        }

        return $this;
    }

    /**
     * Skip Presenter Wrapper
     *
     * @param bool $status
     * @return $this
     */
    public function skipPresenter($status = true)
    {
        $this->skipPresenter = $status;
        return $this;
    }

    /**
     * Wrapper result data
     *
     * @param mixed $result
     * @return mixed
     */
    public function parserResult($result)
    {
        if ($this->presenter instanceof PresenterInterface) {

            if ($result instanceof Collection || $result instanceof LengthAwarePaginator) {
                $result->each(function ($model) {
                    if ($model instanceof Presentable) {
                        $model->setPresenter($this->presenter);
                    }
                    return $model;
                });
            } elseif ($result instanceof Presentable) {
                $result = $result->setPresenter($this->presenter);
            }

            if (!$this->skipPresenter) {
                return $this->presenter->present($result);
            }
        }
        return $result;
    }

    /**
     * @param $key
     * @param $value
     * @param string $operator
     * @return mixed
     */
    public function where($key, $value, $operator = '=')
    {
        $this->applyCriteria();
        $this->applyScope();

        $model = $this->model->where($key, $operator, $value)->get($columns = ['*']);

        $this->resetModel();

        return $this->parserResult($model);
    }

    /**
     * @param $key
     * @param $order
     * @return mixed
     */
    public function order($key, $order)
    {
        $this->applyCriteria();
        $this->applyScope();

        $this->model = $this->model->orderBy($key, $order);

        return $this;
    }

    /**
     * determine if the given method is scope in the model
     *
     * @param $key
     * @return bool
     */
    private function  hasScopePrefix($key)
    {
        return method_exists($this->getModel(), 'scope'.Str::studly($key));
    }

    /**
     * @param $key
     * @return string
     */
    private function prepareSopePrefix($key)
    {
        return 'scope'.Str::studly($key);
    }
    /**
     * determine if the method belongs to this class
     *
     * @param $key
     * @return bool
     */
    private function isBaseMethod($key) {
        return method_exists($this, Str::studly($key));
    }
}