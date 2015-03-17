<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Application Debug Mode
	|--------------------------------------------------------------------------
	|
	| When your application is in debug mode, detailed error messages with
	| stack traces will be shown on every error that occurs within your
	| application. If disabled, a simple generic error page is shown.
	|
	*/

	'debug' => true,

	/*
	|--------------------------------------------------------------------------
	| Application URL
	|--------------------------------------------------------------------------
	|
	| This URL is used by the console to properly generate URLs when using
	| the Artisan command line tool. You should set this to the root of
	| your application so that it is used when running Artisan tasks.
	|
	*/

	'url' => 'http://localhost',

	/*
	|--------------------------------------------------------------------------
	| Application Timezone
	|--------------------------------------------------------------------------
	|
	| Here you may specify the default timezone for your application, which
	| will be used by the PHP date and date-time functions. We have gone
	| ahead and set this to a sensible default for you out of the box.
	|
	*/

	'timezone' => 'UTC',

	/*
	|--------------------------------------------------------------------------
	| Application Locale Configuration
	|--------------------------------------------------------------------------
	|
	| The application locale determines the default locale that will be used
	| by the translation service provider. You are free to set this value
	| to any of the locales which will be supported by the application.
	|
	*/

	'locale' => 'en',



	/*
	|--------------------------------------------------------------------------
	| Application Currency codes
	|--------------------------------------------------------------------------
	|
	| As currency codes will never change I've placed them in the congif file to 
	| be accessible across the site.
	*/

	'currency_codes' => [
		'AFA' => 'Afghan Afghani',
    	'AWG' => 'Aruban Florin',
    	'AUD' => 'Australian Dollars',
    	'ARS' => 'Argentine Pes',
    	'AZN' => 'Azerbaijanian Manat',
    	'BSD' => 'Bahamian Dollar',
    	'BDT' => 'Bangladeshi Taka',
    	'BBD' => 'Barbados Dollar',
    	'BYR' => 'Belarussian Rouble',
    	'BOB' => 'Bolivian Boliviano',
    	'BRL' => 'Brazilian Real',
    	'GBP' => 'British Pounds Sterling',
    	'BGN' => 'Bulgarian Lev',
    	'KHR' => 'Cambodia Riel',
    	'CAD' => 'Canadian Dollars',
    	'KYD' => 'Cayman Islands Dollar',
    	'CLP' => 'Chilean Peso',
    	'CNY' => 'Chinese Renminbi Yuan',
    	'COP' => 'Colombian Peso',
    	'CRC' => 'Costa Rican Colon',
    	'HRK' => 'Croatia Kuna',
    	'CPY' => 'Cypriot Pounds',
    	'CZK' => 'Czech Koruna',
    	'DKK' => 'Danish Krone', 
    	'DOP' => 'Dominican Republic Peso', 
    	'XCD' => 'East Caribbean Dollar',
    	'EGP' => 'Egyptian Pound',
    	'ERN' => 'Eritrean Nakfa',
    	'EEK' => 'Estonia Kroon',
    	'EUR' => 'Euro',
    	'GEL' => 'Georgian Lari',
    	'GHC' => 'Ghana Cedi',
    	'GIP' => 'Gibraltar Pound',
    	'GTQ' => 'Guatemala Quetzal',
    	'HNL' => 'Honduras Lempira',
    	'HKD' => 'Hong Kong Dollars',
    	'HUF' => 'Hungary Forint',
    	'ISK' => 'Icelandic Krona',
    	'INR' => 'Indian Rupee',
    	'IDR' => 'Indonesia Rupiah',
    	'ILS' => 'Israel Shekel',
    	'JMD' => 'Jamaican Dollar',
    	'JPY' => 'Japanese yen',
    	'KZT' => 'Kazakhstan Tenge',
    	'KES' => 'Kenyan Shilling',
    	'KWD' => 'Kuwaiti Dinar',
    	'LVL' => 'Latvia Lat',
    	'LBP' => 'Lebanese Pound',
    	'LTL' => 'Lithuania Litas',
    	'MOP' => 'Macau Pataca',
    	'MKD' => 'Macedonian Denar',
    	'MGA' => 'Malagascy Ariary',
    	'MYR' => 'Malaysian Ringgit',
    	'MTL' => 'Maltese Lira',
    	'BAM' => 'Marka',
    	'MUR' => 'Mauritius Rupee',
    	'MXN' => 'Mexican Pesos',
    	'MZM' => 'Mozambique Metical',
    	'NPR' => 'Nepalese Rupee',
    	'ANG' => 'Netherlands Antilles Guilder',
    	'TWD' => 'New Taiwanese Dollars',
    	'NZD' => 'New Zealand Dollars',
    	'NIO' => 'Nicaragua Cordoba',
    	'NGN' => 'Nigeria Naira',
    	'KPW' => 'North Korean Won',
    	'NOK' => 'Norwegian Krone',
    	'OMR' => 'Omani Riyal',
 	   	'PKR' => 'Pakistani Rupee',
    	'PYG' => 'Paraguay Guarani',
    	'PEN' => 'Peru New Sol',
    	'PHP' => 'Philippine Pesos',
    	'QAR' => 'Qatari Riyal',
    	'RON' => 'Romanian New Leu',
    	'RUB' => 'Russian Federation Ruble',
   		'SAR' => 'Saudi Riyal',
    	'CSD' => 'Serbian Dinar',
    	'SCR' => 'Seychelles Rupee',
    	'SGD' => 'Singapore Dollars',
    	'SKK' => 'Slovak Koruna',
    	'SIT' => 'Slovenia Tolar',
    	'ZAR' => 'South African Rand',
    	'KRW' => 'South Korean Won',
    	'LKR' => 'Sri Lankan Rupee',
    	'SRD' => 'Surinam Dollar',
    	'SEK' => 'Swedish Krona',
    	'CHF' => 'Swiss Francs', 
    	'TZS' => 'Tanzanian Shilling',
    	'THB' => 'Thai Baht',
    	'TTD' => 'Trinidad and Tobago Dollar',
    	'TRY' => 'Turkish New Lira',
    	'AED' => 'UAE Dirham',
    	'USD' => 'US Dollars',
    	'UGX' => 'Ugandian Shilling',
    	'UAH' => 'Ukraine Hryvna',
    	'UYU' => 'Uruguayan Peso',
    	'UZS' => 'Uzbekistani Som',
    	'VEB' => 'Venezuela Bolivar',
    	'VND' => 'Vietnam Dong',
    	'AMK' => 'Zambian Kwacha',
	    'ZWD' => 'Zimbabwe Dollar'
	],

	/*
	|--------------------------------------------------------------------------
	| Application Countries
	|--------------------------------------------------------------------------
	| Countries permitted to make a currency exchange
	*/
	
	'countries' => [ 
		'ENG',
		'FRA',
		'ITA',
		'IRL',
		'GER',
		'CHI'
	],

	/*
	|--------------------------------------------------------------------------
	| Application Fallback Locale
	|--------------------------------------------------------------------------
	|
	| The fallback locale determines the locale to use when the current one
	| is not available. You may change the value to correspond to any of
	| the language folders that are provided through your application.
	|
	*/

	'fallback_locale' => 'en',

	/*
	|--------------------------------------------------------------------------
	| Encryption Key
	|--------------------------------------------------------------------------
	|
	| This key is used by the Illuminate encrypter service and should be set
	| to a random, 32 character string, otherwise these encrypted strings
	| will not be safe. Please do this before deploying an application!
	|
	*/

	'key' => env('APP_KEY', 'SomeRandomString'),

	'cipher' => MCRYPT_RIJNDAEL_128,

	/*
	|--------------------------------------------------------------------------
	| Logging Configuration
	|--------------------------------------------------------------------------
	|
	| Here you may configure the log settings for your application. Out of
	| the box, Laravel uses the Monolog PHP logging library. This gives
	| you a variety of powerful log handlers / formatters to utilize.
	|
	| Available Settings: "single", "daily", "syslog", "errorlog"
	|
	*/

	'log' => 'daily',

	/*
	|--------------------------------------------------------------------------
	| Autoloaded Service Providers
	|--------------------------------------------------------------------------
	|
	| The service providers listed here will be automatically loaded on the
	| request to your application. Feel free to add your own services to
	| this to grant expanded functionality to your applications.
	|
	*/

	'providers' => [

		/*
		 * Laravel Framework Service Providers...
		 */
		'Illuminate\Foundation\Providers\ArtisanServiceProvider',
		'Illuminate\Auth\AuthServiceProvider',
		'Illuminate\Bus\BusServiceProvider',
		'Illuminate\Cache\CacheServiceProvider',
		'Illuminate\Foundation\Providers\ConsoleSupportServiceProvider',
		'Illuminate\Routing\ControllerServiceProvider',
		'Illuminate\Cookie\CookieServiceProvider',
		'Illuminate\Database\DatabaseServiceProvider',
		'Illuminate\Encryption\EncryptionServiceProvider',
		'Illuminate\Filesystem\FilesystemServiceProvider',
		'Illuminate\Foundation\Providers\FoundationServiceProvider',
		'Illuminate\Hashing\HashServiceProvider',
		'Illuminate\Mail\MailServiceProvider',
		'Illuminate\Pagination\PaginationServiceProvider',
		'Illuminate\Pipeline\PipelineServiceProvider',
		'Illuminate\Queue\QueueServiceProvider',
		'Illuminate\Redis\RedisServiceProvider',
		'Illuminate\Auth\Passwords\PasswordResetServiceProvider',
		'Illuminate\Session\SessionServiceProvider',
		'Illuminate\Translation\TranslationServiceProvider',
		'Illuminate\Validation\ValidationServiceProvider',
		'Illuminate\View\ViewServiceProvider',

		/*
		 * Application Service Providers...
		 */
		'App\Providers\AppServiceProvider',
		'App\Providers\BusServiceProvider',
		'App\Providers\ConfigServiceProvider',
		'App\Providers\EventServiceProvider',
		'App\Providers\RouteServiceProvider',
		'App\Providers\ValidatorServiceProvider',
		'App\Providers\HelperServiceProvider',
		'App\Providers\FacadeServiceProvider',

	],

	/*
	|--------------------------------------------------------------------------
	| Class Aliases
	|--------------------------------------------------------------------------
	|
	| This of class aliases will be registered when this application
	| is started. However, feel free to register as many as you wish as
	| the aliases are "lazy" loaded so they don't hinder performance.
	|
	*/

	'aliases' => [

		'App'       => 'Illuminate\Support\Facades\App',
		'Artisan'   => 'Illuminate\Support\Facades\Artisan',
		'Auth'      => 'Illuminate\Support\Facades\Auth',
		'Blade'     => 'Illuminate\Support\Facades\Blade',
		'Bus'       => 'Illuminate\Support\Facades\Bus',
		'Cache'     => 'Illuminate\Support\Facades\Cache',
		'Config'    => 'Illuminate\Support\Facades\Config',
		'Cookie'    => 'Illuminate\Support\Facades\Cookie',
		'Crypt'     => 'Illuminate\Support\Facades\Crypt',
		'DB'        => 'Illuminate\Support\Facades\DB',
		'Eloquent'  => 'Illuminate\Database\Eloquent\Model',
		'Event'     => 'Illuminate\Support\Facades\Event',
		'File'      => 'Illuminate\Support\Facades\File',
		'Hash'      => 'Illuminate\Support\Facades\Hash',
		'Input'     => 'Illuminate\Support\Facades\Input',
		'Inspiring' => 'Illuminate\Foundation\Inspiring',
		'Lang'      => 'Illuminate\Support\Facades\Lang',
		'Log'       => 'Illuminate\Support\Facades\Log',
		'Mail'      => 'Illuminate\Support\Facades\Mail',
		'Password'  => 'Illuminate\Support\Facades\Password',
		'Queue'     => 'Illuminate\Support\Facades\Queue',
		'Redirect'  => 'Illuminate\Support\Facades\Redirect',
		'Redis'     => 'Illuminate\Support\Facades\Redis',
		'Request'   => 'Illuminate\Support\Facades\Request',
		'Response'  => 'Illuminate\Support\Facades\Response',
		'Route'     => 'Illuminate\Support\Facades\Route',
		'Schema'    => 'Illuminate\Support\Facades\Schema',
		'Session'   => 'Illuminate\Support\Facades\Session',
		'Storage'   => 'Illuminate\Support\Facades\Storage',
		'URL'       => 'Illuminate\Support\Facades\URL',
		'Validator' => 'Illuminate\Support\Facades\Validator',
		'View'      => 'Illuminate\Support\Facades\View',
		'Helper'    => 'App\Facades\Helper',
		'CurrencyExchangeValidator'   => 'App\Facades\CurrencyExchangeValidator',
		'CurrencyExchangeFacade'      => 'App\Facades\CurrencyExchangeFacade',
	],

];
