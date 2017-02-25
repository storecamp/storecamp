<?php

namespace App\Core\Components\Auditing;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class AuditQueuedModels implements ShouldQueue
{
    use Queueable;

    /**
     * @var
     */
    private $auditable;

    /**
     * Create a new job instance.
     *
     * @param mixed $auditable
     *
     * @return void
     */
    public function __construct($auditable)
    {
        $this->auditable = $auditable;
    }

    /**
     * Audit the model auditable.
     *
     * @param \App\Core\Components\Auditing\AuditorManager $manager
     *
     * @return void
     */
    public function handle(AuditorManager $manager)
    {
        $manager->audit($this->auditable);
    }
}
