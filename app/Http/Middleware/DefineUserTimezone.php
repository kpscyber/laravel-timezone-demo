<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;
use Whitecube\LaravelTimezones\Facades\Timezone;

class DefineUserTimezone
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $timezone = Auth::user()?->timezone ?? config('app.timezone');
            Log::info('User timezone: '.$timezone);
            Timezone::set($timezone);
        } else {
            $timezone = config('app.display_timezone', 'Asia/Bangkok');
            Log::info('App timezone: '.$timezone);
            Timezone::set($timezone);
        }
        Log::info('Timezone set to: '.Timezone::current());

        return $next($request);
    }
}
