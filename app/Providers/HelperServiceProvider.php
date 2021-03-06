<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helpers\CurrencyExchangeHelper;

class HelperServiceProvider extends ServiceProvider 
{

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
      $this->app->bind('CurrencyExchangeHelper', function() {
        return new CurrencyExchangeHelper();
      });
   }

}