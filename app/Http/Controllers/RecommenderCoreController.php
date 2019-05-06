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


class RecommenderCoreController extends Controller
{
   
    protected $recommend_controller = null;

    public function postStartRecommender(Request $req) {
       
        $client = new GuzzleClient(['base_uri' => 'http://127.0.0.1:5000/']);
        $res = $client->request('GET', '/api/start/recommender/v1');
        $datas = $res;
        return response()->json("Success");
    }
    public function getFlaskResultRecommender() {
        return "Success";
    }
    public function postFlaskResultRecommender(Request $req) {

        return response()->json(json_decode($req->data, true));
    }

    public function getFlaskAPI(){

        $client = new GuzzleClient(['base_uri' => 'http://127.0.0.1:5000/']);
        $res = $client->request('GET', 'api/data/get/v1');
        $code = $res->getStatusCode(); // 200
        $reason = $res->getReasonPhrase(); // OK
        dd($res);
    }
    // TODO send data to flask
    public function sendFlaskAPI() {
        $all_data_send = [];
        $data_rate_monans = [];
        $data_like_posts = [];

        $rate_monans = DanhGiaMonAn::all();
        foreach ($rate_monans as $rate_monan) {
            $tmp = [];
            $tmp[] = $rate_monan->id_user;
            $tmp[] = $rate_monan->id_monan;
            $tmp[] = $rate_monan->danhgia;

            $data_rate_monans[] = $tmp;
        }
        $like_posts = LikePost::all();

        foreach ($like_posts as $like_post) {

            $tmp = [];
            $user_id = $like_post->id_user;
            $id_loaimon = $like_post->userpost->id_loaimon;
            // $loai_mon = LoaiMon::find($id_loaimon)->ten;
            $tmp[] = $user_id;
            $tmp[] = $id_loaimon;
            // $tmp[] = $loai_mon;
            $tmp[] = 5;
            $data_like_posts[] = $tmp;
        }
        $all_data_send["like_post"] = $data_like_posts;
        $all_data_send["rate_monan"] = $data_rate_monans;

        return response()->json($all_data_send);
    }
    public function postFlaskAPI(Request $req) {
        dd($req);
        return response()->json("Success");
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
        return response()->json("null");
    }
    public function getFlaskApiResult() {
        return response()->json("null");
    }
    public function aprioriRuleAssociation($data) {
        return response()->json("null");
    }
    public function getAllRatedArray() {

    }
    public  function getAllUserSearchKeyArray() {

    }
    public  function getAllUserImplictDataArray() {

    }
}
