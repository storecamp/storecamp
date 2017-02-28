<?php

namespace RepositoryLab\Repository\Contracts;

/**
 * Interface Presentable.
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
