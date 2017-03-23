<?php

namespace App\Core\Access;

/*
 * This file is part of Access,
 * a role & permission management solution for Laravel.
 *
 * @license MIT
 * @package App\Core\Access
 */

use App\Core\Access\Commands\ClassCreatorCommand;
use App\Core\Access\Commands\MigrationCommand;
use Illuminate\Support\ServiceProvider;

class AccessServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        // Publish config files
        $this->publishes([
            __DIR__.'/config/config.php' => config_path('access.php'),
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerAccess();

        $this->registerCommands();

        $this->mergeConfig();
    }

    /**
     * Register the blade directives.
     *
     * @return void
     */
    private function bladeDirectives()
    {
        // Call to Access::hasRole
        \Blade::directive('role', function ($expression) {
            return "<?php if (\\Access::hasRole{$expression}) : ?>";
        });

        \Blade::directive('endrole', function ($expression) {
            return '<?php endif; // Access::hasRole ?>';
        });

        // Call to Access::may
        \Blade::directive('permission', function ($expression) {
            return "<?php if (\\Access::may{$expression}) : ?>";
        });

        \Blade::directive('endpermission', function ($expression) {
            return '<?php endif; // Access::may ?>';
        });

        // Call to Access::ability
        \Blade::directive('ability', function ($expression) {
            return "<?php if (\\Access::ability{$expression}) : ?>";
        });

        \Blade::directive('endability', function ($expression) {
            return '<?php endif; // Access::ability ?>';
        });
    }

    /**
     * Register the application bindings.
     *
     * @return void
     */
    private function registerAccess()
    {
        $this->app->bind('access', function ($app) {
            return new Access($app);
        });

        $this->app->alias('access', 'App\Core\Access\Access');
    }

    /**
     * Register the artisan commands.
     *
     * @return void
     */
    private function registerCommands()
    {
        $this->app->singleton('command.access.migration', function ($app) {
            return new MigrationCommand();
        });
        $this->app->singleton('command.access.classes', function ($app) {
            return new ClassCreatorCommand();
        });
    }

    /**
     * Merges user's and access's configs.
     *
     * @return void
     */
    private function mergeConfig()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/config.php', 'access'
        );
    }

    /**
     * Get the services provided.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'command.access.migration',
        ];
    }
}
