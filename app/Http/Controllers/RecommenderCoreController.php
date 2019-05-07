<?php

namespace App\Http\Controllers;

use App\Models\UserImplictsData;
use App\Models\UserSearchKey;
use App\Models\DanhGiaMonAn;
use App\Models\UserServey;
use App\Models\LikePost;
use App\Models\LoaiMon;
use App\Models\UserPost;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
    public function getAllDataUserArray() {
        $all_datas = [];
        /**
         * Lấy dữ liệu thành dạng json
         * Dữu liệu từ bảng: danhgiamonan
        */
        $json_danhgias = [];
        $user_unique_ratings = DB::table('danhgiamonan')
            ->select(DB::raw('count(id_user) as user_count, id_user'))
            ->groupBy('id_user')
            ->get();
        foreach ($user_unique_ratings as $unr) {
            $score_danhgias = [];
            $user_unique_rated = DanhGiaMonAn::where('id_user', $unr->id_user)->get();
            foreach ($user_unique_rated as $rated) {
                $score_danhgias[strval($rated->id_monan)] = $rated->danhgia;
            }
            $json_danhgias[strval($unr->id_user)] = $score_danhgias;
        }
        $all_datas['rated'] = $json_danhgias;
        /**
         * Lấy dữ liệu chuyển thành dạng json
         * Dữ liệu được lấy từ bảng: survey_user
         */
        $json_user_surveys = [];
        $user_surveys = UserServey::all();
        foreach ($user_surveys as $user_survey) {
            $json_user_surveys[strval($user_survey->user_id)] = explode("|", $user_survey->loaimon_lists);
        }
        $all_datas['user_survey'] = $json_user_surveys;

        /**
         * Lấy dữ liệu chuyển thành dạng json
         * Dữ liệu được lấy từ bảng: user_search_key
        */
        $json_user_search_keys = [];
        $user_unique_search_keys = DB::table('user_search_key')
            ->select(DB::raw('count(user_id) as user_count, user_id'))
            ->groupBy('user_id')
            ->get();
        foreach ($user_unique_search_keys as $user_unique_search_key) {
            $key_searchs = UserSearchKey::where('user_id', $user_unique_search_key->user_id)->get();
            $tmp = [];
            foreach ($key_searchs as $key_search) {
                $tmp[] = $key_search->mon_an_id;
            }
            array_count_values($tmp);
            $json_user_search_keys[strval($user_unique_search_key->user_id)] = array_count_values($tmp);;
        }
        $all_datas['user_search_key'] = $json_user_search_keys;

        /**
         * Lấy dữ liệu chuyển thành dạng json
         * Dữ liệu được lấy từ bảng: user_implicts_data
         */
        $json_user_implicts_datas = [];
        $query =
            " 
            SELECT id, user_id, mon_an_id, COUNT(user_id) as count_user, COUNT(mon_an_id) as count_mon, SUM(visited_time) as total_visit 
            FROM `user_implicts_data` 
            WHERE 1 
            GROUP BY user_id, mon_an_id
            ";
        $implict_datas = DB::select(DB::raw($query));

        foreach ($implict_datas as $implict_data) {

        }

        dd($implict_datas);
        /**
         * Lấy dữ liệu chuyển thành dạng json
         * Dữ liệu được lấy từ bảng: likepost
         */
        $json_user_likeposts = [];
        $user_unique_likeposts = DB::table('likepost')
            ->select(DB::raw('count(id_user) as user_count, id_user'))
            ->groupBy('id_user')
            ->get();
        foreach ($user_unique_likeposts as $user_unique_likepost) {
            $user_unique_likeposts = LikePost::where('id_user', $user_unique_likepost->id_user)->get();
            $tmp = [];
            foreach ($user_unique_likeposts as $user_unique_likepost) {
                $tmp[strval($user_unique_likepost->userpost->loaimon->id)] = 1;
            }
            $json_user_likeposts[strval($user_unique_likepost->id_user)] = $tmp;
        }
        $all_datas['user_likeposts'] = $json_user_likeposts;


//        dd($all_datas);
//        dd(json_encode($all_datas));
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
