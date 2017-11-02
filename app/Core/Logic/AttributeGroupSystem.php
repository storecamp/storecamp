<?php

namespace App\Core\Logic;

use App\Core\Contracts\AttributeGroupSystemContract;
use App\Core\Models\AttributeGroup;
use App\Core\Models\AttributeGroupDescription;

/**
 * Class AttributeGroupSystem.
 */
class AttributeGroupSystem implements AttributeGroupSystemContract
{
    /**
     * @var AttributeGroup
     */
    public $group;
    /**
     * @var AttributeGroupDescription
     */
    public $description;

    /**
     * AttributeGroupSystem constructor.
     */
    public function __construct()
    {
        $this->group = new AttributeGroup();
        $this->description = new AttributeGroupDescription();
    }

    /**
     * @param array $data
     * @param null $id
     * @param array $with
     *
     * @return mixed
     */
    public function presentGroup(array $data, $id = null, array $with = [])
    {
        if ($id) {
            $attributes = $this->group->findOrFail($id);
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
     *
     * @return mixed
     */
    public function presentDescription(array $data, $id = null, array $with = [])
    {
        if ($id) {
            $attributes = $this->description->findOrFail($id);
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
     *
     * @return bool|mixed
     */
    public function createGroup(array $data)
    {
        $groupAttribute = $this->group->withTrashed()->where('name', $data['name']);
        if ($groupAttribute->count() > 0) {
            $group = $groupAttribute->restore();
        } else {
            $group = $this->group->create($data);
        }

        return $group;
    }

    /**
     * @param array $data
     *
     * @return mixed
     */
    public function createDescription(array $data)
    {
        $groupDescription = $this->description->withTrashed()->where('name', $data['name']);
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
     *
     * @return mixed
     */
    public function updateGroup(array $data, $id)
    {
        $groupAttributeOnlyTrashed = $this->group->onlyTrashed()->where('name', $data['name']);
        $groupAttribute = $this->group->findOrFail($id);

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
     *
     * @return mixed
     */
    public function updateDescription(array $data, $id)
    {
        $description = $this->description->findOrFail($id);
        $groupDescription = $this->group->onlyTrashed()->where('name', $data['name']);

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
     *
     * @return int
     */
    public function deleteGroup($id, array $data = []): int
    {
        $deleted = $this->group->findOrFail($id)->delete();

        return $deleted;
    }

    /**
     * @param $id
     * @param array $data
     *
     * @return int
     */
    public function deleteDescription($id, array $data = []): int
    {
        $deleted = $this->description->findOrFail($id)->delete();

        return $deleted;
    }
}
