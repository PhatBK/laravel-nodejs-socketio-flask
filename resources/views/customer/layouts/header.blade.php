<header id="main_menu" class="header navbar-fixed-top">
    <div class="main_menu_bg">
        <div class="container-fluid">
            <div class="row">
                <div class="nave_menu">
                    <nav class="navbar navbar-default" id="navmenu">
                        <div class="container-fluid">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav navbar-right">
                                   <li><a href="trangchu"><img style="display: inline-block; width: 20px;" src="vendor_customer/assets/images/logo.png" alt="">
                                       </a>
                                    </li>
                                    <li><a href="channel">Channel</a></li>
                                    <li><a href="trangchu">Trang Chủ</a></li>
                                    <li><a href="{{route('loaimon')}}">Thể Loại</a></li>
                                    <li><a href="{{route('mucdich')}}">Mục Đích</a></li>
                                     <li><a href="{{route('congdung')}}">Công Dụng</a></li>
                                    <li><a href="{{route('vungmien')}}">Ăn Cả Thế Giới</a></li>
                                    <li>
                                        <a href="" data-toggle="dropdown" role="button" aria-haspopup="true"
                                               aria-expanded="false" class="search" >
                                        <span class="fa fa-search"></span></a>
                                    </li>
                                    @if(!Auth::guard('nhahang')->user())
                                      <li><a href="monan/ajax">Món Ăn</a></li>
                                    @endif
                                    <li><a href="dangbai">Bài Viết</a></li>
                                    <li><a href="{{route('nhahang')}}">Nhà Hàng Liên Kết</a></li>
                                    @if(Auth::guard('nhahang')->user())
                                        <li>
                                          <a href="nhahang/thongtin">
                                             <b style="color: red;">Dành Cho Nhà Hàng</b>
                                          </a>
                                        </li>
                                    @endif

                                    @if( !Auth::user() && !Auth::guard('nhahang')->user())
                                      <li><a href="javascript:void(0)" class="signin">Đăng Nhập</a></li>
                                      <li><a href="javascript:void(0)" class="signup">Đăng Ký</a></li>
                                    @endif
                                    @if(Auth::user())
                                      @if(Auth::user()->level == 0 || Auth::user()->level == 1)
                                        <li><a href="admin/info-page-admin" target="_blank"><b style="color: red;">Quản Trị</b></a></li>
                                      @endif
                                    @endif
                                    @if(Auth::user())
                                      @if(Auth::user()->level == 2)
                                          <li><a href="javascript:void(0)" class="info" onclick="logTT()"><b style="color: red;">Tài Khoản</b></a></li>
                                      @endif
                                    @endif
                                    @if(Auth::user())
                                    @endif
                                    @if( Auth::user() || Auth::guard('nhahang')->user())
                                        <li><a href="dangxuat">Đăng Xuất</a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
<!-- Modal đăng nhập-->
<div class="modal fade" id="modal-signin" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span><i class="fa fa-lock" aria-hidden="true"></i></span> Đăng Nhập</h4>
        </div>
        <div class="modal-body" style="padding:35px 50px;">
          <form role="form" action="dangnhap" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
            <div class="form-group">
              <label for="usrname" style="color: black"><span><i class="fa fa-user" aria-hidden="true"></i></span> Tên Đăng Nhập</label>
              <input type="text" class="form-control login_modal_class" name="username" required="" placeholder="Nhập Tài Khoản">
            </div>
            <div class="form-group" >
              <label for="psw" style="color: black"><span><i class="fa fa-eye" aria-hidden="true"></i></span> Mật Khẩu</label>
              <input type="password" class="form-control login_modal_class" name="password" required="" placeholder="Nhập Mật Khẩu">
            </div>
            <button type="submit" class="btn btn-success btn-block btn-signin_class"><span><i class="fa fa-power-off" aria-hidden="true"></i></span> Đăng Nhập</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" id="btn-signin-cancel" data-dismiss="modal"><span ><i class="fa fa-times" aria-hidden="true"></i></span> Thoát</button>
          <button style="margin-left: 21px;height: 34px;background-color: #cbc042;padding-top: 4px;border-radius: 6px;" type="submit" class="btn-default pull-left"><a href="{{route('google.login')}}"> Login with Google <i style="color: red;" class="fa fa-google-plus" aria-hidden="true"></i></a></button>
            <p><u>Chưa Có Tài Khoản ? </u><a href="javascript:void(0)" class="signup" id="a-signup" style="color:blue">
                    Đăng Ký</a></p>
        </div>
      </div>
    </div>
  </div>
<!--hết modal đăng nhập-->

<!-- Modal đăng ký-->
<div class="modal fade" id="modal-signup" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span><i class="fa fa-lock" aria-hidden="true"></i></span> Đăng ký Tài Khoản</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form" action="dangky" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
            <div class="form-group">
              <label for="usrname" style="color: black"><span><i class="fa fa-user" aria-hidden="true"></i></span>Họ và Tên</label>
              <input type="text" class="form-control signup_modal_class" name="fullname" required="" placeholder="Nhập Họ Và Tên">
            </div>
            <div class="form-group">
              <label for="usrname" style="color: black"><span><i class="fa fa-user" aria-hidden="true"></i></span>Tuổi</label>
              <input type="number" class="form-control signup_modal_class" name="tuoi" placeholder="Nhập Tuổi Của Bạn">
            </div>
            <div class="form-group">
              <label for="usrname" style="color: black"><span><i class="fa fa-user" aria-hidden="true"></i></span>Công Việc Hiện Tại</label>
              <input type="text" class="form-control signup_modal_class"  name="congviec" placeholder="Công Việc Hiện Tại">
            </div>
             <div class="form-group">
              <label for="usrname" style="color: black"><span><i class="fa fa-user" aria-hidden="true"></i></span>Giới Tính:</label>
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
              <label class="radio-inline" for="usrname" style="color: black">
                  <input name="rdoGT" value="1" checked="" type="radio"><b>Nam</b>
              </label>
              <label class="radio-inline" for="usrname" style="color: black">
                  <input name="rdoGT" value="2" type="radio"><b>Nữ</b>
              </label>
              <label class="radio-inline" for="usrname" style="color: black">
                  <input name="rdoGT" value="3" type="radio"><b>Không Xác Định</b>
              </label>
            </div>
            <div class="form-group" >
              <label for="psw" style="color: black"><span><i class="fa fa-envelope" aria-hidden="true"></i></span> Địa Chỉ Mail</label>
              <input type="email" class="form-control signup_modal_class" name="email" required="" placeholder="Nhập Mail">
            </div>
            <div class="form-group">
              <label for="usrname" style="color: black"><span><i class="fa fa-user" aria-hidden="true"></i></span>Tên Tài Khoản</label>
              <input type="text" class="form-control signup_modal_class" name="tentaikhoan" required="" placeholder="Nhập tên tài khoản">
            </div>
            <div class="form-group" >
              <label for="psw" style="color: black"><span><i class="fa fa-eye" aria-hidden="true"></i></span>Mật Khẩu</label>
              <input type="password" class="form-control signup_modal_class" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title=":  Mật khẩu phải chứa ít nhất một ký tự thường,một ký tự hoa,một chứ số và mật khẩu phải dài hơn 8 ký tự" required="" placeholder="Nhập Mật Khẩu">
            </div>
            <div class="form-group" >
              <label for="psw" style="color: black"><span><i class="fa fa-eye" aria-hidden="true"></i></span> Xác Nhận Mật Khẩu</label>
              <input type="password" class="form-control signup_modal_class" name="passwordAgain" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" onchange="this.setCustomValidity(this.validity.patternMismatch ? this.title : '');" title="Mật khẩu xác nhận không đúng..." required="" placeholder="Nhập Lại Mật Khẩu">
            </div>
            <div class="form-group">
              <label for="usrname" style="color: black"><span><i class="fa fa-picture-o" aria-hidden="true"></i></span>Ảnh Đại Diện</label>
              <input type="file" id="usrname-4" name="anh" placeholder="Chọn Ảnh" required="">
            </div>
              <button type="submit" class="btn btn-success btn-block btn-signin_class"><span><i class="fa fa-power-off" aria-hidden="true"></i></span> Đăng Ký</button>
          </form>
        </div>
      </div>

    </div>
  </div>
<!--Het phan modal dang ky-->

<!-- Modal thông tin tài khoản-->
@if(Auth::user())
  <div class="modal fade" id="modal-infotk" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header" style="padding:35px 50px;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4><span><i class="fa fa-lock" aria-hidden="true"></i></span>Thông Tin Tài Khoản</h4>
          </div>
          <div class="modal-body" style="padding:40px 50px;">
            <form role="form" action="suataikhoan" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{csrf_token()}}" />
              <div class="form-group">
               <input type="checkbox" name="changeInfo" id="changeInfo">
               <label style="color: black">Sửa Tài Khoản</label><br>
              </div>
              <div class="form-group">
                <label for="usrname" style="color: black"><span><i class="fa fa-user" aria-hidden="true"></i></span>Họ và Tên</label>
                <input type="text" class="form-control sua account_info_modal_class" name="fullname" required="" value="{{Auth::user()->hovaten}}" disabled="">
              </div>
              <div class="form-group">
                <label for="usrname" style="color: black"><span><i class="fa fa-user" aria-hidden="true"></i></span>Tuổi</label>
                <input type="number" class="form-control sua account_info_modal_class" name="tuoi" value="{{Auth::user()->tuoi}}" disabled="">
              </div>
              <div class="form-group">
                <label for="usrname" style="color: black"><span><i class="fa fa-user" aria-hidden="true"></i></span>Công Việc Hiện Tại</label>
                <input type="text" class="form-control sua account_info_modal_class" name="congviec" value="{{Auth::user()->congviec}}" disabled="">
              </div>
              <div class="form-group">
                <label for="usrname" style="color: black"><span><i class="fa fa-user" aria-hidden="true"></i></span>Giới Tính:</label>
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                <label class="radio-inline" for="usrname" style="color: black">
                    <input disabled="" class="sua" name="rdoGT" value="1" @if(Auth::user()->gioitinh == "Nam") {{"checked"}} @endif type="radio"><b>Nam</b>
                </label>
                <label class="radio-inline" for="usrname" style="color: black">
                    <input disabled="" class="sua" name="rdoGT" value="2" @if(Auth::user()->gioitinh == "Nữ") {{"checked"}} @endif type="radio"><b>Nữ</b>
                </label>
                <label class="radio-inline" for="usrname" style="color: black">
                    <input disabled="" class="sua" name="rdoGT" value="3" @if(Auth::user()->gioitinh == "Không Xác Định") {{"checked"}} @endif  type="radio"><b>Không Xác Định</b>
                </label>
              </div>
              <div class="form-group" >
                <label for="psw" style="color: black"><span><i class="fa fa-envelope" aria-hidden="true"></i></span> Địa Chỉ Mail</label>
                <input type="email" class="form-control account_info_modal_class" name="email"  value="{{Auth::user()->email}}" disabled="">
              </div>
              <div class="form-group">
                <label for="usrname" style="color: black"><span><i class="fa fa-user" aria-hidden="true"></i></span>Tên Tài Khoản</label>
                <input type="text" class="form-control sua account_info_modal_class" name="tentaikhoan" value="{{Auth::user()->tentaikhoan}}" disabled="">
              </div>
              <div class="form-group">
               <input type="checkbox" name="changePass" id="changePass">
               <label style="color: black">Đổi Mật Khẩu</label><br>
              </div>
              <div class="form-group" >
                <label for="psw" style="color: black"><span><i class="fa fa-eye" aria-hidden="true"></i></span>Mật Khẩu</label>
                <input type="password" class="form-control suap account_info_modal_class" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title=":  Mật khẩu phải chứa ít nhất một ký tự thường,một ký tự hoa,một chứ số và mật khẩu phải dài hơn 8 ký tự" required="" placeholder="Nhập Mật Khẩu Mới" disabled="">
              </div>
              <div class="form-group">
                <label for="psw" style="color: black"><span><i class="fa fa-eye" aria-hidden="true"></i></span> Xác Nhận Mật Khẩu</label>
                <input type="password" class="form-control suap account_info_modal_class" name="passwordAgain" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" onchange="this.setCustomValidity(this.validity.patternMismatch ? this.title : '');" title="Mật khẩu xác nhận không đúng..." required="" placeholder="Nhập Lại Mật Khẩu Mới" disabled="">
              </div>
              <div class="form-group">
                <label for="usrname" style="color: black"><span><i class="fa fa-picture-o" aria-hidden="true"></i></span>Ảnh Đại Diện</label>
                <img src="{{ Auth::user()->anhdaidien }}" alt="Kết nói internet không ổn định.." width="" height="">
              </div>
              <div class="form-group">
                <label for="usrname" style="color: black"><span><i class="fa fa-picture-o" aria-hidden="true"></i></span>Ảnh Đại Diện</label>
                <input type="file" class="sua" id="usrname-03" name="anh" placeholder="Chọn Ảnh" disabled="">
              </div>
              <button type="submit" class="btn btn-success btn-block btn-signin_class"><span><i class="fa fa-power-off" aria-hidden="true"></i></span>Sửa Thông Tin</button>
              <br>
              <br>
              <button type="submit" class="btn btn-danger btn-block" id="btn-signin-cancel" data-dismiss="modal"><span ><i class="fa fa-times" aria-hidden="true"></i></span> Thoát</button>
            </form>
          </div>
        </div>
      </div>
  </div>
@endif
<!--Het phan Modal thông tin tài khoản-->
<!-- Form Tìm Kiếm-->
<div class="modal fade" id="modal-search" role="dialog">
    <div class="modal-dialog">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
          <input name="key" type="search" {{-- oninput="search()" --}} onkeyup="search()" class="form-control" id="key" required="" placeholder="Tìm Kiếm ?">
        </div>
        {{-- <ul class="list-group" id="ketqua">
        </ul> --}}
        <div class="modal-content" style="overflow: auto; height:35em ">
          <ul class="list-group" id="ketqua">
          </ul>
        </div>
    </div>
</div>
{{--hết form tìm kiếm--}}
{{-- Phần xử lý gửi dữ liệu tìm kiếm lên server--}}
{{-- Thông báo cho người dùng --}}
<div>
    <div id="modal-notification" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="color: #da7908">Thông Báo</h4>
                </div>
                <div class="modal-body" id="notification-body">
                    <div class="row">
                        <div class="col-md-12" id="notifi-content">

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" style="background: orange;">
                        Thoát
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
{{--    Hết modal thông báo cho người dùng  --}}
    {{-- Khảo sát người dùng --}}
    {{--  Modal khảo sát thị yếu của người dùng --}}
    <div id="modal-survey" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Bạn Quan Tâm Tới Những Loại Món Ăn Nào?</h4>
                </div>
                <div class="modal-body">
                    @php
                        $i = 0;
                    @endphp
                    <div class="row">
                        @foreach ($loaimons as $lm )
                            @php
                                $i++;
                            @endphp
                            <div class="col-md-4">
                                <p>
                                    <input type="checkbox" name="checkbox_survey" value="{{$lm->id}}" id="{{$lm->id}}">
                                    <label for="{{$lm->id}}">{{$lm->ten}}</label>
                                </p>
                            </div>
                        @endforeach
                    </div>
                    <div class="row" style="margin-top:5em;overflow: auto; ">
                        <div class="col-md-12">

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button onclick="sendUserSurvey()" type="button" class="btn btn-success" data-dismiss="modal"
                            style="background: green;">
                        Gửi
                    </button>
                    <button type="button" class="btn btn-default" data-dismiss="modal" style="background: black;">
                        Thoát
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{-- Hết modal khảo sát người dùng --}}
</header>
    {{-- Xử lý cookie--}}
<script>
    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires="+ d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires;
    }
    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for(var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }
    function deleteCookie(cname) {
        var result = true;
        if (findCookie(cname)) {
            document.cookie = cname + "=" + "" + "; expires=Thu, 01 Jan 1970 00:00:00 GMT";
        }
        return result;
    }
    function setCookieMy(cname, cvalue, exDate) {
        document.cookie = cname + "=" + cvalue + ";" + "expires=Thu, 01 Jan 2020 00:00:00 GMT";
    }
    function findCookie(cname) {
        var result = null;
        var allCookie = document.cookie.split(';');
        for (var i = 0; i < allCookie.length; i++) {
            if(allCookie[i].split('=')[0] === cname) {
                result = allCookie[i].split('=')[1];
            }
        }
        return result;
    };
</script>
{{--check user_id--}}
@if(Auth::user())
    <script>
        var user_id = `{{ Auth::user()->id }}`;
        var user_loged = true;
        deleteCookie("user_id");
    </script>
@else
    <script>
        var user_id = findCookie("user_id") || null;
        var user_loged = false;
    </script>
@endif

<script>
    var referer = document.referrer;
    var mon_an_id_referrer = 0;

    if (referer) {
        var split_referrer = parseInt(referer.split('/').pop());
        if (split_referrer == NaN) {
            mon_an_id_referrer = 0;
        }
        if (Number.isInteger(split_referrer)) {
            mon_an_id_referrer = split_referrer
        } else {
            mon_an_id_referrer = 0;
        }
    }
</script>

<script>
    function sendKeySearch(data) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type:'POST',
            url: 'user/logs/data/key-search',
            data:{
                'id_mon_an': data,
                'user_id': user_id || findCookie("user_id"),
                'user_loged': user_loged,
                'mon_an_id_referrer': mon_an_id_referrer,
            },
            success:function(response){
                console.log(response);
                if (response.status) {
                    if (!findCookie("user_id")) {
                        setCookieMy("user_id", response.data, 1);
                    }
                }
                if (user_loged) {
                    deleteCookie("user_id");
                }
            },
            error:function( err) {
                console.log(err);
            }
        });
    }
</script>
<!--End of header -->
{{-- Phan search --}}
<script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        function search(){
            var key=document.getElementById("key").value;
            var url = "{{route('timkiem_monan')}}";
            var link= document.URL;
            link= link.split('/').pop();
            console.log(link);
            console.log(key);
            if(link != "nhahang"){
                $.ajax({
                  type: 'POST',
                  url: url,
                  data: {'key': key,
                          'link': link},
                  success: function(response){
                              // console.log("response: ");
                              // console.log(response);
                              var str="";
                              var list_monan=response;
                              for (var i=0; i < list_monan.length; i++) {
                                  str +=
                                      `
                                         <a onclick="sendKeySearch(${list_monan[i].id})" href='chitietmonan/${list_monan[i].id}' class='list-group-item'>
                                         <img src='uploads/monan/${list_monan[i].anh_monan}' width='50px' height='50px' class='img-rounded'>
                                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                         <span class='text-info'>${list_monan[i].ten_monan}</span>
                                         </a>
                                        `;
                              }
                              document.getElementById('ketqua').innerHTML=str;
                          },
                  error: function(error){
                      console.log("Error Search Monan");
                      console.log(error);
                  }
                });
          }else{
                $.ajax({
                  type: 'POST',
                  url: url,
                  data: {'key': key,
                          'link': link},
                  success: function(response){
                              // console.log(response);
                              var str="";
                              var list_monan=response;
                              for (var i=0; i < list_monan.length; i++) {
                                str +=
                                   "<a  href='chitietmonannhahang/"+ list_monan[i].id +"' class='list-group-item'>"
                                   + "<img src='"+ list_monan[i].image +"' width='50px' height='50px' class='img-rounded'>"
                                   + "<span class='text-info'>" + list_monan[i].tenmon +"</span>"
                                   + "</a>";
                              }
                              document.getElementById('ketqua').innerHTML=str;
                          },
                  error: function(error){
                      console.log("Error Search Monan");
                      console.log(error);
                  }
                });
           }
        }
</script>
{{-- sửa thông tin tài khoản --}}
<script>
        $(document).ready(function(){
            $("#changeInfo").change(function(){
                if($(this).is(":checked")){
                        $(".sua").removeAttr('disabled');
                }else{
                        $(".sua").attr('disabled','');
                }
            });
             $("#changePass").change(function(){
                if($(this).is(":checked")){
                        $(".suap").removeAttr('disabled');
                }else{
                        $(".suap").attr('disabled','');
                }
            });
        });
</script>
@if(Auth::user())
    <script>
        $(document).ready(function () {
            setTimeout(function () {
                $("#modal-survey").modal();
            }, `{{$timeout_survey}}` / 5);
        });
    </script>
@endif
<script>
    var user_id = -1;
    @if (Auth::user())
        user_id = `{{ Auth::user()->id }}`;

    @endif
    function sendUserSurvey() {
        var loaimons_checked = [];
        $("input:checkbox[name=checkbox_survey]:checked").each(function () {
            loaimons_checked.push($(this).val());
        });
        console.log(loaimons_checked);
        console.log(user_id);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: 'user/data/survey/v1',
            data: {
                'user_id': user_id,
                'loaimons_checked': loaimons_checked,
            },
            success: function (response) {
                console.log(response);
            },
            error: function (err) {
                console.log(err);
            }
        });
    }
</script>