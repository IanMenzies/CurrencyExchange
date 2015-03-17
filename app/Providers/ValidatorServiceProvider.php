<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;
use App\Services\Validation\ExtendedValidator;
use App\Services\Module\CurrencyExchange\CurrencyExchangeValidator;

class ValidatorServiceProvider extends ServiceProvider {

 /**
  * Bootstrap any necessary services.
  *
  * @return App\Services\Validation\ExtendedValidator 
  */
  public function boot()
  {
    Validator::resolver(function($translator, $data, $rules, $messages)
    {
      return new ExtendedValidator($translator, $data, $rules, $messages);
    });
  }

  /**
   * Register the service provider.
   *
   * @return void
   */
   public function register()
   {
      $this->app->singleton('CurrencyExchangeValidator', function() {
        return new CurrencyExchangeValidator();
      });
   }

}