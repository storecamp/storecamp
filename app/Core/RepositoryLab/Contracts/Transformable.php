<?php
namespace RepositoryLab\Repository\Contracts;

/**
 * Interface Transformable
 * @package RepositoryLab\Repository\Contracts
 */
interface Transformable
{
    /**
     * @return array
     */
    public function transform();
}