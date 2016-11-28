<?php namespace LasseRafn\PipedriveSignup;

use Illuminate\Support\ServiceProvider;

class PipedriveSignupServiceProvider extends ServiceProvider
{
	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = true;

	/**
	 * Boot
	 */
	public function boot()
	{
		$configPath = __DIR__ . '/config/pipedrive-signup.php';
		$this->mergeConfigFrom($configPath, 'pipedrive-signup');

		$configPath = __DIR__ . '/config/pipedrive-signup.php';

		if (function_exists('config_path')) {
			$publishPath = config_path('pipedrive-signup.php');
		} else {
			$publishPath = base_path('config/pipedrive-signup.php');
		}

		$this->publishes([$configPath => $publishPath], 'config');
	}
}