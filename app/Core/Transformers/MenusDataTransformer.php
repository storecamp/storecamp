<?php

namespace App\Core\Transformers;


use App\Core\Models\Menu;
use League\Fractal\TransformerAbstract;

class MenusDataTransformer extends TransformerAbstract
{
    public function transform(Menu $menu)
    {
        return [
            'id' => $menu->id,
            'name' => $menu->name,
            'created_at' => $menu->created_at,
            'updated_at' => $menu->updated_at,
            'action' => $this->getActions($menu),
        ];
    }


    private function getActions(Menu $menu)
    {
        return '<div class="btn btn-sm btn-danger delete" data-id="' . $menu->id . '">
                   <i class="menu-trash"></i> 
                   Delete
                   </div>
                   <a href="' . route('admin::menus::edit', [$menu->id]) . '" 
                   class="btn btn-sm btn-primary edit">
                        <i class="voyager-edit"></i> Edit
                   </a>
                   <a href="' . route('admin::menus::builder', [$menu->id]) . '" 
                   class="btn btn-sm btn-success">
                   <i class="voyager-list"></i> Builder
                   </a>';
    }
}
