<?php namespace App\Events;

use App\Events\Event;

use Illuminate\Queue\SerializesModels;

class AddCurrencyExchangeTrendToRealTimeApplication extends Event {

	use SerializesModels;

	protected $currencyExchangeData;

	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */
	public function __construct($currencyExchangeData)
	{
		$this->currencyExchangeData = $currencyExchangeData;
	}

}
