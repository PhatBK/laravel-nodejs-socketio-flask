<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class NhaHangLoginMiddleware {
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next, $guard) {
		if (Auth::guard($guard)->check()) {
			return redirect()->route('nhahang/thongtin');
		} else {
			return redirect()->route('nhahang/login');
		}
		//return $next($request);
	}
}
