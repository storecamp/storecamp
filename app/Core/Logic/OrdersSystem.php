<?php

namespace App\Core\Logic;

use App\Core\Contracts\OrdersSystemContract;
use App\Core\Models\Orders;

class OrdersSystem implements OrdersSystemContract
{
    public $orders;

    /**
     * OrdersSystem constructor.
     *
     * @param $orders
     */
    public function __construct(Orders $orders)
    {
        $this->orders = $orders;
    }

    /**
     * @param array $data
     * @param null  $id
     * @param array $with
     *
     * @return mixed
     */
    public function present(array $data, $id = null, array $with = [])
    {
        if ($id) {
            $roles = $this->orders->find($id);
        } else {
            if (!empty($with)) {
                $roles = $this->orders->with($with)->paginate();
            } else {
                $roles = $this->orders->paginate();
            }
        }

        return $roles;
    }

    /**
     * @param array $data
     *
     * @return mixed
     */
    public function create(array $data)
    {
    }

    /**
     * @param array $data
     * @param $id
     *
     * @return mixed
     */
    public function update(array $data, $id)
    {
    }

    /**
     * @param $id
     * @param array $data
     *
     * @return int
     */
    public function delete($id, array $data = []): int
    {
    }
}
