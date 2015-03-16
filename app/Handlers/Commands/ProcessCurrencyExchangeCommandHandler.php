<?php namespace App\Handlers\Commands;

use App\Commands\ProcessCurrencyExchangeCommand;

use Illuminate\Queue\InteractsWithQueue;
use App\Services\Module\currencyExchange\CurrencyExchangeFacade;
use Log;

/**
 * This is where processes in the queue's handled and forwarded
 * onto the currency facade to be rendered for the view.
 */
class ProcessCurrencyExchangeCommandHandler 
{
	/** instance of currency exchange facade**/
	protected $currencyExchangeFacade;

	public function __construct(CurrencyExchangeFacade $currencyExchangeFacade)
	{
		$this->currencyExchangeFacade = $currencyExchangeFacade;
	}

	/** 
	 * This handler deals with a job from a queue.
	 * @param obj processExchangeCurrencyCommand $job
	 */
	public function handle(ProcessCurrencyExchangeCommand $job)
	{
		//If the job has failed to be completed after four attempts
		if ($job->attempts() > 4) {
			//this can also be retrieved in the redis-cli	
			Log::error('Queue job failure in process currency exchange id:' . $job->id());
			//Remove the job from the queue
			$job->delete();
		} else {

			//build the currency exchange request for the view/graphs
			$currencyExchangeData = $this->currencyExchangeFacade->buildCurrencyObjectForView($job->currencyExchangeData);
			//determines if theres any trends within the currencyexchange request
			$currencyExchangeData = $this->currencyExchangeFacade->checkCurrencyExchangeForTrend($currencyExchangeData);

			try {
				//processed the currency exchange in real time for the view
				$this->currencyExchangeFacade->addCurrencyExchangeTrendToRealTimeApplication($currencyExchangeData);
			//We can save the currency exchange to the DB here in the future if needs be
			} catch (Exception $e) {
				//if there was an issue with performing the above 3 steps log an error
				Log::error('Issue rendering data for the graph/view:' . $e);
			}
		}
		
		$job->delete();
		//Performs the next job in 5 seconds.
		$job->release(5);
	}	

}