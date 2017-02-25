<?php

namespace RepositoryLab\Repository;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider {


    /**
     * The subscriber classes to register.
     *
     * @var array
     */
    protected $subscribe = [];
    /**
     * The event handler mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        \RepositoryLab\Repository\Events\RepositoryEntityCreated::class => [
            \RepositoryLab\Repository\Listeners\CleanCacheRepository::class
        ],
        \RepositoryLab\Repository\Events\RepositoryEntityUpdated::class => [
            \RepositoryLab\Repository\Listeners\CleanCacheRepository::class
        ],
        \RepositoryLab\Repository\Events\RepositoryEntityDeleted::class => [
            \RepositoryLab\Repository\Listeners\CleanCacheRepository::class
        ]
    ];

    /**
     * Register the application's event listeners.
     *
     * @return void
     */
    public function boot()
    {
        $events = app('events');
        foreach ($this->listen as $event => $listeners) {
            foreach ($listeners as $listener) {
                $events->listen($event, $listener);
            }
        }
        foreach ($this->subscribe as $subscriber) {
            $events->subscribe($subscriber);
        }
    }
    /**
     * {@inheritdoc}
     */
    public function register()
    {
        //
    }
    /**
     * Get the events and handlers.
     *
     * @return array
     */
    public function listens()
    {
        return $this->listen;
    }
}