<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Config;
use App;


class Locale
{
    public function handle($request, Closure $next)
    {
        if (!empty(Route::getRoutes()->match($request)->parameters['lang'])) {
            $langs = Config::get('app.locales');
            
            
            if (($key = array_search(Route::getRoutes()->match($request)->parameters['lang'], $langs)) !== false) {
                App::setLocale($langs[$key]);
                
            } else {
                 
                App::setLocale(Config::get('app.locale'));
            }
        }
        return $next($request);
    }
}
