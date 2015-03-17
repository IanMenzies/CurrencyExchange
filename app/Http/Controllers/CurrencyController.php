<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Commands\ProcessCurrencyExchangeCommand;
use Log;
use CurrencyExchangeValidator;

class CurrencyController extends Controller {
	/** http bad request code **/
	const HTTP_BAD_REQUEST = 400;
	/** http response code for succesful request **/
	const HTTP_OK_REQUEST  = 200;

	/**
	 * Deals with the JSON request to convert currency
	 *
	 * @return Request
	 */
	public function currencyExchangeRequest(Request $request)
	{
		//Ensure more than x amount of request by the same
		//user has not been performed  
		$this->middleware('RateLimiter');

		//Check's to see if the Request is json formatted
		if (!$request->isJson()) {
			Log::error('Invalid JSON request');

			//return a response notifying the user that
			//request has failed it was not formatted in JSON
			return $this->response(self::HTTP_BAD_REQUEST, "Request must be a JSON object");
		}

		$request = $request->instance()->getContent();
		$currencyExchangeData = get_object_vars(json_decode($request));

		//Validate the currency exchange request to ensure its valid
		$currencyExchangeValidationFailureMessages = 
			CurrencyExchangeValidator::validateCurrencyExchangeRequest($currencyExchangeData);

		//If the currency exchange request is invalid
		if (!empty($currencyExchangeValidationFailureMessages)) {
			//return json failure message, status code 400
			return $this->response(
				self::HTTP_BAD_REQUEST, json_encode($currencyExchangeValidationFailureMessages)
			);
		}

		try {
			//Dispatch the currency exchange request to the queue to be processed
			$this->dispatch(new ProcessCurrencyExchangeCommand($currencyExchangeData));
		} catch(\Exception $e) {
			Log::error('Currency exchange process Error:' . $e);

			//return json failure message, status code 400
			return $this->response(self::HTTP_BAD_REQUEST, "Issue with processing request please try again");
		}

		//return json success message, status code 200
		return $this->response(self::HTTP_OK_REQUEST, "Currency exchange request approved");
	}

	/**
	 * Deals with the formatting of a response
	 *
	 * @param int $statusCode
	 * @param string message
	 * @return Response 
	 */
	protected function response($statusCode, $message)
	{
		return (new Response([
			"status"   => ($statusCode == self::HTTP_OK_REQUEST) ? "Success" : "Failure",
			"messages" => $message
		], $statusCode))->header('Content-Type', 'application/json');
	}
}
