<?php

namespace App\Core\Components\Auditing\Contracts;

interface Dispatcher
{
    /**
     * Audit the given information.
     *
     * @param $auditable
     *
     * @return void
     */
    public function audit($auditing);
}
