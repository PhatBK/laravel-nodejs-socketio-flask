<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController {
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	protected $count_load_page = 0;

	function __construct() {
		$this->count_visit_number();
		$this->online();
	}
	function online() {
		if (Auth::check()) {
			view()->share('user_online', Auth::user());
		}
	}
	function count_visit_number() {
		$this->count_load_page ++;
	}
	function performance() {

    }
}
