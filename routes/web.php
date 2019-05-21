<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */
/**
 * Ngày 10-01-2018
 * Các route của hệ thống cũ
 * Gồm các thao tác của Admin,
 * Các thao tác cơ bản của người dùng
 */
Route::get('/', ['as' => 'trangchu', 'uses' => 'BKCookController@trangchu']);
Route::get('/','BKCookController@trangchu');
/**
 * Route dành cho admin login
 */ 
Route::get('admin/dangnhap', 'UserController@getAdminLogin');
Route::post('admin/dangnhap', 'UserController@postAdminLogin');
Route::get('admin/dangxuat', 'UserController@getAdminLogout');

Route::group(['prefix' => 'admin', 'middleware' => 'adminLogin'], function () {
/**
 * Giới thiệu trang admin
 */
	Route::get('info-page-admin', function () {
		return view('admin.info');
	});
/**
 * Phần dành cho admin thêm tài khoản thành viên
 */
	Route::group(['prefix' => 'user'], function () {
		Route::get('danhsach', 'UserController@getDanhSach');
		Route::get('them', 'UserController@getThem');
		Route::post('them', 'UserController@postThem');
		Route::get('sua/{id}/{tentaikhoan}', 'UserController@getSua');
		Route::post('sua/{id}/{tentaikhoan}', 'UserController@postSua');
		Route::get('xemchitiet/{id}/{ten}', 'UserController@getXemChiTiet');
		Route::get('xoa/{id}', 'UserController@getXoa');
	});
/**
 * Phần dành cho admin thêm tài khoản nhà hàng liên kết
 */
	Route::group(['prefix' => 'nhahang'], function () {
		Route::get('danhsach', 'UserController@getDanhSachTaiKhoanNH');
		Route::get('them', 'UserController@getThemTaiKhoanNH');
		Route::post('them', 'UserController@postThemTaiKhoanNH');
		Route::get('sua/{id}/{ten}', 'UserController@getSuaThongTinNH');
		Route::post('sua/{id}/{ten}', 'UserController@postSuaThongTinNH');
		Route::get('xoa/{id}', 'UserController@getXoaTaiKhoanNH');
	});
/**
 * Phần dành cho quản lý bài viết
 */
	Route::group(['prefix' => 'baiviet'], function () {
		Route::get('danhsach', 'DangBaiController@getDanhSach');
		Route::get('xemchitiet/{id}', 'DangBaiController@getXemChiTiet');
		Route::get('xoa/{id}', 'DangBaiController@getXoaBaiViet');
		Route::get('comment/xoa/{id}/{idb}', 'DangBaiController@getXoaComment');
	});
/**
 * Phần dành cho thống kê
 */
	Route::group(['prefix' => 'thongke'], function () {
		Route::get('lichsu', 'ThongKeController@getLichSu');
		Route::get('thuchientk', 'ThongKeController@getThucHienTK');
		Route::get('xoa/{id}', 'ThongKeController@getXoa');
	});
/**
 * admin -> theloai
 */
	Route::group(['prefix' => 'theloai'], function () {
		Route::get('danhsach', ['as' => 'danhSachTheLoai', 'uses' => 'TheLoaiController@getDanhSach']);
		Route::get('sua/{id}', ['as' => 'suaTheLoai', 'uses' => 'TheLoaiController@SuaTheLoai']);
		Route::post('sua/{id}', ['as' => 'suaTheLoai', 'uses' => 'TheLoaiController@postSuaTheLoai']);
		Route::get('them', ['as' => 'themTheLoai', function () {
			return view('admin.theloai.them');
		}]);
		Route::post('them', ['as' => 'themTheLoai', 'uses' => 'TheLoaiController@postThemTheLoai']);
		Route::get('xoa/{id}', ['as' => 'xoaTheLoai', 'uses' => 'TheLoaiController@xoaTheLoai']);
	});
/**
 * admin -> loaimon
 */
	Route::group(['prefix' => 'loaimon'], function () {
		Route::get('danhsach', ['as' => 'danhSachLoaiMon', 'uses' => 'LoaiMonController@getDanhSach']);
		Route::get('sua/{id}', ['as' => 'suaLoaiMon', 'uses' => 'LoaiMonController@SuaLoaiMon']);
		Route::post('sua/{id}', ['as' => 'suaLoaiMon', 'uses' => 'LoaiMonController@postSuaLoaiMon']);
		Route::get('them', ['as' => 'themLoaiMon', 'uses' => 'LoaiMonController@getThemLoaiMon']);
		Route::post('them', ['as' => 'themLoaiMon', 'uses' => 'LoaiMonController@postThemLoaiMon']);
		Route::get('xoa/{id}', ['as' => 'xoaLoaiMon', 'uses' => 'LoaiMonController@xoaLoaiMon']);
	});
/**
 * admin -> congdung
 */
	Route::group(['prefix' => 'congdung'], function () {
		Route::get('danhsach', ['as' => 'danhSachCongDung', 'uses' => 'CongDungController@getDanhSach']);
		Route::get('sua/{id}', ['as' => 'suaCongDung', 'uses' => 'CongDungController@suaCongDung']);
		Route::post('sua/{id}', ['as' => 'suaCongDung', 'uses' => 'CongDungController@postSuaCongDung']);
		Route::get('them', ['as' => 'themCongDung', function () {
			return view('admin.congdung.them');
		}]);
		Route::post('them', ['as' => 'themCongDung', 'uses' => 'CongDungController@postThemCongDung']);
		Route::get('xoa/{id}', ['as' => 'xoaCongDung', 'uses' => 'CongDungController@xoaCongDung']);
	});
/**
 * admin muc dich
 */
	Route::group(['prefix' => 'mucdich'], function () {
		Route::get('danhsach', ['as' => 'danhSachMucDich', 'uses' => 'MucDichController@getDanhSach']);
		Route::get('sua/{id}', ['as' => 'suaMucDich', 'uses' => 'MucDichController@SuaMucDich']);
		Route::post('sua/{id}', ['as' => 'suaMucDich', 'uses' => 'MucDichController@postSuaMucDich']);
		Route::get('them', ['as' => 'themMucDich', function () {
			return view('admin.mucdich.them');
		}]);
		Route::post('them', ['as' => 'themMucDich', 'uses' => 'MucDichController@postThemMucDich']);
		Route::get('xoa/{id}', ['as' => 'xoaMucDich', 'uses' => 'MucDichController@xoaMucDich']);
	});
/**
 * quan lý vung mien
 */
	Route::group(['prefix' => 'vungmien'], function () {
		Route::get('danhsach', ['as' => 'danhSachVungMien', 'uses' => 'VungMienController@getDanhSach']);
		Route::get('sua/{id}', ['as' => 'suaVungMien', 'uses' => 'VungMienController@SuaVungMien']);
		Route::post('sua/{id}', ['as' => 'suaVungMien', 'uses' => 'VungMienController@postSuaVungMien']);
		Route::get('them', ['as' => 'themVungMien', function () {
			return view('admin.vungmien.them');
		}]);
		Route::post('them', ['as' => 'themVungMien', 'uses' => 'VungMienController@postThemVungMien']);
		Route::get('xoa/{id}', ['as' => 'xoaVungMien', 'uses' => 'VungMienController@xoaVungMien']);
	});
/**
 * quản lý món ăn và các thực thể liên quan
 */
	Route::group(['prefix' => 'monan'], function () {
		Route::get('danhsach', ['as' => 'danhSachMonAn', 'uses' => 'MonAnController@getDanhSachMonAn',]);
		Route::get('them', ['as' => 'themMonAn', 'uses' => 'MonAnController@getViewThemMonAn',]);
		Route::post('them', ['as' => 'themMonAn', 'uses' => 'MonAnController@themMonAn',]);
		Route::get('sua/{id}', ['as' => 'suaMonAn', 'uses' => 'MonAnController@getViewSuaMonAn',]);
		Route::post('sua/{id}', ['as' => 'suaMonAn', 'uses' => 'MonAnController@suaMonAn',]);
		Route::get('xoa/{id}', ['as' => 'xoaMonAn', 'uses' => 'MonAnController@xoaMonAn',]);
		Route::get('thembuocnau/{id}', ['as' => 'themBuocNau', 'uses' => 'CacBuocNauController@getViewThemBuocNau',]);
		Route::post('thembuocnau/{id}', ['as' => 'themBuocNau', 'uses' => 'CacBuocNauController@themBuocNau',]);
		Route::get('suabuocnau/{id_monan}/{id_buocnau}', ['as' => 'suaBuocNau', 'uses' => 'CacBuocNauController@getViewSuaBuocNau',]);
		Route::post('suabuocnau/{id_monan}/{id_buocnau}', ['as' => 'suaBuocNau', 'uses' => 'CacBuocNauController@suaBuocNau',]);
		Route::get('xoabuocnau/{id_monan}/{id_buocnau}', ['as' => 'xoaBuocNau', 'uses' => 'CacBuocNauController@xoaBuocNau',]);
		Route::get('themvideo/{id}', ['as' => 'themVideo', 'uses' => 'VideoController@getViewThemVideo',]);
		Route::post('themvideo/{id}', ['as' => 'themVideo', 'uses' => 'VideoController@themVideo',]);
		Route::get('suavideo/{id_monan}/{id_video}', ['as' => 'suaVideo', 'uses' => 'VideoController@getViewSuaVideo',]);
		Route::post('suavideo/{id_monan}/{id_video}', ['as' => 'suaVideo', 'uses' => 'VideoController@suaVideo',]);
		Route::get('xoavideo/{id_monan}/{id_video}', ['as' => 'xoaVideo', 'uses' => 'VideoController@xoaVideo',]);
		Route::get('binhluan/{id_monan}', ['as' => 'binhLuan', 'uses' => 'CommentController@getDanhSachComment',]);
		Route::get('xoabinhluan/{id_monan}/{id}', ['as' => 'xoaBinhLuan', 'uses' => 'CommentController@xoaComment',]);
		Route::get('baivietlienquan/{id_monan}', ['as' => 'baiVietLienQuan', 'uses' => 'DangBaiController@getBaiVietLienQuan',]);
		Route::get('xoabaivietlienquan/{id}/{id_monan}', ['as' => 'XoaBaiVietLienQuan', 'uses' => 'DangBaiController@xoaBaiVietLienQuan',]);
		Route::get('chitietmonan/{id}', ['as' => 'chiTietMonAn', 'uses' => 'MonAnController@xemChiTiet',]);
	});

/**
 * quản lý nguyên liệu cho món ăn
 */
	Route::group(['prefix'=> 'nguyenlieu'],function(){
		Route::get('danhsach','NangCapHeThongController@get_danhsach_nguyenlieu');

		Route::get('them','NangCapHeThongController@get_them_nguyenlieu');
		Route::post('them','NangCapHeThongController@post_them_nguyenlieu');

		Route::get('sua/{id}','NangCapHeThongController@get_sua_nguyenlieu');
		Route::post('sua/{id}','NangCapHeThongController@post_sua_nguyenlieu');

		Route::get('xoa/{id}','NangCapHeThongController@get_xoa_nguyenlieu');

	});
/**
 * quản lý món nă + nguyên liệu: 
 * một món ăn có thể có nhiều nguyên liệu ,
 * một nguyên liệu có thể thuộc nhiều món ăn
 */
	Route::group(['prefix' => 'monan_nguyenlieu'],function(){
		Route::get('danhsach','NangCapHeThongController@get_danhsach_monan_nguyenlieu');

		Route::get('them','NangCapHeThongController@get_them_monan_nguyenlieu');
		Route::post('them','NangCapHeThongController@post_them_monan_nguyenlieu');

		Route::get('sua/{id}','NangCapHeThongController@get_sua_monan_nguyenlieu');
		Route::post('sua/{id}','NangCapHeThongController@post_sua_monan_nguyenlieu');

		Route::get('xoa/{id}','NangCapHeThongController@get_xoa_monan_nguyenlieu');
	});
/**
 * quản lý một bữa ăn 
*/
	Route::group(['prefix'=>'buaan'],function(){
		Route::get('danhsach','NangCapHeThongController@get_danhsach_buaan');

		Route::get('them','NangCapHeThongController@get_them_buaan');
		Route::post('them','NangCapHeThongController@post_them_buaan');

		Route::get('sua/{id}','NangCapHeThongController@get_sua_buaan');
		Route::post('sua/{id}','NangCapHeThongController@post_sua_buaan');

		Route::get('xoa/{id}','NangCapHeThongController@get_xoa_buaan');

	});
/**
 * quản lý phần bũa ăn + món ăn:
 * một bữa ăn có nhiểu món ăn,
 * một món ăn có thể thuộc nhiều bữa ăn
 */
	Route::group(['prefix' => 'monan_buaan'],function(){
		Route::get('danhsach','NangCapHeThongController@get_danhsach_monan_buaan');

		Route::get('them','NangCapHeThongController@get_them_monan_buaan');
		Route::post('them','NangCapHeThongController@post_them_monan_buaan');

		Route::get('sua/{id}','NangCapHeThongController@get_sua_monan_buaan');
		Route::post('sua/{id}','NangCapHeThongController@post_sua_monan_buaan');

		Route::get('xoa/{id}','NangCapHeThongController@get_xoa_monan_buaan');
	});

});
/**
 * Phần dành cho nhà hàng liên kết
 */
Auth::routes();
Route::prefix('nhahang')->group(function () {
	Route::get('/thongtin', 'NhaHangController@index')->name('nhahang.thongtin');

	Route::get('/login', 'Auth\NhaHangLoginController@getlogin')->name('nhahang.login');
	Route::post('/login', 'Auth\NhaHangLoginController@postlogin')->name('nhahang.login.submit');
	Route::get('/logout', 'Auth\NhaHangLoginController@logout')->name('nhahang.logout');

	Route::get('/danhsachmonan', 'NhaHangController@getDanhSachMonAn')->name('nhahang.danhsachmonan');
	Route::get('/them_mon_danhsach', 'NhaHangController@getThemMonDanhSach')->name('nhahang.themmonantudanhsach');
	Route::post('/them_mon_danhsach', 'NhaHangController@getThemMonDanhSach')->name('nhahang.themmonantudanhsach.submit');

	Route::get('/tuthem_mon', 'NhaHangController@getTuThemMonAn')->name('nhahang.tuthemmonan');
	Route::post('/tuthem_mon', 'NhaHangController@postTuThemMonAn')->name('nhahang.tuthemmonan.submit');

	Route::get('/monan/sua/{id}', 'NhaHangController@getSuaMonAn');
	Route::post('/monan/sua/{id}', 'NhaHangController@postSuaMonAn');
	Route::get('/monan/xoa/{id}', 'NhaHangController@getXoaMonAn');

	Route::get('/sua/{id}/{tenkhongdau}', 'NhaHangController@getSuaThongTin');
	Route::post('/sua/{id}/{tenkhongdau}', 'NhaHangController@postSuaThongTin');

});

/**
 * Phần dành cho trang chủ
 */
Route::get('loaimon', ['as' => 'loaimon', 'uses' => 'BKCookController@View_loaimon']);
Route::post('monan_loaimon', ['as' => 'monan_loaimon', 'uses' => 'BKCookController@View_monans_by_id_loaimon']);

Route::get('mucdich', ['as' => 'mucdich', 'uses' => 'BKCookController@View_mucdich']);
Route::post('monan_mucdich', ['as' => 'monan_mucdich', 'uses' => 'BKCookController@View_monans_by_id_mucdich']);

Route::get('congdung', ['as' => 'congdung', 'uses' => 'BKCookController@View_congdung']);
Route::post('monan_congdung', ['as' => 'monan_congdung', 'uses' => 'BKCookController@View_monans_by_id_congdung']);

Route::get('vungmien', ['as' => 'vungmien', 'uses' => 'BKCookController@View_vungmien']);
Route::post('monan_vungmien', ['as' => 'monan_vungmien', 'uses' => 'BKCookController@View_monans_by_id_vungmien']);

Route::get('nhahang', ['as' => 'nhahang', 'uses' => 'BKCookController@View_nhahang']);
Route::post('monan_nhahang', ['as' => 'monan_nhahang', 'uses' => 'BKCookController@View_monans_by_id_nhahang']);

Route::get('chitietmonan/{id}', ['as' => 'chitietmonan', 'uses' => 'BKCookController@View_chitietmonan']);

Route::get('chitietmonannhahang/{id}', ['as' => 'chitietmonannhahang', 'uses' => 'BKCookController@View_chitietmonannhahang']);

Route::get('monan', 'BKCookController@getMonAn');
Route::get('monan/ajax', 'BKCookController@getPaginateAjax');

/**
 * phần mở rộng cho người dùng
 */
Route::post('timkiem_monan', ['as' => 'timkiem_monan', 'uses' => 'BKCookController@timkiem_monan']);
Route::post('danhgia_monan', ['as' => 'danhgia_monan', 'uses' => 'BKCookController@danhgia_monan']);
Route::post('like_monan', ['as' => 'like_monan', 'uses' => 'BKCookController@like_monan']);
/**
 * Phần dành chung cho tất cả người dùng
 */
Route::get('trangchu', ['as' => 'trangchu', 'uses' => 'BKCookController@trangchu']);
Route::post('dangky', 'BKCookController@postDangKy');
Route::post('dangnhap', ['as' => 'dangnhap', 'uses' => 'BKCookController@postDangNhap']);
Route::get('dangxuat', ['as' => 'dangxuat', 'uses' => 'BKCookController@getDangXuat']);
Route::post('suataikhoan', ['as' => 'suataikhoan', 'uses' => 'BKCookController@postSuaTaiKhoan']);

/**
 * Phần dành cho thành viên đang bài trên diễn đàn chia sẻ tin tức 
 */
//TODO api for intergrate with nodejs server
Route::get('api/savedatauserpost', 'ApiController@savedatauserpost');
Route::get('api/savedatacommentpost', 'ApiController@savedatacommentpost');
Route::get('api/savedatareplycommentpost', 'ApiController@savedatareplycommentpost');
Route::get('api/savedatalikepost', 'ApiController@savedatalikepost');
Route::get('api/savedatacommentmonan', 'ApiController@savedatacommentmonan');
Route::get('api/getiduseronline', 'ApiController@getiduseronline');
Route::get('dangbai', ['as' => 'dangBai', 'uses' => 'DangBaiController@loadDangBai']);
Route::get('findLoaiMon', 'DangBaiController@findLoaiMon');
Route::get('loadthembaiviet', 'DangBaiController@loadthembaiviet');
Route::get('baidangchitiet/{id}', 'DangBaiController@baidangchitiet');
Route::get('commentpost', 'BKCookController@getCommentPost');

/**
 * Routes dành cho tương tác với các hệ thống của bên thứ 3
 * Đăng nhập với tài khoản của google, facebook, twitter
 * 
 */
Route::get('login/google', 'Auth\LoginController@redirectToProvider')->name('google.login');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback');

/**
 * Route phần nâng cấp hệ thống
 * route phần giao tiếp với server flask cho chức năng recommend viết trên Python 2.7
 */


Route::get('channel', 'BKCookController@getChannelView');
/**
 * Phần hệ thống tương tác với recommender service
 * Hệ thống lấy các dữ liệu thu thập được từ người dùng
 * Đóng gói dưc liệu, gửi cho server chạy recommender service
 * server chạy recommender tính toán, gửi lại kết quả cho web app
*/
//TODO router for collector data of client
// feedback của người dùng
Route::post('user/data/feedback/v1', 'BKCookController@postFeedBack');
// Collector data from user
Route::post('user/data/survey/v1', 'BKCookController@postUserSurvey');
Route::post('user/logs/data/key-search', 'CollectorsController@postUserKeySearch');
Route::post('user/logs/data/page-time', 'CollectorsController@postUserPageTime');
Route::post('user/data/like-monan/v1', 'BKCookController@postUserLikeMonAn');

//TODO route for intergrate with flask server
Route::get('/api/data/normal/v1', 'RecommenderCoreController@getAllDataUserArray');

// Data of user and Item
Route::get('/api/data/rate/v1', 'RecommenderCoreController@getDataRate');
Route::get('/api/data/like/v1', 'RecommenderCoreController@getDataLike');
Route::get('/api/data/survey/v1', 'RecommenderCoreController@getDataSurvey');
Route::get('/api/data/implict/v1','RecommenderCoreController@getDataImplict');
Route::get('/api/data/search/v1', 'RecommenderCoreController@getSearchKey');

// normal data of all database to Itrm-Item Based
Route::get('/api/data/rate/matrix/v1', 'RecommenderCoreController@getAllRateToMatrix');
Route::get('/api/data/like/matrix/v1','RecommenderCoreController@getAllLikeToMatrix');
Route::get('/api/data/search/matrix/v1', 'RecommenderCoreController@getAllSearchKeyMatrix');
Route::get('/api/data/implict/matrix/v1','RecommenderCoreController@getAllImplictToMatrix');
Route::get('/api/data/survey/matrix/v1','RecommenderCoreController@getAllImplictToMatrix');


// TODO get and save model from flask
Route::get('/api/get/data/model/v1', 'RecommenderCoreController@getDataModelFlask');
Route::post('/api/post/data/model/v1', 'RecommenderCoreController@postDataModelFlask');


// test
Route::get('test','RecommenderCoreController@getDataModelFlask');

