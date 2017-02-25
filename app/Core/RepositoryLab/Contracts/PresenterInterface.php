<?php
namespace RepositoryLab\Repository\Contracts;

/**
 * Interface PresenterInterface
 * @package RepositoryLab\Repository\Contracts
 */
interface PresenterInterface
{
    /**
     * Prepare data to present
     *
     * @param $data
     * @return mixed
     */
    public function present($data);
}