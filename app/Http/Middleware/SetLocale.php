<?php

namespace App\Http\Middleware;

use Closure;
use App;
use Session;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        if(session()->has('lang')){
            App::setLocale(session('lang'));
        }

        return $next($request);
    }
}
