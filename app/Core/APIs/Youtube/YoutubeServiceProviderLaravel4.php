<?php 

namespace App\Core\APIs\Youtube;

use Config;
use App\Core\APIs\Youtube\Youtube;
use Illuminate\Support\ServiceProvider;


class YoutubeServiceProviderLaravel4 extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = true;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('youtuebApis/php-youtube-api');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bindShared('App\Core\APIs\Youtube\Youtube', function($app){
			return new Youtube($app['config']->get('php-youtube-api::youtube'));
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('App\Core\APIs\Youtube\Youtube');
	}

}
