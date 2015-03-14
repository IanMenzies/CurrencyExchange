<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helper\CurrencyExchangeHelper;

class HelperServiceProvider extends ServiceProvider 
{

  protected $defer = true;

 /**
  * Bootstrap any necessary services.
  *
  * @return void
  */
  public function boot()
  {

  }

  /**
   * Register the service provider.
   *
   * @return void
   */
   public function register()
   {
      $this->app->bind('Helper\CurrencyExchangeHelper', function($app) {
        return new CurrencyExchangeHelper();
      });
   }

   public function provides()
   {
      return ['Helper\CurrencyExchangeHelper'];
   }

}