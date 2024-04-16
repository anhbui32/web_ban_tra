<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Authen
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->email_verified_at == null) {
            Auth::logout();
            return redirect()->route('home');
        } elseif (!Auth::check() || (Auth::check() && Auth::user()->role_id === 0)) {
            return redirect()->route('home');
        }
        return $next($request);
    }
    // public function handle(Request $request, Closure $next): Response
    // {
    //     if ((Auth::check() && Auth::user()->role_id === 0 && Auth::user()->status === 0)) {
    //         return redirect()->route('home')->with('notice', 'Tài khoản đã kích hoạt đâu mà đòi vào xem đồ 😡');
    //     } elseif (Auth::check() && Auth::user()->status === 0) {
    //         return redirect()->view('504')->with('notice', 'Tài khoản đã kích hoạt đâu mà đòi vào xem đồ 😡');
    //     }
    //     return $next($request);
    // }
}
