<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminLoginMiddleware {
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next) {

		if (Auth::check()) {
			$user = Auth::user();
			if (($user->level == 1) || ($user->level == 0)) {
				return $next($request);
			} else {
				return redirect('admin/dangnhap');
			}
		} else {
			return redirect('admin/dangnhap');
		}
	}
}
