<?php

namespace App\Core\Transformers;

use App\Core\Models\Menu;
use League\Fractal\TransformerAbstract;

class MenusDataTransformer extends TransformerAbstract
{
    public function transform(Menu $menu)
    {
        return [
            'id'         => $menu->id,
            'name'       => $menu->name,
            'created_at' => $menu->created_at,
            'updated_at' => $menu->updated_at,
            'action'     => $this->getActions($menu),
        ];
    }

    private function getActions(Menu $menu)
    {
        return '<div class="btn btn-sm btn-danger delete" data-id="'.$menu->id.'">
                   <i class="fa fa-trash-o"></i> 
                   Delete
                   </div>
                   <a href="'.route('admin::design::menus::edit', [$menu->id]).'" 
                   class="btn btn-sm btn-primary edit">
                        <i class="fa fa-pencil-square-o"></i> Edit
                   </a>
                   <a href="'.route('admin::design::menus::builder', [$menu->id]).'" 
                   class="btn btn-sm btn-success">
                   <i class="fa fa-list"></i> Builder
                   </a>';
    }
}
