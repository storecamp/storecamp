<?php

namespace App\Core\Transformers;

use App\Core\Models\AttributeGroup;
use League\Fractal\TransformerAbstract;

class AttributeGroupsDataTransformer extends TransformerAbstract
{
    public function transform(AttributeGroup $attr)
    {
        return [
            'id'         => $attr->id,
            'name'       => $attr->name,
            'sort_order' => $attr->sort_order,
            'created_at' => $attr->created_at,
            'updated_at' => $attr->updated_at,
            'action'     => $this->getActions($attr),
        ];
    }

    private function getActions(AttributeGroup $attr)
    {
        return ' <a class="btn btn-default edit"
                 href="'.route('admin::attribute_groups::edit', $attr->unique_id).'"
                 title="Edit">
                 <em class="fa fa-pencil-square-o"></em></a>
                 <a class="btn btn-danger delete text-warning"
                 href="'.route('admin::attribute_groups::get::delete', $attr->unique_id).'"
                 title="Are you sure you want to delete?"><em class="fa fa-trash-o"></em></a>';
    }
}
