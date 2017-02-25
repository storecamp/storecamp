<?php

namespace App\Core\Components\Sidebar;

use Illuminate\Support\Collection;


trait SidebarTrait
{

    protected $instance;

    /**
     * SidebarTrait constructor.
     * @param $instance
     */

    public function __construct($instance)
    {
        $this->instace = $instance;
    }

    /**
     * @return int
     */
    public function fetch()
    {
        return 5;
    }

    /**
     * @return mixed
     */
    public function getLastInstances()
    {
        return $this->instance->latest('published_at')->localed()->take($this->fetch())->get();
    }

    /**
     * @return Collection
     */
    public function formLastModelsCollection()
    {
        $collection = collect(["instance" => $this->getLastInstances()]);

        return $collection;
    }
}
