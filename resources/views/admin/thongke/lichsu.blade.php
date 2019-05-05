@extends('admin.layouts.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    @if (session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header" style="text-align: center;">Lịch Sử Thống Kê Hệ Thống
                        </h2>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example" style="table-layout:fixed;">
                        <thead>
                            <tr align="center">
                                <th style="overflow:hidden;" title="Ngày">Ngày</th>
                                <th>Lượt Truy Cập</th>
                                <th>Món Ăn</th>
                                <th>Thể Loại</th>
                                <th>Loại Món</th>
                                <th>Công Dụng</th>
                                <th>Mục Đích</th>
                                <th>Vùng Miền</th>
                                <th>Tài Khoản</th>
                                <th>Tài Khoản Nhà Hàng</th>
                                <th>Ảnh</th>
                                <th>Video</th>
                                <th>Bài Đăng</th>
                                <th>Bình Luận</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($thongkes as $thongke)
                            <tr class="odd gradeX" align="center">
                                <td style="overflow:hidden;" title="{{ $thongke->created_at}}">{{ $thongke->created_at}}</td>
                                <td>{{$thongke->soluong_truycap}}</td>
                                <td>{{ $thongke->soluong_monan }}</td>
                                <td>{{ $thongke->soluong_theloai  }}</td>
                                <td>{{ $thongke->soluong_loaimon  }}</td>
                                <td>{{ $thongke->soluong_congdung  }}</td>
                                <td>{{ $thongke->soluong_mucdich  }}</td>
                                <td>{{ $thongke->soluong_vungmien  }}</td>
                                <td>{{ $thongke->soluong_taikhoan  }}</td>
                                <td>{{ $thongke->soluong_nhahanglienket  }}</td>
                                <td>{{ $thongke->soluong_anh  }}</td>
                                <td>{{ $thongke->soluong_video  }}</td>
                                <td>{{ $thongke->soluong_baipost  }}</td>
                                <td>{{ $thongke->soluong_comment }}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/thongke/xoa/{{ $thongke->id }}">Xóa</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
<!-- /.container-fluid -->
</div>
@endsection