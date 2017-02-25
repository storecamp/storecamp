<?php namespace RepositoryLab\Repository\Traits;

/**
 * Class TransformableTrait
 * @package RepositoryLab\Repository\Traits
 */
trait TransformableTrait {

    /**
     * @return array
     */
    public function transform()
    {
        return $this->toArray();
    }

}