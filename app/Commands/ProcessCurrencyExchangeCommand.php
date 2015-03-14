<?php namespace App\Commands;

use App\Commands\Command;

use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

/**
 * This is where a currency exchange request is queued.
 * Requests are handle through parallel processing reducing
 * CPU/Overheads enable the app to handle large amounts of processes
 */
class ProcessCurrencyExchangeCommand extends Command implements ShouldBeQueued 
{
	/** allows us to interact with a queue **/
	use InteractsWithQueue;

	/** currencyExchangeData array **/
	public $currencyExchangeData;

	public function __construct($currencyExchangeData)
	{
		$this->currencyExchangeData = $currencyExchangeData;
	}
}
