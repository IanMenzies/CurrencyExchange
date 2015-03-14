<?php namespace App\Services\Module\currencyExchange;

use Validator;
/**
 * The currency exchange validator with validating a request
 */
class currencyValidator 
{
	/** we define rules for our custom rules here **/
	protected $messages = array(
		"currency_total" => ":attribute must be a valid float",
		"currency_rate"  => ":attribute must be a valid float",
		"currency_code"  => ":attribute must be a valid code",
	);

	/**
	 * Outlines the rules to be performed 
	 * on each request given the param name
	 * @return void
	 */
	protected static function currencyRules()
	{
		return array(
			"userId"             => "required|integer|max:1000000",
			"currencyFrom"       => "required|CurrencyCode",
			"currencyTo"         => "required|CurrencyCode",
			"amountSell"         => "required|CurrencyTotal",
			"amountBuy"          => "required|CurrencyTotal",
			"rate"               => "required|CurrencyRate",
			"timePlaced"         => "required|date|date_format:d-M-y H:i:s|after:" . date("d-M-Y"),
			"originatingCountry" => "required|OriginatingCountry" 
		);
	}

	/**
	 * Performs the validaton of a currency exchange request
	 * 
	 * @param array $currencyData
	 * @return array $formattedErrorMessage
	 */
	public function validateCurrencyExchangeRequest(array $currencyData)
	{
		$validator = Validator::make($currencyData, $this->currencyRules(), $this->messages);

		return $this->mapCurrencyExhangeErrors($validator);
	}

	/**
	 * This method deals with mapping the errors returned
	 * from validating a currency exchange request
	 * 
	 * @param Validator $validator
	 * @return array $formattedErrorMessages
	 */
	public function mapCurrencyExhangeErrors($validator)
	{
		$formattedErrorMessage = array();

		//if the validation fails map the error to the relevant field
		if ($validator->fails()) {
			foreach (array_keys($this->currencyRules()) as $field)
			{
				//gets the first error for a param name
				$errorMessage = $validator->messages()->first($field);
				//if an error message is present 
				//assign it to the formatted error messages array
				if (!empty($errorMessage)) {
					$formattedErrorMessage[$field] = $errorMessage;
				}
			} 
		}

		//return the errors
		return $formattedErrorMessage;
	}
}