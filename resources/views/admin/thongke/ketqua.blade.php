@extends('admin.layouts.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header" style="text-align: center;">Kết Quả Thống Kê Hệ Thống
                        </h2>
                    </div>
                    <!-- /.col-lg-12 -->
                   <table class="table table-striped table-bordered table-hover" id="dataTables-example" style="table-layout:fixed;">
                        <thead>
                            <tr align="center">
                                <th  style="overflow:hidden;" title="Ngày">Ngày</th>
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
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="odd gradeX" align="center">
                                <td id="day" style="overflow:hidden;" title="Ngày"></td>
                                <td>{{$luottruycaps}}</td>
                                <td>{{ $monans }}</td>
                                <td>{{ $theloais}}</td>
                                <td>{{ $loaimons }}</td>
                                <td>{{ $congdungs }}</td>
                                <td>{{ $mucdichs }}</td>
                                <td>{{ $vungmiens }}</td>
                                <td>{{ $users }}</td>
                                <td>{{ $nhahangs }}</td>
                                <td>{{ $anhs  }}</td>
                                <td>{{ $videos }}</td>
                                <td>{{ $baiviets }}</td>
                                <td>{{ $comments }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
<!-- /.container-fluid -->
</div>
<script>
    var date = new Date();
    document.getElementById('day').innerHTML = date;
</script>
@endsection