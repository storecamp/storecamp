<?php

namespace App\Core\Components\Auditing;

use App\Core\Components\Auditing\Contracts\Dispatcher;
use Illuminate\Support\Facades\Config;

trait Auditor
{
    /**
     * Audit the model auditable.
     *
     * @return void
     */
    public function audit()
    {
        app(Dispatcher::class)->makeAudit($this);
    }

    /**
     * Get the Auditors.
     *
     * @return array
     */
    public function getAuditors()
    {
        return isset($this->auditors) ? $this->auditors : Config::get('auditing.default_auditor');
    }
}
