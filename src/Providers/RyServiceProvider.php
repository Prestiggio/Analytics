<?php

namespace Ry\Analytics\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;
use Ry\Analytics\Console\Commands\Slugify;
use Ry\Analytics\Slugger;
use Ry\Analytics\Matcher;

class RyServiceProvider extends ServiceProvider
{
	/**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
    	parent::boot();
    	/*
    	$this->publishes([    			
    			__DIR__.'/../config/ryanalytics.php' => config_path('ryanalytics.php')
    	], "config");  
    	$this->mergeConfigFrom(
	        	__DIR__.'/../config/ryanalytics.php', 'ryanalytics'
	    );
    	$this->publishes([
    			__DIR__.'/../assets' => public_path('vendor/ryanalytics'),
    	], "public");    	
    	*/
    	//ressources
    	$this->loadViewsFrom(__DIR__.'/../ressources/views', 'ryanalytics');
    	$this->loadTranslationsFrom(__DIR__.'/../ressources/lang', 'ryanalytics');
    	/*
    	$this->publishes([
    			__DIR__.'/../ressources/views' => resource_path('views/vendor/ryanalytics'),
    			__DIR__.'/../ressources/lang' => resource_path('lang/vendor/ryanalytics'),
    	], "ressources");
    	*/
    	$this->publishes([
    			__DIR__.'/../database/factories/' => database_path('factories'),
	        	__DIR__.'/../database/migrations/' => database_path('migrations')
	    ], 'migrations');
    	$this->map();
    	//$kernel = $this->app['Illuminate\Contracts\Http\Kernel'];
    	//$kernel->pushMiddleware('Ry\Facebook\Http\Middleware\Facebook');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
    	
    	$this->app->register(\Ry\Categories\Providers\RyServiceProvider::class);
    	
    	$this->app->singleton("ryanalytics.slygify", function($app){
    		return new Slugify();
    	});
    	
    	$this->app->singleton("ryanalytics.slug", function($app){
    		return new Slugger();
    	});
    	
    	$this->app->singleton("ryanalytics.matcher", function($app){
    		return new Matcher();
    	});
    	
    	$this->commands(["ryanalytics.slygify"]);
    	
    }
    public function map()
    {    	
    	if (! $this->app->routesAreCached()) {
    		$this->app['router']->group(['namespace' => 'Ry\Analytics\Http\Controllers'], function(){
    			require __DIR__.'/../Http/routes.php';
    		});
    	}
    }
}