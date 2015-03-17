<?php namespace App\Helpers;

/**
 * The currency exchange helper is used to derive patterns
 * from a currency exchange request.
 */
class CurrencyExchangeHelper
{
	protected static $currencySold;

	protected static $currencyBought;

	protected $currencyExchangeData;

	protected $mainCurrencies = array("USD", "GBP", "EUR");

	/**
	 * This method checks for currency trends 
	 * in a currency exchange request
	 * 
	 * @param array $currencyExchangeData
	 * @return array $currencyExchangeData
	 */
	public function checkCurrencyExchangeForTrend($currencyExchangeData)
	{
		$this->currencyExchangeData = $currencyExchangeData;
		$currencyExchangeData["highPurchase"]         = $this->isPurchaseOverXAmount();
		$currencyExchangeData["mainCurrencyPurchase"] = $this->isPurchaseInMainCurrencies();
		$currencyExchangeData["mainCurrencySale"]     = $this->isSaleInMainCurrencies();	

		return $currencyExchangeData;
	}

	/**
	 * Determines if the purchase amount is over
	 * the daily average
	 * 
	 * @return bool
	 */
	protected function isPurchaseOverXAmount()
	{
		return ($this->currencyExchangeData["amountSell"] >= 10 ) ? TRUE : FALSE;
	}

	/**
	 * Determines if the purchase was made
	 * in one of the main currencies
	 *
	 * @return bool
	 */
	protected function isPurchaseInMainCurrencies()
	{
		return (
			in_array(
				$this->currencyExchangeData["currencyFrom"], 
				$this->mainCurrencies
				)
			) ? TRUE : FALSE;
	}

	/**
	 * Determines if the sale was made
	 * in one of the main currencies
	 * 
	 * @return bool
	 */
	protected function isSaleInMainCurrencies()
	{
		return (
			in_array(
				$this->currencyExchangeData["currencyTo"], 
				$this->mainCurrencies
				)
			) ? TRUE : FALSE;
	}
}