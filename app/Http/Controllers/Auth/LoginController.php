<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller {
	/*
		    |--------------------------------------------------------------------------
		    | Login Controller
		    |--------------------------------------------------------------------------
		    |
		    | This controller handles authenticating users for the application and
		    | redirecting them to your home screen. The controller uses a trait
		    | to conveniently provide its functionality to your applications.
		    |
	*/

	use AuthenticatesUsers;

	/**
	 * Where to redirect users after login.
	 *
	 * @var string
	 */
	protected $redirectTo = '/home';

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('guest')->except('logout');
	}

	/**
	 * Redirect the user to the google authentication page.
	 *
	 * @return Response
	 */
	public function redirectToProvider() {
		return Socialite::driver('google')->redirect();
	}

	/**
	 * Obtain the user information from google.
	 *
	 * @return Response
	 */
	public function handleProviderCallback() {
		$userSocial = Socialite::driver('google')->user();
		// $user->token;
		$findUser = User::where('email', $userSocial->email)->first();
		if ($findUser) {
			Auth::login($findUser);
			return redirect()->route('trangchu');
		} else {
			$user = new User();
			$user->remember_token = $userSocial->token;
			$user->hovaten = $userSocial->name;
			$user->email = $userSocial->email;
			$user->tentaikhoan = $userSocial->name;
			$user->password = bcrypt(rand(1, 10000));
			$user->level = 2;
			$user->anhdaidien = $userSocial->getAvatar();

			$user->save();
			Auth::login($user);
			return redirect()->route('trangchu');
		}
	}

	// h chu vao database xoa het may cai account gg di roi dang nhap lai
}
