<?php
namespace RepositoryLab\Repository\Events;

/**
 * Class RepositoryEntityCreated
 * @package RepositoryLab\Repository\Events
 */
class RepositoryEntityCreated extends RepositoryEventBase
{
    /**
     * @var string
     */
    protected $action = "created";
}