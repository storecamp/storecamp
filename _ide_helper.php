<?php
/**
 * A helper file for Laravel 5, to provide autocomplete information to your IDE
 * Generated for Laravel 5.3.30 on 2017-02-21.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 * @see https://github.com/barryvdh/laravel-ide-helper
 */
namespace  {
    exit("This file should not be included, only analyzed by your IDE");
}

namespace Illuminate\Support\Facades {

    class App {
        
        /**
         * Get the version number of the application.
         *
         * @return string 
         * @static 
         */
        public static function version()
        {
            return \Illuminate\Foundation\Application::version();
        }
        
        /**
         * Run the given array of bootstrap classes.
         *
         * @param array $bootstrappers
         * @return void 
         * @static 
         */
        public static function bootstrapWith($bootstrappers)
        {
            \Illuminate\Foundation\Application::bootstrapWith($bootstrappers);
        }
        
        /**
         * Register a callback to run after loading the environment.
         *
         * @param \Closure $callback
         * @return void 
         * @static 
         */
        public static function afterLoadingEnvironment($callback)
        {
            \Illuminate\Foundation\Application::afterLoadingEnvironment($callback);
        }
        
        /**
         * Register a callback to run before a bootstrapper.
         *
         * @param string $bootstrapper
         * @param \Closure $callback
         * @return void 
         * @static 
         */
        public static function beforeBootstrapping($bootstrapper, $callback)
        {
            \Illuminate\Foundation\Application::beforeBootstrapping($bootstrapper, $callback);
        }
        
        /**
         * Register a callback to run after a bootstrapper.
         *
         * @param string $bootstrapper
         * @param \Closure $callback
         * @return void 
         * @static 
         */
        public static function afterBootstrapping($bootstrapper, $callback)
        {
            \Illuminate\Foundation\Application::afterBootstrapping($bootstrapper, $callback);
        }
        
        /**
         * Determine if the application has been bootstrapped before.
         *
         * @return bool 
         * @static 
         */
        public static function hasBeenBootstrapped()
        {
            return \Illuminate\Foundation\Application::hasBeenBootstrapped();
        }
        
        /**
         * Set the base path for the application.
         *
         * @param string $basePath
         * @return $this 
         * @static 
         */
        public static function setBasePath($basePath)
        {
            return \Illuminate\Foundation\Application::setBasePath($basePath);
        }
        
        /**
         * Get the path to the application "app" directory.
         *
         * @return string 
         * @static 
         */
        public static function path()
        {
            return \Illuminate\Foundation\Application::path();
        }
        
        /**
         * Get the base path of the Laravel installation.
         *
         * @return string 
         * @static 
         */
        public static function basePath()
        {
            return \Illuminate\Foundation\Application::basePath();
        }
        
        /**
         * Get the path to the bootstrap directory.
         *
         * @return string 
         * @static 
         */
        public static function bootstrapPath()
        {
            return \Illuminate\Foundation\Application::bootstrapPath();
        }
        
        /**
         * Get the path to the application configuration files.
         *
         * @return string 
         * @static 
         */
        public static function configPath()
        {
            return \Illuminate\Foundation\Application::configPath();
        }
        
        /**
         * Get the path to the database directory.
         *
         * @return string 
         * @static 
         */
        public static function databasePath()
        {
            return \Illuminate\Foundation\Application::databasePath();
        }
        
        /**
         * Set the database directory.
         *
         * @param string $path
         * @return $this 
         * @static 
         */
        public static function useDatabasePath($path)
        {
            return \Illuminate\Foundation\Application::useDatabasePath($path);
        }
        
        /**
         * Get the path to the language files.
         *
         * @return string 
         * @static 
         */
        public static function langPath()
        {
            return \Illuminate\Foundation\Application::langPath();
        }
        
        /**
         * Get the path to the public / web directory.
         *
         * @return string 
         * @static 
         */
        public static function publicPath()
        {
            return \Illuminate\Foundation\Application::publicPath();
        }
        
        /**
         * Get the path to the storage directory.
         *
         * @return string 
         * @static 
         */
        public static function storagePath()
        {
            return \Illuminate\Foundation\Application::storagePath();
        }
        
        /**
         * Set the storage directory.
         *
         * @param string $path
         * @return $this 
         * @static 
         */
        public static function useStoragePath($path)
        {
            return \Illuminate\Foundation\Application::useStoragePath($path);
        }
        
        /**
         * Get the path to the resources directory.
         *
         * @return string 
         * @static 
         */
        public static function resourcePath()
        {
            return \Illuminate\Foundation\Application::resourcePath();
        }
        
        /**
         * Get the path to the environment file directory.
         *
         * @return string 
         * @static 
         */
        public static function environmentPath()
        {
            return \Illuminate\Foundation\Application::environmentPath();
        }
        
        /**
         * Set the directory for the environment file.
         *
         * @param string $path
         * @return $this 
         * @static 
         */
        public static function useEnvironmentPath($path)
        {
            return \Illuminate\Foundation\Application::useEnvironmentPath($path);
        }
        
        /**
         * Set the environment file to be loaded during bootstrapping.
         *
         * @param string $file
         * @return $this 
         * @static 
         */
        public static function loadEnvironmentFrom($file)
        {
            return \Illuminate\Foundation\Application::loadEnvironmentFrom($file);
        }
        
        /**
         * Get the environment file the application is using.
         *
         * @return string 
         * @static 
         */
        public static function environmentFile()
        {
            return \Illuminate\Foundation\Application::environmentFile();
        }
        
        /**
         * Get the fully qualified path to the environment file.
         *
         * @return string 
         * @static 
         */
        public static function environmentFilePath()
        {
            return \Illuminate\Foundation\Application::environmentFilePath();
        }
        
        /**
         * Get or check the current application environment.
         *
         * @return string|bool 
         * @static 
         */
        public static function environment()
        {
            return \Illuminate\Foundation\Application::environment();
        }
        
        /**
         * Determine if application is in local environment.
         *
         * @return bool 
         * @static 
         */
        public static function isLocal()
        {
            return \Illuminate\Foundation\Application::isLocal();
        }
        
        /**
         * Detect the application's current environment.
         *
         * @param \Closure $callback
         * @return string 
         * @static 
         */
        public static function detectEnvironment($callback)
        {
            return \Illuminate\Foundation\Application::detectEnvironment($callback);
        }
        
        /**
         * Determine if we are running in the console.
         *
         * @return bool 
         * @static 
         */
        public static function runningInConsole()
        {
            return \Illuminate\Foundation\Application::runningInConsole();
        }
        
        /**
         * Determine if we are running unit tests.
         *
         * @return bool 
         * @static 
         */
        public static function runningUnitTests()
        {
            return \Illuminate\Foundation\Application::runningUnitTests();
        }
        
        /**
         * Register all of the configured providers.
         *
         * @return void 
         * @static 
         */
        public static function registerConfiguredProviders()
        {
            \Illuminate\Foundation\Application::registerConfiguredProviders();
        }
        
        /**
         * Register a service provider with the application.
         *
         * @param \Illuminate\Support\ServiceProvider|string $provider
         * @param array $options
         * @param bool $force
         * @return \Illuminate\Support\ServiceProvider 
         * @static 
         */
        public static function register($provider, $options = array(), $force = false)
        {
            return \Illuminate\Foundation\Application::register($provider, $options, $force);
        }
        
        /**
         * Get the registered service provider instance if it exists.
         *
         * @param \Illuminate\Support\ServiceProvider|string $provider
         * @return \Illuminate\Support\ServiceProvider|null 
         * @static 
         */
        public static function getProvider($provider)
        {
            return \Illuminate\Foundation\Application::getProvider($provider);
        }
        
        /**
         * Resolve a service provider instance from the class name.
         *
         * @param string $provider
         * @return \Illuminate\Support\ServiceProvider 
         * @static 
         */
        public static function resolveProviderClass($provider)
        {
            return \Illuminate\Foundation\Application::resolveProviderClass($provider);
        }
        
        /**
         * Load and boot all of the remaining deferred providers.
         *
         * @return void 
         * @static 
         */
        public static function loadDeferredProviders()
        {
            \Illuminate\Foundation\Application::loadDeferredProviders();
        }
        
        /**
         * Load the provider for a deferred service.
         *
         * @param string $service
         * @return void 
         * @static 
         */
        public static function loadDeferredProvider($service)
        {
            \Illuminate\Foundation\Application::loadDeferredProvider($service);
        }
        
        /**
         * Register a deferred provider and service.
         *
         * @param string $provider
         * @param string $service
         * @return void 
         * @static 
         */
        public static function registerDeferredProvider($provider, $service = null)
        {
            \Illuminate\Foundation\Application::registerDeferredProvider($provider, $service);
        }
        
        /**
         * Resolve the given type from the container.
         * 
         * (Overriding Container::make)
         *
         * @param string $abstract
         * @param array $parameters
         * @return mixed 
         * @static 
         */
        public static function make($abstract, $parameters = array())
        {
            return \Illuminate\Foundation\Application::make($abstract, $parameters);
        }
        
        /**
         * Determine if the given abstract type has been bound.
         * 
         * (Overriding Container::bound)
         *
         * @param string $abstract
         * @return bool 
         * @static 
         */
        public static function bound($abstract)
        {
            return \Illuminate\Foundation\Application::bound($abstract);
        }
        
        /**
         * Determine if the application has booted.
         *
         * @return bool 
         * @static 
         */
        public static function isBooted()
        {
            return \Illuminate\Foundation\Application::isBooted();
        }
        
        /**
         * Boot the application's service providers.
         *
         * @return void 
         * @static 
         */
        public static function boot()
        {
            \Illuminate\Foundation\Application::boot();
        }
        
        /**
         * Register a new boot listener.
         *
         * @param mixed $callback
         * @return void 
         * @static 
         */
        public static function booting($callback)
        {
            \Illuminate\Foundation\Application::booting($callback);
        }
        
        /**
         * Register a new "booted" listener.
         *
         * @param mixed $callback
         * @return void 
         * @static 
         */
        public static function booted($callback)
        {
            \Illuminate\Foundation\Application::booted($callback);
        }
        
        /**
         * {@inheritdoc}
         *
         * @static 
         */
        public static function handle($request, $type = 1, $catch = true)
        {
            return \Illuminate\Foundation\Application::handle($request, $type, $catch);
        }
        
        /**
         * Determine if middleware has been disabled for the application.
         *
         * @return bool 
         * @static 
         */
        public static function shouldSkipMiddleware()
        {
            return \Illuminate\Foundation\Application::shouldSkipMiddleware();
        }
        
        /**
         * Determine if the application configuration is cached.
         *
         * @return bool 
         * @static 
         */
        public static function configurationIsCached()
        {
            return \Illuminate\Foundation\Application::configurationIsCached();
        }
        
        /**
         * Get the path to the configuration cache file.
         *
         * @return string 
         * @static 
         */
        public static function getCachedConfigPath()
        {
            return \Illuminate\Foundation\Application::getCachedConfigPath();
        }
        
        /**
         * Determine if the application routes are cached.
         *
         * @return bool 
         * @static 
         */
        public static function routesAreCached()
        {
            return \Illuminate\Foundation\Application::routesAreCached();
        }
        
        /**
         * Get the path to the routes cache file.
         *
         * @return string 
         * @static 
         */
        public static function getCachedRoutesPath()
        {
            return \Illuminate\Foundation\Application::getCachedRoutesPath();
        }
        
        /**
         * Get the path to the cached "compiled.php" file.
         *
         * @return string 
         * @static 
         */
        public static function getCachedCompilePath()
        {
            return \Illuminate\Foundation\Application::getCachedCompilePath();
        }
        
        /**
         * Get the path to the cached services.php file.
         *
         * @return string 
         * @static 
         */
        public static function getCachedServicesPath()
        {
            return \Illuminate\Foundation\Application::getCachedServicesPath();
        }
        
        /**
         * Determine if the application is currently down for maintenance.
         *
         * @return bool 
         * @static 
         */
        public static function isDownForMaintenance()
        {
            return \Illuminate\Foundation\Application::isDownForMaintenance();
        }
        
        /**
         * Throw an HttpException with the given data.
         *
         * @param int $code
         * @param string $message
         * @param array $headers
         * @return void 
         * @throws \Symfony\Component\HttpKernel\Exception\HttpException
         * @static 
         */
        public static function abort($code, $message = '', $headers = array())
        {
            \Illuminate\Foundation\Application::abort($code, $message, $headers);
        }
        
        /**
         * Register a terminating callback with the application.
         *
         * @param \Closure $callback
         * @return $this 
         * @static 
         */
        public static function terminating($callback)
        {
            return \Illuminate\Foundation\Application::terminating($callback);
        }
        
        /**
         * Terminate the application.
         *
         * @return void 
         * @static 
         */
        public static function terminate()
        {
            \Illuminate\Foundation\Application::terminate();
        }
        
        /**
         * Get the service providers that have been loaded.
         *
         * @return array 
         * @static 
         */
        public static function getLoadedProviders()
        {
            return \Illuminate\Foundation\Application::getLoadedProviders();
        }
        
        /**
         * Get the application's deferred services.
         *
         * @return array 
         * @static 
         */
        public static function getDeferredServices()
        {
            return \Illuminate\Foundation\Application::getDeferredServices();
        }
        
        /**
         * Set the application's deferred services.
         *
         * @param array $services
         * @return void 
         * @static 
         */
        public static function setDeferredServices($services)
        {
            \Illuminate\Foundation\Application::setDeferredServices($services);
        }
        
        /**
         * Add an array of services to the application's deferred services.
         *
         * @param array $services
         * @return void 
         * @static 
         */
        public static function addDeferredServices($services)
        {
            \Illuminate\Foundation\Application::addDeferredServices($services);
        }
        
        /**
         * Determine if the given service is a deferred service.
         *
         * @param string $service
         * @return bool 
         * @static 
         */
        public static function isDeferredService($service)
        {
            return \Illuminate\Foundation\Application::isDeferredService($service);
        }
        
        /**
         * Define a callback to be used to configure Monolog.
         *
         * @param callable $callback
         * @return $this 
         * @static 
         */
        public static function configureMonologUsing($callback)
        {
            return \Illuminate\Foundation\Application::configureMonologUsing($callback);
        }
        
        /**
         * Determine if the application has a custom Monolog configurator.
         *
         * @return bool 
         * @static 
         */
        public static function hasMonologConfigurator()
        {
            return \Illuminate\Foundation\Application::hasMonologConfigurator();
        }
        
        /**
         * Get the custom Monolog configurator for the application.
         *
         * @return callable 
         * @static 
         */
        public static function getMonologConfigurator()
        {
            return \Illuminate\Foundation\Application::getMonologConfigurator();
        }
        
        /**
         * Get the current application locale.
         *
         * @return string 
         * @static 
         */
        public static function getLocale()
        {
            return \Illuminate\Foundation\Application::getLocale();
        }
        
        /**
         * Set the current application locale.
         *
         * @param string $locale
         * @return void 
         * @static 
         */
        public static function setLocale($locale)
        {
            \Illuminate\Foundation\Application::setLocale($locale);
        }
        
        /**
         * Determine if application locale is the given locale.
         *
         * @param string $locale
         * @return bool 
         * @static 
         */
        public static function isLocale($locale)
        {
            return \Illuminate\Foundation\Application::isLocale($locale);
        }
        
        /**
         * Register the core class aliases in the container.
         *
         * @return void 
         * @static 
         */
        public static function registerCoreContainerAliases()
        {
            \Illuminate\Foundation\Application::registerCoreContainerAliases();
        }
        
        /**
         * Flush the container of all bindings and resolved instances.
         *
         * @return void 
         * @static 
         */
        public static function flush()
        {
            \Illuminate\Foundation\Application::flush();
        }
        
        /**
         * Get the application namespace.
         *
         * @return string 
         * @throws \RuntimeException
         * @static 
         */
        public static function getNamespace()
        {
            return \Illuminate\Foundation\Application::getNamespace();
        }
        
        /**
         * Define a contextual binding.
         *
         * @param string $concrete
         * @return \Illuminate\Contracts\Container\ContextualBindingBuilder 
         * @static 
         */
        public static function when($concrete)
        {
            //Method inherited from \Illuminate\Container\Container            
            return \Illuminate\Foundation\Application::when($concrete);
        }
        
        /**
         * Determine if the given abstract type has been resolved.
         *
         * @param string $abstract
         * @return bool 
         * @static 
         */
        public static function resolved($abstract)
        {
            //Method inherited from \Illuminate\Container\Container            
            return \Illuminate\Foundation\Application::resolved($abstract);
        }
        
        /**
         * Determine if a given string is an alias.
         *
         * @param string $name
         * @return bool 
         * @static 
         */
        public static function isAlias($name)
        {
            //Method inherited from \Illuminate\Container\Container            
            return \Illuminate\Foundation\Application::isAlias($name);
        }
        
        /**
         * Register a binding with the container.
         *
         * @param string|array $abstract
         * @param \Closure|string|null $concrete
         * @param bool $shared
         * @return void 
         * @static 
         */
        public static function bind($abstract, $concrete = null, $shared = false)
        {
            //Method inherited from \Illuminate\Container\Container            
            \Illuminate\Foundation\Application::bind($abstract, $concrete, $shared);
        }
        
        /**
         * Add a contextual binding to the container.
         *
         * @param string $concrete
         * @param string $abstract
         * @param \Closure|string $implementation
         * @return void 
         * @static 
         */
        public static function addContextualBinding($concrete, $abstract, $implementation)
        {
            //Method inherited from \Illuminate\Container\Container            
            \Illuminate\Foundation\Application::addContextualBinding($concrete, $abstract, $implementation);
        }
        
        /**
         * Register a binding if it hasn't already been registered.
         *
         * @param string $abstract
         * @param \Closure|string|null $concrete
         * @param bool $shared
         * @return void 
         * @static 
         */
        public static function bindIf($abstract, $concrete = null, $shared = false)
        {
            //Method inherited from \Illuminate\Container\Container            
            \Illuminate\Foundation\Application::bindIf($abstract, $concrete, $shared);
        }
        
        /**
         * Register a shared binding in the container.
         *
         * @param string|array $abstract
         * @param \Closure|string|null $concrete
         * @return void 
         * @static 
         */
        public static function singleton($abstract, $concrete = null)
        {
            //Method inherited from \Illuminate\Container\Container            
            \Illuminate\Foundation\Application::singleton($abstract, $concrete);
        }
        
        /**
         * Wrap a Closure such that it is shared.
         *
         * @param \Closure $closure
         * @return \Closure 
         * @static 
         */
        public static function share($closure)
        {
            //Method inherited from \Illuminate\Container\Container            
            return \Illuminate\Foundation\Application::share($closure);
        }
        
        /**
         * "Extend" an abstract type in the container.
         *
         * @param string $abstract
         * @param \Closure $closure
         * @return void 
         * @throws \InvalidArgumentException
         * @static 
         */
        public static function extend($abstract, $closure)
        {
            //Method inherited from \Illuminate\Container\Container            
            \Illuminate\Foundation\Application::extend($abstract, $closure);
        }
        
        /**
         * Register an existing instance as shared in the container.
         *
         * @param string $abstract
         * @param mixed $instance
         * @return void 
         * @static 
         */
        public static function instance($abstract, $instance)
        {
            //Method inherited from \Illuminate\Container\Container            
            \Illuminate\Foundation\Application::instance($abstract, $instance);
        }
        
        /**
         * Assign a set of tags to a given binding.
         *
         * @param array|string $abstracts
         * @param array|mixed $tags
         * @return void 
         * @static 
         */
        public static function tag($abstracts, $tags)
        {
            //Method inherited from \Illuminate\Container\Container            
            \Illuminate\Foundation\Application::tag($abstracts, $tags);
        }
        
        /**
         * Resolve all of the bindings for a given tag.
         *
         * @param string $tag
         * @return array 
         * @static 
         */
        public static function tagged($tag)
        {
            //Method inherited from \Illuminate\Container\Container            
            return \Illuminate\Foundation\Application::tagged($tag);
        }
        
        /**
         * Alias a type to a different name.
         *
         * @param string $abstract
         * @param string $alias
         * @return void 
         * @static 
         */
        public static function alias($abstract, $alias)
        {
            //Method inherited from \Illuminate\Container\Container            
            \Illuminate\Foundation\Application::alias($abstract, $alias);
        }
        
        /**
         * Bind a new callback to an abstract's rebind event.
         *
         * @param string $abstract
         * @param \Closure $callback
         * @return mixed 
         * @static 
         */
        public static function rebinding($abstract, $callback)
        {
            //Method inherited from \Illuminate\Container\Container            
            return \Illuminate\Foundation\Application::rebinding($abstract, $callback);
        }
        
        /**
         * Refresh an instance on the given target and method.
         *
         * @param string $abstract
         * @param mixed $target
         * @param string $method
         * @return mixed 
         * @static 
         */
        public static function refresh($abstract, $target, $method)
        {
            //Method inherited from \Illuminate\Container\Container            
            return \Illuminate\Foundation\Application::refresh($abstract, $target, $method);
        }
        
        /**
         * Wrap the given closure such that its dependencies will be injected when executed.
         *
         * @param \Closure $callback
         * @param array $parameters
         * @return \Closure 
         * @static 
         */
        public static function wrap($callback, $parameters = array())
        {
            //Method inherited from \Illuminate\Container\Container            
            return \Illuminate\Foundation\Application::wrap($callback, $parameters);
        }
        
        /**
         * Call the given Closure / class@method and inject its dependencies.
         *
         * @param callable|string $callback
         * @param array $parameters
         * @param string|null $defaultMethod
         * @return mixed 
         * @static 
         */
        public static function call($callback, $parameters = array(), $defaultMethod = null)
        {
            //Method inherited from \Illuminate\Container\Container            
            return \Illuminate\Foundation\Application::call($callback, $parameters, $defaultMethod);
        }
        
        /**
         * Get a closure to resolve the given type from the container.
         *
         * @param string $abstract
         * @param array $defaults
         * @return \Closure 
         * @static 
         */
        public static function factory($abstract, $defaults = array())
        {
            //Method inherited from \Illuminate\Container\Container            
            return \Illuminate\Foundation\Application::factory($abstract, $defaults);
        }
        
        /**
         * Instantiate a concrete instance of the given type.
         *
         * @param string $concrete
         * @param array $parameters
         * @return mixed 
         * @throws \Illuminate\Contracts\Container\BindingResolutionException
         * @static 
         */
        public static function build($concrete, $parameters = array())
        {
            //Method inherited from \Illuminate\Container\Container            
            return \Illuminate\Foundation\Application::build($concrete, $parameters);
        }
        
        /**
         * Register a new resolving callback.
         *
         * @param string $abstract
         * @param \Closure|null $callback
         * @return void 
         * @static 
         */
        public static function resolving($abstract, $callback = null)
        {
            //Method inherited from \Illuminate\Container\Container            
            \Illuminate\Foundation\Application::resolving($abstract, $callback);
        }
        
        /**
         * Register a new after resolving callback for all types.
         *
         * @param string $abstract
         * @param \Closure|null $callback
         * @return void 
         * @static 
         */
        public static function afterResolving($abstract, $callback = null)
        {
            //Method inherited from \Illuminate\Container\Container            
            \Illuminate\Foundation\Application::afterResolving($abstract, $callback);
        }
        
        /**
         * Determine if a given type is shared.
         *
         * @param string $abstract
         * @return bool 
         * @static 
         */
        public static function isShared($abstract)
        {
            //Method inherited from \Illuminate\Container\Container            
            return \Illuminate\Foundation\Application::isShared($abstract);
        }
        
        /**
         * Get the alias for an abstract if available.
         *
         * @param string $abstract
         * @return string 
         * @throws \LogicException
         * @static 
         */
        public static function getAlias($abstract)
        {
            //Method inherited from \Illuminate\Container\Container            
            return \Illuminate\Foundation\Application::getAlias($abstract);
        }
        
        /**
         * Get the container's bindings.
         *
         * @return array 
         * @static 
         */
        public static function getBindings()
        {
            //Method inherited from \Illuminate\Container\Container            
            return \Illuminate\Foundation\Application::getBindings();
        }
        
        /**
         * Remove a resolved instance from the instance cache.
         *
         * @param string $abstract
         * @return void 
         * @static 
         */
        public static function forgetInstance($abstract)
        {
            //Method inherited from \Illuminate\Container\Container            
            \Illuminate\Foundation\Application::forgetInstance($abstract);
        }
        
        /**
         * Clear all of the instances from the container.
         *
         * @return void 
         * @static 
         */
        public static function forgetInstances()
        {
            //Method inherited from \Illuminate\Container\Container            
            \Illuminate\Foundation\Application::forgetInstances();
        }
        
        /**
         * Set the globally available instance of the container.
         *
         * @return static 
         * @static 
         */
        public static function getInstance()
        {
            //Method inherited from \Illuminate\Container\Container            
            return \Illuminate\Foundation\Application::getInstance();
        }
        
        /**
         * Set the shared instance of the container.
         *
         * @param \Illuminate\Contracts\Container\Container|null $container
         * @return static 
         * @static 
         */
        public static function setInstance($container = null)
        {
            //Method inherited from \Illuminate\Container\Container            
            return \Illuminate\Foundation\Application::setInstance($container);
        }
        
        /**
         * Determine if a given offset exists.
         *
         * @param string $key
         * @return bool 
         * @static 
         */
        public static function offsetExists($key)
        {
            //Method inherited from \Illuminate\Container\Container            
            return \Illuminate\Foundation\Application::offsetExists($key);
        }
        
        /**
         * Get the value at a given offset.
         *
         * @param string $key
         * @return mixed 
         * @static 
         */
        public static function offsetGet($key)
        {
            //Method inherited from \Illuminate\Container\Container            
            return \Illuminate\Foundation\Application::offsetGet($key);
        }
        
        /**
         * Set the value at a given offset.
         *
         * @param string $key
         * @param mixed $value
         * @return void 
         * @static 
         */
        public static function offsetSet($key, $value)
        {
            //Method inherited from \Illuminate\Container\Container            
            \Illuminate\Foundation\Application::offsetSet($key, $value);
        }
        
        /**
         * Unset the value at a given offset.
         *
         * @param string $key
         * @return void 
         * @static 
         */
        public static function offsetUnset($key)
        {
            //Method inherited from \Illuminate\Container\Container            
            \Illuminate\Foundation\Application::offsetUnset($key);
        }
        
    }         

    class Artisan {
        
        /**
         * Run the console application.
         *
         * @param \Symfony\Component\Console\Input\InputInterface $input
         * @param \Symfony\Component\Console\Output\OutputInterface $output
         * @return int 
         * @static 
         */
        public static function handle($input, $output = null)
        {
            //Method inherited from \Illuminate\Foundation\Console\Kernel            
            return \App\Console\Kernel::handle($input, $output);
        }
        
        /**
         * Terminate the application.
         *
         * @param \Symfony\Component\Console\Input\InputInterface $input
         * @param int $status
         * @return void 
         * @static 
         */
        public static function terminate($input, $status)
        {
            //Method inherited from \Illuminate\Foundation\Console\Kernel            
            \App\Console\Kernel::terminate($input, $status);
        }
        
        /**
         * Register a Closure based command with the application.
         *
         * @param string $signature
         * @param \Closure $callback
         * @return \Illuminate\Foundation\Console\ClosureCommand 
         * @static 
         */
        public static function command($signature, $callback)
        {
            //Method inherited from \Illuminate\Foundation\Console\Kernel            
            return \App\Console\Kernel::command($signature, $callback);
        }
        
        /**
         * Register the given command with the console application.
         *
         * @param \Symfony\Component\Console\Command\Command $command
         * @return void 
         * @static 
         */
        public static function registerCommand($command)
        {
            //Method inherited from \Illuminate\Foundation\Console\Kernel            
            \App\Console\Kernel::registerCommand($command);
        }
        
        /**
         * Run an Artisan console command by name.
         *
         * @param string $command
         * @param array $parameters
         * @return int 
         * @static 
         */
        public static function call($command, $parameters = array())
        {
            //Method inherited from \Illuminate\Foundation\Console\Kernel            
            return \App\Console\Kernel::call($command, $parameters);
        }
        
        /**
         * Queue the given console command.
         *
         * @param string $command
         * @param array $parameters
         * @return void 
         * @static 
         */
        public static function queue($command, $parameters = array())
        {
            //Method inherited from \Illuminate\Foundation\Console\Kernel            
            \App\Console\Kernel::queue($command, $parameters);
        }
        
        /**
         * Get all of the commands registered with the console.
         *
         * @return array 
         * @static 
         */
        public static function all()
        {
            //Method inherited from \Illuminate\Foundation\Console\Kernel            
            return \App\Console\Kernel::all();
        }
        
        /**
         * Get the output for the last run command.
         *
         * @return string 
         * @static 
         */
        public static function output()
        {
            //Method inherited from \Illuminate\Foundation\Console\Kernel            
            return \App\Console\Kernel::output();
        }
        
        /**
         * Bootstrap the application for artisan commands.
         *
         * @return void 
         * @static 
         */
        public static function bootstrap()
        {
            //Method inherited from \Illuminate\Foundation\Console\Kernel            
            \App\Console\Kernel::bootstrap();
        }
        
        /**
         * Set the Artisan application instance.
         *
         * @param \Illuminate\Console\Application $artisan
         * @return void 
         * @static 
         */
        public static function setArtisan($artisan)
        {
            //Method inherited from \Illuminate\Foundation\Console\Kernel            
            \App\Console\Kernel::setArtisan($artisan);
        }
        
    }         

    class Auth {
        
        /**
         * Attempt to get the guard from the local cache.
         *
         * @param string $name
         * @return \Illuminate\Contracts\Auth\Guard|\Illuminate\Contracts\Auth\StatefulGuard 
         * @static 
         */
        public static function guard($name = null)
        {
            return \Illuminate\Auth\AuthManager::guard($name);
        }
        
        /**
         * Create a session based authentication guard.
         *
         * @param string $name
         * @param array $config
         * @return \Illuminate\Auth\SessionGuard 
         * @static 
         */
        public static function createSessionDriver($name, $config)
        {
            return \Illuminate\Auth\AuthManager::createSessionDriver($name, $config);
        }
        
        /**
         * Create a token based authentication guard.
         *
         * @param string $name
         * @param array $config
         * @return \Illuminate\Auth\TokenGuard 
         * @static 
         */
        public static function createTokenDriver($name, $config)
        {
            return \Illuminate\Auth\AuthManager::createTokenDriver($name, $config);
        }
        
        /**
         * Get the default authentication driver name.
         *
         * @return string 
         * @static 
         */
        public static function getDefaultDriver()
        {
            return \Illuminate\Auth\AuthManager::getDefaultDriver();
        }
        
        /**
         * Set the default guard driver the factory should serve.
         *
         * @param string $name
         * @return void 
         * @static 
         */
        public static function shouldUse($name)
        {
            \Illuminate\Auth\AuthManager::shouldUse($name);
        }
        
        /**
         * Set the default authentication driver name.
         *
         * @param string $name
         * @return void 
         * @static 
         */
        public static function setDefaultDriver($name)
        {
            \Illuminate\Auth\AuthManager::setDefaultDriver($name);
        }
        
        /**
         * Register a new callback based request guard.
         *
         * @param string $driver
         * @param callable $callback
         * @return $this 
         * @static 
         */
        public static function viaRequest($driver, $callback)
        {
            return \Illuminate\Auth\AuthManager::viaRequest($driver, $callback);
        }
        
        /**
         * Get the user resolver callback.
         *
         * @return \Closure 
         * @static 
         */
        public static function userResolver()
        {
            return \Illuminate\Auth\AuthManager::userResolver();
        }
        
        /**
         * Set the callback to be used to resolve users.
         *
         * @param \Closure $userResolver
         * @return $this 
         * @static 
         */
        public static function resolveUsersUsing($userResolver)
        {
            return \Illuminate\Auth\AuthManager::resolveUsersUsing($userResolver);
        }
        
        /**
         * Register a custom driver creator Closure.
         *
         * @param string $driver
         * @param \Closure $callback
         * @return $this 
         * @static 
         */
        public static function extend($driver, $callback)
        {
            return \Illuminate\Auth\AuthManager::extend($driver, $callback);
        }
        
        /**
         * Register a custom provider creator Closure.
         *
         * @param string $name
         * @param \Closure $callback
         * @return $this 
         * @static 
         */
        public static function provider($name, $callback)
        {
            return \Illuminate\Auth\AuthManager::provider($name, $callback);
        }
        
        /**
         * Create the user provider implementation for the driver.
         *
         * @param string $provider
         * @return \Illuminate\Contracts\Auth\UserProvider 
         * @throws \InvalidArgumentException
         * @static 
         */
        public static function createUserProvider($provider)
        {
            return \Illuminate\Auth\AuthManager::createUserProvider($provider);
        }
        
        /**
         * Get the currently authenticated user.
         *
         * @return \App\Core\Models\User|null 
         * @static 
         */
        public static function user()
        {
            return \Illuminate\Auth\SessionGuard::user();
        }
        
        /**
         * Get the ID for the currently authenticated user.
         *
         * @return int|null 
         * @static 
         */
        public static function id()
        {
            return \Illuminate\Auth\SessionGuard::id();
        }
        
        /**
         * Log a user into the application without sessions or cookies.
         *
         * @param array $credentials
         * @return bool 
         * @static 
         */
        public static function once($credentials = array())
        {
            return \Illuminate\Auth\SessionGuard::once($credentials);
        }
        
        /**
         * Validate a user's credentials.
         *
         * @param array $credentials
         * @return bool 
         * @static 
         */
        public static function validate($credentials = array())
        {
            return \Illuminate\Auth\SessionGuard::validate($credentials);
        }
        
        /**
         * Attempt to authenticate using HTTP Basic Auth.
         *
         * @param string $field
         * @param array $extraConditions
         * @return \Symfony\Component\HttpFoundation\Response|null 
         * @static 
         */
        public static function basic($field = 'email', $extraConditions = array())
        {
            return \Illuminate\Auth\SessionGuard::basic($field, $extraConditions);
        }
        
        /**
         * Perform a stateless HTTP Basic login attempt.
         *
         * @param string $field
         * @param array $extraConditions
         * @return \Symfony\Component\HttpFoundation\Response|null 
         * @static 
         */
        public static function onceBasic($field = 'email', $extraConditions = array())
        {
            return \Illuminate\Auth\SessionGuard::onceBasic($field, $extraConditions);
        }
        
        /**
         * Attempt to authenticate a user using the given credentials.
         *
         * @param array $credentials
         * @param bool $remember
         * @param bool $login
         * @return bool 
         * @static 
         */
        public static function attempt($credentials = array(), $remember = false, $login = true)
        {
            return \Illuminate\Auth\SessionGuard::attempt($credentials, $remember, $login);
        }
        
        /**
         * Register an authentication attempt event listener.
         *
         * @param mixed $callback
         * @return void 
         * @static 
         */
        public static function attempting($callback)
        {
            \Illuminate\Auth\SessionGuard::attempting($callback);
        }
        
        /**
         * Log a user into the application.
         *
         * @param \Illuminate\Contracts\Auth\Authenticatable $user
         * @param bool $remember
         * @return void 
         * @static 
         */
        public static function login($user, $remember = false)
        {
            \Illuminate\Auth\SessionGuard::login($user, $remember);
        }
        
        /**
         * Log the given user ID into the application.
         *
         * @param mixed $id
         * @param bool $remember
         * @return \App\Core\Models\User|false 
         * @static 
         */
        public static function loginUsingId($id, $remember = false)
        {
            return \Illuminate\Auth\SessionGuard::loginUsingId($id, $remember);
        }
        
        /**
         * Log the given user ID into the application without sessions or cookies.
         *
         * @param mixed $id
         * @return \App\Core\Models\User|false 
         * @static 
         */
        public static function onceUsingId($id)
        {
            return \Illuminate\Auth\SessionGuard::onceUsingId($id);
        }
        
        /**
         * Log the user out of the application.
         *
         * @return void 
         * @static 
         */
        public static function logout()
        {
            \Illuminate\Auth\SessionGuard::logout();
        }
        
        /**
         * Get the cookie creator instance used by the guard.
         *
         * @return \Illuminate\Contracts\Cookie\QueueingFactory 
         * @throws \RuntimeException
         * @static 
         */
        public static function getCookieJar()
        {
            return \Illuminate\Auth\SessionGuard::getCookieJar();
        }
        
        /**
         * Set the cookie creator instance used by the guard.
         *
         * @param \Illuminate\Contracts\Cookie\QueueingFactory $cookie
         * @return void 
         * @static 
         */
        public static function setCookieJar($cookie)
        {
            \Illuminate\Auth\SessionGuard::setCookieJar($cookie);
        }
        
        /**
         * Get the event dispatcher instance.
         *
         * @return \Illuminate\Contracts\Events\Dispatcher 
         * @static 
         */
        public static function getDispatcher()
        {
            return \Illuminate\Auth\SessionGuard::getDispatcher();
        }
        
        /**
         * Set the event dispatcher instance.
         *
         * @param \Illuminate\Contracts\Events\Dispatcher $events
         * @return void 
         * @static 
         */
        public static function setDispatcher($events)
        {
            \Illuminate\Auth\SessionGuard::setDispatcher($events);
        }
        
        /**
         * Get the session store used by the guard.
         *
         * @return \Illuminate\Session\Store 
         * @static 
         */
        public static function getSession()
        {
            return \Illuminate\Auth\SessionGuard::getSession();
        }
        
        /**
         * Get the user provider used by the guard.
         *
         * @return \Illuminate\Contracts\Auth\UserProvider 
         * @static 
         */
        public static function getProvider()
        {
            return \Illuminate\Auth\SessionGuard::getProvider();
        }
        
        /**
         * Set the user provider used by the guard.
         *
         * @param \Illuminate\Contracts\Auth\UserProvider $provider
         * @return void 
         * @static 
         */
        public static function setProvider($provider)
        {
            \Illuminate\Auth\SessionGuard::setProvider($provider);
        }
        
        /**
         * Return the currently cached user.
         *
         * @return \App\Core\Models\User|null 
         * @static 
         */
        public static function getUser()
        {
            return \Illuminate\Auth\SessionGuard::getUser();
        }
        
        /**
         * Set the current user.
         *
         * @param \Illuminate\Contracts\Auth\Authenticatable $user
         * @return $this 
         * @static 
         */
        public static function setUser($user)
        {
            return \Illuminate\Auth\SessionGuard::setUser($user);
        }
        
        /**
         * Get the current request instance.
         *
         * @return \Symfony\Component\HttpFoundation\Request 
         * @static 
         */
        public static function getRequest()
        {
            return \Illuminate\Auth\SessionGuard::getRequest();
        }
        
        /**
         * Set the current request instance.
         *
         * @param \Symfony\Component\HttpFoundation\Request $request
         * @return $this 
         * @static 
         */
        public static function setRequest($request)
        {
            return \Illuminate\Auth\SessionGuard::setRequest($request);
        }
        
        /**
         * Get the last user we attempted to authenticate.
         *
         * @return \App\Core\Models\User 
         * @static 
         */
        public static function getLastAttempted()
        {
            return \Illuminate\Auth\SessionGuard::getLastAttempted();
        }
        
        /**
         * Get a unique identifier for the auth session value.
         *
         * @return string 
         * @static 
         */
        public static function getName()
        {
            return \Illuminate\Auth\SessionGuard::getName();
        }
        
        /**
         * Get the name of the cookie used to store the "recaller".
         *
         * @return string 
         * @static 
         */
        public static function getRecallerName()
        {
            return \Illuminate\Auth\SessionGuard::getRecallerName();
        }
        
        /**
         * Determine if the user was authenticated via "remember me" cookie.
         *
         * @return bool 
         * @static 
         */
        public static function viaRemember()
        {
            return \Illuminate\Auth\SessionGuard::viaRemember();
        }
        
        /**
         * Determine if the current user is authenticated.
         *
         * @return \App\Core\Models\User 
         * @throws \Illuminate\Auth\AuthenticationException
         * @static 
         */
        public static function authenticate()
        {
            return \Illuminate\Auth\SessionGuard::authenticate();
        }
        
        /**
         * Determine if the current user is authenticated.
         *
         * @return bool 
         * @static 
         */
        public static function check()
        {
            return \Illuminate\Auth\SessionGuard::check();
        }
        
        /**
         * Determine if the current user is a guest.
         *
         * @return bool 
         * @static 
         */
        public static function guest()
        {
            return \Illuminate\Auth\SessionGuard::guest();
        }
        
    }         

    class Blade {
        
        /**
         * Compile the view at the given path.
         *
         * @param string $path
         * @return void 
         * @static 
         */
        public static function compile($path = null)
        {
            \Illuminate\View\Compilers\BladeCompiler::compile($path);
        }
        
        /**
         * Get the path currently being compiled.
         *
         * @return string 
         * @static 
         */
        public static function getPath()
        {
            return \Illuminate\View\Compilers\BladeCompiler::getPath();
        }
        
        /**
         * Set the path currently being compiled.
         *
         * @param string $path
         * @return void 
         * @static 
         */
        public static function setPath($path)
        {
            \Illuminate\View\Compilers\BladeCompiler::setPath($path);
        }
        
        /**
         * Compile the given Blade template contents.
         *
         * @param string $value
         * @return string 
         * @static 
         */
        public static function compileString($value)
        {
            return \Illuminate\View\Compilers\BladeCompiler::compileString($value);
        }
        
        /**
         * Compile the default values for the echo statement.
         *
         * @param string $value
         * @return string 
         * @static 
         */
        public static function compileEchoDefaults($value)
        {
            return \Illuminate\View\Compilers\BladeCompiler::compileEchoDefaults($value);
        }
        
        /**
         * Strip the parentheses from the given expression.
         *
         * @param string $expression
         * @return string 
         * @static 
         */
        public static function stripParentheses($expression)
        {
            return \Illuminate\View\Compilers\BladeCompiler::stripParentheses($expression);
        }
        
        /**
         * Get the extensions used by the compiler.
         *
         * @return array 
         * @static 
         */
        public static function getExtensions()
        {
            return \Illuminate\View\Compilers\BladeCompiler::getExtensions();
        }
        
        /**
         * Register a custom Blade compiler.
         *
         * @param callable $compiler
         * @return void 
         * @static 
         */
        public static function extend($compiler)
        {
            \Illuminate\View\Compilers\BladeCompiler::extend($compiler);
        }
        
        /**
         * Register a handler for custom directives.
         *
         * @param string $name
         * @param callable $handler
         * @return void 
         * @static 
         */
        public static function directive($name, $handler)
        {
            \Illuminate\View\Compilers\BladeCompiler::directive($name, $handler);
        }
        
        /**
         * Get the list of custom directives.
         *
         * @return array 
         * @static 
         */
        public static function getCustomDirectives()
        {
            return \Illuminate\View\Compilers\BladeCompiler::getCustomDirectives();
        }
        
        /**
         * Gets the raw tags used by the compiler.
         *
         * @return array 
         * @static 
         */
        public static function getRawTags()
        {
            return \Illuminate\View\Compilers\BladeCompiler::getRawTags();
        }
        
        /**
         * Sets the raw tags used for the compiler.
         *
         * @param string $openTag
         * @param string $closeTag
         * @return void 
         * @static 
         */
        public static function setRawTags($openTag, $closeTag)
        {
            \Illuminate\View\Compilers\BladeCompiler::setRawTags($openTag, $closeTag);
        }
        
        /**
         * Sets the content tags used for the compiler.
         *
         * @param string $openTag
         * @param string $closeTag
         * @param bool $escaped
         * @return void 
         * @static 
         */
        public static function setContentTags($openTag, $closeTag, $escaped = false)
        {
            \Illuminate\View\Compilers\BladeCompiler::setContentTags($openTag, $closeTag, $escaped);
        }
        
        /**
         * Sets the escaped content tags used for the compiler.
         *
         * @param string $openTag
         * @param string $closeTag
         * @return void 
         * @static 
         */
        public static function setEscapedContentTags($openTag, $closeTag)
        {
            \Illuminate\View\Compilers\BladeCompiler::setEscapedContentTags($openTag, $closeTag);
        }
        
        /**
         * Gets the content tags used for the compiler.
         *
         * @return string 
         * @static 
         */
        public static function getContentTags()
        {
            return \Illuminate\View\Compilers\BladeCompiler::getContentTags();
        }
        
        /**
         * Gets the escaped content tags used for the compiler.
         *
         * @return string 
         * @static 
         */
        public static function getEscapedContentTags()
        {
            return \Illuminate\View\Compilers\BladeCompiler::getEscapedContentTags();
        }
        
        /**
         * Set the echo format to be used by the compiler.
         *
         * @param string $format
         * @return void 
         * @static 
         */
        public static function setEchoFormat($format)
        {
            \Illuminate\View\Compilers\BladeCompiler::setEchoFormat($format);
        }
        
        /**
         * Get the path to the compiled version of a view.
         *
         * @param string $path
         * @return string 
         * @static 
         */
        public static function getCompiledPath($path)
        {
            //Method inherited from \Illuminate\View\Compilers\Compiler            
            return \Illuminate\View\Compilers\BladeCompiler::getCompiledPath($path);
        }
        
        /**
         * Determine if the view at the given path is expired.
         *
         * @param string $path
         * @return bool 
         * @static 
         */
        public static function isExpired($path)
        {
            //Method inherited from \Illuminate\View\Compilers\Compiler            
            return \Illuminate\View\Compilers\BladeCompiler::isExpired($path);
        }
        
    }         

    class Bus {
        
        /**
         * Dispatch a command to its appropriate handler.
         *
         * @param mixed $command
         * @return mixed 
         * @static 
         */
        public static function dispatch($command)
        {
            return \Illuminate\Bus\Dispatcher::dispatch($command);
        }
        
        /**
         * Dispatch a command to its appropriate handler in the current process.
         *
         * @param mixed $command
         * @param mixed $handler
         * @return mixed 
         * @static 
         */
        public static function dispatchNow($command, $handler = null)
        {
            return \Illuminate\Bus\Dispatcher::dispatchNow($command, $handler);
        }
        
        /**
         * Determine if the given command has a handler.
         *
         * @param mixed $command
         * @return bool 
         * @static 
         */
        public static function hasCommandHandler($command)
        {
            return \Illuminate\Bus\Dispatcher::hasCommandHandler($command);
        }
        
        /**
         * Retrieve the handler for a command.
         *
         * @param mixed $command
         * @return bool|mixed 
         * @static 
         */
        public static function getCommandHandler($command)
        {
            return \Illuminate\Bus\Dispatcher::getCommandHandler($command);
        }
        
        /**
         * Dispatch a command to its appropriate handler behind a queue.
         *
         * @param mixed $command
         * @return mixed 
         * @throws \RuntimeException
         * @static 
         */
        public static function dispatchToQueue($command)
        {
            return \Illuminate\Bus\Dispatcher::dispatchToQueue($command);
        }
        
        /**
         * Set the pipes through which commands should be piped before dispatching.
         *
         * @param array $pipes
         * @return $this 
         * @static 
         */
        public static function pipeThrough($pipes)
        {
            return \Illuminate\Bus\Dispatcher::pipeThrough($pipes);
        }
        
        /**
         * Map a command to a handler.
         *
         * @param array $map
         * @return $this 
         * @static 
         */
        public static function map($map)
        {
            return \Illuminate\Bus\Dispatcher::map($map);
        }
        
    }         

    class Cache {
        
        /**
         * Get a cache store instance by name.
         *
         * @param string|null $name
         * @return mixed 
         * @static 
         */
        public static function store($name = null)
        {
            return \Illuminate\Cache\CacheManager::store($name);
        }
        
        /**
         * Get a cache driver instance.
         *
         * @param string $driver
         * @return mixed 
         * @static 
         */
        public static function driver($driver = null)
        {
            return \Illuminate\Cache\CacheManager::driver($driver);
        }
        
        /**
         * Create a new cache repository with the given implementation.
         *
         * @param \Illuminate\Contracts\Cache\Store $store
         * @return \Illuminate\Cache\Repository 
         * @static 
         */
        public static function repository($store)
        {
            return \Illuminate\Cache\CacheManager::repository($store);
        }
        
        /**
         * Get the default cache driver name.
         *
         * @return string 
         * @static 
         */
        public static function getDefaultDriver()
        {
            return \Illuminate\Cache\CacheManager::getDefaultDriver();
        }
        
        /**
         * Set the default cache driver name.
         *
         * @param string $name
         * @return void 
         * @static 
         */
        public static function setDefaultDriver($name)
        {
            \Illuminate\Cache\CacheManager::setDefaultDriver($name);
        }
        
        /**
         * Register a custom driver creator Closure.
         *
         * @param string $driver
         * @param \Closure $callback
         * @return $this 
         * @static 
         */
        public static function extend($driver, $callback)
        {
            return \Illuminate\Cache\CacheManager::extend($driver, $callback);
        }
        
        /**
         * Set the event dispatcher instance.
         *
         * @param \Illuminate\Contracts\Events\Dispatcher $events
         * @return void 
         * @static 
         */
        public static function setEventDispatcher($events)
        {
            \Illuminate\Cache\Repository::setEventDispatcher($events);
        }
        
        /**
         * Determine if an item exists in the cache.
         *
         * @param string $key
         * @return bool 
         * @static 
         */
        public static function has($key)
        {
            return \Illuminate\Cache\Repository::has($key);
        }
        
        /**
         * Retrieve an item from the cache by key.
         *
         * @param string $key
         * @param mixed $default
         * @return mixed 
         * @static 
         */
        public static function get($key, $default = null)
        {
            return \Illuminate\Cache\Repository::get($key, $default);
        }
        
        /**
         * Retrieve multiple items from the cache by key.
         * 
         * Items not found in the cache will have a null value.
         *
         * @param array $keys
         * @return array 
         * @static 
         */
        public static function many($keys)
        {
            return \Illuminate\Cache\Repository::many($keys);
        }
        
        /**
         * Retrieve an item from the cache and delete it.
         *
         * @param string $key
         * @param mixed $default
         * @return mixed 
         * @static 
         */
        public static function pull($key, $default = null)
        {
            return \Illuminate\Cache\Repository::pull($key, $default);
        }
        
        /**
         * Store an item in the cache.
         *
         * @param string $key
         * @param mixed $value
         * @param \DateTime|float|int $minutes
         * @return void 
         * @static 
         */
        public static function put($key, $value, $minutes = null)
        {
            \Illuminate\Cache\Repository::put($key, $value, $minutes);
        }
        
        /**
         * Store multiple items in the cache for a given number of minutes.
         *
         * @param array $values
         * @param float|int $minutes
         * @return void 
         * @static 
         */
        public static function putMany($values, $minutes)
        {
            \Illuminate\Cache\Repository::putMany($values, $minutes);
        }
        
        /**
         * Store an item in the cache if the key does not exist.
         *
         * @param string $key
         * @param mixed $value
         * @param \DateTime|float|int $minutes
         * @return bool 
         * @static 
         */
        public static function add($key, $value, $minutes)
        {
            return \Illuminate\Cache\Repository::add($key, $value, $minutes);
        }
        
        /**
         * Increment the value of an item in the cache.
         *
         * @param string $key
         * @param mixed $value
         * @return int|bool 
         * @static 
         */
        public static function increment($key, $value = 1)
        {
            return \Illuminate\Cache\Repository::increment($key, $value);
        }
        
        /**
         * Decrement the value of an item in the cache.
         *
         * @param string $key
         * @param mixed $value
         * @return int|bool 
         * @static 
         */
        public static function decrement($key, $value = 1)
        {
            return \Illuminate\Cache\Repository::decrement($key, $value);
        }
        
        /**
         * Store an item in the cache indefinitely.
         *
         * @param string $key
         * @param mixed $value
         * @return void 
         * @static 
         */
        public static function forever($key, $value)
        {
            \Illuminate\Cache\Repository::forever($key, $value);
        }
        
        /**
         * Get an item from the cache, or store the default value.
         *
         * @param string $key
         * @param \DateTime|float|int $minutes
         * @param \Closure $callback
         * @return mixed 
         * @static 
         */
        public static function remember($key, $minutes, $callback)
        {
            return \Illuminate\Cache\Repository::remember($key, $minutes, $callback);
        }
        
        /**
         * Get an item from the cache, or store the default value forever.
         *
         * @param string $key
         * @param \Closure $callback
         * @return mixed 
         * @static 
         */
        public static function sear($key, $callback)
        {
            return \Illuminate\Cache\Repository::sear($key, $callback);
        }
        
        /**
         * Get an item from the cache, or store the default value forever.
         *
         * @param string $key
         * @param \Closure $callback
         * @return mixed 
         * @static 
         */
        public static function rememberForever($key, $callback)
        {
            return \Illuminate\Cache\Repository::rememberForever($key, $callback);
        }
        
        /**
         * Remove an item from the cache.
         *
         * @param string $key
         * @return bool 
         * @static 
         */
        public static function forget($key)
        {
            return \Illuminate\Cache\Repository::forget($key);
        }
        
        /**
         * Begin executing a new tags operation if the store supports it.
         *
         * @param array|mixed $names
         * @return \Illuminate\Cache\TaggedCache 
         * @throws \BadMethodCallException
         * @static 
         */
        public static function tags($names)
        {
            return \Illuminate\Cache\Repository::tags($names);
        }
        
        /**
         * Get the default cache time.
         *
         * @return float|int 
         * @static 
         */
        public static function getDefaultCacheTime()
        {
            return \Illuminate\Cache\Repository::getDefaultCacheTime();
        }
        
        /**
         * Set the default cache time in minutes.
         *
         * @param float|int $minutes
         * @return void 
         * @static 
         */
        public static function setDefaultCacheTime($minutes)
        {
            \Illuminate\Cache\Repository::setDefaultCacheTime($minutes);
        }
        
        /**
         * Get the cache store implementation.
         *
         * @return \Illuminate\Contracts\Cache\Store 
         * @static 
         */
        public static function getStore()
        {
            return \Illuminate\Cache\Repository::getStore();
        }
        
        /**
         * Determine if a cached value exists.
         *
         * @param string $key
         * @return bool 
         * @static 
         */
        public static function offsetExists($key)
        {
            return \Illuminate\Cache\Repository::offsetExists($key);
        }
        
        /**
         * Retrieve an item from the cache by key.
         *
         * @param string $key
         * @return mixed 
         * @static 
         */
        public static function offsetGet($key)
        {
            return \Illuminate\Cache\Repository::offsetGet($key);
        }
        
        /**
         * Store an item in the cache for the default time.
         *
         * @param string $key
         * @param mixed $value
         * @return void 
         * @static 
         */
        public static function offsetSet($key, $value)
        {
            \Illuminate\Cache\Repository::offsetSet($key, $value);
        }
        
        /**
         * Remove an item from the cache.
         *
         * @param string $key
         * @return void 
         * @static 
         */
        public static function offsetUnset($key)
        {
            \Illuminate\Cache\Repository::offsetUnset($key);
        }
        
        /**
         * Register a custom macro.
         *
         * @param string $name
         * @param callable $macro
         * @return void 
         * @static 
         */
        public static function macro($name, $macro)
        {
            \Illuminate\Cache\Repository::macro($name, $macro);
        }
        
        /**
         * Checks if macro is registered.
         *
         * @param string $name
         * @return bool 
         * @static 
         */
        public static function hasMacro($name)
        {
            return \Illuminate\Cache\Repository::hasMacro($name);
        }
        
        /**
         * Dynamically handle calls to the class.
         *
         * @param string $method
         * @param array $parameters
         * @return mixed 
         * @throws \BadMethodCallException
         * @static 
         */
        public static function macroCall($method, $parameters)
        {
            return \Illuminate\Cache\Repository::macroCall($method, $parameters);
        }
        
        /**
         * Remove all items from the cache.
         *
         * @return void 
         * @static 
         */
        public static function flush()
        {
            \Illuminate\Cache\FileStore::flush();
        }
        
        /**
         * Get the Filesystem instance.
         *
         * @return \Illuminate\Filesystem\Filesystem 
         * @static 
         */
        public static function getFilesystem()
        {
            return \Illuminate\Cache\FileStore::getFilesystem();
        }
        
        /**
         * Get the working directory of the cache.
         *
         * @return string 
         * @static 
         */
        public static function getDirectory()
        {
            return \Illuminate\Cache\FileStore::getDirectory();
        }
        
        /**
         * Get the cache key prefix.
         *
         * @return string 
         * @static 
         */
        public static function getPrefix()
        {
            return \Illuminate\Cache\FileStore::getPrefix();
        }
        
    }         

    class Config {
        
        /**
         * Determine if the given configuration value exists.
         *
         * @param string $key
         * @return bool 
         * @static 
         */
        public static function has($key)
        {
            return \Illuminate\Config\Repository::has($key);
        }
        
        /**
         * Get the specified configuration value.
         *
         * @param string $key
         * @param mixed $default
         * @return mixed 
         * @static 
         */
        public static function get($key, $default = null)
        {
            return \Illuminate\Config\Repository::get($key, $default);
        }
        
        /**
         * Set a given configuration value.
         *
         * @param array|string $key
         * @param mixed $value
         * @return void 
         * @static 
         */
        public static function set($key, $value = null)
        {
            \Illuminate\Config\Repository::set($key, $value);
        }
        
        /**
         * Prepend a value onto an array configuration value.
         *
         * @param string $key
         * @param mixed $value
         * @return void 
         * @static 
         */
        public static function prepend($key, $value)
        {
            \Illuminate\Config\Repository::prepend($key, $value);
        }
        
        /**
         * Push a value onto an array configuration value.
         *
         * @param string $key
         * @param mixed $value
         * @return void 
         * @static 
         */
        public static function push($key, $value)
        {
            \Illuminate\Config\Repository::push($key, $value);
        }
        
        /**
         * Get all of the configuration items for the application.
         *
         * @return array 
         * @static 
         */
        public static function all()
        {
            return \Illuminate\Config\Repository::all();
        }
        
        /**
         * Determine if the given configuration option exists.
         *
         * @param string $key
         * @return bool 
         * @static 
         */
        public static function offsetExists($key)
        {
            return \Illuminate\Config\Repository::offsetExists($key);
        }
        
        /**
         * Get a configuration option.
         *
         * @param string $key
         * @return mixed 
         * @static 
         */
        public static function offsetGet($key)
        {
            return \Illuminate\Config\Repository::offsetGet($key);
        }
        
        /**
         * Set a configuration option.
         *
         * @param string $key
         * @param mixed $value
         * @return void 
         * @static 
         */
        public static function offsetSet($key, $value)
        {
            \Illuminate\Config\Repository::offsetSet($key, $value);
        }
        
        /**
         * Unset a configuration option.
         *
         * @param string $key
         * @return void 
         * @static 
         */
        public static function offsetUnset($key)
        {
            \Illuminate\Config\Repository::offsetUnset($key);
        }
        
    }         

    class Cookie {
        
        /**
         * Create a new cookie instance.
         *
         * @param string $name
         * @param string $value
         * @param int $minutes
         * @param string $path
         * @param string $domain
         * @param bool $secure
         * @param bool $httpOnly
         * @return \Symfony\Component\HttpFoundation\Cookie 
         * @static 
         */
        public static function make($name, $value, $minutes = 0, $path = null, $domain = null, $secure = false, $httpOnly = true)
        {
            return \Illuminate\Cookie\CookieJar::make($name, $value, $minutes, $path, $domain, $secure, $httpOnly);
        }
        
        /**
         * Create a cookie that lasts "forever" (five years).
         *
         * @param string $name
         * @param string $value
         * @param string $path
         * @param string $domain
         * @param bool $secure
         * @param bool $httpOnly
         * @return \Symfony\Component\HttpFoundation\Cookie 
         * @static 
         */
        public static function forever($name, $value, $path = null, $domain = null, $secure = false, $httpOnly = true)
        {
            return \Illuminate\Cookie\CookieJar::forever($name, $value, $path, $domain, $secure, $httpOnly);
        }
        
        /**
         * Expire the given cookie.
         *
         * @param string $name
         * @param string $path
         * @param string $domain
         * @return \Symfony\Component\HttpFoundation\Cookie 
         * @static 
         */
        public static function forget($name, $path = null, $domain = null)
        {
            return \Illuminate\Cookie\CookieJar::forget($name, $path, $domain);
        }
        
        /**
         * Determine if a cookie has been queued.
         *
         * @param string $key
         * @return bool 
         * @static 
         */
        public static function hasQueued($key)
        {
            return \Illuminate\Cookie\CookieJar::hasQueued($key);
        }
        
        /**
         * Get a queued cookie instance.
         *
         * @param string $key
         * @param mixed $default
         * @return \Symfony\Component\HttpFoundation\Cookie 
         * @static 
         */
        public static function queued($key, $default = null)
        {
            return \Illuminate\Cookie\CookieJar::queued($key, $default);
        }
        
        /**
         * Queue a cookie to send with the next response.
         *
         * @return void 
         * @static 
         */
        public static function queue()
        {
            \Illuminate\Cookie\CookieJar::queue();
        }
        
        /**
         * Remove a cookie from the queue.
         *
         * @param string $name
         * @return void 
         * @static 
         */
        public static function unqueue($name)
        {
            \Illuminate\Cookie\CookieJar::unqueue($name);
        }
        
        /**
         * Set the default path and domain for the jar.
         *
         * @param string $path
         * @param string $domain
         * @param bool $secure
         * @return $this 
         * @static 
         */
        public static function setDefaultPathAndDomain($path, $domain, $secure = false)
        {
            return \Illuminate\Cookie\CookieJar::setDefaultPathAndDomain($path, $domain, $secure);
        }
        
        /**
         * Get the cookies which have been queued for the next request.
         *
         * @return array 
         * @static 
         */
        public static function getQueuedCookies()
        {
            return \Illuminate\Cookie\CookieJar::getQueuedCookies();
        }
        
    }         

    class Crypt {
        
        /**
         * Determine if the given key and cipher combination is valid.
         *
         * @param string $key
         * @param string $cipher
         * @return bool 
         * @static 
         */
        public static function supported($key, $cipher)
        {
            return \Illuminate\Encryption\Encrypter::supported($key, $cipher);
        }
        
        /**
         * Encrypt the given value.
         *
         * @param mixed $value
         * @return string 
         * @throws \Illuminate\Contracts\Encryption\EncryptException
         * @static 
         */
        public static function encrypt($value)
        {
            return \Illuminate\Encryption\Encrypter::encrypt($value);
        }
        
        /**
         * Decrypt the given value.
         *
         * @param mixed $payload
         * @return string 
         * @throws \Illuminate\Contracts\Encryption\DecryptException
         * @static 
         */
        public static function decrypt($payload)
        {
            return \Illuminate\Encryption\Encrypter::decrypt($payload);
        }
        
        /**
         * Get the encryption key.
         *
         * @return string 
         * @static 
         */
        public static function getKey()
        {
            return \Illuminate\Encryption\Encrypter::getKey();
        }
        
    }         

    class DB {
        
        /**
         * Get a database connection instance.
         *
         * @param string $name
         * @return \Illuminate\Database\Connection 
         * @static 
         */
        public static function connection($name = null)
        {
            return \Illuminate\Database\DatabaseManager::connection($name);
        }
        
        /**
         * Disconnect from the given database and remove from local cache.
         *
         * @param string $name
         * @return void 
         * @static 
         */
        public static function purge($name = null)
        {
            \Illuminate\Database\DatabaseManager::purge($name);
        }
        
        /**
         * Disconnect from the given database.
         *
         * @param string $name
         * @return void 
         * @static 
         */
        public static function disconnect($name = null)
        {
            \Illuminate\Database\DatabaseManager::disconnect($name);
        }
        
        /**
         * Reconnect to the given database.
         *
         * @param string $name
         * @return \Illuminate\Database\Connection 
         * @static 
         */
        public static function reconnect($name = null)
        {
            return \Illuminate\Database\DatabaseManager::reconnect($name);
        }
        
        /**
         * Get the default connection name.
         *
         * @return string 
         * @static 
         */
        public static function getDefaultConnection()
        {
            return \Illuminate\Database\DatabaseManager::getDefaultConnection();
        }
        
        /**
         * Set the default connection name.
         *
         * @param string $name
         * @return void 
         * @static 
         */
        public static function setDefaultConnection($name)
        {
            \Illuminate\Database\DatabaseManager::setDefaultConnection($name);
        }
        
        /**
         * Get all of the support drivers.
         *
         * @return array 
         * @static 
         */
        public static function supportedDrivers()
        {
            return \Illuminate\Database\DatabaseManager::supportedDrivers();
        }
        
        /**
         * Get all of the drivers that are actually available.
         *
         * @return array 
         * @static 
         */
        public static function availableDrivers()
        {
            return \Illuminate\Database\DatabaseManager::availableDrivers();
        }
        
        /**
         * Register an extension connection resolver.
         *
         * @param string $name
         * @param callable $resolver
         * @return void 
         * @static 
         */
        public static function extend($name, $resolver)
        {
            \Illuminate\Database\DatabaseManager::extend($name, $resolver);
        }
        
        /**
         * Return all of the created connections.
         *
         * @return array 
         * @static 
         */
        public static function getConnections()
        {
            return \Illuminate\Database\DatabaseManager::getConnections();
        }
        
        /**
         * Get a schema builder instance for the connection.
         *
         * @return \Illuminate\Database\Schema\MySqlBuilder 
         * @static 
         */
        public static function getSchemaBuilder()
        {
            return \Illuminate\Database\MySqlConnection::getSchemaBuilder();
        }
        
        /**
         * Bind values to their parameters in the given statement.
         *
         * @param \PDOStatement $statement
         * @param array $bindings
         * @return void 
         * @static 
         */
        public static function bindValues($statement, $bindings)
        {
            \Illuminate\Database\MySqlConnection::bindValues($statement, $bindings);
        }
        
        /**
         * Set the query grammar to the default implementation.
         *
         * @return void 
         * @static 
         */
        public static function useDefaultQueryGrammar()
        {
            //Method inherited from \Illuminate\Database\Connection            
            \Illuminate\Database\MySqlConnection::useDefaultQueryGrammar();
        }
        
        /**
         * Set the schema grammar to the default implementation.
         *
         * @return void 
         * @static 
         */
        public static function useDefaultSchemaGrammar()
        {
            //Method inherited from \Illuminate\Database\Connection            
            \Illuminate\Database\MySqlConnection::useDefaultSchemaGrammar();
        }
        
        /**
         * Set the query post processor to the default implementation.
         *
         * @return void 
         * @static 
         */
        public static function useDefaultPostProcessor()
        {
            //Method inherited from \Illuminate\Database\Connection            
            \Illuminate\Database\MySqlConnection::useDefaultPostProcessor();
        }
        
        /**
         * Begin a fluent query against a database table.
         *
         * @param string $table
         * @return \Illuminate\Database\Query\Builder 
         * @static 
         */
        public static function table($table)
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::table($table);
        }
        
        /**
         * Get a new query builder instance.
         *
         * @return \Illuminate\Database\Query\Builder 
         * @static 
         */
        public static function query()
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::query();
        }
        
        /**
         * Get a new raw query expression.
         *
         * @param mixed $value
         * @return \Illuminate\Database\Query\Expression 
         * @static 
         */
        public static function raw($value)
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::raw($value);
        }
        
        /**
         * Run a select statement and return a single result.
         *
         * @param string $query
         * @param array $bindings
         * @param bool $useReadPdo
         * @return mixed 
         * @static 
         */
        public static function selectOne($query, $bindings = array(), $useReadPdo = true)
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::selectOne($query, $bindings, $useReadPdo);
        }
        
        /**
         * Run a select statement against the database.
         *
         * @param string $query
         * @param array $bindings
         * @return array 
         * @static 
         */
        public static function selectFromWriteConnection($query, $bindings = array())
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::selectFromWriteConnection($query, $bindings);
        }
        
        /**
         * Run a select statement against the database.
         *
         * @param string $query
         * @param array $bindings
         * @param bool $useReadPdo
         * @return array 
         * @static 
         */
        public static function select($query, $bindings = array(), $useReadPdo = true)
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::select($query, $bindings, $useReadPdo);
        }
        
        /**
         * Run a select statement against the database and returns a generator.
         *
         * @param string $query
         * @param array $bindings
         * @param bool $useReadPdo
         * @return \Generator 
         * @static 
         */
        public static function cursor($query, $bindings = array(), $useReadPdo = true)
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::cursor($query, $bindings, $useReadPdo);
        }
        
        /**
         * Run an insert statement against the database.
         *
         * @param string $query
         * @param array $bindings
         * @return bool 
         * @static 
         */
        public static function insert($query, $bindings = array())
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::insert($query, $bindings);
        }
        
        /**
         * Run an update statement against the database.
         *
         * @param string $query
         * @param array $bindings
         * @return int 
         * @static 
         */
        public static function update($query, $bindings = array())
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::update($query, $bindings);
        }
        
        /**
         * Run a delete statement against the database.
         *
         * @param string $query
         * @param array $bindings
         * @return int 
         * @static 
         */
        public static function delete($query, $bindings = array())
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::delete($query, $bindings);
        }
        
        /**
         * Execute an SQL statement and return the boolean result.
         *
         * @param string $query
         * @param array $bindings
         * @return bool 
         * @static 
         */
        public static function statement($query, $bindings = array())
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::statement($query, $bindings);
        }
        
        /**
         * Run an SQL statement and get the number of rows affected.
         *
         * @param string $query
         * @param array $bindings
         * @return int 
         * @static 
         */
        public static function affectingStatement($query, $bindings = array())
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::affectingStatement($query, $bindings);
        }
        
        /**
         * Run a raw, unprepared query against the PDO connection.
         *
         * @param string $query
         * @return bool 
         * @static 
         */
        public static function unprepared($query)
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::unprepared($query);
        }
        
        /**
         * Prepare the query bindings for execution.
         *
         * @param array $bindings
         * @return array 
         * @static 
         */
        public static function prepareBindings($bindings)
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::prepareBindings($bindings);
        }
        
        /**
         * Execute a Closure within a transaction.
         *
         * @param \Closure $callback
         * @param int $attempts
         * @return mixed 
         * @throws \Exception|\Throwable
         * @static 
         */
        public static function transaction($callback, $attempts = 1)
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::transaction($callback, $attempts);
        }
        
        /**
         * Start a new database transaction.
         *
         * @return void 
         * @throws Exception
         * @static 
         */
        public static function beginTransaction()
        {
            //Method inherited from \Illuminate\Database\Connection            
            \Illuminate\Database\MySqlConnection::beginTransaction();
        }
        
        /**
         * Commit the active database transaction.
         *
         * @return void 
         * @static 
         */
        public static function commit()
        {
            //Method inherited from \Illuminate\Database\Connection            
            \Illuminate\Database\MySqlConnection::commit();
        }
        
        /**
         * Rollback the active database transaction.
         *
         * @return void 
         * @static 
         */
        public static function rollBack()
        {
            //Method inherited from \Illuminate\Database\Connection            
            \Illuminate\Database\MySqlConnection::rollBack();
        }
        
        /**
         * Get the number of active transactions.
         *
         * @return int 
         * @static 
         */
        public static function transactionLevel()
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::transactionLevel();
        }
        
        /**
         * Execute the given callback in "dry run" mode.
         *
         * @param \Closure $callback
         * @return array 
         * @static 
         */
        public static function pretend($callback)
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::pretend($callback);
        }
        
        /**
         * Log a query in the connection's query log.
         *
         * @param string $query
         * @param array $bindings
         * @param float|null $time
         * @return void 
         * @static 
         */
        public static function logQuery($query, $bindings, $time = null)
        {
            //Method inherited from \Illuminate\Database\Connection            
            \Illuminate\Database\MySqlConnection::logQuery($query, $bindings, $time);
        }
        
        /**
         * Register a database query listener with the connection.
         *
         * @param \Closure $callback
         * @return void 
         * @static 
         */
        public static function listen($callback)
        {
            //Method inherited from \Illuminate\Database\Connection            
            \Illuminate\Database\MySqlConnection::listen($callback);
        }
        
        /**
         * Is Doctrine available?
         *
         * @return bool 
         * @static 
         */
        public static function isDoctrineAvailable()
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::isDoctrineAvailable();
        }
        
        /**
         * Get a Doctrine Schema Column instance.
         *
         * @param string $table
         * @param string $column
         * @return \Doctrine\DBAL\Schema\Column 
         * @static 
         */
        public static function getDoctrineColumn($table, $column)
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::getDoctrineColumn($table, $column);
        }
        
        /**
         * Get the Doctrine DBAL schema manager for the connection.
         *
         * @return \Doctrine\DBAL\Schema\AbstractSchemaManager 
         * @static 
         */
        public static function getDoctrineSchemaManager()
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::getDoctrineSchemaManager();
        }
        
        /**
         * Get the Doctrine DBAL database connection instance.
         *
         * @return \Doctrine\DBAL\Connection 
         * @static 
         */
        public static function getDoctrineConnection()
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::getDoctrineConnection();
        }
        
        /**
         * Get the current PDO connection.
         *
         * @return \PDO 
         * @static 
         */
        public static function getPdo()
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::getPdo();
        }
        
        /**
         * Get the current PDO connection used for reading.
         *
         * @return \PDO 
         * @static 
         */
        public static function getReadPdo()
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::getReadPdo();
        }
        
        /**
         * Set the PDO connection.
         *
         * @param \PDO|null $pdo
         * @return $this 
         * @static 
         */
        public static function setPdo($pdo)
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::setPdo($pdo);
        }
        
        /**
         * Set the PDO connection used for reading.
         *
         * @param \PDO|null $pdo
         * @return $this 
         * @static 
         */
        public static function setReadPdo($pdo)
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::setReadPdo($pdo);
        }
        
        /**
         * Set the reconnect instance on the connection.
         *
         * @param callable $reconnector
         * @return $this 
         * @static 
         */
        public static function setReconnector($reconnector)
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::setReconnector($reconnector);
        }
        
        /**
         * Get the database connection name.
         *
         * @return string|null 
         * @static 
         */
        public static function getName()
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::getName();
        }
        
        /**
         * Get an option from the configuration options.
         *
         * @param string $option
         * @return mixed 
         * @static 
         */
        public static function getConfig($option)
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::getConfig($option);
        }
        
        /**
         * Get the PDO driver name.
         *
         * @return string 
         * @static 
         */
        public static function getDriverName()
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::getDriverName();
        }
        
        /**
         * Get the query grammar used by the connection.
         *
         * @return \Illuminate\Database\Query\Grammars\Grammar 
         * @static 
         */
        public static function getQueryGrammar()
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::getQueryGrammar();
        }
        
        /**
         * Set the query grammar used by the connection.
         *
         * @param \Illuminate\Database\Query\Grammars\Grammar $grammar
         * @return void 
         * @static 
         */
        public static function setQueryGrammar($grammar)
        {
            //Method inherited from \Illuminate\Database\Connection            
            \Illuminate\Database\MySqlConnection::setQueryGrammar($grammar);
        }
        
        /**
         * Get the schema grammar used by the connection.
         *
         * @return \Illuminate\Database\Schema\Grammars\Grammar 
         * @static 
         */
        public static function getSchemaGrammar()
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::getSchemaGrammar();
        }
        
        /**
         * Set the schema grammar used by the connection.
         *
         * @param \Illuminate\Database\Schema\Grammars\Grammar $grammar
         * @return void 
         * @static 
         */
        public static function setSchemaGrammar($grammar)
        {
            //Method inherited from \Illuminate\Database\Connection            
            \Illuminate\Database\MySqlConnection::setSchemaGrammar($grammar);
        }
        
        /**
         * Get the query post processor used by the connection.
         *
         * @return \Illuminate\Database\Query\Processors\Processor 
         * @static 
         */
        public static function getPostProcessor()
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::getPostProcessor();
        }
        
        /**
         * Set the query post processor used by the connection.
         *
         * @param \Illuminate\Database\Query\Processors\Processor $processor
         * @return void 
         * @static 
         */
        public static function setPostProcessor($processor)
        {
            //Method inherited from \Illuminate\Database\Connection            
            \Illuminate\Database\MySqlConnection::setPostProcessor($processor);
        }
        
        /**
         * Get the event dispatcher used by the connection.
         *
         * @return \Illuminate\Contracts\Events\Dispatcher 
         * @static 
         */
        public static function getEventDispatcher()
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::getEventDispatcher();
        }
        
        /**
         * Set the event dispatcher instance on the connection.
         *
         * @param \Illuminate\Contracts\Events\Dispatcher $events
         * @return void 
         * @static 
         */
        public static function setEventDispatcher($events)
        {
            //Method inherited from \Illuminate\Database\Connection            
            \Illuminate\Database\MySqlConnection::setEventDispatcher($events);
        }
        
        /**
         * Determine if the connection in a "dry run".
         *
         * @return bool 
         * @static 
         */
        public static function pretending()
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::pretending();
        }
        
        /**
         * Get the default fetch mode for the connection.
         *
         * @return int 
         * @static 
         */
        public static function getFetchMode()
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::getFetchMode();
        }
        
        /**
         * Get the fetch argument to be applied when selecting.
         *
         * @return mixed 
         * @static 
         */
        public static function getFetchArgument()
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::getFetchArgument();
        }
        
        /**
         * Get custom constructor arguments for the PDO::FETCH_CLASS fetch mode.
         *
         * @return array 
         * @static 
         */
        public static function getFetchConstructorArgument()
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::getFetchConstructorArgument();
        }
        
        /**
         * Set the default fetch mode for the connection, and optional arguments for the given fetch mode.
         *
         * @param int $fetchMode
         * @param mixed $fetchArgument
         * @param array $fetchConstructorArgument
         * @return int 
         * @static 
         */
        public static function setFetchMode($fetchMode, $fetchArgument = null, $fetchConstructorArgument = array())
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::setFetchMode($fetchMode, $fetchArgument, $fetchConstructorArgument);
        }
        
        /**
         * Get the connection query log.
         *
         * @return array 
         * @static 
         */
        public static function getQueryLog()
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::getQueryLog();
        }
        
        /**
         * Clear the query log.
         *
         * @return void 
         * @static 
         */
        public static function flushQueryLog()
        {
            //Method inherited from \Illuminate\Database\Connection            
            \Illuminate\Database\MySqlConnection::flushQueryLog();
        }
        
        /**
         * Enable the query log on the connection.
         *
         * @return void 
         * @static 
         */
        public static function enableQueryLog()
        {
            //Method inherited from \Illuminate\Database\Connection            
            \Illuminate\Database\MySqlConnection::enableQueryLog();
        }
        
        /**
         * Disable the query log on the connection.
         *
         * @return void 
         * @static 
         */
        public static function disableQueryLog()
        {
            //Method inherited from \Illuminate\Database\Connection            
            \Illuminate\Database\MySqlConnection::disableQueryLog();
        }
        
        /**
         * Determine whether we're logging queries.
         *
         * @return bool 
         * @static 
         */
        public static function logging()
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::logging();
        }
        
        /**
         * Get the name of the connected database.
         *
         * @return string 
         * @static 
         */
        public static function getDatabaseName()
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::getDatabaseName();
        }
        
        /**
         * Set the name of the connected database.
         *
         * @param string $database
         * @return string 
         * @static 
         */
        public static function setDatabaseName($database)
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::setDatabaseName($database);
        }
        
        /**
         * Get the table prefix for the connection.
         *
         * @return string 
         * @static 
         */
        public static function getTablePrefix()
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::getTablePrefix();
        }
        
        /**
         * Set the table prefix in use by the connection.
         *
         * @param string $prefix
         * @return void 
         * @static 
         */
        public static function setTablePrefix($prefix)
        {
            //Method inherited from \Illuminate\Database\Connection            
            \Illuminate\Database\MySqlConnection::setTablePrefix($prefix);
        }
        
        /**
         * Set the table prefix and return the grammar.
         *
         * @param \Illuminate\Database\Grammar $grammar
         * @return \Illuminate\Database\Grammar 
         * @static 
         */
        public static function withTablePrefix($grammar)
        {
            //Method inherited from \Illuminate\Database\Connection            
            return \Illuminate\Database\MySqlConnection::withTablePrefix($grammar);
        }
        
    }         

    class Event {
        
        /**
         * Register an event listener with the dispatcher.
         *
         * @param string|array $events
         * @param mixed $listener
         * @param int $priority
         * @return void 
         * @static 
         */
        public static function listen($events, $listener, $priority = 0)
        {
            \Illuminate\Events\Dispatcher::listen($events, $listener, $priority);
        }
        
        /**
         * Determine if a given event has listeners.
         *
         * @param string $eventName
         * @return bool 
         * @static 
         */
        public static function hasListeners($eventName)
        {
            return \Illuminate\Events\Dispatcher::hasListeners($eventName);
        }
        
        /**
         * Register an event and payload to be fired later.
         *
         * @param string $event
         * @param array $payload
         * @return void 
         * @static 
         */
        public static function push($event, $payload = array())
        {
            \Illuminate\Events\Dispatcher::push($event, $payload);
        }
        
        /**
         * Register an event subscriber with the dispatcher.
         *
         * @param object|string $subscriber
         * @return void 
         * @static 
         */
        public static function subscribe($subscriber)
        {
            \Illuminate\Events\Dispatcher::subscribe($subscriber);
        }
        
        /**
         * Fire an event until the first non-null response is returned.
         *
         * @param string|object $event
         * @param array $payload
         * @return mixed 
         * @static 
         */
        public static function until($event, $payload = array())
        {
            return \Illuminate\Events\Dispatcher::until($event, $payload);
        }
        
        /**
         * Flush a set of pushed events.
         *
         * @param string $event
         * @return void 
         * @static 
         */
        public static function flush($event)
        {
            \Illuminate\Events\Dispatcher::flush($event);
        }
        
        /**
         * Get the event that is currently firing.
         *
         * @return string 
         * @static 
         */
        public static function firing()
        {
            return \Illuminate\Events\Dispatcher::firing();
        }
        
        /**
         * Fire an event and call the listeners.
         *
         * @param string|object $event
         * @param mixed $payload
         * @param bool $halt
         * @return array|null 
         * @static 
         */
        public static function fire($event, $payload = array(), $halt = false)
        {
            return \Illuminate\Events\Dispatcher::fire($event, $payload, $halt);
        }
        
        /**
         * Get all of the listeners for a given event name.
         *
         * @param string $eventName
         * @return array 
         * @static 
         */
        public static function getListeners($eventName)
        {
            return \Illuminate\Events\Dispatcher::getListeners($eventName);
        }
        
        /**
         * Register an event listener with the dispatcher.
         *
         * @param mixed $listener
         * @return mixed 
         * @static 
         */
        public static function makeListener($listener)
        {
            return \Illuminate\Events\Dispatcher::makeListener($listener);
        }
        
        /**
         * Create a class based listener using the IoC container.
         *
         * @param mixed $listener
         * @return \Closure 
         * @static 
         */
        public static function createClassListener($listener)
        {
            return \Illuminate\Events\Dispatcher::createClassListener($listener);
        }
        
        /**
         * Remove a set of listeners from the dispatcher.
         *
         * @param string $event
         * @return void 
         * @static 
         */
        public static function forget($event)
        {
            \Illuminate\Events\Dispatcher::forget($event);
        }
        
        /**
         * Forget all of the pushed listeners.
         *
         * @return void 
         * @static 
         */
        public static function forgetPushed()
        {
            \Illuminate\Events\Dispatcher::forgetPushed();
        }
        
        /**
         * Set the queue resolver implementation.
         *
         * @param callable $resolver
         * @return $this 
         * @static 
         */
        public static function setQueueResolver($resolver)
        {
            return \Illuminate\Events\Dispatcher::setQueueResolver($resolver);
        }
        
    }         

    class File {
        
        /**
         * Determine if a file or directory exists.
         *
         * @param string $path
         * @return bool 
         * @static 
         */
        public static function exists($path)
        {
            return \Illuminate\Filesystem\Filesystem::exists($path);
        }
        
        /**
         * Get the contents of a file.
         *
         * @param string $path
         * @param bool $lock
         * @return string 
         * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
         * @static 
         */
        public static function get($path, $lock = false)
        {
            return \Illuminate\Filesystem\Filesystem::get($path, $lock);
        }
        
        /**
         * Get contents of a file with shared access.
         *
         * @param string $path
         * @return string 
         * @static 
         */
        public static function sharedGet($path)
        {
            return \Illuminate\Filesystem\Filesystem::sharedGet($path);
        }
        
        /**
         * Get the returned value of a file.
         *
         * @param string $path
         * @return mixed 
         * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
         * @static 
         */
        public static function getRequire($path)
        {
            return \Illuminate\Filesystem\Filesystem::getRequire($path);
        }
        
        /**
         * Require the given file once.
         *
         * @param string $file
         * @return mixed 
         * @static 
         */
        public static function requireOnce($file)
        {
            return \Illuminate\Filesystem\Filesystem::requireOnce($file);
        }
        
        /**
         * Write the contents of a file.
         *
         * @param string $path
         * @param string $contents
         * @param bool $lock
         * @return int 
         * @static 
         */
        public static function put($path, $contents, $lock = false)
        {
            return \Illuminate\Filesystem\Filesystem::put($path, $contents, $lock);
        }
        
        /**
         * Prepend to a file.
         *
         * @param string $path
         * @param string $data
         * @return int 
         * @static 
         */
        public static function prepend($path, $data)
        {
            return \Illuminate\Filesystem\Filesystem::prepend($path, $data);
        }
        
        /**
         * Append to a file.
         *
         * @param string $path
         * @param string $data
         * @return int 
         * @static 
         */
        public static function append($path, $data)
        {
            return \Illuminate\Filesystem\Filesystem::append($path, $data);
        }
        
        /**
         * Get or set UNIX mode of a file or directory.
         *
         * @param string $path
         * @param int $mode
         * @return mixed 
         * @static 
         */
        public static function chmod($path, $mode = null)
        {
            return \Illuminate\Filesystem\Filesystem::chmod($path, $mode);
        }
        
        /**
         * Delete the file at a given path.
         *
         * @param string|array $paths
         * @return bool 
         * @static 
         */
        public static function delete($paths)
        {
            return \Illuminate\Filesystem\Filesystem::delete($paths);
        }
        
        /**
         * Move a file to a new location.
         *
         * @param string $path
         * @param string $target
         * @return bool 
         * @static 
         */
        public static function move($path, $target)
        {
            return \Illuminate\Filesystem\Filesystem::move($path, $target);
        }
        
        /**
         * Copy a file to a new location.
         *
         * @param string $path
         * @param string $target
         * @return bool 
         * @static 
         */
        public static function copy($path, $target)
        {
            return \Illuminate\Filesystem\Filesystem::copy($path, $target);
        }
        
        /**
         * Create a hard link to the target file or directory.
         *
         * @param string $target
         * @param string $link
         * @return void 
         * @static 
         */
        public static function link($target, $link)
        {
            \Illuminate\Filesystem\Filesystem::link($target, $link);
        }
        
        /**
         * Extract the file name from a file path.
         *
         * @param string $path
         * @return string 
         * @static 
         */
        public static function name($path)
        {
            return \Illuminate\Filesystem\Filesystem::name($path);
        }
        
        /**
         * Extract the trailing name component from a file path.
         *
         * @param string $path
         * @return string 
         * @static 
         */
        public static function basename($path)
        {
            return \Illuminate\Filesystem\Filesystem::basename($path);
        }
        
        /**
         * Extract the parent directory from a file path.
         *
         * @param string $path
         * @return string 
         * @static 
         */
        public static function dirname($path)
        {
            return \Illuminate\Filesystem\Filesystem::dirname($path);
        }
        
        /**
         * Extract the file extension from a file path.
         *
         * @param string $path
         * @return string 
         * @static 
         */
        public static function extension($path)
        {
            return \Illuminate\Filesystem\Filesystem::extension($path);
        }
        
        /**
         * Get the file type of a given file.
         *
         * @param string $path
         * @return string 
         * @static 
         */
        public static function type($path)
        {
            return \Illuminate\Filesystem\Filesystem::type($path);
        }
        
        /**
         * Get the mime-type of a given file.
         *
         * @param string $path
         * @return string|false 
         * @static 
         */
        public static function mimeType($path)
        {
            return \Illuminate\Filesystem\Filesystem::mimeType($path);
        }
        
        /**
         * Get the file size of a given file.
         *
         * @param string $path
         * @return int 
         * @static 
         */
        public static function size($path)
        {
            return \Illuminate\Filesystem\Filesystem::size($path);
        }
        
        /**
         * Get the file's last modification time.
         *
         * @param string $path
         * @return int 
         * @static 
         */
        public static function lastModified($path)
        {
            return \Illuminate\Filesystem\Filesystem::lastModified($path);
        }
        
        /**
         * Determine if the given path is a directory.
         *
         * @param string $directory
         * @return bool 
         * @static 
         */
        public static function isDirectory($directory)
        {
            return \Illuminate\Filesystem\Filesystem::isDirectory($directory);
        }
        
        /**
         * Determine if the given path is readable.
         *
         * @param string $path
         * @return bool 
         * @static 
         */
        public static function isReadable($path)
        {
            return \Illuminate\Filesystem\Filesystem::isReadable($path);
        }
        
        /**
         * Determine if the given path is writable.
         *
         * @param string $path
         * @return bool 
         * @static 
         */
        public static function isWritable($path)
        {
            return \Illuminate\Filesystem\Filesystem::isWritable($path);
        }
        
        /**
         * Determine if the given path is a file.
         *
         * @param string $file
         * @return bool 
         * @static 
         */
        public static function isFile($file)
        {
            return \Illuminate\Filesystem\Filesystem::isFile($file);
        }
        
        /**
         * Find path names matching a given pattern.
         *
         * @param string $pattern
         * @param int $flags
         * @return array 
         * @static 
         */
        public static function glob($pattern, $flags = 0)
        {
            return \Illuminate\Filesystem\Filesystem::glob($pattern, $flags);
        }
        
        /**
         * Get an array of all files in a directory.
         *
         * @param string $directory
         * @return array 
         * @static 
         */
        public static function files($directory)
        {
            return \Illuminate\Filesystem\Filesystem::files($directory);
        }
        
        /**
         * Get all of the files from the given directory (recursive).
         *
         * @param string $directory
         * @param bool $hidden
         * @return array 
         * @static 
         */
        public static function allFiles($directory, $hidden = false)
        {
            return \Illuminate\Filesystem\Filesystem::allFiles($directory, $hidden);
        }
        
        /**
         * Get all of the directories within a given directory.
         *
         * @param string $directory
         * @return array 
         * @static 
         */
        public static function directories($directory)
        {
            return \Illuminate\Filesystem\Filesystem::directories($directory);
        }
        
        /**
         * Create a directory.
         *
         * @param string $path
         * @param int $mode
         * @param bool $recursive
         * @param bool $force
         * @return bool 
         * @static 
         */
        public static function makeDirectory($path, $mode = 493, $recursive = false, $force = false)
        {
            return \Illuminate\Filesystem\Filesystem::makeDirectory($path, $mode, $recursive, $force);
        }
        
        /**
         * Move a directory.
         *
         * @param string $from
         * @param string $to
         * @param bool $overwrite
         * @return bool 
         * @static 
         */
        public static function moveDirectory($from, $to, $overwrite = false)
        {
            return \Illuminate\Filesystem\Filesystem::moveDirectory($from, $to, $overwrite);
        }
        
        /**
         * Copy a directory from one location to another.
         *
         * @param string $directory
         * @param string $destination
         * @param int $options
         * @return bool 
         * @static 
         */
        public static function copyDirectory($directory, $destination, $options = null)
        {
            return \Illuminate\Filesystem\Filesystem::copyDirectory($directory, $destination, $options);
        }
        
        /**
         * Recursively delete a directory.
         * 
         * The directory itself may be optionally preserved.
         *
         * @param string $directory
         * @param bool $preserve
         * @return bool 
         * @static 
         */
        public static function deleteDirectory($directory, $preserve = false)
        {
            return \Illuminate\Filesystem\Filesystem::deleteDirectory($directory, $preserve);
        }
        
        /**
         * Empty the specified directory of all files and folders.
         *
         * @param string $directory
         * @return bool 
         * @static 
         */
        public static function cleanDirectory($directory)
        {
            return \Illuminate\Filesystem\Filesystem::cleanDirectory($directory);
        }
        
        /**
         * Register a custom macro.
         *
         * @param string $name
         * @param callable $macro
         * @return void 
         * @static 
         */
        public static function macro($name, $macro)
        {
            \Illuminate\Filesystem\Filesystem::macro($name, $macro);
        }
        
        /**
         * Checks if macro is registered.
         *
         * @param string $name
         * @return bool 
         * @static 
         */
        public static function hasMacro($name)
        {
            return \Illuminate\Filesystem\Filesystem::hasMacro($name);
        }
        
    }         

    class Gate {
        
        /**
         * Determine if a given ability has been defined.
         *
         * @param string $ability
         * @return bool 
         * @static 
         */
        public static function has($ability)
        {
            return \Illuminate\Auth\Access\Gate::has($ability);
        }
        
        /**
         * Define a new ability.
         *
         * @param string $ability
         * @param callable|string $callback
         * @return $this 
         * @throws \InvalidArgumentException
         * @static 
         */
        public static function define($ability, $callback)
        {
            return \Illuminate\Auth\Access\Gate::define($ability, $callback);
        }
        
        /**
         * Define a policy class for a given class type.
         *
         * @param string $class
         * @param string $policy
         * @return $this 
         * @static 
         */
        public static function policy($class, $policy)
        {
            return \Illuminate\Auth\Access\Gate::policy($class, $policy);
        }
        
        /**
         * Register a callback to run before all Gate checks.
         *
         * @param callable $callback
         * @return $this 
         * @static 
         */
        public static function before($callback)
        {
            return \Illuminate\Auth\Access\Gate::before($callback);
        }
        
        /**
         * Register a callback to run after all Gate checks.
         *
         * @param callable $callback
         * @return $this 
         * @static 
         */
        public static function after($callback)
        {
            return \Illuminate\Auth\Access\Gate::after($callback);
        }
        
        /**
         * Determine if the given ability should be granted for the current user.
         *
         * @param string $ability
         * @param array|mixed $arguments
         * @return bool 
         * @static 
         */
        public static function allows($ability, $arguments = array())
        {
            return \Illuminate\Auth\Access\Gate::allows($ability, $arguments);
        }
        
        /**
         * Determine if the given ability should be denied for the current user.
         *
         * @param string $ability
         * @param array|mixed $arguments
         * @return bool 
         * @static 
         */
        public static function denies($ability, $arguments = array())
        {
            return \Illuminate\Auth\Access\Gate::denies($ability, $arguments);
        }
        
        /**
         * Determine if the given ability should be granted for the current user.
         *
         * @param string $ability
         * @param array|mixed $arguments
         * @return bool 
         * @static 
         */
        public static function check($ability, $arguments = array())
        {
            return \Illuminate\Auth\Access\Gate::check($ability, $arguments);
        }
        
        /**
         * Determine if the given ability should be granted for the current user.
         *
         * @param string $ability
         * @param array|mixed $arguments
         * @return \Illuminate\Auth\Access\Response 
         * @throws \Illuminate\Auth\Access\AuthorizationException
         * @static 
         */
        public static function authorize($ability, $arguments = array())
        {
            return \Illuminate\Auth\Access\Gate::authorize($ability, $arguments);
        }
        
        /**
         * Get a policy instance for a given class.
         *
         * @param object|string $class
         * @return mixed 
         * @throws \InvalidArgumentException
         * @static 
         */
        public static function getPolicyFor($class)
        {
            return \Illuminate\Auth\Access\Gate::getPolicyFor($class);
        }
        
        /**
         * Build a policy class instance of the given type.
         *
         * @param object|string $class
         * @return mixed 
         * @static 
         */
        public static function resolvePolicy($class)
        {
            return \Illuminate\Auth\Access\Gate::resolvePolicy($class);
        }
        
        /**
         * Get a gate instance for the given user.
         *
         * @param \Illuminate\Contracts\Auth\Authenticatable|mixed $user
         * @return static 
         * @static 
         */
        public static function forUser($user)
        {
            return \Illuminate\Auth\Access\Gate::forUser($user);
        }
        
    }         

    class Hash {
        
        /**
         * Hash the given value.
         *
         * @param string $value
         * @param array $options
         * @return string 
         * @throws \RuntimeException
         * @static 
         */
        public static function make($value, $options = array())
        {
            return \Illuminate\Hashing\BcryptHasher::make($value, $options);
        }
        
        /**
         * Check the given plain value against a hash.
         *
         * @param string $value
         * @param string $hashedValue
         * @param array $options
         * @return bool 
         * @static 
         */
        public static function check($value, $hashedValue, $options = array())
        {
            return \Illuminate\Hashing\BcryptHasher::check($value, $hashedValue, $options);
        }
        
        /**
         * Check if the given hash has been hashed using the given options.
         *
         * @param string $hashedValue
         * @param array $options
         * @return bool 
         * @static 
         */
        public static function needsRehash($hashedValue, $options = array())
        {
            return \Illuminate\Hashing\BcryptHasher::needsRehash($hashedValue, $options);
        }
        
        /**
         * Set the default password work factor.
         *
         * @param int $rounds
         * @return $this 
         * @static 
         */
        public static function setRounds($rounds)
        {
            return \Illuminate\Hashing\BcryptHasher::setRounds($rounds);
        }
        
    }         

    class Lang {
        
        /**
         * Determine if a translation exists for a given locale.
         *
         * @param string $key
         * @param string|null $locale
         * @return bool 
         * @static 
         */
        public static function hasForLocale($key, $locale = null)
        {
            return \Illuminate\Translation\Translator::hasForLocale($key, $locale);
        }
        
        /**
         * Determine if a translation exists.
         *
         * @param string $key
         * @param string|null $locale
         * @param bool $fallback
         * @return bool 
         * @static 
         */
        public static function has($key, $locale = null, $fallback = true)
        {
            return \Illuminate\Translation\Translator::has($key, $locale, $fallback);
        }
        
        /**
         * Get the translation for the given key.
         *
         * @param string $key
         * @param array $replace
         * @param string|null $locale
         * @param bool $fallback
         * @return string|array|null 
         * @static 
         */
        public static function get($key, $replace = array(), $locale = null, $fallback = true)
        {
            return \Illuminate\Translation\Translator::get($key, $replace, $locale, $fallback);
        }
        
        /**
         * Add translation lines to the given locale.
         *
         * @param array $lines
         * @param string $locale
         * @param string $namespace
         * @return void 
         * @static 
         */
        public static function addLines($lines, $locale, $namespace = '*')
        {
            \Illuminate\Translation\Translator::addLines($lines, $locale, $namespace);
        }
        
        /**
         * Get a translation according to an integer value.
         *
         * @param string $key
         * @param int|array|\Countable $number
         * @param array $replace
         * @param string $locale
         * @return string 
         * @static 
         */
        public static function choice($key, $number, $replace = array(), $locale = null)
        {
            return \Illuminate\Translation\Translator::choice($key, $number, $replace, $locale);
        }
        
        /**
         * Get the translation for a given key.
         *
         * @param string $id
         * @param array $parameters
         * @param string $domain
         * @param string $locale
         * @return string|array|null 
         * @static 
         */
        public static function trans($id, $parameters = array(), $domain = 'messages', $locale = null)
        {
            return \Illuminate\Translation\Translator::trans($id, $parameters, $domain, $locale);
        }
        
        /**
         * Get a translation according to an integer value.
         *
         * @param string $id
         * @param int|array|\Countable $number
         * @param array $parameters
         * @param string $domain
         * @param string $locale
         * @return string 
         * @static 
         */
        public static function transChoice($id, $number, $parameters = array(), $domain = 'messages', $locale = null)
        {
            return \Illuminate\Translation\Translator::transChoice($id, $number, $parameters, $domain, $locale);
        }
        
        /**
         * Load the specified language group.
         *
         * @param string $namespace
         * @param string $group
         * @param string $locale
         * @return void 
         * @static 
         */
        public static function load($namespace, $group, $locale)
        {
            \Illuminate\Translation\Translator::load($namespace, $group, $locale);
        }
        
        /**
         * Add a new namespace to the loader.
         *
         * @param string $namespace
         * @param string $hint
         * @return void 
         * @static 
         */
        public static function addNamespace($namespace, $hint)
        {
            \Illuminate\Translation\Translator::addNamespace($namespace, $hint);
        }
        
        /**
         * Parse a key into namespace, group, and item.
         *
         * @param string $key
         * @return array 
         * @static 
         */
        public static function parseKey($key)
        {
            return \Illuminate\Translation\Translator::parseKey($key);
        }
        
        /**
         * Get the message selector instance.
         *
         * @return \Symfony\Component\Translation\MessageSelector 
         * @static 
         */
        public static function getSelector()
        {
            return \Illuminate\Translation\Translator::getSelector();
        }
        
        /**
         * Set the message selector instance.
         *
         * @param \Symfony\Component\Translation\MessageSelector $selector
         * @return void 
         * @static 
         */
        public static function setSelector($selector)
        {
            \Illuminate\Translation\Translator::setSelector($selector);
        }
        
        /**
         * Get the language line loader implementation.
         *
         * @return \Illuminate\Translation\LoaderInterface 
         * @static 
         */
        public static function getLoader()
        {
            return \Illuminate\Translation\Translator::getLoader();
        }
        
        /**
         * Get the default locale being used.
         *
         * @return string 
         * @static 
         */
        public static function locale()
        {
            return \Illuminate\Translation\Translator::locale();
        }
        
        /**
         * Get the default locale being used.
         *
         * @return string 
         * @static 
         */
        public static function getLocale()
        {
            return \Illuminate\Translation\Translator::getLocale();
        }
        
        /**
         * Set the default locale.
         *
         * @param string $locale
         * @return void 
         * @static 
         */
        public static function setLocale($locale)
        {
            \Illuminate\Translation\Translator::setLocale($locale);
        }
        
        /**
         * Get the fallback locale being used.
         *
         * @return string 
         * @static 
         */
        public static function getFallback()
        {
            return \Illuminate\Translation\Translator::getFallback();
        }
        
        /**
         * Set the fallback locale being used.
         *
         * @param string $fallback
         * @return void 
         * @static 
         */
        public static function setFallback($fallback)
        {
            \Illuminate\Translation\Translator::setFallback($fallback);
        }
        
        /**
         * Set the parsed value of a key.
         *
         * @param string $key
         * @param array $parsed
         * @return void 
         * @static 
         */
        public static function setParsedKey($key, $parsed)
        {
            //Method inherited from \Illuminate\Support\NamespacedItemResolver            
            \Illuminate\Translation\Translator::setParsedKey($key, $parsed);
        }
        
        /**
         * Register a custom macro.
         *
         * @param string $name
         * @param callable $macro
         * @return void 
         * @static 
         */
        public static function macro($name, $macro)
        {
            \Illuminate\Translation\Translator::macro($name, $macro);
        }
        
        /**
         * Checks if macro is registered.
         *
         * @param string $name
         * @return bool 
         * @static 
         */
        public static function hasMacro($name)
        {
            return \Illuminate\Translation\Translator::hasMacro($name);
        }
        
    }         

    class Log {
        
        /**
         * Adds a log record at the DEBUG level.
         *
         * @param string $message The log message
         * @param array $context The log context
         * @return Boolean Whether the record has been processed
         * @static 
         */
        public static function debug($message, $context = array())
        {
            return \Monolog\Logger::debug($message, $context);
        }
        
        /**
         * Adds a log record at the INFO level.
         *
         * @param string $message The log message
         * @param array $context The log context
         * @return Boolean Whether the record has been processed
         * @static 
         */
        public static function info($message, $context = array())
        {
            return \Monolog\Logger::info($message, $context);
        }
        
        /**
         * Adds a log record at the NOTICE level.
         *
         * @param string $message The log message
         * @param array $context The log context
         * @return Boolean Whether the record has been processed
         * @static 
         */
        public static function notice($message, $context = array())
        {
            return \Monolog\Logger::notice($message, $context);
        }
        
        /**
         * Adds a log record at the WARNING level.
         *
         * @param string $message The log message
         * @param array $context The log context
         * @return Boolean Whether the record has been processed
         * @static 
         */
        public static function warning($message, $context = array())
        {
            return \Monolog\Logger::warning($message, $context);
        }
        
        /**
         * Adds a log record at the ERROR level.
         *
         * @param string $message The log message
         * @param array $context The log context
         * @return Boolean Whether the record has been processed
         * @static 
         */
        public static function error($message, $context = array())
        {
            return \Monolog\Logger::error($message, $context);
        }
        
        /**
         * Adds a log record at the CRITICAL level.
         *
         * @param string $message The log message
         * @param array $context The log context
         * @return Boolean Whether the record has been processed
         * @static 
         */
        public static function critical($message, $context = array())
        {
            return \Monolog\Logger::critical($message, $context);
        }
        
        /**
         * Adds a log record at the ALERT level.
         *
         * @param string $message The log message
         * @param array $context The log context
         * @return Boolean Whether the record has been processed
         * @static 
         */
        public static function alert($message, $context = array())
        {
            return \Monolog\Logger::alert($message, $context);
        }
        
        /**
         * Adds a log record at the EMERGENCY level.
         *
         * @param string $message The log message
         * @param array $context The log context
         * @return Boolean Whether the record has been processed
         * @static 
         */
        public static function emergency($message, $context = array())
        {
            return \Monolog\Logger::emergency($message, $context);
        }
        
        /**
         * Log a message to the logs.
         *
         * @param string $level
         * @param string $message
         * @param array $context
         * @return void 
         * @static 
         */
        public static function log($level, $message, $context = array())
        {
            \Illuminate\Log\Writer::log($level, $message, $context);
        }
        
        /**
         * Dynamically pass log calls into the writer.
         *
         * @param string $level
         * @param string $message
         * @param array $context
         * @return void 
         * @static 
         */
        public static function write($level, $message, $context = array())
        {
            \Illuminate\Log\Writer::write($level, $message, $context);
        }
        
        /**
         * Register a file log handler.
         *
         * @param string $path
         * @param string $level
         * @return void 
         * @static 
         */
        public static function useFiles($path, $level = 'debug')
        {
            \Illuminate\Log\Writer::useFiles($path, $level);
        }
        
        /**
         * Register a daily file log handler.
         *
         * @param string $path
         * @param int $days
         * @param string $level
         * @return void 
         * @static 
         */
        public static function useDailyFiles($path, $days = 0, $level = 'debug')
        {
            \Illuminate\Log\Writer::useDailyFiles($path, $days, $level);
        }
        
        /**
         * Register a Syslog handler.
         *
         * @param string $name
         * @param string $level
         * @return \Psr\Log\LoggerInterface 
         * @static 
         */
        public static function useSyslog($name = 'laravel', $level = 'debug')
        {
            return \Illuminate\Log\Writer::useSyslog($name, $level);
        }
        
        /**
         * Register an error_log handler.
         *
         * @param string $level
         * @param int $messageType
         * @return void 
         * @static 
         */
        public static function useErrorLog($level = 'debug', $messageType = 0)
        {
            \Illuminate\Log\Writer::useErrorLog($level, $messageType);
        }
        
        /**
         * Register a new callback handler for when a log event is triggered.
         *
         * @param \Closure $callback
         * @return void 
         * @throws \RuntimeException
         * @static 
         */
        public static function listen($callback)
        {
            \Illuminate\Log\Writer::listen($callback);
        }
        
        /**
         * Get the underlying Monolog instance.
         *
         * @return \Monolog\Logger 
         * @static 
         */
        public static function getMonolog()
        {
            return \Illuminate\Log\Writer::getMonolog();
        }
        
        /**
         * Get the event dispatcher instance.
         *
         * @return \Illuminate\Contracts\Events\Dispatcher 
         * @static 
         */
        public static function getEventDispatcher()
        {
            return \Illuminate\Log\Writer::getEventDispatcher();
        }
        
        /**
         * Set the event dispatcher instance.
         *
         * @param \Illuminate\Contracts\Events\Dispatcher $dispatcher
         * @return void 
         * @static 
         */
        public static function setEventDispatcher($dispatcher)
        {
            \Illuminate\Log\Writer::setEventDispatcher($dispatcher);
        }
        
    }         

    class Mail {
        
        /**
         * Set the global from address and name.
         *
         * @param string $address
         * @param string|null $name
         * @return void 
         * @static 
         */
        public static function alwaysFrom($address, $name = null)
        {
            \Illuminate\Mail\Mailer::alwaysFrom($address, $name);
        }
        
        /**
         * Set the global reply-to address and name.
         *
         * @param string $address
         * @param string|null $name
         * @return void 
         * @static 
         */
        public static function alwaysReplyTo($address, $name = null)
        {
            \Illuminate\Mail\Mailer::alwaysReplyTo($address, $name);
        }
        
        /**
         * Set the global to address and name.
         *
         * @param string $address
         * @param string|null $name
         * @return void 
         * @static 
         */
        public static function alwaysTo($address, $name = null)
        {
            \Illuminate\Mail\Mailer::alwaysTo($address, $name);
        }
        
        /**
         * Begin the process of mailing a mailable class instance.
         *
         * @param mixed $users
         * @return \Illuminate\Mail\MailableMailer 
         * @static 
         */
        public static function to($users)
        {
            return \Illuminate\Mail\Mailer::to($users);
        }
        
        /**
         * Begin the process of mailing a mailable class instance.
         *
         * @param mixed $users
         * @return \Illuminate\Mail\MailableMailer 
         * @static 
         */
        public static function bcc($users)
        {
            return \Illuminate\Mail\Mailer::bcc($users);
        }
        
        /**
         * Send a new message when only a raw text part.
         *
         * @param string $text
         * @param mixed $callback
         * @return void 
         * @static 
         */
        public static function raw($text, $callback)
        {
            \Illuminate\Mail\Mailer::raw($text, $callback);
        }
        
        /**
         * Send a new message when only a plain part.
         *
         * @param string $view
         * @param array $data
         * @param mixed $callback
         * @return void 
         * @static 
         */
        public static function plain($view, $data, $callback)
        {
            \Illuminate\Mail\Mailer::plain($view, $data, $callback);
        }
        
        /**
         * Send a new message using a view.
         *
         * @param string|array $view
         * @param array $data
         * @param \Closure|string $callback
         * @return void 
         * @static 
         */
        public static function send($view, $data = array(), $callback = null)
        {
            \Illuminate\Mail\Mailer::send($view, $data, $callback);
        }
        
        /**
         * Queue a new e-mail message for sending.
         *
         * @param string|array $view
         * @param array $data
         * @param \Closure|string $callback
         * @param string|null $queue
         * @return mixed 
         * @static 
         */
        public static function queue($view, $data = array(), $callback = null, $queue = null)
        {
            return \Illuminate\Mail\Mailer::queue($view, $data, $callback, $queue);
        }
        
        /**
         * Queue a new e-mail message for sending on the given queue.
         *
         * @param string $queue
         * @param string|array $view
         * @param array $data
         * @param \Closure|string $callback
         * @return mixed 
         * @static 
         */
        public static function onQueue($queue, $view, $data, $callback)
        {
            return \Illuminate\Mail\Mailer::onQueue($queue, $view, $data, $callback);
        }
        
        /**
         * Queue a new e-mail message for sending on the given queue.
         * 
         * This method didn't match rest of framework's "onQueue" phrasing. Added "onQueue".
         *
         * @param string $queue
         * @param string|array $view
         * @param array $data
         * @param \Closure|string $callback
         * @return mixed 
         * @static 
         */
        public static function queueOn($queue, $view, $data, $callback)
        {
            return \Illuminate\Mail\Mailer::queueOn($queue, $view, $data, $callback);
        }
        
        /**
         * Queue a new e-mail message for sending after (n) seconds.
         *
         * @param int $delay
         * @param string|array $view
         * @param array $data
         * @param \Closure|string $callback
         * @param string|null $queue
         * @return mixed 
         * @static 
         */
        public static function later($delay, $view, $data = array(), $callback = null, $queue = null)
        {
            return \Illuminate\Mail\Mailer::later($delay, $view, $data, $callback, $queue);
        }
        
        /**
         * Queue a new e-mail message for sending after (n) seconds on the given queue.
         *
         * @param string $queue
         * @param int $delay
         * @param string|array $view
         * @param array $data
         * @param \Closure|string $callback
         * @return mixed 
         * @static 
         */
        public static function laterOn($queue, $delay, $view, $data, $callback)
        {
            return \Illuminate\Mail\Mailer::laterOn($queue, $delay, $view, $data, $callback);
        }
        
        /**
         * Get the view factory instance.
         *
         * @return \Illuminate\Contracts\View\Factory 
         * @static 
         */
        public static function getViewFactory()
        {
            return \Illuminate\Mail\Mailer::getViewFactory();
        }
        
        /**
         * Get the Swift Mailer instance.
         *
         * @return \Swift_Mailer 
         * @static 
         */
        public static function getSwiftMailer()
        {
            return \Illuminate\Mail\Mailer::getSwiftMailer();
        }
        
        /**
         * Get the array of failed recipients.
         *
         * @return array 
         * @static 
         */
        public static function failures()
        {
            return \Illuminate\Mail\Mailer::failures();
        }
        
        /**
         * Set the Swift Mailer instance.
         *
         * @param \Swift_Mailer $swift
         * @return void 
         * @static 
         */
        public static function setSwiftMailer($swift)
        {
            \Illuminate\Mail\Mailer::setSwiftMailer($swift);
        }
        
        /**
         * Set the queue manager instance.
         *
         * @param \Illuminate\Contracts\Queue\Queue $queue
         * @return $this 
         * @static 
         */
        public static function setQueue($queue)
        {
            return \Illuminate\Mail\Mailer::setQueue($queue);
        }
        
        /**
         * Set the IoC container instance.
         *
         * @param \Illuminate\Contracts\Container\Container $container
         * @return void 
         * @static 
         */
        public static function setContainer($container)
        {
            \Illuminate\Mail\Mailer::setContainer($container);
        }
        
    }         

    class Notification {
        
        /**
         * Send the given notification to the given notifiable entities.
         *
         * @param \Illuminate\Support\Collection|array|mixed $notifiables
         * @param mixed $notification
         * @return void 
         * @static 
         */
        public static function send($notifiables, $notification)
        {
            \Illuminate\Notifications\ChannelManager::send($notifiables, $notification);
        }
        
        /**
         * Send the given notification immediately.
         *
         * @param \Illuminate\Support\Collection|array|mixed $notifiables
         * @param mixed $notification
         * @return void 
         * @static 
         */
        public static function sendNow($notifiables, $notification, $channels = null)
        {
            \Illuminate\Notifications\ChannelManager::sendNow($notifiables, $notification, $channels);
        }
        
        /**
         * Get a channel instance.
         *
         * @param string|null $name
         * @return mixed 
         * @static 
         */
        public static function channel($name = null)
        {
            return \Illuminate\Notifications\ChannelManager::channel($name);
        }
        
        /**
         * Get the default channel driver name.
         *
         * @return string 
         * @static 
         */
        public static function getDefaultDriver()
        {
            return \Illuminate\Notifications\ChannelManager::getDefaultDriver();
        }
        
        /**
         * Get the default channel driver name.
         *
         * @return string 
         * @static 
         */
        public static function deliversVia()
        {
            return \Illuminate\Notifications\ChannelManager::deliversVia();
        }
        
        /**
         * Set the default channel driver name.
         *
         * @param string $channel
         * @return void 
         * @static 
         */
        public static function deliverVia($channel)
        {
            \Illuminate\Notifications\ChannelManager::deliverVia($channel);
        }
        
        /**
         * Get a driver instance.
         *
         * @param string $driver
         * @return mixed 
         * @static 
         */
        public static function driver($driver = null)
        {
            //Method inherited from \Illuminate\Support\Manager            
            return \Illuminate\Notifications\ChannelManager::driver($driver);
        }
        
        /**
         * Register a custom driver creator Closure.
         *
         * @param string $driver
         * @param \Closure $callback
         * @return $this 
         * @static 
         */
        public static function extend($driver, $callback)
        {
            //Method inherited from \Illuminate\Support\Manager            
            return \Illuminate\Notifications\ChannelManager::extend($driver, $callback);
        }
        
        /**
         * Get all of the created "drivers".
         *
         * @return array 
         * @static 
         */
        public static function getDrivers()
        {
            //Method inherited from \Illuminate\Support\Manager            
            return \Illuminate\Notifications\ChannelManager::getDrivers();
        }
        
    }         

    class Password {
        
        /**
         * Attempt to get the broker from the local cache.
         *
         * @param string $name
         * @return \Illuminate\Contracts\Auth\PasswordBroker 
         * @static 
         */
        public static function broker($name = null)
        {
            return \Illuminate\Auth\Passwords\PasswordBrokerManager::broker($name);
        }
        
        /**
         * Get the default password broker name.
         *
         * @return string 
         * @static 
         */
        public static function getDefaultDriver()
        {
            return \Illuminate\Auth\Passwords\PasswordBrokerManager::getDefaultDriver();
        }
        
        /**
         * Set the default password broker name.
         *
         * @param string $name
         * @return void 
         * @static 
         */
        public static function setDefaultDriver($name)
        {
            \Illuminate\Auth\Passwords\PasswordBrokerManager::setDefaultDriver($name);
        }
        
    }         

    class Queue {
        
        /**
         * Register an event listener for the before job event.
         *
         * @param mixed $callback
         * @return void 
         * @static 
         */
        public static function before($callback)
        {
            \Illuminate\Queue\QueueManager::before($callback);
        }
        
        /**
         * Register an event listener for the after job event.
         *
         * @param mixed $callback
         * @return void 
         * @static 
         */
        public static function after($callback)
        {
            \Illuminate\Queue\QueueManager::after($callback);
        }
        
        /**
         * Register an event listener for the exception occurred job event.
         *
         * @param mixed $callback
         * @return void 
         * @static 
         */
        public static function exceptionOccurred($callback)
        {
            \Illuminate\Queue\QueueManager::exceptionOccurred($callback);
        }
        
        /**
         * Register an event listener for the daemon queue loop.
         *
         * @param mixed $callback
         * @return void 
         * @static 
         */
        public static function looping($callback)
        {
            \Illuminate\Queue\QueueManager::looping($callback);
        }
        
        /**
         * Register an event listener for the failed job event.
         *
         * @param mixed $callback
         * @return void 
         * @static 
         */
        public static function failing($callback)
        {
            \Illuminate\Queue\QueueManager::failing($callback);
        }
        
        /**
         * Register an event listener for the daemon queue stopping.
         *
         * @param mixed $callback
         * @return void 
         * @static 
         */
        public static function stopping($callback)
        {
            \Illuminate\Queue\QueueManager::stopping($callback);
        }
        
        /**
         * Determine if the driver is connected.
         *
         * @param string $name
         * @return bool 
         * @static 
         */
        public static function connected($name = null)
        {
            return \Illuminate\Queue\QueueManager::connected($name);
        }
        
        /**
         * Resolve a queue connection instance.
         *
         * @param string $name
         * @return \Illuminate\Contracts\Queue\Queue 
         * @static 
         */
        public static function connection($name = null)
        {
            return \Illuminate\Queue\QueueManager::connection($name);
        }
        
        /**
         * Add a queue connection resolver.
         *
         * @param string $driver
         * @param \Closure $resolver
         * @return void 
         * @static 
         */
        public static function extend($driver, $resolver)
        {
            \Illuminate\Queue\QueueManager::extend($driver, $resolver);
        }
        
        /**
         * Add a queue connection resolver.
         *
         * @param string $driver
         * @param \Closure $resolver
         * @return void 
         * @static 
         */
        public static function addConnector($driver, $resolver)
        {
            \Illuminate\Queue\QueueManager::addConnector($driver, $resolver);
        }
        
        /**
         * Get the name of the default queue connection.
         *
         * @return string 
         * @static 
         */
        public static function getDefaultDriver()
        {
            return \Illuminate\Queue\QueueManager::getDefaultDriver();
        }
        
        /**
         * Set the name of the default queue connection.
         *
         * @param string $name
         * @return void 
         * @static 
         */
        public static function setDefaultDriver($name)
        {
            \Illuminate\Queue\QueueManager::setDefaultDriver($name);
        }
        
        /**
         * Get the full name for the given connection.
         *
         * @param string $connection
         * @return string 
         * @static 
         */
        public static function getName($connection = null)
        {
            return \Illuminate\Queue\QueueManager::getName($connection);
        }
        
        /**
         * Determine if the application is in maintenance mode.
         *
         * @return bool 
         * @static 
         */
        public static function isDownForMaintenance()
        {
            return \Illuminate\Queue\QueueManager::isDownForMaintenance();
        }
        
        /**
         * Get the size of the queue.
         *
         * @param string $queue
         * @return int 
         * @static 
         */
        public static function size($queue = null)
        {
            return \Illuminate\Queue\SyncQueue::size($queue);
        }
        
        /**
         * Push a new job onto the queue.
         *
         * @param string $job
         * @param mixed $data
         * @param string $queue
         * @return mixed 
         * @throws \Exception|\Throwable
         * @static 
         */
        public static function push($job, $data = '', $queue = null)
        {
            return \Illuminate\Queue\SyncQueue::push($job, $data, $queue);
        }
        
        /**
         * Push a raw payload onto the queue.
         *
         * @param string $payload
         * @param string $queue
         * @param array $options
         * @return mixed 
         * @static 
         */
        public static function pushRaw($payload, $queue = null, $options = array())
        {
            return \Illuminate\Queue\SyncQueue::pushRaw($payload, $queue, $options);
        }
        
        /**
         * Push a new job onto the queue after a delay.
         *
         * @param \DateTime|int $delay
         * @param string $job
         * @param mixed $data
         * @param string $queue
         * @return mixed 
         * @static 
         */
        public static function later($delay, $job, $data = '', $queue = null)
        {
            return \Illuminate\Queue\SyncQueue::later($delay, $job, $data, $queue);
        }
        
        /**
         * Pop the next job off of the queue.
         *
         * @param string $queue
         * @return \Illuminate\Contracts\Queue\Job|null 
         * @static 
         */
        public static function pop($queue = null)
        {
            return \Illuminate\Queue\SyncQueue::pop($queue);
        }
        
        /**
         * Push a new job onto the queue.
         *
         * @param string $queue
         * @param string $job
         * @param mixed $data
         * @return mixed 
         * @static 
         */
        public static function pushOn($queue, $job, $data = '')
        {
            //Method inherited from \Illuminate\Queue\Queue            
            return \Illuminate\Queue\SyncQueue::pushOn($queue, $job, $data);
        }
        
        /**
         * Push a new job onto the queue after a delay.
         *
         * @param string $queue
         * @param \DateTime|int $delay
         * @param string $job
         * @param mixed $data
         * @return mixed 
         * @static 
         */
        public static function laterOn($queue, $delay, $job, $data = '')
        {
            //Method inherited from \Illuminate\Queue\Queue            
            return \Illuminate\Queue\SyncQueue::laterOn($queue, $delay, $job, $data);
        }
        
        /**
         * Push an array of jobs onto the queue.
         *
         * @param array $jobs
         * @param mixed $data
         * @param string $queue
         * @return mixed 
         * @static 
         */
        public static function bulk($jobs, $data = '', $queue = null)
        {
            //Method inherited from \Illuminate\Queue\Queue            
            return \Illuminate\Queue\SyncQueue::bulk($jobs, $data, $queue);
        }
        
        /**
         * Set the IoC container instance.
         *
         * @param \Illuminate\Container\Container $container
         * @return void 
         * @static 
         */
        public static function setContainer($container)
        {
            //Method inherited from \Illuminate\Queue\Queue            
            \Illuminate\Queue\SyncQueue::setContainer($container);
        }
        
    }         

    class Redirect {
        
        /**
         * Create a new redirect response to the "home" route.
         *
         * @param int $status
         * @return \Illuminate\Http\RedirectResponse 
         * @static 
         */
        public static function home($status = 302)
        {
            return \Illuminate\Routing\Redirector::home($status);
        }
        
        /**
         * Create a new redirect response to the previous location.
         *
         * @param int $status
         * @param array $headers
         * @param string $fallback
         * @return \Illuminate\Http\RedirectResponse 
         * @static 
         */
        public static function back($status = 302, $headers = array(), $fallback = false)
        {
            return \Illuminate\Routing\Redirector::back($status, $headers, $fallback);
        }
        
        /**
         * Create a new redirect response to the current URI.
         *
         * @param int $status
         * @param array $headers
         * @return \Illuminate\Http\RedirectResponse 
         * @static 
         */
        public static function refresh($status = 302, $headers = array())
        {
            return \Illuminate\Routing\Redirector::refresh($status, $headers);
        }
        
        /**
         * Create a new redirect response, while putting the current URL in the session.
         *
         * @param string $path
         * @param int $status
         * @param array $headers
         * @param bool $secure
         * @return \Illuminate\Http\RedirectResponse 
         * @static 
         */
        public static function guest($path, $status = 302, $headers = array(), $secure = null)
        {
            return \Illuminate\Routing\Redirector::guest($path, $status, $headers, $secure);
        }
        
        /**
         * Create a new redirect response to the previously intended location.
         *
         * @param string $default
         * @param int $status
         * @param array $headers
         * @param bool $secure
         * @return \Illuminate\Http\RedirectResponse 
         * @static 
         */
        public static function intended($default = '/', $status = 302, $headers = array(), $secure = null)
        {
            return \Illuminate\Routing\Redirector::intended($default, $status, $headers, $secure);
        }
        
        /**
         * Create a new redirect response to the given path.
         *
         * @param string $path
         * @param int $status
         * @param array $headers
         * @param bool $secure
         * @return \Illuminate\Http\RedirectResponse 
         * @static 
         */
        public static function to($path, $status = 302, $headers = array(), $secure = null)
        {
            return \Illuminate\Routing\Redirector::to($path, $status, $headers, $secure);
        }
        
        /**
         * Create a new redirect response to an external URL (no validation).
         *
         * @param string $path
         * @param int $status
         * @param array $headers
         * @return \Illuminate\Http\RedirectResponse 
         * @static 
         */
        public static function away($path, $status = 302, $headers = array())
        {
            return \Illuminate\Routing\Redirector::away($path, $status, $headers);
        }
        
        /**
         * Create a new redirect response to the given HTTPS path.
         *
         * @param string $path
         * @param int $status
         * @param array $headers
         * @return \Illuminate\Http\RedirectResponse 
         * @static 
         */
        public static function secure($path, $status = 302, $headers = array())
        {
            return \Illuminate\Routing\Redirector::secure($path, $status, $headers);
        }
        
        /**
         * Create a new redirect response to a named route.
         *
         * @param string $route
         * @param array $parameters
         * @param int $status
         * @param array $headers
         * @return \Illuminate\Http\RedirectResponse 
         * @static 
         */
        public static function route($route, $parameters = array(), $status = 302, $headers = array())
        {
            return \Illuminate\Routing\Redirector::route($route, $parameters, $status, $headers);
        }
        
        /**
         * Create a new redirect response to a controller action.
         *
         * @param string $action
         * @param array $parameters
         * @param int $status
         * @param array $headers
         * @return \Illuminate\Http\RedirectResponse 
         * @static 
         */
        public static function action($action, $parameters = array(), $status = 302, $headers = array())
        {
            return \Illuminate\Routing\Redirector::action($action, $parameters, $status, $headers);
        }
        
        /**
         * Get the URL generator instance.
         *
         * @return \Illuminate\Routing\UrlGenerator 
         * @static 
         */
        public static function getUrlGenerator()
        {
            return \Illuminate\Routing\Redirector::getUrlGenerator();
        }
        
        /**
         * Set the active session store.
         *
         * @param \Illuminate\Session\Store $session
         * @return void 
         * @static 
         */
        public static function setSession($session)
        {
            \Illuminate\Routing\Redirector::setSession($session);
        }
        
    }         

    class Redis {
        
        /**
         * Get a specific Redis connection instance.
         *
         * @param string $name
         * @return \Predis\ClientInterface|null 
         * @static 
         */
        public static function connection($name = 'default')
        {
            return \Illuminate\Redis\Database::connection($name);
        }
        
        /**
         * Run a command against the Redis database.
         *
         * @param string $method
         * @param array $parameters
         * @return mixed 
         * @static 
         */
        public static function command($method, $parameters = array())
        {
            return \Illuminate\Redis\Database::command($method, $parameters);
        }
        
        /**
         * Subscribe to a set of given channels for messages.
         *
         * @param array|string $channels
         * @param \Closure $callback
         * @param string $connection
         * @param string $method
         * @return void 
         * @static 
         */
        public static function subscribe($channels, $callback, $connection = null, $method = 'subscribe')
        {
            \Illuminate\Redis\Database::subscribe($channels, $callback, $connection, $method);
        }
        
        /**
         * Subscribe to a set of given channels with wildcards.
         *
         * @param array|string $channels
         * @param \Closure $callback
         * @param string $connection
         * @return void 
         * @static 
         */
        public static function psubscribe($channels, $callback, $connection = null)
        {
            \Illuminate\Redis\Database::psubscribe($channels, $callback, $connection);
        }
        
    }         

    class Request {
        
        /**
         * Create a new Illuminate HTTP request from server variables.
         *
         * @return static 
         * @static 
         */
        public static function capture()
        {
            return \Illuminate\Http\Request::capture();
        }
        
        /**
         * Return the Request instance.
         *
         * @return $this 
         * @static 
         */
        public static function instance()
        {
            return \Illuminate\Http\Request::instance();
        }
        
        /**
         * Get the request method.
         *
         * @return string 
         * @static 
         */
        public static function method()
        {
            return \Illuminate\Http\Request::method();
        }
        
        /**
         * Get the root URL for the application.
         *
         * @return string 
         * @static 
         */
        public static function root()
        {
            return \Illuminate\Http\Request::root();
        }
        
        /**
         * Get the URL (no query string) for the request.
         *
         * @return string 
         * @static 
         */
        public static function url()
        {
            return \Illuminate\Http\Request::url();
        }
        
        /**
         * Get the full URL for the request.
         *
         * @return string 
         * @static 
         */
        public static function fullUrl()
        {
            return \Illuminate\Http\Request::fullUrl();
        }
        
        /**
         * Get the full URL for the request with the added query string parameters.
         *
         * @param array $query
         * @return string 
         * @static 
         */
        public static function fullUrlWithQuery($query)
        {
            return \Illuminate\Http\Request::fullUrlWithQuery($query);
        }
        
        /**
         * Get the current path info for the request.
         *
         * @return string 
         * @static 
         */
        public static function path()
        {
            return \Illuminate\Http\Request::path();
        }
        
        /**
         * Get the current encoded path info for the request.
         *
         * @return string 
         * @static 
         */
        public static function decodedPath()
        {
            return \Illuminate\Http\Request::decodedPath();
        }
        
        /**
         * Get a segment from the URI (1 based index).
         *
         * @param int $index
         * @param string|null $default
         * @return string|null 
         * @static 
         */
        public static function segment($index, $default = null)
        {
            return \Illuminate\Http\Request::segment($index, $default);
        }
        
        /**
         * Get all of the segments for the request path.
         *
         * @return array 
         * @static 
         */
        public static function segments()
        {
            return \Illuminate\Http\Request::segments();
        }
        
        /**
         * Determine if the current request URI matches a pattern.
         *
         * @return bool 
         * @static 
         */
        public static function is()
        {
            return \Illuminate\Http\Request::is();
        }
        
        /**
         * Determine if the current request URL and query string matches a pattern.
         *
         * @return bool 
         * @static 
         */
        public static function fullUrlIs()
        {
            return \Illuminate\Http\Request::fullUrlIs();
        }
        
        /**
         * Determine if the request is the result of an AJAX call.
         *
         * @return bool 
         * @static 
         */
        public static function ajax()
        {
            return \Illuminate\Http\Request::ajax();
        }
        
        /**
         * Determine if the request is the result of an PJAX call.
         *
         * @return bool 
         * @static 
         */
        public static function pjax()
        {
            return \Illuminate\Http\Request::pjax();
        }
        
        /**
         * Determine if the request is over HTTPS.
         *
         * @return bool 
         * @static 
         */
        public static function secure()
        {
            return \Illuminate\Http\Request::secure();
        }
        
        /**
         * Returns the client IP address.
         *
         * @return string 
         * @static 
         */
        public static function ip()
        {
            return \Illuminate\Http\Request::ip();
        }
        
        /**
         * Returns the client IP addresses.
         *
         * @return array 
         * @static 
         */
        public static function ips()
        {
            return \Illuminate\Http\Request::ips();
        }
        
        /**
         * Determine if the request contains a given input item key.
         *
         * @param string|array $key
         * @return bool 
         * @static 
         */
        public static function exists($key)
        {
            return \Illuminate\Http\Request::exists($key);
        }
        
        /**
         * Determine if the request contains a non-empty value for an input item.
         *
         * @param string|array $key
         * @return bool 
         * @static 
         */
        public static function has($key)
        {
            return \Illuminate\Http\Request::has($key);
        }
        
        /**
         * Get all of the input and files for the request.
         *
         * @return array 
         * @static 
         */
        public static function all()
        {
            return \Illuminate\Http\Request::all();
        }
        
        /**
         * Retrieve an input item from the request.
         *
         * @param string $key
         * @param string|array|null $default
         * @return string|array 
         * @static 
         */
        public static function input($key = null, $default = null)
        {
            return \Illuminate\Http\Request::input($key, $default);
        }
        
        /**
         * Get a subset containing the provided keys with values from the input data.
         *
         * @param array|mixed $keys
         * @return array 
         * @static 
         */
        public static function only($keys)
        {
            return \Illuminate\Http\Request::only($keys);
        }
        
        /**
         * Get all of the input except for a specified array of items.
         *
         * @param array|mixed $keys
         * @return array 
         * @static 
         */
        public static function except($keys)
        {
            return \Illuminate\Http\Request::except($keys);
        }
        
        /**
         * Intersect an array of items with the input data.
         *
         * @param array|mixed $keys
         * @return array 
         * @static 
         */
        public static function intersect($keys)
        {
            return \Illuminate\Http\Request::intersect($keys);
        }
        
        /**
         * Retrieve a query string item from the request.
         *
         * @param string $key
         * @param string|array|null $default
         * @return string|array 
         * @static 
         */
        public static function query($key = null, $default = null)
        {
            return \Illuminate\Http\Request::query($key, $default);
        }
        
        /**
         * Determine if a cookie is set on the request.
         *
         * @param string $key
         * @return bool 
         * @static 
         */
        public static function hasCookie($key)
        {
            return \Illuminate\Http\Request::hasCookie($key);
        }
        
        /**
         * Retrieve a cookie from the request.
         *
         * @param string $key
         * @param string|array|null $default
         * @return string|array 
         * @static 
         */
        public static function cookie($key = null, $default = null)
        {
            return \Illuminate\Http\Request::cookie($key, $default);
        }
        
        /**
         * Get an array of all of the files on the request.
         *
         * @return array 
         * @static 
         */
        public static function allFiles()
        {
            return \Illuminate\Http\Request::allFiles();
        }
        
        /**
         * Retrieve a file from the request.
         *
         * @param string $key
         * @param mixed $default
         * @return \Illuminate\Http\UploadedFile|array|null 
         * @static 
         */
        public static function file($key = null, $default = null)
        {
            return \Illuminate\Http\Request::file($key, $default);
        }
        
        /**
         * Determine if the uploaded data contains a file.
         *
         * @param string $key
         * @return bool 
         * @static 
         */
        public static function hasFile($key)
        {
            return \Illuminate\Http\Request::hasFile($key);
        }
        
        /**
         * Determine if a header is set on the request.
         *
         * @param string $key
         * @return bool 
         * @static 
         */
        public static function hasHeader($key)
        {
            return \Illuminate\Http\Request::hasHeader($key);
        }
        
        /**
         * Retrieve a header from the request.
         *
         * @param string $key
         * @param string|array|null $default
         * @return string|array 
         * @static 
         */
        public static function header($key = null, $default = null)
        {
            return \Illuminate\Http\Request::header($key, $default);
        }
        
        /**
         * Retrieve a server variable from the request.
         *
         * @param string $key
         * @param string|array|null $default
         * @return string|array 
         * @static 
         */
        public static function server($key = null, $default = null)
        {
            return \Illuminate\Http\Request::server($key, $default);
        }
        
        /**
         * Retrieve an old input item.
         *
         * @param string $key
         * @param string|array|null $default
         * @return string|array 
         * @static 
         */
        public static function old($key = null, $default = null)
        {
            return \Illuminate\Http\Request::old($key, $default);
        }
        
        /**
         * Flash the input for the current request to the session.
         *
         * @param string $filter
         * @param array $keys
         * @return void 
         * @static 
         */
        public static function flash($filter = null, $keys = array())
        {
            \Illuminate\Http\Request::flash($filter, $keys);
        }
        
        /**
         * Flash only some of the input to the session.
         *
         * @param array|mixed $keys
         * @return void 
         * @static 
         */
        public static function flashOnly($keys)
        {
            \Illuminate\Http\Request::flashOnly($keys);
        }
        
        /**
         * Flash only some of the input to the session.
         *
         * @param array|mixed $keys
         * @return void 
         * @static 
         */
        public static function flashExcept($keys)
        {
            \Illuminate\Http\Request::flashExcept($keys);
        }
        
        /**
         * Flush all of the old input from the session.
         *
         * @return void 
         * @static 
         */
        public static function flush()
        {
            \Illuminate\Http\Request::flush();
        }
        
        /**
         * Merge new input into the current request's input array.
         *
         * @param array $input
         * @return void 
         * @static 
         */
        public static function merge($input)
        {
            \Illuminate\Http\Request::merge($input);
        }
        
        /**
         * Replace the input for the current request.
         *
         * @param array $input
         * @return void 
         * @static 
         */
        public static function replace($input)
        {
            \Illuminate\Http\Request::replace($input);
        }
        
        /**
         * Get the JSON payload for the request.
         *
         * @param string $key
         * @param mixed $default
         * @return mixed 
         * @static 
         */
        public static function json($key = null, $default = null)
        {
            return \Illuminate\Http\Request::json($key, $default);
        }
        
        /**
         * Determine if the given content types match.
         *
         * @param string $actual
         * @param string $type
         * @return bool 
         * @static 
         */
        public static function matchesType($actual, $type)
        {
            return \Illuminate\Http\Request::matchesType($actual, $type);
        }
        
        /**
         * Determine if the request is sending JSON.
         *
         * @return bool 
         * @static 
         */
        public static function isJson()
        {
            return \Illuminate\Http\Request::isJson();
        }
        
        /**
         * Determine if the current request probably expects a JSON response.
         *
         * @return bool 
         * @static 
         */
        public static function expectsJson()
        {
            return \Illuminate\Http\Request::expectsJson();
        }
        
        /**
         * Determine if the current request is asking for JSON in return.
         *
         * @return bool 
         * @static 
         */
        public static function wantsJson()
        {
            return \Illuminate\Http\Request::wantsJson();
        }
        
        /**
         * Determines whether the current requests accepts a given content type.
         *
         * @param string|array $contentTypes
         * @return bool 
         * @static 
         */
        public static function accepts($contentTypes)
        {
            return \Illuminate\Http\Request::accepts($contentTypes);
        }
        
        /**
         * Return the most suitable content type from the given array based on content negotiation.
         *
         * @param string|array $contentTypes
         * @return string|null 
         * @static 
         */
        public static function prefers($contentTypes)
        {
            return \Illuminate\Http\Request::prefers($contentTypes);
        }
        
        /**
         * Determines whether a request accepts JSON.
         *
         * @return bool 
         * @static 
         */
        public static function acceptsJson()
        {
            return \Illuminate\Http\Request::acceptsJson();
        }
        
        /**
         * Determines whether a request accepts HTML.
         *
         * @return bool 
         * @static 
         */
        public static function acceptsHtml()
        {
            return \Illuminate\Http\Request::acceptsHtml();
        }
        
        /**
         * Get the data format expected in the response.
         *
         * @param string $default
         * @return string 
         * @static 
         */
        public static function format($default = 'html')
        {
            return \Illuminate\Http\Request::format($default);
        }
        
        /**
         * Get the bearer token from the request headers.
         *
         * @return string|null 
         * @static 
         */
        public static function bearerToken()
        {
            return \Illuminate\Http\Request::bearerToken();
        }
        
        /**
         * Create an Illuminate request from a Symfony instance.
         *
         * @param \Symfony\Component\HttpFoundation\Request $request
         * @return \Illuminate\Http\Request 
         * @static 
         */
        public static function createFromBase($request)
        {
            return \Illuminate\Http\Request::createFromBase($request);
        }
        
        /**
         * Clones a request and overrides some of its parameters.
         *
         * @param array $query The GET parameters
         * @param array $request The POST parameters
         * @param array $attributes The request attributes (parameters parsed from the PATH_INFO, ...)
         * @param array $cookies The COOKIE parameters
         * @param array $files The FILES parameters
         * @param array $server The SERVER parameters
         * @return static 
         * @static 
         */
        public static function duplicate($query = null, $request = null, $attributes = null, $cookies = null, $files = null, $server = null)
        {
            return \Illuminate\Http\Request::duplicate($query, $request, $attributes, $cookies, $files, $server);
        }
        
        /**
         * Get the session associated with the request.
         *
         * @return \Illuminate\Session\Store 
         * @throws \RuntimeException
         * @static 
         */
        public static function session()
        {
            return \Illuminate\Http\Request::session();
        }
        
        /**
         * Get the user making the request.
         *
         * @param string|null $guard
         * @return mixed 
         * @static 
         */
        public static function user($guard = null)
        {
            return \Illuminate\Http\Request::user($guard);
        }
        
        /**
         * Get the route handling the request.
         *
         * @param string|null $param
         * @return \Illuminate\Routing\Route|object|string 
         * @static 
         */
        public static function route($param = null)
        {
            return \Illuminate\Http\Request::route($param);
        }
        
        /**
         * Get a unique fingerprint for the request / route / IP address.
         *
         * @return string 
         * @throws \RuntimeException
         * @static 
         */
        public static function fingerprint()
        {
            return \Illuminate\Http\Request::fingerprint();
        }
        
        /**
         * Get the user resolver callback.
         *
         * @return \Closure 
         * @static 
         */
        public static function getUserResolver()
        {
            return \Illuminate\Http\Request::getUserResolver();
        }
        
        /**
         * Set the user resolver callback.
         *
         * @param \Closure $callback
         * @return $this 
         * @static 
         */
        public static function setUserResolver($callback)
        {
            return \Illuminate\Http\Request::setUserResolver($callback);
        }
        
        /**
         * Get the route resolver callback.
         *
         * @return \Closure 
         * @static 
         */
        public static function getRouteResolver()
        {
            return \Illuminate\Http\Request::getRouteResolver();
        }
        
        /**
         * Set the route resolver callback.
         *
         * @param \Closure $callback
         * @return $this 
         * @static 
         */
        public static function setRouteResolver($callback)
        {
            return \Illuminate\Http\Request::setRouteResolver($callback);
        }
        
        /**
         * Get all of the input and files for the request.
         *
         * @return array 
         * @static 
         */
        public static function toArray()
        {
            return \Illuminate\Http\Request::toArray();
        }
        
        /**
         * Determine if the given offset exists.
         *
         * @param string $offset
         * @return bool 
         * @static 
         */
        public static function offsetExists($offset)
        {
            return \Illuminate\Http\Request::offsetExists($offset);
        }
        
        /**
         * Get the value at the given offset.
         *
         * @param string $offset
         * @return mixed 
         * @static 
         */
        public static function offsetGet($offset)
        {
            return \Illuminate\Http\Request::offsetGet($offset);
        }
        
        /**
         * Set the value at the given offset.
         *
         * @param string $offset
         * @param mixed $value
         * @return void 
         * @static 
         */
        public static function offsetSet($offset, $value)
        {
            \Illuminate\Http\Request::offsetSet($offset, $value);
        }
        
        /**
         * Remove the value at the given offset.
         *
         * @param string $offset
         * @return void 
         * @static 
         */
        public static function offsetUnset($offset)
        {
            \Illuminate\Http\Request::offsetUnset($offset);
        }
        
        /**
         * Sets the parameters for this request.
         * 
         * This method also re-initializes all properties.
         *
         * @param array $query The GET parameters
         * @param array $request The POST parameters
         * @param array $attributes The request attributes (parameters parsed from the PATH_INFO, ...)
         * @param array $cookies The COOKIE parameters
         * @param array $files The FILES parameters
         * @param array $server The SERVER parameters
         * @param string|resource $content The raw body data
         * @static 
         */
        public static function initialize($query = array(), $request = array(), $attributes = array(), $cookies = array(), $files = array(), $server = array(), $content = null)
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
            return \Illuminate\Http\Request::initialize($query, $request, $attributes, $cookies, $files, $server, $content);
        }
        
        /**
         * Creates a new request with values from PHP's super globals.
         *
         * @return static 
         * @static 
         */
        public static function createFromGlobals()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
            return \Illuminate\Http\Request::createFromGlobals();
        }
        
        /**
         * Creates a Request based on a given URI and configuration.
         * 
         * The information contained in the URI always take precedence
         * over the other information (server and parameters).
         *
         * @param string $uri The URI
         * @param string $method The HTTP method
         * @param array $parameters The query (GET) or request (POST) parameters
         * @param array $cookies The request cookies ($_COOKIE)
         * @param array $files The request files ($_FILES)
         * @param array $server The server parameters ($_SERVER)
         * @param string $content The raw body data
         * @return static 
         * @static 
         */
        public static function create($uri, $method = 'GET', $parameters = array(), $cookies = array(), $files = array(), $server = array(), $content = null)
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
            return \Illuminate\Http\Request::create($uri, $method, $parameters, $cookies, $files, $server, $content);
        }
        
        /**
         * Sets a callable able to create a Request instance.
         * 
         * This is mainly useful when you need to override the Request class
         * to keep BC with an existing system. It should not be used for any
         * other purpose.
         *
         * @param callable|null $callable A PHP callable
         * @static 
         */
        public static function setFactory($callable)
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
            return \Illuminate\Http\Request::setFactory($callable);
        }
        
        /**
         * Overrides the PHP global variables according to this request instance.
         * 
         * It overrides $_GET, $_POST, $_REQUEST, $_SERVER, $_COOKIE.
         * $_FILES is never overridden, see rfc1867
         *
         * @static 
         */
        public static function overrideGlobals()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
            return \Illuminate\Http\Request::overrideGlobals();
        }
        
        /**
         * Sets a list of trusted proxies.
         * 
         * You should only list the reverse proxies that you manage directly.
         *
         * @param array $proxies A list of trusted proxies
         * @static 
         */
        public static function setTrustedProxies($proxies)
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
            return \Illuminate\Http\Request::setTrustedProxies($proxies);
        }
        
        /**
         * Gets the list of trusted proxies.
         *
         * @return array An array of trusted proxies
         * @static 
         */
        public static function getTrustedProxies()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
            return \Illuminate\Http\Request::getTrustedProxies();
        }
        
        /**
         * Sets a list of trusted host patterns.
         * 
         * You should only list the hosts you manage using regexs.
         *
         * @param array $hostPatterns A list of trusted host patterns
         * @static 
         */
        public static function setTrustedHosts($hostPatterns)
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
            return \Illuminate\Http\Request::setTrustedHosts($hostPatterns);
        }
        
        /**
         * Gets the list of trusted host patterns.
         *
         * @return array An array of trusted host patterns
         * @static 
         */
        public static function getTrustedHosts()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
            return \Illuminate\Http\Request::getTrustedHosts();
        }
        
        /**
         * Sets the name for trusted headers.
         * 
         * The following header keys are supported:
         * 
         *  * Request::HEADER_CLIENT_IP:    defaults to X-Forwarded-For   (see getClientIp())
         *  * Request::HEADER_CLIENT_HOST:  defaults to X-Forwarded-Host  (see getHost())
         *  * Request::HEADER_CLIENT_PORT:  defaults to X-Forwarded-Port  (see getPort())
         *  * Request::HEADER_CLIENT_PROTO: defaults to X-Forwarded-Proto (see getScheme() and isSecure())
         * 
         * Setting an empty value allows to disable the trusted header for the given key.
         *
         * @param string $key The header key
         * @param string $value The header name
         * @throws \InvalidArgumentException
         * @static 
         */
        public static function setTrustedHeaderName($key, $value)
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
            return \Illuminate\Http\Request::setTrustedHeaderName($key, $value);
        }
        
        /**
         * Gets the trusted proxy header name.
         *
         * @param string $key The header key
         * @return string The header name
         * @throws \InvalidArgumentException
         * @static 
         */
        public static function getTrustedHeaderName($key)
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
            return \Illuminate\Http\Request::getTrustedHeaderName($key);
        }
        
        /**
         * Normalizes a query string.
         * 
         * It builds a normalized query string, where keys/value pairs are alphabetized,
         * have consistent escaping and unneeded delimiters are removed.
         *
         * @param string $qs Query string
         * @return string A normalized query string for the Request
         * @static 
         */
        public static function normalizeQueryString($qs)
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
            return \Illuminate\Http\Request::normalizeQueryString($qs);
        }
        
        /**
         * Enables support for the _method request parameter to determine the intended HTTP method.
         * 
         * Be warned that enabling this feature might lead to CSRF issues in your code.
         * Check that you are using CSRF tokens when required.
         * If the HTTP method parameter override is enabled, an html-form with method "POST" can be altered
         * and used to send a "PUT" or "DELETE" request via the _method request parameter.
         * If these methods are not protected against CSRF, this presents a possible vulnerability.
         * 
         * The HTTP method can only be overridden when the real HTTP method is POST.
         *
         * @static 
         */
        public static function enableHttpMethodParameterOverride()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
            return \Illuminate\Http\Request::enableHttpMethodParameterOverride();
        }
        
        /**
         * Checks whether support for the _method request parameter is enabled.
         *
         * @return bool True when the _method request parameter is enabled, false otherwise
         * @static 
         */
        public static function getHttpMethodParameterOverride()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
            return \Illuminate\Http\Request::getHttpMethodParameterOverride();
        }
        
        /**
         * Gets a "parameter" value from any bag.
         * 
         * This method is mainly useful for libraries that want to provide some flexibility. If you don't need the
         * flexibility in controllers, it is better to explicitly get request parameters from the appropriate
         * public property instead (attributes, query, request).
         * 
         * Order of precedence: PATH (routing placeholders or custom attributes), GET, BODY
         *
         * @param string $key the key
         * @param mixed $default the default value if the parameter key does not exist
         * @return mixed 
         * @static 
         */
        public static function get($key, $default = null)
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
            return \Illuminate\Http\Request::get($key, $default);
        }
        
        /**
         * Gets the Session.
         *
         * @return \Symfony\Component\HttpFoundation\SessionInterface|null The session
         * @static 
         */
        public static function getSession()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
            return \Illuminate\Http\Request::getSession();
        }
        
        /**
         * Whether the request contains a Session which was started in one of the
         * previous requests.
         *
         * @return bool 
         * @static 
         */
        public static function hasPreviousSession()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
            return \Illuminate\Http\Request::hasPreviousSession();
        }
        
        /**
         * Whether the request contains a Session object.
         * 
         * This method does not give any information about the state of the session object,
         * like whether the session is started or not. It is just a way to check if this Request
         * is associated with a Session instance.
         *
         * @return bool true when the Request contains a Session object, false otherwise
         * @static 
         */
        public static function hasSession()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
            return \Illuminate\Http\Request::hasSession();
        }
        
        /**
         * Sets the Session.
         *
         * @param \Symfony\Component\HttpFoundation\SessionInterface $session The Session
         * @static 
         */
        public static function setSession($session)
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
            return \Illuminate\Http\Request::setSession($session);
        }
        
        /**
         * Returns the client IP addresses.
         * 
         * In the returned array the most trusted IP address is first, and the
         * least trusted one last. The "real" client IP address is the last one,
         * but this is also the least trusted one. Trusted proxies are stripped.
         * 
         * Use this method carefully; you should use getClientIp() instead.
         *
         * @return array The client IP addresses
         * @see getClientIp()
         * @static 
         */
        public static function getClientIps()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
            return \Illuminate\Http\Request::getClientIps();
        }
        
        /**
         * Returns the client IP address.
         * 
         * This method can read the client IP address from the "X-Forwarded-For" header
         * when trusted proxies were set via "setTrustedProxies()". The "X-Forwarded-For"
         * header value is a comma+space separated list of IP addresses, the left-most
         * being the original client, and each successive proxy that passed the request
         * adding the IP address where it received the request from.
         * 
         * If your reverse proxy uses a different header name than "X-Forwarded-For",
         * ("Client-Ip" for instance), configure it via "setTrustedHeaderName()" with
         * the "client-ip" key.
         *
         * @return string The client IP address
         * @see getClientIps()
         * @see http://en.wikipedia.org/wiki/X-Forwarded-For
         * @static 
         */
        public static function getClientIp()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
            return \Illuminate\Http\Request::getClientIp();
        }
        
        /**
         * Returns current script name.
         *
         * @return string 
         * @static 
         */
        public static function getScriptName()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
            return \Illuminate\Http\Request::getScriptName();
        }
        
        /**
         * Returns the path being requested relative to the executed script.
         * 
         * The path info always starts with a /.
         * 
         * Suppose this request is instantiated from /mysite on localhost:
         * 
         *  * http://localhost/mysite              returns an empty string
         *  * http://localhost/mysite/about        returns '/about'
         *  * http://localhost/mysite/enco%20ded   returns '/enco%20ded'
         *  * http://localhost/mysite/about?var=1  returns '/about'
         *
         * @return string The raw path (i.e. not urldecoded)
         * @static 
         */
        public static function getPathInfo()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
            return \Illuminate\Http\Request::getPathInfo();
        }
        
        /**
         * Returns the root path from which this request is executed.
         * 
         * Suppose that an index.php file instantiates this request object:
         * 
         *  * http://localhost/index.php         returns an empty string
         *  * http://localhost/index.php/page    returns an empty string
         *  * http://localhost/web/index.php     returns '/web'
         *  * http://localhost/we%20b/index.php  returns '/we%20b'
         *
         * @return string The raw path (i.e. not urldecoded)
         * @static 
         */
        public static function getBasePath()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
            return \Illuminate\Http\Request::getBasePath();
        }
        
        /**
         * Returns the root URL from which this request is executed.
         * 
         * The base URL never ends with a /.
         * 
         * This is similar to getBasePath(), except that it also includes the
         * script filename (e.g. index.php) if one exists.
         *
         * @return string The raw URL (i.e. not urldecoded)
         * @static 
         */
        public static function getBaseUrl()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
            return \Illuminate\Http\Request::getBaseUrl();
        }
        
        /**
         * Gets the request's scheme.
         *
         * @return string 
         * @static 
         */
        public static function getScheme()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
            return \Illuminate\Http\Request::getScheme();
        }
        
        /**
         * Returns the port on which the request is made.
         * 
         * This method can read the client port from the "X-Forwarded-Port" header
         * when trusted proxies were set via "setTrustedProxies()".
         * 
         * The "X-Forwarded-Port" header must contain the client port.
         * 
         * If your reverse proxy uses a different header name than "X-Forwarded-Port",
         * configure it via "setTrustedHeaderName()" with the "client-port" key.
         *
         * @return string 
         * @static 
         */
        public static function getPort()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
            return \Illuminate\Http\Request::getPort();
        }
        
        /**
         * Returns the user.
         *
         * @return string|null 
         * @static 
         */
        public static function getUser()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
            return \Illuminate\Http\Request::getUser();
        }
        
        /**
         * Returns the password.
         *
         * @return string|null 
         * @static 
         */
        public static function getPassword()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
            return \Illuminate\Http\Request::getPassword();
        }
        
        /**
         * Gets the user info.
         *
         * @return string A user name and, optionally, scheme-specific information about how to gain authorization to access the server
         * @static 
         */
        public static function getUserInfo()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
            return \Illuminate\Http\Request::getUserInfo();
        }
        
        /**
         * Returns the HTTP host being requested.
         * 
         * The port name will be appended to the host if it's non-standard.
         *
         * @return string 
         * @static 
         */
        public static function getHttpHost()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
            return \Illuminate\Http\Request::getHttpHost();
        }
        
        /**
         * Returns the requested URI (path and query string).
         *
         * @return string The raw URI (i.e. not URI decoded)
         * @static 
         */
        public static function getRequestUri()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
            return \Illuminate\Http\Request::getRequestUri();
        }
        
        /**
         * Gets the scheme and HTTP host.
         * 
         * If the URL was called with basic authentication, the user
         * and the password are not added to the generated string.
         *
         * @return string The scheme and HTTP host
         * @static 
         */
        public static function getSchemeAndHttpHost()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
            return \Illuminate\Http\Request::getSchemeAndHttpHost();
        }
        
        /**
         * Generates a normalized URI (URL) for the Request.
         *
         * @return string A normalized URI (URL) for the Request
         * @see getQueryString()
         * @static 
         */
        public static function getUri()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
            return \Illuminate\Http\Request::getUri();
        }
        
        /**
         * Generates a normalized URI for the given path.
         *
         * @param string $path A path to use instead of the current one
         * @return string The normalized URI for the path
         * @static 
         */
        public static function getUriForPath($path)
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
            return \Illuminate\Http\Request::getUriForPath($path);
        }
        
        /**
         * Returns the path as relative reference from the current Request path.
         * 
         * Only the URIs path component (no schema, host etc.) is relevant and must be given.
         * Both paths must be absolute and not contain relative parts.
         * Relative URLs from one resource to another are useful when generating self-contained downloadable document archives.
         * Furthermore, they can be used to reduce the link size in documents.
         * 
         * Example target paths, given a base path of "/a/b/c/d":
         * - "/a/b/c/d"     -> ""
         * - "/a/b/c/"      -> "./"
         * - "/a/b/"        -> "../"
         * - "/a/b/c/other" -> "other"
         * - "/a/x/y"       -> "../../x/y"
         *
         * @param string $path The target path
         * @return string The relative target path
         * @static 
         */
        public static function getRelativeUriForPath($path)
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
            return \Illuminate\Http\Request::getRelativeUriForPath($path);
        }
        
        /**
         * Generates the normalized query string for the Request.
         * 
         * It builds a normalized query string, where keys/value pairs are alphabetized
         * and have consistent escaping.
         *
         * @return string|null A normalized query string for the Request
         * @static 
         */
        public static function getQueryString()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
            return \Illuminate\Http\Request::getQueryString();
        }
        
        /**
         * Checks whether the request is secure or not.
         * 
         * This method can read the client protocol from the "X-Forwarded-Proto" header
         * when trusted proxies were set via "setTrustedProxies()".
         * 
         * The "X-Forwarded-Proto" header must contain the protocol: "https" or "http".
         * 
         * If your reverse proxy uses a different header name than "X-Forwarded-Proto"
         * ("SSL_HTTPS" for instance), configure it via "setTrustedHeaderName()" with
         * the "client-proto" key.
         *
         * @return bool 
         * @static 
         */
        public static function isSecure()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
            return \Illuminate\Http\Request::isSecure();
        }
        
        /**
         * Returns the host name.
         * 
         * This method can read the client host name from the "X-Forwarded-Host" header
         * when trusted proxies were set via "setTrustedProxies()".
         * 
         * The "X-Forwarded-Host" header must contain the client host name.
         * 
         * If your reverse proxy uses a different header name than "X-Forwarded-Host",
         * configure it via "setTrustedHeaderName()" with the "client-host" key.
         *
         * @return string 
         * @throws \UnexpectedValueException when the host name is invalid
         * @static 
         */
        public static function getHost()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
            return \Illuminate\Http\Request::getHost();
        }
        
        /**
         * Sets the request method.
         *
         * @param string $method
         * @static 
         */
        public static function setMethod($method)
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
            return \Illuminate\Http\Request::setMethod($method);
        }
        
        /**
         * Gets the request "intended" method.
         * 
         * If the X-HTTP-Method-Override header is set, and if the method is a POST,
         * then it is used to determine the "real" intended HTTP method.
         * 
         * The _method request parameter can also be used to determine the HTTP method,
         * but only if enableHttpMethodParameterOverride() has been called.
         * 
         * The method is always an uppercased string.
         *
         * @return string The request method
         * @see getRealMethod()
         * @static 
         */
        public static function getMethod()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
            return \Illuminate\Http\Request::getMethod();
        }
        
        /**
         * Gets the "real" request method.
         *
         * @return string The request method
         * @see getMethod()
         * @static 
         */
        public static function getRealMethod()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
            return \Illuminate\Http\Request::getRealMethod();
        }
        
        /**
         * Gets the mime type associated with the format.
         *
         * @param string $format The format
         * @return string The associated mime type (null if not found)
         * @static 
         */
        public static function getMimeType($format)
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
            return \Illuminate\Http\Request::getMimeType($format);
        }
        
        /**
         * Gets the mime types associated with the format.
         *
         * @param string $format The format
         * @return array The associated mime types
         * @static 
         */
        public static function getMimeTypes($format)
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
            return \Illuminate\Http\Request::getMimeTypes($format);
        }
        
        /**
         * Gets the format associated with the mime type.
         *
         * @param string $mimeType The associated mime type
         * @return string|null The format (null if not found)
         * @static 
         */
        public static function getFormat($mimeType)
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
            return \Illuminate\Http\Request::getFormat($mimeType);
        }
        
        /**
         * Associates a format with mime types.
         *
         * @param string $format The format
         * @param string|array $mimeTypes The associated mime types (the preferred one must be the first as it will be used as the content type)
         * @static 
         */
        public static function setFormat($format, $mimeTypes)
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
            return \Illuminate\Http\Request::setFormat($format, $mimeTypes);
        }
        
        /**
         * Gets the request format.
         * 
         * Here is the process to determine the format:
         * 
         *  * format defined by the user (with setRequestFormat())
         *  * _format request attribute
         *  * $default
         *
         * @param string $default The default format
         * @return string The request format
         * @static 
         */
        public static function getRequestFormat($default = 'html')
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
            return \Illuminate\Http\Request::getRequestFormat($default);
        }
        
        /**
         * Sets the request format.
         *
         * @param string $format The request format
         * @static 
         */
        public static function setRequestFormat($format)
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
            return \Illuminate\Http\Request::setRequestFormat($format);
        }
        
        /**
         * Gets the format associated with the request.
         *
         * @return string|null The format (null if no content type is present)
         * @static 
         */
        public static function getContentType()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
            return \Illuminate\Http\Request::getContentType();
        }
        
        /**
         * Sets the default locale.
         *
         * @param string $locale
         * @static 
         */
        public static function setDefaultLocale($locale)
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
            return \Illuminate\Http\Request::setDefaultLocale($locale);
        }
        
        /**
         * Get the default locale.
         *
         * @return string 
         * @static 
         */
        public static function getDefaultLocale()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
            return \Illuminate\Http\Request::getDefaultLocale();
        }
        
        /**
         * Sets the locale.
         *
         * @param string $locale
         * @static 
         */
        public static function setLocale($locale)
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
            return \Illuminate\Http\Request::setLocale($locale);
        }
        
        /**
         * Get the locale.
         *
         * @return string 
         * @static 
         */
        public static function getLocale()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
            return \Illuminate\Http\Request::getLocale();
        }
        
        /**
         * Checks if the request method is of specified type.
         *
         * @param string $method Uppercase request method (GET, POST etc)
         * @return bool 
         * @static 
         */
        public static function isMethod($method)
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
            return \Illuminate\Http\Request::isMethod($method);
        }
        
        /**
         * Checks whether the method is safe or not.
         *
         * @see https://tools.ietf.org/html/rfc7231#section-4.2.1
         * @param bool $andCacheable Adds the additional condition that the method should be cacheable. True by default.
         * @return bool 
         * @static 
         */
        public static function isMethodSafe()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
            return \Illuminate\Http\Request::isMethodSafe();
        }
        
        /**
         * Checks whether the method is cacheable or not.
         *
         * @see https://tools.ietf.org/html/rfc7231#section-4.2.3
         * @return bool 
         * @static 
         */
        public static function isMethodCacheable()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
            return \Illuminate\Http\Request::isMethodCacheable();
        }
        
        /**
         * Returns the request body content.
         *
         * @param bool $asResource If true, a resource will be returned
         * @return string|resource The request body content or a resource to read the body stream
         * @throws \LogicException
         * @static 
         */
        public static function getContent($asResource = false)
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
            return \Illuminate\Http\Request::getContent($asResource);
        }
        
        /**
         * Gets the Etags.
         *
         * @return array The entity tags
         * @static 
         */
        public static function getETags()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
            return \Illuminate\Http\Request::getETags();
        }
        
        /**
         * 
         *
         * @return bool 
         * @static 
         */
        public static function isNoCache()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
            return \Illuminate\Http\Request::isNoCache();
        }
        
        /**
         * Returns the preferred language.
         *
         * @param array $locales An array of ordered available locales
         * @return string|null The preferred locale
         * @static 
         */
        public static function getPreferredLanguage($locales = null)
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
            return \Illuminate\Http\Request::getPreferredLanguage($locales);
        }
        
        /**
         * Gets a list of languages acceptable by the client browser.
         *
         * @return array Languages ordered in the user browser preferences
         * @static 
         */
        public static function getLanguages()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
            return \Illuminate\Http\Request::getLanguages();
        }
        
        /**
         * Gets a list of charsets acceptable by the client browser.
         *
         * @return array List of charsets in preferable order
         * @static 
         */
        public static function getCharsets()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
            return \Illuminate\Http\Request::getCharsets();
        }
        
        /**
         * Gets a list of encodings acceptable by the client browser.
         *
         * @return array List of encodings in preferable order
         * @static 
         */
        public static function getEncodings()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
            return \Illuminate\Http\Request::getEncodings();
        }
        
        /**
         * Gets a list of content types acceptable by the client browser.
         *
         * @return array List of content types in preferable order
         * @static 
         */
        public static function getAcceptableContentTypes()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
            return \Illuminate\Http\Request::getAcceptableContentTypes();
        }
        
        /**
         * Returns true if the request is a XMLHttpRequest.
         * 
         * It works if your JavaScript library sets an X-Requested-With HTTP header.
         * It is known to work with common JavaScript frameworks:
         *
         * @see http://en.wikipedia.org/wiki/List_of_Ajax_frameworks#JavaScript
         * @return bool true if the request is an XMLHttpRequest, false otherwise
         * @static 
         */
        public static function isXmlHttpRequest()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
            return \Illuminate\Http\Request::isXmlHttpRequest();
        }
        
        /**
         * Indicates whether this request originated from a trusted proxy.
         * 
         * This can be useful to determine whether or not to trust the
         * contents of a proxy-specific header.
         *
         * @return bool true if the request came from a trusted proxy, false otherwise
         * @static 
         */
        public static function isFromTrustedProxy()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
            return \Illuminate\Http\Request::isFromTrustedProxy();
        }
        
        /**
         * Register a custom macro.
         *
         * @param string $name
         * @param callable $macro
         * @return void 
         * @static 
         */
        public static function macro($name, $macro)
        {
            \Illuminate\Http\Request::macro($name, $macro);
        }
        
        /**
         * Checks if macro is registered.
         *
         * @param string $name
         * @return bool 
         * @static 
         */
        public static function hasMacro($name)
        {
            return \Illuminate\Http\Request::hasMacro($name);
        }
        
    }         

    class Response {
        
        /**
         * Return a new response from the application.
         *
         * @param string $content
         * @param int $status
         * @param array $headers
         * @return \Illuminate\Http\Response 
         * @static 
         */
        public static function make($content = '', $status = 200, $headers = array())
        {
            return \Illuminate\Routing\ResponseFactory::make($content, $status, $headers);
        }
        
        /**
         * Return a new view response from the application.
         *
         * @param string $view
         * @param array $data
         * @param int $status
         * @param array $headers
         * @return \Illuminate\Http\Response 
         * @static 
         */
        public static function view($view, $data = array(), $status = 200, $headers = array())
        {
            return \Illuminate\Routing\ResponseFactory::view($view, $data, $status, $headers);
        }
        
        /**
         * Return a new JSON response from the application.
         *
         * @param mixed $data
         * @param int $status
         * @param array $headers
         * @param int $options
         * @return \Illuminate\Http\JsonResponse 
         * @static 
         */
        public static function json($data = array(), $status = 200, $headers = array(), $options = 0)
        {
            return \Illuminate\Routing\ResponseFactory::json($data, $status, $headers, $options);
        }
        
        /**
         * Return a new JSONP response from the application.
         *
         * @param string $callback
         * @param mixed $data
         * @param int $status
         * @param array $headers
         * @param int $options
         * @return \Illuminate\Http\JsonResponse 
         * @static 
         */
        public static function jsonp($callback, $data = array(), $status = 200, $headers = array(), $options = 0)
        {
            return \Illuminate\Routing\ResponseFactory::jsonp($callback, $data, $status, $headers, $options);
        }
        
        /**
         * Return a new streamed response from the application.
         *
         * @param \Closure $callback
         * @param int $status
         * @param array $headers
         * @return \Symfony\Component\HttpFoundation\StreamedResponse 
         * @static 
         */
        public static function stream($callback, $status = 200, $headers = array())
        {
            return \Illuminate\Routing\ResponseFactory::stream($callback, $status, $headers);
        }
        
        /**
         * Create a new file download response.
         *
         * @param \SplFileInfo|string $file
         * @param string $name
         * @param array $headers
         * @param string|null $disposition
         * @return \Symfony\Component\HttpFoundation\BinaryFileResponse 
         * @static 
         */
        public static function download($file, $name = null, $headers = array(), $disposition = 'attachment')
        {
            return \Illuminate\Routing\ResponseFactory::download($file, $name, $headers, $disposition);
        }
        
        /**
         * Return the raw contents of a binary file.
         *
         * @param \SplFileInfo|string $file
         * @param array $headers
         * @return \Symfony\Component\HttpFoundation\BinaryFileResponse 
         * @static 
         */
        public static function file($file, $headers = array())
        {
            return \Illuminate\Routing\ResponseFactory::file($file, $headers);
        }
        
        /**
         * Create a new redirect response to the given path.
         *
         * @param string $path
         * @param int $status
         * @param array $headers
         * @param bool|null $secure
         * @return \Illuminate\Http\RedirectResponse 
         * @static 
         */
        public static function redirectTo($path, $status = 302, $headers = array(), $secure = null)
        {
            return \Illuminate\Routing\ResponseFactory::redirectTo($path, $status, $headers, $secure);
        }
        
        /**
         * Create a new redirect response to a named route.
         *
         * @param string $route
         * @param array $parameters
         * @param int $status
         * @param array $headers
         * @return \Illuminate\Http\RedirectResponse 
         * @static 
         */
        public static function redirectToRoute($route, $parameters = array(), $status = 302, $headers = array())
        {
            return \Illuminate\Routing\ResponseFactory::redirectToRoute($route, $parameters, $status, $headers);
        }
        
        /**
         * Create a new redirect response to a controller action.
         *
         * @param string $action
         * @param array $parameters
         * @param int $status
         * @param array $headers
         * @return \Illuminate\Http\RedirectResponse 
         * @static 
         */
        public static function redirectToAction($action, $parameters = array(), $status = 302, $headers = array())
        {
            return \Illuminate\Routing\ResponseFactory::redirectToAction($action, $parameters, $status, $headers);
        }
        
        /**
         * Create a new redirect response, while putting the current URL in the session.
         *
         * @param string $path
         * @param int $status
         * @param array $headers
         * @param bool|null $secure
         * @return \Illuminate\Http\RedirectResponse 
         * @static 
         */
        public static function redirectGuest($path, $status = 302, $headers = array(), $secure = null)
        {
            return \Illuminate\Routing\ResponseFactory::redirectGuest($path, $status, $headers, $secure);
        }
        
        /**
         * Create a new redirect response to the previously intended location.
         *
         * @param string $default
         * @param int $status
         * @param array $headers
         * @param bool|null $secure
         * @return \Illuminate\Http\RedirectResponse 
         * @static 
         */
        public static function redirectToIntended($default = '/', $status = 302, $headers = array(), $secure = null)
        {
            return \Illuminate\Routing\ResponseFactory::redirectToIntended($default, $status, $headers, $secure);
        }
        
        /**
         * Register a custom macro.
         *
         * @param string $name
         * @param callable $macro
         * @return void 
         * @static 
         */
        public static function macro($name, $macro)
        {
            \Illuminate\Routing\ResponseFactory::macro($name, $macro);
        }
        
        /**
         * Checks if macro is registered.
         *
         * @param string $name
         * @return bool 
         * @static 
         */
        public static function hasMacro($name)
        {
            return \Illuminate\Routing\ResponseFactory::hasMacro($name);
        }
        
    }         

    class Route {
        
        /**
         * Register a new GET route with the router.
         *
         * @param string $uri
         * @param \Closure|array|string|null $action
         * @return \Illuminate\Routing\Route 
         * @static 
         */
        public static function get($uri, $action = null)
        {
            return \Illuminate\Routing\Router::get($uri, $action);
        }
        
        /**
         * Register a new POST route with the router.
         *
         * @param string $uri
         * @param \Closure|array|string|null $action
         * @return \Illuminate\Routing\Route 
         * @static 
         */
        public static function post($uri, $action = null)
        {
            return \Illuminate\Routing\Router::post($uri, $action);
        }
        
        /**
         * Register a new PUT route with the router.
         *
         * @param string $uri
         * @param \Closure|array|string|null $action
         * @return \Illuminate\Routing\Route 
         * @static 
         */
        public static function put($uri, $action = null)
        {
            return \Illuminate\Routing\Router::put($uri, $action);
        }
        
        /**
         * Register a new PATCH route with the router.
         *
         * @param string $uri
         * @param \Closure|array|string|null $action
         * @return \Illuminate\Routing\Route 
         * @static 
         */
        public static function patch($uri, $action = null)
        {
            return \Illuminate\Routing\Router::patch($uri, $action);
        }
        
        /**
         * Register a new DELETE route with the router.
         *
         * @param string $uri
         * @param \Closure|array|string|null $action
         * @return \Illuminate\Routing\Route 
         * @static 
         */
        public static function delete($uri, $action = null)
        {
            return \Illuminate\Routing\Router::delete($uri, $action);
        }
        
        /**
         * Register a new OPTIONS route with the router.
         *
         * @param string $uri
         * @param \Closure|array|string|null $action
         * @return \Illuminate\Routing\Route 
         * @static 
         */
        public static function options($uri, $action = null)
        {
            return \Illuminate\Routing\Router::options($uri, $action);
        }
        
        /**
         * Register a new route responding to all verbs.
         *
         * @param string $uri
         * @param \Closure|array|string|null $action
         * @return \Illuminate\Routing\Route 
         * @static 
         */
        public static function any($uri, $action = null)
        {
            return \Illuminate\Routing\Router::any($uri, $action);
        }
        
        /**
         * Register a new route with the given verbs.
         *
         * @param array|string $methods
         * @param string $uri
         * @param \Closure|array|string|null $action
         * @return \Illuminate\Routing\Route 
         * @static 
         */
        public static function match($methods, $uri, $action = null)
        {
            return \Illuminate\Routing\Router::match($methods, $uri, $action);
        }
        
        /**
         * Set the unmapped global resource parameters to singular.
         *
         * @param bool $singular
         * @return void 
         * @static 
         */
        public static function singularResourceParameters($singular = true)
        {
            \Illuminate\Routing\Router::singularResourceParameters($singular);
        }
        
        /**
         * Set the global resource parameter mapping.
         *
         * @param array $parameters
         * @return void 
         * @static 
         */
        public static function resourceParameters($parameters = array())
        {
            \Illuminate\Routing\Router::resourceParameters($parameters);
        }
        
        /**
         * Get or set the verbs used in the resource URIs.
         *
         * @param array $verbs
         * @return array|null 
         * @static 
         */
        public static function resourceVerbs($verbs = array())
        {
            return \Illuminate\Routing\Router::resourceVerbs($verbs);
        }
        
        /**
         * Register an array of resource controllers.
         *
         * @param array $resources
         * @return void 
         * @static 
         */
        public static function resources($resources)
        {
            \Illuminate\Routing\Router::resources($resources);
        }
        
        /**
         * Route a resource to a controller.
         *
         * @param string $name
         * @param string $controller
         * @param array $options
         * @return void 
         * @static 
         */
        public static function resource($name, $controller, $options = array())
        {
            \Illuminate\Routing\Router::resource($name, $controller, $options);
        }
        
        /**
         * Register the typical authentication routes for an application.
         *
         * @return void 
         * @static 
         */
        public static function auth()
        {
            \Illuminate\Routing\Router::auth();
        }
        
        /**
         * Create a route group with shared attributes.
         *
         * @param array $attributes
         * @param \Closure $callback
         * @return void 
         * @static 
         */
        public static function group($attributes, $callback)
        {
            \Illuminate\Routing\Router::group($attributes, $callback);
        }
        
        /**
         * Merge the given array with the last group stack.
         *
         * @param array $new
         * @return array 
         * @static 
         */
        public static function mergeWithLastGroup($new)
        {
            return \Illuminate\Routing\Router::mergeWithLastGroup($new);
        }
        
        /**
         * Merge the given group attributes.
         *
         * @param array $new
         * @param array $old
         * @return array 
         * @static 
         */
        public static function mergeGroup($new, $old)
        {
            return \Illuminate\Routing\Router::mergeGroup($new, $old);
        }
        
        /**
         * Get the prefix from the last group on the stack.
         *
         * @return string 
         * @static 
         */
        public static function getLastGroupPrefix()
        {
            return \Illuminate\Routing\Router::getLastGroupPrefix();
        }
        
        /**
         * Dispatch the request to the application.
         *
         * @param \Illuminate\Http\Request $request
         * @return \Illuminate\Http\Response 
         * @static 
         */
        public static function dispatch($request)
        {
            return \Illuminate\Routing\Router::dispatch($request);
        }
        
        /**
         * Dispatch the request to a route and return the response.
         *
         * @param \Illuminate\Http\Request $request
         * @return mixed 
         * @static 
         */
        public static function dispatchToRoute($request)
        {
            return \Illuminate\Routing\Router::dispatchToRoute($request);
        }
        
        /**
         * Gather the middleware for the given route.
         *
         * @param \Illuminate\Routing\Route $route
         * @return array 
         * @static 
         */
        public static function gatherRouteMiddleware($route)
        {
            return \Illuminate\Routing\Router::gatherRouteMiddleware($route);
        }
        
        /**
         * Resolve the middleware name to a class name(s) preserving passed parameters.
         *
         * @param string $name
         * @return string|array 
         * @static 
         */
        public static function resolveMiddlewareClassName($name)
        {
            return \Illuminate\Routing\Router::resolveMiddlewareClassName($name);
        }
        
        /**
         * Substitute the route bindings onto the route.
         *
         * @param \Illuminate\Routing\Route $route
         * @return \Illuminate\Routing\Route 
         * @static 
         */
        public static function substituteBindings($route)
        {
            return \Illuminate\Routing\Router::substituteBindings($route);
        }
        
        /**
         * Substitute the implicit Eloquent model bindings for the route.
         *
         * @param \Illuminate\Routing\Route $route
         * @return void 
         * @static 
         */
        public static function substituteImplicitBindings($route)
        {
            \Illuminate\Routing\Router::substituteImplicitBindings($route);
        }
        
        /**
         * Register a route matched event listener.
         *
         * @param string|callable $callback
         * @return void 
         * @static 
         */
        public static function matched($callback)
        {
            \Illuminate\Routing\Router::matched($callback);
        }
        
        /**
         * Get all of the defined middleware short-hand names.
         *
         * @return array 
         * @static 
         */
        public static function getMiddleware()
        {
            return \Illuminate\Routing\Router::getMiddleware();
        }
        
        /**
         * Register a short-hand name for a middleware.
         *
         * @param string $name
         * @param string $class
         * @return $this 
         * @static 
         */
        public static function middleware($name, $class)
        {
            return \Illuminate\Routing\Router::middleware($name, $class);
        }
        
        /**
         * Register a group of middleware.
         *
         * @param string $name
         * @param array $middleware
         * @return $this 
         * @static 
         */
        public static function middlewareGroup($name, $middleware)
        {
            return \Illuminate\Routing\Router::middlewareGroup($name, $middleware);
        }
        
        /**
         * Add a middleware to the beginning of a middleware group.
         * 
         * If the middleware is already in the group, it will not be added again.
         *
         * @param string $group
         * @param string $middleware
         * @return $this 
         * @static 
         */
        public static function prependMiddlewareToGroup($group, $middleware)
        {
            return \Illuminate\Routing\Router::prependMiddlewareToGroup($group, $middleware);
        }
        
        /**
         * Add a middleware to the end of a middleware group.
         * 
         * If the middleware is already in the group, it will not be added again.
         *
         * @param string $group
         * @param string $middleware
         * @return $this 
         * @static 
         */
        public static function pushMiddlewareToGroup($group, $middleware)
        {
            return \Illuminate\Routing\Router::pushMiddlewareToGroup($group, $middleware);
        }
        
        /**
         * Register a model binder for a wildcard.
         *
         * @param string $key
         * @param string $class
         * @param \Closure|null $callback
         * @return void 
         * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
         * @static 
         */
        public static function model($key, $class, $callback = null)
        {
            \Illuminate\Routing\Router::model($key, $class, $callback);
        }
        
        /**
         * Add a new route parameter binder.
         *
         * @param string $key
         * @param string|callable $binder
         * @return void 
         * @static 
         */
        public static function bind($key, $binder)
        {
            \Illuminate\Routing\Router::bind($key, $binder);
        }
        
        /**
         * Create a class based binding using the IoC container.
         *
         * @param string $binding
         * @return \Closure 
         * @static 
         */
        public static function createClassBinding($binding)
        {
            return \Illuminate\Routing\Router::createClassBinding($binding);
        }
        
        /**
         * Set a global where pattern on all routes.
         *
         * @param string $key
         * @param string $pattern
         * @return void 
         * @static 
         */
        public static function pattern($key, $pattern)
        {
            \Illuminate\Routing\Router::pattern($key, $pattern);
        }
        
        /**
         * Set a group of global where patterns on all routes.
         *
         * @param array $patterns
         * @return void 
         * @static 
         */
        public static function patterns($patterns)
        {
            \Illuminate\Routing\Router::patterns($patterns);
        }
        
        /**
         * Create a response instance from the given value.
         *
         * @param \Symfony\Component\HttpFoundation\Request $request
         * @param mixed $response
         * @return \Illuminate\Http\Response 
         * @static 
         */
        public static function prepareResponse($request, $response)
        {
            return \Illuminate\Routing\Router::prepareResponse($request, $response);
        }
        
        /**
         * Determine if the router currently has a group stack.
         *
         * @return bool 
         * @static 
         */
        public static function hasGroupStack()
        {
            return \Illuminate\Routing\Router::hasGroupStack();
        }
        
        /**
         * Get the current group stack for the router.
         *
         * @return array 
         * @static 
         */
        public static function getGroupStack()
        {
            return \Illuminate\Routing\Router::getGroupStack();
        }
        
        /**
         * Get a route parameter for the current route.
         *
         * @param string $key
         * @param string $default
         * @return mixed 
         * @static 
         */
        public static function input($key, $default = null)
        {
            return \Illuminate\Routing\Router::input($key, $default);
        }
        
        /**
         * Get the currently dispatched route instance.
         *
         * @return \Illuminate\Routing\Route 
         * @static 
         */
        public static function getCurrentRoute()
        {
            return \Illuminate\Routing\Router::getCurrentRoute();
        }
        
        /**
         * Get the currently dispatched route instance.
         *
         * @return \Illuminate\Routing\Route 
         * @static 
         */
        public static function current()
        {
            return \Illuminate\Routing\Router::current();
        }
        
        /**
         * Check if a route with the given name exists.
         *
         * @param string $name
         * @return bool 
         * @static 
         */
        public static function has($name)
        {
            return \Illuminate\Routing\Router::has($name);
        }
        
        /**
         * Get the current route name.
         *
         * @return string|null 
         * @static 
         */
        public static function currentRouteName()
        {
            return \Illuminate\Routing\Router::currentRouteName();
        }
        
        /**
         * Alias for the "currentRouteNamed" method.
         *
         * @return bool 
         * @static 
         */
        public static function is()
        {
            return \Illuminate\Routing\Router::is();
        }
        
        /**
         * Determine if the current route matches a given name.
         *
         * @param string $name
         * @return bool 
         * @static 
         */
        public static function currentRouteNamed($name)
        {
            return \Illuminate\Routing\Router::currentRouteNamed($name);
        }
        
        /**
         * Get the current route action.
         *
         * @return string|null 
         * @static 
         */
        public static function currentRouteAction()
        {
            return \Illuminate\Routing\Router::currentRouteAction();
        }
        
        /**
         * Alias for the "currentRouteUses" method.
         *
         * @return bool 
         * @static 
         */
        public static function uses()
        {
            return \Illuminate\Routing\Router::uses();
        }
        
        /**
         * Determine if the current route action matches a given action.
         *
         * @param string $action
         * @return bool 
         * @static 
         */
        public static function currentRouteUses($action)
        {
            return \Illuminate\Routing\Router::currentRouteUses($action);
        }
        
        /**
         * Get the request currently being dispatched.
         *
         * @return \Illuminate\Http\Request 
         * @static 
         */
        public static function getCurrentRequest()
        {
            return \Illuminate\Routing\Router::getCurrentRequest();
        }
        
        /**
         * Get the underlying route collection.
         *
         * @return \Illuminate\Routing\RouteCollection 
         * @static 
         */
        public static function getRoutes()
        {
            return \Illuminate\Routing\Router::getRoutes();
        }
        
        /**
         * Set the route collection instance.
         *
         * @param \Illuminate\Routing\RouteCollection $routes
         * @return void 
         * @static 
         */
        public static function setRoutes($routes)
        {
            \Illuminate\Routing\Router::setRoutes($routes);
        }
        
        /**
         * Get the global "where" patterns.
         *
         * @return array 
         * @static 
         */
        public static function getPatterns()
        {
            return \Illuminate\Routing\Router::getPatterns();
        }
        
        /**
         * Register a custom macro.
         *
         * @param string $name
         * @param callable $macro
         * @return void 
         * @static 
         */
        public static function macro($name, $macro)
        {
            \Illuminate\Routing\Router::macro($name, $macro);
        }
        
        /**
         * Checks if macro is registered.
         *
         * @param string $name
         * @return bool 
         * @static 
         */
        public static function hasMacro($name)
        {
            return \Illuminate\Routing\Router::hasMacro($name);
        }
        
    }         

    class Schema {
        
        /**
         * Determine if the given table exists.
         *
         * @param string $table
         * @return bool 
         * @static 
         */
        public static function hasTable($table)
        {
            return \Illuminate\Database\Schema\MySqlBuilder::hasTable($table);
        }
        
        /**
         * Get the column listing for a given table.
         *
         * @param string $table
         * @return array 
         * @static 
         */
        public static function getColumnListing($table)
        {
            return \Illuminate\Database\Schema\MySqlBuilder::getColumnListing($table);
        }
        
        /**
         * Determine if the given table has a given column.
         *
         * @param string $table
         * @param string $column
         * @return bool 
         * @static 
         */
        public static function hasColumn($table, $column)
        {
            //Method inherited from \Illuminate\Database\Schema\Builder            
            return \Illuminate\Database\Schema\MySqlBuilder::hasColumn($table, $column);
        }
        
        /**
         * Determine if the given table has given columns.
         *
         * @param string $table
         * @param array $columns
         * @return bool 
         * @static 
         */
        public static function hasColumns($table, $columns)
        {
            //Method inherited from \Illuminate\Database\Schema\Builder            
            return \Illuminate\Database\Schema\MySqlBuilder::hasColumns($table, $columns);
        }
        
        /**
         * Get the data type for the given column name.
         *
         * @param string $table
         * @param string $column
         * @return string 
         * @static 
         */
        public static function getColumnType($table, $column)
        {
            //Method inherited from \Illuminate\Database\Schema\Builder            
            return \Illuminate\Database\Schema\MySqlBuilder::getColumnType($table, $column);
        }
        
        /**
         * Modify a table on the schema.
         *
         * @param string $table
         * @param \Closure $callback
         * @return void 
         * @static 
         */
        public static function table($table, $callback)
        {
            //Method inherited from \Illuminate\Database\Schema\Builder            
            \Illuminate\Database\Schema\MySqlBuilder::table($table, $callback);
        }
        
        /**
         * Create a new table on the schema.
         *
         * @param string $table
         * @param \Closure $callback
         * @return void 
         * @static 
         */
        public static function create($table, $callback)
        {
            //Method inherited from \Illuminate\Database\Schema\Builder            
            \Illuminate\Database\Schema\MySqlBuilder::create($table, $callback);
        }
        
        /**
         * Drop a table from the schema.
         *
         * @param string $table
         * @return void 
         * @static 
         */
        public static function drop($table)
        {
            //Method inherited from \Illuminate\Database\Schema\Builder            
            \Illuminate\Database\Schema\MySqlBuilder::drop($table);
        }
        
        /**
         * Drop a table from the schema if it exists.
         *
         * @param string $table
         * @return void 
         * @static 
         */
        public static function dropIfExists($table)
        {
            //Method inherited from \Illuminate\Database\Schema\Builder            
            \Illuminate\Database\Schema\MySqlBuilder::dropIfExists($table);
        }
        
        /**
         * Rename a table on the schema.
         *
         * @param string $from
         * @param string $to
         * @return void 
         * @static 
         */
        public static function rename($from, $to)
        {
            //Method inherited from \Illuminate\Database\Schema\Builder            
            \Illuminate\Database\Schema\MySqlBuilder::rename($from, $to);
        }
        
        /**
         * Enable foreign key constraints.
         *
         * @return bool 
         * @static 
         */
        public static function enableForeignKeyConstraints()
        {
            //Method inherited from \Illuminate\Database\Schema\Builder            
            return \Illuminate\Database\Schema\MySqlBuilder::enableForeignKeyConstraints();
        }
        
        /**
         * Disable foreign key constraints.
         *
         * @return bool 
         * @static 
         */
        public static function disableForeignKeyConstraints()
        {
            //Method inherited from \Illuminate\Database\Schema\Builder            
            return \Illuminate\Database\Schema\MySqlBuilder::disableForeignKeyConstraints();
        }
        
        /**
         * Get the database connection instance.
         *
         * @return \Illuminate\Database\Connection 
         * @static 
         */
        public static function getConnection()
        {
            //Method inherited from \Illuminate\Database\Schema\Builder            
            return \Illuminate\Database\Schema\MySqlBuilder::getConnection();
        }
        
        /**
         * Set the database connection instance.
         *
         * @param \Illuminate\Database\Connection $connection
         * @return $this 
         * @static 
         */
        public static function setConnection($connection)
        {
            //Method inherited from \Illuminate\Database\Schema\Builder            
            return \Illuminate\Database\Schema\MySqlBuilder::setConnection($connection);
        }
        
        /**
         * Set the Schema Blueprint resolver callback.
         *
         * @param \Closure $resolver
         * @return void 
         * @static 
         */
        public static function blueprintResolver($resolver)
        {
            //Method inherited from \Illuminate\Database\Schema\Builder            
            \Illuminate\Database\Schema\MySqlBuilder::blueprintResolver($resolver);
        }
        
    }         

    class Session {
        
        /**
         * Get the session configuration.
         *
         * @return array 
         * @static 
         */
        public static function getSessionConfig()
        {
            return \Illuminate\Session\SessionManager::getSessionConfig();
        }
        
        /**
         * Get the default session driver name.
         *
         * @return string 
         * @static 
         */
        public static function getDefaultDriver()
        {
            return \Illuminate\Session\SessionManager::getDefaultDriver();
        }
        
        /**
         * Set the default session driver name.
         *
         * @param string $name
         * @return void 
         * @static 
         */
        public static function setDefaultDriver($name)
        {
            \Illuminate\Session\SessionManager::setDefaultDriver($name);
        }
        
        /**
         * Get a driver instance.
         *
         * @param string $driver
         * @return mixed 
         * @static 
         */
        public static function driver($driver = null)
        {
            //Method inherited from \Illuminate\Support\Manager            
            return \Illuminate\Session\SessionManager::driver($driver);
        }
        
        /**
         * Register a custom driver creator Closure.
         *
         * @param string $driver
         * @param \Closure $callback
         * @return $this 
         * @static 
         */
        public static function extend($driver, $callback)
        {
            //Method inherited from \Illuminate\Support\Manager            
            return \Illuminate\Session\SessionManager::extend($driver, $callback);
        }
        
        /**
         * Get all of the created "drivers".
         *
         * @return array 
         * @static 
         */
        public static function getDrivers()
        {
            //Method inherited from \Illuminate\Support\Manager            
            return \Illuminate\Session\SessionManager::getDrivers();
        }
        
        /**
         * Starts the session storage.
         *
         * @return bool True if session started
         * @throws \RuntimeException If session fails to start.
         * @static 
         */
        public static function start()
        {
            return \Illuminate\Session\Store::start();
        }
        
        /**
         * Returns the session ID.
         *
         * @return string The session ID
         * @static 
         */
        public static function getId()
        {
            return \Illuminate\Session\Store::getId();
        }
        
        /**
         * Sets the session ID.
         *
         * @param string $id
         * @static 
         */
        public static function setId($id)
        {
            return \Illuminate\Session\Store::setId($id);
        }
        
        /**
         * Determine if this is a valid session ID.
         *
         * @param string $id
         * @return bool 
         * @static 
         */
        public static function isValidId($id)
        {
            return \Illuminate\Session\Store::isValidId($id);
        }
        
        /**
         * Returns the session name.
         *
         * @return mixed The session name
         * @static 
         */
        public static function getName()
        {
            return \Illuminate\Session\Store::getName();
        }
        
        /**
         * Sets the session name.
         *
         * @param string $name
         * @static 
         */
        public static function setName($name)
        {
            return \Illuminate\Session\Store::setName($name);
        }
        
        /**
         * Invalidates the current session.
         * 
         * Clears all session attributes and flashes and regenerates the
         * session and deletes the old session from persistence.
         *
         * @param int $lifetime Sets the cookie lifetime for the session cookie. A null value
         *                      will leave the system settings unchanged, 0 sets the cookie
         *                      to expire with browser session. Time is in seconds, and is
         *                      not a Unix timestamp.
         * @return bool True if session invalidated, false if error
         * @static 
         */
        public static function invalidate($lifetime = null)
        {
            return \Illuminate\Session\Store::invalidate($lifetime);
        }
        
        /**
         * Migrates the current session to a new session id while maintaining all
         * session attributes.
         *
         * @param bool $destroy Whether to delete the old session or leave it to garbage collection
         * @param int $lifetime Sets the cookie lifetime for the session cookie. A null value
         *                       will leave the system settings unchanged, 0 sets the cookie
         *                       to expire with browser session. Time is in seconds, and is
         *                       not a Unix timestamp.
         * @return bool True if session migrated, false if error
         * @static 
         */
        public static function migrate($destroy = false, $lifetime = null)
        {
            return \Illuminate\Session\Store::migrate($destroy, $lifetime);
        }
        
        /**
         * Generate a new session identifier.
         *
         * @param bool $destroy
         * @return bool 
         * @static 
         */
        public static function regenerate($destroy = false)
        {
            return \Illuminate\Session\Store::regenerate($destroy);
        }
        
        /**
         * Force the session to be saved and closed.
         * 
         * This method is generally not required for real sessions as
         * the session will be automatically saved at the end of
         * code execution.
         *
         * @static 
         */
        public static function save()
        {
            return \Illuminate\Session\Store::save();
        }
        
        /**
         * Age the flash data for the session.
         *
         * @return void 
         * @static 
         */
        public static function ageFlashData()
        {
            \Illuminate\Session\Store::ageFlashData();
        }
        
        /**
         * Checks if an attribute exists.
         *
         * @param string|array $key
         * @return bool 
         * @static 
         */
        public static function exists($key)
        {
            return \Illuminate\Session\Store::exists($key);
        }
        
        /**
         * Checks if an attribute is defined.
         *
         * @param string $name The attribute name
         * @return bool true if the attribute is defined, false otherwise
         * @static 
         */
        public static function has($name)
        {
            return \Illuminate\Session\Store::has($name);
        }
        
        /**
         * Returns an attribute.
         *
         * @param string $name The attribute name
         * @param mixed $default The default value if not found
         * @return mixed 
         * @static 
         */
        public static function get($name, $default = null)
        {
            return \Illuminate\Session\Store::get($name, $default);
        }
        
        /**
         * Get the value of a given key and then forget it.
         *
         * @param string $key
         * @param string $default
         * @return mixed 
         * @static 
         */
        public static function pull($key, $default = null)
        {
            return \Illuminate\Session\Store::pull($key, $default);
        }
        
        /**
         * Determine if the session contains old input.
         *
         * @param string $key
         * @return bool 
         * @static 
         */
        public static function hasOldInput($key = null)
        {
            return \Illuminate\Session\Store::hasOldInput($key);
        }
        
        /**
         * Get the requested item from the flashed input array.
         *
         * @param string $key
         * @param mixed $default
         * @return mixed 
         * @static 
         */
        public static function getOldInput($key = null, $default = null)
        {
            return \Illuminate\Session\Store::getOldInput($key, $default);
        }
        
        /**
         * Sets an attribute.
         *
         * @param string $name
         * @param mixed $value
         * @static 
         */
        public static function set($name, $value)
        {
            return \Illuminate\Session\Store::set($name, $value);
        }
        
        /**
         * Put a key / value pair or array of key / value pairs in the session.
         *
         * @param string|array $key
         * @param mixed $value
         * @return void 
         * @static 
         */
        public static function put($key, $value = null)
        {
            \Illuminate\Session\Store::put($key, $value);
        }
        
        /**
         * Get an item from the session, or store the default value.
         *
         * @param string $key
         * @param \Closure $callback
         * @return mixed 
         * @static 
         */
        public static function remember($key, $callback)
        {
            return \Illuminate\Session\Store::remember($key, $callback);
        }
        
        /**
         * Push a value onto a session array.
         *
         * @param string $key
         * @param mixed $value
         * @return void 
         * @static 
         */
        public static function push($key, $value)
        {
            \Illuminate\Session\Store::push($key, $value);
        }
        
        /**
         * Increment the value of an item in the session.
         *
         * @param string $key
         * @param int $amount
         * @return mixed 
         * @static 
         */
        public static function increment($key, $amount = 1)
        {
            return \Illuminate\Session\Store::increment($key, $amount);
        }
        
        /**
         * Decrement the value of an item in the session.
         *
         * @param string $key
         * @param int $amount
         * @return int 
         * @static 
         */
        public static function decrement($key, $amount = 1)
        {
            return \Illuminate\Session\Store::decrement($key, $amount);
        }
        
        /**
         * Flash a key / value pair to the session.
         *
         * @param string $key
         * @param mixed $value
         * @return void 
         * @static 
         */
        public static function flash($key, $value)
        {
            \Illuminate\Session\Store::flash($key, $value);
        }
        
        /**
         * Flash a key / value pair to the session for immediate use.
         *
         * @param string $key
         * @param mixed $value
         * @return void 
         * @static 
         */
        public static function now($key, $value)
        {
            \Illuminate\Session\Store::now($key, $value);
        }
        
        /**
         * Flash an input array to the session.
         *
         * @param array $value
         * @return void 
         * @static 
         */
        public static function flashInput($value)
        {
            \Illuminate\Session\Store::flashInput($value);
        }
        
        /**
         * Reflash all of the session flash data.
         *
         * @return void 
         * @static 
         */
        public static function reflash()
        {
            \Illuminate\Session\Store::reflash();
        }
        
        /**
         * Reflash a subset of the current flash data.
         *
         * @param array|mixed $keys
         * @return void 
         * @static 
         */
        public static function keep($keys = null)
        {
            \Illuminate\Session\Store::keep($keys);
        }
        
        /**
         * Returns attributes.
         *
         * @return array Attributes
         * @static 
         */
        public static function all()
        {
            return \Illuminate\Session\Store::all();
        }
        
        /**
         * Sets attributes.
         *
         * @param array $attributes Attributes
         * @static 
         */
        public static function replace($attributes)
        {
            return \Illuminate\Session\Store::replace($attributes);
        }
        
        /**
         * Removes an attribute.
         *
         * @param string $name
         * @return mixed The removed value or null when it does not exist
         * @static 
         */
        public static function remove($name)
        {
            return \Illuminate\Session\Store::remove($name);
        }
        
        /**
         * Remove one or many items from the session.
         *
         * @param string|array $keys
         * @return void 
         * @static 
         */
        public static function forget($keys)
        {
            \Illuminate\Session\Store::forget($keys);
        }
        
        /**
         * Clears all attributes.
         *
         * @static 
         */
        public static function clear()
        {
            return \Illuminate\Session\Store::clear();
        }
        
        /**
         * Remove all of the items from the session.
         *
         * @return void 
         * @static 
         */
        public static function flush()
        {
            \Illuminate\Session\Store::flush();
        }
        
        /**
         * Checks if the session was started.
         *
         * @return bool 
         * @static 
         */
        public static function isStarted()
        {
            return \Illuminate\Session\Store::isStarted();
        }
        
        /**
         * Registers a SessionBagInterface with the session.
         *
         * @param \Symfony\Component\HttpFoundation\Session\SessionBagInterface $bag
         * @static 
         */
        public static function registerBag($bag)
        {
            return \Illuminate\Session\Store::registerBag($bag);
        }
        
        /**
         * Gets a bag instance by name.
         *
         * @param string $name
         * @return \Symfony\Component\HttpFoundation\Session\SessionBagInterface 
         * @static 
         */
        public static function getBag($name)
        {
            return \Illuminate\Session\Store::getBag($name);
        }
        
        /**
         * Gets session meta.
         *
         * @return \Symfony\Component\HttpFoundation\Session\MetadataBag 
         * @static 
         */
        public static function getMetadataBag()
        {
            return \Illuminate\Session\Store::getMetadataBag();
        }
        
        /**
         * Get the raw bag data array for a given bag.
         *
         * @param string $name
         * @return array 
         * @static 
         */
        public static function getBagData($name)
        {
            return \Illuminate\Session\Store::getBagData($name);
        }
        
        /**
         * Get the CSRF token value.
         *
         * @return string 
         * @static 
         */
        public static function token()
        {
            return \Illuminate\Session\Store::token();
        }
        
        /**
         * Get the CSRF token value.
         *
         * @return string 
         * @static 
         */
        public static function getToken()
        {
            return \Illuminate\Session\Store::getToken();
        }
        
        /**
         * Regenerate the CSRF token value.
         *
         * @return void 
         * @static 
         */
        public static function regenerateToken()
        {
            \Illuminate\Session\Store::regenerateToken();
        }
        
        /**
         * Get the previous URL from the session.
         *
         * @return string|null 
         * @static 
         */
        public static function previousUrl()
        {
            return \Illuminate\Session\Store::previousUrl();
        }
        
        /**
         * Set the "previous" URL in the session.
         *
         * @param string $url
         * @return void 
         * @static 
         */
        public static function setPreviousUrl($url)
        {
            \Illuminate\Session\Store::setPreviousUrl($url);
        }
        
        /**
         * Set the existence of the session on the handler if applicable.
         *
         * @param bool $value
         * @return void 
         * @static 
         */
        public static function setExists($value)
        {
            \Illuminate\Session\Store::setExists($value);
        }
        
        /**
         * Get the underlying session handler implementation.
         *
         * @return \SessionHandlerInterface 
         * @static 
         */
        public static function getHandler()
        {
            return \Illuminate\Session\Store::getHandler();
        }
        
        /**
         * Determine if the session handler needs a request.
         *
         * @return bool 
         * @static 
         */
        public static function handlerNeedsRequest()
        {
            return \Illuminate\Session\Store::handlerNeedsRequest();
        }
        
        /**
         * Set the request on the handler instance.
         *
         * @param \Symfony\Component\HttpFoundation\Request $request
         * @return void 
         * @static 
         */
        public static function setRequestOnHandler($request)
        {
            \Illuminate\Session\Store::setRequestOnHandler($request);
        }
        
    }         

    class Storage {
        
        /**
         * Get a filesystem instance.
         *
         * @param string $name
         * @return \Illuminate\Filesystem\FilesystemAdapter 
         * @static 
         */
        public static function drive($name = null)
        {
            return \Illuminate\Filesystem\FilesystemManager::drive($name);
        }
        
        /**
         * Get a filesystem instance.
         *
         * @param string $name
         * @return \Illuminate\Filesystem\FilesystemAdapter 
         * @static 
         */
        public static function disk($name = null)
        {
            return \Illuminate\Filesystem\FilesystemManager::disk($name);
        }
        
        /**
         * Get a default cloud filesystem instance.
         *
         * @return \Illuminate\Filesystem\FilesystemAdapter 
         * @static 
         */
        public static function cloud()
        {
            return \Illuminate\Filesystem\FilesystemManager::cloud();
        }
        
        /**
         * Create an instance of the local driver.
         *
         * @param array $config
         * @return \Illuminate\Filesystem\FilesystemAdapter 
         * @static 
         */
        public static function createLocalDriver($config)
        {
            return \Illuminate\Filesystem\FilesystemManager::createLocalDriver($config);
        }
        
        /**
         * Create an instance of the ftp driver.
         *
         * @param array $config
         * @return \Illuminate\Filesystem\FilesystemAdapter 
         * @static 
         */
        public static function createFtpDriver($config)
        {
            return \Illuminate\Filesystem\FilesystemManager::createFtpDriver($config);
        }
        
        /**
         * Create an instance of the Amazon S3 driver.
         *
         * @param array $config
         * @return \Illuminate\Contracts\Filesystem\Cloud 
         * @static 
         */
        public static function createS3Driver($config)
        {
            return \Illuminate\Filesystem\FilesystemManager::createS3Driver($config);
        }
        
        /**
         * Create an instance of the Rackspace driver.
         *
         * @param array $config
         * @return \Illuminate\Contracts\Filesystem\Cloud 
         * @static 
         */
        public static function createRackspaceDriver($config)
        {
            return \Illuminate\Filesystem\FilesystemManager::createRackspaceDriver($config);
        }
        
        /**
         * Get the default driver name.
         *
         * @return string 
         * @static 
         */
        public static function getDefaultDriver()
        {
            return \Illuminate\Filesystem\FilesystemManager::getDefaultDriver();
        }
        
        /**
         * Get the default cloud driver name.
         *
         * @return string 
         * @static 
         */
        public static function getDefaultCloudDriver()
        {
            return \Illuminate\Filesystem\FilesystemManager::getDefaultCloudDriver();
        }
        
        /**
         * Register a custom driver creator Closure.
         *
         * @param string $driver
         * @param \Closure $callback
         * @return $this 
         * @static 
         */
        public static function extend($driver, $callback)
        {
            return \Illuminate\Filesystem\FilesystemManager::extend($driver, $callback);
        }
        
        /**
         * Determine if a file exists.
         *
         * @param string $path
         * @return bool 
         * @static 
         */
        public static function exists($path)
        {
            return \Illuminate\Filesystem\FilesystemAdapter::exists($path);
        }
        
        /**
         * Get the contents of a file.
         *
         * @param string $path
         * @return string 
         * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
         * @static 
         */
        public static function get($path)
        {
            return \Illuminate\Filesystem\FilesystemAdapter::get($path);
        }
        
        /**
         * Write the contents of a file.
         *
         * @param string $path
         * @param string|resource $contents
         * @param string $visibility
         * @return bool 
         * @static 
         */
        public static function put($path, $contents, $visibility = null)
        {
            return \Illuminate\Filesystem\FilesystemAdapter::put($path, $contents, $visibility);
        }
        
        /**
         * Store the uploaded file on the disk.
         *
         * @param string $path
         * @param \Illuminate\Http\UploadedFile $file
         * @param string $visibility
         * @return string|false 
         * @static 
         */
        public static function putFile($path, $file, $visibility = null)
        {
            return \Illuminate\Filesystem\FilesystemAdapter::putFile($path, $file, $visibility);
        }
        
        /**
         * Store the uploaded file on the disk with a given name.
         *
         * @param string $path
         * @param \Illuminate\Http\File|\Illuminate\Http\UploadedFile $file
         * @param string $name
         * @param string $visibility
         * @return string|false 
         * @static 
         */
        public static function putFileAs($path, $file, $name, $visibility = null)
        {
            return \Illuminate\Filesystem\FilesystemAdapter::putFileAs($path, $file, $name, $visibility);
        }
        
        /**
         * Get the visibility for the given path.
         *
         * @param string $path
         * @return string 
         * @static 
         */
        public static function getVisibility($path)
        {
            return \Illuminate\Filesystem\FilesystemAdapter::getVisibility($path);
        }
        
        /**
         * Set the visibility for the given path.
         *
         * @param string $path
         * @param string $visibility
         * @return void 
         * @static 
         */
        public static function setVisibility($path, $visibility)
        {
            \Illuminate\Filesystem\FilesystemAdapter::setVisibility($path, $visibility);
        }
        
        /**
         * Prepend to a file.
         *
         * @param string $path
         * @param string $data
         * @param string $separator
         * @return int 
         * @static 
         */
        public static function prepend($path, $data, $separator = '')
        {
            return \Illuminate\Filesystem\FilesystemAdapter::prepend($path, $data, $separator);
        }
        
        /**
         * Append to a file.
         *
         * @param string $path
         * @param string $data
         * @param string $separator
         * @return int 
         * @static 
         */
        public static function append($path, $data, $separator = '')
        {
            return \Illuminate\Filesystem\FilesystemAdapter::append($path, $data, $separator);
        }
        
        /**
         * Delete the file at a given path.
         *
         * @param string|array $paths
         * @return bool 
         * @static 
         */
        public static function delete($paths)
        {
            return \Illuminate\Filesystem\FilesystemAdapter::delete($paths);
        }
        
        /**
         * Copy a file to a new location.
         *
         * @param string $from
         * @param string $to
         * @return bool 
         * @static 
         */
        public static function copy($from, $to)
        {
            return \Illuminate\Filesystem\FilesystemAdapter::copy($from, $to);
        }
        
        /**
         * Move a file to a new location.
         *
         * @param string $from
         * @param string $to
         * @return bool 
         * @static 
         */
        public static function move($from, $to)
        {
            return \Illuminate\Filesystem\FilesystemAdapter::move($from, $to);
        }
        
        /**
         * Get the file size of a given file.
         *
         * @param string $path
         * @return int 
         * @static 
         */
        public static function size($path)
        {
            return \Illuminate\Filesystem\FilesystemAdapter::size($path);
        }
        
        /**
         * Get the mime-type of a given file.
         *
         * @param string $path
         * @return string|false 
         * @static 
         */
        public static function mimeType($path)
        {
            return \Illuminate\Filesystem\FilesystemAdapter::mimeType($path);
        }
        
        /**
         * Get the file's last modification time.
         *
         * @param string $path
         * @return int 
         * @static 
         */
        public static function lastModified($path)
        {
            return \Illuminate\Filesystem\FilesystemAdapter::lastModified($path);
        }
        
        /**
         * Get the URL for the file at the given path.
         *
         * @param string $path
         * @return string 
         * @static 
         */
        public static function url($path)
        {
            return \Illuminate\Filesystem\FilesystemAdapter::url($path);
        }
        
        /**
         * Get an array of all files in a directory.
         *
         * @param string|null $directory
         * @param bool $recursive
         * @return array 
         * @static 
         */
        public static function files($directory = null, $recursive = false)
        {
            return \Illuminate\Filesystem\FilesystemAdapter::files($directory, $recursive);
        }
        
        /**
         * Get all of the files from the given directory (recursive).
         *
         * @param string|null $directory
         * @return array 
         * @static 
         */
        public static function allFiles($directory = null)
        {
            return \Illuminate\Filesystem\FilesystemAdapter::allFiles($directory);
        }
        
        /**
         * Get all of the directories within a given directory.
         *
         * @param string|null $directory
         * @param bool $recursive
         * @return array 
         * @static 
         */
        public static function directories($directory = null, $recursive = false)
        {
            return \Illuminate\Filesystem\FilesystemAdapter::directories($directory, $recursive);
        }
        
        /**
         * Get all (recursive) of the directories within a given directory.
         *
         * @param string|null $directory
         * @return array 
         * @static 
         */
        public static function allDirectories($directory = null)
        {
            return \Illuminate\Filesystem\FilesystemAdapter::allDirectories($directory);
        }
        
        /**
         * Create a directory.
         *
         * @param string $path
         * @return bool 
         * @static 
         */
        public static function makeDirectory($path)
        {
            return \Illuminate\Filesystem\FilesystemAdapter::makeDirectory($path);
        }
        
        /**
         * Recursively delete a directory.
         *
         * @param string $directory
         * @return bool 
         * @static 
         */
        public static function deleteDirectory($directory)
        {
            return \Illuminate\Filesystem\FilesystemAdapter::deleteDirectory($directory);
        }
        
        /**
         * Get the Flysystem driver.
         *
         * @return \League\Flysystem\FilesystemInterface 
         * @static 
         */
        public static function getDriver()
        {
            return \Illuminate\Filesystem\FilesystemAdapter::getDriver();
        }
        
    }         

    class URL {
        
        /**
         * Get the full URL for the current request.
         *
         * @return string 
         * @static 
         */
        public static function full()
        {
            return \Illuminate\Routing\UrlGenerator::full();
        }
        
        /**
         * Get the current URL for the request.
         *
         * @return string 
         * @static 
         */
        public static function current()
        {
            return \Illuminate\Routing\UrlGenerator::current();
        }
        
        /**
         * Get the URL for the previous request.
         *
         * @param mixed $fallback
         * @return string 
         * @static 
         */
        public static function previous($fallback = false)
        {
            return \Illuminate\Routing\UrlGenerator::previous($fallback);
        }
        
        /**
         * Generate an absolute URL to the given path.
         *
         * @param string $path
         * @param mixed $extra
         * @param bool|null $secure
         * @return string 
         * @static 
         */
        public static function to($path, $extra = array(), $secure = null)
        {
            return \Illuminate\Routing\UrlGenerator::to($path, $extra, $secure);
        }
        
        /**
         * Generate a secure, absolute URL to the given path.
         *
         * @param string $path
         * @param array $parameters
         * @return string 
         * @static 
         */
        public static function secure($path, $parameters = array())
        {
            return \Illuminate\Routing\UrlGenerator::secure($path, $parameters);
        }
        
        /**
         * Generate the URL to an application asset.
         *
         * @param string $path
         * @param bool|null $secure
         * @return string 
         * @static 
         */
        public static function asset($path, $secure = null)
        {
            return \Illuminate\Routing\UrlGenerator::asset($path, $secure);
        }
        
        /**
         * Generate the URL to an asset from a custom root domain such as CDN, etc.
         *
         * @param string $root
         * @param string $path
         * @param bool|null $secure
         * @return string 
         * @static 
         */
        public static function assetFrom($root, $path, $secure = null)
        {
            return \Illuminate\Routing\UrlGenerator::assetFrom($root, $path, $secure);
        }
        
        /**
         * Generate the URL to a secure asset.
         *
         * @param string $path
         * @return string 
         * @static 
         */
        public static function secureAsset($path)
        {
            return \Illuminate\Routing\UrlGenerator::secureAsset($path);
        }
        
        /**
         * Force the schema for URLs.
         *
         * @param string $schema
         * @return void 
         * @static 
         */
        public static function forceSchema($schema)
        {
            \Illuminate\Routing\UrlGenerator::forceSchema($schema);
        }
        
        /**
         * Get the URL to a named route.
         *
         * @param string $name
         * @param mixed $parameters
         * @param bool $absolute
         * @return string 
         * @throws \InvalidArgumentException
         * @static 
         */
        public static function route($name, $parameters = array(), $absolute = true)
        {
            return \Illuminate\Routing\UrlGenerator::route($name, $parameters, $absolute);
        }
        
        /**
         * Get the URL to a controller action.
         *
         * @param string $action
         * @param mixed $parameters
         * @param bool $absolute
         * @return string 
         * @throws \InvalidArgumentException
         * @static 
         */
        public static function action($action, $parameters = array(), $absolute = true)
        {
            return \Illuminate\Routing\UrlGenerator::action($action, $parameters, $absolute);
        }
        
        /**
         * Set the forced root URL.
         *
         * @param string $root
         * @return void 
         * @static 
         */
        public static function forceRootUrl($root)
        {
            \Illuminate\Routing\UrlGenerator::forceRootUrl($root);
        }
        
        /**
         * Determine if the given path is a valid URL.
         *
         * @param string $path
         * @return bool 
         * @static 
         */
        public static function isValidUrl($path)
        {
            return \Illuminate\Routing\UrlGenerator::isValidUrl($path);
        }
        
        /**
         * Get the request instance.
         *
         * @return \Illuminate\Http\Request 
         * @static 
         */
        public static function getRequest()
        {
            return \Illuminate\Routing\UrlGenerator::getRequest();
        }
        
        /**
         * Set the current request instance.
         *
         * @param \Illuminate\Http\Request $request
         * @return void 
         * @static 
         */
        public static function setRequest($request)
        {
            \Illuminate\Routing\UrlGenerator::setRequest($request);
        }
        
        /**
         * Set the route collection.
         *
         * @param \Illuminate\Routing\RouteCollection $routes
         * @return $this 
         * @static 
         */
        public static function setRoutes($routes)
        {
            return \Illuminate\Routing\UrlGenerator::setRoutes($routes);
        }
        
        /**
         * Set the session resolver for the generator.
         *
         * @param callable $sessionResolver
         * @return $this 
         * @static 
         */
        public static function setSessionResolver($sessionResolver)
        {
            return \Illuminate\Routing\UrlGenerator::setSessionResolver($sessionResolver);
        }
        
        /**
         * Set the root controller namespace.
         *
         * @param string $rootNamespace
         * @return $this 
         * @static 
         */
        public static function setRootControllerNamespace($rootNamespace)
        {
            return \Illuminate\Routing\UrlGenerator::setRootControllerNamespace($rootNamespace);
        }
        
        /**
         * Register a custom macro.
         *
         * @param string $name
         * @param callable $macro
         * @return void 
         * @static 
         */
        public static function macro($name, $macro)
        {
            \Illuminate\Routing\UrlGenerator::macro($name, $macro);
        }
        
        /**
         * Checks if macro is registered.
         *
         * @param string $name
         * @return bool 
         * @static 
         */
        public static function hasMacro($name)
        {
            return \Illuminate\Routing\UrlGenerator::hasMacro($name);
        }
        
    }         

    class Validator {
        
        /**
         * Create a new Validator instance.
         *
         * @param array $data
         * @param array $rules
         * @param array $messages
         * @param array $customAttributes
         * @return \Illuminate\Validation\Validator 
         * @static 
         */
        public static function make($data, $rules, $messages = array(), $customAttributes = array())
        {
            return \Illuminate\Validation\Factory::make($data, $rules, $messages, $customAttributes);
        }
        
        /**
         * Validate the given data against the provided rules.
         *
         * @param array $data
         * @param array $rules
         * @param array $messages
         * @param array $customAttributes
         * @return void 
         * @throws \Illuminate\Validation\ValidationException
         * @static 
         */
        public static function validate($data, $rules, $messages = array(), $customAttributes = array())
        {
            \Illuminate\Validation\Factory::validate($data, $rules, $messages, $customAttributes);
        }
        
        /**
         * Register a custom validator extension.
         *
         * @param string $rule
         * @param \Closure|string $extension
         * @param string $message
         * @return void 
         * @static 
         */
        public static function extend($rule, $extension, $message = null)
        {
            \Illuminate\Validation\Factory::extend($rule, $extension, $message);
        }
        
        /**
         * Register a custom implicit validator extension.
         *
         * @param string $rule
         * @param \Closure|string $extension
         * @param string $message
         * @return void 
         * @static 
         */
        public static function extendImplicit($rule, $extension, $message = null)
        {
            \Illuminate\Validation\Factory::extendImplicit($rule, $extension, $message);
        }
        
        /**
         * Register a custom implicit validator message replacer.
         *
         * @param string $rule
         * @param \Closure|string $replacer
         * @return void 
         * @static 
         */
        public static function replacer($rule, $replacer)
        {
            \Illuminate\Validation\Factory::replacer($rule, $replacer);
        }
        
        /**
         * Set the Validator instance resolver.
         *
         * @param \Closure $resolver
         * @return void 
         * @static 
         */
        public static function resolver($resolver)
        {
            \Illuminate\Validation\Factory::resolver($resolver);
        }
        
        /**
         * Get the Translator implementation.
         *
         * @return \Symfony\Component\Translation\TranslatorInterface 
         * @static 
         */
        public static function getTranslator()
        {
            return \Illuminate\Validation\Factory::getTranslator();
        }
        
        /**
         * Get the Presence Verifier implementation.
         *
         * @return \Illuminate\Validation\PresenceVerifierInterface 
         * @static 
         */
        public static function getPresenceVerifier()
        {
            return \Illuminate\Validation\Factory::getPresenceVerifier();
        }
        
        /**
         * Set the Presence Verifier implementation.
         *
         * @param \Illuminate\Validation\PresenceVerifierInterface $presenceVerifier
         * @return void 
         * @static 
         */
        public static function setPresenceVerifier($presenceVerifier)
        {
            \Illuminate\Validation\Factory::setPresenceVerifier($presenceVerifier);
        }
        
    }         

    class View {
        
        /**
         * Get a evaluated view contents for the given view.
         *
         * @param string $view
         * @param array $data
         * @param array $mergeData
         * @return \Illuminate\View\View 
         * @static 
         */
        public static function make($view, $data = array(), $mergeData = array())
        {
            return \Robbo\Presenter\View\Factory::make($view, $data, $mergeData);
        }
        
        /**
         * Add a piece of shared data to the factory.
         *
         * @param string $key
         * @param mixed $value
         * @return void 
         * @static 
         */
        public static function share($key, $value = null)
        {
            \Robbo\Presenter\View\Factory::share($key, $value);
        }
        
        /**
         * Decorate an object with a presenter.
         *
         * @param mixed $value
         * @return mixed 
         * @static 
         */
        public static function decorate($value)
        {
            return \Robbo\Presenter\View\Factory::decorate($value);
        }
        
        /**
         * Get the evaluated view contents for the given view.
         *
         * @param string $path
         * @param array $data
         * @param array $mergeData
         * @return \Illuminate\Contracts\View\View 
         * @static 
         */
        public static function file($path, $data = array(), $mergeData = array())
        {
            //Method inherited from \Illuminate\View\Factory            
            return \Robbo\Presenter\View\Factory::file($path, $data, $mergeData);
        }
        
        /**
         * Get the evaluated view contents for a named view.
         *
         * @param string $view
         * @param mixed $data
         * @return \Illuminate\Contracts\View\View 
         * @static 
         */
        public static function of($view, $data = array())
        {
            //Method inherited from \Illuminate\View\Factory            
            return \Robbo\Presenter\View\Factory::of($view, $data);
        }
        
        /**
         * Register a named view.
         *
         * @param string $view
         * @param string $name
         * @return void 
         * @static 
         */
        public static function name($view, $name)
        {
            //Method inherited from \Illuminate\View\Factory            
            \Robbo\Presenter\View\Factory::name($view, $name);
        }
        
        /**
         * Add an alias for a view.
         *
         * @param string $view
         * @param string $alias
         * @return void 
         * @static 
         */
        public static function alias($view, $alias)
        {
            //Method inherited from \Illuminate\View\Factory            
            \Robbo\Presenter\View\Factory::alias($view, $alias);
        }
        
        /**
         * Determine if a given view exists.
         *
         * @param string $view
         * @return bool 
         * @static 
         */
        public static function exists($view)
        {
            //Method inherited from \Illuminate\View\Factory            
            return \Robbo\Presenter\View\Factory::exists($view);
        }
        
        /**
         * Get the rendered contents of a partial from a loop.
         *
         * @param string $view
         * @param array $data
         * @param string $iterator
         * @param string $empty
         * @return string 
         * @static 
         */
        public static function renderEach($view, $data, $iterator, $empty = 'raw|')
        {
            //Method inherited from \Illuminate\View\Factory            
            return \Robbo\Presenter\View\Factory::renderEach($view, $data, $iterator, $empty);
        }
        
        /**
         * Get the appropriate view engine for the given path.
         *
         * @param string $path
         * @return \Illuminate\View\Engines\EngineInterface 
         * @throws \InvalidArgumentException
         * @static 
         */
        public static function getEngineFromPath($path)
        {
            //Method inherited from \Illuminate\View\Factory            
            return \Robbo\Presenter\View\Factory::getEngineFromPath($path);
        }
        
        /**
         * Register a view creator event.
         *
         * @param array|string $views
         * @param \Closure|string $callback
         * @return array 
         * @static 
         */
        public static function creator($views, $callback)
        {
            //Method inherited from \Illuminate\View\Factory            
            return \Robbo\Presenter\View\Factory::creator($views, $callback);
        }
        
        /**
         * Register multiple view composers via an array.
         *
         * @param array $composers
         * @return array 
         * @static 
         */
        public static function composers($composers)
        {
            //Method inherited from \Illuminate\View\Factory            
            return \Robbo\Presenter\View\Factory::composers($composers);
        }
        
        /**
         * Register a view composer event.
         *
         * @param array|string $views
         * @param \Closure|string $callback
         * @param int|null $priority
         * @return array 
         * @static 
         */
        public static function composer($views, $callback, $priority = null)
        {
            //Method inherited from \Illuminate\View\Factory            
            return \Robbo\Presenter\View\Factory::composer($views, $callback, $priority);
        }
        
        /**
         * Call the composer for a given view.
         *
         * @param \Illuminate\Contracts\View\View $view
         * @return void 
         * @static 
         */
        public static function callComposer($view)
        {
            //Method inherited from \Illuminate\View\Factory            
            \Robbo\Presenter\View\Factory::callComposer($view);
        }
        
        /**
         * Call the creator for a given view.
         *
         * @param \Illuminate\Contracts\View\View $view
         * @return void 
         * @static 
         */
        public static function callCreator($view)
        {
            //Method inherited from \Illuminate\View\Factory            
            \Robbo\Presenter\View\Factory::callCreator($view);
        }
        
        /**
         * Start injecting content into a section.
         *
         * @param string $section
         * @param string $content
         * @return void 
         * @static 
         */
        public static function startSection($section, $content = '')
        {
            //Method inherited from \Illuminate\View\Factory            
            \Robbo\Presenter\View\Factory::startSection($section, $content);
        }
        
        /**
         * Inject inline content into a section.
         *
         * @param string $section
         * @param string $content
         * @return void 
         * @static 
         */
        public static function inject($section, $content)
        {
            //Method inherited from \Illuminate\View\Factory            
            \Robbo\Presenter\View\Factory::inject($section, $content);
        }
        
        /**
         * Stop injecting content into a section and return its contents.
         *
         * @return string 
         * @static 
         */
        public static function yieldSection()
        {
            //Method inherited from \Illuminate\View\Factory            
            return \Robbo\Presenter\View\Factory::yieldSection();
        }
        
        /**
         * Stop injecting content into a section.
         *
         * @param bool $overwrite
         * @return string 
         * @throws \InvalidArgumentException
         * @static 
         */
        public static function stopSection($overwrite = false)
        {
            //Method inherited from \Illuminate\View\Factory            
            return \Robbo\Presenter\View\Factory::stopSection($overwrite);
        }
        
        /**
         * Stop injecting content into a section and append it.
         *
         * @return string 
         * @throws \InvalidArgumentException
         * @static 
         */
        public static function appendSection()
        {
            //Method inherited from \Illuminate\View\Factory            
            return \Robbo\Presenter\View\Factory::appendSection();
        }
        
        /**
         * Get the string contents of a section.
         *
         * @param string $section
         * @param string $default
         * @return string 
         * @static 
         */
        public static function yieldContent($section, $default = '')
        {
            //Method inherited from \Illuminate\View\Factory            
            return \Robbo\Presenter\View\Factory::yieldContent($section, $default);
        }
        
        /**
         * Start injecting content into a push section.
         *
         * @param string $section
         * @param string $content
         * @return void 
         * @static 
         */
        public static function startPush($section, $content = '')
        {
            //Method inherited from \Illuminate\View\Factory            
            \Robbo\Presenter\View\Factory::startPush($section, $content);
        }
        
        /**
         * Stop injecting content into a push section.
         *
         * @return string 
         * @throws \InvalidArgumentException
         * @static 
         */
        public static function stopPush()
        {
            //Method inherited from \Illuminate\View\Factory            
            return \Robbo\Presenter\View\Factory::stopPush();
        }
        
        /**
         * Get the string contents of a push section.
         *
         * @param string $section
         * @param string $default
         * @return string 
         * @static 
         */
        public static function yieldPushContent($section, $default = '')
        {
            //Method inherited from \Illuminate\View\Factory            
            return \Robbo\Presenter\View\Factory::yieldPushContent($section, $default);
        }
        
        /**
         * Flush all of the section contents.
         *
         * @return void 
         * @static 
         */
        public static function flushSections()
        {
            //Method inherited from \Illuminate\View\Factory            
            \Robbo\Presenter\View\Factory::flushSections();
        }
        
        /**
         * Flush all of the section contents if done rendering.
         *
         * @return void 
         * @static 
         */
        public static function flushSectionsIfDoneRendering()
        {
            //Method inherited from \Illuminate\View\Factory            
            \Robbo\Presenter\View\Factory::flushSectionsIfDoneRendering();
        }
        
        /**
         * Increment the rendering counter.
         *
         * @return void 
         * @static 
         */
        public static function incrementRender()
        {
            //Method inherited from \Illuminate\View\Factory            
            \Robbo\Presenter\View\Factory::incrementRender();
        }
        
        /**
         * Decrement the rendering counter.
         *
         * @return void 
         * @static 
         */
        public static function decrementRender()
        {
            //Method inherited from \Illuminate\View\Factory            
            \Robbo\Presenter\View\Factory::decrementRender();
        }
        
        /**
         * Check if there are no active render operations.
         *
         * @return bool 
         * @static 
         */
        public static function doneRendering()
        {
            //Method inherited from \Illuminate\View\Factory            
            return \Robbo\Presenter\View\Factory::doneRendering();
        }
        
        /**
         * Add new loop to the stack.
         *
         * @param \Countable|array $data
         * @return void 
         * @static 
         */
        public static function addLoop($data)
        {
            //Method inherited from \Illuminate\View\Factory            
            \Robbo\Presenter\View\Factory::addLoop($data);
        }
        
        /**
         * Increment the top loop's indices.
         *
         * @return void 
         * @static 
         */
        public static function incrementLoopIndices()
        {
            //Method inherited from \Illuminate\View\Factory            
            \Robbo\Presenter\View\Factory::incrementLoopIndices();
        }
        
        /**
         * Pop a loop from the top of the loop stack.
         *
         * @return void 
         * @static 
         */
        public static function popLoop()
        {
            //Method inherited from \Illuminate\View\Factory            
            \Robbo\Presenter\View\Factory::popLoop();
        }
        
        /**
         * Get an instance of the first loop in the stack.
         *
         * @return array 
         * @static 
         */
        public static function getFirstLoop()
        {
            //Method inherited from \Illuminate\View\Factory            
            return \Robbo\Presenter\View\Factory::getFirstLoop();
        }
        
        /**
         * Get the entire loop stack.
         *
         * @return array 
         * @static 
         */
        public static function getLoopStack()
        {
            //Method inherited from \Illuminate\View\Factory            
            return \Robbo\Presenter\View\Factory::getLoopStack();
        }
        
        /**
         * Add a location to the array of view locations.
         *
         * @param string $location
         * @return void 
         * @static 
         */
        public static function addLocation($location)
        {
            //Method inherited from \Illuminate\View\Factory            
            \Robbo\Presenter\View\Factory::addLocation($location);
        }
        
        /**
         * Add a new namespace to the loader.
         *
         * @param string $namespace
         * @param string|array $hints
         * @return void 
         * @static 
         */
        public static function addNamespace($namespace, $hints)
        {
            //Method inherited from \Illuminate\View\Factory            
            \Robbo\Presenter\View\Factory::addNamespace($namespace, $hints);
        }
        
        /**
         * Prepend a new namespace to the loader.
         *
         * @param string $namespace
         * @param string|array $hints
         * @return void 
         * @static 
         */
        public static function prependNamespace($namespace, $hints)
        {
            //Method inherited from \Illuminate\View\Factory            
            \Robbo\Presenter\View\Factory::prependNamespace($namespace, $hints);
        }
        
        /**
         * Register a valid view extension and its engine.
         *
         * @param string $extension
         * @param string $engine
         * @param \Closure $resolver
         * @return void 
         * @static 
         */
        public static function addExtension($extension, $engine, $resolver = null)
        {
            //Method inherited from \Illuminate\View\Factory            
            \Robbo\Presenter\View\Factory::addExtension($extension, $engine, $resolver);
        }
        
        /**
         * Get the extension to engine bindings.
         *
         * @return array 
         * @static 
         */
        public static function getExtensions()
        {
            //Method inherited from \Illuminate\View\Factory            
            return \Robbo\Presenter\View\Factory::getExtensions();
        }
        
        /**
         * Get the engine resolver instance.
         *
         * @return \Illuminate\View\Engines\EngineResolver 
         * @static 
         */
        public static function getEngineResolver()
        {
            //Method inherited from \Illuminate\View\Factory            
            return \Robbo\Presenter\View\Factory::getEngineResolver();
        }
        
        /**
         * Get the view finder instance.
         *
         * @return \Illuminate\View\ViewFinderInterface 
         * @static 
         */
        public static function getFinder()
        {
            //Method inherited from \Illuminate\View\Factory            
            return \Robbo\Presenter\View\Factory::getFinder();
        }
        
        /**
         * Set the view finder instance.
         *
         * @param \Illuminate\View\ViewFinderInterface $finder
         * @return void 
         * @static 
         */
        public static function setFinder($finder)
        {
            //Method inherited from \Illuminate\View\Factory            
            \Robbo\Presenter\View\Factory::setFinder($finder);
        }
        
        /**
         * Get the event dispatcher instance.
         *
         * @return \Illuminate\Contracts\Events\Dispatcher 
         * @static 
         */
        public static function getDispatcher()
        {
            //Method inherited from \Illuminate\View\Factory            
            return \Robbo\Presenter\View\Factory::getDispatcher();
        }
        
        /**
         * Set the event dispatcher instance.
         *
         * @param \Illuminate\Contracts\Events\Dispatcher $events
         * @return void 
         * @static 
         */
        public static function setDispatcher($events)
        {
            //Method inherited from \Illuminate\View\Factory            
            \Robbo\Presenter\View\Factory::setDispatcher($events);
        }
        
        /**
         * Get the IoC container instance.
         *
         * @return \Illuminate\Contracts\Container\Container 
         * @static 
         */
        public static function getContainer()
        {
            //Method inherited from \Illuminate\View\Factory            
            return \Robbo\Presenter\View\Factory::getContainer();
        }
        
        /**
         * Set the IoC container instance.
         *
         * @param \Illuminate\Contracts\Container\Container $container
         * @return void 
         * @static 
         */
        public static function setContainer($container)
        {
            //Method inherited from \Illuminate\View\Factory            
            \Robbo\Presenter\View\Factory::setContainer($container);
        }
        
        /**
         * Get an item from the shared data.
         *
         * @param string $key
         * @param mixed $default
         * @return mixed 
         * @static 
         */
        public static function shared($key, $default = null)
        {
            //Method inherited from \Illuminate\View\Factory            
            return \Robbo\Presenter\View\Factory::shared($key, $default);
        }
        
        /**
         * Get all of the shared data for the environment.
         *
         * @return array 
         * @static 
         */
        public static function getShared()
        {
            //Method inherited from \Illuminate\View\Factory            
            return \Robbo\Presenter\View\Factory::getShared();
        }
        
        /**
         * Check if section exists.
         *
         * @param string $name
         * @return bool 
         * @static 
         */
        public static function hasSection($name)
        {
            //Method inherited from \Illuminate\View\Factory            
            return \Robbo\Presenter\View\Factory::hasSection($name);
        }
        
        /**
         * Get the entire array of sections.
         *
         * @return array 
         * @static 
         */
        public static function getSections()
        {
            //Method inherited from \Illuminate\View\Factory            
            return \Robbo\Presenter\View\Factory::getSections();
        }
        
        /**
         * Get all of the registered named views in environment.
         *
         * @return array 
         * @static 
         */
        public static function getNames()
        {
            //Method inherited from \Illuminate\View\Factory            
            return \Robbo\Presenter\View\Factory::getNames();
        }
        
    }         
}
    
namespace Tymon\JWTAuth\Facades {

    class JWTAuth {
        
        /**
         * Find a user using the user identifier in the subject claim.
         *
         * @param bool|string $token
         * @return mixed 
         * @static 
         */
        public static function toUser($token = false)
        {
            return \Tymon\JWTAuth\JWTAuth::toUser($token);
        }
        
        /**
         * Generate a token using the user identifier as the subject claim.
         *
         * @param mixed $user
         * @param array $customClaims
         * @return string 
         * @static 
         */
        public static function fromUser($user, $customClaims = array())
        {
            return \Tymon\JWTAuth\JWTAuth::fromUser($user, $customClaims);
        }
        
        /**
         * Attempt to authenticate the user and return the token.
         *
         * @param array $credentials
         * @param array $customClaims
         * @return false|string 
         * @static 
         */
        public static function attempt($credentials = array(), $customClaims = array())
        {
            return \Tymon\JWTAuth\JWTAuth::attempt($credentials, $customClaims);
        }
        
        /**
         * Authenticate a user via a token.
         *
         * @param mixed $token
         * @return mixed 
         * @static 
         */
        public static function authenticate($token = false)
        {
            return \Tymon\JWTAuth\JWTAuth::authenticate($token);
        }
        
        /**
         * Refresh an expired token.
         *
         * @param mixed $token
         * @return string 
         * @static 
         */
        public static function refresh($token = false)
        {
            return \Tymon\JWTAuth\JWTAuth::refresh($token);
        }
        
        /**
         * Invalidate a token (add it to the blacklist).
         *
         * @param mixed $token
         * @return bool 
         * @static 
         */
        public static function invalidate($token = false)
        {
            return \Tymon\JWTAuth\JWTAuth::invalidate($token);
        }
        
        /**
         * Get the token.
         *
         * @return bool|string 
         * @static 
         */
        public static function getToken()
        {
            return \Tymon\JWTAuth\JWTAuth::getToken();
        }
        
        /**
         * Get the raw Payload instance.
         *
         * @param mixed $token
         * @return \Tymon\JWTAuth\Payload 
         * @static 
         */
        public static function getPayload($token = false)
        {
            return \Tymon\JWTAuth\JWTAuth::getPayload($token);
        }
        
        /**
         * Parse the token from the request.
         *
         * @param string $query
         * @return \JWTAuth 
         * @static 
         */
        public static function parseToken($method = 'bearer', $header = 'authorization', $query = 'token')
        {
            return \Tymon\JWTAuth\JWTAuth::parseToken($method, $header, $query);
        }
        
        /**
         * Set the identifier.
         *
         * @param string $identifier
         * @return $this 
         * @static 
         */
        public static function setIdentifier($identifier)
        {
            return \Tymon\JWTAuth\JWTAuth::setIdentifier($identifier);
        }
        
        /**
         * Get the identifier.
         *
         * @return string 
         * @static 
         */
        public static function getIdentifier()
        {
            return \Tymon\JWTAuth\JWTAuth::getIdentifier();
        }
        
        /**
         * Set the token.
         *
         * @param string $token
         * @return $this 
         * @static 
         */
        public static function setToken($token)
        {
            return \Tymon\JWTAuth\JWTAuth::setToken($token);
        }
        
        /**
         * Set the request instance.
         *
         * @param \Request $request
         * @static 
         */
        public static function setRequest($request)
        {
            return \Tymon\JWTAuth\JWTAuth::setRequest($request);
        }
        
        /**
         * Get the JWTManager instance.
         *
         * @return \Tymon\JWTAuth\JWTManager 
         * @static 
         */
        public static function manager()
        {
            return \Tymon\JWTAuth\JWTAuth::manager();
        }
        
    }         

    class JWTFactory {
        
        /**
         * Create the Payload instance.
         *
         * @param array $customClaims
         * @return \Tymon\JWTAuth\Payload 
         * @static 
         */
        public static function make($customClaims = array())
        {
            return \Tymon\JWTAuth\PayloadFactory::make($customClaims);
        }
        
        /**
         * Add an array of claims to the Payload.
         *
         * @param array $claims
         * @return $this 
         * @static 
         */
        public static function addClaims($claims)
        {
            return \Tymon\JWTAuth\PayloadFactory::addClaims($claims);
        }
        
        /**
         * Add a claim to the Payload.
         *
         * @param string $name
         * @param mixed $value
         * @return $this 
         * @static 
         */
        public static function addClaim($name, $value)
        {
            return \Tymon\JWTAuth\PayloadFactory::addClaim($name, $value);
        }
        
        /**
         * Build out the Claim DTO's.
         *
         * @return array 
         * @static 
         */
        public static function resolveClaims()
        {
            return \Tymon\JWTAuth\PayloadFactory::resolveClaims();
        }
        
        /**
         * Set the Issuer (iss) claim.
         *
         * @return string 
         * @static 
         */
        public static function iss()
        {
            return \Tymon\JWTAuth\PayloadFactory::iss();
        }
        
        /**
         * Set the Issued At (iat) claim.
         *
         * @return int 
         * @static 
         */
        public static function iat()
        {
            return \Tymon\JWTAuth\PayloadFactory::iat();
        }
        
        /**
         * Set the Expiration (exp) claim.
         *
         * @return int 
         * @static 
         */
        public static function exp()
        {
            return \Tymon\JWTAuth\PayloadFactory::exp();
        }
        
        /**
         * Set the Not Before (nbf) claim.
         *
         * @return int 
         * @static 
         */
        public static function nbf()
        {
            return \Tymon\JWTAuth\PayloadFactory::nbf();
        }
        
        /**
         * Set the token ttl (in minutes).
         *
         * @param int $ttl
         * @return $this 
         * @static 
         */
        public static function setTTL($ttl)
        {
            return \Tymon\JWTAuth\PayloadFactory::setTTL($ttl);
        }
        
        /**
         * Get the token ttl.
         *
         * @return int 
         * @static 
         */
        public static function getTTL()
        {
            return \Tymon\JWTAuth\PayloadFactory::getTTL();
        }
        
        /**
         * Set the refresh flow.
         *
         * @param bool $refreshFlow
         * @return $this 
         * @static 
         */
        public static function setRefreshFlow($refreshFlow = true)
        {
            return \Tymon\JWTAuth\PayloadFactory::setRefreshFlow($refreshFlow);
        }
        
    }         
}
    
namespace App\Core\APIs\Youtube\Facades {

    class Youtube {
        
        /**
         * Update the API key, useful if you want to switch
         * multiple keys to avoid quota problem
         *
         * @param $apiKey
         * @static 
         */
        public static function setApiKey($apiKey)
        {
            return \App\Core\APIs\Youtube\Youtube::setApiKey($apiKey);
        }
        
        /**
         * Override the API urls, so you can set them from a config
         *
         * @param array $APIs
         * @static 
         */
        public static function setAPIs($APIs)
        {
            return \App\Core\APIs\Youtube\Youtube::setAPIs($APIs);
        }
        
        /**
         * 
         *
         * @static 
         */
        public static function setReferer($referer)
        {
            return \App\Core\APIs\Youtube\Youtube::setReferer($referer);
        }
        
        /**
         * 
         *
         * @param $vId
         * @return \StdClass 
         * @throws \Exception
         * @static 
         */
        public static function getVideoInfo($vId)
        {
            return \App\Core\APIs\Youtube\Youtube::getVideoInfo($vId);
        }
        
        /**
         * 
         *
         * @param $vIds
         * @return \StdClass 
         * @throws \Exception
         * @static 
         */
        public static function getVideosInfo($vIds)
        {
            return \App\Core\APIs\Youtube\Youtube::getVideosInfo($vIds);
        }
        
        /**
         * Simple search interface, this search all stuffs
         * and order by relevance
         *
         * @param $q
         * @param int $maxResults
         * @return array 
         * @static 
         */
        public static function search($q, $maxResults = 10)
        {
            return \App\Core\APIs\Youtube\Youtube::search($q, $maxResults);
        }
        
        /**
         * Search only videos
         *
         * @param string $q Query
         * @param integer $maxResults number of results to return
         * @param string $order Order by
         * @return \StdClass API results
         * @static 
         */
        public static function searchVideos($q, $maxResults = 10, $order = null)
        {
            return \App\Core\APIs\Youtube\Youtube::searchVideos($q, $maxResults, $order);
        }
        
        /**
         * Search only videos in the channel
         *
         * @param string $q
         * @param string $channelId
         * @param integer $maxResults
         * @param string $order
         * @return object 
         * @static 
         */
        public static function searchChannelVideos($q, $channelId, $maxResults = 10, $order = null)
        {
            return \App\Core\APIs\Youtube\Youtube::searchChannelVideos($q, $channelId, $maxResults, $order);
        }
        
        /**
         * 
         *
         * @static 
         */
        public static function searchChannelLiveStream($q, $channelId, $maxResults = 10, $order = null)
        {
            return \App\Core\APIs\Youtube\Youtube::searchChannelLiveStream($q, $channelId, $maxResults, $order);
        }
        
        /**
         * Generic Search interface, use any parameters specified in
         * the API reference
         *
         * @param $params
         * @param $pageInfo
         * @return array 
         * @throws \Exception
         * @static 
         */
        public static function searchAdvanced($params, $pageInfo = false)
        {
            return \App\Core\APIs\Youtube\Youtube::searchAdvanced($params, $pageInfo);
        }
        
        /**
         * Generic Search Paginator, use any parameters specified in
         * the API reference and pass through nextPageToken as $token if set.
         *
         * @param $params
         * @param $token
         * @return array 
         * @static 
         */
        public static function paginateResults($params, $token = null)
        {
            return \App\Core\APIs\Youtube\Youtube::paginateResults($params, $token);
        }
        
        /**
         * 
         *
         * @param $username
         * @return \StdClass 
         * @throws \Exception
         * @static 
         */
        public static function getChannelByName($username, $optionalParams = false)
        {
            return \App\Core\APIs\Youtube\Youtube::getChannelByName($username, $optionalParams);
        }
        
        /**
         * 
         *
         * @param $id
         * @return \StdClass 
         * @throws \Exception
         * @static 
         */
        public static function getChannelById($id, $optionalParams = false)
        {
            return \App\Core\APIs\Youtube\Youtube::getChannelById($id, $optionalParams);
        }
        
        /**
         * 
         *
         * @param $channelId
         * @param array $optionalParams
         * @return array 
         * @throws \Exception
         * @static 
         */
        public static function getPlaylistsByChannelId($channelId, $optionalParams = array())
        {
            return \App\Core\APIs\Youtube\Youtube::getPlaylistsByChannelId($channelId, $optionalParams);
        }
        
        /**
         * 
         *
         * @param $id
         * @return \StdClass 
         * @throws \Exception
         * @static 
         */
        public static function getPlaylistById($id)
        {
            return \App\Core\APIs\Youtube\Youtube::getPlaylistById($id);
        }
        
        /**
         * 
         *
         * @param $playlistId
         * @return array 
         * @throws \Exception
         * @static 
         */
        public static function getPlaylistItemsByPlaylistId($playlistId, $maxResults = 50)
        {
            return \App\Core\APIs\Youtube\Youtube::getPlaylistItemsByPlaylistId($playlistId, $maxResults);
        }
        
        /**
         * 
         *
         * @param $params
         * @param bool|false $pageInfo
         * @return array 
         * @throws \Exception
         * @static 
         */
        public static function getPlaylistItemsByPlaylistIdAdvanced($params, $pageInfo = false)
        {
            return \App\Core\APIs\Youtube\Youtube::getPlaylistItemsByPlaylistIdAdvanced($params, $pageInfo);
        }
        
        /**
         * 
         *
         * @param $channelId
         * @return array 
         * @throws \Exception
         * @static 
         */
        public static function getActivitiesByChannelId($channelId)
        {
            return \App\Core\APIs\Youtube\Youtube::getActivitiesByChannelId($channelId);
        }
        
        /**
         * Parse a youtube URL to get the youtube Vid.
         * 
         * Support both full URL (www.youtube.com) and short URL (youtu.be)
         *
         * @param string $youtube_url
         * @throws \Exception
         * @return string Video Id
         * @static 
         */
        public static function parseVIdFromURL($youtube_url)
        {
            return \App\Core\APIs\Youtube\Youtube::parseVIdFromURL($youtube_url);
        }
        
        /**
         * Get the channel object by supplying the URL of the channel page
         *
         * @param string $youtube_url
         * @throws \Exception
         * @return object Channel object
         * @static 
         */
        public static function getChannelFromURL($youtube_url)
        {
            return \App\Core\APIs\Youtube\Youtube::getChannelFromURL($youtube_url);
        }
        
        /**
         * 
         *
         * @param $name
         * @return mixed 
         * @static 
         */
        public static function getApi($name)
        {
            return \App\Core\APIs\Youtube\Youtube::getApi($name);
        }
        
        /**
         * Decode the response from youtube, extract the single resource object.
         * 
         * (Don't use this to decode the response containing list of objects)
         *
         * @param string $apiData the api response from youtube
         * @throws \Exception
         * @return \StdClass an Youtube resource object
         * @static 
         */
        public static function decodeSingle($apiData)
        {
            return \App\Core\APIs\Youtube\Youtube::decodeSingle($apiData);
        }
        
        /**
         * Decode the response from youtube, extract the list of resource objects
         *
         * @param string $apiData response string from youtube
         * @throws \Exception
         * @return array Array of StdClass objects
         * @static 
         */
        public static function decodeList($apiData)
        {
            return \App\Core\APIs\Youtube\Youtube::decodeList($apiData);
        }
        
        /**
         * Using CURL to issue a GET request
         *
         * @param $url
         * @param $params
         * @return mixed 
         * @throws \Exception
         * @static 
         */
        public static function api_get($url, $params)
        {
            return \App\Core\APIs\Youtube\Youtube::api_get($url, $params);
        }
        
        /**
         * Parse the input url string and return just the path part
         *
         * @param string $url the URL
         * @return string the path string
         * @static 
         */
        public static function _parse_url_path($url)
        {
            return \App\Core\APIs\Youtube\Youtube::_parse_url_path($url);
        }
        
        /**
         * Parse the input url string and return an array of query params
         *
         * @param string $url the URL
         * @return array array of query params
         * @static 
         */
        public static function _parse_url_query($url)
        {
            return \App\Core\APIs\Youtube\Youtube::_parse_url_query($url);
        }
        
    }         
}
    
namespace Collective\Html {

    class FormFacade {
        
        /**
         * Open up a new HTML form.
         *
         * @param array $options
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */
        public static function open($options = array())
        {
            return \Collective\Html\FormBuilder::open($options);
        }
        
        /**
         * Create a new model based form builder.
         *
         * @param mixed $model
         * @param array $options
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */
        public static function model($model, $options = array())
        {
            return \Collective\Html\FormBuilder::model($model, $options);
        }
        
        /**
         * Set the model instance on the form builder.
         *
         * @param mixed $model
         * @return void 
         * @static 
         */
        public static function setModel($model)
        {
            \Collective\Html\FormBuilder::setModel($model);
        }
        
        /**
         * Close the current form.
         *
         * @return string 
         * @static 
         */
        public static function close()
        {
            return \Collective\Html\FormBuilder::close();
        }
        
        /**
         * Generate a hidden field with the current CSRF token.
         *
         * @return string 
         * @static 
         */
        public static function token()
        {
            return \Collective\Html\FormBuilder::token();
        }
        
        /**
         * Create a form label element.
         *
         * @param string $name
         * @param string $value
         * @param array $options
         * @param bool $escape_html
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */
        public static function label($name, $value = null, $options = array(), $escape_html = true)
        {
            return \Collective\Html\FormBuilder::label($name, $value, $options, $escape_html);
        }
        
        /**
         * Create a form input field.
         *
         * @param string $type
         * @param string $name
         * @param string $value
         * @param array $options
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */
        public static function input($type, $name, $value = null, $options = array())
        {
            return \Collective\Html\FormBuilder::input($type, $name, $value, $options);
        }
        
        /**
         * Create a text input field.
         *
         * @param string $name
         * @param string $value
         * @param array $options
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */
        public static function text($name, $value = null, $options = array())
        {
            return \Collective\Html\FormBuilder::text($name, $value, $options);
        }
        
        /**
         * Create a password input field.
         *
         * @param string $name
         * @param array $options
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */
        public static function password($name, $options = array())
        {
            return \Collective\Html\FormBuilder::password($name, $options);
        }
        
        /**
         * Create a hidden input field.
         *
         * @param string $name
         * @param string $value
         * @param array $options
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */
        public static function hidden($name, $value = null, $options = array())
        {
            return \Collective\Html\FormBuilder::hidden($name, $value, $options);
        }
        
        /**
         * Create an e-mail input field.
         *
         * @param string $name
         * @param string $value
         * @param array $options
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */
        public static function email($name, $value = null, $options = array())
        {
            return \Collective\Html\FormBuilder::email($name, $value, $options);
        }
        
        /**
         * Create a tel input field.
         *
         * @param string $name
         * @param string $value
         * @param array $options
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */
        public static function tel($name, $value = null, $options = array())
        {
            return \Collective\Html\FormBuilder::tel($name, $value, $options);
        }
        
        /**
         * Create a number input field.
         *
         * @param string $name
         * @param string $value
         * @param array $options
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */
        public static function number($name, $value = null, $options = array())
        {
            return \Collective\Html\FormBuilder::number($name, $value, $options);
        }
        
        /**
         * Create a date input field.
         *
         * @param string $name
         * @param string $value
         * @param array $options
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */
        public static function date($name, $value = null, $options = array())
        {
            return \Collective\Html\FormBuilder::date($name, $value, $options);
        }
        
        /**
         * Create a datetime input field.
         *
         * @param string $name
         * @param string $value
         * @param array $options
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */
        public static function datetime($name, $value = null, $options = array())
        {
            return \Collective\Html\FormBuilder::datetime($name, $value, $options);
        }
        
        /**
         * Create a datetime-local input field.
         *
         * @param string $name
         * @param string $value
         * @param array $options
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */
        public static function datetimeLocal($name, $value = null, $options = array())
        {
            return \Collective\Html\FormBuilder::datetimeLocal($name, $value, $options);
        }
        
        /**
         * Create a time input field.
         *
         * @param string $name
         * @param string $value
         * @param array $options
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */
        public static function time($name, $value = null, $options = array())
        {
            return \Collective\Html\FormBuilder::time($name, $value, $options);
        }
        
        /**
         * Create a url input field.
         *
         * @param string $name
         * @param string $value
         * @param array $options
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */
        public static function url($name, $value = null, $options = array())
        {
            return \Collective\Html\FormBuilder::url($name, $value, $options);
        }
        
        /**
         * Create a file input field.
         *
         * @param string $name
         * @param array $options
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */
        public static function file($name, $options = array())
        {
            return \Collective\Html\FormBuilder::file($name, $options);
        }
        
        /**
         * Create a textarea input field.
         *
         * @param string $name
         * @param string $value
         * @param array $options
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */
        public static function textarea($name, $value = null, $options = array())
        {
            return \Collective\Html\FormBuilder::textarea($name, $value, $options);
        }
        
        /**
         * Create a select box field.
         *
         * @param string $name
         * @param array $list
         * @param string $selected
         * @param array $options
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */
        public static function select($name, $list = array(), $selected = null, $options = array())
        {
            return \Collective\Html\FormBuilder::select($name, $list, $selected, $options);
        }
        
        /**
         * Create a select range field.
         *
         * @param string $name
         * @param string $begin
         * @param string $end
         * @param string $selected
         * @param array $options
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */
        public static function selectRange($name, $begin, $end, $selected = null, $options = array())
        {
            return \Collective\Html\FormBuilder::selectRange($name, $begin, $end, $selected, $options);
        }
        
        /**
         * Create a select year field.
         *
         * @param string $name
         * @param string $begin
         * @param string $end
         * @param string $selected
         * @param array $options
         * @return mixed 
         * @static 
         */
        public static function selectYear()
        {
            return \Collective\Html\FormBuilder::selectYear();
        }
        
        /**
         * Create a select month field.
         *
         * @param string $name
         * @param string $selected
         * @param array $options
         * @param string $format
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */
        public static function selectMonth($name, $selected = null, $options = array(), $format = '%B')
        {
            return \Collective\Html\FormBuilder::selectMonth($name, $selected, $options, $format);
        }
        
        /**
         * Get the select option for the given value.
         *
         * @param string $display
         * @param string $value
         * @param string $selected
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */
        public static function getSelectOption($display, $value, $selected)
        {
            return \Collective\Html\FormBuilder::getSelectOption($display, $value, $selected);
        }
        
        /**
         * Create a checkbox input field.
         *
         * @param string $name
         * @param mixed $value
         * @param bool $checked
         * @param array $options
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */
        public static function checkbox($name, $value = 1, $checked = null, $options = array())
        {
            return \Collective\Html\FormBuilder::checkbox($name, $value, $checked, $options);
        }
        
        /**
         * Create a radio button input field.
         *
         * @param string $name
         * @param mixed $value
         * @param bool $checked
         * @param array $options
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */
        public static function radio($name, $value = null, $checked = null, $options = array())
        {
            return \Collective\Html\FormBuilder::radio($name, $value, $checked, $options);
        }
        
        /**
         * Create a HTML reset input element.
         *
         * @param string $value
         * @param array $attributes
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */
        public static function reset($value, $attributes = array())
        {
            return \Collective\Html\FormBuilder::reset($value, $attributes);
        }
        
        /**
         * Create a HTML image input element.
         *
         * @param string $url
         * @param string $name
         * @param array $attributes
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */
        public static function image($url, $name = null, $attributes = array())
        {
            return \Collective\Html\FormBuilder::image($url, $name, $attributes);
        }
        
        /**
         * Create a color input field.
         *
         * @param string $name
         * @param string $value
         * @param array $options
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */
        public static function color($name, $value = null, $options = array())
        {
            return \Collective\Html\FormBuilder::color($name, $value, $options);
        }
        
        /**
         * Create a submit button element.
         *
         * @param string $value
         * @param array $options
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */
        public static function submit($value = null, $options = array())
        {
            return \Collective\Html\FormBuilder::submit($value, $options);
        }
        
        /**
         * Create a button element.
         *
         * @param string $value
         * @param array $options
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */
        public static function button($value = null, $options = array())
        {
            return \Collective\Html\FormBuilder::button($value, $options);
        }
        
        /**
         * Get the ID attribute for a field name.
         *
         * @param string $name
         * @param array $attributes
         * @return string 
         * @static 
         */
        public static function getIdAttribute($name, $attributes)
        {
            return \Collective\Html\FormBuilder::getIdAttribute($name, $attributes);
        }
        
        /**
         * Get the value that should be assigned to the field.
         *
         * @param string $name
         * @param string $value
         * @return mixed 
         * @static 
         */
        public static function getValueAttribute($name, $value = null)
        {
            return \Collective\Html\FormBuilder::getValueAttribute($name, $value);
        }
        
        /**
         * Get a value from the session's old input.
         *
         * @param string $name
         * @return mixed 
         * @static 
         */
        public static function old($name)
        {
            return \Collective\Html\FormBuilder::old($name);
        }
        
        /**
         * Determine if the old input is empty.
         *
         * @return bool 
         * @static 
         */
        public static function oldInputIsEmpty()
        {
            return \Collective\Html\FormBuilder::oldInputIsEmpty();
        }
        
        /**
         * Get the session store implementation.
         *
         * @return \Illuminate\Session\SessionInterface $session
         * @static 
         */
        public static function getSessionStore()
        {
            return \Collective\Html\FormBuilder::getSessionStore();
        }
        
        /**
         * Set the session store implementation.
         *
         * @param \Illuminate\Session\SessionInterface $session
         * @return $this 
         * @static 
         */
        public static function setSessionStore($session)
        {
            return \Collective\Html\FormBuilder::setSessionStore($session);
        }
        
        /**
         * Register a custom macro.
         *
         * @param string $name
         * @param callable $macro
         * @return void 
         * @static 
         */
        public static function macro($name, $macro)
        {
            \Collective\Html\FormBuilder::macro($name, $macro);
        }
        
        /**
         * Checks if macro is registered.
         *
         * @param string $name
         * @return bool 
         * @static 
         */
        public static function hasMacro($name)
        {
            return \Collective\Html\FormBuilder::hasMacro($name);
        }
        
        /**
         * Dynamically handle calls to the class.
         *
         * @param string $method
         * @param array $parameters
         * @return mixed 
         * @throws \BadMethodCallException
         * @static 
         */
        public static function macroCall($method, $parameters)
        {
            return \Collective\Html\FormBuilder::macroCall($method, $parameters);
        }
        
        /**
         * Register a custom component.
         *
         * @param $name
         * @param $view
         * @param array $signature
         * @return void 
         * @static 
         */
        public static function component($name, $view, $signature)
        {
            \Collective\Html\FormBuilder::component($name, $view, $signature);
        }
        
        /**
         * Check if a component is registered.
         *
         * @param $name
         * @return bool 
         * @static 
         */
        public static function hasComponent($name)
        {
            return \Collective\Html\FormBuilder::hasComponent($name);
        }
        
        /**
         * Dynamically handle calls to the class.
         *
         * @param string $method
         * @param array $parameters
         * @return \Illuminate\Contracts\View\View|mixed 
         * @throws \BadMethodCallException
         * @static 
         */
        public static function componentCall($method, $parameters)
        {
            return \Collective\Html\FormBuilder::componentCall($method, $parameters);
        }
        
    }         

    class HtmlFacade {
        
        /**
         * Convert an HTML string to entities.
         *
         * @param string $value
         * @return string 
         * @static 
         */
        public static function entities($value)
        {
            return \Collective\Html\HtmlBuilder::entities($value);
        }
        
        /**
         * Convert all applicable characters to HTML entities.
         *
         * @param string $value
         * @return string 
         * @static 
         */
        public static function escapeAll($value)
        {
            return \Collective\Html\HtmlBuilder::escapeAll($value);
        }
        
        /**
         * Convert entities to HTML characters.
         *
         * @param string $value
         * @return string 
         * @static 
         */
        public static function decode($value)
        {
            return \Collective\Html\HtmlBuilder::decode($value);
        }
        
        /**
         * Generate a link to a JavaScript file.
         *
         * @param string $url
         * @param array $attributes
         * @param bool $secure
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */
        public static function script($url, $attributes = array(), $secure = null)
        {
            return \Collective\Html\HtmlBuilder::script($url, $attributes, $secure);
        }
        
        /**
         * Generate a link to a CSS file.
         *
         * @param string $url
         * @param array $attributes
         * @param bool $secure
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */
        public static function style($url, $attributes = array(), $secure = null)
        {
            return \Collective\Html\HtmlBuilder::style($url, $attributes, $secure);
        }
        
        /**
         * Generate an HTML image element.
         *
         * @param string $url
         * @param string $alt
         * @param array $attributes
         * @param bool $secure
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */
        public static function image($url, $alt = null, $attributes = array(), $secure = null)
        {
            return \Collective\Html\HtmlBuilder::image($url, $alt, $attributes, $secure);
        }
        
        /**
         * Generate a link to a Favicon file.
         *
         * @param string $url
         * @param array $attributes
         * @param bool $secure
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */
        public static function favicon($url, $attributes = array(), $secure = null)
        {
            return \Collective\Html\HtmlBuilder::favicon($url, $attributes, $secure);
        }
        
        /**
         * Generate a HTML link.
         *
         * @param string $url
         * @param string $title
         * @param array $attributes
         * @param bool $secure
         * @param bool $escape
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */
        public static function link($url, $title = null, $attributes = array(), $secure = null, $escape = true)
        {
            return \Collective\Html\HtmlBuilder::link($url, $title, $attributes, $secure, $escape);
        }
        
        /**
         * Generate a HTTPS HTML link.
         *
         * @param string $url
         * @param string $title
         * @param array $attributes
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */
        public static function secureLink($url, $title = null, $attributes = array())
        {
            return \Collective\Html\HtmlBuilder::secureLink($url, $title, $attributes);
        }
        
        /**
         * Generate a HTML link to an asset.
         *
         * @param string $url
         * @param string $title
         * @param array $attributes
         * @param bool $secure
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */
        public static function linkAsset($url, $title = null, $attributes = array(), $secure = null)
        {
            return \Collective\Html\HtmlBuilder::linkAsset($url, $title, $attributes, $secure);
        }
        
        /**
         * Generate a HTTPS HTML link to an asset.
         *
         * @param string $url
         * @param string $title
         * @param array $attributes
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */
        public static function linkSecureAsset($url, $title = null, $attributes = array())
        {
            return \Collective\Html\HtmlBuilder::linkSecureAsset($url, $title, $attributes);
        }
        
        /**
         * Generate a HTML link to a named route.
         *
         * @param string $name
         * @param string $title
         * @param array $parameters
         * @param array $attributes
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */
        public static function linkRoute($name, $title = null, $parameters = array(), $attributes = array())
        {
            return \Collective\Html\HtmlBuilder::linkRoute($name, $title, $parameters, $attributes);
        }
        
        /**
         * Generate a HTML link to a controller action.
         *
         * @param string $action
         * @param string $title
         * @param array $parameters
         * @param array $attributes
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */
        public static function linkAction($action, $title = null, $parameters = array(), $attributes = array())
        {
            return \Collective\Html\HtmlBuilder::linkAction($action, $title, $parameters, $attributes);
        }
        
        /**
         * Generate a HTML link to an email address.
         *
         * @param string $email
         * @param string $title
         * @param array $attributes
         * @param bool $escape
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */
        public static function mailto($email, $title = null, $attributes = array(), $escape = true)
        {
            return \Collective\Html\HtmlBuilder::mailto($email, $title, $attributes, $escape);
        }
        
        /**
         * Obfuscate an e-mail address to prevent spam-bots from sniffing it.
         *
         * @param string $email
         * @return string 
         * @static 
         */
        public static function email($email)
        {
            return \Collective\Html\HtmlBuilder::email($email);
        }
        
        /**
         * Generates non-breaking space entities based on number supplied.
         *
         * @param int $num
         * @return string 
         * @static 
         */
        public static function nbsp($num = 1)
        {
            return \Collective\Html\HtmlBuilder::nbsp($num);
        }
        
        /**
         * Generate an ordered list of items.
         *
         * @param array $list
         * @param array $attributes
         * @return \Illuminate\Support\HtmlString|string 
         * @static 
         */
        public static function ol($list, $attributes = array())
        {
            return \Collective\Html\HtmlBuilder::ol($list, $attributes);
        }
        
        /**
         * Generate an un-ordered list of items.
         *
         * @param array $list
         * @param array $attributes
         * @return \Illuminate\Support\HtmlString|string 
         * @static 
         */
        public static function ul($list, $attributes = array())
        {
            return \Collective\Html\HtmlBuilder::ul($list, $attributes);
        }
        
        /**
         * Generate a description list of items.
         *
         * @param array $list
         * @param array $attributes
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */
        public static function dl($list, $attributes = array())
        {
            return \Collective\Html\HtmlBuilder::dl($list, $attributes);
        }
        
        /**
         * Build an HTML attribute string from an array.
         *
         * @param array $attributes
         * @return string 
         * @static 
         */
        public static function attributes($attributes)
        {
            return \Collective\Html\HtmlBuilder::attributes($attributes);
        }
        
        /**
         * Obfuscate a string to prevent spam-bots from sniffing it.
         *
         * @param string $value
         * @return string 
         * @static 
         */
        public static function obfuscate($value)
        {
            return \Collective\Html\HtmlBuilder::obfuscate($value);
        }
        
        /**
         * Generate a meta tag.
         *
         * @param string $name
         * @param string $content
         * @param array $attributes
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */
        public static function meta($name, $content, $attributes = array())
        {
            return \Collective\Html\HtmlBuilder::meta($name, $content, $attributes);
        }
        
        /**
         * Generate an html tag.
         *
         * @param string $tag
         * @param mixed $content
         * @param array $attributes
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */
        public static function tag($tag, $content, $attributes = array())
        {
            return \Collective\Html\HtmlBuilder::tag($tag, $content, $attributes);
        }
        
        /**
         * Register a custom macro.
         *
         * @param string $name
         * @param callable $macro
         * @return void 
         * @static 
         */
        public static function macro($name, $macro)
        {
            \Collective\Html\HtmlBuilder::macro($name, $macro);
        }
        
        /**
         * Checks if macro is registered.
         *
         * @param string $name
         * @return bool 
         * @static 
         */
        public static function hasMacro($name)
        {
            return \Collective\Html\HtmlBuilder::hasMacro($name);
        }
        
        /**
         * Dynamically handle calls to the class.
         *
         * @param string $method
         * @param array $parameters
         * @return mixed 
         * @throws \BadMethodCallException
         * @static 
         */
        public static function macroCall($method, $parameters)
        {
            return \Collective\Html\HtmlBuilder::macroCall($method, $parameters);
        }
        
        /**
         * Register a custom component.
         *
         * @param $name
         * @param $view
         * @param array $signature
         * @return void 
         * @static 
         */
        public static function component($name, $view, $signature)
        {
            \Collective\Html\HtmlBuilder::component($name, $view, $signature);
        }
        
        /**
         * Check if a component is registered.
         *
         * @param $name
         * @return bool 
         * @static 
         */
        public static function hasComponent($name)
        {
            return \Collective\Html\HtmlBuilder::hasComponent($name);
        }
        
        /**
         * Dynamically handle calls to the class.
         *
         * @param string $method
         * @param array $parameters
         * @return \Illuminate\Contracts\View\View|mixed 
         * @throws \BadMethodCallException
         * @static 
         */
        public static function componentCall($method, $parameters)
        {
            return \Collective\Html\HtmlBuilder::componentCall($method, $parameters);
        }
        
    }         
}
    
namespace Intervention\Image\Facades {

    class Image {
        
        /**
         * Overrides configuration settings
         *
         * @param array $config
         * @static 
         */
        public static function configure($config = array())
        {
            return \Intervention\Image\ImageManager::configure($config);
        }
        
        /**
         * Initiates an Image instance from different input types
         *
         * @param mixed $data
         * @return \Intervention\Image\Image 
         * @static 
         */
        public static function make($data)
        {
            return \Intervention\Image\ImageManager::make($data);
        }
        
        /**
         * Creates an empty image canvas
         *
         * @param integer $width
         * @param integer $height
         * @param mixed $background
         * @return \Intervention\Image\Image 
         * @static 
         */
        public static function canvas($width, $height, $background = null)
        {
            return \Intervention\Image\ImageManager::canvas($width, $height, $background);
        }
        
        /**
         * Create new cached image and run callback
         * (requires additional package intervention/imagecache)
         *
         * @param \Closure $callback
         * @param integer $lifetime
         * @param boolean $returnObj
         * @return \Image 
         * @static 
         */
        public static function cache($callback, $lifetime = null, $returnObj = false)
        {
            return \Intervention\Image\ImageManager::cache($callback, $lifetime, $returnObj);
        }
        
    }         
}
    
namespace Laravel\Socialite\Facades {

    class Socialite {
        
        /**
         * Get a driver instance.
         *
         * @param string $driver
         * @return mixed 
         * @static 
         */
        public static function with($driver)
        {
            return \Laravel\Socialite\SocialiteManager::with($driver);
        }
        
        /**
         * Build an OAuth 2 provider instance.
         *
         * @param string $provider
         * @param array $config
         * @return \Laravel\Socialite\Two\AbstractProvider 
         * @static 
         */
        public static function buildProvider($provider, $config)
        {
            return \Laravel\Socialite\SocialiteManager::buildProvider($provider, $config);
        }
        
        /**
         * Format the server configuration.
         *
         * @param array $config
         * @return array 
         * @static 
         */
        public static function formatConfig($config)
        {
            return \Laravel\Socialite\SocialiteManager::formatConfig($config);
        }
        
        /**
         * Get the default driver name.
         *
         * @throws \InvalidArgumentException
         * @return string 
         * @static 
         */
        public static function getDefaultDriver()
        {
            return \Laravel\Socialite\SocialiteManager::getDefaultDriver();
        }
        
        /**
         * Get a driver instance.
         *
         * @param string $driver
         * @return mixed 
         * @static 
         */
        public static function driver($driver = null)
        {
            //Method inherited from \Illuminate\Support\Manager            
            return \Laravel\Socialite\SocialiteManager::driver($driver);
        }
        
        /**
         * Register a custom driver creator Closure.
         *
         * @param string $driver
         * @param \Closure $callback
         * @return $this 
         * @static 
         */
        public static function extend($driver, $callback)
        {
            //Method inherited from \Illuminate\Support\Manager            
            return \Laravel\Socialite\SocialiteManager::extend($driver, $callback);
        }
        
        /**
         * Get all of the created "drivers".
         *
         * @return array 
         * @static 
         */
        public static function getDrivers()
        {
            //Method inherited from \Illuminate\Support\Manager            
            return \Laravel\Socialite\SocialiteManager::getDrivers();
        }
        
    }         
}
    
namespace App\Core\Access {

    class AccessFacade {
        
        /**
         * Checks if the current user has a role by its name
         *
         * @param string $name Role name.
         * @return bool 
         * @static 
         */
        public static function hasRole($role, $requireAll = false)
        {
            return \App\Core\Access\Access::hasRole($role, $requireAll);
        }
        
        /**
         * Check if the current user has a permission by its name
         *
         * @param string $permission Permission string.
         * @return bool 
         * @static 
         */
        public static function may($permission, $requireAll = false)
        {
            return \App\Core\Access\Access::may($permission, $requireAll);
        }
        
        /**
         * 
         *
         * @return mixed 
         * @static 
         */
        public static function user()
        {
            return \App\Core\Access\Access::user();
        }
        
        /**
         * Filters a route for a role or set of roles.
         * 
         * If the third parameter is null then abort with status code 403.
         * Otherwise the $result is returned.
         *
         * @param string $route Route pattern. i.e: "admin/*"
         * @param array|string $roles The role(s) needed
         * @param mixed $result i.e: Redirect::to('/')
         * @param bool $requireAll User must have all roles
         * @return mixed 
         * @static 
         */
        public static function routeNeedsRole($route, $roles, $result = null, $requireAll = true)
        {
            return \App\Core\Access\Access::routeNeedsRole($route, $roles, $result, $requireAll);
        }
        
        /**
         * Filters a route for a permission or set of permissions.
         * 
         * If the third parameter is null then abort with status code 403.
         * Otherwise the $result is returned.
         *
         * @param string $route Route pattern. i.e: "admin/*"
         * @param array|string $permissions The permission(s) needed
         * @param mixed $result i.e: Redirect::to('/')
         * @param bool $requireAll User must have all permissions
         * @return mixed 
         * @static 
         */
        public static function routeNeedsPermission($route, $permissions, $result = null, $requireAll = true)
        {
            return \App\Core\Access\Access::routeNeedsPermission($route, $permissions, $result, $requireAll);
        }
        
        /**
         * Filters a route for role(s) and/or permission(s).
         * 
         * If the third parameter is null then abort with status code 403.
         * Otherwise the $result is returned.
         *
         * @param string $route Route pattern. i.e: "admin/*"
         * @param array|string $roles The role(s) needed
         * @param array|string $permissions The permission(s) needed
         * @param mixed $result i.e: Redirect::to('/')
         * @param bool $requireAll User must have all roles and permissions
         * @return void 
         * @static 
         */
        public static function routeNeedsRoleOrPermission($route, $roles, $permissions, $result = null, $requireAll = false)
        {
            \App\Core\Access\Access::routeNeedsRoleOrPermission($route, $roles, $permissions, $result, $requireAll);
        }
        
    }         
}
    
namespace Plank\Mediable {

    class MediaUploaderFacade {
        
        /**
         * Set the source for the file.
         *
         * @param mixed $source
         * @return static 
         * @static 
         */
        public static function fromSource($source)
        {
            return \Plank\Mediable\MediaUploader::fromSource($source);
        }
        
        /**
         * Set the source for the string data.
         *
         * @param string $source
         * @return static 
         * @static 
         */
        public static function fromString($source)
        {
            return \Plank\Mediable\MediaUploader::fromString($source);
        }
        
        /**
         * Set the filesystem disk and relative directory where the file will be saved.
         *
         * @param string $disk
         * @param string $directory
         * @return static 
         * @static 
         */
        public static function toDestination($disk, $directory)
        {
            return \Plank\Mediable\MediaUploader::toDestination($disk, $directory);
        }
        
        /**
         * Set the filesystem disk on which the file will be saved.
         *
         * @param string $disk
         * @return static 
         * @static 
         */
        public static function toDisk($disk)
        {
            return \Plank\Mediable\MediaUploader::toDisk($disk);
        }
        
        /**
         * Set the directory relative to the filesystem disk at which the file will be saved.
         *
         * @param string $directory
         * @return static 
         * @static 
         */
        public static function toDirectory($directory)
        {
            return \Plank\Mediable\MediaUploader::toDirectory($directory);
        }
        
        /**
         * Specify the filename to copy to the file to.
         *
         * @param string $filename
         * @return static 
         * @static 
         */
        public static function useFilename($filename)
        {
            return \Plank\Mediable\MediaUploader::useFilename($filename);
        }
        
        /**
         * Indicates to the uploader to generate a filename using the file's MD5 hash.
         *
         * @return static 
         * @static 
         */
        public static function useHashForFilename()
        {
            return \Plank\Mediable\MediaUploader::useHashForFilename();
        }
        
        /**
         * Restore the default behaviour of using the source file's filename.
         *
         * @return static 
         * @static 
         */
        public static function useOriginalFilename()
        {
            return \Plank\Mediable\MediaUploader::useOriginalFilename();
        }
        
        /**
         * Change the class to use for generated Media.
         *
         * @param string $class
         * @return static 
         * @throws \Plank\Mediable\Exceptions\MediaUpload\ConfigurationException if $class does not extend Plank\Mediable\Media
         * @static 
         */
        public static function setModelClass($class)
        {
            return \Plank\Mediable\MediaUploader::setModelClass($class);
        }
        
        /**
         * Change the maximum allowed filesize.
         *
         * @param int $size
         * @return static 
         * @static 
         */
        public static function setMaximumSize($size)
        {
            return \Plank\Mediable\MediaUploader::setMaximumSize($size);
        }
        
        /**
         * Change the behaviour for when a file already exists at the destination.
         *
         * @param string $behavior
         * @return static 
         * @static 
         */
        public static function setOnDuplicateBehavior($behavior)
        {
            return \Plank\Mediable\MediaUploader::setOnDuplicateBehavior($behavior);
        }
        
        /**
         * Get current behavior when duplicate file is uploaded.
         *
         * @return string 
         * @static 
         */
        public static function getOnDuplicateBehavior()
        {
            return \Plank\Mediable\MediaUploader::getOnDuplicateBehavior();
        }
        
        /**
         * Throw an exception when file already exists at the destination.
         *
         * @return static 
         * @static 
         */
        public static function onDuplicateError()
        {
            return \Plank\Mediable\MediaUploader::onDuplicateError();
        }
        
        /**
         * Append incremented counter to file name when file already exists at destination.
         *
         * @return static 
         * @static 
         */
        public static function onDuplicateIncrement()
        {
            return \Plank\Mediable\MediaUploader::onDuplicateIncrement();
        }
        
        /**
         * Overwrite existing file when file already exists at destination.
         *
         * @return static 
         * @static 
         */
        public static function onDuplicateReplace()
        {
            return \Plank\Mediable\MediaUploader::onDuplicateReplace();
        }
        
        /**
         * Change whether both the MIME type and extensions must match the same aggregate type.
         *
         * @param bool $strict
         * @return static 
         * @static 
         */
        public static function setStrictTypeChecking($strict)
        {
            return \Plank\Mediable\MediaUploader::setStrictTypeChecking($strict);
        }
        
        /**
         * Change whether files not matching any aggregate types are allowed.
         *
         * @param bool $allow
         * @return static 
         * @static 
         */
        public static function setAllowUnrecognizedTypes($allow)
        {
            return \Plank\Mediable\MediaUploader::setAllowUnrecognizedTypes($allow);
        }
        
        /**
         * Add or update the definition of a aggregate type.
         *
         * @param string $type the name of the type
         * @param array $mime_types list of MIME types recognized
         * @param array $extensions list of file extensions recognized
         * @return static 
         * @static 
         */
        public static function setTypeDefinition($type, $mime_types, $extensions)
        {
            return \Plank\Mediable\MediaUploader::setTypeDefinition($type, $mime_types, $extensions);
        }
        
        /**
         * Set a list of MIME types that the source file must be restricted to.
         *
         * @param array $allowed_mimes
         * @return static 
         * @static 
         */
        public static function setAllowedMimeTypes($allowed_mimes)
        {
            return \Plank\Mediable\MediaUploader::setAllowedMimeTypes($allowed_mimes);
        }
        
        /**
         * Set a list of file extensions that the source file must be restricted to.
         *
         * @param array $allowed_extensions
         * @return static 
         * @static 
         */
        public static function setAllowedExtensions($allowed_extensions)
        {
            return \Plank\Mediable\MediaUploader::setAllowedExtensions($allowed_extensions);
        }
        
        /**
         * Set a list of aggregate types that the source file must be restricted to.
         *
         * @param array $allowed_types
         * @return static 
         * @static 
         */
        public static function setAllowedAggregateTypes($allowed_types)
        {
            return \Plank\Mediable\MediaUploader::setAllowedAggregateTypes($allowed_types);
        }
        
        /**
         * Determine the aggregate type of the file based on the MIME type and the extension.
         *
         * @param string $mime_type
         * @param string $extension
         * @return string 
         * @throws \Plank\Mediable\Exceptions\MediaUpload\FileNotSupportedException If the file type is not recognized
         * @throws \Plank\Mediable\Exceptions\MediaUpload\FileNotSupportedException If the file type is restricted
         * @throws \Plank\Mediable\Exceptions\MediaUpload\FileNotSupportedException If the aggregate type is restricted
         * @static 
         */
        public static function inferAggregateType($mime_type, $extension)
        {
            return \Plank\Mediable\MediaUploader::inferAggregateType($mime_type, $extension);
        }
        
        /**
         * Determine the aggregate type of the file based on the MIME type.
         *
         * @param string $mime
         * @return string 
         * @static 
         */
        public static function possibleAggregateTypesForMimeType($mime)
        {
            return \Plank\Mediable\MediaUploader::possibleAggregateTypesForMimeType($mime);
        }
        
        /**
         * Determine the aggregate type of the file based on the extension.
         *
         * @param string $extension
         * @return string|null 
         * @static 
         */
        public static function possibleAggregateTypesForExtension($extension)
        {
            return \Plank\Mediable\MediaUploader::possibleAggregateTypesForExtension($extension);
        }
        
        /**
         * Process the file upload.
         * 
         * Validates the source, then stores the file onto the disk and creates and stores a new Media instance.
         *
         * @return \Plank\Mediable\Media 
         * @static 
         */
        public static function upload()
        {
            return \Plank\Mediable\MediaUploader::upload();
        }
        
        /**
         * Create a `Media` record for a file already on a disk.
         *
         * @param string $disk
         * @param string $path Path to file, relative to disk root
         * @return \Plank\Mediable\Media 
         * @static 
         */
        public static function importPath($disk, $path)
        {
            return \Plank\Mediable\MediaUploader::importPath($disk, $path);
        }
        
        /**
         * Create a `Media` record for a file already on a disk.
         *
         * @param string $disk
         * @param string $directory
         * @param string $filename
         * @param string $extension
         * @return \Plank\Mediable\Media 
         * @throws \Plank\Mediable\Exceptions\MediaUploadFileNotFoundException If the file does not exist
         * @static 
         */
        public static function import($disk, $directory, $filename, $extension)
        {
            return \Plank\Mediable\MediaUploader::import($disk, $directory, $filename, $extension);
        }
        
        /**
         * Reanalyze a media record's file and adjust the aggregate type and size, if necessary.
         *
         * @param \Plank\Mediable\Media $media
         * @return bool Whether the model was modified
         * @static 
         */
        public static function update($media)
        {
            return \Plank\Mediable\MediaUploader::update($media);
        }
        
    }         
}
    
namespace Webpatser\Countries {

    class CountriesFacade {
        
        /**
         * Returns one country
         *
         * @param string $id The country id
         * @return array 
         * @static 
         */
        public static function getOne($id)
        {
            return \Webpatser\Countries\Countries::getOne($id);
        }
        
        /**
         * Returns a list of countries
         *
         * @param string  sort
         * @return array 
         * @static 
         */
        public static function getList($sort = null)
        {
            return \Webpatser\Countries\Countries::getList($sort);
        }
        
        /**
         * Returns a list of countries suitable to use with a select element in Laravelcollective\html
         * Will show the value and sort by the column specified in the display attribute
         *
         * @param string  display
         * @return array 
         * @static 
         */
        public static function getListForSelect($display = 'name')
        {
            return \Webpatser\Countries\Countries::getListForSelect($display);
        }
        
        /**
         * Clear the list of booted models so they will be re-booted.
         *
         * @return void 
         * @static 
         */
        public static function clearBootedModels()
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            \Webpatser\Countries\Countries::clearBootedModels();
        }
        
        /**
         * Register a new global scope on the model.
         *
         * @param \Illuminate\Database\Eloquent\Scope|\Closure|string $scope
         * @param \Closure|null $implementation
         * @return mixed 
         * @throws \InvalidArgumentException
         * @static 
         */
        public static function addGlobalScope($scope, $implementation = null)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::addGlobalScope($scope, $implementation);
        }
        
        /**
         * Determine if a model has a global scope.
         *
         * @param \Illuminate\Database\Eloquent\Scope|string $scope
         * @return bool 
         * @static 
         */
        public static function hasGlobalScope($scope)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::hasGlobalScope($scope);
        }
        
        /**
         * Get a global scope registered with the model.
         *
         * @param \Illuminate\Database\Eloquent\Scope|string $scope
         * @return \Illuminate\Database\Eloquent\Scope|\Closure|null 
         * @static 
         */
        public static function getGlobalScope($scope)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::getGlobalScope($scope);
        }
        
        /**
         * Get the global scopes for this class instance.
         *
         * @return array 
         * @static 
         */
        public static function getGlobalScopes()
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::getGlobalScopes();
        }
        
        /**
         * Register an observer with the Model.
         *
         * @param object|string $class
         * @param int $priority
         * @return void 
         * @static 
         */
        public static function observe($class, $priority = 0)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            \Webpatser\Countries\Countries::observe($class, $priority);
        }
        
        /**
         * Fill the model with an array of attributes.
         *
         * @param array $attributes
         * @return $this 
         * @throws \Illuminate\Database\Eloquent\MassAssignmentException
         * @static 
         */
        public static function fill($attributes)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::fill($attributes);
        }
        
        /**
         * Fill the model with an array of attributes. Force mass assignment.
         *
         * @param array $attributes
         * @return $this 
         * @static 
         */
        public static function forceFill($attributes)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::forceFill($attributes);
        }
        
        /**
         * Create a new instance of the given model.
         *
         * @param array $attributes
         * @param bool $exists
         * @return static 
         * @static 
         */
        public static function newInstance($attributes = array(), $exists = false)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::newInstance($attributes, $exists);
        }
        
        /**
         * Create a new model instance that is existing.
         *
         * @param array $attributes
         * @param string|null $connection
         * @return static 
         * @static 
         */
        public static function newFromBuilder($attributes = array(), $connection = null)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::newFromBuilder($attributes, $connection);
        }
        
        /**
         * Create a collection of models from plain arrays.
         *
         * @param array $items
         * @param string|null $connection
         * @return \Illuminate\Database\Eloquent\Collection 
         * @static 
         */
        public static function hydrate($items, $connection = null)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::hydrate($items, $connection);
        }
        
        /**
         * Create a collection of models from a raw query.
         *
         * @param string $query
         * @param array $bindings
         * @param string|null $connection
         * @return \Illuminate\Database\Eloquent\Collection 
         * @static 
         */
        public static function hydrateRaw($query, $bindings = array(), $connection = null)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::hydrateRaw($query, $bindings, $connection);
        }
        
        /**
         * Save a new model and return the instance.
         *
         * @param array $attributes
         * @return static 
         * @static 
         */
        public static function create($attributes = array())
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::create($attributes);
        }
        
        /**
         * Save a new model and return the instance. Allow mass-assignment.
         *
         * @param array $attributes
         * @return static 
         * @static 
         */
        public static function forceCreate($attributes)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::forceCreate($attributes);
        }
        
        /**
         * Begin querying the model.
         *
         * @return \Illuminate\Database\Eloquent\Builder 
         * @static 
         */
        public static function query()
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::query();
        }
        
        /**
         * Begin querying the model on a given connection.
         *
         * @param string|null $connection
         * @return \Illuminate\Database\Eloquent\Builder 
         * @static 
         */
        public static function on($connection = null)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::on($connection);
        }
        
        /**
         * Begin querying the model on the write connection.
         *
         * @return \Illuminate\Database\Query\Builder 
         * @static 
         */
        public static function onWriteConnection()
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::onWriteConnection();
        }
        
        /**
         * Get all of the models from the database.
         *
         * @param array|mixed $columns
         * @return \Illuminate\Database\Eloquent\Collection|static[] 
         * @static 
         */
        public static function all($columns = array())
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::all($columns);
        }
        
        /**
         * Reload a fresh model instance from the database.
         *
         * @param array|string $with
         * @return static|null 
         * @static 
         */
        public static function fresh($with = array())
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::fresh($with);
        }
        
        /**
         * Eager load relations on the model.
         *
         * @param array|string $relations
         * @return $this 
         * @static 
         */
        public static function load($relations)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::load($relations);
        }
        
        /**
         * Begin querying a model with eager loading.
         *
         * @param array|string $relations
         * @return \Illuminate\Database\Eloquent\Builder|static 
         * @static 
         */
        public static function with($relations)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::with($relations);
        }
        
        /**
         * Append attributes to query when building a query.
         *
         * @param array|string $attributes
         * @return $this 
         * @static 
         */
        public static function append($attributes)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::append($attributes);
        }
        
        /**
         * Define a one-to-one relationship.
         *
         * @param string $related
         * @param string $foreignKey
         * @param string $localKey
         * @return \Illuminate\Database\Eloquent\Relations\HasOne 
         * @static 
         */
        public static function hasOne($related, $foreignKey = null, $localKey = null)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::hasOne($related, $foreignKey, $localKey);
        }
        
        /**
         * Define a polymorphic one-to-one relationship.
         *
         * @param string $related
         * @param string $name
         * @param string $type
         * @param string $id
         * @param string $localKey
         * @return \Illuminate\Database\Eloquent\Relations\MorphOne 
         * @static 
         */
        public static function morphOne($related, $name, $type = null, $id = null, $localKey = null)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::morphOne($related, $name, $type, $id, $localKey);
        }
        
        /**
         * Define an inverse one-to-one or many relationship.
         *
         * @param string $related
         * @param string $foreignKey
         * @param string $otherKey
         * @param string $relation
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo 
         * @static 
         */
        public static function belongsTo($related, $foreignKey = null, $otherKey = null, $relation = null)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::belongsTo($related, $foreignKey, $otherKey, $relation);
        }
        
        /**
         * Define a polymorphic, inverse one-to-one or many relationship.
         *
         * @param string $name
         * @param string $type
         * @param string $id
         * @return \Illuminate\Database\Eloquent\Relations\MorphTo 
         * @static 
         */
        public static function morphTo($name = null, $type = null, $id = null)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::morphTo($name, $type, $id);
        }
        
        /**
         * Retrieve the fully qualified class name from a slug.
         *
         * @param string $class
         * @return string 
         * @static 
         */
        public static function getActualClassNameForMorph($class)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::getActualClassNameForMorph($class);
        }
        
        /**
         * Define a one-to-many relationship.
         *
         * @param string $related
         * @param string $foreignKey
         * @param string $localKey
         * @return \Illuminate\Database\Eloquent\Relations\HasMany 
         * @static 
         */
        public static function hasMany($related, $foreignKey = null, $localKey = null)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::hasMany($related, $foreignKey, $localKey);
        }
        
        /**
         * Define a has-many-through relationship.
         *
         * @param string $related
         * @param string $through
         * @param string|null $firstKey
         * @param string|null $secondKey
         * @param string|null $localKey
         * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough 
         * @static 
         */
        public static function hasManyThrough($related, $through, $firstKey = null, $secondKey = null, $localKey = null)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::hasManyThrough($related, $through, $firstKey, $secondKey, $localKey);
        }
        
        /**
         * Define a polymorphic one-to-many relationship.
         *
         * @param string $related
         * @param string $name
         * @param string $type
         * @param string $id
         * @param string $localKey
         * @return \Illuminate\Database\Eloquent\Relations\MorphMany 
         * @static 
         */
        public static function morphMany($related, $name, $type = null, $id = null, $localKey = null)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::morphMany($related, $name, $type, $id, $localKey);
        }
        
        /**
         * Define a many-to-many relationship.
         *
         * @param string $related
         * @param string $table
         * @param string $foreignKey
         * @param string $otherKey
         * @param string $relation
         * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany 
         * @static 
         */
        public static function belongsToMany($related, $table = null, $foreignKey = null, $otherKey = null, $relation = null)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::belongsToMany($related, $table, $foreignKey, $otherKey, $relation);
        }
        
        /**
         * Define a polymorphic many-to-many relationship.
         *
         * @param string $related
         * @param string $name
         * @param string $table
         * @param string $foreignKey
         * @param string $otherKey
         * @param bool $inverse
         * @return \Illuminate\Database\Eloquent\Relations\MorphToMany 
         * @static 
         */
        public static function morphToMany($related, $name, $table = null, $foreignKey = null, $otherKey = null, $inverse = false)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::morphToMany($related, $name, $table, $foreignKey, $otherKey, $inverse);
        }
        
        /**
         * Define a polymorphic, inverse many-to-many relationship.
         *
         * @param string $related
         * @param string $name
         * @param string $table
         * @param string $foreignKey
         * @param string $otherKey
         * @return \Illuminate\Database\Eloquent\Relations\MorphToMany 
         * @static 
         */
        public static function morphedByMany($related, $name, $table = null, $foreignKey = null, $otherKey = null)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::morphedByMany($related, $name, $table, $foreignKey, $otherKey);
        }
        
        /**
         * Get the joining table name for a many-to-many relation.
         *
         * @param string $related
         * @return string 
         * @static 
         */
        public static function joiningTable($related)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::joiningTable($related);
        }
        
        /**
         * Destroy the models for the given IDs.
         *
         * @param array|int $ids
         * @return int 
         * @static 
         */
        public static function destroy($ids)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::destroy($ids);
        }
        
        /**
         * Delete the model from the database.
         *
         * @return bool|null 
         * @throws \Exception
         * @static 
         */
        public static function delete()
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::delete();
        }
        
        /**
         * Force a hard delete on a soft deleted model.
         * 
         * This method protects developers from running forceDelete when trait is missing.
         *
         * @return bool|null 
         * @static 
         */
        public static function forceDelete()
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::forceDelete();
        }
        
        /**
         * Register a saving model event with the dispatcher.
         *
         * @param \Closure|string $callback
         * @param int $priority
         * @return void 
         * @static 
         */
        public static function saving($callback, $priority = 0)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            \Webpatser\Countries\Countries::saving($callback, $priority);
        }
        
        /**
         * Register a saved model event with the dispatcher.
         *
         * @param \Closure|string $callback
         * @param int $priority
         * @return void 
         * @static 
         */
        public static function saved($callback, $priority = 0)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            \Webpatser\Countries\Countries::saved($callback, $priority);
        }
        
        /**
         * Register an updating model event with the dispatcher.
         *
         * @param \Closure|string $callback
         * @param int $priority
         * @return void 
         * @static 
         */
        public static function updating($callback, $priority = 0)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            \Webpatser\Countries\Countries::updating($callback, $priority);
        }
        
        /**
         * Register an updated model event with the dispatcher.
         *
         * @param \Closure|string $callback
         * @param int $priority
         * @return void 
         * @static 
         */
        public static function updated($callback, $priority = 0)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            \Webpatser\Countries\Countries::updated($callback, $priority);
        }
        
        /**
         * Register a creating model event with the dispatcher.
         *
         * @param \Closure|string $callback
         * @param int $priority
         * @return void 
         * @static 
         */
        public static function creating($callback, $priority = 0)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            \Webpatser\Countries\Countries::creating($callback, $priority);
        }
        
        /**
         * Register a created model event with the dispatcher.
         *
         * @param \Closure|string $callback
         * @param int $priority
         * @return void 
         * @static 
         */
        public static function created($callback, $priority = 0)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            \Webpatser\Countries\Countries::created($callback, $priority);
        }
        
        /**
         * Register a deleting model event with the dispatcher.
         *
         * @param \Closure|string $callback
         * @param int $priority
         * @return void 
         * @static 
         */
        public static function deleting($callback, $priority = 0)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            \Webpatser\Countries\Countries::deleting($callback, $priority);
        }
        
        /**
         * Register a deleted model event with the dispatcher.
         *
         * @param \Closure|string $callback
         * @param int $priority
         * @return void 
         * @static 
         */
        public static function deleted($callback, $priority = 0)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            \Webpatser\Countries\Countries::deleted($callback, $priority);
        }
        
        /**
         * Remove all of the event listeners for the model.
         *
         * @return void 
         * @static 
         */
        public static function flushEventListeners()
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            \Webpatser\Countries\Countries::flushEventListeners();
        }
        
        /**
         * Get the observable event names.
         *
         * @return array 
         * @static 
         */
        public static function getObservableEvents()
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::getObservableEvents();
        }
        
        /**
         * Set the observable event names.
         *
         * @param array $observables
         * @return $this 
         * @static 
         */
        public static function setObservableEvents($observables)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::setObservableEvents($observables);
        }
        
        /**
         * Add an observable event name.
         *
         * @param array|mixed $observables
         * @return void 
         * @static 
         */
        public static function addObservableEvents($observables)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            \Webpatser\Countries\Countries::addObservableEvents($observables);
        }
        
        /**
         * Remove an observable event name.
         *
         * @param array|mixed $observables
         * @return void 
         * @static 
         */
        public static function removeObservableEvents($observables)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            \Webpatser\Countries\Countries::removeObservableEvents($observables);
        }
        
        /**
         * Update the model in the database.
         *
         * @param array $attributes
         * @param array $options
         * @return bool 
         * @static 
         */
        public static function update($attributes = array(), $options = array())
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::update($attributes, $options);
        }
        
        /**
         * Save the model and all of its relationships.
         *
         * @return bool 
         * @static 
         */
        public static function push()
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::push();
        }
        
        /**
         * Save the model to the database.
         *
         * @param array $options
         * @return bool 
         * @static 
         */
        public static function save($options = array())
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::save($options);
        }
        
        /**
         * Save the model to the database using transaction.
         *
         * @param array $options
         * @return bool 
         * @throws \Throwable
         * @static 
         */
        public static function saveOrFail($options = array())
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::saveOrFail($options);
        }
        
        /**
         * Touch the owning relations of the model.
         *
         * @return void 
         * @static 
         */
        public static function touchOwners()
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            \Webpatser\Countries\Countries::touchOwners();
        }
        
        /**
         * Determine if the model touches a given relation.
         *
         * @param string $relation
         * @return bool 
         * @static 
         */
        public static function touches($relation)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::touches($relation);
        }
        
        /**
         * Update the model's update timestamp.
         *
         * @return bool 
         * @static 
         */
        public static function touch()
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::touch();
        }
        
        /**
         * Set the value of the "created at" attribute.
         *
         * @param mixed $value
         * @return $this 
         * @static 
         */
        public static function setCreatedAt($value)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::setCreatedAt($value);
        }
        
        /**
         * Set the value of the "updated at" attribute.
         *
         * @param mixed $value
         * @return $this 
         * @static 
         */
        public static function setUpdatedAt($value)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::setUpdatedAt($value);
        }
        
        /**
         * Get the name of the "created at" column.
         *
         * @return string 
         * @static 
         */
        public static function getCreatedAtColumn()
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::getCreatedAtColumn();
        }
        
        /**
         * Get the name of the "updated at" column.
         *
         * @return string 
         * @static 
         */
        public static function getUpdatedAtColumn()
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::getUpdatedAtColumn();
        }
        
        /**
         * Get a fresh timestamp for the model.
         *
         * @return \Carbon\Carbon 
         * @static 
         */
        public static function freshTimestamp()
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::freshTimestamp();
        }
        
        /**
         * Get a fresh timestamp for the model.
         *
         * @return string 
         * @static 
         */
        public static function freshTimestampString()
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::freshTimestampString();
        }
        
        /**
         * Get a new query builder for the model's table.
         *
         * @return \Illuminate\Database\Eloquent\Builder 
         * @static 
         */
        public static function newQuery()
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::newQuery();
        }
        
        /**
         * Get a new query instance without a given scope.
         *
         * @param \Illuminate\Database\Eloquent\Scope|string $scope
         * @return \Illuminate\Database\Eloquent\Builder 
         * @static 
         */
        public static function newQueryWithoutScope($scope)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::newQueryWithoutScope($scope);
        }
        
        /**
         * Get a new query builder that doesn't have any global scopes.
         *
         * @return \Illuminate\Database\Eloquent\Builder|static 
         * @static 
         */
        public static function newQueryWithoutScopes()
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::newQueryWithoutScopes();
        }
        
        /**
         * Create a new Eloquent query builder for the model.
         *
         * @param \Illuminate\Database\Query\Builder $query
         * @return \Illuminate\Database\Eloquent\Builder|static 
         * @static 
         */
        public static function newEloquentBuilder($query)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::newEloquentBuilder($query);
        }
        
        /**
         * Create a new Eloquent Collection instance.
         *
         * @param array $models
         * @return \Illuminate\Database\Eloquent\Collection 
         * @static 
         */
        public static function newCollection($models = array())
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::newCollection($models);
        }
        
        /**
         * Create a new pivot model instance.
         *
         * @param \Illuminate\Database\Eloquent\Model $parent
         * @param array $attributes
         * @param string $table
         * @param bool $exists
         * @return \Illuminate\Database\Eloquent\Relations\Pivot 
         * @static 
         */
        public static function newPivot($parent, $attributes, $table, $exists)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::newPivot($parent, $attributes, $table, $exists);
        }
        
        /**
         * Get the table associated with the model.
         *
         * @return string 
         * @static 
         */
        public static function getTable()
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::getTable();
        }
        
        /**
         * Set the table associated with the model.
         *
         * @param string $table
         * @return $this 
         * @static 
         */
        public static function setTable($table)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::setTable($table);
        }
        
        /**
         * Get the value of the model's primary key.
         *
         * @return mixed 
         * @static 
         */
        public static function getKey()
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::getKey();
        }
        
        /**
         * Get the queueable identity for the entity.
         *
         * @return mixed 
         * @static 
         */
        public static function getQueueableId()
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::getQueueableId();
        }
        
        /**
         * Get the primary key for the model.
         *
         * @return string 
         * @static 
         */
        public static function getKeyName()
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::getKeyName();
        }
        
        /**
         * Set the primary key for the model.
         *
         * @param string $key
         * @return $this 
         * @static 
         */
        public static function setKeyName($key)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::setKeyName($key);
        }
        
        /**
         * Get the table qualified key name.
         *
         * @return string 
         * @static 
         */
        public static function getQualifiedKeyName()
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::getQualifiedKeyName();
        }
        
        /**
         * Get the auto incrementing key type.
         *
         * @return string 
         * @static 
         */
        public static function getKeyType()
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::getKeyType();
        }
        
        /**
         * Get the value of the model's route key.
         *
         * @return mixed 
         * @static 
         */
        public static function getRouteKey()
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::getRouteKey();
        }
        
        /**
         * Get the route key for the model.
         *
         * @return string 
         * @static 
         */
        public static function getRouteKeyName()
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::getRouteKeyName();
        }
        
        /**
         * Determine if the model uses timestamps.
         *
         * @return bool 
         * @static 
         */
        public static function usesTimestamps()
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::usesTimestamps();
        }
        
        /**
         * Get the class name for polymorphic relations.
         *
         * @return string 
         * @static 
         */
        public static function getMorphClass()
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::getMorphClass();
        }
        
        /**
         * Get the number of models to return per page.
         *
         * @return int 
         * @static 
         */
        public static function getPerPage()
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::getPerPage();
        }
        
        /**
         * Set the number of models to return per page.
         *
         * @param int $perPage
         * @return $this 
         * @static 
         */
        public static function setPerPage($perPage)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::setPerPage($perPage);
        }
        
        /**
         * Get the default foreign key name for the model.
         *
         * @return string 
         * @static 
         */
        public static function getForeignKey()
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::getForeignKey();
        }
        
        /**
         * Get the hidden attributes for the model.
         *
         * @return array 
         * @static 
         */
        public static function getHidden()
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::getHidden();
        }
        
        /**
         * Set the hidden attributes for the model.
         *
         * @param array $hidden
         * @return $this 
         * @static 
         */
        public static function setHidden($hidden)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::setHidden($hidden);
        }
        
        /**
         * Add hidden attributes for the model.
         *
         * @param array|string|null $attributes
         * @return void 
         * @static 
         */
        public static function addHidden($attributes = null)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            \Webpatser\Countries\Countries::addHidden($attributes);
        }
        
        /**
         * Make the given, typically hidden, attributes visible.
         *
         * @param array|string $attributes
         * @return $this 
         * @static 
         */
        public static function makeVisible($attributes)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::makeVisible($attributes);
        }
        
        /**
         * Make the given, typically visible, attributes hidden.
         *
         * @param array|string $attributes
         * @return $this 
         * @static 
         */
        public static function makeHidden($attributes)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::makeHidden($attributes);
        }
        
        /**
         * Get the visible attributes for the model.
         *
         * @return array 
         * @static 
         */
        public static function getVisible()
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::getVisible();
        }
        
        /**
         * Set the visible attributes for the model.
         *
         * @param array $visible
         * @return $this 
         * @static 
         */
        public static function setVisible($visible)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::setVisible($visible);
        }
        
        /**
         * Add visible attributes for the model.
         *
         * @param array|string|null $attributes
         * @return void 
         * @static 
         */
        public static function addVisible($attributes = null)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            \Webpatser\Countries\Countries::addVisible($attributes);
        }
        
        /**
         * Set the accessors to append to model arrays.
         *
         * @param array $appends
         * @return $this 
         * @static 
         */
        public static function setAppends($appends)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::setAppends($appends);
        }
        
        /**
         * Get the fillable attributes for the model.
         *
         * @return array 
         * @static 
         */
        public static function getFillable()
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::getFillable();
        }
        
        /**
         * Set the fillable attributes for the model.
         *
         * @param array $fillable
         * @return $this 
         * @static 
         */
        public static function fillable($fillable)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::fillable($fillable);
        }
        
        /**
         * Get the guarded attributes for the model.
         *
         * @return array 
         * @static 
         */
        public static function getGuarded()
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::getGuarded();
        }
        
        /**
         * Set the guarded attributes for the model.
         *
         * @param array $guarded
         * @return $this 
         * @static 
         */
        public static function guard($guarded)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::guard($guarded);
        }
        
        /**
         * Disable all mass assignable restrictions.
         *
         * @param bool $state
         * @return void 
         * @static 
         */
        public static function unguard($state = true)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            \Webpatser\Countries\Countries::unguard($state);
        }
        
        /**
         * Enable the mass assignment restrictions.
         *
         * @return void 
         * @static 
         */
        public static function reguard()
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            \Webpatser\Countries\Countries::reguard();
        }
        
        /**
         * Determine if current state is "unguarded".
         *
         * @return bool 
         * @static 
         */
        public static function isUnguarded()
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::isUnguarded();
        }
        
        /**
         * Run the given callable while being unguarded.
         *
         * @param callable $callback
         * @return mixed 
         * @static 
         */
        public static function unguarded($callback)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::unguarded($callback);
        }
        
        /**
         * Determine if the given attribute may be mass assigned.
         *
         * @param string $key
         * @return bool 
         * @static 
         */
        public static function isFillable($key)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::isFillable($key);
        }
        
        /**
         * Determine if the given key is guarded.
         *
         * @param string $key
         * @return bool 
         * @static 
         */
        public static function isGuarded($key)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::isGuarded($key);
        }
        
        /**
         * Determine if the model is totally guarded.
         *
         * @return bool 
         * @static 
         */
        public static function totallyGuarded()
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::totallyGuarded();
        }
        
        /**
         * Get the relationships that are touched on save.
         *
         * @return array 
         * @static 
         */
        public static function getTouchedRelations()
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::getTouchedRelations();
        }
        
        /**
         * Set the relationships that are touched on save.
         *
         * @param array $touches
         * @return $this 
         * @static 
         */
        public static function setTouchedRelations($touches)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::setTouchedRelations($touches);
        }
        
        /**
         * Get the value indicating whether the IDs are incrementing.
         *
         * @return bool 
         * @static 
         */
        public static function getIncrementing()
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::getIncrementing();
        }
        
        /**
         * Set whether IDs are incrementing.
         *
         * @param bool $value
         * @return $this 
         * @static 
         */
        public static function setIncrementing($value)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::setIncrementing($value);
        }
        
        /**
         * Convert the model instance to JSON.
         *
         * @param int $options
         * @return string 
         * @static 
         */
        public static function toJson($options = 0)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::toJson($options);
        }
        
        /**
         * Convert the object into something JSON serializable.
         *
         * @return array 
         * @static 
         */
        public static function jsonSerialize()
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::jsonSerialize();
        }
        
        /**
         * Convert the model instance to an array.
         *
         * @return array 
         * @static 
         */
        public static function toArray()
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::toArray();
        }
        
        /**
         * Convert the model's attributes to an array.
         *
         * @return array 
         * @static 
         */
        public static function attributesToArray()
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::attributesToArray();
        }
        
        /**
         * Get the model's relationships in array form.
         *
         * @return array 
         * @static 
         */
        public static function relationsToArray()
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::relationsToArray();
        }
        
        /**
         * Get an attribute from the model.
         *
         * @param string $key
         * @return mixed 
         * @static 
         */
        public static function getAttribute($key)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::getAttribute($key);
        }
        
        /**
         * Get a plain attribute (not a relationship).
         *
         * @param string $key
         * @return mixed 
         * @static 
         */
        public static function getAttributeValue($key)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::getAttributeValue($key);
        }
        
        /**
         * Get a relationship.
         *
         * @param string $key
         * @return mixed 
         * @static 
         */
        public static function getRelationValue($key)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::getRelationValue($key);
        }
        
        /**
         * Determine if a get mutator exists for an attribute.
         *
         * @param string $key
         * @return bool 
         * @static 
         */
        public static function hasGetMutator($key)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::hasGetMutator($key);
        }
        
        /**
         * Determine whether an attribute should be cast to a native type.
         *
         * @param string $key
         * @param array|string|null $types
         * @return bool 
         * @static 
         */
        public static function hasCast($key, $types = null)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::hasCast($key, $types);
        }
        
        /**
         * Get the casts array.
         *
         * @return array 
         * @static 
         */
        public static function getCasts()
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::getCasts();
        }
        
        /**
         * Set a given attribute on the model.
         *
         * @param string $key
         * @param mixed $value
         * @return $this 
         * @static 
         */
        public static function setAttribute($key, $value)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::setAttribute($key, $value);
        }
        
        /**
         * Set a given JSON attribute on the model.
         *
         * @param string $key
         * @param mixed $value
         * @return $this 
         * @static 
         */
        public static function fillJsonAttribute($key, $value)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::fillJsonAttribute($key, $value);
        }
        
        /**
         * Determine if a set mutator exists for an attribute.
         *
         * @param string $key
         * @return bool 
         * @static 
         */
        public static function hasSetMutator($key)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::hasSetMutator($key);
        }
        
        /**
         * Get the attributes that should be converted to dates.
         *
         * @return array 
         * @static 
         */
        public static function getDates()
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::getDates();
        }
        
        /**
         * Convert a DateTime to a storable string.
         *
         * @param \DateTime|int $value
         * @return string 
         * @static 
         */
        public static function fromDateTime($value)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::fromDateTime($value);
        }
        
        /**
         * Set the date format used by the model.
         *
         * @param string $format
         * @return $this 
         * @static 
         */
        public static function setDateFormat($format)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::setDateFormat($format);
        }
        
        /**
         * Decode the given JSON back into an array or object.
         *
         * @param string $value
         * @param bool $asObject
         * @return mixed 
         * @static 
         */
        public static function fromJson($value, $asObject = false)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::fromJson($value, $asObject);
        }
        
        /**
         * Clone the model into a new, non-existing instance.
         *
         * @param array|null $except
         * @return \Illuminate\Database\Eloquent\Model 
         * @static 
         */
        public static function replicate($except = null)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::replicate($except);
        }
        
        /**
         * Determine if two models have the same ID and belong to the same table.
         *
         * @param \Illuminate\Database\Eloquent\Model $model
         * @return bool 
         * @static 
         */
        public static function is($model)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::is($model);
        }
        
        /**
         * Get all of the current attributes on the model.
         *
         * @return array 
         * @static 
         */
        public static function getAttributes()
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::getAttributes();
        }
        
        /**
         * Set the array of model attributes. No checking is done.
         *
         * @param array $attributes
         * @param bool $sync
         * @return $this 
         * @static 
         */
        public static function setRawAttributes($attributes, $sync = false)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::setRawAttributes($attributes, $sync);
        }
        
        /**
         * Get the model's original attribute values.
         *
         * @param string|null $key
         * @param mixed $default
         * @return mixed|array 
         * @static 
         */
        public static function getOriginal($key = null, $default = null)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::getOriginal($key, $default);
        }
        
        /**
         * Sync the original attributes with the current.
         *
         * @return $this 
         * @static 
         */
        public static function syncOriginal()
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::syncOriginal();
        }
        
        /**
         * Sync a single original attribute with its current value.
         *
         * @param string $attribute
         * @return $this 
         * @static 
         */
        public static function syncOriginalAttribute($attribute)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::syncOriginalAttribute($attribute);
        }
        
        /**
         * Determine if the model or given attribute(s) have been modified.
         *
         * @param array|string|null $attributes
         * @return bool 
         * @static 
         */
        public static function isDirty($attributes = null)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::isDirty($attributes);
        }
        
        /**
         * Determine if the model or given attribute(s) have remained the same.
         *
         * @param array|string|null $attributes
         * @return bool 
         * @static 
         */
        public static function isClean($attributes = null)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::isClean($attributes);
        }
        
        /**
         * Get the attributes that have been changed since last sync.
         *
         * @return array 
         * @static 
         */
        public static function getDirty()
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::getDirty();
        }
        
        /**
         * Get all the loaded relations for the instance.
         *
         * @return array 
         * @static 
         */
        public static function getRelations()
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::getRelations();
        }
        
        /**
         * Get a specified relationship.
         *
         * @param string $relation
         * @return mixed 
         * @static 
         */
        public static function getRelation($relation)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::getRelation($relation);
        }
        
        /**
         * Determine if the given relation is loaded.
         *
         * @param string $key
         * @return bool 
         * @static 
         */
        public static function relationLoaded($key)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::relationLoaded($key);
        }
        
        /**
         * Set the specific relationship in the model.
         *
         * @param string $relation
         * @param mixed $value
         * @return $this 
         * @static 
         */
        public static function setRelation($relation, $value)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::setRelation($relation, $value);
        }
        
        /**
         * Set the entire relations array on the model.
         *
         * @param array $relations
         * @return $this 
         * @static 
         */
        public static function setRelations($relations)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::setRelations($relations);
        }
        
        /**
         * Get the database connection for the model.
         *
         * @return \Illuminate\Database\Connection 
         * @static 
         */
        public static function getConnection()
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::getConnection();
        }
        
        /**
         * Get the current connection name for the model.
         *
         * @return string 
         * @static 
         */
        public static function getConnectionName()
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::getConnectionName();
        }
        
        /**
         * Set the connection associated with the model.
         *
         * @param string $name
         * @return $this 
         * @static 
         */
        public static function setConnection($name)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::setConnection($name);
        }
        
        /**
         * Resolve a connection instance.
         *
         * @param string|null $connection
         * @return \Illuminate\Database\Connection 
         * @static 
         */
        public static function resolveConnection($connection = null)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::resolveConnection($connection);
        }
        
        /**
         * Get the connection resolver instance.
         *
         * @return \Illuminate\Database\ConnectionResolverInterface 
         * @static 
         */
        public static function getConnectionResolver()
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::getConnectionResolver();
        }
        
        /**
         * Set the connection resolver instance.
         *
         * @param \Illuminate\Database\ConnectionResolverInterface $resolver
         * @return void 
         * @static 
         */
        public static function setConnectionResolver($resolver)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            \Webpatser\Countries\Countries::setConnectionResolver($resolver);
        }
        
        /**
         * Unset the connection resolver for models.
         *
         * @return void 
         * @static 
         */
        public static function unsetConnectionResolver()
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            \Webpatser\Countries\Countries::unsetConnectionResolver();
        }
        
        /**
         * Get the event dispatcher instance.
         *
         * @return \Illuminate\Contracts\Events\Dispatcher 
         * @static 
         */
        public static function getEventDispatcher()
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::getEventDispatcher();
        }
        
        /**
         * Set the event dispatcher instance.
         *
         * @param \Illuminate\Contracts\Events\Dispatcher $dispatcher
         * @return void 
         * @static 
         */
        public static function setEventDispatcher($dispatcher)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            \Webpatser\Countries\Countries::setEventDispatcher($dispatcher);
        }
        
        /**
         * Unset the event dispatcher for models.
         *
         * @return void 
         * @static 
         */
        public static function unsetEventDispatcher()
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            \Webpatser\Countries\Countries::unsetEventDispatcher();
        }
        
        /**
         * Get the mutated attributes for a given instance.
         *
         * @return array 
         * @static 
         */
        public static function getMutatedAttributes()
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::getMutatedAttributes();
        }
        
        /**
         * Extract and cache all the mutated attributes of a class.
         *
         * @param string $class
         * @return void 
         * @static 
         */
        public static function cacheMutatedAttributes($class)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            \Webpatser\Countries\Countries::cacheMutatedAttributes($class);
        }
        
        /**
         * Determine if the given attribute exists.
         *
         * @param mixed $offset
         * @return bool 
         * @static 
         */
        public static function offsetExists($offset)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::offsetExists($offset);
        }
        
        /**
         * Get the value for a given offset.
         *
         * @param mixed $offset
         * @return mixed 
         * @static 
         */
        public static function offsetGet($offset)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            return \Webpatser\Countries\Countries::offsetGet($offset);
        }
        
        /**
         * Set the value for a given offset.
         *
         * @param mixed $offset
         * @param mixed $value
         * @return void 
         * @static 
         */
        public static function offsetSet($offset, $value)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            \Webpatser\Countries\Countries::offsetSet($offset, $value);
        }
        
        /**
         * Unset the value for a given offset.
         *
         * @param mixed $offset
         * @return void 
         * @static 
         */
        public static function offsetUnset($offset)
        {
            //Method inherited from \Illuminate\Database\Eloquent\Model            
            \Webpatser\Countries\Countries::offsetUnset($offset);
        }
        
    }         
}
    
namespace App\Core\Components\ActiveItem\Facades {

    class Active {
        
        /**
         * Update the route and request instances
         *
         * @param \Route $route
         * @param \Request $request
         * @static 
         */
        public static function updateInstances($route, $request)
        {
            return \App\Core\Components\ActiveItem\Active::updateInstances($route, $request);
        }
        
        /**
         * 
         *
         * @static 
         */
        public static function getCurrentRequest()
        {
            return \App\Core\Components\ActiveItem\Active::getCurrentRequest();
        }
        
        /**
         * Get the active class if the condition is not falsy
         *
         * @param $condition
         * @param string $activeClass
         * @param string $inactiveClass
         * @return string 
         * @static 
         */
        public static function getClassIf($condition, $activeClass = 'active', $inactiveClass = '')
        {
            return \App\Core\Components\ActiveItem\Active::getClassIf($condition, $activeClass, $inactiveClass);
        }
        
        /**
         * Check if the URI of the current request matches one of the specific URIs
         *
         * @param array|string $uris
         * @return bool 
         * @static 
         */
        public static function checkUri($uris)
        {
            return \App\Core\Components\ActiveItem\Active::checkUri($uris);
        }
        
        /**
         * Check if the current URI matches one of specific patterns (using `str_is`)
         *
         * @param array|string $patterns
         * @return bool 
         * @static 
         */
        public static function checkUriPattern($patterns)
        {
            return \App\Core\Components\ActiveItem\Active::checkUriPattern($patterns);
        }
        
        /**
         * Check if one of the following condition is true:
         * + the value of $value is `false` and the current querystring contain the key $key
         * + the value of $value is not `false` and the current value of the $key key in the querystring equals to $value
         * + the value of $value is not `false` and the current value of the $key key in the querystring is an array that
         * contains the $value
         *
         * @param string $key
         * @param mixed $value
         * @return bool 
         * @static 
         */
        public static function checkQuery($key, $value)
        {
            return \App\Core\Components\ActiveItem\Active::checkQuery($key, $value);
        }
        
        /**
         * Check if the name of the current route matches one of specific values
         *
         * @param array|string $routeNames
         * @return bool 
         * @static 
         */
        public static function checkRoute($routeNames)
        {
            return \App\Core\Components\ActiveItem\Active::checkRoute($routeNames);
        }
        
        /**
         * Check the current route name with one or some patterns
         *
         * @param array|string $patterns
         * @return bool 
         * @static 
         */
        public static function checkRoutePattern($patterns)
        {
            return \App\Core\Components\ActiveItem\Active::checkRoutePattern($patterns);
        }
        
        /**
         * Check if the parameter of the current route has the correct value
         *
         * @param $param
         * @param $value
         * @return bool 
         * @static 
         */
        public static function checkRouteParam($param, $value)
        {
            return \App\Core\Components\ActiveItem\Active::checkRouteParam($param, $value);
        }
        
        /**
         * Return 'active' class if current route action match one of provided action names
         *
         * @param array|string $actions
         * @return bool 
         * @static 
         */
        public static function checkAction($actions)
        {
            return \App\Core\Components\ActiveItem\Active::checkAction($actions);
        }
        
        /**
         * Check if the current controller class matches one of specific values
         *
         * @param array|string $controllers
         * @return bool 
         * @static 
         */
        public static function checkController($controllers)
        {
            return \App\Core\Components\ActiveItem\Active::checkController($controllers);
        }
        
        /**
         * Get the current controller method
         *
         * @return string 
         * @static 
         */
        public static function getMethod()
        {
            return \App\Core\Components\ActiveItem\Active::getMethod();
        }
        
        /**
         * Get the current action string
         *
         * @return string 
         * @static 
         */
        public static function getAction()
        {
            return \App\Core\Components\ActiveItem\Active::getAction();
        }
        
        /**
         * Get the current controller class
         *
         * @return string 
         * @static 
         */
        public static function getController()
        {
            return \App\Core\Components\ActiveItem\Active::getController();
        }
        
    }         
}
    
namespace App\Core\Components\Flash {

    class Flash {
        
        /**
         * Flash an information message.
         *
         * @param string $message
         * @static 
         */
        public static function info($message)
        {
            return \App\Core\Components\Flash\FlashNotifier::info($message);
        }
        
        /**
         * Flash a success message.
         *
         * @param string $message
         * @return $this 
         * @static 
         */
        public static function success($message)
        {
            return \App\Core\Components\Flash\FlashNotifier::success($message);
        }
        
        /**
         * Flash an error message.
         *
         * @param string $message
         * @return $this 
         * @static 
         */
        public static function error($message)
        {
            return \App\Core\Components\Flash\FlashNotifier::error($message);
        }
        
        /**
         * Flash a warning message.
         *
         * @param string $message
         * @return $this 
         * @static 
         */
        public static function warning($message)
        {
            return \App\Core\Components\Flash\FlashNotifier::warning($message);
        }
        
        /**
         * Flash an overlay modal.
         *
         * @param string $message
         * @param string $title
         * @return $this 
         * @static 
         */
        public static function overlay($message, $title = 'Notice')
        {
            return \App\Core\Components\Flash\FlashNotifier::overlay($message, $title);
        }
        
        /**
         * Flash a general message.
         *
         * @param string $message
         * @param string $level
         * @return $this 
         * @static 
         */
        public static function message($message, $level = 'info')
        {
            return \App\Core\Components\Flash\FlashNotifier::message($message, $level);
        }
        
        /**
         * Add an "important" flash to the session.
         *
         * @return $this 
         * @static 
         */
        public static function important()
        {
            return \App\Core\Components\Flash\FlashNotifier::important();
        }
        
    }         
}
    
namespace Barryvdh\Debugbar {

    class Facade {
        
        /**
         * Enable the Debugbar and boot, if not already booted.
         *
         * @static 
         */
        public static function enable()
        {
            return \Barryvdh\Debugbar\LaravelDebugbar::enable();
        }
        
        /**
         * Boot the debugbar (add collectors, renderer and listener)
         *
         * @static 
         */
        public static function boot()
        {
            return \Barryvdh\Debugbar\LaravelDebugbar::boot();
        }
        
        /**
         * 
         *
         * @static 
         */
        public static function shouldCollect($name, $default = false)
        {
            return \Barryvdh\Debugbar\LaravelDebugbar::shouldCollect($name, $default);
        }
        
        /**
         * Starts a measure
         *
         * @param string $name Internal name, used to stop the measure
         * @param string $label Public name
         * @static 
         */
        public static function startMeasure($name, $label = null)
        {
            return \Barryvdh\Debugbar\LaravelDebugbar::startMeasure($name, $label);
        }
        
        /**
         * Stops a measure
         *
         * @param string $name
         * @static 
         */
        public static function stopMeasure($name)
        {
            return \Barryvdh\Debugbar\LaravelDebugbar::stopMeasure($name);
        }
        
        /**
         * Adds an exception to be profiled in the debug bar
         *
         * @param \Exception $e
         * @deprecated in favor of addThrowable
         * @static 
         */
        public static function addException($e)
        {
            return \Barryvdh\Debugbar\LaravelDebugbar::addException($e);
        }
        
        /**
         * Adds an exception to be profiled in the debug bar
         *
         * @param \Exception $e
         * @static 
         */
        public static function addThrowable($e)
        {
            return \Barryvdh\Debugbar\LaravelDebugbar::addThrowable($e);
        }
        
        /**
         * Returns a JavascriptRenderer for this instance
         *
         * @param string $baseUrl
         * @param string $basePathng
         * @return \Barryvdh\Debugbar\JavascriptRenderer 
         * @static 
         */
        public static function getJavascriptRenderer($baseUrl = null, $basePath = null)
        {
            return \Barryvdh\Debugbar\LaravelDebugbar::getJavascriptRenderer($baseUrl, $basePath);
        }
        
        /**
         * Modify the response and inject the debugbar (or data in headers)
         *
         * @param \Symfony\Component\HttpFoundation\Request $request
         * @param \Symfony\Component\HttpFoundation\Response $response
         * @return \Symfony\Component\HttpFoundation\Response 
         * @static 
         */
        public static function modifyResponse($request, $response)
        {
            return \Barryvdh\Debugbar\LaravelDebugbar::modifyResponse($request, $response);
        }
        
        /**
         * Check if the Debugbar is enabled
         *
         * @return boolean 
         * @static 
         */
        public static function isEnabled()
        {
            return \Barryvdh\Debugbar\LaravelDebugbar::isEnabled();
        }
        
        /**
         * Collects the data from the collectors
         *
         * @return array 
         * @static 
         */
        public static function collect()
        {
            return \Barryvdh\Debugbar\LaravelDebugbar::collect();
        }
        
        /**
         * Injects the web debug toolbar into the given Response.
         *
         * @param \Symfony\Component\HttpFoundation\Response $response A Response instance
         * Based on https://github.com/symfony/WebProfilerBundle/blob/master/EventListener/WebDebugToolbarListener.php
         * @static 
         */
        public static function injectDebugbar($response)
        {
            return \Barryvdh\Debugbar\LaravelDebugbar::injectDebugbar($response);
        }
        
        /**
         * Disable the Debugbar
         *
         * @static 
         */
        public static function disable()
        {
            return \Barryvdh\Debugbar\LaravelDebugbar::disable();
        }
        
        /**
         * Adds a measure
         *
         * @param string $label
         * @param float $start
         * @param float $end
         * @static 
         */
        public static function addMeasure($label, $start, $end)
        {
            return \Barryvdh\Debugbar\LaravelDebugbar::addMeasure($label, $start, $end);
        }
        
        /**
         * Utility function to measure the execution of a Closure
         *
         * @param string $label
         * @param \Closure $closure
         * @static 
         */
        public static function measure($label, $closure)
        {
            return \Barryvdh\Debugbar\LaravelDebugbar::measure($label, $closure);
        }
        
        /**
         * Collect data in a CLI request
         *
         * @return array 
         * @static 
         */
        public static function collectConsole()
        {
            return \Barryvdh\Debugbar\LaravelDebugbar::collectConsole();
        }
        
        /**
         * Adds a message to the MessagesCollector
         * 
         * A message can be anything from an object to a string
         *
         * @param mixed $message
         * @param string $label
         * @static 
         */
        public static function addMessage($message, $label = 'info')
        {
            return \Barryvdh\Debugbar\LaravelDebugbar::addMessage($message, $label);
        }
        
        /**
         * Adds a data collector
         *
         * @param \DebugBar\DataCollectorInterface $collector
         * @throws DebugBarException
         * @return $this 
         * @static 
         */
        public static function addCollector($collector)
        {
            //Method inherited from \DebugBar\DebugBar            
            return \Barryvdh\Debugbar\LaravelDebugbar::addCollector($collector);
        }
        
        /**
         * Checks if a data collector has been added
         *
         * @param string $name
         * @return boolean 
         * @static 
         */
        public static function hasCollector($name)
        {
            //Method inherited from \DebugBar\DebugBar            
            return \Barryvdh\Debugbar\LaravelDebugbar::hasCollector($name);
        }
        
        /**
         * Returns a data collector
         *
         * @param string $name
         * @return \DebugBar\DataCollectorInterface 
         * @throws DebugBarException
         * @static 
         */
        public static function getCollector($name)
        {
            //Method inherited from \DebugBar\DebugBar            
            return \Barryvdh\Debugbar\LaravelDebugbar::getCollector($name);
        }
        
        /**
         * Returns an array of all data collectors
         *
         * @return \DebugBar\array[DataCollectorInterface] 
         * @static 
         */
        public static function getCollectors()
        {
            //Method inherited from \DebugBar\DebugBar            
            return \Barryvdh\Debugbar\LaravelDebugbar::getCollectors();
        }
        
        /**
         * Sets the request id generator
         *
         * @param \DebugBar\RequestIdGeneratorInterface $generator
         * @return $this 
         * @static 
         */
        public static function setRequestIdGenerator($generator)
        {
            //Method inherited from \DebugBar\DebugBar            
            return \Barryvdh\Debugbar\LaravelDebugbar::setRequestIdGenerator($generator);
        }
        
        /**
         * 
         *
         * @return \DebugBar\RequestIdGeneratorInterface 
         * @static 
         */
        public static function getRequestIdGenerator()
        {
            //Method inherited from \DebugBar\DebugBar            
            return \Barryvdh\Debugbar\LaravelDebugbar::getRequestIdGenerator();
        }
        
        /**
         * Returns the id of the current request
         *
         * @return string 
         * @static 
         */
        public static function getCurrentRequestId()
        {
            //Method inherited from \DebugBar\DebugBar            
            return \Barryvdh\Debugbar\LaravelDebugbar::getCurrentRequestId();
        }
        
        /**
         * Sets the storage backend to use to store the collected data
         *
         * @param \DebugBar\StorageInterface $storage
         * @return $this 
         * @static 
         */
        public static function setStorage($storage = null)
        {
            //Method inherited from \DebugBar\DebugBar            
            return \Barryvdh\Debugbar\LaravelDebugbar::setStorage($storage);
        }
        
        /**
         * 
         *
         * @return \DebugBar\StorageInterface 
         * @static 
         */
        public static function getStorage()
        {
            //Method inherited from \DebugBar\DebugBar            
            return \Barryvdh\Debugbar\LaravelDebugbar::getStorage();
        }
        
        /**
         * Checks if the data will be persisted
         *
         * @return boolean 
         * @static 
         */
        public static function isDataPersisted()
        {
            //Method inherited from \DebugBar\DebugBar            
            return \Barryvdh\Debugbar\LaravelDebugbar::isDataPersisted();
        }
        
        /**
         * Sets the HTTP driver
         *
         * @param \DebugBar\HttpDriverInterface $driver
         * @return $this 
         * @static 
         */
        public static function setHttpDriver($driver)
        {
            //Method inherited from \DebugBar\DebugBar            
            return \Barryvdh\Debugbar\LaravelDebugbar::setHttpDriver($driver);
        }
        
        /**
         * Returns the HTTP driver
         * 
         * If no http driver where defined, a PhpHttpDriver is automatically created
         *
         * @return \DebugBar\HttpDriverInterface 
         * @static 
         */
        public static function getHttpDriver()
        {
            //Method inherited from \DebugBar\DebugBar            
            return \Barryvdh\Debugbar\LaravelDebugbar::getHttpDriver();
        }
        
        /**
         * Returns collected data
         * 
         * Will collect the data if none have been collected yet
         *
         * @return array 
         * @static 
         */
        public static function getData()
        {
            //Method inherited from \DebugBar\DebugBar            
            return \Barryvdh\Debugbar\LaravelDebugbar::getData();
        }
        
        /**
         * Returns an array of HTTP headers containing the data
         *
         * @param string $headerName
         * @param integer $maxHeaderLength
         * @return array 
         * @static 
         */
        public static function getDataAsHeaders($headerName = 'phpdebugbar', $maxHeaderLength = 4096, $maxTotalHeaderLength = 250000)
        {
            //Method inherited from \DebugBar\DebugBar            
            return \Barryvdh\Debugbar\LaravelDebugbar::getDataAsHeaders($headerName, $maxHeaderLength, $maxTotalHeaderLength);
        }
        
        /**
         * Sends the data through the HTTP headers
         *
         * @param bool $useOpenHandler
         * @param string $headerName
         * @param integer $maxHeaderLength
         * @return $this 
         * @static 
         */
        public static function sendDataInHeaders($useOpenHandler = null, $headerName = 'phpdebugbar', $maxHeaderLength = 4096)
        {
            //Method inherited from \DebugBar\DebugBar            
            return \Barryvdh\Debugbar\LaravelDebugbar::sendDataInHeaders($useOpenHandler, $headerName, $maxHeaderLength);
        }
        
        /**
         * Stacks the data in the session for later rendering
         *
         * @static 
         */
        public static function stackData()
        {
            //Method inherited from \DebugBar\DebugBar            
            return \Barryvdh\Debugbar\LaravelDebugbar::stackData();
        }
        
        /**
         * Checks if there is stacked data in the session
         *
         * @return boolean 
         * @static 
         */
        public static function hasStackedData()
        {
            //Method inherited from \DebugBar\DebugBar            
            return \Barryvdh\Debugbar\LaravelDebugbar::hasStackedData();
        }
        
        /**
         * Returns the data stacked in the session
         *
         * @param boolean $delete Whether to delete the data in the session
         * @return array 
         * @static 
         */
        public static function getStackedData($delete = true)
        {
            //Method inherited from \DebugBar\DebugBar            
            return \Barryvdh\Debugbar\LaravelDebugbar::getStackedData($delete);
        }
        
        /**
         * Sets the key to use in the $_SESSION array
         *
         * @param string $ns
         * @return $this 
         * @static 
         */
        public static function setStackDataSessionNamespace($ns)
        {
            //Method inherited from \DebugBar\DebugBar            
            return \Barryvdh\Debugbar\LaravelDebugbar::setStackDataSessionNamespace($ns);
        }
        
        /**
         * Returns the key used in the $_SESSION array
         *
         * @return string 
         * @static 
         */
        public static function getStackDataSessionNamespace()
        {
            //Method inherited from \DebugBar\DebugBar            
            return \Barryvdh\Debugbar\LaravelDebugbar::getStackDataSessionNamespace();
        }
        
        /**
         * Sets whether to only use the session to store stacked data even
         * if a storage is enabled
         *
         * @param boolean $enabled
         * @return $this 
         * @static 
         */
        public static function setStackAlwaysUseSessionStorage($enabled = true)
        {
            //Method inherited from \DebugBar\DebugBar            
            return \Barryvdh\Debugbar\LaravelDebugbar::setStackAlwaysUseSessionStorage($enabled);
        }
        
        /**
         * Checks if the session is always used to store stacked data
         * even if a storage is enabled
         *
         * @return boolean 
         * @static 
         */
        public static function isStackAlwaysUseSessionStorage()
        {
            //Method inherited from \DebugBar\DebugBar            
            return \Barryvdh\Debugbar\LaravelDebugbar::isStackAlwaysUseSessionStorage();
        }
        
        /**
         * 
         *
         * @static 
         */
        public static function offsetSet($key, $value)
        {
            //Method inherited from \DebugBar\DebugBar            
            return \Barryvdh\Debugbar\LaravelDebugbar::offsetSet($key, $value);
        }
        
        /**
         * 
         *
         * @static 
         */
        public static function offsetGet($key)
        {
            //Method inherited from \DebugBar\DebugBar            
            return \Barryvdh\Debugbar\LaravelDebugbar::offsetGet($key);
        }
        
        /**
         * 
         *
         * @static 
         */
        public static function offsetExists($key)
        {
            //Method inherited from \DebugBar\DebugBar            
            return \Barryvdh\Debugbar\LaravelDebugbar::offsetExists($key);
        }
        
        /**
         * 
         *
         * @static 
         */
        public static function offsetUnset($key)
        {
            //Method inherited from \DebugBar\DebugBar            
            return \Barryvdh\Debugbar\LaravelDebugbar::offsetUnset($key);
        }
        
    }         
}
    
namespace nilsenj\Toastr\Facades {

    class Toastr {
        
        /**
         * Render the notifications' script tag
         *
         * @return string 
         * @internal param bool $flashed Whether to get the
         * @static 
         */
        public static function render()
        {
            return \nilsenj\Toastr\Toastr::render();
        }
        
        /**
         * Add a notification
         *
         * @param string $type Could be error, info, success, or warning.
         * @param string $message The notification's message
         * @param string $title The notification's title
         * @return bool Returns whether the notification was successfully added or
         * not.
         * @static 
         */
        public static function add($type, $message, $title = null, $options = array())
        {
            return \nilsenj\Toastr\Toastr::add($type, $message, $title, $options);
        }
        
        /**
         * Shortcut for adding an info notification
         *
         * @param string $message The notification's message
         * @param string $title The notification's title
         * @static 
         */
        public static function info($message, $title = null, $options = array())
        {
            return \nilsenj\Toastr\Toastr::info($message, $title, $options);
        }
        
        /**
         * Shortcut for adding an error notification
         *
         * @param string $message The notification's message
         * @param string $title The notification's title
         * @static 
         */
        public static function error($message, $title = null, $options = array())
        {
            return \nilsenj\Toastr\Toastr::error($message, $title, $options);
        }
        
        /**
         * Shortcut for adding a warning notification
         *
         * @param string $message The notification's message
         * @param string $title The notification's title
         * @static 
         */
        public static function warning($message, $title = null, $options = array())
        {
            return \nilsenj\Toastr\Toastr::warning($message, $title, $options);
        }
        
        /**
         * Shortcut for adding a success notification
         *
         * @param string $message The notification's message
         * @param string $title The notification's title
         * @static 
         */
        public static function success($message, $title = null, $options = array())
        {
            return \nilsenj\Toastr\Toastr::success($message, $title, $options);
        }
        
        /**
         * Clear all notifications
         *
         * @static 
         */
        public static function clear()
        {
            return \nilsenj\Toastr\Toastr::clear();
        }
        
    }         
}
    
namespace Vinkla\Hashids\Facades {

    class Hashids {
        
        /**
         * Get the factory instance.
         *
         * @return \Vinkla\Hashids\HashidsFactory 
         * @static 
         */
        public static function getFactory()
        {
            return \Vinkla\Hashids\HashidsManager::getFactory();
        }
        
        /**
         * Get a connection instance.
         *
         * @param string $name
         * @return object 
         * @static 
         */
        public static function connection($name = null)
        {
            //Method inherited from \GrahamCampbell\Manager\AbstractManager            
            return \Vinkla\Hashids\HashidsManager::connection($name);
        }
        
        /**
         * Reconnect to the given connection.
         *
         * @param string $name
         * @return object 
         * @static 
         */
        public static function reconnect($name = null)
        {
            //Method inherited from \GrahamCampbell\Manager\AbstractManager            
            return \Vinkla\Hashids\HashidsManager::reconnect($name);
        }
        
        /**
         * Disconnect from the given connection.
         *
         * @param string $name
         * @return void 
         * @static 
         */
        public static function disconnect($name = null)
        {
            //Method inherited from \GrahamCampbell\Manager\AbstractManager            
            \Vinkla\Hashids\HashidsManager::disconnect($name);
        }
        
        /**
         * Get the configuration for a connection.
         *
         * @param string $name
         * @throws \InvalidArgumentException
         * @return array 
         * @static 
         */
        public static function getConnectionConfig($name)
        {
            //Method inherited from \GrahamCampbell\Manager\AbstractManager            
            return \Vinkla\Hashids\HashidsManager::getConnectionConfig($name);
        }
        
        /**
         * Get the default connection name.
         *
         * @return string 
         * @static 
         */
        public static function getDefaultConnection()
        {
            //Method inherited from \GrahamCampbell\Manager\AbstractManager            
            return \Vinkla\Hashids\HashidsManager::getDefaultConnection();
        }
        
        /**
         * Set the default connection name.
         *
         * @param string $name
         * @return void 
         * @static 
         */
        public static function setDefaultConnection($name)
        {
            //Method inherited from \GrahamCampbell\Manager\AbstractManager            
            \Vinkla\Hashids\HashidsManager::setDefaultConnection($name);
        }
        
        /**
         * Register an extension connection resolver.
         *
         * @param string $name
         * @param callable $resolver
         * @return void 
         * @static 
         */
        public static function extend($name, $resolver)
        {
            //Method inherited from \GrahamCampbell\Manager\AbstractManager            
            \Vinkla\Hashids\HashidsManager::extend($name, $resolver);
        }
        
        /**
         * Return all of the created connections.
         *
         * @return object[] 
         * @static 
         */
        public static function getConnections()
        {
            //Method inherited from \GrahamCampbell\Manager\AbstractManager            
            return \Vinkla\Hashids\HashidsManager::getConnections();
        }
        
        /**
         * Get the config instance.
         *
         * @return \Illuminate\Contracts\Config\Repository 
         * @static 
         */
        public static function getConfig()
        {
            //Method inherited from \GrahamCampbell\Manager\AbstractManager            
            return \Vinkla\Hashids\HashidsManager::getConfig();
        }
        
    }         
}
    
namespace storecamp\htmlelements\Facades {

    class Accordion {
        
        /**
         * Name the accordion
         *
         * @param $name The name of the accordion
         * @return $this 
         * @static 
         */
        public static function named($name)
        {
            return \storecamp\htmlelements\Accordion::named($name);
        }
        
        /**
         * Add the contents for the accordion. Should be an array of arrays
         * <strong>Expected Keys</strong>:
         * <ul>
         * <li>title</li>
         * <li>contents</li>
         * <li>attributes (optional)</li>
         * </ul>
         *
         * @param array $contents
         * @return $this 
         * @static 
         */
        public static function withContents($contents)
        {
            return \storecamp\htmlelements\Accordion::withContents($contents);
        }
        
        /**
         * Sets which panel should be opened. Numbering begins from 0.
         *
         * @param $integer int
         * @return $this 
         * @static 
         */
        public static function open($integer)
        {
            return \storecamp\htmlelements\Accordion::open($integer);
        }
        
        /**
         * Renders the accordion
         *
         * @return string 
         * @static 
         */
        public static function render()
        {
            return \storecamp\htmlelements\Accordion::render();
        }
        
        /**
         * Set the attributes of the object
         *
         * @param array $attributes The attributes to use
         * @return $this 
         * @static 
         */
        public static function withAttributes($attributes)
        {
            //Method inherited from \storecamp\htmlelements\RenderedObject            
            return \storecamp\htmlelements\Accordion::withAttributes($attributes);
        }
        
        /**
         * Adds the given classes to attributes
         *
         * @param array $classes
         * @return $this 
         * @static 
         */
        public static function addClass($classes)
        {
            //Method inherited from \storecamp\htmlelements\RenderedObject            
            return \storecamp\htmlelements\Accordion::addClass($classes);
        }
        
    }         

    class Alert {
        
        /**
         * Sets the type of the alert. The alert prefix is not assumed.
         *
         * @param $type string
         * @return $this 
         * @static 
         */
        public static function setType($type)
        {
            return \storecamp\htmlelements\Alert::setType($type);
        }
        
        /**
         * Renders the alert
         *
         * @return string 
         * @static 
         */
        public static function render()
        {
            return \storecamp\htmlelements\Alert::render();
        }
        
        /**
         * 
         *
         * @return string 
         * @static 
         */
        public static function getContents()
        {
            return \storecamp\htmlelements\Alert::getContents();
        }
        
        /**
         * 
         *
         * @param string $contents
         * @return $this 
         * @static 
         */
        public static function setContents($contents)
        {
            return \storecamp\htmlelements\Alert::setContents($contents);
        }
        
        /**
         * 
         *
         * @return string 
         * @static 
         */
        public static function getCloser()
        {
            return \storecamp\htmlelements\Alert::getCloser();
        }
        
        /**
         * 
         *
         * @param string $closer
         * @return $this 
         * @static 
         */
        public static function setCloser($closer)
        {
            return \storecamp\htmlelements\Alert::setCloser($closer);
        }
        
        /**
         * 
         *
         * @return array 
         * @static 
         */
        public static function getAttributes()
        {
            return \storecamp\htmlelements\Alert::getAttributes();
        }
        
        /**
         * 
         *
         * @param array $attributes
         * @return $this 
         * @static 
         */
        public static function setAttributes($attributes)
        {
            return \storecamp\htmlelements\Alert::setAttributes($attributes);
        }
        
        /**
         * Creates an info alert box
         *
         * @param string $contents
         * @return $this 
         * @static 
         */
        public static function info($contents = '')
        {
            return \storecamp\htmlelements\Alert::info($contents);
        }
        
        /**
         * Creates a success alert box
         *
         * @param string $contents
         * @return $this 
         * @static 
         */
        public static function success($contents = '')
        {
            return \storecamp\htmlelements\Alert::success($contents);
        }
        
        /**
         * Creates a warning alert box
         *
         * @param string $contents
         * @return $this 
         * @static 
         */
        public static function warning($contents = '')
        {
            return \storecamp\htmlelements\Alert::warning($contents);
        }
        
        /**
         * Creates a danger alert box
         *
         * @param string $contents
         * @return $this 
         * @static 
         */
        public static function danger($contents = '')
        {
            return \storecamp\htmlelements\Alert::danger($contents);
        }
        
        /**
         * Sets the contents of the alert box
         *
         * @param $contents
         * @return $this 
         * @static 
         */
        public static function withContents($contents)
        {
            return \storecamp\htmlelements\Alert::withContents($contents);
        }
        
        /**
         * Adds a close button with the given text
         *
         * @param string $closer
         * @return $this 
         * @static 
         */
        public static function close($closer = '&times;')
        {
            return \storecamp\htmlelements\Alert::close($closer);
        }
        
        /**
         * Set the attributes of the object
         *
         * @param array $attributes The attributes to use
         * @return $this 
         * @static 
         */
        public static function withAttributes($attributes)
        {
            //Method inherited from \storecamp\htmlelements\RenderedObject            
            return \storecamp\htmlelements\Alert::withAttributes($attributes);
        }
        
        /**
         * Adds the given classes to attributes
         *
         * @param array $classes
         * @return $this 
         * @static 
         */
        public static function addClass($classes)
        {
            //Method inherited from \storecamp\htmlelements\RenderedObject            
            return \storecamp\htmlelements\Alert::addClass($classes);
        }
        
    }         

    class Badge {
        
        /**
         * Renders the badge
         *
         * @return string 
         * @static 
         */
        public static function render()
        {
            return \storecamp\htmlelements\Badge::render();
        }
        
        /**
         * 
         *
         * @return string 
         * @static 
         */
        public static function getContents()
        {
            return \storecamp\htmlelements\Badge::getContents();
        }
        
        /**
         * 
         *
         * @param string $contents
         * @return $this 
         * @static 
         */
        public static function setContents($contents)
        {
            return \storecamp\htmlelements\Badge::setContents($contents);
        }
        
        /**
         * 
         *
         * @return array 
         * @static 
         */
        public static function getAttributes()
        {
            return \storecamp\htmlelements\Badge::getAttributes();
        }
        
        /**
         * 
         *
         * @param array $attributes
         * @return $this 
         * @static 
         */
        public static function setAttributes($attributes)
        {
            return \storecamp\htmlelements\Badge::setAttributes($attributes);
        }
        
        /**
         * Adds contents to the badge
         *
         * @param $contents
         * @return $this 
         * @static 
         */
        public static function withContents($contents)
        {
            return \storecamp\htmlelements\Badge::withContents($contents);
        }
        
        /**
         * Set the attributes of the object
         *
         * @param array $attributes The attributes to use
         * @return $this 
         * @static 
         */
        public static function withAttributes($attributes)
        {
            //Method inherited from \storecamp\htmlelements\RenderedObject            
            return \storecamp\htmlelements\Badge::withAttributes($attributes);
        }
        
        /**
         * Adds the given classes to attributes
         *
         * @param array $classes
         * @return $this 
         * @static 
         */
        public static function addClass($classes)
        {
            //Method inherited from \storecamp\htmlelements\RenderedObject            
            return \storecamp\htmlelements\Badge::addClass($classes);
        }
        
    }         

    class Breadcrumb {
        
        /**
         * Renders the breadcrumb
         *
         * @return string 
         * @static 
         */
        public static function render()
        {
            return \storecamp\htmlelements\Breadcrumb::render();
        }
        
        /**
         * 
         *
         * @return array 
         * @static 
         */
        public static function getLinks()
        {
            return \storecamp\htmlelements\Breadcrumb::getLinks();
        }
        
        /**
         * 
         *
         * @param array $links
         * @return $this 
         * @static 
         */
        public static function setLinks($links)
        {
            return \storecamp\htmlelements\Breadcrumb::setLinks($links);
        }
        
        /**
         * 
         *
         * @return array 
         * @static 
         */
        public static function getAttributes()
        {
            return \storecamp\htmlelements\Breadcrumb::getAttributes();
        }
        
        /**
         * 
         *
         * @param array $attributes
         * @return $this 
         * @static 
         */
        public static function setAttributes($attributes)
        {
            return \storecamp\htmlelements\Breadcrumb::setAttributes($attributes);
        }
        
        /**
         * Set the links for the breadcrumbs. Expects an array of the following:
         * <ul>
         * <li>An array, with keys <code>link</code> and <code>text</code></li>
         * <li>A string for the active link
         * </ul>
         *
         * @param $links array
         * @return $this 
         * @static 
         */
        public static function withLinks($links)
        {
            return \storecamp\htmlelements\Breadcrumb::withLinks($links);
        }
        
        /**
         * Renders the link
         *
         * @param $text
         * @param $link
         * @return string 
         * @static 
         */
        public static function renderLink($text, $link)
        {
            return \storecamp\htmlelements\Breadcrumb::renderLink($text, $link);
        }
        
        /**
         * Set the attributes of the object
         *
         * @param array $attributes The attributes to use
         * @return $this 
         * @static 
         */
        public static function withAttributes($attributes)
        {
            //Method inherited from \storecamp\htmlelements\RenderedObject            
            return \storecamp\htmlelements\Breadcrumb::withAttributes($attributes);
        }
        
        /**
         * Adds the given classes to attributes
         *
         * @param array $classes
         * @return $this 
         * @static 
         */
        public static function addClass($classes)
        {
            //Method inherited from \storecamp\htmlelements\RenderedObject            
            return \storecamp\htmlelements\Breadcrumb::addClass($classes);
        }
        
    }         

    class Button {
        
        /**
         * Sets the type of the button
         *
         * @param $type string The new type of the button. Assumes that the btn-
         *              prefix is there
         * @return $this 
         * @static 
         */
        public static function setType($type)
        {
            return \storecamp\htmlelements\Button::setType($type);
        }
        
        /**
         * Sets the size of the button
         *
         * @param $size string The new size of the button. Assumes that the btn-
         *              prefix is there
         * @return $this 
         * @static 
         */
        public static function setSize($size)
        {
            return \storecamp\htmlelements\Button::setSize($size);
        }
        
        /**
         * Renders the button
         *
         * @return string as a string
         * @static 
         */
        public static function render()
        {
            return \storecamp\htmlelements\Button::render();
        }
        
        /**
         * Creates a button with class .btn-default and the given contents
         *
         * @param string $contents The contents of the button The contents of the
         *                         button
         * @return \Button 
         * @static 
         */
        public static function normal($contents = '')
        {
            return \storecamp\htmlelements\Button::normal($contents);
        }
        
        /**
         * Creates an button with class .btn-primary and the given contents
         *
         * @param string $contents The contents of the button The contents of the
         *                         button
         * @return \Button 
         * @static 
         */
        public static function primary($contents = '')
        {
            return \storecamp\htmlelements\Button::primary($contents);
        }
        
        /**
         * Creates an button with class .btn-success and the given contents
         *
         * @param string $contents The contents of the button The contents of the
         *                         button
         * @return \Button 
         * @static 
         */
        public static function success($contents = '')
        {
            return \storecamp\htmlelements\Button::success($contents);
        }
        
        /**
         * Creates an button with class .btn-info and the given contents
         *
         * @param string $contents The contents of the button
         * @return \Button 
         * @static 
         */
        public static function info($contents = '')
        {
            return \storecamp\htmlelements\Button::info($contents);
        }
        
        /**
         * Creates an button with class .btn-warning and the given contents
         *
         * @param string $contents The contents of the button
         * @return \Button 
         * @static 
         */
        public static function warning($contents = '')
        {
            return \storecamp\htmlelements\Button::warning($contents);
        }
        
        /**
         * Creates an button with class .btn-danger and the given contents
         *
         * @param string $contents The contents of the button
         * @return \Button 
         * @static 
         */
        public static function danger($contents = '')
        {
            return \storecamp\htmlelements\Button::danger($contents);
        }
        
        /**
         * Creates an button with class .btn-link and the given contents
         *
         * @param string $contents The contents of the button
         * @return \Button 
         * @static 
         */
        public static function link($contents = '')
        {
            return \storecamp\htmlelements\Button::link($contents);
        }
        
        /**
         * Sets the button to be a block button
         *
         * @return $this 
         * @static 
         */
        public static function block()
        {
            return \storecamp\htmlelements\Button::block();
        }
        
        /**
         * Makes the button a submit button
         *
         * @return $this 
         * @static 
         */
        public static function submit()
        {
            return \storecamp\htmlelements\Button::submit();
        }
        
        /**
         * Makes the button a reset button
         *
         * @return $this 
         * @static 
         */
        public static function reset()
        {
            return \storecamp\htmlelements\Button::reset();
        }
        
        /**
         * Sets the value of the button
         *
         * @param $value string The new value of the button
         * @return $this 
         * @static 
         */
        public static function withValue($value = '')
        {
            return \storecamp\htmlelements\Button::withValue($value);
        }
        
        /**
         * Sets the button to be a large button
         *
         * @return $this 
         * @static 
         */
        public static function large()
        {
            return \storecamp\htmlelements\Button::large();
        }
        
        /**
         * Sets the button to be a small button
         *
         * @return $this 
         * @static 
         */
        public static function small()
        {
            return \storecamp\htmlelements\Button::small();
        }
        
        /**
         * Sets the button to be an extra small button
         *
         * @return $this 
         * @static 
         */
        public static function extraSmall()
        {
            return \storecamp\htmlelements\Button::extraSmall();
        }
        
        /**
         * More descriptive version of withAttributes
         *
         * @see withAttributes
         * @param array $attributes The attributes to add
         * @return $this 
         * @static 
         */
        public static function addAttributes($attributes)
        {
            return \storecamp\htmlelements\Button::addAttributes($attributes);
        }
        
        /**
         * Disables the button
         *
         * @return $this 
         * @static 
         */
        public static function disable()
        {
            return \storecamp\htmlelements\Button::disable();
        }
        
        /**
         * Adds an icon to the button
         *
         * @param $icon string The icon to add
         * @param bool $append Whether the icon should be added after the text or
         *                     before
         * @return $this 
         * @static 
         */
        public static function withIcon($icon, $append = true)
        {
            return \storecamp\htmlelements\Button::withIcon($icon, $append);
        }
        
        /**
         * Descriptive version of withIcon(). Adds the icon after the text
         *
         * @see withIcon
         * @param $icon string The icon to add
         * @return $this 
         * @static 
         */
        public static function appendIcon($icon)
        {
            return \storecamp\htmlelements\Button::appendIcon($icon);
        }
        
        /**
         * Descriptive version of withIcon(). Adds the icon before the text
         *
         * @param $icon string The icon to add
         * @return $this 
         * @static 
         */
        public static function prependIcon($icon)
        {
            return \storecamp\htmlelements\Button::prependIcon($icon);
        }
        
        /**
         * Adds a url to the button, making it a link. This will generate an <a> tag
         *
         * @param $url string The url to link to
         * @return $this 
         * @static 
         */
        public static function asLinkTo($url)
        {
            return \storecamp\htmlelements\Button::asLinkTo($url);
        }
        
        /**
         * Get the type of the button
         *
         * @return string 
         * @static 
         */
        public static function getType()
        {
            return \storecamp\htmlelements\Button::getType();
        }
        
        /**
         * Get the value of the button. Does not return the value with the icon
         *
         * @return string 
         * @static 
         */
        public static function getValue()
        {
            return \storecamp\htmlelements\Button::getValue();
        }
        
        /**
         * Gets the attributes of the button
         *
         * @return array 
         * @static 
         */
        public static function getAttributes()
        {
            return \storecamp\htmlelements\Button::getAttributes();
        }
        
        /**
         * Gets the value with the icon
         *
         * @return string The new value
         * @static 
         */
        public static function getValueWithIcon()
        {
            return \storecamp\htmlelements\Button::getValueWithIcon();
        }
        
        /**
         * Set the attributes of the object
         *
         * @param array $attributes The attributes to use
         * @return $this 
         * @static 
         */
        public static function withAttributes($attributes)
        {
            //Method inherited from \storecamp\htmlelements\RenderedObject            
            return \storecamp\htmlelements\Button::withAttributes($attributes);
        }
        
        /**
         * Adds the given classes to attributes
         *
         * @param array $classes
         * @return $this 
         * @static 
         */
        public static function addClass($classes)
        {
            //Method inherited from \storecamp\htmlelements\RenderedObject            
            return \storecamp\htmlelements\Button::addClass($classes);
        }
        
    }         

    class ButtonGroup {
        
        /**
         * Renders the button group
         *
         * @return string 
         * @static 
         */
        public static function render()
        {
            return \storecamp\htmlelements\ButtonGroup::render();
        }
        
        /**
         * 
         *
         * @return array 
         * @static 
         */
        public static function getContents()
        {
            return \storecamp\htmlelements\ButtonGroup::getContents();
        }
        
        /**
         * 
         *
         * @param array $contents
         * @static 
         */
        public static function setContents($contents)
        {
            return \storecamp\htmlelements\ButtonGroup::setContents($contents);
        }
        
        /**
         * 
         *
         * @return string 
         * @static 
         */
        public static function getType()
        {
            return \storecamp\htmlelements\ButtonGroup::getType();
        }
        
        /**
         * 
         *
         * @param string $type
         * @static 
         */
        public static function setType($type)
        {
            return \storecamp\htmlelements\ButtonGroup::setType($type);
        }
        
        /**
         * 
         *
         * @return bool 
         * @static 
         */
        public static function isVertical()
        {
            return \storecamp\htmlelements\ButtonGroup::isVertical();
        }
        
        /**
         * 
         *
         * @param bool $vertical
         * @static 
         */
        public static function setVertical($vertical)
        {
            return \storecamp\htmlelements\ButtonGroup::setVertical($vertical);
        }
        
        /**
         * 
         *
         * @return bool 
         * @static 
         */
        public static function isLinks()
        {
            return \storecamp\htmlelements\ButtonGroup::isLinks();
        }
        
        /**
         * 
         *
         * @param bool $links
         * @static 
         */
        public static function setLinks($links)
        {
            return \storecamp\htmlelements\ButtonGroup::setLinks($links);
        }
        
        /**
         * 
         *
         * @return array 
         * @static 
         */
        public static function getActivated()
        {
            return \storecamp\htmlelements\ButtonGroup::getActivated();
        }
        
        /**
         * 
         *
         * @param array $activated
         * @static 
         */
        public static function setActivated($activated)
        {
            return \storecamp\htmlelements\ButtonGroup::setActivated($activated);
        }
        
        /**
         * 
         *
         * @return array 
         * @static 
         */
        public static function getAttributes()
        {
            return \storecamp\htmlelements\ButtonGroup::getAttributes();
        }
        
        /**
         * 
         *
         * @param array $attributes
         * @static 
         */
        public static function setAttributes($attributes)
        {
            return \storecamp\htmlelements\ButtonGroup::setAttributes($attributes);
        }
        
        /**
         * Sets the size of the button group
         *
         * @param $size
         * @static 
         */
        public static function setSize($size)
        {
            return \storecamp\htmlelements\ButtonGroup::setSize($size);
        }
        
        /**
         * Sets the button group to be large
         *
         * @return $this 
         * @static 
         */
        public static function large()
        {
            return \storecamp\htmlelements\ButtonGroup::large();
        }
        
        /**
         * Sets the button group to be small
         *
         * @return $this 
         * @static 
         */
        public static function small()
        {
            return \storecamp\htmlelements\ButtonGroup::small();
        }
        
        /**
         * Sets the button group to be extra small
         *
         * @return $this 
         * @static 
         */
        public static function extraSmall()
        {
            return \storecamp\htmlelements\ButtonGroup::extraSmall();
        }
        
        /**
         * Sets the button group to be radio
         *
         * @param array $contents
         * @return $this 
         * @static 
         */
        public static function radio($contents)
        {
            return \storecamp\htmlelements\ButtonGroup::radio($contents);
        }
        
        /**
         * Sets the button group to be a checkbox
         *
         * @param array $contents
         * @return $this 
         * @static 
         */
        public static function checkbox($contents)
        {
            return \storecamp\htmlelements\ButtonGroup::checkbox($contents);
        }
        
        /**
         * Sets the contents of the button group
         *
         * @param array $contents
         * @return $this 
         * @static 
         */
        public static function withContents($contents)
        {
            return \storecamp\htmlelements\ButtonGroup::withContents($contents);
        }
        
        /**
         * Sets the button group to be vertical
         *
         * @return $this 
         * @static 
         */
        public static function vertical()
        {
            return \storecamp\htmlelements\ButtonGroup::vertical();
        }
        
        /**
         * Sets the type of the button group
         *
         * @param $type
         * @return $this 
         * @static 
         */
        public static function asType($type)
        {
            return \storecamp\htmlelements\ButtonGroup::asType($type);
        }
        
        /**
         * Renders the contents of the button group
         *
         * @return string 
         * @throws ButtonGroupException if a string should be activated
         * @static 
         */
        public static function renderContents()
        {
            return \storecamp\htmlelements\ButtonGroup::renderContents();
        }
        
        /**
         * 
         *
         * @static 
         */
        public static function links($contents = array())
        {
            return \storecamp\htmlelements\ButtonGroup::links($contents);
        }
        
        /**
         * Sets a link to be activated
         *
         * @param $toActivate
         * @return $this 
         * @static 
         */
        public static function activate($toActivate)
        {
            return \storecamp\htmlelements\ButtonGroup::activate($toActivate);
        }
        
        /**
         * Set the attributes of the object
         *
         * @param array $attributes The attributes to use
         * @return $this 
         * @static 
         */
        public static function withAttributes($attributes)
        {
            //Method inherited from \storecamp\htmlelements\RenderedObject            
            return \storecamp\htmlelements\ButtonGroup::withAttributes($attributes);
        }
        
        /**
         * Adds the given classes to attributes
         *
         * @param array $classes
         * @return $this 
         * @static 
         */
        public static function addClass($classes)
        {
            //Method inherited from \storecamp\htmlelements\RenderedObject            
            return \storecamp\htmlelements\ButtonGroup::addClass($classes);
        }
        
    }         

    class Carousel {
        
        /**
         * 
         *
         * @return string 
         * @static 
         */
        public static function getName()
        {
            return \storecamp\htmlelements\Carousel::getName();
        }
        
        /**
         * 
         *
         * @param string $name
         * @return $this 
         * @static 
         */
        public static function setName($name)
        {
            return \storecamp\htmlelements\Carousel::setName($name);
        }
        
        /**
         * 
         *
         * @return string 
         * @static 
         */
        public static function getPreviousButton()
        {
            return \storecamp\htmlelements\Carousel::getPreviousButton();
        }
        
        /**
         * 
         *
         * @param string $previousButton
         * @return $this 
         * @static 
         */
        public static function setPreviousButton($previousButton)
        {
            return \storecamp\htmlelements\Carousel::setPreviousButton($previousButton);
        }
        
        /**
         * 
         *
         * @return string 
         * @static 
         */
        public static function getNextButton()
        {
            return \storecamp\htmlelements\Carousel::getNextButton();
        }
        
        /**
         * 
         *
         * @param string $nextButton
         * @return $this 
         * @static 
         */
        public static function setNextButton($nextButton)
        {
            return \storecamp\htmlelements\Carousel::setNextButton($nextButton);
        }
        
        /**
         * 
         *
         * @return array 
         * @static 
         */
        public static function getContents()
        {
            return \storecamp\htmlelements\Carousel::getContents();
        }
        
        /**
         * 
         *
         * @param array $contents
         * @return $this 
         * @static 
         */
        public static function setContents($contents)
        {
            return \storecamp\htmlelements\Carousel::setContents($contents);
        }
        
        /**
         * 
         *
         * @return int 
         * @static 
         */
        public static function getActive()
        {
            return \storecamp\htmlelements\Carousel::getActive();
        }
        
        /**
         * 
         *
         * @param int $active
         * @return $this 
         * @static 
         */
        public static function setActive($active)
        {
            return \storecamp\htmlelements\Carousel::setActive($active);
        }
        
        /**
         * 
         *
         * @return array 
         * @static 
         */
        public static function getAttributes()
        {
            return \storecamp\htmlelements\Carousel::getAttributes();
        }
        
        /**
         * 
         *
         * @param array $attributes
         * @return $this 
         * @static 
         */
        public static function setAttributes($attributes)
        {
            return \storecamp\htmlelements\Carousel::setAttributes($attributes);
        }
        
        /**
         * Names the carousel
         *
         * @param string $name The name of the carousel
         * @return $this 
         * @static 
         */
        public static function named($name)
        {
            return \storecamp\htmlelements\Carousel::named($name);
        }
        
        /**
         * Set the control icons or text
         *
         * @param string $previousButton Left arrorw, previous text
         * @param string $nextButton right arrow, next string
         * @return $this 
         * @static 
         */
        public static function withControls($previousButton, $nextButton)
        {
            return \storecamp\htmlelements\Carousel::withControls($previousButton, $nextButton);
        }
        
        /**
         * Sets the contents of the carousel
         *
         * @param array $contents The new contents. Should be an array of arrays,
         *                        with the inner keys being "image", "alt" and
         *                        (optionally) "caption"
         * @return $this 
         * @static 
         */
        public static function withContents($contents)
        {
            return \storecamp\htmlelements\Carousel::withContents($contents);
        }
        
        /**
         * Renders the carousel
         *
         * @return string 
         * @static 
         */
        public static function render()
        {
            return \storecamp\htmlelements\Carousel::render();
        }
        
        /**
         * Renders the indicators
         *
         * @return string 
         * @static 
         */
        public static function renderIndicators()
        {
            return \storecamp\htmlelements\Carousel::renderIndicators();
        }
        
        /**
         * Renders the items of the carousel
         *
         * @return string 
         * @static 
         */
        public static function renderItems()
        {
            return \storecamp\htmlelements\Carousel::renderItems();
        }
        
        /**
         * Renders the controls of the carousel
         *
         * @return string 
         * @static 
         */
        public static function renderControls()
        {
            return \storecamp\htmlelements\Carousel::renderControls();
        }
        
        /**
         * Set the attributes of the object
         *
         * @param array $attributes The attributes to use
         * @return $this 
         * @static 
         */
        public static function withAttributes($attributes)
        {
            //Method inherited from \storecamp\htmlelements\RenderedObject            
            return \storecamp\htmlelements\Carousel::withAttributes($attributes);
        }
        
        /**
         * Adds the given classes to attributes
         *
         * @param array $classes
         * @return $this 
         * @static 
         */
        public static function addClass($classes)
        {
            //Method inherited from \storecamp\htmlelements\RenderedObject            
            return \storecamp\htmlelements\Carousel::addClass($classes);
        }
        
    }         

    class ControlGroup {
        
        /**
         * 
         *
         * @return array 
         * @static 
         */
        public static function getContents()
        {
            return \storecamp\htmlelements\ControlGroup::getContents();
        }
        
        /**
         * 
         *
         * @param array $contents
         * @static 
         */
        public static function setContents($contents)
        {
            return \storecamp\htmlelements\ControlGroup::setContents($contents);
        }
        
        /**
         * 
         *
         * @return string 
         * @static 
         */
        public static function getControlSize()
        {
            return \storecamp\htmlelements\ControlGroup::getControlSize();
        }
        
        /**
         * 
         *
         * @param string $controlSize
         * @static 
         */
        public static function setControlSize($controlSize)
        {
            return \storecamp\htmlelements\ControlGroup::setControlSize($controlSize);
        }
        
        /**
         * 
         *
         * @return string 
         * @static 
         */
        public static function getLabel()
        {
            return \storecamp\htmlelements\ControlGroup::getLabel();
        }
        
        /**
         * 
         *
         * @param string $label
         * @static 
         */
        public static function setLabel($label)
        {
            return \storecamp\htmlelements\ControlGroup::setLabel($label);
        }
        
        /**
         * 
         *
         * @return string 
         * @static 
         */
        public static function getLabelSize()
        {
            return \storecamp\htmlelements\ControlGroup::getLabelSize();
        }
        
        /**
         * 
         *
         * @param string $labelSize
         * @static 
         */
        public static function setLabelSize($labelSize)
        {
            return \storecamp\htmlelements\ControlGroup::setLabelSize($labelSize);
        }
        
        /**
         * 
         *
         * @return string 
         * @static 
         */
        public static function getHelp()
        {
            return \storecamp\htmlelements\ControlGroup::getHelp();
        }
        
        /**
         * 
         *
         * @param string $help
         * @static 
         */
        public static function setHelp($help)
        {
            return \storecamp\htmlelements\ControlGroup::setHelp($help);
        }
        
        /**
         * 
         *
         * @return \Form 
         * @static 
         */
        public static function getFormBuilder()
        {
            return \storecamp\htmlelements\ControlGroup::getFormBuilder();
        }
        
        /**
         * 
         *
         * @param \Form $formBuilder
         * @static 
         */
        public static function setFormBuilder($formBuilder)
        {
            return \storecamp\htmlelements\ControlGroup::setFormBuilder($formBuilder);
        }
        
        /**
         * 
         *
         * @return array 
         * @static 
         */
        public static function getAttributes()
        {
            return \storecamp\htmlelements\ControlGroup::getAttributes();
        }
        
        /**
         * 
         *
         * @param array $attributes
         * @static 
         */
        public static function setAttributes($attributes)
        {
            return \storecamp\htmlelements\ControlGroup::setAttributes($attributes);
        }
        
        /**
         * Renders the control group
         *
         * @return string 
         * @static 
         */
        public static function render()
        {
            return \storecamp\htmlelements\ControlGroup::render();
        }
        
        /**
         * Set the attributes of the control group
         *
         * @param array $attributes The attributes array
         * @return $this 
         * @static 
         */
        public static function withAttributes($attributes)
        {
            return \storecamp\htmlelements\ControlGroup::withAttributes($attributes);
        }
        
        /**
         * Adds the contents to the control group
         *
         * @param string $contents The contents of the control group
         * @param null $controlSize |int The size of the form control
         * @return $this 
         * @throws ControlGroupException If is $controlSize set and not between 1
         *                            and 12
         * @static 
         */
        public static function withContents($contents, $controlSize = null)
        {
            return \storecamp\htmlelements\ControlGroup::withContents($contents, $controlSize);
        }
        
        /**
         * Sets the label of the control group
         *
         * @param string $label The label
         * @param null $labelSize |int The size of the label
         * @return $this 
         * @throws ControlGroupException If is $labelSize set and not between 1
         *                          and 12
         * @static 
         */
        public static function withLabel($label, $labelSize = null)
        {
            return \storecamp\htmlelements\ControlGroup::withLabel($label, $labelSize);
        }
        
        /**
         * Adds a help block
         *
         * @param string $help The help information
         * @return $this 
         * @static 
         */
        public static function withHelp($help)
        {
            return \storecamp\htmlelements\ControlGroup::withHelp($help);
        }
        
        /**
         * Adds validation error if occured
         *
         * @param string $name
         * @return $this 
         * @static 
         */
        public static function withValidation($name)
        {
            return \storecamp\htmlelements\ControlGroup::withValidation($name);
        }
        
        /**
         * Generates a full control group with a label, control and help block
         *
         * @param string $label The label
         * @param string $control The form control
         * @param string $help The help text
         * @param int $labelSize The size of the label
         * @param int $controlSize The size of the form control
         * @return $this 
         * @throws ControlGroupException if the sizes are invalid
         * @static 
         */
        public static function generate($label, $control, $help = null, $labelSize = null, $controlSize = null)
        {
            return \storecamp\htmlelements\ControlGroup::generate($label, $control, $help, $labelSize, $controlSize);
        }
        
        /**
         * Renders the contents if given as an array
         *
         * @return string 
         * @static 
         */
        public static function renderArrayContents()
        {
            return \storecamp\htmlelements\ControlGroup::renderArrayContents();
        }
        
        /**
         * Renders the label
         *
         * @return string 
         * @static 
         */
        public static function renderLabel()
        {
            return \storecamp\htmlelements\ControlGroup::renderLabel();
        }
        
        /**
         * Creates the div to surround the form control
         *
         * @return string 
         * @static 
         */
        public static function createControlDiv()
        {
            return \storecamp\htmlelements\ControlGroup::createControlDiv();
        }
        
        /**
         * Adds the given classes to attributes
         *
         * @param array $classes
         * @return $this 
         * @static 
         */
        public static function addClass($classes)
        {
            //Method inherited from \storecamp\htmlelements\RenderedObject            
            return \storecamp\htmlelements\ControlGroup::addClass($classes);
        }
        
    }         

    class DropdownButton {
        
        /**
         * Set the label of the button
         *
         * @param $label
         * @return $this 
         * @static 
         */
        public static function labelled($label)
        {
            return \storecamp\htmlelements\DropdownButton::labelled($label);
        }
        
        /**
         * Set the contents of the button
         *
         * @param array $contents The contents of the dropdown button
         * @return $this 
         * @static 
         */
        public static function withContents($contents)
        {
            return \storecamp\htmlelements\DropdownButton::withContents($contents);
        }
        
        /**
         * Sets the type of the button
         *
         * @param string $type The type of the button
         * @return $this 
         * @static 
         */
        public static function setType($type)
        {
            return \storecamp\htmlelements\DropdownButton::setType($type);
        }
        
        /**
         * Sets the size of the button
         *
         * @param string $size The size of the button
         * @return $this 
         * @static 
         */
        public static function setSize($size)
        {
            return \storecamp\htmlelements\DropdownButton::setSize($size);
        }
        
        /**
         * Splits the button
         *
         * @return $this 
         * @static 
         */
        public static function split()
        {
            return \storecamp\htmlelements\DropdownButton::split();
        }
        
        /**
         * Sets the button to drop up
         *
         * @return $this 
         * @static 
         */
        public static function dropup()
        {
            return \storecamp\htmlelements\DropdownButton::dropup();
        }
        
        /**
         * Creates a normal dropdown button
         *
         * @param string $label The label
         * @return $this 
         * @static 
         */
        public static function normal($label = '')
        {
            return \storecamp\htmlelements\DropdownButton::normal($label);
        }
        
        /**
         * Creates a primary dropdown button
         *
         * @param string $label The label
         * @return $this 
         * @static 
         */
        public static function primary($label = '')
        {
            return \storecamp\htmlelements\DropdownButton::primary($label);
        }
        
        /**
         * Creates a danger dropdown button
         *
         * @param string $label The label
         * @return $this 
         * @static 
         */
        public static function danger($label = '')
        {
            return \storecamp\htmlelements\DropdownButton::danger($label);
        }
        
        /**
         * Creates a warning dropdown button
         *
         * @param string $label The label
         * @return $this 
         * @static 
         */
        public static function warning($label = '')
        {
            return \storecamp\htmlelements\DropdownButton::warning($label);
        }
        
        /**
         * Creates a success dropdown button
         *
         * @param string $label The label
         * @return $this 
         * @static 
         */
        public static function success($label = '')
        {
            return \storecamp\htmlelements\DropdownButton::success($label);
        }
        
        /**
         * Creates a info dropdown button
         *
         * @param string $label The label
         * @return $this 
         * @static 
         */
        public static function info($label = '')
        {
            return \storecamp\htmlelements\DropdownButton::info($label);
        }
        
        /**
         * Sets the size to large
         *
         * @return $this 
         * @static 
         */
        public static function large()
        {
            return \storecamp\htmlelements\DropdownButton::large();
        }
        
        /**
         * Sets the size to small
         *
         * @return $this 
         * @static 
         */
        public static function small()
        {
            return \storecamp\htmlelements\DropdownButton::small();
        }
        
        /**
         * Sets the size to extra small
         *
         * @return $this 
         * @static 
         */
        public static function extraSmall()
        {
            return \storecamp\htmlelements\DropdownButton::extraSmall();
        }
        
        /**
         * Renders the dropdown button
         *
         * @return string 
         * @static 
         */
        public static function render()
        {
            return \storecamp\htmlelements\DropdownButton::render();
        }
        
        /**
         * 
         *
         * @return string 
         * @static 
         */
        public static function getLabel()
        {
            return \storecamp\htmlelements\DropdownButton::getLabel();
        }
        
        /**
         * 
         *
         * @param string $label
         * @static 
         */
        public static function setLabel($label)
        {
            return \storecamp\htmlelements\DropdownButton::setLabel($label);
        }
        
        /**
         * 
         *
         * @return array 
         * @static 
         */
        public static function getContents()
        {
            return \storecamp\htmlelements\DropdownButton::getContents();
        }
        
        /**
         * 
         *
         * @param array $contents
         * @static 
         */
        public static function setContents($contents)
        {
            return \storecamp\htmlelements\DropdownButton::setContents($contents);
        }
        
        /**
         * 
         *
         * @return bool 
         * @static 
         */
        public static function isSplit()
        {
            return \storecamp\htmlelements\DropdownButton::isSplit();
        }
        
        /**
         * 
         *
         * @return bool 
         * @static 
         */
        public static function getSplit()
        {
            return \storecamp\htmlelements\DropdownButton::getSplit();
        }
        
        /**
         * 
         *
         * @param bool $split
         * @static 
         */
        public static function setSplit($split)
        {
            return \storecamp\htmlelements\DropdownButton::setSplit($split);
        }
        
        /**
         * 
         *
         * @return bool 
         * @static 
         */
        public static function isDropup()
        {
            return \storecamp\htmlelements\DropdownButton::isDropup();
        }
        
        /**
         * 
         *
         * @param bool $dropup
         * @static 
         */
        public static function setDropup($dropup)
        {
            return \storecamp\htmlelements\DropdownButton::setDropup($dropup);
        }
        
        /**
         * 
         *
         * @return string 
         * @static 
         */
        public static function getType()
        {
            return \storecamp\htmlelements\DropdownButton::getType();
        }
        
        /**
         * 
         *
         * @return string 
         * @static 
         */
        public static function getSize()
        {
            return \storecamp\htmlelements\DropdownButton::getSize();
        }
        
        /**
         * 
         *
         * @return bool 
         * @static 
         */
        public static function getDropup()
        {
            return \storecamp\htmlelements\DropdownButton::getDropup();
        }
        
        /**
         * Render the inner items
         *
         * @return string 
         * @static 
         */
        public static function renderItems()
        {
            return \storecamp\htmlelements\DropdownButton::renderItems();
        }
        
        /**
         * Set the attributes of the object
         *
         * @param array $attributes The attributes to use
         * @return $this 
         * @static 
         */
        public static function withAttributes($attributes)
        {
            //Method inherited from \storecamp\htmlelements\RenderedObject            
            return \storecamp\htmlelements\DropdownButton::withAttributes($attributes);
        }
        
        /**
         * Adds the given classes to attributes
         *
         * @param array $classes
         * @return $this 
         * @static 
         */
        public static function addClass($classes)
        {
            //Method inherited from \storecamp\htmlelements\RenderedObject            
            return \storecamp\htmlelements\DropdownButton::addClass($classes);
        }
        
    }         

    class Form {
        
        /**
         * Create a submit button element.
         *
         * @param string|null $value The value of the submit button
         * @param array $options The options
         * @return string 
         * @param string $value
         * @param array $options
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */
        public static function submit($value = null, $options = array())
        {
            return \storecamp\htmlelements\Form::submit($value, $options);
        }
        
        /**
         * Create a form label element.
         *
         * @param string $name The name of the object this label will be
         *                             attached to
         * @param string|null $value The text of the label
         * @param array $options The options of the label
         * @return string 
         * @param string $name
         * @param string $value
         * @param array $options
         * @param bool $escape_html
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */
        public static function label($name, $value = null, $options = array(), $escape_html = true)
        {
            return \storecamp\htmlelements\Form::label($name, $value, $options, $escape_html);
        }
        
        /**
         * Opens an inline form
         *
         * @param array $attributes The attributes of the array
         * @return string 
         * @static 
         */
        public static function inline($attributes = array())
        {
            return \storecamp\htmlelements\Form::inline($attributes);
        }
        
        /**
         * Opens a horizontal form
         *
         * @param array $attributes
         * @return string 
         * @static 
         */
        public static function horizontal($attributes = array())
        {
            return \storecamp\htmlelements\Form::horizontal($attributes);
        }
        
        /**
         * Creates a validation block
         *
         * @param string $type The type of validation
         * @param string $label The label
         * @param string $input The input
         * @param array $attributes The attributes of the validation block
         * @return string 
         * @static 
         */
        public static function validation($type, $label, $input, $attributes = array())
        {
            return \storecamp\htmlelements\Form::validation($type, $label, $input, $attributes);
        }
        
        /**
         * Creates a success validation block
         *
         * @param string $label The label
         * @param string $input The input
         * @param array $attributes The attributes of the validation block
         * @return string 
         * @see \storecamp\htmlelements\Form::validation()
         * @static 
         */
        public static function success($label, $input, $attributes = array())
        {
            return \storecamp\htmlelements\Form::success($label, $input, $attributes);
        }
        
        /**
         * Creates a warning validation block
         *
         * @param string $label The label
         * @param string $input The input
         * @param array $attributes The attributes of the validation block
         * @return string 
         * @see \storecamp\htmlelements\Form::validation()
         * @static 
         */
        public static function warning($label, $input, $attributes = array())
        {
            return \storecamp\htmlelements\Form::warning($label, $input, $attributes);
        }
        
        /**
         * Creates an error validation block
         *
         * @param string $label The label
         * @param string $input The input
         * @param array $attributes The attributes of the validation block
         * @return string 
         * @see \storecamp\htmlelements\Form::validation()
         * @static 
         */
        public static function error($label, $input, $attributes = array())
        {
            return \storecamp\htmlelements\Form::error($label, $input, $attributes);
        }
        
        /**
         * Creates a feedback block with an icon
         *
         * @param string $label The label
         * @param string $input The input
         * @param string $icon The icon
         * @param array $attributes The attributes of the block
         * @return string 
         * @static 
         */
        public static function feedback($label, $input, $icon, $attributes = array())
        {
            return \storecamp\htmlelements\Form::feedback($label, $input, $icon, $attributes);
        }
        
        /**
         * Creates a help block
         *
         * @param string $helpText The help text
         * @param array $attributes
         * @return string 
         * @static 
         */
        public static function help($helpText, $attributes = array())
        {
            return \storecamp\htmlelements\Form::help($helpText, $attributes);
        }
        
        /**
         * Opens a horizontal form with a given model
         *
         * @param mixed $model
         * @param array $attributes
         * @return string 
         * @see \storecamp\htmlelements\Form::horizontal()
         * @see \Html::model()
         * @static 
         */
        public static function horizontalModel($model, $attributes = array())
        {
            return \storecamp\htmlelements\Form::horizontalModel($model, $attributes);
        }
        
        /**
         * Opens a inline form with a given model
         *
         * @param mixed $model
         * @param array $attributes
         * @return string 
         * @see \storecamp\htmlelements\Form::inline()
         * @see \Html::model()
         * @static 
         */
        public static function inlineModel($model, $attributes = array())
        {
            return \storecamp\htmlelements\Form::inlineModel($model, $attributes);
        }
        
        /**
         * Create a select box field.
         *
         * @param string $name
         * @param array $list
         * @param null $selected
         * @param array $attributes
         * @return string 
         * @param string $name
         * @param array $list
         * @param string $selected
         * @param array $options
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */
        public static function select($name, $list = array(), $selected = null, $attributes = array())
        {
            return \storecamp\htmlelements\Form::select($name, $list, $selected, $attributes);
        }
        
        /**
         * Create a textarea input field.
         *
         * @param string $name The name of the text area
         * @param string|null $value The default value
         * @param array $attributes The attributes of the text area
         * @return string 
         * @param string $name
         * @param string $value
         * @param array $options
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */
        public static function textarea($name, $value = null, $attributes = array())
        {
            return \storecamp\htmlelements\Form::textarea($name, $value, $attributes);
        }
        
        /**
         * Create a password input field.
         *
         * @param string $name The name of the password input
         * @param array $attributes The attributes of the input
         * @return string 
         * @param string $name
         * @param array $options
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */
        public static function password($name, $attributes = array())
        {
            return \storecamp\htmlelements\Form::password($name, $attributes);
        }
        
        /**
         * Create a text input field.
         *
         * @param string $name The name of the text input
         * @param string|null $value The default value
         * @param array $attributes The attributes of the input
         * @return string 
         * @param string $name
         * @param string $value
         * @param array $options
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */
        public static function text($name, $value = null, $attributes = array())
        {
            return \storecamp\htmlelements\Form::text($name, $value, $attributes);
        }
        
        /**
         * Create an e-mail input field.
         *
         * @param string $name The name of the email input
         * @param string|null $value The default value of the input
         * @param array $attributes The attributes of the email input
         * @return string 
         * @param string $name
         * @param string $value
         * @param array $options
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */
        public static function email($name, $value = null, $attributes = array())
        {
            return \storecamp\htmlelements\Form::email($name, $value, $attributes);
        }
        
        /**
         * Creates a datetime form element
         *
         * @param string $name The name of the element
         * @param null $value The value
         * @param array $attributes The attributes
         * @return string 
         * @see FormBuilder::input()
         * @static 
         */
        public static function datetime($name, $value = null, $attributes = array())
        {
            return \storecamp\htmlelements\Form::datetime($name, $value, $attributes);
        }
        
        /**
         * Creates a datetime local element
         *
         * @param string $name The name of the element
         * @param null $value
         * @param array $attributes
         * @return string 
         * @see FormBuilder::input()
         * @static 
         */
        public static function datetimelocal($name, $value = null, $attributes = array())
        {
            return \storecamp\htmlelements\Form::datetimelocal($name, $value, $attributes);
        }
        
        /**
         * Creates a date input
         *
         * @param string $name The name of the element
         * @param null $value
         * @param array $attributes
         * @return string 
         * @static 
         */
        public static function date($name, $value = null, $attributes = array())
        {
            return \storecamp\htmlelements\Form::date($name, $value, $attributes);
        }
        
        /**
         * Creates a month input
         *
         * @param string $name The name of the element
         * @param null $value
         * @param array $attributes
         * @return string 
         * @static 
         */
        public static function month($name, $value = null, $attributes = array())
        {
            return \storecamp\htmlelements\Form::month($name, $value, $attributes);
        }
        
        /**
         * Creates a week form element
         *
         * @param string $name The name of the element
         * @param null $value
         * @param array $attributes
         * @return string 
         * @static 
         */
        public static function week($name, $value = null, $attributes = array())
        {
            return \storecamp\htmlelements\Form::week($name, $value, $attributes);
        }
        
        /**
         * Creates a time form element
         *
         * @param string $name The name of the element
         * @param null $value
         * @param array $attributes
         * @return string 
         * @static 
         */
        public static function time($name, $value = null, $attributes = array())
        {
            return \storecamp\htmlelements\Form::time($name, $value, $attributes);
        }
        
        /**
         * Creates a number form element
         *
         * @param string $name The name of the element
         * @param null $value
         * @param array $attributes
         * @return string 
         * @static 
         */
        public static function number($name, $value = null, $attributes = array())
        {
            return \storecamp\htmlelements\Form::number($name, $value, $attributes);
        }
        
        /**
         * Creates a url form element
         *
         * @param string $name The name of the element
         * @param null $value
         * @param array $attributes
         * @return string 
         * @static 
         */
        public static function url($name, $value = null, $attributes = array())
        {
            return \storecamp\htmlelements\Form::url($name, $value, $attributes);
        }
        
        /**
         * Creates a search element
         *
         * @param string $name The name of the element
         * @param null $value
         * @param array $attributes
         * @return string 
         * @static 
         */
        public static function search($name, $value = null, $attributes = array())
        {
            return \storecamp\htmlelements\Form::search($name, $value, $attributes);
        }
        
        /**
         * Creates a tel element
         *
         * @param string $name The name of the element
         * @param null $value
         * @param array $attributes
         * @return string 
         * @static 
         */
        public static function tel($name, $value = null, $attributes = array())
        {
            return \storecamp\htmlelements\Form::tel($name, $value, $attributes);
        }
        
        /**
         * Creates a color element
         *
         * @param string $name The name of the element
         * @param null $value
         * @param array $attributes
         * @return string 
         * @static 
         */
        public static function color($name, $value = null, $attributes = array())
        {
            return \storecamp\htmlelements\Form::color($name, $value, $attributes);
        }
        
        /**
         * Determine whether the form element with the given name
         * has any validation errors.
         *
         * @param string $name
         * @return bool 
         * @static 
         */
        public static function hasErrors($name)
        {
            return \storecamp\htmlelements\Form::hasErrors($name);
        }
        
        /**
         * Get the formatted errors for the form element with the given name.
         *
         * @param string $name
         * @return string 
         * @static 
         */
        public static function getFormattedError($name)
        {
            return \storecamp\htmlelements\Form::getFormattedError($name);
        }
        
        /**
         * Open up a new HTML form.
         *
         * @param array $options
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */
        public static function open($options = array())
        {
            //Method inherited from \Collective\Html\FormBuilder            
            return \storecamp\htmlelements\Form::open($options);
        }
        
        /**
         * Create a new model based form builder.
         *
         * @param mixed $model
         * @param array $options
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */
        public static function model($model, $options = array())
        {
            //Method inherited from \Collective\Html\FormBuilder            
            return \storecamp\htmlelements\Form::model($model, $options);
        }
        
        /**
         * Set the model instance on the form builder.
         *
         * @param mixed $model
         * @return void 
         * @static 
         */
        public static function setModel($model)
        {
            //Method inherited from \Collective\Html\FormBuilder            
            \storecamp\htmlelements\Form::setModel($model);
        }
        
        /**
         * Close the current form.
         *
         * @return string 
         * @static 
         */
        public static function close()
        {
            //Method inherited from \Collective\Html\FormBuilder            
            return \storecamp\htmlelements\Form::close();
        }
        
        /**
         * Generate a hidden field with the current CSRF token.
         *
         * @return string 
         * @static 
         */
        public static function token()
        {
            //Method inherited from \Collective\Html\FormBuilder            
            return \storecamp\htmlelements\Form::token();
        }
        
        /**
         * Create a form input field.
         *
         * @param string $type
         * @param string $name
         * @param string $value
         * @param array $options
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */
        public static function input($type, $name, $value = null, $options = array())
        {
            //Method inherited from \Collective\Html\FormBuilder            
            return \storecamp\htmlelements\Form::input($type, $name, $value, $options);
        }
        
        /**
         * Create a hidden input field.
         *
         * @param string $name
         * @param string $value
         * @param array $options
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */
        public static function hidden($name, $value = null, $options = array())
        {
            //Method inherited from \Collective\Html\FormBuilder            
            return \storecamp\htmlelements\Form::hidden($name, $value, $options);
        }
        
        /**
         * Create a file input field.
         *
         * @param string $name
         * @param array $options
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */
        public static function file($name, $options = array())
        {
            //Method inherited from \Collective\Html\FormBuilder            
            return \storecamp\htmlelements\Form::file($name, $options);
        }
        
        /**
         * Create a select range field.
         *
         * @param string $name
         * @param string $begin
         * @param string $end
         * @param string $selected
         * @param array $options
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */
        public static function selectRange($name, $begin, $end, $selected = null, $options = array())
        {
            //Method inherited from \Collective\Html\FormBuilder            
            return \storecamp\htmlelements\Form::selectRange($name, $begin, $end, $selected, $options);
        }
        
        /**
         * Create a select year field.
         *
         * @param string $name
         * @param string $begin
         * @param string $end
         * @param string $selected
         * @param array $options
         * @return mixed 
         * @static 
         */
        public static function selectYear()
        {
            //Method inherited from \Collective\Html\FormBuilder            
            return \storecamp\htmlelements\Form::selectYear();
        }
        
        /**
         * Create a select month field.
         *
         * @param string $name
         * @param string $selected
         * @param array $options
         * @param string $format
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */
        public static function selectMonth($name, $selected = null, $options = array(), $format = '%B')
        {
            //Method inherited from \Collective\Html\FormBuilder            
            return \storecamp\htmlelements\Form::selectMonth($name, $selected, $options, $format);
        }
        
        /**
         * Get the select option for the given value.
         *
         * @param string $display
         * @param string $value
         * @param string $selected
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */
        public static function getSelectOption($display, $value, $selected)
        {
            //Method inherited from \Collective\Html\FormBuilder            
            return \storecamp\htmlelements\Form::getSelectOption($display, $value, $selected);
        }
        
        /**
         * Create a checkbox input field.
         *
         * @param string $name
         * @param mixed $value
         * @param bool $checked
         * @param array $options
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */
        public static function checkbox($name, $value = 1, $checked = null, $options = array())
        {
            //Method inherited from \Collective\Html\FormBuilder            
            return \storecamp\htmlelements\Form::checkbox($name, $value, $checked, $options);
        }
        
        /**
         * Create a radio button input field.
         *
         * @param string $name
         * @param mixed $value
         * @param bool $checked
         * @param array $options
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */
        public static function radio($name, $value = null, $checked = null, $options = array())
        {
            //Method inherited from \Collective\Html\FormBuilder            
            return \storecamp\htmlelements\Form::radio($name, $value, $checked, $options);
        }
        
        /**
         * Create a HTML reset input element.
         *
         * @param string $value
         * @param array $attributes
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */
        public static function reset($value, $attributes = array())
        {
            //Method inherited from \Collective\Html\FormBuilder            
            return \storecamp\htmlelements\Form::reset($value, $attributes);
        }
        
        /**
         * Create a HTML image input element.
         *
         * @param string $url
         * @param string $name
         * @param array $attributes
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */
        public static function image($url, $name = null, $attributes = array())
        {
            //Method inherited from \Collective\Html\FormBuilder            
            return \storecamp\htmlelements\Form::image($url, $name, $attributes);
        }
        
        /**
         * Create a button element.
         *
         * @param string $value
         * @param array $options
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */
        public static function button($value = null, $options = array())
        {
            //Method inherited from \Collective\Html\FormBuilder            
            return \storecamp\htmlelements\Form::button($value, $options);
        }
        
        /**
         * Get the ID attribute for a field name.
         *
         * @param string $name
         * @param array $attributes
         * @return string 
         * @static 
         */
        public static function getIdAttribute($name, $attributes)
        {
            //Method inherited from \Collective\Html\FormBuilder            
            return \storecamp\htmlelements\Form::getIdAttribute($name, $attributes);
        }
        
        /**
         * Get the value that should be assigned to the field.
         *
         * @param string $name
         * @param string $value
         * @return mixed 
         * @static 
         */
        public static function getValueAttribute($name, $value = null)
        {
            //Method inherited from \Collective\Html\FormBuilder            
            return \storecamp\htmlelements\Form::getValueAttribute($name, $value);
        }
        
        /**
         * Get a value from the session's old input.
         *
         * @param string $name
         * @return mixed 
         * @static 
         */
        public static function old($name)
        {
            //Method inherited from \Collective\Html\FormBuilder            
            return \storecamp\htmlelements\Form::old($name);
        }
        
        /**
         * Determine if the old input is empty.
         *
         * @return bool 
         * @static 
         */
        public static function oldInputIsEmpty()
        {
            //Method inherited from \Collective\Html\FormBuilder            
            return \storecamp\htmlelements\Form::oldInputIsEmpty();
        }
        
        /**
         * Get the session store implementation.
         *
         * @return \Illuminate\Session\SessionInterface $session
         * @static 
         */
        public static function getSessionStore()
        {
            //Method inherited from \Collective\Html\FormBuilder            
            return \storecamp\htmlelements\Form::getSessionStore();
        }
        
        /**
         * Set the session store implementation.
         *
         * @param \Illuminate\Session\SessionInterface $session
         * @return $this 
         * @static 
         */
        public static function setSessionStore($session)
        {
            //Method inherited from \Collective\Html\FormBuilder            
            return \storecamp\htmlelements\Form::setSessionStore($session);
        }
        
        /**
         * Register a custom macro.
         *
         * @param string $name
         * @param callable $macro
         * @return void 
         * @static 
         */
        public static function macro($name, $macro)
        {
            //Method inherited from \Collective\Html\FormBuilder            
            \storecamp\htmlelements\Form::macro($name, $macro);
        }
        
        /**
         * Checks if macro is registered.
         *
         * @param string $name
         * @return bool 
         * @static 
         */
        public static function hasMacro($name)
        {
            //Method inherited from \Collective\Html\FormBuilder            
            return \storecamp\htmlelements\Form::hasMacro($name);
        }
        
        /**
         * Dynamically handle calls to the class.
         *
         * @param string $method
         * @param array $parameters
         * @return mixed 
         * @throws \BadMethodCallException
         * @static 
         */
        public static function macroCall($method, $parameters)
        {
            //Method inherited from \Collective\Html\FormBuilder            
            return \storecamp\htmlelements\Form::macroCall($method, $parameters);
        }
        
        /**
         * Register a custom component.
         *
         * @param $name
         * @param $view
         * @param array $signature
         * @return void 
         * @static 
         */
        public static function component($name, $view, $signature)
        {
            //Method inherited from \Collective\Html\FormBuilder            
            \storecamp\htmlelements\Form::component($name, $view, $signature);
        }
        
        /**
         * Check if a component is registered.
         *
         * @param $name
         * @return bool 
         * @static 
         */
        public static function hasComponent($name)
        {
            //Method inherited from \Collective\Html\FormBuilder            
            return \storecamp\htmlelements\Form::hasComponent($name);
        }
        
        /**
         * Dynamically handle calls to the class.
         *
         * @param string $method
         * @param array $parameters
         * @return \Illuminate\Contracts\View\View|mixed 
         * @throws \BadMethodCallException
         * @static 
         */
        public static function componentCall($method, $parameters)
        {
            //Method inherited from \Collective\Html\FormBuilder            
            return \storecamp\htmlelements\Form::componentCall($method, $parameters);
        }
        
    }         

    class Helpers {
        
        /**
         * Slugifies a string
         *
         * @param string $string
         * @return mixed 
         * @static 
         */
        public static function slug($string)
        {
            return \storecamp\htmlelements\Helpers::slug($string);
        }
        
        /**
         * Outputs a link to the Bootstrap CDN
         *
         * @param bool $withTheme Gets the bootstrap theme as well
         * @return string 
         * @static 
         */
        public static function css($withTheme = true)
        {
            return \storecamp\htmlelements\Helpers::css($withTheme);
        }
        
        /**
         * Outputs a link to the Jquery and Bootstrap CDN
         *
         * @return string 
         * @static 
         */
        public static function js()
        {
            return \storecamp\htmlelements\Helpers::js();
        }
        
        /**
         * Generate an id of the form "x-class-name-x". These should always be
         * unique.
         *
         * @param \storecamp\htmlelements\RenderedObject $caller The object that called this
         * @return string A unique id
         * @static 
         */
        public static function generateId($caller)
        {
            return \storecamp\htmlelements\Helpers::generateId($caller);
        }
        
    }         

    class Icon {
        
        /**
         * Renders the object
         *
         * @return string 
         * @throws IconException
         * @static 
         */
        public static function render()
        {
            return \storecamp\htmlelements\Icon::render();
        }
        
        /**
         * Creates a span link with the correct icon link
         *
         * @param string $icon The icon name
         * @return string 
         * @static 
         */
        public static function create($icon)
        {
            return \storecamp\htmlelements\Icon::create($icon);
        }
        
        /**
         * Set the attributes of the object
         *
         * @param array $attributes The attributes to use
         * @return $this 
         * @static 
         */
        public static function withAttributes($attributes)
        {
            //Method inherited from \storecamp\htmlelements\RenderedObject            
            return \storecamp\htmlelements\Icon::withAttributes($attributes);
        }
        
        /**
         * Adds the given classes to attributes
         *
         * @param array $classes
         * @return $this 
         * @static 
         */
        public static function addClass($classes)
        {
            //Method inherited from \storecamp\htmlelements\RenderedObject            
            return \storecamp\htmlelements\Icon::addClass($classes);
        }
        
    }         

    class InputGroup {
        
        /**
         * Renders the input group
         *
         * @return string 
         * @static 
         */
        public static function render()
        {
            return \storecamp\htmlelements\InputGroup::render();
        }
        
        /**
         * Sets the contents of the input group
         *
         * @param string $contents The new contents
         * @return $this 
         * @static 
         */
        public static function withContents($contents)
        {
            return \storecamp\htmlelements\InputGroup::withContents($contents);
        }
        
        /**
         * Sets the size of the input group
         *
         * @param string $size The new size
         * @return $this 
         * @static 
         */
        public static function setSize($size)
        {
            return \storecamp\htmlelements\InputGroup::setSize($size);
        }
        
        /**
         * Prepends something to the input
         *
         * @param string $prepend The value to prepend
         * @param bool $isButton Whether the value is a button
         * @return $this 
         * @static 
         */
        public static function prepend($prepend, $isButton = false)
        {
            return \storecamp\htmlelements\InputGroup::prepend($prepend, $isButton);
        }
        
        /**
         * Prepend a button
         *
         * @param string $button The button to prepend
         * @return $this 
         * @static 
         */
        public static function prependButton($button)
        {
            return \storecamp\htmlelements\InputGroup::prependButton($button);
        }
        
        /**
         * Appends something to the input
         *
         * @param string $append The value to append
         * @param bool $isButton Whether the value is a button
         * @return $this 
         * @static 
         */
        public static function append($append, $isButton = false)
        {
            return \storecamp\htmlelements\InputGroup::append($append, $isButton);
        }
        
        /**
         * Append a button
         *
         * @param string $button The button to append
         * @return $this 
         * @static 
         */
        public static function appendButton($button)
        {
            return \storecamp\htmlelements\InputGroup::appendButton($button);
        }
        
        /**
         * Makes the input group large
         *
         * @return $this 
         * @static 
         */
        public static function large()
        {
            return \storecamp\htmlelements\InputGroup::large();
        }
        
        /**
         * Makes the input group small
         *
         * @return $this 
         * @static 
         */
        public static function small()
        {
            return \storecamp\htmlelements\InputGroup::small();
        }
        
        /**
         * Set the attributes of the object
         *
         * @param array $attributes The attributes to use
         * @return $this 
         * @static 
         */
        public static function withAttributes($attributes)
        {
            //Method inherited from \storecamp\htmlelements\RenderedObject            
            return \storecamp\htmlelements\InputGroup::withAttributes($attributes);
        }
        
        /**
         * Adds the given classes to attributes
         *
         * @param array $classes
         * @return $this 
         * @static 
         */
        public static function addClass($classes)
        {
            //Method inherited from \storecamp\htmlelements\RenderedObject            
            return \storecamp\htmlelements\InputGroup::addClass($classes);
        }
        
    }         

    class Image {
        
        /**
         * Renders the image
         *
         * @return string 
         * @throws ImageException If the image source is not set
         * @static 
         */
        public static function render()
        {
            return \storecamp\htmlelements\Image::render();
        }
        
        /**
         * Sets the source of the image
         *
         * @param string $source The source of the image
         * @return $this 
         * @static 
         */
        public static function withSource($source)
        {
            return \storecamp\htmlelements\Image::withSource($source);
        }
        
        /**
         * Sets the alt text of the image
         *
         * @param string $alt The alt text of the image
         * @return $this 
         * @static 
         */
        public static function withAlt($alt)
        {
            return \storecamp\htmlelements\Image::withAlt($alt);
        }
        
        /**
         * Sets the image to be responsive
         *
         * @return $this 
         * @static 
         */
        public static function responsive()
        {
            return \storecamp\htmlelements\Image::responsive();
        }
        
        /**
         * Creates a rounded image
         *
         * @param null|string $src The source of the image. Pass null to use the
         *                         previous value of the source
         * @param null|string $alt The alt text of the image. Pass null to use
         *                         the previous value
         * @return $this 
         * @static 
         */
        public static function rounded($src = null, $alt = null)
        {
            return \storecamp\htmlelements\Image::rounded($src, $alt);
        }
        
        /**
         * Creates a circle image
         *
         * @param null|string $src The source of the image. Pass null to use the
         *                         previous value of the source
         * @param null|string $alt The alt text of the image. Pass null to use
         *                         the previous value
         * @return $this 
         * @static 
         */
        public static function circle($src = null, $alt = null)
        {
            return \storecamp\htmlelements\Image::circle($src, $alt);
        }
        
        /**
         * Creates a thumbnail image
         *
         * @param null|string $src The source of the image. Pass null to use the
         *                         previous value of the source
         * @param null|string $alt The alt text of the image. Pass null to use
         *                         the previous value
         * @return $this 
         * @static 
         */
        public static function thumbnail($src = null, $alt = null)
        {
            return \storecamp\htmlelements\Image::thumbnail($src, $alt);
        }
        
        /**
         * BC version of Image::addClass()
         *
         * @param string|array $class
         * @return $this 
         * @static 
         */
        public static function addClass($class)
        {
            return \storecamp\htmlelements\Image::addClass($class);
        }
        
        /**
         * Set the attributes of the object
         *
         * @param array $attributes The attributes to use
         * @return $this 
         * @static 
         */
        public static function withAttributes($attributes)
        {
            //Method inherited from \storecamp\htmlelements\RenderedObject            
            return \storecamp\htmlelements\Image::withAttributes($attributes);
        }
        
    }         

    class Label {
        
        /**
         * Renders the label
         *
         * @return string 
         * @static 
         */
        public static function render()
        {
            return \storecamp\htmlelements\Label::render();
        }
        
        /**
         * Sets the contents of the label
         *
         * @param string $contents The new contents of the label
         * @return $this 
         * @static 
         */
        public static function withContents($contents)
        {
            return \storecamp\htmlelements\Label::withContents($contents);
        }
        
        /**
         * Sets the type of the label. Assumes that the label- prefix is already set
         *
         * @param string $type The new type
         * @return $this 
         * @static 
         */
        public static function setType($type)
        {
            return \storecamp\htmlelements\Label::setType($type);
        }
        
        /**
         * Creates a primary label
         *
         * @param string $contents The contents of the label
         * @return $this 
         * @static 
         */
        public static function primary($contents = '')
        {
            return \storecamp\htmlelements\Label::primary($contents);
        }
        
        /**
         * Creates a success label
         *
         * @param string $contents The contents of the label
         * @return $this 
         * @static 
         */
        public static function success($contents = '')
        {
            return \storecamp\htmlelements\Label::success($contents);
        }
        
        /**
         * Creates an info label
         *
         * @param string $contents The contents of the label
         * @return $this 
         * @static 
         */
        public static function info($contents = '')
        {
            return \storecamp\htmlelements\Label::info($contents);
        }
        
        /**
         * Creates a warning label
         *
         * @param string $contents The contents of the label
         * @return $this 
         * @static 
         */
        public static function warning($contents = '')
        {
            return \storecamp\htmlelements\Label::warning($contents);
        }
        
        /**
         * Creates a danger label
         *
         * @param string $contents The contents of the label
         * @return $this 
         * @static 
         */
        public static function danger($contents = '')
        {
            return \storecamp\htmlelements\Label::danger($contents);
        }
        
        /**
         * Creates a label
         *
         * @param string $contents The contents of the label
         * @param string $type The type to use
         * @return $this 
         * @static 
         */
        public static function create($contents, $type = 'label-default')
        {
            return \storecamp\htmlelements\Label::create($contents, $type);
        }
        
        /**
         * Creates a normal label
         *
         * @param string $contents The contents of the label
         * @return $this 
         * @static 
         */
        public static function normal($contents = '')
        {
            return \storecamp\htmlelements\Label::normal($contents);
        }
        
        /**
         * Set the attributes of the object
         *
         * @param array $attributes The attributes to use
         * @return $this 
         * @static 
         */
        public static function withAttributes($attributes)
        {
            //Method inherited from \storecamp\htmlelements\RenderedObject            
            return \storecamp\htmlelements\Label::withAttributes($attributes);
        }
        
        /**
         * Adds the given classes to attributes
         *
         * @param array $classes
         * @return $this 
         * @static 
         */
        public static function addClass($classes)
        {
            //Method inherited from \storecamp\htmlelements\RenderedObject            
            return \storecamp\htmlelements\Label::addClass($classes);
        }
        
    }         

    class MediaObject {
        
        /**
         * Renders the media object
         *
         * @return string 
         * @throws MediaObjectException if there is no contents
         * @static 
         */
        public static function render()
        {
            return \storecamp\htmlelements\MediaObject::render();
        }
        
        /**
         * Sets the contents of the media object
         *
         * @param array $contents The contents of the media object
         * @return $this 
         * @static 
         */
        public static function withContents($contents)
        {
            return \storecamp\htmlelements\MediaObject::withContents($contents);
        }
        
        /**
         * Force the media object to become a list
         *
         * @return $this 
         * @static 
         */
        public static function asList()
        {
            return \storecamp\htmlelements\MediaObject::asList();
        }
        
        /**
         * Set the attributes of the object
         *
         * @param array $attributes The attributes to use
         * @return $this 
         * @static 
         */
        public static function withAttributes($attributes)
        {
            //Method inherited from \storecamp\htmlelements\RenderedObject            
            return \storecamp\htmlelements\MediaObject::withAttributes($attributes);
        }
        
        /**
         * Adds the given classes to attributes
         *
         * @param array $classes
         * @return $this 
         * @static 
         */
        public static function addClass($classes)
        {
            //Method inherited from \storecamp\htmlelements\RenderedObject            
            return \storecamp\htmlelements\MediaObject::addClass($classes);
        }
        
    }         

    class Modal {
        
        /**
         * Renders the modal
         *
         * @return string 
         * @static 
         */
        public static function render()
        {
            return \storecamp\htmlelements\Modal::render();
        }
        
        /**
         * Sets the title of the modal
         *
         * @param string $title
         * @return $this 
         * @static 
         */
        public static function withTitle($title)
        {
            return \storecamp\htmlelements\Modal::withTitle($title);
        }
        
        /**
         * Sets the body of the modal
         *
         * @param string $body The new body of the modal
         * @return $this 
         * @static 
         */
        public static function withBody($body)
        {
            return \storecamp\htmlelements\Modal::withBody($body);
        }
        
        /**
         * Set the footer of the modal
         *
         * @param string $footer The footer
         * @return $this 
         * @static 
         */
        public static function withFooter($footer)
        {
            return \storecamp\htmlelements\Modal::withFooter($footer);
        }
        
        /**
         * Sets the name of the modal
         *
         * @param string $name The name of the modal
         * @return $this 
         * @static 
         */
        public static function named($name)
        {
            return \storecamp\htmlelements\Modal::named($name);
        }
        
        /**
         * Sets the button
         *
         * @param \Button $button The button to open the modal with
         * @return $this 
         * @static 
         */
        public static function withButton($button = null)
        {
            return \storecamp\htmlelements\Modal::withButton($button);
        }
        
        /**
         * Set the attributes of the object
         *
         * @param array $attributes The attributes to use
         * @return $this 
         * @static 
         */
        public static function withAttributes($attributes)
        {
            //Method inherited from \storecamp\htmlelements\RenderedObject            
            return \storecamp\htmlelements\Modal::withAttributes($attributes);
        }
        
        /**
         * Adds the given classes to attributes
         *
         * @param array $classes
         * @return $this 
         * @static 
         */
        public static function addClass($classes)
        {
            //Method inherited from \storecamp\htmlelements\RenderedObject            
            return \storecamp\htmlelements\Modal::addClass($classes);
        }
        
    }         

    class Navbar {
        
        /**
         * Renders the navbar
         *
         * @return string 
         * @static 
         */
        public static function render()
        {
            return \storecamp\htmlelements\Navbar::render();
        }
        
        /**
         * Sets the brand of the navbar
         *
         * @param string $brand The brand
         * @param null|string $link The link. If not set we default to linking to
         *                           '/' using the UrlGenerator
         * @return $this 
         * @static 
         */
        public static function withBrand($brand, $link = null)
        {
            return \storecamp\htmlelements\Navbar::withBrand($brand, $link);
        }
        
        /**
         * Sets the brand of the navbar
         *
         * @param string $image The brand image
         * @param null|string $link The link. If not set we default to linking to
         *                             '/' using the UrlGenerator
         * @param string $altText The alt text for the image
         * @return $this 
         * @static 
         */
        public static function withBrandImage($image, $link = null, $altText = '')
        {
            return \storecamp\htmlelements\Navbar::withBrandImage($image, $link, $altText);
        }
        
        /**
         * Adds some content to the navbar
         *
         * @param mixed $content Anything that can become a string! If you pass in a
         *                       storecamp\htmlelements\Navigation object we'll make sure
         *                       it's a navbar on render.
         * @return $this 
         * @static 
         */
        public static function withContent($content)
        {
            return \storecamp\htmlelements\Navbar::withContent($content);
        }
        
        /**
         * Sets the navbar to be inverse
         *
         * @param string $position
         * @param array $attributes
         * @return $this 
         * @static 
         */
        public static function inverse($position = null, $attributes = array())
        {
            return \storecamp\htmlelements\Navbar::inverse($position, $attributes);
        }
        
        /**
         * Sets the position to top
         *
         * @return $this 
         * @static 
         */
        public static function staticTop()
        {
            return \storecamp\htmlelements\Navbar::staticTop();
        }
        
        /**
         * Sets the type of the navbar
         *
         * @param string $type The type of the navbar. Assumes that the navbar-
         *                     prefix is there
         * @return $this 
         * @static 
         */
        public static function setType($type)
        {
            return \storecamp\htmlelements\Navbar::setType($type);
        }
        
        /**
         * Sets the position of the navbar
         *
         * @param string $position The position of the navbar. Assumes that the
         *                         navbar- prefix is there
         * @return $this 
         * @static 
         */
        public static function setPosition($position)
        {
            return \storecamp\htmlelements\Navbar::setPosition($position);
        }
        
        /**
         * 
         *
         * @param string $domId
         * @return $this 
         * @static 
         */
        public static function setId($domId)
        {
            return \storecamp\htmlelements\Navbar::setId($domId);
        }
        
        /**
         * Sets the position of the navbar to the top
         *
         * @return $this 
         * @static 
         */
        public static function top()
        {
            return \storecamp\htmlelements\Navbar::top();
        }
        
        /**
         * Sets the position of the navbar to the bottom
         *
         * @return $this 
         * @static 
         */
        public static function bottom()
        {
            return \storecamp\htmlelements\Navbar::bottom();
        }
        
        /**
         * Creates a navbar with a position and attributes
         *
         * @param string $position The position of the navbar
         * @param array $attributes The attributes of the navbar
         * @return $this 
         * @static 
         */
        public static function create($position, $attributes = array())
        {
            return \storecamp\htmlelements\Navbar::create($position, $attributes);
        }
        
        /**
         * Sets the navbar to be fluid
         *
         * @return $this 
         * @static 
         */
        public static function fluid()
        {
            return \storecamp\htmlelements\Navbar::fluid();
        }
        
        /**
         * Set the attributes of the object
         *
         * @param array $attributes The attributes to use
         * @return $this 
         * @static 
         */
        public static function withAttributes($attributes)
        {
            //Method inherited from \storecamp\htmlelements\RenderedObject            
            return \storecamp\htmlelements\Navbar::withAttributes($attributes);
        }
        
        /**
         * Adds the given classes to attributes
         *
         * @param array $classes
         * @return $this 
         * @static 
         */
        public static function addClass($classes)
        {
            //Method inherited from \storecamp\htmlelements\RenderedObject            
            return \storecamp\htmlelements\Navbar::addClass($classes);
        }
        
    }         

    class Navigation {
        
        /**
         * Renders the navigation object
         *
         * @return string 
         * @static 
         */
        public static function render()
        {
            return \storecamp\htmlelements\Navigation::render();
        }
        
        /**
         * Creates a pills navigation block
         *
         * @param array $links The links
         * @param array $attributes The attributes. Does not overwrite the
         *                          previous values if not set
         * @see storecamp\htmlelements\Navigatation::$links
         * @return $this 
         * @static 
         */
        public static function pills($links = array(), $attributes = null)
        {
            return \storecamp\htmlelements\Navigation::pills($links, $attributes);
        }
        
        /**
         * Sets the links of the navigation object
         *
         * @param array $links The links
         * @return $this 
         * @see storecamp\htmlelements\Navigation::$links
         * @static 
         */
        public static function links($links)
        {
            return \storecamp\htmlelements\Navigation::links($links);
        }
        
        /**
         * Creates a navigation tab object.
         *
         * @param array $links The links to be passed in
         * @param array $attributes The attributes of the navigation object. Will
         *                          overwrite unless not set.
         * @return $this 
         * @static 
         */
        public static function tabs($links = array(), $attributes = null)
        {
            return \storecamp\htmlelements\Navigation::tabs($links, $attributes);
        }
        
        /**
         * Sets the autorouting. Pass false to turn it off, true to turn it on
         *
         * @param bool $autoroute Whether the autorouting should be on
         * @return $this 
         * @static 
         */
        public static function autoroute($autoroute)
        {
            return \storecamp\htmlelements\Navigation::autoroute($autoroute);
        }
        
        /**
         * Turns the navigation object into one for navbars
         *
         * @return $this 
         * @static 
         */
        public static function navbar()
        {
            return \storecamp\htmlelements\Navigation::navbar();
        }
        
        /**
         * Makes the navigation links justified
         *
         * @return $this 
         * @static 
         */
        public static function justified()
        {
            return \storecamp\htmlelements\Navigation::justified();
        }
        
        /**
         * Makes the navigation stacked
         *
         * @return $this 
         * @static 
         */
        public static function stacked()
        {
            return \storecamp\htmlelements\Navigation::stacked();
        }
        
        /**
         * Makes the navigation links float right
         *
         * @return $this 
         * @static 
         */
        public static function right()
        {
            return \storecamp\htmlelements\Navigation::right();
        }
        
        /**
         * Makes the navigation links float left
         *
         * @return $this 
         * @static 
         */
        public static function left()
        {
            return \storecamp\htmlelements\Navigation::left();
        }
        
        /**
         * Set the attributes of the object
         *
         * @param array $attributes The attributes to use
         * @return $this 
         * @static 
         */
        public static function withAttributes($attributes)
        {
            //Method inherited from \storecamp\htmlelements\RenderedObject            
            return \storecamp\htmlelements\Navigation::withAttributes($attributes);
        }
        
        /**
         * Adds the given classes to attributes
         *
         * @param array $classes
         * @return $this 
         * @static 
         */
        public static function addClass($classes)
        {
            //Method inherited from \storecamp\htmlelements\RenderedObject            
            return \storecamp\htmlelements\Navigation::addClass($classes);
        }
        
    }         

    class Panel {
        
        /**
         * Renders the panel
         *
         * @return string 
         * @static 
         */
        public static function render()
        {
            return \storecamp\htmlelements\Panel::render();
        }
        
        /**
         * Creates a primary panel
         *
         * @return $this 
         * @static 
         */
        public static function primary()
        {
            return \storecamp\htmlelements\Panel::primary();
        }
        
        /**
         * Creates a success panel
         *
         * @return $this 
         * @static 
         */
        public static function success()
        {
            return \storecamp\htmlelements\Panel::success();
        }
        
        /**
         * Creates an info panel
         *
         * @return $this 
         * @static 
         */
        public static function info()
        {
            return \storecamp\htmlelements\Panel::info();
        }
        
        /**
         * Creates an warning panel
         *
         * @return $this 
         * @static 
         */
        public static function warning()
        {
            return \storecamp\htmlelements\Panel::warning();
        }
        
        /**
         * Creates an danger panel
         *
         * @return $this 
         * @static 
         */
        public static function danger()
        {
            return \storecamp\htmlelements\Panel::danger();
        }
        
        /**
         * Sets the type of the panel
         *
         * @param string $type The new type. Assume the panel- prefix
         * @return $this 
         * @static 
         */
        public static function setType($type)
        {
            return \storecamp\htmlelements\Panel::setType($type);
        }
        
        /**
         * Sets the header of the panel
         *
         * @param string $header The header
         * @return $this 
         * @static 
         */
        public static function withHeader($header)
        {
            return \storecamp\htmlelements\Panel::withHeader($header);
        }
        
        /**
         * Sets the body of the panel
         *
         * @param string $body The body
         * @return $this 
         * @static 
         */
        public static function withBody($body)
        {
            return \storecamp\htmlelements\Panel::withBody($body);
        }
        
        /**
         * Sets the table of the panel
         *
         * @param string|\Table $table The table
         * @return $this 
         * @static 
         */
        public static function withTable($table)
        {
            return \storecamp\htmlelements\Panel::withTable($table);
        }
        
        /**
         * Sets the footer
         *
         * @param string $footer The new footer
         * @return $this 
         * @static 
         */
        public static function withFooter($footer)
        {
            return \storecamp\htmlelements\Panel::withFooter($footer);
        }
        
        /**
         * Creates a normal panel
         *
         * @return $this 
         * @static 
         */
        public static function normal()
        {
            return \storecamp\htmlelements\Panel::normal();
        }
        
        /**
         * Set the attributes of the object
         *
         * @param array $attributes The attributes to use
         * @return $this 
         * @static 
         */
        public static function withAttributes($attributes)
        {
            //Method inherited from \storecamp\htmlelements\RenderedObject            
            return \storecamp\htmlelements\Panel::withAttributes($attributes);
        }
        
        /**
         * Adds the given classes to attributes
         *
         * @param array $classes
         * @return $this 
         * @static 
         */
        public static function addClass($classes)
        {
            //Method inherited from \storecamp\htmlelements\RenderedObject            
            return \storecamp\htmlelements\Panel::addClass($classes);
        }
        
    }         

    class ProgressBar {
        
        /**
         * Renders the progress bar
         *
         * @return string 
         * @static 
         */
        public static function render()
        {
            return \storecamp\htmlelements\ProgressBar::render();
        }
        
        /**
         * Sets the type of the progress bar
         *
         * @param string $type The type
         * @return $this 
         * @static 
         */
        public static function setType($type)
        {
            return \storecamp\htmlelements\ProgressBar::setType($type);
        }
        
        /**
         * Sets the value of the progress bar
         *
         * @param int $value The value of the progress bar The value of the
         *                   progress bar
         * @return $this 
         * @static 
         */
        public static function value($value)
        {
            return \storecamp\htmlelements\ProgressBar::value($value);
        }
        
        /**
         * Whether the amount should be visible
         *
         * @param string $string The string to show to the user. We internally
         *                       will use sprintf to show this, so you must
         *                       include a %s somewhere so we can add this in
         * @return $this 
         * @static 
         */
        public static function visible($string = '%s%%')
        {
            return \storecamp\htmlelements\ProgressBar::visible($string);
        }
        
        /**
         * Creates a success progress bar
         *
         * @param int $value The value of the progress bar
         * @return $this 
         * @static 
         */
        public static function success($value = 0)
        {
            return \storecamp\htmlelements\ProgressBar::success($value);
        }
        
        /**
         * Creates an info progress bar
         *
         * @param int $value The value of the progress bar
         * @return $this 
         * @static 
         */
        public static function info($value = 0)
        {
            return \storecamp\htmlelements\ProgressBar::info($value);
        }
        
        /**
         * Creates a warning progress bar
         *
         * @param int $value The value of the progress bar
         * @return $this 
         * @static 
         */
        public static function warning($value = 0)
        {
            return \storecamp\htmlelements\ProgressBar::warning($value);
        }
        
        /**
         * Creates a danger progress bar
         *
         * @param int $value The value of the progress bar
         * @return $this 
         * @static 
         */
        public static function danger($value = 0)
        {
            return \storecamp\htmlelements\ProgressBar::danger($value);
        }
        
        /**
         * Creates a normal progress bar
         *
         * @param int $value The value of the progress bar
         * @return $this 
         * @static 
         */
        public static function normal($value = 0)
        {
            return \storecamp\htmlelements\ProgressBar::normal($value);
        }
        
        /**
         * Sets the progress bar to be striped
         *
         * @return $this 
         * @static 
         */
        public static function striped()
        {
            return \storecamp\htmlelements\ProgressBar::striped();
        }
        
        /**
         * Sets the progress bar to be animated
         *
         * @return $this 
         * @static 
         */
        public static function animated()
        {
            return \storecamp\htmlelements\ProgressBar::animated();
        }
        
        /**
         * Stacks several progress bars together
         *
         * @param array $items The progress bars. Should be an array of arrays,
         *                     which are a list of methods and parameters.
         * @return string 
         * @static 
         */
        public static function stack($items)
        {
            return \storecamp\htmlelements\ProgressBar::stack($items);
        }
        
        /**
         * Set the attributes of the object
         *
         * @param array $attributes The attributes to use
         * @return $this 
         * @static 
         */
        public static function withAttributes($attributes)
        {
            //Method inherited from \storecamp\htmlelements\RenderedObject            
            return \storecamp\htmlelements\ProgressBar::withAttributes($attributes);
        }
        
        /**
         * Adds the given classes to attributes
         *
         * @param array $classes
         * @return $this 
         * @static 
         */
        public static function addClass($classes)
        {
            //Method inherited from \storecamp\htmlelements\RenderedObject            
            return \storecamp\htmlelements\ProgressBar::addClass($classes);
        }
        
    }         

    class Tabbable {
        
        /**
         * Renders the tabbable object
         *
         * @return string 
         * @static 
         */
        public static function render()
        {
            return \storecamp\htmlelements\Tabbable::render();
        }
        
        /**
         * Creates content with a tabbed navigation
         *
         * @param array $contents The content
         * @return $this 
         * @see storecamp\htmlelements\Navigation::$contents
         * @static 
         */
        public static function tabs($contents = array())
        {
            return \storecamp\htmlelements\Tabbable::tabs($contents);
        }
        
        /**
         * Creates content with a pill navigation
         *
         * @param array $contents
         * @return $this 
         * @see storecamp\htmlelements\Navigation::$contents
         * @static 
         */
        public static function pills($contents = array())
        {
            return \storecamp\htmlelements\Tabbable::pills($contents);
        }
        
        /**
         * Sets the contents
         *
         * @param array $contents An array of arrays
         * @return $this 
         * @see storecamp\htmlelements\Navigation::$contents
         * @static 
         */
        public static function withContents($contents)
        {
            return \storecamp\htmlelements\Tabbable::withContents($contents);
        }
        
        /**
         * Sets which tab should be active
         *
         * @param int $active
         * @return $this 
         * @static 
         */
        public static function active($active)
        {
            return \storecamp\htmlelements\Tabbable::active($active);
        }
        
        /**
         * Sets the tabbable objects to fade in
         *
         * @return $this 
         * @static 
         */
        public static function fade()
        {
            return \storecamp\htmlelements\Tabbable::fade();
        }
        
        /**
         * Set the attributes of the object
         *
         * @param array $attributes The attributes to use
         * @return $this 
         * @static 
         */
        public static function withAttributes($attributes)
        {
            //Method inherited from \storecamp\htmlelements\RenderedObject            
            return \storecamp\htmlelements\Tabbable::withAttributes($attributes);
        }
        
        /**
         * Adds the given classes to attributes
         *
         * @param array $classes
         * @return $this 
         * @static 
         */
        public static function addClass($classes)
        {
            //Method inherited from \storecamp\htmlelements\RenderedObject            
            return \storecamp\htmlelements\Tabbable::addClass($classes);
        }
        
    }         

    class Table {
        
        /**
         * Renders the table
         *
         * @return string 
         * @static 
         */
        public static function render()
        {
            return \storecamp\htmlelements\Table::render();
        }
        
        /**
         * Sets the table to be striped
         *
         * @return $this 
         * @static 
         */
        public static function striped()
        {
            return \storecamp\htmlelements\Table::striped();
        }
        
        /**
         * Sets the table to be bordered
         *
         * @return $this 
         * @static 
         */
        public static function bordered()
        {
            return \storecamp\htmlelements\Table::bordered();
        }
        
        /**
         * Sets the table to have an active hover state
         *
         * @return $this 
         * @static 
         */
        public static function hover()
        {
            return \storecamp\htmlelements\Table::hover();
        }
        
        /**
         * Sets the table to be condensed
         *
         * @return $this 
         * @static 
         */
        public static function condensed()
        {
            return \storecamp\htmlelements\Table::condensed();
        }
        
        /**
         * Sets the contents of the table
         *
         * @param array|\storecamp\htmlelements\Traversable $contents The contents of the table. We expect
         *                                    either an array of arrays or an
         *                                    array of eloquent models
         * @return $this 
         * @static 
         */
        public static function withContents($contents)
        {
            return \storecamp\htmlelements\Table::withContents($contents);
        }
        
        /**
         * Creates a list of columns to ignore
         *
         * @param array $ignores The ignored columns
         * @return $this 
         * @static 
         */
        public static function ignore($ignores)
        {
            return \storecamp\htmlelements\Table::ignore($ignores);
        }
        
        /**
         * Adds a callback
         *
         * @param string $index The column name for the callback
         * @param callable $function The callback function,
         *                           which should be of the form
         *                           function($column, $row).
         * @return $this 
         * @static 
         */
        public static function callback($index, $function)
        {
            return \storecamp\htmlelements\Table::callback($index, $function);
        }
        
        /**
         * Sets which columns we can return
         *
         * @param array $only
         * @return $this 
         * @static 
         */
        public static function only($only)
        {
            return \storecamp\htmlelements\Table::only($only);
        }
        
        /**
         * Sets content to be rendered in to the table footer
         *
         * @param string $footer
         * @return $this 
         * @static 
         */
        public static function withFooter($footer)
        {
            return \storecamp\htmlelements\Table::withFooter($footer);
        }
        
        /**
         * Uses given class(es) on body TDs.
         *
         * @param mixed $classes The class(es) to apply.
         * @return $this 
         * @static 
         */
        public static function withBodyCellClass($classes)
        {
            return \storecamp\htmlelements\Table::withBodyCellClass($classes);
        }
        
        /**
         * 
         *
         * @static 
         */
        public static function withClassOnCellsInColumn($columns, $classes)
        {
            return \storecamp\htmlelements\Table::withClassOnCellsInColumn($columns, $classes);
        }
        
        /**
         * Set the attributes of the object
         *
         * @param array $attributes The attributes to use
         * @return $this 
         * @static 
         */
        public static function withAttributes($attributes)
        {
            //Method inherited from \storecamp\htmlelements\RenderedObject            
            return \storecamp\htmlelements\Table::withAttributes($attributes);
        }
        
        /**
         * Adds the given classes to attributes
         *
         * @param array $classes
         * @return $this 
         * @static 
         */
        public static function addClass($classes)
        {
            //Method inherited from \storecamp\htmlelements\RenderedObject            
            return \storecamp\htmlelements\Table::addClass($classes);
        }
        
    }         

    class Thumbnail {
        
        /**
         * Renders the thumbnail
         *
         * @return string 
         * @throws ThumbnailException if the image is not specified
         * @static 
         */
        public static function render()
        {
            return \storecamp\htmlelements\Thumbnail::render();
        }
        
        /**
         * Sets the image for the thumbnail
         *
         * @param string $image The image source
         * @param array $attributes The attributes
         * @return $this 
         * @static 
         */
        public static function image($image, $attributes = array())
        {
            return \storecamp\htmlelements\Thumbnail::image($image, $attributes);
        }
        
        /**
         * Sets the caption for the thumbnail
         *
         * @param string $caption The new caption
         * @return $this 
         * @static 
         */
        public static function caption($caption)
        {
            return \storecamp\htmlelements\Thumbnail::caption($caption);
        }
        
        /**
         * Set the attributes of the object
         *
         * @param array $attributes The attributes to use
         * @return $this 
         * @static 
         */
        public static function withAttributes($attributes)
        {
            //Method inherited from \storecamp\htmlelements\RenderedObject            
            return \storecamp\htmlelements\Thumbnail::withAttributes($attributes);
        }
        
        /**
         * Adds the given classes to attributes
         *
         * @param array $classes
         * @return $this 
         * @static 
         */
        public static function addClass($classes)
        {
            //Method inherited from \storecamp\htmlelements\RenderedObject            
            return \storecamp\htmlelements\Thumbnail::addClass($classes);
        }
        
    }         

    class Menu {
        
        /**
         * 
         *
         * @static 
         */
        public static function getFacadeAccessor()
        {
            return \storecamp\htmlelements\Facades\Menu::getFacadeAccessor();
        }
        
        /**
         * Hotswap the underlying instance behind the facade.
         *
         * @param mixed $instance
         * @return void 
         * @static 
         */
        public static function swap($instance)
        {
            //Method inherited from \Illuminate\Support\Facades\Facade            
            \storecamp\htmlelements\Facades\Menu::swap($instance);
        }
        
        /**
         * Convert the facade into a Mockery spy.
         *
         * @return void 
         * @static 
         */
        public static function spy()
        {
            //Method inherited from \Illuminate\Support\Facades\Facade            
            \storecamp\htmlelements\Facades\Menu::spy();
        }
        
        /**
         * Initiate a mock expectation on the facade.
         *
         * @return \Mockery\Expectation 
         * @static 
         */
        public static function shouldReceive()
        {
            //Method inherited from \Illuminate\Support\Facades\Facade            
            return \storecamp\htmlelements\Facades\Menu::shouldReceive();
        }
        
        /**
         * Get the root object behind the facade.
         *
         * @return mixed 
         * @static 
         */
        public static function getFacadeRoot()
        {
            //Method inherited from \Illuminate\Support\Facades\Facade            
            return \storecamp\htmlelements\Facades\Menu::getFacadeRoot();
        }
        
        /**
         * Clear a resolved facade instance.
         *
         * @param string $name
         * @return void 
         * @static 
         */
        public static function clearResolvedInstance($name)
        {
            //Method inherited from \Illuminate\Support\Facades\Facade            
            \storecamp\htmlelements\Facades\Menu::clearResolvedInstance($name);
        }
        
        /**
         * Clear all of the resolved instances.
         *
         * @return void 
         * @static 
         */
        public static function clearResolvedInstances()
        {
            //Method inherited from \Illuminate\Support\Facades\Facade            
            \storecamp\htmlelements\Facades\Menu::clearResolvedInstances();
        }
        
        /**
         * Get the application instance behind the facade.
         *
         * @return \Illuminate\Contracts\Foundation\Application 
         * @static 
         */
        public static function getFacadeApplication()
        {
            //Method inherited from \Illuminate\Support\Facades\Facade            
            return \storecamp\htmlelements\Facades\Menu::getFacadeApplication();
        }
        
        /**
         * Set the application instance.
         *
         * @param \Illuminate\Contracts\Foundation\Application $app
         * @return void 
         * @static 
         */
        public static function setFacadeApplication($app)
        {
            //Method inherited from \Illuminate\Support\Facades\Facade            
            \storecamp\htmlelements\Facades\Menu::setFacadeApplication($app);
        }
        
    }         
}
    
namespace DaveJamesMiller\Breadcrumbs {

    class Facade {
        
        /**
         * 
         *
         * @static 
         */
        public static function register($name, $callback)
        {
            return \DaveJamesMiller\Breadcrumbs\Manager::register($name, $callback);
        }
        
        /**
         * 
         *
         * @static 
         */
        public static function exists($name = null)
        {
            return \DaveJamesMiller\Breadcrumbs\Manager::exists($name);
        }
        
        /**
         * 
         *
         * @static 
         */
        public static function generate($name = null)
        {
            return \DaveJamesMiller\Breadcrumbs\Manager::generate($name);
        }
        
        /**
         * 
         *
         * @static 
         */
        public static function generateArray($name, $params = array())
        {
            return \DaveJamesMiller\Breadcrumbs\Manager::generateArray($name, $params);
        }
        
        /**
         * 
         *
         * @static 
         */
        public static function generateIfExists($name = null)
        {
            return \DaveJamesMiller\Breadcrumbs\Manager::generateIfExists($name);
        }
        
        /**
         * 
         *
         * @static 
         */
        public static function generateIfExistsArray($name, $params = array())
        {
            return \DaveJamesMiller\Breadcrumbs\Manager::generateIfExistsArray($name, $params);
        }
        
        /**
         * 
         *
         * @deprecated Since 3.0.0
         * @see generateIfExistsArray
         * @static 
         */
        public static function generateArrayIfExists()
        {
            return \DaveJamesMiller\Breadcrumbs\Manager::generateArrayIfExists();
        }
        
        /**
         * 
         *
         * @static 
         */
        public static function render($name = null)
        {
            return \DaveJamesMiller\Breadcrumbs\Manager::render($name);
        }
        
        /**
         * 
         *
         * @static 
         */
        public static function renderArray($name, $params = array())
        {
            return \DaveJamesMiller\Breadcrumbs\Manager::renderArray($name, $params);
        }
        
        /**
         * 
         *
         * @static 
         */
        public static function renderIfExists($name = null)
        {
            return \DaveJamesMiller\Breadcrumbs\Manager::renderIfExists($name);
        }
        
        /**
         * 
         *
         * @static 
         */
        public static function renderIfExistsArray($name, $params = array())
        {
            return \DaveJamesMiller\Breadcrumbs\Manager::renderIfExistsArray($name, $params);
        }
        
        /**
         * 
         *
         * @deprecated Since 3.0.0
         * @see renderIfExistsArray
         * @static 
         */
        public static function renderArrayIfExists()
        {
            return \DaveJamesMiller\Breadcrumbs\Manager::renderArrayIfExists();
        }
        
        /**
         * 
         *
         * @static 
         */
        public static function setCurrentRoute($name)
        {
            return \DaveJamesMiller\Breadcrumbs\Manager::setCurrentRoute($name);
        }
        
        /**
         * 
         *
         * @static 
         */
        public static function setCurrentRouteArray($name, $params = array())
        {
            return \DaveJamesMiller\Breadcrumbs\Manager::setCurrentRouteArray($name, $params);
        }
        
        /**
         * 
         *
         * @static 
         */
        public static function clearCurrentRoute()
        {
            return \DaveJamesMiller\Breadcrumbs\Manager::clearCurrentRoute();
        }
        
        /**
         * 
         *
         * @static 
         */
        public static function setView($view)
        {
            return \DaveJamesMiller\Breadcrumbs\Manager::setView($view);
        }
        
    }         
}
    
namespace A6digital\Image\Facades {

    class DefaultProfileImage {
        
        /**
         * 
         *
         * @param string $name
         * @param int $size
         * @param string $background_color
         * @param string $text_color
         * @param string $font_file
         * @return \A6digital\Image\ImageManagerStatic 
         * @throws Exception
         * @static 
         */
        public static function create($name = '', $size = 512, $background_color = '#666', $text_color = '#FFF', $font_file = '../../../font/OpenSans-Semibold.ttf')
        {
            return \A6digital\Image\DefaultProfileImage::create($name, $size, $background_color, $text_color, $font_file);
        }
        
    }         
}
    
namespace Arcanedev\LogViewer\Facades {

    class LogViewer {
        
        /**
         * Get the log levels.
         *
         * @param bool $flip
         * @return array 
         * @static 
         */
        public static function levels($flip = false)
        {
            return \Arcanedev\LogViewer\LogViewer::levels($flip);
        }
        
        /**
         * Get the translated log levels.
         *
         * @param string|null $locale
         * @return array 
         * @static 
         */
        public static function levelsNames($locale = null)
        {
            return \Arcanedev\LogViewer\LogViewer::levelsNames($locale);
        }
        
        /**
         * Set the log storage path.
         *
         * @param string $path
         * @return \Arcanedev\LogViewer\LogViewer 
         * @static 
         */
        public static function setPath($path)
        {
            return \Arcanedev\LogViewer\LogViewer::setPath($path);
        }
        
        /**
         * Get the log pattern.
         *
         * @return string 
         * @static 
         */
        public static function getPattern()
        {
            return \Arcanedev\LogViewer\LogViewer::getPattern();
        }
        
        /**
         * Set the log pattern.
         *
         * @param string $date
         * @param string $prefix
         * @param string $extension
         * @return \Arcanedev\LogViewer\LogViewer 
         * @static 
         */
        public static function setPattern($prefix = 'laravel-', $date = '[0-9][0-9][0-9][0-9]-[0-9][0-9]-[0-9][0-9]', $extension = '.log')
        {
            return \Arcanedev\LogViewer\LogViewer::setPattern($prefix, $date, $extension);
        }
        
        /**
         * Get all logs.
         *
         * @return \Arcanedev\LogViewer\Entities\LogCollection 
         * @static 
         */
        public static function all()
        {
            return \Arcanedev\LogViewer\LogViewer::all();
        }
        
        /**
         * Paginate all logs.
         *
         * @param int $perPage
         * @return \Illuminate\Pagination\LengthAwarePaginator 
         * @static 
         */
        public static function paginate($perPage = 30)
        {
            return \Arcanedev\LogViewer\LogViewer::paginate($perPage);
        }
        
        /**
         * Get a log.
         *
         * @param string $date
         * @return \Arcanedev\LogViewer\Entities\Log 
         * @static 
         */
        public static function get($date)
        {
            return \Arcanedev\LogViewer\LogViewer::get($date);
        }
        
        /**
         * Get the log entries.
         *
         * @param string $date
         * @param string $level
         * @return \Arcanedev\LogViewer\Entities\LogEntryCollection 
         * @static 
         */
        public static function entries($date, $level = 'all')
        {
            return \Arcanedev\LogViewer\LogViewer::entries($date, $level);
        }
        
        /**
         * Download a log file.
         *
         * @param string $date
         * @param string|null $filename
         * @param array $headers
         * @return \Symfony\Component\HttpFoundation\BinaryFileResponse 
         * @static 
         */
        public static function download($date, $filename = null, $headers = array())
        {
            return \Arcanedev\LogViewer\LogViewer::download($date, $filename, $headers);
        }
        
        /**
         * Get logs statistics.
         *
         * @return array 
         * @static 
         */
        public static function stats()
        {
            return \Arcanedev\LogViewer\LogViewer::stats();
        }
        
        /**
         * Get logs statistics table.
         *
         * @param string|null $locale
         * @return \Arcanedev\LogViewer\Tables\StatsTable 
         * @static 
         */
        public static function statsTable($locale = null)
        {
            return \Arcanedev\LogViewer\LogViewer::statsTable($locale);
        }
        
        /**
         * Delete the log.
         *
         * @param string $date
         * @return bool 
         * @static 
         */
        public static function delete($date)
        {
            return \Arcanedev\LogViewer\LogViewer::delete($date);
        }
        
        /**
         * Get all valid log files.
         *
         * @return array 
         * @static 
         */
        public static function files()
        {
            return \Arcanedev\LogViewer\LogViewer::files();
        }
        
        /**
         * List the log files (only dates).
         *
         * @return array 
         * @static 
         */
        public static function dates()
        {
            return \Arcanedev\LogViewer\LogViewer::dates();
        }
        
        /**
         * Get logs count.
         *
         * @return int 
         * @static 
         */
        public static function count()
        {
            return \Arcanedev\LogViewer\LogViewer::count();
        }
        
        /**
         * Get entries total from all logs.
         *
         * @param string $level
         * @return int 
         * @static 
         */
        public static function total($level = 'all')
        {
            return \Arcanedev\LogViewer\LogViewer::total($level);
        }
        
        /**
         * Get logs tree.
         *
         * @param bool $trans
         * @return array 
         * @static 
         */
        public static function tree($trans = false)
        {
            return \Arcanedev\LogViewer\LogViewer::tree($trans);
        }
        
        /**
         * Get logs menu.
         *
         * @param bool $trans
         * @return array 
         * @static 
         */
        public static function menu($trans = true)
        {
            return \Arcanedev\LogViewer\LogViewer::menu($trans);
        }
        
        /**
         * Determine if the log folder is empty or not.
         *
         * @return bool 
         * @static 
         */
        public static function isEmpty()
        {
            return \Arcanedev\LogViewer\LogViewer::isEmpty();
        }
        
        /**
         * Get the LogViewer version.
         *
         * @return string 
         * @static 
         */
        public static function version()
        {
            return \Arcanedev\LogViewer\LogViewer::version();
        }
        
    }         
}
    
namespace That0n3guy\Transliteration\Facades {

    class Transliteration {
        
        /**
         * Transliterates and sanitizes a file name.
         * 
         * The resulting file name has white space replaced with underscores, consists
         * of only US-ASCII characters, and is converted to lowercase (if configured).
         * If multiple files have been submitted as an array, the names will be
         * processed recursively.
         *
         * @param $filename A file name, or an array of file names.
         * @param $source_langcode Optional ISO 639 language code that denotes the language of the input and
         *   is used to apply language-specific variations. If the source language is
         *   not known at the time of transliteration, it is recommended to set this
         *   argument to the site default language to produce consistent results.
         *   Otherwise the current display language will be used.
         * @return \That\app/Core/Repositoriesn3guy\Transliteration\Sanitized file name, or array of sanitized file names.
         * @see language_default()
         * @static 
         */
        public static function clean_filename($filename, $source_langcode = null)
        {
            return \That0n3guy\Transliteration\Transliteration::clean_filename($filename, $source_langcode);
        }
        
        /**
         * Transliterates UTF-8 encoded text to US-ASCII.
         * 
         * Based on Mediawiki's UtfNormal::quickIsNFCVerify().
         *      Swiped from drupal's transliteration module: https://drupal.org/project/transliteration
         *
         * @param $string UTF-8 encoded text input.
         * @param $unknown Replacement string for characters that do not have a suitable ASCII
         *   equivalent.
         * @param $source_langcode Optional ISO 639 language code that denotes the language of the input and
         *   is used to apply language-specific variations. If the source language is
         *   not known at the time of transliteration, it is recommended to set this
         *   argument to the site default language to produce consistent results.
         *   Otherwise the current display language will be used.
         * @return \That\app/Core/Repositoriesn3guy\Transliteration\Transliterated text.
         * @static 
         */
        public static function transliteration_process($string, $unknown = '?', $source_langcode = null)
        {
            return \That0n3guy\Transliteration\Transliteration::transliteration_process($string, $unknown, $source_langcode);
        }
        
        /**
         * Replaces a Unicode character using the transliteration database.
         * 
         * Swiped from drupal's transliteration module: https://drupal.org/project/transliteration
         *
         * @param $ord An ordinal Unicode character code.
         * @param $unknown Replacement string for characters that do not have a suitable ASCII
         *   equivalent.
         * @param $langcode Optional ISO 639 language code that denotes the language of the input and
         *   is used to apply language-specific variations.  Defaults to the current
         *   display language.
         * @return \That\app/Core/Repositoriesn3guy\Transliteration\ASCII replacement character.
         * @static 
         */
        public static function transliteration_replace($ord, $unknown = '?', $langcode = 'eng')
        {
            return \That0n3guy\Transliteration\Transliteration::transliteration_replace($ord, $unknown, $langcode);
        }
        
    }         
}
    
namespace Camroncade\Timezone\Facades {

    class Timezone {
        
        /**
         * 
         *
         * @static 
         */
        public static function selectForm($selected = null, $placeholder = null, $selectAttributes = array(), $optionAttributes = array())
        {
            return \Camroncade\Timezone\Timezone::selectForm($selected, $placeholder, $selectAttributes, $optionAttributes);
        }
        
        /**
         * 
         *
         * @static 
         */
        public static function convertFromUTC($timestamp, $timezone, $format = 'Y-m-d H:i:s')
        {
            return \Camroncade\Timezone\Timezone::convertFromUTC($timestamp, $timezone, $format);
        }
        
        /**
         * 
         *
         * @static 
         */
        public static function convertToUTC($timestamp, $timezone, $format = 'Y-m-d H:i:s')
        {
            return \Camroncade\Timezone\Timezone::convertToUTC($timestamp, $timezone, $format);
        }
        
    }         
}
    
    
namespace {


use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Support\Debug\Dumper;
use Illuminate\Contracts\Support\Htmlable;

if (! function_exists('append_config')) {
    /**
     * Assign high numeric IDs to a config item to force appending.
     *
     * @param  array  $array
     * @return array
     */
    function append_config(array $array)
    {
        $start = 9999;

        foreach ($array as $key => $value) {
            if (is_numeric($key)) {
                $start++;

                $array[$start] = Arr::pull($array, $key);
            }
        }

        return $array;
    }
}

if (! function_exists('array_add')) {
    /**
     * Add an element to an array using "dot" notation if it doesn't exist.
     *
     * @param  array   $array
     * @param  string  $key
     * @param  mixed   $value
     * @return array
     */
    function array_add($array, $key, $value)
    {
        return Arr::add($array, $key, $value);
    }
}

if (! function_exists('array_collapse')) {
    /**
     * Collapse an array of arrays into a single array.
     *
     * @param  array  $array
     * @return array
     */
    function array_collapse($array)
    {
        return Arr::collapse($array);
    }
}

if (! function_exists('array_divide')) {
    /**
     * Divide an array into two arrays. One with keys and the other with values.
     *
     * @param  array  $array
     * @return array
     */
    function array_divide($array)
    {
        return Arr::divide($array);
    }
}

if (! function_exists('array_dot')) {
    /**
     * Flatten a multi-dimensional associative array with dots.
     *
     * @param  array   $array
     * @param  string  $prepend
     * @return array
     */
    function array_dot($array, $prepend = '')
    {
        return Arr::dot($array, $prepend);
    }
}

if (! function_exists('array_except')) {
    /**
     * Get all of the given array except for a specified array of items.
     *
     * @param  array  $array
     * @param  array|string  $keys
     * @return array
     */
    function array_except($array, $keys)
    {
        return Arr::except($array, $keys);
    }
}

if (! function_exists('array_first')) {
    /**
     * Return the first element in an array passing a given truth test.
     *
     * @param  array  $array
     * @param  callable|null  $callback
     * @param  mixed  $default
     * @return mixed
     */
    function array_first($array, callable $callback = null, $default = null)
    {
        return Arr::first($array, $callback, $default);
    }
}

if (! function_exists('array_flatten')) {
    /**
     * Flatten a multi-dimensional array into a single level.
     *
     * @param  array  $array
     * @param  int  $depth
     * @return array
     */
    function array_flatten($array, $depth = INF)
    {
        return Arr::flatten($array, $depth);
    }
}

if (! function_exists('array_forget')) {
    /**
     * Remove one or many array items from a given array using "dot" notation.
     *
     * @param  array  $array
     * @param  array|string  $keys
     * @return void
     */
    function array_forget(&$array, $keys)
    {
        return Arr::forget($array, $keys);
    }
}

if (! function_exists('array_get')) {
    /**
     * Get an item from an array using "dot" notation.
     *
     * @param  \ArrayAccess|array  $array
     * @param  string  $key
     * @param  mixed   $default
     * @return mixed
     */
    function array_get($array, $key, $default = null)
    {
        return Arr::get($array, $key, $default);
    }
}

if (! function_exists('array_has')) {
    /**
     * Check if an item or items exist in an array using "dot" notation.
     *
     * @param  \ArrayAccess|array  $array
     * @param  string|array  $keys
     * @return bool
     */
    function array_has($array, $keys)
    {
        return Arr::has($array, $keys);
    }
}

if (! function_exists('array_last')) {
    /**
     * Return the last element in an array passing a given truth test.
     *
     * @param  array  $array
     * @param  callable|null  $callback
     * @param  mixed  $default
     * @return mixed
     */
    function array_last($array, callable $callback = null, $default = null)
    {
        return Arr::last($array, $callback, $default);
    }
}

if (! function_exists('array_only')) {
    /**
     * Get a subset of the items from the given array.
     *
     * @param  array  $array
     * @param  array|string  $keys
     * @return array
     */
    function array_only($array, $keys)
    {
        return Arr::only($array, $keys);
    }
}

if (! function_exists('array_pluck')) {
    /**
     * Pluck an array of values from an array.
     *
     * @param  array   $array
     * @param  string|array  $value
     * @param  string|array|null  $key
     * @return array
     */
    function array_pluck($array, $value, $key = null)
    {
        return Arr::pluck($array, $value, $key);
    }
}

if (! function_exists('array_prepend')) {
    /**
     * Push an item onto the beginning of an array.
     *
     * @param  array  $array
     * @param  mixed  $value
     * @param  mixed  $key
     * @return array
     */
    function array_prepend($array, $value, $key = null)
    {
        return Arr::prepend($array, $value, $key);
    }
}

if (! function_exists('array_pull')) {
    /**
     * Get a value from the array, and remove it.
     *
     * @param  array   $array
     * @param  string  $key
     * @param  mixed   $default
     * @return mixed
     */
    function array_pull(&$array, $key, $default = null)
    {
        return Arr::pull($array, $key, $default);
    }
}

if (! function_exists('array_set')) {
    /**
     * Set an array item to a given value using "dot" notation.
     *
     * If no key is given to the method, the entire array will be replaced.
     *
     * @param  array   $array
     * @param  string  $key
     * @param  mixed   $value
     * @return array
     */
    function array_set(&$array, $key, $value)
    {
        return Arr::set($array, $key, $value);
    }
}

if (! function_exists('array_sort')) {
    /**
     * Sort the array using the given callback.
     *
     * @param  array  $array
     * @param  callable  $callback
     * @return array
     */
    function array_sort($array, callable $callback)
    {
        return Arr::sort($array, $callback);
    }
}

if (! function_exists('array_sort_recursive')) {
    /**
     * Recursively sort an array by keys and values.
     *
     * @param  array  $array
     * @return array
     */
    function array_sort_recursive($array)
    {
        return Arr::sortRecursive($array);
    }
}

if (! function_exists('array_where')) {
    /**
     * Filter the array using the given callback.
     *
     * @param  array  $array
     * @param  callable  $callback
     * @return array
     */
    function array_where($array, callable $callback)
    {
        return Arr::where($array, $callback);
    }
}

if (! function_exists('camel_case')) {
    /**
     * Convert a value to camel case.
     *
     * @param  string  $value
     * @return string
     */
    function camel_case($value)
    {
        return Str::camel($value);
    }
}

if (! function_exists('class_basename')) {
    /**
     * Get the class "basename" of the given object / class.
     *
     * @param  string|object  $class
     * @return string
     */
    function class_basename($class)
    {
        $class = is_object($class) ? get_class($class) : $class;

        return basename(str_replace('\\', '/', $class));
    }
}

if (! function_exists('class_uses_recursive')) {
    /**
     * Returns all traits used by a class, its subclasses and trait of their traits.
     *
     * @param  object|string  $class
     * @return array
     */
    function class_uses_recursive($class)
    {
        if (is_object($class)) {
            $class = get_class($class);
        }

        $results = [];

        foreach (array_merge([$class => $class], class_parents($class)) as $class) {
            $results += trait_uses_recursive($class);
        }

        return array_unique($results);
    }
}

if (! function_exists('collect')) {
    /**
     * Create a collection from the given value.
     *
     * @param  mixed  $value
     * @return \Illuminate\Support\Collection
     */
    function collect($value = null)
    {
        return new Collection($value);
    }
}

if (! function_exists('data_fill')) {
    /**
     * Fill in data where it's missing.
     *
     * @param  mixed   $target
     * @param  string|array  $key
     * @param  mixed  $value
     * @return mixed
     */
    function data_fill(&$target, $key, $value)
    {
        return data_set($target, $key, $value, false);
    }
}

if (! function_exists('data_get')) {
    /**
     * Get an item from an array or object using "dot" notation.
     *
     * @param  mixed   $target
     * @param  string|array  $key
     * @param  mixed   $default
     * @return mixed
     */
    function data_get($target, $key, $default = null)
    {
        if (is_null($key)) {
            return $target;
        }

        $key = is_array($key) ? $key : explode('.', $key);

        while (! is_null($segment = array_shift($key))) {
            if ($segment === '*') {
                if ($target instanceof Collection) {
                    $target = $target->all();
                } elseif (! is_array($target)) {
                    return value($default);
                }

                $result = Arr::pluck($target, $key);

                return in_array('*', $key) ? Arr::collapse($result) : $result;
            }

            if (Arr::accessible($target) && Arr::exists($target, $segment)) {
                $target = $target[$segment];
            } elseif (is_object($target) && isset($target->{$segment})) {
                $target = $target->{$segment};
            } else {
                return value($default);
            }
        }

        return $target;
    }
}

if (! function_exists('data_set')) {
    /**
     * Set an item on an array or object using dot notation.
     *
     * @param  mixed  $target
     * @param  string|array  $key
     * @param  mixed  $value
     * @param  bool  $overwrite
     * @return mixed
     */
    function data_set(&$target, $key, $value, $overwrite = true)
    {
        $segments = is_array($key) ? $key : explode('.', $key);

        if (($segment = array_shift($segments)) === '*') {
            if (! Arr::accessible($target)) {
                $target = [];
            }

            if ($segments) {
                foreach ($target as &$inner) {
                    data_set($inner, $segments, $value, $overwrite);
                }
            } elseif ($overwrite) {
                foreach ($target as &$inner) {
                    $inner = $value;
                }
            }
        } elseif (Arr::accessible($target)) {
            if ($segments) {
                if (! Arr::exists($target, $segment)) {
                    $target[$segment] = [];
                }

                data_set($target[$segment], $segments, $value, $overwrite);
            } elseif ($overwrite || ! Arr::exists($target, $segment)) {
                $target[$segment] = $value;
            }
        } elseif (is_object($target)) {
            if ($segments) {
                if (! isset($target->{$segment})) {
                    $target->{$segment} = [];
                }

                data_set($target->{$segment}, $segments, $value, $overwrite);
            } elseif ($overwrite || ! isset($target->{$segment})) {
                $target->{$segment} = $value;
            }
        } else {
            $target = [];

            if ($segments) {
                data_set($target[$segment], $segments, $value, $overwrite);
            } elseif ($overwrite) {
                $target[$segment] = $value;
            }
        }

        return $target;
    }
}

if (! function_exists('dd')) {
    /**
     * Dump the passed variables and end the script.
     *
     * @param  mixed
     * @return void
     */
    function dd()
    {
        array_map(function ($x) {
            (new Dumper)->dump($x);
        }, func_get_args());

        die(1);
    }
}

if (! function_exists('e')) {
    /**
     * Escape HTML special characters in a string.
     *
     * @param  \Illuminate\Contracts\Support\Htmlable|string  $value
     * @return string
     */
    function e($value)
    {
        if ($value instanceof Htmlable) {
            return $value->toHtml();
        }

        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8', false);
    }
}

if (! function_exists('ends_with')) {
    /**
     * Determine if a given string ends with a given substring.
     *
     * @param  string  $haystack
     * @param  string|array  $needles
     * @return bool
     */
    function ends_with($haystack, $needles)
    {
        return Str::endsWith($haystack, $needles);
    }
}

if (! function_exists('head')) {
    /**
     * Get the first element of an array. Useful for method chaining.
     *
     * @param  array  $array
     * @return mixed
     */
    function head($array)
    {
        return reset($array);
    }
}

if (! function_exists('last')) {
    /**
     * Get the last element from an array.
     *
     * @param  array  $array
     * @return mixed
     */
    function last($array)
    {
        return end($array);
    }
}

if (! function_exists('object_get')) {
    /**
     * Get an item from an object using "dot" notation.
     *
     * @param  object  $object
     * @param  string  $key
     * @param  mixed   $default
     * @return mixed
     */
    function object_get($object, $key, $default = null)
    {
        if (is_null($key) || trim($key) == '') {
            return $object;
        }

        foreach (explode('.', $key) as $segment) {
            if (! is_object($object) || ! isset($object->{$segment})) {
                return value($default);
            }

            $object = $object->{$segment};
        }

        return $object;
    }
}

if (! function_exists('preg_replace_array')) {
    /**
     * Replace a given pattern with each value in the array in sequentially.
     *
     * @param  string  $pattern
     * @param  array   $replacements
     * @param  string  $subject
     * @return string
     */
    function preg_replace_array($pattern, array $replacements, $subject)
    {
        return preg_replace_callback($pattern, function () use (&$replacements) {
            foreach ($replacements as $key => $value) {
                return array_shift($replacements);
            }
        }, $subject);
    }
}

if (! function_exists('snake_case')) {
    /**
     * Convert a string to snake case.
     *
     * @param  string  $value
     * @param  string  $delimiter
     * @return string
     */
    function snake_case($value, $delimiter = '_')
    {
        return Str::snake($value, $delimiter);
    }
}

if (! function_exists('starts_with')) {
    /**
     * Determine if a given string starts with a given substring.
     *
     * @param  string  $haystack
     * @param  string|array  $needles
     * @return bool
     */
    function starts_with($haystack, $needles)
    {
        return Str::startsWith($haystack, $needles);
    }
}

if (! function_exists('str_contains')) {
    /**
     * Determine if a given string contains a given substring.
     *
     * @param  string  $haystack
     * @param  string|array  $needles
     * @return bool
     */
    function str_contains($haystack, $needles)
    {
        return Str::contains($haystack, $needles);
    }
}

if (! function_exists('str_finish')) {
    /**
     * Cap a string with a single instance of a given value.
     *
     * @param  string  $value
     * @param  string  $cap
     * @return string
     */
    function str_finish($value, $cap)
    {
        return Str::finish($value, $cap);
    }
}

if (! function_exists('str_is')) {
    /**
     * Determine if a given string matches a given pattern.
     *
     * @param  string  $pattern
     * @param  string  $value
     * @return bool
     */
    function str_is($pattern, $value)
    {
        return Str::is($pattern, $value);
    }
}

if (! function_exists('str_limit')) {
    /**
     * Limit the number of characters in a string.
     *
     * @param  string  $value
     * @param  int     $limit
     * @param  string  $end
     * @return string
     */
    function str_limit($value, $limit = 100, $end = '...')
    {
        return Str::limit($value, $limit, $end);
    }
}

if (! function_exists('str_plural')) {
    /**
     * Get the plural form of an English word.
     *
     * @param  string  $value
     * @param  int     $count
     * @return string
     */
    function str_plural($value, $count = 2)
    {
        return Str::plural($value, $count);
    }
}

if (! function_exists('str_random')) {
    /**
     * Generate a more truly "random" alpha-numeric string.
     *
     * @param  int  $length
     * @return string
     *
     * @throws \RuntimeException
     */
    function str_random($length = 16)
    {
        return Str::random($length);
    }
}

if (! function_exists('str_replace_array')) {
    /**
     * Replace a given value in the string sequentially with an array.
     *
     * @param  string  $search
     * @param  array   $replace
     * @param  string  $subject
     * @return string
     */
    function str_replace_array($search, array $replace, $subject)
    {
        return Str::replaceArray($search, $replace, $subject);
    }
}

if (! function_exists('str_replace_first')) {
    /**
     * Replace the first occurrence of a given value in the string.
     *
     * @param  string  $search
     * @param  string  $replace
     * @param  string  $subject
     * @return string
     */
    function str_replace_first($search, $replace, $subject)
    {
        return Str::replaceFirst($search, $replace, $subject);
    }
}

if (! function_exists('str_replace_last')) {
    /**
     * Replace the last occurrence of a given value in the string.
     *
     * @param  string  $search
     * @param  string  $replace
     * @param  string  $subject
     * @return string
     */
    function str_replace_last($search, $replace, $subject)
    {
        return Str::replaceLast($search, $replace, $subject);
    }
}

if (! function_exists('str_singular')) {
    /**
     * Get the singular form of an English word.
     *
     * @param  string  $value
     * @return string
     */
    function str_singular($value)
    {
        return Str::singular($value);
    }
}

if (! function_exists('str_slug')) {
    /**
     * Generate a URL friendly "slug" from a given string.
     *
     * @param  string  $title
     * @param  string  $separator
     * @return string
     */
    function str_slug($title, $separator = '-')
    {
        return Str::slug($title, $separator);
    }
}

if (! function_exists('studly_case')) {
    /**
     * Convert a value to studly caps case.
     *
     * @param  string  $value
     * @return string
     */
    function studly_case($value)
    {
        return Str::studly($value);
    }
}

if (! function_exists('tap')) {
    /**
     * Call the given Closure with the given value then return the value.
     *
     * @param  mixed  $value
     * @param  callable  $callback
     * @return mixed
     */
    function tap($value, $callback)
    {
        $callback($value);

        return $value;
    }
}

if (! function_exists('title_case')) {
    /**
     * Convert a value to title case.
     *
     * @param  string  $value
     * @return string
     */
    function title_case($value)
    {
        return Str::title($value);
    }
}

if (! function_exists('trait_uses_recursive')) {
    /**
     * Returns all traits used by a trait and its traits.
     *
     * @param  string  $trait
     * @return array
     */
    function trait_uses_recursive($trait)
    {
        $traits = class_uses($trait);

        foreach ($traits as $trait) {
            $traits += trait_uses_recursive($trait);
        }

        return $traits;
    }
}

if (! function_exists('value')) {
    /**
     * Return the default value of the given value.
     *
     * @param  mixed  $value
     * @return mixed
     */
    function value($value)
    {
        return $value instanceof Closure ? $value() : $value;
    }
}

if (! function_exists('windows_os')) {
    /**
     * Determine whether the current environment is Windows based.
     *
     * @return bool
     */
    function windows_os()
    {
        return strtolower(substr(PHP_OS, 0, 3)) === 'win';
    }
}

if (! function_exists('with')) {
    /**
     * Return the given object. Useful for chaining.
     *
     * @param  mixed  $object
     * @return mixed
     */
    function with($object)
    {
        return $object;
    }
}

    class App extends \Illuminate\Support\Facades\App {}
    
    class Artisan extends \Illuminate\Support\Facades\Artisan {}
    
    class Auth extends \Illuminate\Support\Facades\Auth {}
    
    class Blade extends \Illuminate\Support\Facades\Blade {}
    
    class Bus extends \Illuminate\Support\Facades\Bus {}
    
    class Cache extends \Illuminate\Support\Facades\Cache {}
    
    class Config extends \Illuminate\Support\Facades\Config {}
    
    class Cookie extends \Illuminate\Support\Facades\Cookie {}
    
    class Crypt extends \Illuminate\Support\Facades\Crypt {}
    
    class DB extends \Illuminate\Support\Facades\DB {}
    
    class Event extends \Illuminate\Support\Facades\Event {}
    
    class File extends \Illuminate\Support\Facades\File {}
    
    class Gate extends \Illuminate\Support\Facades\Gate {}
    
    class Hash extends \Illuminate\Support\Facades\Hash {}
    
    class Lang extends \Illuminate\Support\Facades\Lang {}
    
    class Log extends \Illuminate\Support\Facades\Log {}
    
    class Mail extends \Illuminate\Support\Facades\Mail {}
    
    class Notification extends \Illuminate\Support\Facades\Notification {}
    
    class Password extends \Illuminate\Support\Facades\Password {}
    
    class Queue extends \Illuminate\Support\Facades\Queue {}
    
    class Redirect extends \Illuminate\Support\Facades\Redirect {}
    
    class Redis extends \Illuminate\Support\Facades\Redis {}
    
    class Request extends \Illuminate\Support\Facades\Request {}
    
    class Response extends \Illuminate\Support\Facades\Response {}
    
    class Route extends \Illuminate\Support\Facades\Route {}
    
    class Schema extends \Illuminate\Support\Facades\Schema {}
    
    class Session extends \Illuminate\Support\Facades\Session {}
    
    class Storage extends \Illuminate\Support\Facades\Storage {}
    
    class URL extends \Illuminate\Support\Facades\URL {}
    
    class Validator extends \Illuminate\Support\Facades\Validator {}
    
    class View extends \Illuminate\Support\Facades\View {}
    
    class Eloquent extends \Illuminate\Database\Eloquent\Model {}
    
    class JWTAuth extends \Tymon\JWTAuth\Facades\JWTAuth {}
    
    class JWTFactory extends \Tymon\JWTAuth\Facades\JWTFactory {}
    
    class Youtube extends \App\Core\APIs\Youtube\Facades\Youtube {}
    
    class Form extends \Collective\Html\FormFacade {}
    
    class Html extends \Collective\Html\HtmlFacade {}
    
    class Image extends \Intervention\Image\Facades\Image {}
    
    class Socialite extends \Laravel\Socialite\Facades\Socialite {}
    
    class Access extends \App\Core\Access\AccessFacade {}
    
    class MediaUploader extends \Plank\Mediable\MediaUploaderFacade {}
    
    class Countries extends \Webpatser\Countries\CountriesFacade {}
    
    class Active extends \App\Core\Components\ActiveItem\Facades\Active {}
    
    class Flash extends \App\Core\Components\Flash\Flash {}
    
    class Debugbar extends \Barryvdh\Debugbar\Facade {}
    
    class Toastr extends \nilsenj\Toastr\Facades\Toastr {}
    
    class Hashids extends \Vinkla\Hashids\Facades\Hashids {}
    
    class Accordion extends \storecamp\htmlelements\Facades\Accordion {}
    
    class Alert extends \storecamp\htmlelements\Facades\Alert {}
    
    class Badge extends \storecamp\htmlelements\Facades\Badge {}
    
    class Breadcrumb extends \storecamp\htmlelements\Facades\Breadcrumb {}
    
    class Button extends \storecamp\htmlelements\Facades\Button {}
    
    class ButtonGroup extends \storecamp\htmlelements\Facades\ButtonGroup {}
    
    class Carousel extends \storecamp\htmlelements\Facades\Carousel {}
    
    class ControlGroup extends \storecamp\htmlelements\Facades\ControlGroup {}
    
    class DropdownButton extends \storecamp\htmlelements\Facades\DropdownButton {}
    
    class Forms extends \storecamp\htmlelements\Facades\Form {}
    
    class Helpers extends \storecamp\htmlelements\Facades\Helpers {}
    
    class Icon extends \storecamp\htmlelements\Facades\Icon {}
    
    class InputGroup extends \storecamp\htmlelements\Facades\InputGroup {}
    
    class Images extends \storecamp\htmlelements\Facades\Image {}
    
    class Label extends \storecamp\htmlelements\Facades\Label {}
    
    class MediaObject extends \storecamp\htmlelements\Facades\MediaObject {}
    
    class Modal extends \storecamp\htmlelements\Facades\Modal {}
    
    class Navbar extends \storecamp\htmlelements\Facades\Navbar {}
    
    class Navigation extends \storecamp\htmlelements\Facades\Navigation {}
    
    class Panel extends \storecamp\htmlelements\Facades\Panel {}
    
    class ProgressBar extends \storecamp\htmlelements\Facades\ProgressBar {}
    
    class Tabbable extends \storecamp\htmlelements\Facades\Tabbable {}
    
    class Table extends \storecamp\htmlelements\Facades\Table {}
    
    class Thumbnail extends \storecamp\htmlelements\Facades\Thumbnail {}
    
    class Menu extends \storecamp\htmlelements\Facades\Menu {}
    
    class Breadcrumbs extends \DaveJamesMiller\Breadcrumbs\Facade {}
    
    class DefaultProfileImage extends \A6digital\Image\Facades\DefaultProfileImage {}
    
    class LogViewer extends \Arcanedev\LogViewer\Facades\LogViewer {}
    
    class Transliteration extends \That0n3guy\Transliteration\Facades\Transliteration {}
    
    class Timezone extends \Camroncade\Timezone\Facades\Timezone {}
    
}

