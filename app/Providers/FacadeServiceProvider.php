<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Module\CurrencyExchange\CurrencyExchangeFacade;

class FacadeServiceProvider extends ServiceProvider {

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
      $this->app->bind('CurrencyExchangeFacade', function() {
        return new CurrencyExchangeFacade();
      });
   }

}