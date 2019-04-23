<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use App\Models\UserImplictsData;
use App\Models\UserSearchKey;

use GuzzleHttp\Client;

class RecommenderCoreController extends Controller
{
    function __construct()
    {
       
    }
    public function getAPI() {

    }
    public function postUserPageTime(Request $req) {

        $user_agent = $req->header('user-agent');
       
        $anonymouse = false;
        $is_play_video = false;
        $user_id_rand = rand(1000000, 100000000);
      
        if (!$req->user_id) {
            $req->user_id = $user_id_rand;
            $anonymouse = true;
        }
        if (!$req->play_video) {
            $is_play_video = false;
        } else {
            $is_play_video = true;
        }
        $time = $req->time / 1000;
        $user_id = $req->user_id;
        $id_mon_an = $req->id_mon_an;
        $ten_mon = $req->ten_mon_an;
        $ip = $req->ip();
        $referer = $req->referer;
        $mon_an_id_referrer = $req->mon_an_id_referrer;

        $results = [];
        array_push($results, $time, $id_mon_an,
            $mon_an_id_referrer, $ten_mon, $user_id, $ip,
            $user_agent, $referer, $is_play_video,
            $req->date_visit, $req->time_visit_start,
            $user_id_rand
        );

        $user_data_saved = new UserImplictsData();

        $user_data_saved->user_id = $user_id;
        $user_data_saved->mon_an_id = $id_mon_an;
        $user_data_saved->mon_an_id_referrer = $mon_an_id_referrer;
        $user_data_saved->visited_time = $time;
        $user_data_saved->play_video = $is_play_video;
        $user_data_saved->anonymouse  = $anonymouse;
        $user_data_saved->ip_address = $req->ip();

        $user_data_saved->date_visit = date('Y-m-d H:i:s');
        $user_data_saved->time_visit_start = date("H:i:s");

        $user_data_saved->save();

        return response()->json($results);
    }

    public  function postUserKeySearch(Request $req) {
        if ($req->id_mon_an) {
            $key_search = new UserSearchKey();
            $anonymouse = false;
            $user_id_rand = rand(1000000, 100000000);

            if ($req->user_id == null || !$req->user_loged) {
                $req->user_id = $user_id_rand;
                $anonymouse = true;
                $key_search->user_id = $req->user_id;
                $key_search->mon_an_id = $req->id_mon_an;
                $key_search->mon_an_id_referrer	 = $req->mon_an_id_referrer;
                $key_search->anonymouse = $anonymouse;

                $key_search->save();
                $data = [
                    'status' => true,
                    'code' => 200,
                    'data' =>$user_id_rand,
                    'loged' => false,
                ];
                return response()->json($data);
            } else if ($req->user_id && $req->user_loged) {
                $key_search->user_id = $req->user_id;
                $key_search->mon_an_id = $req->id_mon_an;
                $key_search->mon_an_id_referrer	 = $req->mon_an_id_referrer;
                $key_search->anonymouse = $anonymouse;

                $key_search->save();
                $data = [
                    'status' => false,
                    'code' => 200,
                    'data' => null,
                    'loged' => true,
                ];
                return response()->json($data);
            } else {
                return response()->json("Unsuccess");
            }

        } else {
            return Response()-> json("Unsuccess");
        }
    }
    public  function getUserServeyView() {
        return view('');
    }
    public  function postUserServeyView() {

    }
    // send data for Flask
    public function apiRecommenderShareData() {
        $all_user_data_implicts = UserImplictsData::all();
        return response()->json($all_user_data_implicts);
    }
    // call api from Flask
    public function apiRecommenderGetData(Request $req) {
        return response()->json(null);
    }
    public function getFlaskApi() {
        return response()->json(null);
    }
    public function postFlaskApi() {
        return response()->json(null);
    }
    public function aprioriRuleAssociation($data) {
        return response()->json(null);
    }
}
