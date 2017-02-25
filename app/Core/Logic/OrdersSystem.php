<?php

namespace App\Core\Logic;


use App\Core\Contracts\OrdersSystemContract;
use App\Core\Repositories\OrdersRepository;

class OrdersSystem implements OrdersSystemContract
{
    public $ordersRepository;

    /**
     * OrdersSystem constructor.
     * @param $ordersRepository
     */
    public function __construct(OrdersRepository $ordersRepository)
    {
        $this->ordersRepository = $ordersRepository;
    }


    /**
     * @param array $data
     * @param null $id
     * @param array $with
     * @return mixed
     */
    public function present(array $data, $id = null, array $with = []) {
        if ($id) {
            $roles = $this->ordersRepository->find($id);
        } else {
            if (!empty($with)) {
                $roles = $this->ordersRepository->with($with)->paginate();
            } else {
                $roles = $this->ordersRepository->paginate();
            }
        }
        return $roles;
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data) {

    }

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function update(array $data, $id) {

    }

    /**
     * @param $id
     * @param array $data
     * @return int
     */
    public function delete($id, array $data = []): int {}
}