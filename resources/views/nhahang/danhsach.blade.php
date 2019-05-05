@extends('nhahang.master')
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
                    @if (session('thongbaoloi'))
                    <div class="alert alert-danger">
                        {{session('thongbaoloi')  }}

                    </div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Danh Sách Món Ăn Của Nhà Hàng
                            <small>(tổng số:<b style="color: red;">{{ count($nhahangmonans) }}</b>)</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example" style="table-layout:fixed;">
                        <thead>
                            <tr align="center">
                                <th>ID-Món Ăn</th>
                                <th>Tên Món</th>
                                <th>Ảnh</th>
                                <th>Nội Dung</th>
                                <th>Giá</th>
                                <th>Khuyến Mại</th>
                                <th>Ngày Đăng</th>
                                <th>Sửa</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($nhahangmonans as $monan)
                                <tr class="odd gradeX" align="center">
                                <td>{{ $monan->id }}</td>
                                <td>{{ $monan->tenmon }}</td>
                                <td><img src="{{$monan->image}}" alt="" width="50px" height="50px"></td>
                                <td>{{ $monan->noidung }}</td>
                                <td>{{ $monan->gia }}</td>
                                <td>{{ $monan->khuyenmai }}</td>
                                <td>{{ $monan->created_at }}</td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="nhahang/monan/sua/{{ $monan->id }}">Sửa</a></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="nhahang/monan/xoa/{{ $monan->id }}">Xóa</a></td>
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