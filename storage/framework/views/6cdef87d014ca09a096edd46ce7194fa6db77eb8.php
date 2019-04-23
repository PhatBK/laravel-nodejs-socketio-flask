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
                                    <li><a href="<?php echo e(route('loaimon')); ?>">Thể Loại</a></li>
                                    <li><a href="<?php echo e(route('mucdich')); ?>">Mục Đích</a></li>
                                     <li><a href="<?php echo e(route('congdung')); ?>">Công Dụng</a></li>
                                    <li><a href="<?php echo e(route('vungmien')); ?>">Ăn Cả Thế Giới</a></li>
                                    <li>
                                        <a href="" data-toggle="dropdown" role="button" aria-haspopup="true"
                                               aria-expanded="false" class="search" >
                                        <span class="fa fa-search"></span></a>
                                    </li>
                                    <?php if(!Auth::guard('nhahang')->user()): ?>
                                      <li><a href="monan/ajax">Món Ăn</a></li>
                                    <?php endif; ?>
                                    <li><a href="dangbai">Bài Viết</a></li>
                                    <li><a href="<?php echo e(route('nhahang')); ?>">Nhà Hàng Liên Kết</a></li>
                                    <?php if(Auth::guard('nhahang')->user()): ?>
                                        <li>
                                          <a href="nhahang/thongtin">
                                             <b style="color: red;">Dành Cho Nhà Hàng</b>
                                          </a>
                                        </li>
                                    <?php endif; ?>

                                    <?php if( !Auth::user() && !Auth::guard('nhahang')->user()): ?>
                                      <li><a href="javascript:void(0)" class="signin">Đăng Nhập</a></li>
                                      <li><a href="javascript:void(0)" class="signup">Đăng Ký</a></li>
                                    <?php endif; ?>
                                    <?php if(Auth::user()): ?>
                                      <?php if(Auth::user()->level == 0 || Auth::user()->level == 1): ?>
                                        <li><a href="admin/info-page-admin" target="_blank"><b style="color: red;">Quản Trị</b></a></li>
                                      <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if(Auth::user()): ?>
                                      <?php if(Auth::user()->level == 2): ?>
                                          <li><a href="javascript:void(0)" class="info" onclick="logTT()"><b style="color: red;">Tài Khoản</b></a></li>
                                      <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if(Auth::user()): ?>
                                    <?php endif; ?>
                                    <?php if( Auth::user() || Auth::guard('nhahang')->user()): ?>
                                        <li><a href="dangxuat">Đăng Xuất</a></li>
                                    <?php endif; ?>
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
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
            <div class="form-group">
              <label for="usrname" style="color: black"><span><i class="fa fa-user" aria-hidden="true"></i></span> Tên Đăng Nhập</label>
              <input type="text" class="form-control" id="usrname" name="username" required="" placeholder="Nhập Tài Khoản">
            </div>
            <div class="form-group" >
              <label for="psw" style="color: black"><span><i class="fa fa-eye" aria-hidden="true"></i></span> Mật Khẩu</label>
              <input type="password" class="form-control" id="psw" name="password" required="" placeholder="Nhập Mật Khẩu">
            </div>
            <button type="submit" class="btn btn-success btn-block" id="btn-signin"><span><i class="fa fa-power-off" aria-hidden="true"></i></span> Đăng Nhập</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" id="btn-signin-cancel" data-dismiss="modal"><span ><i class="fa fa-times" aria-hidden="true"></i></span> Thoát</button>
          <button style="margin-left: 21px;height: 34px;background-color: #cbc042;padding-top: 4px;border-radius: 6px;" type="submit" class="btn-default pull-left"><a href="<?php echo e(route('google.login')); ?>"> Login with Google <i style="color: red;" class="fa fa-google-plus" aria-hidden="true"></i></a></button>
          <p><u>Chưa Có Tài Khoản ? </u><a href="javascript:void(0)" class="signup" id="a-signup"> Đăng Ký</a></p>
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
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
            <div class="form-group">
              <label for="usrname" style="color: black"><span><i class="fa fa-user" aria-hidden="true"></i></span>Họ và Tên</label>
              <input type="text" class="form-control" id="usrname" name="fullname" required="" placeholder="Nhập Họ Và Tên">
            </div>
            <div class="form-group">
              <label for="usrname" style="color: black"><span><i class="fa fa-user" aria-hidden="true"></i></span>Tuổi</label>
              <input type="number" class="form-control" id="usrname" name="tuoi" placeholder="Nhập Tuổi Của Bạn">
            </div>
            <div class="form-group">
              <label for="usrname" style="color: black"><span><i class="fa fa-user" aria-hidden="true"></i></span>Công Việc Hiện Tại</label>
              <input type="text" class="form-control" id="usrname" name="congviec" placeholder="Công Việc Hiện Tại">
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
              <input type="email" class="form-control" id="psw" name="email" required="" placeholder="Nhập Mail">
            </div>
            <div class="form-group">
              <label for="usrname" style="color: black"><span><i class="fa fa-user" aria-hidden="true"></i></span>Tên Tài Khoản</label>
              <input type="text" class="form-control" id="usrname" name="tentaikhoan" required="" placeholder="Nhập tên tài khoản">
            </div>
            <div class="form-group" >
              <label for="psw" style="color: black"><span><i class="fa fa-eye" aria-hidden="true"></i></span>Mật Khẩu</label>
              <input type="password" class="form-control" name="password" id="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title=":  Mật khẩu phải chứa ít nhất một ký tự thường,một ký tự hoa,một chứ số và mật khẩu phải dài hơn 8 ký tự" required="" placeholder="Nhập Mật Khẩu">
            </div>
            <div class="form-group" >
              <label for="psw" style="color: black"><span><i class="fa fa-eye" aria-hidden="true"></i></span> Xác Nhận Mật Khẩu</label>
              <input type="password" class="form-control" name="passwordAgain" id="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" onchange="this.setCustomValidity(this.validity.patternMismatch ? this.title : '');" title="Mật khẩu xác nhận không đúng..." required="" placeholder="Nhập Lại Mật Khẩu">
            </div>
            <div class="form-group">
              <label for="usrname" style="color: black"><span><i class="fa fa-picture-o" aria-hidden="true"></i></span>Ảnh Đại Diện</label>
              <input type="file" id="usrname-4" name="anh" placeholder="Chọn Ảnh" required="">
            </div>
              <button type="submit" class="btn btn-success btn-block" id="btn-signin"><span><i class="fa fa-power-off" aria-hidden="true"></i></span> Đăng Ký</button>
          </form>
        </div>
      </div>

    </div>
  </div>
<!--Het phan modal dang ky-->

<!-- Modal thông tin tài khoản-->
<?php if(Auth::user()): ?>
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
              <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
              <div class="form-group">
               <input type="checkbox" name="changeInfo" id="changeInfo">
               <label style="color: black">Sửa Tài Khoản</label><br>
              </div>
              <div class="form-group">
                <label for="usrname" style="color: black"><span><i class="fa fa-user" aria-hidden="true"></i></span>Họ và Tên</label>
                <input type="text" class="form-control sua" id="usrname-00" name="fullname" required="" value="<?php echo e(Auth::user()->hovaten); ?>" disabled="">
              </div>
              <div class="form-group">
                <label for="usrname" style="color: black"><span><i class="fa fa-user" aria-hidden="true"></i></span>Tuổi</label>
                <input type="number" class="form-control sua" id="usrname-01" name="tuoi" value="<?php echo e(Auth::user()->tuoi); ?>" disabled="">
              </div>
              <div class="form-group">
                <label for="usrname" style="color: black"><span><i class="fa fa-user" aria-hidden="true"></i></span>Công Việc Hiện Tại</label>
                <input type="text" class="form-control sua" id="usrname-02" name="congviec" value="<?php echo e(Auth::user()->congviec); ?>" disabled="">
              </div>
              <div class="form-group">
                <label for="usrname" style="color: black"><span><i class="fa fa-user" aria-hidden="true"></i></span>Giới Tính:</label>
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                <label class="radio-inline" for="usrname" style="color: black">
                    <input disabled="" class="sua" name="rdoGT" value="1" <?php if(Auth::user()->gioitinh == "Nam"): ?> <?php echo e("checked"); ?> <?php endif; ?> type="radio"><b>Nam</b>
                </label>
                <label class="radio-inline" for="usrname" style="color: black">
                    <input disabled="" class="sua" name="rdoGT" value="2" <?php if(Auth::user()->gioitinh == "Nữ"): ?> <?php echo e("checked"); ?> <?php endif; ?> type="radio"><b>Nữ</b>
                </label>
                <label class="radio-inline" for="usrname" style="color: black">
                    <input disabled="" class="sua" name="rdoGT" value="3" <?php if(Auth::user()->gioitinh == "Không Xác Định"): ?> <?php echo e("checked"); ?> <?php endif; ?>  type="radio"><b>Không Xác Định</b>
                </label>
              </div>
              <div class="form-group" >
                <label for="psw" style="color: black"><span><i class="fa fa-envelope" aria-hidden="true"></i></span> Địa Chỉ Mail</label>
                <input type="email" class="form-control" id="psw-01" name="email"  value="<?php echo e(Auth::user()->email); ?>" disabled="">
              </div>
              <div class="form-group">
                <label for="usrname" style="color: black"><span><i class="fa fa-user" aria-hidden="true"></i></span>Tên Tài Khoản</label>
                <input type="text" class="form-control sua" id="usrname" name="tentaikhoan" value="<?php echo e(Auth::user()->tentaikhoan); ?>" disabled="">
              </div>
              <div class="form-group">
               <input type="checkbox" name="changePass" id="changePass">
               <label style="color: black">Đổi Mật Khẩu</label><br>
              </div>
              <div class="form-group" >
                <label for="psw" style="color: black"><span><i class="fa fa-eye" aria-hidden="true"></i></span>Mật Khẩu</label>
                <input type="password" class="form-control suap" name="password" id="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title=":  Mật khẩu phải chứa ít nhất một ký tự thường,một ký tự hoa,một chứ số và mật khẩu phải dài hơn 8 ký tự" required="" placeholder="Nhập Mật Khẩu Mới" disabled="">
              </div>
              <div class="form-group">
                <label for="psw" style="color: black"><span><i class="fa fa-eye" aria-hidden="true"></i></span> Xác Nhận Mật Khẩu</label>
                <input type="password" class="form-control suap" name="passwordAgain" id="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" onchange="this.setCustomValidity(this.validity.patternMismatch ? this.title : '');" title="Mật khẩu xác nhận không đúng..." required="" placeholder="Nhập Lại Mật Khẩu Mới" disabled="">
              </div>
              <div class="form-group">
                <label for="usrname" style="color: black"><span><i class="fa fa-picture-o" aria-hidden="true"></i></span>Ảnh Đại Diện</label>
                <img src="<?php echo e(Auth::user()->anhdaidien); ?>" alt="Kết nói internet không ổn định.." width="" height="">
              </div>
              <div class="form-group">
                <label for="usrname" style="color: black"><span><i class="fa fa-picture-o" aria-hidden="true"></i></span>Ảnh Đại Diện</label>
                <input type="file" class="sua" id="usrname-03" name="anh" placeholder="Chọn Ảnh" disabled="">
              </div>
              <button type="submit" class="btn btn-success btn-block" id="btn-signin"><span><i class="fa fa-power-off" aria-hidden="true"></i></span>Sửa Thông Tin</button>
              <br>
              <br>
              <button type="submit" class="btn btn-danger btn-block" id="btn-signin-cancel" data-dismiss="modal"><span ><i class="fa fa-times" aria-hidden="true"></i></span> Thoát</button>
            </form>
          </div>
        </div>
      </div>
  </div>
<?php endif; ?>
<!--Het phan Modal thông tin tài khoản-->
<!-- Form Tìm Kiếm-->
<div class="modal fade" id="modal-search" role="dialog">
    <div class="modal-dialog">
             <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <div class="form-group">
              <input name="key" type="search"  onkeyup="search()" class="form-control" id="key" required="" placeholder="Tìm Kiếm ?">
            </div>
            
            <div class="modal-content" style="overflow: auto; height:35em ">
              <ul class="list-group" id="ketqua">
              </ul>
            </div>
    </div>
</div>
    
    
</header>




    
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

<?php if(Auth::user()): ?>
    <script>
        var user_id = `<?php echo e(Auth::user()->id); ?>`;
        var user_loged = true;
    </script>
<?php else: ?>
    <script>
        var user_id = findCookie("user_id") || null;
        // if (!findCookie("user_id")) {
        //     var user_id = null;
        // } else {
        //     var user_id = findCookie("user_id");
        // }
        // var user_loged = false;
    </script>
<?php endif; ?>

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
                if (response.status || !response.loged) {
                    if (!findCookie("user_id")) {
                        setCookieMy("user_id", response.data, 1);
                    }
                } else if (response.loged) {
                    deleteCookie("user_id");
                    document.cookie = "user_id=; expires=Thu, 01 Jan 1970 00:00:00 UTC;";
                } else {
                    alert("undifine error");
                }
            },
            error:function( err) {
                console.log(err);
            }
        });
    }
</script>
<!--End of header -->

<script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        function search(){
            var key=document.getElementById("key").value;
            var url = "<?php echo e(route('timkiem_monan')); ?>";
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

<script>
  function logDK(){
    console.log("đăng ký..");
  }
  function logDN(){
    console.log("đăng nhập..");
  }
  function logTT(){
    console.log("thông tin..");
  }
</script>


<?php /* E:\Xampp.7.3\htdocs\bkcook.vn\resources\views/customer/layouts/header.blade.php */ ?>