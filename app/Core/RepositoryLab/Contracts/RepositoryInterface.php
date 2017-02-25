<?php
namespace RepositoryLab\Repository\Contracts;

/**
 * Interface RepositoryInterface
 * @package RepositoryLab\Repository\Contracts
 */
interface RepositoryInterface
{
    /**
     * get model instance
     */
    public function getModel();

    /**
     * Retrieve all data of repository
     *
     * @param array $columns
     * @return mixed
     */
    public function all($columns = array('*'));

    /**
     * Retrieve all data of repository, paginated
     * @param null $limit
     * @param array $columns
     * @return mixed
     */
    public function paginate($limit = null, $columns = array('*'));

    /**
     * Find data by id
     *
     * @param $id
     * @param array $columns
     * @return mixed
     */
    public function find($id, $columns = array('*'));

    /**
     * @param $id
     * @param array $columns
     * @return mixed
     */
    public function findOrFail($id, $columns = ['*']);
    /**
     * Find data by field and value
     *
     * @param $field
     * @param $value
     * @param array $columns
     * @return mixed
     */
    public function findByField($field, $value, $columns = array('*'));

    /**
     * Find data by multiple fields
     *
     * @param array $where
     * @param array $columns
     * @return mixed
     */
    public function findWhere(array $where, $columns = array('*'));

    /**
     * Find data by multiple values in one field
     *
     * @param $field
     * @param array $values
     * @param array $columns
     * @return mixed
     */
    public function findWhereIn($field, array $values, $columns = array('*'));

    /**
     * Find data by excluding multiple values in one field
     *
     * @param $field
     * @param array $values
     * @param array $columns
     * @return mixed
     */
    public function findWhereNotIn($field, array $values, $columns = array('*'));

    /**
     * Save a new entity in repository
     *
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes);

    /**
     * Update a entity in repository by id
     *
     * @param array $attributes
     * @param $id
     * @return mixed
     */
    public function update(array $attributes, $id);

    /**
     * @param array $attributes
     * @param array $values
     * @return mixed
     */
    public function updateOrCreate(array $attributes, array $values = []);

    /**
     * Delete a entity in repository by id
     *
     * @param $id
     * @return int
     */
    public function delete($id);

    /**
     * Load relations
     *
     * @param $relations
     * @return $this
     */
    public function with($relations);

    /**
     * Set hidden fields
     *
     * @param array $fields
     * @return $this
     */
    public function hidden(array $fields);

    /**
     * Set visible fields
     *
     * @param array $fields
     * @return $this
     */
    public function visible(array $fields);

    /**
     * Query Scope
     *
     * @param \Closure $scope
     * @return $this
     */
    public function scopeQuery(\Closure $scope);

    /**
     * Get Searchable Fields
     *
     * @return array
     */
    public function getFieldsSearchable();

    /**
     * Set Presenter
     *
     * @param $presenter
     * @return mixed
     */
    public function setPresenter($presenter);

    /**
     * Skip Presenter Wrapper
     *
     * @param bool $status
     * @return $this
     */
    public function skipPresenter($status = true);

    /**
     * get the name of the Model
     * not lowercased
     *
     * @return mixed
     */
//    public function getModelName();

    /**
     * get some data attached to model from config folder
     *
     * @param $configFileName
     * @return mixed
     */
//    public function bindFromConfigModel($configFileName);


    /**
     * @param $criteria
     * @return mixed
     */
    public function pushCriteria($criteria);


    /**
     * Retrieve data array for populate field select
     *
     * @param string $column
     * @param string|null $key
     *
     * @return \Illuminate\Support\Collection|array
     */
    public function lists($column, $key = null);

    /**
     * Retrieve all data of repository, simple paginated
     * @param null $limit
     * @param array $columns
     * @return mixed
     */
    public function simplePaginate($limit = null, $columns = array('*'));

    /**
     * Reset Query Scope
     *
     * @return $this
     */
    public function resetScope();

    /**
     * @param $key
     * @param $value
     * @param string $operator
     * @return mixed
     */
    public function where($key, $value, $operator = '=');

    /**
     * @param $key
     * @param $order
     * @return mixed
     */
    public function order($key, $order);

}
