<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <title><?php echo $__env->yieldContent('Ẩm thực quanh ta'); ?></title>
    <meta name="description" content="">
    <base href="<?php echo e(asset('')); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <!--Google fonts Link-->
    
    <link rel="stylesheet" href="vendor_customer/vendor/css/css-google.css">
    
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
<?php if(session('thongbao')): ?>
    <script>
       <?php echo e(session('thongbao')); ?>

    </script>
<?php endif; ?>
<?php if(session('thongbaoloi')): ?>
    <script>
       <?php echo e(session('thongbaoloi')); ?>

    </script>
<?php endif; ?>
<?php if(count($errors) > 0): ?>
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <script>
            alert("<?php echo e($err); ?>");
        </script>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
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
                                    <?php if(Auth::user()): ?>
                                    <li><a><i class="fa fa-user fa-fw">-: </i><b style="color: red;"><?php echo e(Auth::user()->tentaikhoan); ?></b></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if(Auth::guard('nhahang')->user()): ?>
                                    <li><a><i class="fa fa-github-alt">-: </i><b style="color: red;"><?php echo e(Auth::guard('nhahang')->user()->username); ?></b></a>
                                    </li>
                                    <?php endif; ?>
                                    <li><a href="trangchu">Trang Chủ</a></li>
                                    <li><a href="<?php echo e(route('loaimon')); ?>">Thể Loại</a></li>
                                    <li><a href="<?php echo e(route('mucdich')); ?>">Mục Đích</a></li>
                                     <li><a href="<?php echo e(route('congdung')); ?>">Công Dụng</a></li>
                                    <li><a href="<?php echo e(route('vungmien')); ?>">Vùng Miền</a></li>
                                    <li>
                                        <a href="" data-toggle="dropdown" role="button" aria-haspopup="true"
                                            aria-expanded="false" class="search" >
                                        <span class="fa fa-search"></span></a>
                                    </li>
                                    <?php if(!Auth::guard('nhahang')->user()): ?>
                                       <li><a href="monan">Món Ăn</a></li>
                                    <?php endif; ?>
                                    <li><a href="dangbai">Đăng bài</a></li>
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
                                        <li><a href="admin/info-page-admin"><b style="color: red;">Quản Trị</b></a></li>
                                      <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if(Auth::user()): ?>
                                      <?php if(Auth::user()->level == 2): ?>
                                          <li><a href="javascript:void(0)" class="info"><b style="color: red;">Tài Khoản</b></a></li>
                                      <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if(Auth::user() || Auth::guard('nhahang')->user()): ?>
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
</header> <!--End of header -->
<section class="wide-box" style="margin-top: 20px ">
    <div class="container">
        <div class="col-md-8">
            <?php if(Auth::user()): ?>
            <div class="row user-posts-post" id="<?php echo e(Auth::user()->id); ?>" style="margin-bottom:-10px ">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form class="form-postpost" action="javascript:void(0)">
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                            <div class="row" style="margin-top: 20px">
                                <div class="col-sm-2">
                                    <span>
                                        <img src="<?php echo e(Auth::user()->anhdaidien); ?>" class="img-circle img-responsive avatar-user" id="ava-user-online">
                                    </span>
                                </div>
                                <div class="col-sm-10" style="margin-left: -40px;margin-top: 5px">
                                    <div class="row">
                                        <span>
                                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
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
                                                        <?php $__currentLoopData = $food_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($element->id); ?>"><?php echo e($element->ten); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
                                                <button class="send-post-post btn btn-default" onclick="clicksenduserpost(<?php echo e(Auth::user()->id); ?>)">Đăng bài</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <?php endif; ?>

            <!-- list user post-->
            <div class="row list-user-post">
                <?php $__currentLoopData = $user_posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user_post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                <div class="panel panel-default user-post" id="<?php echo e($user_post->id); ?>-user-post">
                    <div class="panel-body">
                        <div class="row user-post-header">
                            <div class="col-sm-2">

                                <img src="<?php echo e($user_post->user->anhdaidien); ?>" class="card-img rounded-circle img-circle avatar-user">

                            </div>

                            <div class="col-sm-5" style="margin-left: -40px ">
                                <div class="row">
                                    <p class="name-user-post" ><?php echo e($user_post->user->tentaikhoan); ?></p>
                                </div>
                                <div class="row">
                                    <p class="info-recipe-user-post">nổi bật <?php echo e($user_post->user->noibat); ?></p>
                                </div>
                            </div>

                            <div class="pull-right timestamp-user-post" style="margin-right: 10px">
                                <span style="font-size: 12px"><?php echo e($user_post->created_at); ?></span>
                                <span> <i class="fa fa-globe" aria-hidden="true"></i></span>
                            </div>
                        </div>

                        <div class="row user-post-title" style="margin-top: 20px">
                            <div class="container">
                                <div class="col-sm-12">
                                    <p class="user-post-title-p1"><?php echo e($user_post->tieude); ?> </p>
                                    
                                </div>
                            </div>
                        </div>

                        <hr style="margin-top: 5px">

                        <div class="user-post-content" >
                            <div class="row user-post-text-content" style="margin: 0px">
                                <div class="col-sm-12">
                                    <p>
                                        <?php (  $arr_text = explode("\n", $user_post->noidung)  ); ?>
                                        <?php $__currentLoopData = $arr_text; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $text): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo e($text); ?></br>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </p>
                                </div>
                            </div>
                            <div class="row user-post-img-content" style="margin: 0px">
                                <div class="col-sm-12" style="padding-top: 20px;padding-bottom: 20px">
                                    <?php $__currentLoopData = $user_post->postimage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $postimage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <img src="<?php echo e($postimage->image); ?>" class="img-responsive">

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>

                        </div>
                        <div class="user-post-review-acts">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="pull-left">
                                        <div style="padding-left: 20px">
                                            <?php if(Auth::user()): ?>
                                                <?php ( $check = "false"); ?>
                                                <?php $__currentLoopData = $user_post->likepost; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $likepost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($likepost->id_user== Auth::user()->id): ?>
                                                        <?php ($check = "true"); ?>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($check=="true"): ?>
                                                    <a class="user-post-button-like btn like-unlike like" onclick="clickLike('<?php echo e($user_post->id); ?>-user-post-button-like',<?php echo e(Auth::user()->id); ?>)" id="<?php echo e($user_post->id); ?>-user-post-button-like" aria-pressed="true" style="transition: 0s">
                                                        <span style="font-size: 15px">
                                                            <i class="fa fa-thumbs-o-up " aria-hidden="true"></i> thích
                                                        </span>
                                                    </a>
                                                <?php else: ?>
                                                    <a class="user-post-button-like btn like-unlike unlike" onclick="clickLike('<?php echo e($user_post->id); ?>-user-post-button-like','<?php echo e(Auth::user()->id); ?>')" id="<?php echo e($user_post->id); ?>-user-post-button-like" aria-pressed="false" style="transition: 0s">
                                                        <span style="font-size: 15px">
                                                            <i class="fa fa-thumbs-o-up  " aria-hidden="true"></i> thích
                                                        </span>
                                                    </a>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <a class="user-post-button-like btn like-unlike unlike disabled" id="<?php echo e($user_post->id); ?>-user-post-button-like" aria-pressed="false" style="transition: 0s">
                                                        <span style="font-size: 15px">
                                                            <i class="fa fa-thumbs-o-up  " aria-hidden="true"></i> thích
                                                        </span>
                                                </a>
                                            <?php endif; ?>
                                                <a class="user-post-button-comment btn" onclick="clickButtonComment('<?php echo e($user_post->id); ?>-user-post-button-comment')" id="<?php echo e($user_post->id); ?>-user-post-button-comment">
                                                    <span  style="font-size: 15px">
                                                        <i class="fa fa-comments-o " aria-hidden="true"></i> bình luận
                                                    </span>
                                                </a>
                                                <a class="user-post-button-share btn" href="https://www.facebook.com/sharer/sharer.php?u=http://bkcook.ddns.net/bkcook.vn/public/baidangchitiet/<?php echo e($user_post->id); ?>&amp;src=sdkpreparse" target="_blank">
                                                    <span  style="font-size: 15px">
                                                        <i class="fa fa-share-square-o" aria-hidden="true"></i> chia sẻ
                                                    </span>
                                                </a>

                                        </div>

                                    </div>
                                    <div class="pull-right user-post-view">
                                        <span style="font-size: 14px"><?php echo e($user_post->soluotxem); ?> lượt xem <i class="fa fa-eye" aria-hidden="true"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer" id="<?php echo e($user_post->id); ?>-panel-footer">

                        <div class="user-post-react" id="<?php echo e($user_post->id); ?>-user-post-react">
                            <?php if(isset($check)): ?>
                                <?php if($user_post->soluotthich > 1 && $check=="true"): ?>
                                <div class="row">
                                    <div class="col-sm-12" >
                                        <p>
                                            <i class="fa fa-heart" aria-hidden="true"></i>
                                            ban va <?php echo e($user_post->soluotthich -1); ?> người thích bài viết này
                                        </p>
                                    </div>
                                </div>
                                <?php elseif($user_post->soluotthich > 0 && $check=="false"): ?>
                                <div class="row">
                                    <div class="col-sm-12" >
                                        <p>
                                            <i class="fa fa-heart" aria-hidden="true"></i>
                                            <?php echo e($user_post->soluotthich); ?> người thích bài viết này
                                        </p>
                                    </div>
                                </div>
                                <?php elseif($user_post->soluotthich == 1 && $check=="true"): ?>
                                <div class="row">
                                    <div class="col-sm-12" >
                                        <p>
                                            <i class="fa fa-heart" aria-hidden="true"></i>
                                            ban thích bài viết này
                                        </p>
                                    </div>
                                </div>
                                <?php endif; ?>
                            <?php else: ?>
                                <div class="row">
                                    <div class="col-sm-12" >
                                        <p>
                                            <i class="fa fa-heart" aria-hidden="true"></i>
                                            <?php echo e($user_post->soluotthich); ?> người thích bài viết này
                                        </p>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>


                        <hr style="margin: 10px">

                        <div class="user-post-comment-area">
                            <div class="user-post-list-comment" id="<?php echo e($user_post->id); ?>-user-post-list-comment">
                                <?php $__currentLoopData = $user_post->commentpost; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commentpost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="user-post-item-comment row" id="<?php echo e($commentpost->id); ?>-user-post-item-comment" style="margin-bottom: 20px">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-1 user-post-item-comment-avatar">

                                                        <img src="<?php echo e($commentpost->user->anhdaidien); ?>" class="img-circle img-responsive user-post-item-avatar-img">
                                            </div>
                                            <div class="col-sm-11 user-post-item-comment-content" id="<?php echo e($commentpost->id); ?>-user-post-item-comment-content">
                                                <div class="row">

                                                            <p class="user-post-item-comment-username"><?php echo e($commentpost->user->tentaikhoan); ?></p>

                                                </div>
                                                <div class="row">
                                                    <p><?php echo e($commentpost->noidung); ?></p>
                                                </div>
                                                <?php if(Auth::user()): ?>
                                                <div class="row">
                                                    <a style="font-size: 14px;font-weight: 400;" href="javascript:void(0)" class="reply" onclick="replyCommentPost('<?php echo e($commentpost->id); ?>-reply')" id="<?php echo e($commentpost->id); ?>-reply">Trả lời</a>
                                                </div>
                                                <?php endif; ?>

                                                <!-- list reply comment -->
                                                <div class="row list-reply-comment" id="<?php echo e($commentpost->id); ?>-list-reply-comment">

                                                    <?php $__currentLoopData = $commentpost->reportcommentpost; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reportcommentpost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="reply-comment">
                                                        <div class="col-sm-12" style="margin-bottom: 10px">
                                                            <div class="row">
                                                                <div class="col-sm-1 img-ava">
                                                                    <img src="<?php echo e($reportcommentpost->user->anhdaidien); ?>" class="img-circle img-responsive user-post-item-avatar-img">
                                                                </div>
                                                                <div class="col-sm-10 comment-content">
                                                                    <div class="row">
                                                                        <p class="user-post-item-comment-username"><?php echo e($reportcommentpost->user->tentaikhoan); ?></p>
                                                                    </div>
                                                                    <div class="row">
                                                                        <p><?php echo e($reportcommentpost->noidung); ?> </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                </div>

                                                <!-- -->
                                                <?php if(Auth::user()): ?>
                                                <div class="row user-post-reply-area" id="<?php echo e($commentpost->id); ?>-user-post-reply-area" style="display: none">
                                                    <div class="">
                                                        <div class="col-sm-1 img-ava">
                                                            <img src="<?php echo e(Auth::user()->anhdaidien); ?>" class="img-circle img-responsive user-post-item-avatar-img">
                                                        </div>
                                                        <div class="col-sm-11" style="margin-left: -10px">
                                                            <span>
                                                                <textarea type="text" class="form-control user-post-reply-comment" onkeyup="keyupReplyComment('<?php echo e($commentpost->id); ?>-user-post-reply-comment')" id="<?php echo e($commentpost->id); ?>-user-post-reply-comment"></textarea>
                                                            </span>
                                                        </div>
                                                    </div>

                                                    <div class="">
                                                            <div class="pull-right" style="padding-right: 30px;margin-top: -10px">
                                                                <a class="user-post-delete-reply-comment btn" onclick="deleteReplyComment('<?php echo e($commentpost->id); ?>-user-post-delete-reply-comment')" id="<?php echo e($commentpost->id); ?>-user-post-delete-reply-comment">Hủy</a>
                                                                <a class="user-post-answer-reply-comment btn disabled" onclick="answerReplyComment('<?php echo e($commentpost->id); ?>-user-post-answer-reply-comment','<?php echo e(Auth::user()->id); ?>')" id="<?php echo e($commentpost->id); ?>-user-post-answer-reply-comment">Trả lời</a>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <?php endif; ?>

                                                <!-- <div class="reply-comment">
                                                    <p>hai con bo an co dong xanh</p>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <!-- review comment -->
                            <?php if(Auth::user()): ?>
                            <div class="user-post-review-comment-container" id="<?php echo e($user_post->id); ?>-user-post-review-comment-container">
                                <form>
                                    <div class="row">
                                        <div class="col-sm-1 img-ava">
                                            <img src="<?php echo e(Auth::user()->anhdaidien); ?>" class="img-circle img-responsive user-post-item-avatar-img">
                                        </div>
                                        <div class="col-sm-11" style="margin-left: -10px">
                                            <span>
                                                 <textarea type="text" onclick='clickReviewCommentArea("<?php echo e($user_post->id); ?>-user-post-review-comment-area")' onkeyup='keyupReviewCommentArea("<?php echo e($user_post->id); ?>-user-post-review-comment-area")' class="form-control user-post-review-comment-area" id="<?php echo e($user_post->id); ?>-user-post-review-comment-area" placeholder="thảo luận của bạn ..."></textarea>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="row user-post-action-review-comment" id="<?php echo e($user_post->id); ?>-user-post-action-review-comment" style="display: none">
                                        <div class="pull-right" style="padding-right: 30px;margin-top: -10px" >
                                            <a class="btn btn-default user-post-delete-review-comment" onclick="deleteReviewComment('<?php echo e($user_post->id); ?>-user-post-delete-review-comment')" id="<?php echo e($user_post->id); ?>-user-post-delete-review-comment">Hủy</a>
                                            <a class="btn btn-default user-post-answer-review-comment" onclick="answerReviewComment('<?php echo e($user_post->id); ?>-user-post-answer-review-comment','<?php echo e(Auth::user()->id); ?>')" id="<?php echo e($user_post->id); ?>-user-post-answer-review-comment">Trả lời</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                    <p><span><i class="fa fa-users" aria-hidden="true"></i> </span> Top Thành Viên</p>
                                </div>
                            </div>

                            <hr>

                        </div>
                        <div class="chef-list">
                            <?php $__currentLoopData = $top10_users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $top_user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="col-sm-5">
                                                <img src="<?php echo e($top_user->anhdaidien); ?>" class="card-img rounded-circle img-circle avatar-user" id="avatar">
                                            </div>
                                            <div class="col-sm-5" style="margin-left: -30px ">
                                                <div class="row">
                                                    <a href=""><p class="chef-info-name"><?php echo e($top_user->tentaikhoan); ?></p></a>
                                                </div>
                                                <div class="row">
                                                    <p class="chef-info-recipe">nổi bật : <?php echo e($top_user->noibat); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
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

            
              <button type="submit" class="btn btn-success btn-block" id="btn-signin"><span><i class="fa fa-power-off" aria-hidden="true"></i></span> Đăng Ký</button>
          </form>
        </div>
      </div>
    </div>
</div>
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
                <input type="text" class="form-control sua" id="usrname" name="fullname" required="" value="<?php echo e(Auth::user()->hovaten); ?>" disabled="">
              </div>
              <div class="form-group">
                <label for="usrname" style="color: black"><span><i class="fa fa-user" aria-hidden="true"></i></span>Tuổi</label>
                <input type="number" class="form-control sua" id="usrname" name="tuoi" value="<?php echo e(Auth::user()->tuoi); ?>" disabled="">
              </div>
              <div class="form-group">
                <label for="usrname" style="color: black"><span><i class="fa fa-user" aria-hidden="true"></i></span>Công Việc Hiện Tại</label>
                <input type="text" class="form-control sua" id="usrname" name="congviec" value="<?php echo e(Auth::user()->congviec); ?>" disabled="">
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
                <input type="email" class="form-control" id="psw" name="email"  value="<?php echo e(Auth::user()->email); ?>" disabled="">
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
                <input type="file" class="sua" id="usrname" name="anh" placeholder="Chọn Ảnh" disabled="">
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
<!-- Modal recipient chia sẻ cong thức-->
<!-- Form Tìm Kiếm-->
<div class="modal fade" id="modal-search" role="dialog">
    <div class="modal-dialog">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <div class="form-group">
              <input name="key" type="search" oninput="search()" class="form-control" id="key" required="" placeholder="Tìm Kiếm ?">
            </div>
          
            <div class="modal-content" style="overflow: auto; height:35em ">
              <ul class="list-group" id="ketqua">
              </ul>
            </div>
    </div>
</div>
<!--Hết form tìm kiêm-->

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

<script src="vendor_customer/vendor/js/socket.io.js"></script>
<script src="vendor_customer/assets/js/plugins.js"></script>
<script src="vendor_customer/assets/js/main.js"></script>
<script src="vendor_customer/assets/js/dangbai.js"></script>
<script src="vendor_customer/assets/js/modalHeader.js"></script>

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
                url:'<?php echo URL::to("findLoaiMon"); ?>',
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

        

        // scroll
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
                url: '<?php echo URL::to("loadthembaiviet"); ?>',
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
                        if(user_online !=null) {
                             str_user_online = `<div class="user-post-review-comment-container" id="`+data[i].userpost.id+`-user-post-review-comment-container">
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
                                str_like = `<a class="user-post-button-like btn like-unlike like" onclick="clickLike('`+data[i].userpost.id+`-user-post-button-like','`+user_online.id+`')" id="`+data[i].userpost.id+`-user-post-button-like" aria-pressed="true" style="transition: 0s">
                                                        <span style="font-size: 15px">
                                                            <i class="fa fa-thumbs-o-up " aria-hidden="true"></i> thích
                                                        </span>
                                                    </a>`;
                            } else {
                                str_like = `<a class="user-post-button-like btn like-unlike unlike" onclick="clickLike('`+data[i].userpost.id+`-user-post-button-like','`+user_online.id+`')" id="`+data[i].userpost.id+`-user-post-button-like" aria-pressed="false" style="transition: 0s">
                                                        <span style="font-size: 15px">
                                                            <i class="fa fa-thumbs-o-up  " aria-hidden="true"></i> thích
                                                        </span>
                                                    </a>`;
                            }
                        } else {
                            str_like = `<a class="user-post-button-like btn like-unlike unlike disabled" id="`+data[i].userpost.id+`-user-post-button-like" aria-pressed="false" style="transition: 0s">
                                                        <span style="font-size: 15px">
                                                            <i class="fa fa-thumbs-o-up  " aria-hidden="true"></i> thích
                                                        </span>
                                                </a>`;
                        }

                        var str_check = ``;
                        if(like==1) {
                            if(data[i].userpost.soluotthich>1) {
                                str_check = `<div class="row">
                                    <div class="col-sm-12" >
                                        <p>
                                            <i class="fa fa-heart" aria-hidden="true"></i>
                                            ban va `+(data[i].userpost.soluotthich - 1)+` người thích bài viết này
                                        </p>
                                    </div>
                                </div>`;
                            } else if(data[i].userpost.soluotthich == 1 ) {
                                str_check = `<div class="row">
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
                                str_check = `<div class="row">
                                    <div class="col-sm-12" >
                                        <p>
                                            <i class="fa fa-heart" aria-hidden="true"></i>
                                            `+data[i].userpost.soluotthich+` người thích bài viết này
                                        </p>
                                    </div>
                                </div>`;
                            }
                        }

                        var arr_list_comment = ``;
                        for(var j = 0;j<data[i].userpost.commentpost.length;j++) {

                            var arr_reportcomment = ``;

                            for(var k =0;k<data[i].userpost.commentpost[j].reportcommentpost.length;k++) {
                                arr_reportcomment = arr_reportcomment + `
                                                    <div class="reply-comment">
                                                        <div class="col-sm-12" style="margin-bottom: 10px">
                                                            <div class="row">
                                                                <div class="col-sm-1 img-ava">
                                                                    <img src="`+data[i].userpost.commentpost[j].reportcommentpost[k].user.anhdaidien+`" class="img-circle img-responsive user-post-item-avatar-img">
                                                                </div>
                                                                <div class="col-sm-10 comment-content">
                                                                    <div class="row">
                                                                        <p class="user-post-item-comment-username">`+data[i].userpost.commentpost[j].reportcommentpost[k].user.tentaikhoan+`</p>
                                                                    </div>
                                                                    <div class="row">
                                                                        <p>`+data[i].userpost.commentpost[j].reportcommentpost[k].noidung+`</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    `;
                            }


                            var str_online = ``;
                            if(user_online != null) {
                                str_online = `
                                                <div class="row">
                                                    <a style="font-size: 14px;font-weight: 400;" href="javascript:void(0)" class="reply" onclick="replyCommentPost('`+data[i].userpost.commentpost[j].id+`-reply')" id="`+data[i].userpost.commentpost[j].id+`-reply">Trả lời</a>
                                                </div>
                                                `;
                            }

                            var str_report_online = ``;
                            if(user_online!=null) {
                                str_report_online = `
                                                <div class="row user-post-reply-area" id="`+data[i].userpost.commentpost[j].id+`-user-post-reply-area" style="display: none">
                                                    <div class="">
                                                        <div class="col-sm-1 img-ava">
                                                            <img src="`+user_online.anhdaidien+`" class="img-circle img-responsive user-post-item-avatar-img">
                                                        </div>
                                                        <div class="col-sm-11" style="margin-left: -10px">
                                                            <span>
                                                                <textarea type="text" class="form-control user-post-reply-comment" onkeyup="keyupReplyComment('`+data[i].userpost.commentpost[j].id+`-user-post-reply-comment')" id="`+data[i].userpost.commentpost[j].id+`-user-post-reply-comment"></textarea>
                                                            </span>
                                                        </div>
                                                    </div>

                                                    <div class="">
                                                            <div class="pull-right" style="padding-right: 30px;margin-top: -10px">
                                                                <a class="user-post-delete-reply-comment btn" onclick="deleteReplyComment('`+data[i].userpost.commentpost[j].id+`-user-post-delete-reply-comment')" id="`+data[i].userpost.commentpost[j].id+`-user-post-delete-reply-comment">Hủy</a>
                                                                <a class="user-post-answer-reply-comment btn disabled" onclick="answerReplyComment('`+data[i].userpost.commentpost[j].id+`-user-post-answer-reply-comment','`+user_online.id+`')" id="`+data[i].userpost.commentpost[j].id+`-user-post-answer-reply-comment">Trả lời</a>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    `;
                            }

                            arr_list_comment = arr_list_comment + `<div class="user-post-item-comment row" id="`+data[i].userpost.commentpost[j].id+`-user-post-item-comment" style="margin-bottom: 20px">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-1 user-post-item-comment-avatar">

                                                        <img src="`+data[i].userpost.commentpost[j].user.anhdaidien+`" class="img-circle img-responsive user-post-item-avatar-img">


                                            </div>
                                            <div class="col-sm-11 user-post-item-comment-content" id="`+data[i].userpost.commentpost[j].id+`-user-post-item-comment-content">
                                                <div class="row">

                                                            <p class="user-post-item-comment-username">`+data[i].userpost.commentpost[j].user.tentaikhoan+`</p>

                                                </div>
                                                <div class="row">
                                                    <p>`+data[i].userpost.commentpost[j].noidung+`</p>
                                                </div>
                                                `+ str_online +`

                                                <!-- list reply comment -->
                                                <div class="row list-reply-comment" id="`+data[i].userpost.commentpost[j].id+`-list-reply-comment">

                                                    `+arr_reportcomment+`

                                                </div>

                                                <!-- -->
                                                `+ str_report_online +`

                                            </div>
                                        </div>

                                    </div>


                                </div>`;
                        }

                        element = element + `<div class="panel panel-default user-post" id="`+data[i].userpost.id+`-user-post">
                    <div class="panel-body">
                        <div class="row user-post-header">
                            <div class="col-sm-2">

                                <img src="`+data[i].userpost.user.anhdaidien+`" class="card-img rounded-circle img-circle avatar-user">

                            </div>

                            <div class="col-sm-5" style="margin-left: -40px ">
                                <div class="row">
                                    <p class="name-user-post" >`+data[i].userpost.user.tentaikhoan+`</p>
                                </div>
                                <div class="row">
                                    <p class="info-recipe-user-post">nổi bật `+data[i].userpost.user.noibat+`</p>
                                </div>
                            </div>

                            <div class="pull-right timestamp-user-post" style="margin-right: 10px">
                                <span style="font-size: 12px">`+data[i].userpost.created_at+`</span>
                                <span> <i class="fa fa-globe" aria-hidden="true"></i></span>
                            </div>
                        </div>

                        <div class="row user-post-title" style="margin-top: 20px">
                            <div class="container">
                                <div class="col-sm-12">
                                    <p class="user-post-title-p1">`+data[i].userpost.tieude+` </p>
                                </div>
                            </div>
                        </div>

                        <hr style="margin-top: 5px">

                        <div class="user-post-content" >
                            <div class="row user-post-text-content" style="margin: 0px">
                                <div class="col-sm-12">
                                    <p>
                                        `+data[i].userpost.noidung.replace(/\n/g,'</br>')+`

                                    </p>
                                </div>
                            </div>
                            <div class="row user-post-img-content" style="margin: 0px">
                                <div class="col-sm-12" style="padding-top: 20px;padding-bottom: 20px">
                                    `+arr_img+`
                                </div>
                            </div>

                        </div>
                        <div class="user-post-review-acts">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="pull-left">
                                        <div style="padding-left: 20px">
                                                `+str_like+`
                                                <a class="user-post-button-comment btn" onclick="clickButtonComment('`+data[i].userpost.id+`-user-post-button-comment')" id="`+data[i].userpost.id+`-user-post-button-comment">
                                                    <span  style="font-size: 15px">
                                                        <i class="fa fa-comments-o " aria-hidden="true"></i> bình luận
                                                    </span>
                                                </a>
                                                <a class="user-post-button-share btn" href="https://www.facebook.com/sharer/sharer.php?u=http://bkcook.ddns.net/bkcook.vn/public/baidangchitiet/`+data[i].userpost.id+`&amp;src=sdkpreparse" target="_blank">
                                                    <span  style="font-size: 15px">
                                                        <i class="fa fa-share-square-o" aria-hidden="true"></i> chia sẻ
                                                    </span>
                                                </a>

                                        </div>

                                    </div>
                                    <div class="pull-right user-post-view">
                                        <span style="font-size: 14px">`+data[i].userpost.soluotxem+` lượt xem <i class="fa fa-eye" aria-hidden="true"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer" id="`+data[i].userpost.id+`-panel-footer">

                        <div class="user-post-react" id="`+data[i].userpost.id+`-user-post-react">
                            `+str_check+`
                        </div>


                        <hr style="margin: 10px">

                        <div class="user-post-comment-area">
                            <div class="user-post-list-comment" id="`+data[i].userpost.id+`-user-post-list-comment">
                                `+arr_list_comment+`
                            </div>

                            <!-- review comment -->

                            `+ str_user_online+`

                        </div>
                    </div>
                </div>`;
                    }
                    $(".list-user-post").append(element);
                },

                Error: function (x, e) {
                    alert("Some error");
                }
            });
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
</body>
</html>


<?php /* E:\Xampp.7.3\htdocs\bkcook.vn\resources\views/customer/dangbai.blade.php */ ?>