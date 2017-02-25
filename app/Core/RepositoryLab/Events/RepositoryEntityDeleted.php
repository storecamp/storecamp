<?php
namespace RepositoryLab\Repository\Events;

/**
 * Class RepositoryEntityDeleted
 * @package RepositoryLab\Repository\Events
 */
class RepositoryEntityDeleted extends RepositoryEventBase
{
    /**
     * @var string
     */
    protected $action = "deleted";
}