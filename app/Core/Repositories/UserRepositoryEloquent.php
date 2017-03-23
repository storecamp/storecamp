<?php

namespace App\Core\Repositories;

use App\Core\Models\User;
use RepositoryLab\Repository\Criteria\RequestCriteria;
use RepositoryLab\Repository\Eloquent\BaseRepository;

/**
 * Class UserRepositoryEloquent.
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'  => 'like',
        'email' => 'like',
    ];

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    /**
     * Boot up the repository, pushing criteria.
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        $model = User::class;

        return new $model();
    }

    /**
     * @param $user
     *
     * @return mixed
     */
    public function getRole($user)
    {
        foreach ($user->roles()->get() as $role) {
            {
                return $role->name;
            }
        }
    }
}
