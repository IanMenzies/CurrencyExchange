<?php namespace App\Services\Validation;

use Illuminate\Validation\Validator;
use Config;

/**
 * This class extends the validator class to 
 * add new validation rules to be performed against th currency exchange
 */
class ExtendedValidator extends Validator 
{
	/**
	 * Created a new instance of the Validator class enabling us to extend it
	 */
	public function __construct($translator, $data, $rules, $messages = array(), $customAttributes = array()) {
        parent::__construct($translator, $data, $rules, $messages, $customAttributes);
    }

    /**
     * Validates a currency code
     *
     * @param string $attribute
     * @param string $value
     * @param array $parameters
     * @return bool
     */
	public function validateCurrencyCode($attribute, $value, $parameters)
	{
		//Get's all currency codes from the config
		$validCurrencyCodes = array_keys(Config::get('app.currency_codes'));
		return in_array($value, $validCurrencyCodes) ? TRUE : FALSE;
	}

    /**
     * Validates a currency total ensuring the amount 
     * is allowed and the range is valid
     * 
     * @param string $attribute
     * @param string $value
     * @param array $parameters
     * @return bool
     */
	public function validateCurrencyTotal($attribute, $value, $parameters) 
	{
		return (is_float($value) && !($value > "100000") && !($value <= 0)) ? TRUE : FALSE;
	}

    /**
     * Validates a currency rate ensuring the amount 
     * is allowed and the range is valid
     * 
     * @param string $attribute
     * @param string $value
     * @param array $parameters
     * @return bool
     */
	public function validateCurrencyRate($attribute, $value, $parameters) 
	{
		return (is_float($value) && !($value > "100") && !($value <= 0)) ? TRUE : FALSE;
	}

    /**
     * Validates the originating country
     * 
     * @param string $attribute
     * @param string $value
     * @param array $parameters
     * @return bool
     */
	public function validateOriginatingCountry($attribute, $value, $parameters)
	{
		//Get's all locales from the config file
		$validOriginatingCountry = Config::get('app.countries');

		return in_array($value, $validOriginatingCountry) ? TRUE : FALSE;
	}

	/** CREATE MORE VALIDATION RULES **/
}  
