<?php namespace Cryoutsolutions\paypalrecuringpaymentscreditcard;

use Illuminate\Support\ServiceProvider;

class PaypalRecuringPaymentsCreditCardServiceProvider extends ServiceProvider {

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
        $this->package('cryoutsolutions\paypalrecuringpaymentscreditcard');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['paypalrecuringpaymentscreditcard'] = $this->app->share(function($app)
        {
            return new Facades\PaypalRecuringPaymentsCreditCard;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('paypalrecuringpaymentscreditcard');
    }

}
