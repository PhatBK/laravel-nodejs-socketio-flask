<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class SearchController extends Controller {

	public function getSearch() {
		return view('customer.trangchu');
	}
	public function postSearch(Request $request) {
		$request->all();
		return response()->json(['success' => 'Got Simple Ajax Request.']);
	}
}
