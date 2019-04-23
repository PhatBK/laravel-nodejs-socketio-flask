<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('Ẩm thực quanh ta')</title>
    <base href="{{asset('')}}">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <!--Google fonts Link-->
    {{-- <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,500i,700,700i" rel="stylesheet"> --}}
    <link rel="stylesheet" href="vendor_customer/vendor/css/css-google.css">
    {{-- Google fonts Link end --}}
    <link rel="stylesheet" href="vendor_customer/assets/css/skills/progressbar.css">
    <link rel="stylesheet" href="vendor_customer/assets/css/skills/style.css">
    <link rel="stylesheet" href="vendor_customer/assets/css/fonticons.css">
    <link rel="stylesheet" href="vendor_customer/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendor_customer/assets/css/bootstrap.min.css">
    <!--For Plugins external css-->
    <link rel="stylesheet" href="vendor_customer/assets/css/teamslide.css"/>
    <link rel="stylesheet" href="vendor_customer/assets/css/plugins.css"/>
    <!--Theme custom css -->
    <link rel="stylesheet" href="vendor_customer/assets/css/style.css">
    <link rel="stylesheet" href="vendor_customer/assets/css/chitietmonan.css" >
    <!--Theme Responsive css-->
    <link rel="stylesheet" href="vendor_customer/assets/css/responsive.css"/>
    <link rel="stylesheet" type="text/css" href="vendor_customer/vendor/css/mycss.css">
    <link rel="stylesheet" type="text/css" href="vendor_customer/assets/css/dangbai.css">

</head>
<body data-spy="scroll" data-target=".navbar-collapse" style="background-color: #e5e5e5;height: auto">
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->
@if (session('thongbao'))
    <script>
       {{session('thongbao')}}
    </script>
@endif
@if (session('thongbaoloi'))
    <script>
       {{session('thongbaoloi')}}
    </script>
@endif
@if(count($errors) > 0)
    @foreach ($errors->all() as $err)
        <script>
            alert("{{$err}}");
        </script>
    @endforeach
@endif
<header id="main_menu" class="header" style="background-color: #3e5b77;opacity:0.8">
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

                            <!-- Collect the nav links, forms, and other content for toggling -->

                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href="trangchu"><img style="display: inline-block; width: 20px;" src="vendor_customer/assets/images/logo.png" alt=""></a></li>
                                    @if(Auth::user())
                                    <li><a><i class="fa fa-user fa-fw">-: </i><b style="color: red;">{{ Auth::user()->tentaikhoan }}</b></a>
                                    </li>
                                    @endif
                                    @if(Auth::guard('nhahang')->user())
                                    <li><a><i class="fa fa-github-alt">-: </i><b style="color: red;">{{ Auth::guard('nhahang')->user()->username }}</b></a>
                                    </li>
                                    @endif
                                    <li><a href="trangchu">Trang Chủ</a></li>
                                    <li><a href="{{route('loaimon')}}">Thể Loại</a></li>
                                    <li><a href="{{route('mucdich')}}">Mục Đích</a></li>
                                     <li><a href="{{route('congdung')}}">Công Dụng</a></li>
                                    <li><a href="{{route('vungmien')}}">Vùng Miền</a></li>
                                    <li>
                                        <a href="" data-toggle="dropdown" role="button" aria-haspopup="true"
                                            aria-expanded="false" class="search" >
                                        <span class="fa fa-search"></span></a>
                                    </li>
                                    <li><a href="{{route('nhahang')}}">Nhà Hàng Liên Kết</a></li>
                                    @if(!Auth::guard('nhahang')->user())
                                       <li><a href="monan">Món Ăn</a></li>
                                    @endif
                                    {{-- <li><a href="monan" >Món Ăn</a></li> --}}
                                    <li><a href="dangbai">Đăng bài</a></li>

                                    @if(Auth::guard('nhahang')->user())
                                        <li>
                                          <a href="nhahang/thongtin">
                                              <b style="color: red;">Dành Cho Nhà Hàng</b>
                                          </a>
                                        </li>
                                    @endif

                                    {{-- <li><a href="#nhahang-thanhvien" class="linkthanhvien">Dành Cho Nhà Hàng</a></li> --}}
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
                                          <li><a href="javascript:void(0)" class="info"><b style="color: red;">Tài Khoản</b></a></li>
                                      @endif
                                    @endif
                                    @if(Auth::user() || Auth::guard('nhahang')->user())
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
</header> <!--End of header -->
<section class="wide-box" style="margin-top: 20px ">
    <div class="container">
        <div class="col-md-8">


            <!-- list user post-->
            <div class="row list-user-post">
                @if(Auth::user())
                <div class="user-posts-post" id="{{ Auth::user()->id }}"></div>
                <div id="ava-user-online" src="{{ Auth::user()->anhdaidien}}"></div>
                @endif
                <div class="panel panel-default user-post" id="{{$user_post->id}}-user-post">
                    <div class="panel-body">
                        <div class="row user-post-header">
                            <div class="col-sm-2">

                                <img src="{{$user_post->user->anhdaidien}}" class="card-img rounded-circle img-circle avatar-user">

                            </div>

                            <div class="col-sm-5" style="margin-left: -40px ">
                                <div class="row">
                                    <p class="name-user-post" >{{$user_post->user->tentaikhoan}}</p>
                                </div>
                                <div class="row">
                                    <p class="info-recipe-user-post">nổi bật {{$user_post->user->noibat}}</p>
                                </div>
                            </div>

                            <div class="pull-right timestamp-user-post" style="margin-right: 10px">
                                <span style="font-size: 12px">{{$user_post->created_at}}</span>
                                <span> <i class="fa fa-globe" aria-hidden="true"></i></span>
                            </div>
                        </div>

                        <div class="row user-post-title" style="margin-top: 20px">
                            <div class="container">
                                <div class="col-sm-12">
                                    <p class="user-post-title-p1">{{ $user_post->tieude }} </p>
                                    {{-- <p class="user-post-title-p2"> độ khó : dễ</p> --}}
                                </div>
                            </div>
                        </div>

                        <hr style="margin-top: 5px">

                        <div class="user-post-content" >
                            <div class="row user-post-text-content" style="margin: 0px">
                                <div class="col-sm-12">
                                    <p>
                                        @php(  $arr_text = explode("\n", $user_post->noidung)  )
                                        @foreach($arr_text as $text)
                                            {{$text}}</br>
                                        @endforeach

                                    </p>
                                </div>
                            </div>
                            <div class="row user-post-img-content" style="margin: 0px">
                                <div class="col-sm-12" style="padding-top: 20px;padding-bottom: 20px">
                                    @foreach($user_post->postimage as $postimage)

                                            <img src="{{$postimage->image}}" class="img-responsive">

                                    @endforeach
                                </div>
                            </div>

                        </div>
                        <div class="user-post-review-acts">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="pull-left">
                                        <div style="padding-left: 20px">
                                            @if(Auth::user())
                                                @php( $check = "false")
                                                @foreach($user_post->likepost as $likepost)
                                                    @if($likepost->id_user== Auth::user()->id)
                                                        @php($check = "true")
                                                    @endif
                                                @endforeach
                                                @if($check=="true")
                                                    <a class="user-post-button-like btn like-unlike like" onclick="clickLike('{{$user_post->id}}-user-post-button-like','{{ Auth::user()->id }}')" id="{{$user_post->id}}-user-post-button-like" aria-pressed="true" style="transition: 0s">
                                                        <span style="font-size: 15px">
                                                            <i class="fa fa-thumbs-o-up " aria-hidden="true"></i> thích
                                                        </span>
                                                    </a>
                                                @else
                                                    <a class="user-post-button-like btn like-unlike unlike" onclick="clickLike('{{$user_post->id}}-user-post-button-like','{{ Auth::user()->id }}')" id="{{$user_post->id}}-user-post-button-like" aria-pressed="false" style="transition: 0s">
                                                        <span style="font-size: 15px">
                                                            <i class="fa fa-thumbs-o-up  " aria-hidden="true"></i> thích
                                                        </span>
                                                    </a>
                                                @endif
                                            @else
                                                <a class="user-post-button-like btn like-unlike unlike disabled" id="{{$user_post->id}}-user-post-button-like" aria-pressed="false" style="transition: 0s">
                                                        <span style="font-size: 15px">
                                                            <i class="fa fa-thumbs-o-up  " aria-hidden="true"></i> thích
                                                        </span>
                                                </a>
                                            @endif
                                                <a class="user-post-button-comment btn" onclick="clickButtonComment('{{$user_post->id}}-user-post-button-comment')" id="{{$user_post->id}}-user-post-button-comment">
                                                    <span  style="font-size: 15px">
                                                        <i class="fa fa-comments-o " aria-hidden="true"></i> bình luận
                                                    </span>
                                                </a>
                                                <a class="user-post-button-share btn">
                                                    <span  style="font-size: 15px">
                                                        <i class="fa fa-share-square-o" aria-hidden="true"></i> chia sẻ
                                                    </span>
                                                </a>

                                        </div>

                                    </div>
                                    <div class="pull-right user-post-view">
                                        <span style="font-size: 14px">{{$user_post->soluotxem}} lượt xem <i class="fa fa-eye" aria-hidden="true"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer" id="{{$user_post->id}}-panel-footer">

                        <div class="user-post-react" id="{{$user_post->id}}-user-post-react">
                            @isset($check)
                                @if ($user_post->soluotthich > 1 && $check=="true")
                                <div class="row">
                                    <div class="col-sm-12" >
                                        <p>
                                            <i class="fa fa-heart" aria-hidden="true"></i>
                                            ban va {{$user_post->soluotthich -1}} người thích bài viết này
                                        </p>
                                    </div>
                                </div>
                                @elseif ($user_post->soluotthich > 0 && $check=="false")
                                <div class="row">
                                    <div class="col-sm-12" >
                                        <p>
                                            <i class="fa fa-heart" aria-hidden="true"></i>
                                            {{$user_post->soluotthich}} người thích bài viết này
                                        </p>
                                    </div>
                                </div>
                                @elseif ($user_post->soluotthich == 1 && $check=="true")
                                <div class="row">
                                    <div class="col-sm-12" >
                                        <p>
                                            <i class="fa fa-heart" aria-hidden="true"></i>
                                            ban thích bài viết này
                                        </p>
                                    </div>
                                </div>
                                @endif
                            @else
                                <div class="row">
                                    <div class="col-sm-12" >
                                        <p>
                                            <i class="fa fa-heart" aria-hidden="true"></i>
                                            {{$user_post->soluotthich}} người thích bài viết này
                                        </p>
                                    </div>
                                </div>
                            @endif
                        </div>


                        <hr style="margin: 10px">

                        <div class="user-post-comment-area">
                            <div class="user-post-list-comment" id="{{$user_post->id}}-user-post-list-comment">
                                @foreach($user_post->commentpost as $commentpost)
                                <div class="user-post-item-comment row" id="{{$commentpost->id}}-user-post-item-comment" style="margin-bottom: 20px">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-1 user-post-item-comment-avatar">

                                                        <img src="{{$commentpost->user->anhdaidien}}" class="img-circle img-responsive user-post-item-avatar-img">
                                            </div>
                                            <div class="col-sm-11 user-post-item-comment-content" id="{{$commentpost->id}}-user-post-item-comment-content">
                                                <div class="row">

                                                            <p class="user-post-item-comment-username">{{$commentpost->user->tentaikhoan}}</p>

                                                </div>
                                                <div class="row">
                                                    <p>{{$commentpost->noidung}}</p>
                                                </div>
                                                @if(Auth::user())
                                                <div class="row">
                                                    <a style="font-size: 14px;font-weight: 400;" href="javascript:void(0)" class="reply" onclick="replyCommentPost('{{$commentpost->id}}-reply')" id="{{$commentpost->id}}-reply">Trả lời</a>
                                                </div>
                                                @endif

                                                <!-- list reply comment -->
                                                <div class="row list-reply-comment" id="{{$commentpost->id}}-list-reply-comment">

                                                    @foreach($commentpost->reportcommentpost as $reportcommentpost)
                                                    <div class="reply-comment">
                                                        <div class="col-sm-12" style="margin-bottom: 10px">
                                                            <div class="row">
                                                                <div class="col-sm-1 img-ava">
                                                                    <img src="{{$reportcommentpost->user->anhdaidien}}" class="img-circle img-responsive user-post-item-avatar-img">
                                                                </div>
                                                                <div class="col-sm-10 comment-content">
                                                                    <div class="row">
                                                                        <p class="user-post-item-comment-username">{{$reportcommentpost->user->tentaikhoan}}</p>
                                                                    </div>
                                                                    <div class="row">
                                                                        <p>{{$reportcommentpost->noidung}} </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach

                                                </div>

                                                <!-- -->
                                                @if(Auth::user())
                                                <div class="row user-post-reply-area" id="{{$commentpost->id}}-user-post-reply-area" style="display: none">
                                                    <div class="">
                                                        <div class="col-sm-1 img-ava">
                                                            <img src="{{ Auth::user()->anhdaidien }}" class="img-circle img-responsive user-post-item-avatar-img">
                                                        </div>
                                                        <div class="col-sm-11" style="margin-left: -10px">
                                                            <span>
                                                                <textarea type="text" class="form-control user-post-reply-comment" onkeyup="keyupReplyComment('{{$commentpost->id}}-user-post-reply-comment')" id="{{$commentpost->id}}-user-post-reply-comment"></textarea>
                                                            </span>
                                                        </div>
                                                    </div>

                                                    <div class="">
                                                            <div class="pull-right" style="padding-right: 30px;margin-top: -10px">
                                                                <a class="user-post-delete-reply-comment btn" onclick="deleteReplyComment('{{$commentpost->id}}-user-post-delete-reply-comment')" id="{{$commentpost->id}}-user-post-delete-reply-comment">Hủy</a>
                                                                <a class="user-post-answer-reply-comment btn disabled" onclick="answerReplyComment('{{$commentpost->id}}-user-post-answer-reply-comment','{{ Auth::user()->id }}')" id="{{$commentpost->id}}-user-post-answer-reply-comment">Trả lời</a>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    @endif

                                                <!-- <div class="reply-comment">
                                                    <p>hai con bo an co dong xanh</p>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <!-- review comment -->
                            @if(Auth::user())
                            <div class="user-post-review-comment-container" id="{{$user_post->id}}-user-post-review-comment-container">
                                <form>
                                    <div class="row">
                                        <div class="col-sm-1 img-ava">
                                            <img src="{{Auth::user()->anhdaidien}}" class="img-circle img-responsive user-post-item-avatar-img">
                                        </div>
                                        <div class="col-sm-11" style="margin-left: -10px">
                                            <span>
                                                 <textarea type="text" onclick='clickReviewCommentArea("{{$user_post->id}}-user-post-review-comment-area")' onkeyup='keyupReviewCommentArea("{{$user_post->id}}-user-post-review-comment-area")' class="form-control user-post-review-comment-area" id="{{$user_post->id}}-user-post-review-comment-area" placeholder="thảo luận của bạn ..."></textarea>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="row user-post-action-review-comment" id="{{$user_post->id}}-user-post-action-review-comment" style="display: none">
                                        <div class="pull-right" style="padding-right: 30px;margin-top: -10px" >
                                            <a class="btn btn-default user-post-delete-review-comment" onclick="deleteReviewComment('{{$user_post->id}}-user-post-delete-review-comment')" id="{{$user_post->id}}-user-post-delete-review-comment">Hủy</a>
                                            <a class="btn btn-default user-post-answer-review-comment" onclick="answerReviewComment('{{$user_post->id}}-user-post-answer-review-comment','{{ Auth::user()->id }}')" id="{{$user_post->id}}-user-post-answer-review-comment">Trả lời</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- top chef -->
        <div class="col-md-4">


            <!-- top chef -->
            <div  id="top-chef">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="top-chef-title">
                            <div class="row">
                                <div class="col-sm-12">
                                    <p><span><i class="fa fa-users" aria-hidden="true"></i> </span> Top Thành Viên</p>
                                </div>
                            </div>

                            <hr>

                        </div>
                        <div class="chef-list">
                            @foreach($top10_users as $top_user)
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="col-sm-5">
                                                <img src="{{$top_user->anhdaidien}}" class="card-img rounded-circle img-circle avatar-user" id="avatar">
                                            </div>
                                            <div class="col-sm-5" style="margin-left: -30px ">
                                                <div class="row">
                                                    <a href=""><p class="chef-info-name">{{$top_user->tentaikhoan}}</p></a>
                                                </div>
                                                <div class="row">
                                                    <p class="chef-info-recipe">nổi bật : {{$top_user->noibat}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<div class="scrollup">
    <a href="#"><i class="fa fa-chevron-up"></i></a>
</div>
{{-- Modal đăng nhập --}}
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
              <input type="text" class="form-control" id="usrname" name="username" required="" placeholder="Nhập Tài Khoản">
            </div>
            <div class="form-group" >
              <label for="psw" style="color: black"><span><i class="fa fa-eye" aria-hidden="true"></i></span> Mật Khẩu</label>
              <input type="password" class="form-control" id="psw" name="password" required="" placeholder="Nhập Mật Khẩu">
            </div>
            <div class="checkbox">
              <label><input type="checkbox" value="" checked>Nhớ Tôi</label>
            </div>
              <button type="submit" class="btn btn-success btn-block" id="btn-signin"><span><i class="fa fa-power-off" aria-hidden="true"></i></span> Đăng Nhập</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" id="btn-signin-cancel" data-dismiss="modal"><span ><i class="fa fa-times" aria-hidden="true"></i></span> Thoát</button>
          <button style="margin-left: 21px;height: 34px;background-color: #cbc042;padding-top: 4px;border-radius: 6px;" type="submit" class="btn-default pull-left"><a href="{{route('google.login')}}"> Login with Google <i style="color: red;" class="fa fa-google-plus" aria-hidden="true"></i></a></button>
          <p><u>Chưa Có Tài Khoản ?</u> <a href="javascript:void(0)" class="signup" id="a-signup"> Đăng Ký</a></p>
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
              <input type="text" class="form-control" id="usrname" name="fullname" required="" placeholder="Nhập Họ Và Tên">
            </div>
            <div class="form-group">
              <label for="usrname" style="color: black"><span><i class="fa fa-user" aria-hidden="true"></i></span>Tuổi</label>
              <input type="text" class="form-control" id="usrname" name="tuoi" placeholder="Nhập Tuổi Của Bạn">
            </div>
            <div class="form-group">
              <label for="usrname" style="color: black"><span><i class="fa fa-user" aria-hidden="true"></i></span>Công Việc Hiện Tại</label>
              <input type="text" class="form-control" id="usrname" name="congviec" placeholder="Nhập Họ Và Tên">
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
              <input type="file" id="usrname" name="anh" placeholder="Chọn Ảnh">
            </div>

            <div class="checkbox">
              <label><input type="checkbox" value="">Ghi Nhớ</label>
            </div>
              <button type="submit" class="btn btn-success btn-block" id="btn-signin"><span><i class="fa fa-power-off" aria-hidden="true"></i></span> Đăng Ký</button>
          </form>
        </div>
      </div>
    </div>
</div>
{{-- Modal thông tin tài khoản --}}
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
               <input type="checkbox" name="changePass" id="changePass">
               <label style="color: black">Sửa Tài Khoản</label><br>
              </div>
              <div class="form-group">
                <label for="usrname" style="color: black"><span><i class="fa fa-user" aria-hidden="true"></i></span>Họ và Tên</label>
                <input type="text" class="form-control sua" id="usrname" name="fullname" required="" value="{{Auth::user()->hovaten}}" disabled="">
              </div>
              <div class="form-group">
                <label for="usrname" style="color: black"><span><i class="fa fa-user" aria-hidden="true"></i></span>Tuổi</label>
                <input type="number" class="form-control sua" id="usrname" name="tuoi" value="{{Auth::user()->tuoi}}" disabled="">
              </div>
              <div class="form-group">
                <label for="usrname" style="color: black"><span><i class="fa fa-user" aria-hidden="true"></i></span>Công Việc Hiện Tại</label>
                <input type="text" class="form-control sua" id="usrname" name="congviec" value="{{Auth::user()->congviec}}" disabled="">
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
                {{-- <input type="text" class="form-control" id="usrname" name="gioitinh" placeholder="Giới Tính"> --}}
              </div>
              <div class="form-group" >
                <label for="psw" style="color: black"><span><i class="fa fa-envelope" aria-hidden="true"></i></span> Địa Chỉ Mail</label>
                <input type="email" class="form-control sua" id="psw" name="email" required="" value="{{Auth::user()->email}}" disabled="">
              </div>
              <div class="form-group">
                <label for="usrname" style="color: black"><span><i class="fa fa-user" aria-hidden="true"></i></span>Tên Tài Khoản</label>
                <input type="text" class="form-control tentaikhoan" id="usrname" name="tentaikhoan" required="" value="{{Auth::user()->tentaikhoan}}" disabled="">
              </div>
              <div class="form-group" >
                <label for="psw" style="color: black"><span><i class="fa fa-eye" aria-hidden="true"></i></span>Mật Khẩu</label>
                <input type="password" class="form-control sua" name="password" id="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title=":  Mật khẩu phải chứa ít nhất một ký tự thường,một ký tự hoa,một chứ số và mật khẩu phải dài hơn 8 ký tự" required="" placeholder="Nhập Mật Khẩu" disabled="">
              </div>
              <div class="form-group" >
                <label for="psw" style="color: black"><span><i class="fa fa-eye" aria-hidden="true"></i></span> Xác Nhận Mật Khẩu</label>
                <input type="password" class="form-control sua" name="passwordAgain" id="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" onchange="this.setCustomValidity(this.validity.patternMismatch ? this.title : '');" title="Mật khẩu xác nhận không đúng..." required="" placeholder="Nhập Lại Mật Khẩu" disabled="">
              </div>
              <div class="form-group">
                <label for="usrname" style="color: black"><span><i class="fa fa-picture-o" aria-hidden="true"></i></span>Ảnh Đại Diện</label>
                <img src="{{ Auth::user()->anhdaidien }}" alt="Kết nói internet không ổn định.." width="" height="">
              </div>
              <div class="form-group">
                <label for="usrname" style="color: black"><span><i class="fa fa-picture-o" aria-hidden="true"></i></span>Ảnh Đại Diện</label>
                <input type="file" class="sua" id="usrname" name="anh" placeholder="Chọn Ảnh" required="" disabled="">
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
@endif
<!-- Modal recipient chia sẻ cong thức-->
<!-- Form Tìm Kiếm-->
<div class="modal fade" id="modal-search" role="dialog">
    <div class="modal-dialog">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group">
              <input name="key" type="search" oninput="search()" class="form-control" id="key" required="" placeholder="Tìm Kiếm ?">
            </div>
         {{--    <ul class="list-group" id="ketqua">
            </ul> --}}
            <div class="modal-content" style="overflow: auto; height:35em ">
              <ul class="list-group" id="ketqua">
              </ul>
            </div>
    </div>
</div>
<!--Hết form tìm kiêm-->

{{--Modal chia se cong thuc --}}
<div class="modal fade" id="modal-recipient" role="dialog">
        <div class="modal-dialog" style="min-width: 1000px">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="padding:35px 50px;">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4><span><i class="fa fa-book" aria-hidden="true"></i></span> Chia sẻ công thức nấu ăn</h4>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
                <p style="font-style: italic;font-size: 15px">Một chia sẻ với đầy nguyên liệu, các bước thực hiện sẽ giúp các thành viên tham khảo và thực hiện theo dễ hơn</p>
              <form role="form">
                <div class="form-group">
                  <input type="text" class="form-control" id="food-name" placeholder="*Tên món ăn bạn muốn chia sẻ">
                </div>
                <div class="form-group" >
                  <textarea type="text" class="form-control" id="cooking-steps" placeholder="*Nguyên liệu ,các bước thực hiện ..." rows="5"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Ảnh minh họa</label>
                    <input type="file" id="exampleInputFile">
                    <p class="help-block">Chọn ảnh minh họa</p>
                </div>
                <button type="submit" class="btn btn-success btn-block" id="btn-signin"><span><i class="fa fa-paper-plane" aria-hidden="true"></i></span> Chia sẻ công thức</button>
              </form>
            </div>
          </div>
    </div>
</div>
{{-- Hết chia sẻ công thucws --}}
<script src="vendor_customer/assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
<script src="vendor_customer/assets/js/vendor/jquery-1.11.2.min.js"></script>
<script src="vendor_customer/assets/js/vendor/bootstrap.min.js"></script>
<script src="vendor_customer/assets/js/vendor/autosize.js"></script>
<script src="vendor_customer/assets/js/jquery.easypiechart.min.js"></script>
<script src="vendor_customer/assets/js/jquery.mixitup.min.js"></script>
<script src="vendor_customer/assets/js/jquery.easing.1.3.js"></script>
<script src="vendor_customer/assets/css/skills/inview.min.js"></script>
<script src="vendor_customer/assets/css/skills/progressbar.js"></script>
<script src="vendor_customer/assets/css/skills/main.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.4/socket.io.js"></script> --}}
<script src="vendor_customer/vendor/js/socket.io.js"></script>
<script src="vendor_customer/assets/js/plugins.js"></script>
<script src="vendor_customer/assets/js/main.js"></script>
<script src="vendor_customer/assets/js/dangbai.js"></script>
<script src="vendor_customer/assets/js/modalHeader.js"></script>
{{-- hết thư viện --}}

<script type="text/javascript">
    autosize(document.querySelectorAll('textarea'));
</script>
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
            if(link!="nhahang"){
                $.ajax({
                  type: 'POST',
                  url: url,
                  data: {'key': key,
                          'link': link},
                  success: function(response){
                              console.log(response);
                              var str="";
                              var list_monan=response;
                              for (var i=0; i < list_monan.length; i++) {
                                str+=
                                    "<a  href='chitietmonan/"+ list_monan[i].id +"' class='list-group-item'>"
                                   +"<img src='uploads/monan/"+ list_monan[i].anh_monan +"' width='50px' height='50px' class='img-rounded'>"
                                   +"<span class='text-info'>" + list_monan[i].ten_monan +"</span>"
                                   +"</a>";
                              }
                              document.getElementById('ketqua').innerHTML=str;
                          },
                  error: function(error){
                          console.log("lỗi nhà tất cả chừ nhà hàng");
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
                              console.log(response);
                              var str="";
                              var list_monan=response;
                              for (var i=0; i < list_monan.length; i++) {
                                str+=
                                    "<a  href='chitietmonannhahang/"+ list_monan[i].id +"' class='list-group-item'>"
                                   +"<img src='"+ list_monan[i].image +"' width='50px' height='50px' class='img-rounded'>"
                                   +"<span class='text-info'>" + list_monan[i].tenmon +"</span>"
                                   +"</a>";
                              }
                              document.getElementById('ketqua').innerHTML=str;
                          },
                  error: function(error){
                          console.log("lỗi nhà hàng..");
                          console.log(error);
                        }
                });
           }
        }

</script>
{{-- sửa thông tin tài khoản --}}
<script>
        $(document).ready(function(){
            $("#changePass").change(function(){
                if($(this).is(":checked")){
                        $(".sua").removeAttr('disabled');
                }else{
                        $(".sua").attr('disabled','');
                }
            });
        });
</script>
</body>
</html>

