<?php namespace App\Services\Module\CurrencyExchange;

use App\Helper\CurrencyExchangeHelper;
use App\Events\AddCurrencyExchangeTrendToRealTimeApplication;
use Illuminate\Events\Dispatcher;
use Redis;

/**
 * This class enables us to perform the key business rules of the app
 * as well as preparing and rendering the data to the view.
 */
class CurrencyExchangeFacade 
{
	/* instance of a currency Exchange helper */
	protected $currencyExchangeHelper;

	public function __construct(CurrencyExchangeHelper $currencyExchangeHelper)
	{
		$this->currencyExchangeHelper = $currencyExchangeHelper;
	}

	/**
	 * Determines if theres a trend with a
	 * currency exchange request
	 * 
	 * @param array $currencyExchangeData
	 * @return array $currencyexchangeData
	 */
	public function checkCurrencyExchangeForTrend($currencyExchangeData)
	{
		return $this->currencyExchangeHelper->checkCurrencyExchangeForTrend($currencyExchangeData);	
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
		$redis = Redis::connection();

		//TODO move this to single request to reduce overheads and network traffic
		if (isset($currencyExchangeData['highPurchase'])) {
			$redis->publish('currencyexchange.highpurchase', 'true');
		} else {
			$redis->publish('currencyexchange.highpurchase', 'false');
		}

		if (isset($currencyExchangeData['mainCurrencyPurchase'])) {
			$redis->publish('currencyexchange.maincurrencypurchase', 'true');
		}

		if (isset($currencyExchangeData['mainCurrencySale'])) {
			$redis->publish('currencyexchange.maincurrencysale', 'true');
		}
	}
}