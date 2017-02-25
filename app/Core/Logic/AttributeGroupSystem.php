<?php

namespace App\Core\Logic;


use App\Core\Contracts\AttributeGroupSystemContract;
use App\Core\Repositories\AttributeGroupDescriptionRepository;
use App\Core\Repositories\AttributeGroupRepository;

/**
 * Class AttributeGroupSystem
 * @package App\Core\Logic
 */
class AttributeGroupSystem implements AttributeGroupSystemContract
{
    /**
     * @var AttributeGroupRepository
     */
    public $group;
    /**
     * @var AttributeGroupDescriptionRepository
     */
    public $description;

    /**
     * AttributeGroupSystem constructor.
     * @param $group
     * @param $description
     */
    public function __construct(AttributeGroupRepository $group, AttributeGroupDescriptionRepository $description)
    {
        $this->group = $group;
        $this->description = $description;
    }

    /**
     * @param array $data
     * @param null $id
     * @param array $with
     * @return mixed
     */
    public function presentGroup(array $data, $id = null, array $with = [])
    {
        if ($id) {
            $attributes = $this->group->find($id);
        } else {
            if (!empty($with)) {
                $attributes = $this->group->with($with)->paginate();
            } else {
                $attributes = $this->group->paginate();
            }
        }
        return $attributes;
    }

    /**
     * @param array $data
     * @param null $id
     * @param array $with
     * @return mixed
     */
    public function presentDescription(array $data, $id = null, array $with = [])
    {
        if ($id) {
            $attributes = $this->description->find($id);
        } else {
            if (!empty($with)) {
                $attributes = $this->description->with($with)->paginate();
            } else {
                $attributes = $this->description->paginate();
            }
        }
        return $attributes;
    }

    /**
     * @param array $data
     * @return bool|mixed
     */
    public function createGroup(array $data)
    {
        $groupAttribute = $this->group->getModel()->withTrashed()->where("name", $data["name"]);
        if ($groupAttribute->count() > 0) {
            $group = $groupAttribute->restore();
        } else {
            $group = $this->group->create($data);
        }
        return $group;
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function createDescription(array $data)
    {
        $groupDescription = $this->description->getModel()->withTrashed()->where("name", $data["name"]);
        if ($groupDescription->count() > 0) {
            $description = $groupDescription->restore();
        } else {
            $description = $this->description->create($data);
        }
        return $description;
    }

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function updateGroup(array $data, $id)
    {
        $groupAttributeOnlyTrashed = $this->group->getModel()->onlyTrashed()->where("name", $data["name"]);
        $groupAttribute = $this->group->find($id);

        if ($groupAttributeOnlyTrashed->count() > 0) {
            $groupAttribute = $groupAttribute->restore();
        } else {
            $groupAttribute = $groupAttribute->update($data);
        }
        return $groupAttribute;
    }

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function updateDescription(array $data, $id)
    {
        $description = $this->description->find($id);
        $groupDescription = $this->group->getModel()->onlyTrashed()->where("name", $data["name"]);

        if ($groupDescription->count() > 0) {
            $descriptionAttribute = $description->restore();
        } else {
            $descriptionAttribute = $description->update($data);
        }
        return $descriptionAttribute;
    }

    /**
     * @param $id
     * @param array $data
     * @return int
     */
    public function deleteGroup($id, array $data = []): int
    {
        $deleted = $this->group->delete($id);
        return $deleted;
    }

    /**
     * @param $id
     * @param array $data
     * @return int
     */
    public function deleteDescription($id, array $data = []): int
    {
        $deleted = $this->description->delete($id);
        return $deleted;
    }
}