<?php

namespace App\Http\Controllers;

use App\Models\UserImplictsData;
use App\Models\UserSearchKey;
use App\Models\DanhGiaMonAn;
use App\Models\UserServey;
use App\Models\LikePost;
use App\Models\LoaiMon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client as GuzzleClient;
use Session;

class CollectorsController extends Controller
{
    protected $user_id_auth = null;
    protected $wasLogin = null;
    protected $recommend_controller = null;

    function __construct()
    {
        if (!Auth::user()) {
            $this->user_id_auth = rand(10000000, 100000000);
            $this->wasLogin = false;
        } else {
            $this->wasLogin = true;
        }
    }
    public function postUserPageTime(Request $req) {
        // check session
        // if (Session::get('id') == $req->id_mon_an) {
        //     return response()->json("Session already....");
        // } else {
        //     Session::put('id', $req->id_mon_an);
        // }
        
        // if ($req->user_id == null) {
        //     $req->user_id = $this->user_id_auth;
        //     $anonymouse = true;
        // }
        // if (!$req->play_video) {
        //     $is_play_video = false;
        // } else {
        //     $is_play_video = true;
        // }
        // if (!Auth::user() && !($req->user_id == null)) {
        //     $anonymouse = true;
        // }
        
        $user_agent = $req->header('user-agent');
        $anonymouse = false;
        if (Auth::user()) {
            $this->user_id_auth = Auth::user()->id;
            $anonymouse = false;
        }
        $is_play_video = false;
       
        $req->user_id = $req->user_id == null ?  $req->user_id = $this->user_id_auth : $req->user_id;
        $anonymouse = $req->user_id == null ? true : false;
        $is_play_video = $req->play_video ? true : false;
        $anonymouse =  (!Auth::user() && !($req->user_id == null)) ? true : false;
        $req->user_id = ($req->user_id == 0) ? 11081996 : $req->user_id;
        $req->time = ($req->time / 1000 > 3600 * 24 ) ? (3600 * 6 * 1000) : $req->time;

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
            $this->user_id_auth
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
            if (Auth::user()) {
                $this->user_id_auth = Auth::user()->id;
                $anonymouse = false;
            }
            if ($req->user_id == null) {
                $req->user_id = $this->user_id_auth;
                $anonymouse = true;
            }
            if (!Auth::user() && !($req->user_id == null)) {
                $anonymouse = true;
            }
            $key_search->user_id = $req->user_id;
            $key_search->mon_an_id = $req->id_mon_an;
            $key_search->mon_an_id_referrer = $req->mon_an_id_referrer;
            $key_search->anonymouse = $anonymouse;

            $key_search->save();
            $data = [
                'status' => true,
                'code' => 200,
                'data' => $req->user_id,
            ];
            return response()->json($data);
        } else {
            return response()-> json("Unsuccess");
        }
    }
}
