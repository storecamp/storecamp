<?php


namespace App\Core\Transformers;


use App\Core\Models\Role;
use League\Fractal\TransformerAbstract;

/**
 * Class RolesDataTransformer
 * @package App\Core\Transformers
 */
class RolesDataTransformer extends TransformerAbstract
{
    /**
     * @param Role $role
     * @return array
     */
    public function transform(Role $role)
    {
        return [
            'id' => $role->id,
            'name' => $role->name,
            'display_name' => $role->display_name,
            'description' => $role->description,
            'permissions' => $this->getRolePerms($role),
            'created_at' => $role->created_at,
            'updated_at' => $role->updated_at,
            'action' => $this->getActions($role),
        ];
    }

    /**
     * @param Role $role
     * @return string
     */
    private function getRolePerms(Role $role)
    {
        $permissions = [];
        foreach($role->perms as $permission) {
            $permissions[] = '<b style="text-decoration: underline">'.$permission->name.'</b>'.'<br>';
        }
        return implode('', $permissions);
    }

    /**
     * @param Role $role
     * @return string
     */
    private function getActions(Role $role)
    {
        return '<td align="center">
                 <a class="btn btn-default edit" href="'.route('admin::roles::edit', $role->unique_id).'" title="Edit">
                 <em class="fa fa-pencil-square-o"></em></a>
                 <a class="btn btn-danger delete text-warning" href="'.route('admin::roles::get::delete', $role->unique_id).'"
                 title="Are you sure you want to delete?"><em class="fa fa-trash-o"></em></a>
                </td>';
    }
}
