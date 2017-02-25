<?php

namespace App\Core\Components\Auditing\Auditors;

use App\Core\Components\Auditing\Auditing;

class DatabaseAuditor
{
    /**
     * Audit the model auditable.
     *
     * @param mixed $auditable
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function audit($auditable)
    {
        $report = Auditing::create(
            $auditable->toAudit()
        );

        if ($report) {
            $auditable->clearOlderAudits();
        }

        return $report;
    }
}
