<?php
namespace RepositoryLab\Repository\Events;

/**
 * Class RepositoryEntityUpdated
 * @package RepositoryLab\Repository\Events
 */
class RepositoryEntityUpdated extends RepositoryEventBase
{
    /**
     * @var string
     */
    protected $action = "updated";
}