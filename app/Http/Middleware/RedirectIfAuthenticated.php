<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated {
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @param  string|null  $guard
	 * @return mixed
	 */
	public function handle($request, Closure $next, $guard = null) {
		// Problem 2
		switch ($guard) {
		case 'nhahang': //if they are admin
			if (Auth::guard($guard)->check()) {
                // if they are logged in as $guard which is admin in this case
				return redirect()->route('nhahang.thongtin');
			}
			break;
		default:
			if (Auth::guard($guard)->check()) {
                // if they are logged in as $guard which is admin in this case
				return redirect('/home');
			}
			break;
		}
		//if (Auth::guard($guard)->check()) {
		//    return redirect('/home');
		//}
		return $next($request);
	}
}