@extends('admin.layouts.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    @if (session('thongbao'))
                    <div class="alert alert-danger">
                        {{session('thongbaoloi')  }}
                    </div>
                    @endif
                    @if(count($errors) > 0)
                    <div class="alert alert-danger">..
                    @foreach ($errors->all() as $err)
                        {{$err}} <br />
                    @endforeach
                </div>
                @endif
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header" style="text-align: center;">Chi Tiết Tài Khoản:<b style="color: green;">{{$user->tentaikhoan}}</b>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="admin/user/sua/{{$user->id}}/{{ $user->tentaikhoan }}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <div class="form-group">
                                <label>Họ Và Tên</label>
                                <input class="form-control" value="{{ $user->hovaten }}" name="fullname" placeholder="Họ và Tên" required="" disabled="" />
                            </div>
                            <div class="form-group" disabled="">
                                <label>Giới Tính : </label>
                                <label class="radio-inline">
                                    <input name="rdoGT" value="1"
                                    @if ($user->gioitinh == "Nam")
                                        {{"checked"}}
                                    @endif
                                    type="radio">
                                    Nam
                                </label>
                                <label class="radio-inline">
                                    <input name="rdoGT" value="2"
                                    @if ($user->gioitinh == "Nữ")
                                        {{"checked"}}
                                    @endif
                                        type="radio">
                                    Nữ
                                </label>
                                <label class="radio-inline">
                                    <input name="rdoGT" value="3"
                                    @if ($user->gioitinh == "Không Xác Định")
                                        {{"checked"}}
                                    @endif
                                     type="radio">
                                     Không Xác Định
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Tuổi</label>
                                <input class="form-control" value="{{ $user->tuoi }}" name="tuoi" placeholder="Tuổi" disabled="" />
                            </div>
                            <div class="form-group">
                                <label>Công Việc Hiện Tại</label>
                                <input class="form-control" value="{{ $user->congviec }}" name="congviec" placeholder="Công Việc" disabled="" />
                            </div>
                            <hr class="alert-warning">
                            <div class="form-group">
                                <label>Địa Chỉ Gmail</label>
                                <input type="email" class="form-control" value="{{ $user->email }}" name="email" disabled="" placeholder="Gmail" required="" disabled="" />
                            </div>
                            <div class="form-group">
                                <label>Tên Tài Khoản</label>
                                <input type="text" class="form-control" value="{{ $user->tentaikhoan }}" name="tentaikhoan" placeholder="Tên Đăng Nhập" required="" disabled="" />
                            </div>
                            <hr class="alert-warning">
                            <label>Ảnh Đại Diện</label>
                            <br>
                            <div class="form-group">
                                <img src="{{ $user->anhdaidien }}" alt="Kết nối Internet không ổn định" style="width: 580px;height: 350px">
                            </div>
                            <hr class="bg-danger">
                            <div class="form-group">
                                <label>Nổi Bật</label>
                                <input type="text" class="form-control" value="{{ $user->noibat }}" name="noibat" placeholder="" disabled="" />
                            </div>
                            <div class="form-group" >
                                <label>Loại Tài Khoản : </label>
                                <label class="radio-inline">
                                    <input name="rdoUser" value="0"
                                    @if ($user->level == 0)
                                        {{"checked"}}
                                    @endif
                                     type="radio">Super-Admin
                                </label>
                                <label class="radio-inline">
                                    <input name="rdoUser" value="1"
                                    @if ($user->level == 1)
                                        {{"checked"}}
                                    @endif
                                     type="radio">Admin-CT
                                </label>
                                 <label class="radio-inline">
                                    <input name="rdoUser" value="0"
                                    @if ($user->level == 2)
                                        {{"checked"}}
                                    @endif
                                     type="radio">Customer
                                </label>
                            </div>
                            <a  class="btn btn-warning pull-right" href="admin/user/xoa/{{$user->id}}"
                             onclick="
                                @if($user->level==2)
                                    return confirm('bạn chắc chắn muấn xóa..');
                                @endif
                                @if($user->level==1 && Auth::user()->level==0)
                                    return confirm('bạn chắc chắn muấn xóa chứ..');
                                @endif
                                @if($user->level==0 && Auth::user()->level==0)
                                    return confirm('bạn không thể xóa tài khoản này..');
                                @endif
                             ">Xóa Tài Khoản</a>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <button  type="reset"  class="btn btn-warning pull-left" onclick="window.location='{{ URL::previous() }}'">Qay Lại</button>
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
@endsection