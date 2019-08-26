<?php 

namespace SwiftDesign\Api\Blog;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class BlogServiceProvider extends LaravelServiceProvider {

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
        //Register Blog API 
        $this->registerBlog();
    }

    protected function registerBlog()
    {
        include __DIR__.'/routes.php';
    }
}
