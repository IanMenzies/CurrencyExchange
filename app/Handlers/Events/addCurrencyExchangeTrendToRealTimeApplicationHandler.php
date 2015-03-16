<?php namespace App\Handlers\Events;

use App\Events\AddCurrencyExchangeTrendToRealTimeApplication;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class AddCurrencyExchangeTrendToRealTimeApplicationHandler {

	/**
	 * Create the event handler.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Handle the event.
	 *
	 * @param  addCurrencyExchangeTrendToRealTimeApplication  $event
	 * @return void
	 */
	public function handle(addCurrencyExchangeTrendToRealTimeApplication $event)
	{
		//TODO push the currency exchange data to here
	}

}
