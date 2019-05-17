<?php

namespace App\Http\Controllers;

use App\Models\UserImplictsData;
use App\Models\UserSearchKey;
use App\Models\DanhGiaMonAn;
use App\Models\UserServey;
use App\Models\LikePost;
use App\Models\LikeMonAn;
use App\Models\LoaiMon;
use App\Models\UserPost;
use App\Models\User;
use App\Models\MonAn;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

// use package of third
use GuzzleHttp\Client as GuzzleClient;
use Phpml\Association\Apriori;


class RecommenderCoreController extends Controller
{
    protected $recommend_controller = null;
    function __construct()
    {
        $this->user_all = User::all();
        $this->monan_all = MonAn::all();
    }
    //TODO start Flask run caculator recommender
    public function postStartRecommender(Request $req) {
       
        $client = new GuzzleClient(['base_uri' => 'http://127.0.0.1:5000/']);
        $res = $client->request('GET', '/api/start/recommender/v1');
        $datas = $res;
        return response()->json("Success");
    }
    //TODO get data and send to flask
    public function getAllDataUserArray() {
        $all_datas = [];
        /**
         * Lấy dữ liệu thành dạng json item->user
         * Dữu liệu từ bảng: danhgiamonan
         */
        $json_danhgia_news = [];
        $monan_unique_ratings = DB::table('danhgiamonan')
            ->select(DB::raw('count(id_monan) as monan_count, id_monan'))
            ->groupBy('id_monan')
            ->get();
        foreach ($monan_unique_ratings as $monan_unique_rating) {
            $tmp = [];
            $monan_un_rates = DanhGiaMonAn::where('id_monan', $monan_unique_rating->id_monan)->get();
            foreach ($monan_un_rates as $monan_rate) {
                $tmp[strval($monan_rate->id_user)] = $monan_rate->danhgia;
            }
            $json_danhgia_news[strval($monan_unique_rating->id_monan)] = $tmp;
        }
        // dd($json_danhgia_news, json_encode($json_danhgia_news));
        /**
         * Lấy dữ liệu thành dạng json user->item
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
        /**
         * Lấy dữ liệu thành dạng json
         * Dữu liệu từ bảng: likemonan
         */
        $json_likes = [];
        $user_unique_likes = DB::table('likemonan')
            ->select(DB::raw('count(id_user) as user_count, id_user'))
            ->groupBy('id_user')
            ->get();
        foreach ($user_unique_likes as $uniliked) {
            $tmp = [];
            $likeOfusers = LikeMonAn::where('id_user', $uniliked->id_user)->get();
            foreach ($likeOfusers as $like) {
                $tmp[] = $like->id_monan;
            }
            $json_likes[strval($uniliked->id_user)] = $tmp;
        }
//        similar_text(implode(",",$json_likes[35]), implode(",",$json_likes[36]), $percent);
//        similar_text(implode(",",$json_likes[35]), implode(",",$json_likes[28]), $percent1);
//        dd($percent, $percent1, json_encode($json_likes));
//        dd(json_encode($json_likes));

        $all_datas['likes'] = $json_danhgias;
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

    //TODO api send data for recommender engine
    public function getDataRate() {
        /**
         * Lấy dữ liệu thành dạng json item->user
         * Dữu liệu từ bảng: danhgiamonan
         */
        $json_danhgia_news = [];
        $monan_unique_ratings = DB::table('danhgiamonan')
            ->select(DB::raw('count(id_monan) as monan_count, id_monan'))
            ->groupBy('id_monan')
            ->get();
        foreach ($monan_unique_ratings as $monan_unique_rating) {
            $tmp = [];
            $monan_un_rates = DanhGiaMonAn::where('id_monan', $monan_unique_rating->id_monan)->get();
            foreach ($monan_un_rates as $monan_rate) {
                $tmp[strval($monan_rate->id_user)] = $monan_rate->danhgia;
            }
            $json_danhgia_news[strval($monan_unique_rating->id_monan)] = $tmp;
        }
        /**
         * Lấy dữ liệu thành dạng json user->item
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
//        return rescue()->json($json_danhgias);
        return response()->json($json_danhgia_news);
    }
    public function getDataLike() {
        /**
         * Lấy dữ liệu thành dạng json
         * Dữu liệu từ bảng: likemonan
         */
        $json_likes = [];
        $user_unique_likes = DB::table('likemonan')
            ->select(DB::raw('count(id_user) as user_count, id_user'))
            ->groupBy('id_user')
            ->get();
        foreach ($user_unique_likes as $uniliked) {
            $tmp = [];
            $likeOfusers = LikeMonAn::where('id_user', $uniliked->id_user)->get();
            foreach ($likeOfusers as $like) {
                $tmp[] = $like->id_monan;
            }
            $json_likes[strval($uniliked->id_user)] = $tmp;
        }
        return response()->json($json_likes);
    }
    public function getDataSurvey() {
        $json_user_surveys = [];
        $user_surveys = UserServey::all();
        foreach ($user_surveys as $user_survey) {
            $json_user_surveys[strval($user_survey->user_id)] = explode("|", $user_survey->loaimon_lists);
        }
        return response()->json($json_user_surveys);
    }
    public function getDataImplict() {
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

        $monan2users = array();
        $user2monans = array();
        foreach ($implict_datas as $element) {
            $monan2users[strval($element->mon_an_id)][$element->user_id] = $element->total_visit;
            $user2monans[strval($element->user_id)][$element->mon_an_id] = $element->total_visit;
        }
        //dd($user2monans);
        //dd($monan2users);
        //dd($implict_datas);
        //return response()->json($user2monans);
        return response()->json($monan2users);
    }
    public function getSearchKey() {
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
        return response()->json($json_user_search_keys);
    }
    // Done to get and send data
    // TODO request from flask

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
    // matrix rate
    public function getAllRateToMatrix(){
        $data = [];
        $allMonAn = $this->monan_all;
        $allUser = $this->user_all;
        foreach ($allMonAn as $monan) {
            $tmp = [];
            foreach ($allUser as $user) {
                $query = "select * from danhgiamonan where id_user = " .$user->id. " and id_monan = ".$monan->id;
                $rate = DB::select(DB::raw($query));
                if($rate) {
                    $tmp[strval($user->id)] = $rate[0]->danhgia;
                } else {
                    $tmp[strval($user->id)] = null;
                }
            }
            $data[strval($monan->id)] = $tmp;
        }
        return response()->json($data);
    }
    // matrix like
    public function getAllLikeToMatrix() {
        dd($this->monan_all);
        $data = [];
        $allMonAn = $this->monan_all;
        $allUser = $this->user_all;
        foreach ($allMonAn as $monan) {
            $tmp = [];
            foreach ($allUser as $user) {
                $query = "select * from likemonan where id_user = " .$user->id. " and id_monan = ".$monan->id;
                $like = DB::select(DB::raw($query));
                if($like) {
                    $tmp[strval($user->id)] = 1;
                } else {
                    $tmp[strval($user->id)] = 0;
                }
            }
            $data[strval($monan->id)] = $tmp;
        }
        return response()->json($data);
    }
    public function getAllSearchKeyMatrix() {

    }
    public function getAllImplictToMatrix() {
        $data = [];
        $allMonAn = $this->monan_all;
        $allUser = $this->user_all;

        foreach ($allMonAn as $monan) {
            $tmp = [];
            foreach ($allUser as $user) {
                $query = "select * from user_implicts_data where user_id = " .$user->id. " and mon_an_id = ".$monan->id;
                $implict = DB::select(DB::raw($query));
                if($implict) {
                    $total_time = 0;
                    foreach ($implict as $impl) {
                        $total_time += $impl->visited_time;
                    }
                    $tmp[strval($user->id)] = $total_time;
                } else {
                    $tmp[strval($user->id)] = 0;
                }
            }
            $data[strval($monan->id)] = $tmp;
        }
//        dd($data);
        return response()->json($data);
    }
    public function getDataModelFlask() {

    }
    public function postDataModelFlask(Request $req) {
        
    }
}
