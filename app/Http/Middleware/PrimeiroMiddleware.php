<?php

namespace App\Http\Middleware;

use Closure;
use Log;

class PrimeiroMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        Log::debug('Passou pelo primeiro middleware ANTES');
        $res = $next($request);
        Log::debug('Passou pelo primeiro middleware DEPOIS');
        return $res;
        // return response('Alterei a resposta', 201);
    }
}
