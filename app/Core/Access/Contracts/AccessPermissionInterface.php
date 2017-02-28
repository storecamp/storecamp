<?php

namespace App\Core\Access\Contracts;

/**
 * This file is part of Access,
 * a role & permission management solution for Syrinx.
 *
 * @license MIT
 */
interface AccessPermissionInterface
{
    /**
     * Many-to-Many relations with role model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles();
}
