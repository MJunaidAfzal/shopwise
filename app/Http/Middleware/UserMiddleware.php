<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check() && Auth::user()->isban){
            $banned = Auth::user()->isban == "1";
            Auth::logout();

            if($banned == 1) {
                $message = 'Your Account Has Been Banned. Please Contact Administrator.';
            }
            return redirect()->route('login')
            ->with('status',$message)
            ->withErrors(['email' => 'Your Account Has Been Banned. Please Contact Administrator.']);
        }
        if(Auth::check()){
            $expiresAt = Carbon::now()->addMinutes(1);
            Cache::put('user-is-online' . Auth::user()->id, true, $expiresAt);
        }

        return $next($request);
    }
}
