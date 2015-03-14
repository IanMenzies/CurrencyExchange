<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Routing\Middleware;

class RateLimiter implements Middleware 
{
    /** Limit the number of requests per hour **/
    const REQUEST_PER_HOUR_LIMIT = 60;

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$response = $next($request);

		// Limit the number of request by an IP
        $key      = sprintf('api:%s', $request->getClientIp());

        //Add IP to cache for an hour
        \Cache::add($key, 0, self::REQUEST_PER_HOUR_LIMIT);

        //Number of requests by IP Address
        $requestCount = \Cache::increment($key);

        //If rate limit was exceeded for the hour return a 403
        if ($requestCount > self::REQUEST_PER_HOUR_LIMIT)
        {
            $response->setContent('Rate limit exceeded');
            $response->setStatusCode(403);
        }
        //Set response headers
        $response->headers->set('X-Ratelimit-Limit'    , self::REQUEST_PER_HOUR_LIMIT, false);
        $response->headers->set('X-Ratelimit-Remaining', self::REQUEST_PER_HOUR_LIMIT - (int)$requestCount, false);

        //Return response
        return $response;
	}
}
