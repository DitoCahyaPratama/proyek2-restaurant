<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\App;

class SetLanguage
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
       
        $languages = array_keys(config('app.languages'));
       
        if (request('lang')) {
            $language = request('lang');
            setcookie("language", request('lang'), time() + (86400 * 30 ), "/");
        }elseif ($request->cookie('language')) {
            $language =$_COOKIE['language'];
        }elseif (config('app.locale')) {
            $language = config('app.locale');
        }  
        if (isset($language) && in_array($language, $languages)) {           
            app()->setLocale($language);
        }  
        return $next($request);
    }
}
