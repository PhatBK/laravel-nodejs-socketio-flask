<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Ẳm thực quanh ta">
    <meta name="Team BK-food" content="Lập trình web với Laravel">
    <title>Admin Login</title>
    <base href="{{asset('')}}">
    <!-- Bootstrap Core CSS -->
    <link href="vendor_admin/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor_admin/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="vendor_admin/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor_admin/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                @if (session('thongbaoloi'))
                <div class="alert alert-danger">
                    {{session('thongbaoloi')}}
                </div>
                @endif
                @if(session('dangxuat'))
                    <div class="alert alert-warning">
                        {{session('dangxuat')}}
                    </div>
                @endif
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title" style="text-align: center;">Đăng Nhập Trang Admin</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="admin/dangnhap" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Tên Đăn Nhập" name="tentaikhoan" type="text" required="" title=":Tên Đăng Nhập Đích Thực Phải Là Tên Đăng Nhập Của Bạn" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Mật Khẩu" name="password" type="password" value="" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title=":  Mật khẩu phải chứa ít nhất một ký tự thường,một ký tự hoa,một chứ số và mật khẩu phải dài hơn 8 ký tự" required="">
                                </div>
                              {{--   <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Ghi Nhớ
                                    </label>
                                </div> --}}
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="btn btn-lg btn-success btn-block">Đăng Nhập</button>
                            </fieldset>
                        </form>
                        <br>
                        <div class="form-group">
                            <a class="btn btn-lg btn-warning btn-block" href="{{route('trangchu')}}">Trở Về Trang Chủ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="vendor_admin/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="vendor_admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor_admin/bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="vendor_admin/dist/js/sb-admin-2.js"></script>
</body>
</html>
