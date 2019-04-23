<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Response;


class RecommendController extends Controller
{
    public $data_set = "";
	
    public function get_api(){
  
    	$client = new GuzzleClient(['base_uri' => 'http://127.0.0.1:5000/']);
    	$res = $client->request('GET', 'api_get/');

    	$code = $res->getStatusCode(); // 200
		$reason = $res->getReasonPhrase(); // OK
		
    	dd($res);
    }
    public function post_api(){
    	
    	$client = new GuzzleClient(['base_uri' => 'http://127.0.0.1:5000/']);
    	$res = $client->request('POST','api_post/');
    	$body = $res->getBody();
    	dd((string)$body);

    }
    public function get_api_data_user(){
    	
    	$client = new GuzzleClient(['base_uri' => 'http://127.0.0.1:5000/']);
    	$res = $client->request('GET','api_get_data/user');
    	$body = $res->getBody();
		$users = json_decode($body);
        // dd($users);
        foreach ($users as $us) {
            echo $us[1];
            echo "<br>";
        }
        
    }
    public function get_api_data_monan(){
    	$client = new GuzzleClient(['base_uri' => 'http://127.0.0.1:5000/']);
    	$res = $client->request('GET','api_get_data/monan');
    	$body = $res->getBody();
        $monans = json_decode($body);
        dd($monans);
    }
    public function get_api_data_buaan(){
    	$client = new GuzzleClient(['base_uri' => 'http://127.0.0.1:5000/']);
    	$res = $client->request('GET','api_get_data/buaan');
    	$buaans = json_decode($res->getBody());
    }
    public function get_data(){

    }
    public function clear_data(){

    }
    public function norm_data(){

    }
    public function rollBackAll() {
        return response()->json(null);
    }
}
