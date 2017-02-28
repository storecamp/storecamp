<?php

namespace RepositoryLab\Repository\Events;

/**
 * Class RepositoryEntityDeleted.
 */
class RepositoryEntityDeleted extends RepositoryEventBase
{
    /**
     * @var string
     */
    protected $action = 'deleted';
}
