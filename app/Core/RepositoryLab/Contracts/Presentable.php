<?php
namespace RepositoryLab\Repository\Contracts;

/**
 * Interface Presentable
 * @package RepositoryLab\Repository\Contracts
 */
interface Presentable
{
    /**
     * @param PresenterInterface $presenter
     * @return mixed
     */
    public function setPresenter(PresenterInterface $presenter);

    /**
     * @return mixed
     */
    public function presenter();
}