<?php

namespace App\Core\Components\Auditing;

use Illuminate\Support\ServiceProvider;
use App\Core\Components\Auditing\Console\AuditingTableCommand;
use App\Core\Components\Auditing\Console\AuditorMakeCommand;
use App\Core\Components\Auditing\Console\InstallCommand;
use App\Core\Components\Auditing\Contracts\Dispatcher;
use App\Core\Components\Auditing\Facades\Auditing as AuditingFacade;

/**
 * This is the owen auditing service provider class.
 */
class AuditingServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $this->setupConfig($this->app);
    }

    /**
     * Setup the config.
     *
     * @param $app
     *
     * @return void
     */
    protected function setupConfig($app)
    {
        $source = realpath(__DIR__.'/../config/auditing.php');

        if ($app->runningInConsole()) {
            $this->publishes([$source => config_path('auditing.php')]);
        }

        $this->mergeConfigFrom($source, 'auditing');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->commands([
            AuditingTableCommand::class,
            AuditorMakeCommand::class,
            InstallCommand::class,
        ]);

        $this->app->bind('App\Core\Components\Auditing\Auditing', Auditing::class);

        $this->app->singleton(AuditorManager::class, function ($app) {
            return new AuditorManager($app);
        });

        $this->app->alias(
            AuditorManager::class, Dispatcher::class
        );

        $this->app->alias('Auditing', AuditingFacade::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [AuditorManager::class, Dispatcher::class, AuditingFacade::class];
    }
}
