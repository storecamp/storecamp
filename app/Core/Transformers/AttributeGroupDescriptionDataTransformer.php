<?php

namespace App\Core\Transformers;

use App\Core\Models\AttributeGroupDescription;
use League\Fractal\TransformerAbstract;

class AttributeGroupDescriptionDataTransformer extends TransformerAbstract
{
    public function transform(AttributeGroupDescription $attr)
    {
        return [
            'id'              => $attr->id,
            'name'            => $attr->name,
            'attributesGroup' => $attr->attributesGroup->name,
            'sort_order'      => $attr->sort_order,
            'created_at'      => $attr->created_at,
            'updated_at'      => $attr->updated_at,
            'action'          => $this->getActions($attr),
        ];
    }

    private function getActions(AttributeGroupDescription $attr)
    {
        return ' <a class="btn btn-default edit"
                 href="'.route('admin::attributes::edit', $attr->unique_id).'"
                 title="Edit">
                 <em class="fa fa-pencil-square-o"></em></a>
                 <a class="btn btn-danger delete text-warning"
                 href="'.route('admin::attributes::get::delete', $attr->unique_id).'"
                 title="Are you sure you want to delete?"><em class="fa fa-trash-o"></em></a>';
    }
}
