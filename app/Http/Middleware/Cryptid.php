<?php

namespace App\Http\Middleware;

use Closure;

class Cryptid
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
        $crypt = $request->route('cryptid');
        $decrypt = str_replace('gTBtYrEP8X','',$crypt);
        if( is_int(intval($decrypt)) ){
            $request->attributes->add(['id' => intval($decrypt)]);
            return $next($request);
        }
    }
}
