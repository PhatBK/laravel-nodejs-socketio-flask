@extends('admin.layouts.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Món Ăn
                    <small>Danh sách</small>
                </h1>
            </div>
            <div class="col-lg-12">
                @if(Session::has('themmonanthanhcong'))
                <div class="alert alert-success"><strong>{{Session::get('themmonanthanhcong')}}</strong></div>
                @elseif(Session::has('suamonanthanhcong'))
                <div class="alert alert-success"><strong>{{Session::get('suamonanthanhcong')}}</strong></div>
                @elseif(Session::has('xoamonanthanhcong'))
                <div class="alert alert-success"><strong>{{Session::get('xoamonanthanhcong')}}</strong></div>
                @endif
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example" style="table-layout:fixed;">
                <thead>
                    <tr align="center">
                        <th style="overflow:hidden;" title="ID">ID</th>
                        <th style="overflow:hidden;" title="Tên món ăn">Tên món ăn</th>
                        <th style="overflow:hidden;" title="Ảnh">Ảnh</th>
                        <th style="overflow:hidden;" title="Giới thiệu">Giới thiệu</th>
                        <th style="overflow:hidden;" title="Ngày tạo">Ngày tạo</th>
                        <th style="overflow:hidden;" title="Ngày cập nhật">Ngày cập nhật</th>
                        <th style="overflow:hidden;" title="Xem chi tiết">Xem chi tiết</th>
                        <th style="overflow:hidden;" title="Thêm bước nấu">Các bước nấu</th>
                        <th style="overflow:hidden;" title="Thêm bước nấu">Video</th>
                        <th style="overflow:hidden;" title="Bình Luận">Bình luận</th>
                        <th style="overflow:hidden;" title="Bài Viết Liên Quan">Bài Viết Liên Quan</th>
                        <th style="overflow:hidden;" title="Sửa">Sửa</th>
                        <th style="overflow:hidden;" title="Xóa">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($monan as $ma)
                    <tr class="odd gradeX" align="center">
                        <td style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;" title="{{$ma -> id}}">{{$ma -> id}}</td>
                        <td style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;" title="{{$ma -> ten_monan}}">{{$ma -> ten_monan}}</td>
                        <td style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;" title="{{$ma -> anh_monan}}"><img src="uploads/monan/{{$ma -> anh_monan}}" style="height: 50px; width: 40px;"></td>
                        <td style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;" title="{{$ma -> gioithieu}}">{{$ma -> gioithieu}}</td>
                        <td style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;" title="{{$ma -> created_at}}">{{$ma -> created_at}}</td>
                        <td style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;" title="{{$ma -> updated_at}}">{{$ma -> updated_at}}</td>
                        <td class="center"><i class="fa"></i><a href="{{route('chiTietMonAn', $ma -> id)}}"> Xem chi tiết</a></td>
                        <td class="center"><a href="{{route('themBuocNau', $ma -> id)}}">Các bước nấu</a></td>
                        <td class="center"><a href="{{route('themVideo', $ma -> id)}}">Video</a></td>
                        <td class="center"><a href="{{route('binhLuan', $ma -> id)}}">Bình Luận</a></td>
                        <td class="center"><a href="{{route('baiVietLienQuan', $ma -> id)}}">Bài viết liên quan</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('suaMonAn', $ma -> id)}}">Sửa</a></td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('xoaMonAn', $ma -> id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"> Xóa</a></td>
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