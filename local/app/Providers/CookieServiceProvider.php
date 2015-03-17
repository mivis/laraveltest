<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CookieServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind('\App\Libs\Cookie'); //bind - всегда будет создаваться столько обьектов, сколько раз мы будем обращаться
	}

}