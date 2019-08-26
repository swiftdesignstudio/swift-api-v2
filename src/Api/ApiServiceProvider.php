<?php 

namespace SwiftDesign\Api\Api;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ApiServiceProvider extends LaravelServiceProvider {

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
    
    public function boot() {

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {

        //Register API
        $this->registerAPI();
    }

    protected function registerAPI()
    {
        include __DIR__.'/routes.php';
    }
}
