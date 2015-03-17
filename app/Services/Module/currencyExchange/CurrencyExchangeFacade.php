<?php namespace App\Services\Module\CurrencyExchange;

use Illuminate\Events\Dispatcher;
use Redis;
use Helper;

/**
 * This class enables us to perform the key business rules of the app
 * as well as preparing and rendering the data to the view.
 */
class CurrencyExchangeFacade 
{
	/**
	 * Determines if theres a trend with a
	 * currency exchange request
	 * 
	 * @param array $currencyExchangeData
	 * @return array $currencyexchangeData
	 */
	public function checkCurrencyExchangeForTrend($currencyExchangeData)
	{
		return Helper::checkCurrencyExchangeForTrend($currencyExchangeData);
	}

	/**
	 * Builds the currency data for a graph
	 * 
	 * @param array $currencyData
	 * @param array $currencyExchangeData
	 * @return obj $currency
	 */
	public function buildCurrencyObjectForView($currencyExchangeData)
	{
		return $currencyExchangeData;
	}

	/**
	 * Adds currency data to redis cache
	 * allowing the application to render 
	 * the data in a realtime graph 
	 *
	 * @param array $currencyExchangeData
	 */
	public function addCurrencyExchangeTrendToRealTimeApplication($currencyExchangeData)
	{
		//TODO::This shouldn't be in the facade! Move to an event.
		$redis = Redis::connection();
		if (!empty($currencyExchangeData)) {
 			$redis->publish('currencyexchange.graphtrend', json_encode($currencyExchangeData));
 		}
	}
}