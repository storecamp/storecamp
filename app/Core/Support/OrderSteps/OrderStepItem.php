<?php

namespace App\Core\Support\OrderSteps;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Collection;

class OrderStepItem implements Arrayable
{
    /**
     * The rowID of the cart item.
     *
     * @var string
     */
    public $rowId;

    /**
     * @var int|string
     */
    public $userId;

    /**
     * @var Collection
     */
    public $steps;

    /**
     * OrderStepItem constructor.
     */
    public function __construct()
    {
        if ($this->checkIfExists()) {
            $steps = session('steps');
            $this->steps = $steps['steps'];
            $this->userId = $steps['userId'];
            $this->rowId = $steps['rowId'];
        } else {
            if (empty($id)) {
                $id = \Auth::check() ? \Auth::user()->id : 0;
            }
            $this->steps = $this->getSteps();
            $this->userId = $id;
            $this->rowId = $this->generateRowId($id);
        }
    }

    public function checkIfExists(): bool
    {
        $steps = session('steps');
        if ($steps) {
            return true;
        }

        return false;
    }

    /**
     * Get an attribute from the cart item or get the associated model.
     *
     * @param string $attribute
     *
     * @return mixed
     */
    public function __get($attribute)
    {
        if (property_exists($this, $attribute)) {
            return $this->{$attribute};
        }
        if ($attribute === 'user') {
            return $this->userId ? app('App\Core\Repositories\UserRepository')->find($this->userId) : null;
        }
    }

    /**
     * @param string $name
     *
     * @return mixed
     */
    public function getStep(string $name)
    {
        $step = $this->steps->where('step', $name);

        return $step;
    }

    /**
     * @return Collection|null
     */
    public function getSteps(): ?Collection
    {
        $steps = session('steps');
        if (empty($steps)) {
            $items = [
                [
                    'step'   => OrderSteps::STEPS[0],
                    'status' => \Auth::guest() ? false : true,
                ],
                [
                    'step'   => OrderSteps::STEPS[1],
                    'status' => false,
                ],
                [
                    'step'   => OrderSteps::STEPS[2],
                    'status' => false,
                ],
                [
                    'step'   => OrderSteps::STEPS[3],
                    'status' => false,
                ],
            ];
            $collection = OrderSteps::make($items);
            $this->create($collection);

            return $collection;
        } else {
            return $steps['steps'];
        }
    }

    /**
     * @return mixed
     */
    public function getWhereNotActive()
    {
        $steps = $this->getSteps();
        if (!empty($steps)) {
            return $steps->where('status', false)->first();
        }
    }

    /**
     * @param $name
     *
     * @throws \Exception
     *
     * @return array|null
     */
    public function makeStepPassed($name): ?array
    {
        if (!in_array($name, OrderSteps::STEPS)) {
            throw new \Exception('Not Steps Found by the given name');
        }
        $steps = $this->getSteps();
        if (!empty($steps)) {
            $items = $steps->transform(function ($item, $key) use ($name) {
                if ($item['step'] == $name) {
                    $item['status'] = true;

                    return $item;
                } else {
                    return $item;
                }
            });
            $orderItem = $this->update($this->rowId, $this->userId, $items);

            return $orderItem;
        } else {
            throw new \Exception('Not Steps Found');
        }
    }

    public function create($steps)
    {
        \Session::remove('steps');
        $id = \Auth::check() ? \Auth::user()->id : 0;
        $item = [
            'rowId'  => $this->rowId = $this->generateRowId($id),
            'userId' => $this->userId = $id,
            'steps'  => $this->steps = $steps,
        ];

        \Session::put('steps', $item);

        return $item;
    }

    public function update($rowId, $userId, $steps)
    {
        $item = [
            'rowId'  => $this->rowId = $rowId,
            'userId' => $this->userId = $userId,
            'steps'  => $this->steps = $steps,
        ];
        \Session::remove('steps');
        \Session::put('steps', $item);

        return $item;
    }

    /**
     * @param $id
     *
     * @return string
     */
    protected function generateRowId($id): string
    {
        return md5($id);
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'rowId'  => $this->rowId,
            'userId' => $this->userId ?? null,
            'steps'  => $this->steps,
        ];
    }
}
