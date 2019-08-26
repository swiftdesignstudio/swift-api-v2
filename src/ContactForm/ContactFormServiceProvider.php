<?php 

namespace SwiftDesign\Api\ContactForm;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ContactFormServiceProvider extends LaravelServiceProvider {

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

        //Register Contact Form 
        $this->registerContactForm();

        $this->app->register(
            'Anhskohbo\NoCaptcha\NoCaptchaServiceProvider'
        );

        $this->app->alias('Anhskohbo\NoCaptcha\NoCaptchaServiceProvider','NoCaptcha');
    }

    protected function registerContactForm()
    {
        include __DIR__.'/routes.php';
    }

    public function provides()
    {
        return [
            Anhskohbo\NoCaptcha\NoCaptchaServiceProvider::class,
            'NoCaptcha',
        ];
    }
}
