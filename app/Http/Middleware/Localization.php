<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle(\Illuminate\Http\Request $request, Closure $next){
        App::setLocale(session()->get('selected_language') ?? 'en');
        return $next($request);

    }
}
