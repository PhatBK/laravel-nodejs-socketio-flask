<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('Ẩm thực quanh ta')</title>
    <meta name="description" content="">
    <base href="{{asset('')}}">
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
    {{-- <link rel="stylesheet" type="text/css" href="vendor_customer/assets/css/modalHeader.css"> --}}
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
                                    @if(!Auth::guard('nhahang')->user())
                                       <li><a href="monan">Món Ăn</a></li>
                                    @endif
                                    <li><a href="dangbai">Đăng bài</a></li>
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
                                        <li><a href="admin/info-page-admin"><b style="color: red;">Quản Trị</b></a></li>
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
            @if(Auth::user())
            <div class="row user-posts-post" id="{{Auth::user()->id}}" style="margin-bottom:-10px ">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form class="form-postpost" action="javascript:void(0)">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <div class="row" style="margin-top: 20px">
                                <div class="col-sm-2">
                                    <span>
                                        <img src="{{Auth::user()->anhdaidien}}" class="img-circle img-responsive avatar-user" id="ava-user-online">
                                    </span>
                                </div>
                                <div class="col-sm-10" style="margin-left: -40px;margin-top: 5px">
                                    <div class="row">
                                        <span>
                                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                            <input type="text" name="title" id="input-post-title" class="form-control"  placeholder="Tiêu đề bài viết" >
                                            <textarea type="text" class="form-control textarea-post-post" placeholder="Nội dung bài viết"></textarea>
                                        </span>
                                    </div>
                                    <div class="row" style="margin-top: 10px;background-color: #fafafa">
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <div class="col-sm-3" style="margin-top: 20px;">
                                                    <div style="margin-top: -20px;margin-left: 20px">
                                                       <label for="files" class="select-image-button-post-post btn">Thêm ảnh</label>
                                                       <input id="files" style="visibility:hidden;" type="file">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3" style="margin-top: 20px">
                                                    <select class="select-post-post-food-category">
                                                        <option selected disabled>-Chọn thể loại-</option>
                                                        @foreach($food_category as $element)
                                                            <option value="{{$element->id}}">{{$element->ten}}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                                <div class="col-sm-3" style="margin-top: 20px">
                                                    <select class="select-post-post-type-dish" id="sltloaimon">
                                                      <option selected disabled>-Chọn loại món-</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="row" id="selectedFiles">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="row action-post-post" style="display: none">
                                            <div class="pull-right" style="padding-right: 30px;margin-top: -10px" >
                                                <button class="delete-post-post btn btn-default">Hủy</button>
                                                <button class="send-post-post btn btn-default" onclick="clicksenduserpost({{ Auth::user()->id }})">Đăng bài</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

            </div>
            @endif

            <!-- list user post-->
            <div class="row list-user-post">
                @foreach($user_posts as $user_post)


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
                                    <p class="user-post-title-p1">{{$user_post->tieude}} </p>
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
                                                    <a class="user-post-button-like btn like-unlike like" onclick="clickLike('{{$user_post->id}}-user-post-button-like',{{ Auth::user()->id }})" id="{{$user_post->id}}-user-post-button-like" aria-pressed="true" style="transition: 0s">
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
                                                <a class="user-post-button-share btn" href="https://www.facebook.com/sharer/sharer.php?u=http://bkcook.ddns.net/bkcook.vn/public/baidangchitiet/{{$user_post->id}}&amp;src=sdkpreparse" target="_blank">
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
                @endforeach
            </div>
        </div>
        <!-- top chef -->
        <div class="col-md-4">
            <div>
                <button type="button" class="btn btn-primary modal-recipient" data-toggle="modal" >+ CHIA SE CONG THUC</button>
            </div>
            <!-- Modal-->
            <div class="modal fade" id="formularModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel">New message</h4>
                      </div>
                      <div class="modal-body">
                        <form>
                          <div class="form-group">
                            <label for="recipient-name" class="control-label">Recipient:</label>
                            <input type="text" class="form-control" id="recipient-name">
                          </div>
                          <div class="form-group">
                            <label for="message-text" class="control-label">Message:</label>
                            <textarea class="form-control" id="message-text"></textarea>
                          </div>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Send message</button>
                      </div>
                    </div>
                  </div>
                </div>

            <!-- top chef -->
            <div  id="top-chef">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="top-chef-title">
                            <div class="row">
                                <div class="col-sm-12">
                                    <p style="text-align: center;"><span><i class="fa fa-users" aria-hidden="true"></i> </span>
                                        Top Thành Viên</p>
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
<!-- Modal recipient chia sẻ cong thức-->
<!-- Form Tìm Kiếm-->
<div class="modal fade" id="modal-search" role="dialog">
    <div class="modal-dialog">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group">
              <input name="key" type="search" oninput="search()" class="form-control" id="key" required="" placeholder="Tìm Kiếm ?">
            </div>
          {{--   <ul class="list-group" id="ketqua">
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
{{-- Xử lý cookie--}}
<script>
    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires;
    }

    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for (var i = 0; i < ca.length; i++) {
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
            if (allCookie[i].split('=')[0] === cname) {
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
            type: 'POST',
            url: 'user/logs/data/key-search',
            data: {
                'id_mon_an': data,
                'user_id': user_id || findCookie("user_id"),
                'user_loged': user_loged,
                'mon_an_id_referrer': mon_an_id_referrer,
            },
            success: function (response) {
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
            error: function (err) {
                console.log(err);
            }
        });
    }
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(".select-post-post-food-category").change(function() {
            // console.log("hahaha do ngok");
            var food_category_id = $(this).val();
            // console.log(food_category_id);
            var op='';
            $.ajax({
                type:'get',
                url:'{!!URL::to("findLoaiMon")!!}',
                data:{'id':food_category_id},
                success:function(data){
                    // console.log('success');
                    console.log(data);
                    op +='<option value="0" selected disabled>-Chọn loại món-</option>';
                    for(var i=0;i<data.length;i++){
                        op +='<option value="'+data[i].id+'">'+data[i].ten+'</option>';
                    }
                    $('.select-post-post-type-dish').html(" ");
                    $('.select-post-post-type-dish').append(op);
                },
                error:function() {
                    console.log('error');
                }
            });
        });
    });
</script>
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
                                  str +=
                                      `
                                         <a onclick="sendKeySearch(${list_monan[i].id})" href='chitietmonan/${list_monan[i].id}' class='list-group-item'>
                                         <img src='uploads/monan/${list_monan[i].anh_monan}' width='50px' height='50px' class='img-rounded'>
                                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                         <span class='text-info'>${list_monan[i].ten_monan}</span>
                                         </a>
                                    `;
                                  //  "<a  href='chitietmonan/"+ list_monan[i].id +"' class='list-group-item'>"
                                  // +"<img src='uploads/monan/"+ list_monan[i].anh_monan +"' width='50px' height='50px' class='img-rounded'>"
                                  // +"<span class='text-info'>" + list_monan[i].ten_monan +"</span>"
                                  // +"</a>";
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

        {{-- load more--}}

        // scroll load more
        $(window).scroll(function () {
           if ($(window).scrollTop() == $(document).height() - $(window).height()) {
               sendData();
           }
        });


        var offset = 10;
        function sendData() {
           $.ajax(
            {
                type: "GET",
                url: '{!!URL::to("loadthembaiviet")!!}',
                data: {'offset':offset},
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                async: "true",
                cache: "false",
                success: function (data) {
                    offset = offset +10;
                    console.log(data);
                    var element = ``;
                    var user_online = data[0];

                    for(var i=1;i<data.length;i++) {
                        var arr_img = ``;
                        for(var j=0;j<data[i].userpost.postimage.length;j++) {
                            arr_img = arr_img + `<img src="`+data[i].userpost.postimage[j].image+`" class="img-responsive">`;
                        }

                        var str_user_online = ``;
                        if (user_online != null) {
                            str_user_online =
                                `<div class="user-post-review-comment-container" id="` + data[i].userpost.id + `-user-post-review-comment-container">
                                    <form>
                                        <div class="row">
                                            <div class="col-sm-1 img-ava">
                                                <img src="`+user_online.anhdaidien+`" class="img-circle img-responsive user-post-item-avatar-img">
                                            </div>
                                            <div class="col-sm-11" style="margin-left: -10px">
                                                <span>
                                                     <textarea type="text" onclick='clickReviewCommentArea("`+data[i].userpost.id+`-user-post-review-comment-area")' onkeyup='keyupReviewCommentArea("`+data[i].userpost.id+`-user-post-review-comment-area")' class="form-control user-post-review-comment-area" id="`+data[i].userpost.id+`-user-post-review-comment-area" placeholder="thảo luận của bạn ..."></textarea>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="row user-post-action-review-comment" id="`+data[i].userpost.id+`-user-post-action-review-comment" style="display: none">
                                            <div class="pull-right" style="padding-right: 30px;margin-top: -10px" >
                                                <a class="btn btn-default user-post-delete-review-comment" onclick="deleteReviewComment('`+data[i].userpost.id+`-user-post-delete-review-comment')" id="`+data[i].userpost.id+`-user-post-delete-review-comment">Hủy</a>
                                                <a class="btn btn-default user-post-answer-review-comment" onclick="answerReviewComment('`+data[i].userpost.id+`-user-post-answer-review-comment','`+user_online.id+`')" id="`+data[i].userpost.id+`-user-post-answer-review-comment">Trả lời</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>`;
                        }

                        var str_like = '';
                        var like = data[i].like;
                        if(user_online !=null) {

                            if(like==1) {
                                str_like =
                                    `<a class="user-post-button-like btn like-unlike like" onclick="clickLike('` + data[i].userpost.id + `-user-post-button-like','` + user_online.id + `')" id="` + data[i].userpost.id + `-user-post-button-like" aria-pressed="true" style="transition: 0s">
                                        <span style="font-size: 15px">
                                            <i class="fa fa-thumbs-o-up " aria-hidden="true"></i> thích
                                        </span>
                                     </a>`;
                            } else {
                                str_like =
                                    `<a class="user-post-button-like btn like-unlike unlike" onclick="clickLike('` + data[i].userpost.id + `-user-post-button-like','` + user_online.id + `')" id="` + data[i].userpost.id + `-user-post-button-like" aria-pressed="false" style="transition: 0s">
                                        <span style="font-size: 15px">
                                            <i class="fa fa-thumbs-o-up  " aria-hidden="true"></i> thích
                                        </span>
                                     </a>`;
                            }
                        } else {
                            str_like =
                                `<a class="user-post-button-like btn like-unlike unlike disabled" id="` + data[i].userpost.id + `-user-post-button-like" aria-pressed="false" style="transition: 0s">
                                        <span style="font-size: 15px">
                                            <i class="fa fa-thumbs-o-up  " aria-hidden="true"></i> thích
                                        </span>
                                 </a>`;
                        }

                        var str_check = ``;

                        if(like==1) {
                            if(data[i].userpost.soluotthich>1) {
                                str_check =
                                    `<div class="row">
                                        <div class="col-sm-12" >
                                            <p>
                                                <i class="fa fa-heart" aria-hidden="true"></i>
                                                ban va ` + (data[i].userpost.soluotthich - 1) + ` người thích bài viết này
                                            </p>
                                        </div>
                                     </div>`;

                            } else if(data[i].userpost.soluotthich == 1 ) {
                                str_check =
                                    `<div class="row">
                                        <div class="col-sm-12" >
                                            <p>
                                                <i class="fa fa-heart" aria-hidden="true"></i>
                                                ban thích bài viết này
                                            </p>
                                        </div>
                                     </div>`;
                            }
                        } else {
                            if(data[i].userpost.soluotthich>0) {
                                str_check =
                                    `<div class="row">
                                        <div class="col-sm-12" >
                                            <p>
                                                <i class="fa fa-heart" aria-hidden="true"></i>
                                                ` + data[i].userpost.soluotthich + ` người thích bài viết này
                                            </p>
                                        </div>
                                     </div>`;
                            }
                        }

                        var arr_list_comment = ``;
                        for(var j = 0;j<data[i].userpost.commentpost.length;j++) {

                            var arr_reportcomment = ``;

                            for (var k = 0; k < data[i].userpost.commentpost[j].reportcommentpost.length; k++) {
                                arr_reportcomment = arr_reportcomment +
                                    `<div class="reply-comment">
                                                            <div class="col-sm-12" style="margin-bottom: 10px">
                                                                <div class="row">
                                                                    <div class="col-sm-1 img-ava">
                                                                        <img src="` + data[i].userpost.commentpost[j].reportcommentpost[k].user.anhdaidien + `" class="img-circle img-responsive user-post-item-avatar-img">
                                                                    </div>
                                                                    <div class="col-sm-10 comment-content">
                                                                        <div class="row">
                                                                            <p class="user-post-item-comment-username">` + data[i].userpost.commentpost[j].reportcommentpost[k].user.tentaikhoan + `</p>
                                                                        </div>
                                                                        <div class="row">
                                                                            <p>` + data[i].userpost.commentpost[j].reportcommentpost[k].noidung + `</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>`;
                            }

                            var str_online = ``;

                            if (user_online != null) {
                                str_online =
                                    `<div class="row">
                                            <a style="font-size: 14px;font-weight: 400;" href="javascript:void(0)" class="reply" onclick="replyCommentPost('` + data[i].userpost.commentpost[j].id + `-reply')" id="` + data[i].userpost.commentpost[j].id + `-reply">Trả lời</a>
                                         </div>`;
                            }
                            var str_report_online = ``;

                            if (user_online != null) {
                                str_report_online =
                                    `<div class="row user-post-reply-area" id="` + data[i].userpost.commentpost[j].id + `-user-post-reply-area" style="display: none">
                                            <div class="">
                                                <div class="col-sm-1 img-ava">
                                                    <img src="` + user_online.anhdaidien + `" class="img-circle img-responsive user-post-item-avatar-img">
                                                </div>
                                                <div class="col-sm-11" style="margin-left: -10px">
                                                    <span>
                                                        <textarea type="text" class="form-control user-post-reply-comment" onkeyup="keyupReplyComment('` + data[i].userpost.commentpost[j].id + `-user-post-reply-comment')" id="` + data[i].userpost.commentpost[j].id + `-user-post-reply-comment"></textarea>
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="">
                                                    <div class="pull-right" style="padding-right: 30px;margin-top: -10px">
                                                        <a class="user-post-delete-reply-comment btn" onclick="deleteReplyComment('` + data[i].userpost.commentpost[j].id + `-user-post-delete-reply-comment')" id="` + data[i].userpost.commentpost[j].id + `-user-post-delete-reply-comment">Hủy</a>
                                                        <a class="user-post-answer-reply-comment btn disabled" onclick="answerReplyComment('` + data[i].userpost.commentpost[j].id + `-user-post-answer-reply-comment','` + user_online.id + `')" id="` + data[i].userpost.commentpost[j].id + `-user-post-answer-reply-comment">Trả lời</a>
                                                    </div>
                                                </div>

                                            </div>`;
                            }

                            arr_list_comment = arr_list_comment +
                                `<div class="user-post-item-comment row" id="
                                    ` + data[i].userpost.commentpost[j].id + `
                                        -user-post-item-comment" style="margin-bottom: 20px">

                                        <div class="col-sm-12">
                                            <div class="row">
                                                <div class="col-sm-1 user-post-item-comment-avatar">
                                                    <img src="` + data[i].userpost.commentpost[j].user.anhdaidien + `" class="img-circle img-responsive user-post-item-avatar-img">
                                                </div>
                                                <div class="col-sm-11 user-post-item-comment-content" id="` + data[i].userpost.commentpost[j].id + `-user-post-item-comment-content">
                                                    <div class="row">
                                                            <p class="user-post-item-comment-username">`+data[i].userpost.commentpost[j].user.tentaikhoan+`</p>
                                                    </div>
                                                    <div class="row">
                                                        <p>` + data[i].userpost.commentpost[j].noidung + `</p>
                                                    </div>
                                                    ` + str_online + `
                                                    <div class="row list-reply-comment" id="` + data[i].userpost.commentpost[j].id + `-list-reply-comment">
                                                    `+arr_reportcomment+`
                                                    </div>
                                                    ` + str_report_online + `
                                                </div>
                                            </div>

                                        </div>
                                    </div>`;
                        }
                        element = element + `<div class="panel panel-default user-post" id="` + data[i].userpost.id + `-user-post">
                        <div class="panel-body">
                            <div class="row user-post-header">
                                <div class="col-sm-2">
                                    <img src="` + data[i].userpost.user.anhdaidien + `" class="card-img rounded-circle img-circle avatar-user">
                                </div>
                                <div class="col-sm-5" style="margin-left: -40px ">
                                    <div class="row">
                                        <p class="name-user-post" >` + data[i].userpost.user.tentaikhoan + `</p>
                                    </div>
                                    <div class="row">
                                        <p class="info-recipe-user-post">nổi bật ` + data[i].userpost.user.noibat + `</p>
                                    </div>
                                </div>
                                <div class="pull-right timestamp-user-post" style="margin-right: 10px">
                                    <span style="font-size: 12px">` + data[i].userpost.created_at + `</span>
                                    <span> <i class="fa fa-globe" aria-hidden="true"></i></span>
                                </div>
                            </div>
                            <div class="row user-post-title" style="margin-top: 20px">
                                <div class="container">
                                    <div class="col-sm-12">
                                        <p class="user-post-title-p1">` + data[i].userpost.tieude + ` </p>
                                    </div>
                                </div>
                            </div>
                            <hr style="margin-top: 5px">
                            <div class="user-post-content" >
                                <div class="row user-post-text-content" style="margin: 0px">
                                    <div class="col-sm-12">
                                        <p>
                                            ` + data[i].userpost.noidung.replace(/\n/g, '</br>') + `

                                        </p>
                                    </div>
                                </div>
                                <div class="row user-post-img-content" style="margin: 0px">
                                    <div class="col-sm-12" style="padding-top: 20px;padding-bottom: 20px">
                                        ` + arr_img + `
                                    </div>
                                </div>

                            </div>
                            <div class="user-post-review-acts">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="pull-left">
                                            <div style="padding-left: 20px">
                                                    ` + str_like + `
                                                    <a class="user-post-button-comment btn" onclick="clickButtonComment('` + data[i].userpost.id + `-user-post-button-comment')" id="` + data[i].userpost.id + `-user-post-button-comment">
                                                        <span  style="font-size: 15px">
                                                            <i class="fa fa-comments-o " aria-hidden="true"></i> bình luận
                                                        </span>
                                                    </a>
                                                    <a class="user-post-button-share btn" href="https://www.facebook.com/sharer/sharer.php?u=http://bkcook.ddns.net/bkcook.vn/public/baidangchitiet/` + data[i].userpost.id + `&amp;src=sdkpreparse" target="_blank">
                                                        <span  style="font-size: 15px">
                                                            <i class="fa fa-share-square-o" aria-hidden="true"></i> chia sẻ
                                                        </span>
                                                    </a>
                                            </div>
                                        </div>
                                        <div class="pull-right user-post-view">
                                            <span style="font-size: 14px">` + data[i].userpost.soluotxem + ` lượt xem <i class="fa fa-eye" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer" id="` + data[i].userpost.id + `-panel-footer">
                            <div class="user-post-react" id="` + data[i].userpost.id + `-user-post-react">
                                ` + str_check + `
                            </div>
                            <hr style="margin: 10px">

                            <div class="user-post-comment-area">
                                <div class="user-post-list-comment" id="` + data[i].userpost.id + `-user-post-list-comment">
                                    ` + arr_list_comment + `
                                </div>
                                ` + str_user_online + `
                            </div>
                        </div>
                    </div>`;
                    $(".list-user-post").append(element);
                    }
                },
                Error: function (x, e) {
                    alert("Some error");
                }
            });
        }
        {{-- end load more--}}
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
{{--  <script>
    setInterval(function() {
        socket.emit('phatnh channel demo', "Hello, I am Phat, client sending....");
    }, 10000);
</script>  --}}
</body>
</html>

