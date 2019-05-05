@extends('admin.layouts.index')
@section('content')
<!-- Page Content -->
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row" id="error">
                    @if(count($errors) > 0)
                    <div class="alert alert-danger">
                    @foreach ($errors->all() as $err)
                        {{$err}} <br />
                    @endforeach
                    </div>
                    @endif
                    {{-- @if (session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                    @endif --}}
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tài Khoản Thành Viên
                            <small style="color: red;">(Thêm)</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="admin/user/them" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <div class="form-group">
                                <label>Họ Và Tên</label>
                                <input class="form-control" name="fullname" placeholder="Họ và Tên" required="" />
                            </div>
                            <div class="form-group">
                                <label>Giới Tính : </label>
                                <label class="radio-inline">
                                    <input name="rdoGT" value="1" checked="" type="radio">Nam
                                </label>
                                <label class="radio-inline">
                                    <input name="rdoGT" value="2" type="radio">Nữ
                                </label>
                                <label class="radio-inline">
                                    <input name="rdoGT" value="3" type="radio">Không Xác Định
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Tuổi</label>
                                <input class="form-control" name="tuoi" placeholder="Tuổi" />
                            </div>
                            <div class="form-group">
                                <label>Công Việc Hiện Tại</label>
                                <input class="form-control" name="congviec" placeholder="Công Việc" />
                            </div>
                            <hr class="alert-warning">
                            <div class="form-group">
                                <label>Địa Chỉ Gmail</label>
                                <input type="email" class="form-control" name="email" placeholder="Gmail" required />
                            </div>
                            <div class="form-group">
                                <label>Tên Tài Khoản</label>
                                <input type="text" class="form-control" name="tentaikhoan" placeholder="Tên Đăng Nhập" required />
                            </div>
                            <div class="form-group">
                                <label>Mật Khẩu</label>
                                <input id="pass" type="password" class="form-control password" name="password" placeholder="Mật Khẩu" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title=":  Mật khẩu phải chứa ít nhất một ký tự thường,một ký tự hoa,một chứ số và mật khẩu phải dài hơn 8 ký tự" required />
                            </div>
                            <div class="form-group">
                                <label>Xác Nhận Mật Khẩu</label>
                                <input id="passa" type="password" class="form-control password" name="passwordAgain" placeholder="Nhập Lại Mật Khẩu" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" onchange="
                                this.setCustomValidity(this.validity.patternMismatch ? this.title : '');" title="Mật khẩu xác nhận không đúng..." />
                            </div>

                            <hr class="alert-warning">

                            <div class="form-group">
                                <label>Ảnh Đại Diện<label>
                                <input type="file" name="anh" required />
                            </div>

                            <div class="form-group">
                                <label>Nổi Bật</label>
                                <input type="text" class="form-control" name="noibat" placeholder=""/>
                            </div>
                            <div class="form-group">
                                <label>Loại Tài Khoản : </label>
                                @if(Auth::user()->level == 0)
                                <label class="radio-inline">
                                <input name="rdoUser" value="0" type="radio">Super-Admin
                                </label>
                                @endif
                                <label class="radio-inline">
                                    <input name="rdoUser" value="1" type="radio">Admin-CT
                                </label>
                                <label class="radio-inline">
                                    <input name="rdoUser" value="2" checked="" type="radio">Customer
                                </label>
                            </div>

                            <button type="submit" class="btn btn-success">Lưu</button>
                            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                            <a  class="btn btn-warning pull-right" href="admin/user/danhsach">Huỷ bỏ</a>
                        <form>
                    </div>
                    <div class="col-md-5 alert-warning">
                        <label>Hướng Dẫn:</label>
                        <pre>
        Thêm Tài Khoản Người Dùng Mới


    B1:
    B2:
    B3:
    B4:
    B5:
    B6:
    B7:
    B8:
    B9:
    B10:
    B11:



                        </pre>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
</div>
{{-- có thể sử dụng ajax để hiển thị lỗi --}}
<!-- /#page-wrapper -->
@endsection
