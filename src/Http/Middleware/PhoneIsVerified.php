<?php

namespace App\Http\Middleware;

use Closure;

class PhoneIsVerified
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
		if ( !$request->user()->userPhoneVerified()) {
		  return redirect()->route('otp.verify',app()->getLocale());
		}	
        return $next($request);
    }
}
