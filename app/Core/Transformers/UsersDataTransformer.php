<?php

namespace App\Core\Transformers;

use App\Core\Models\User;
use League\Fractal\TransformerAbstract;

class UsersDataTransformer extends TransformerAbstract
{
    /**
     * @param User $user
     *
     * @return array
     */
    public function transform(User $user)
    {
        return [
            'id'         => $user->id,
            'name'       => $user->name,
            'email'      => $user->email,
            'roles'      => $this->getRoles($user),
            'created_at' => $user->created_at,
            'updated_at' => $user->updated_at,
            'action'     => $this->getActions($user),
        ];
    }

    /**
     * @param User $user
     *
     * @return string
     */
    private function getRoles(User $user)
    {
        $roles = [];
        foreach ($user->roles as $role) {
            $roles[] = '<b style="text-decoration: underline">'.$role->name.'</b>'.'<br>';
        }

        return implode('', $roles);
    }

    /**
     * @param User $user
     *
     * @return string
     */
    private function getActions(User $user)
    {
        $html = '<td class="text-center">
                <a class="btn btn-default edit" href="'.route('admin::users::edit', $user->unique_id).'" title="Edit">
                <em class="fa fa-pencil-square-o"></em></a>';
        if ($user->banned === 0) {
            $html .= '<a class="btn btn-default text-warning"
                    href="'.route('admin::toggleBan', ['class_name' => getBaseClassName($user, false), 'object_id' => $user->id]).'">
                    ban
                    </a>';
        } else {
            $html .= '<a class="btn btn-warning text-warning"
                      href="'.route('admin::toggleBan', ['class_name' => getBaseClassName($user, false), 'object_id' => $user->id]).'">
                      unban
                      </a>';
        }
        $html .= '<a class="btn btn-danger delete text-warning"
                  href="'.route('admin::users::get::delete', $user->unique_id).'"
                  title="Are you sure you want to delete?"><em class="fa fa-trash-o"></em></a>
                  </td>';

        return $html;
    }
}
