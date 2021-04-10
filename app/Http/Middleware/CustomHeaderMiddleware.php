<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CustomHeaderMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $headerName = 'X-Name', $headerValue = 'API')
    {
        $response = $next($request);
        $response->headers->set($headerName, $headerValue);
        return $response;
    }
}
