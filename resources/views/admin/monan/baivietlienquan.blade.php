@extends('admin.layouts.index')
@section('content')

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Các Bài Viết Liên Quan
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-12">
                @if(Session::has('xoabaivietthanhcong'))
                <div class="alert alert-success"><strong>{{Session::get('xoabaivietthanhcong')}}</strong></div>
                @endif
            </div>
            <table class="table table-striped table-bordered table-hover" id="dataTables-example" style="table-layout:fixed;">
                <thead>
                    <tr align="center">
                        <th style="overflow:hidden;" title="ID">ID</th>
                        <th style="overflow:hidden;" title="Tiêu Đề">Tiêu Đề</th>
                        <th style="overflow:hidden;" title="Nội Dung">Nội Dung</th>
                        <th style="overflow:hidden;" title="Số Lượt Xem">Số Lượt Xem</th>
                        <th style="overflow:hidden;" title="Số Lượt Thích">Số Lượt Thích</th>
                        <th style="overflow:hidden;" title="Số Lượng Bình Luận">Số Lượng Bình Luận</th>
                        <th style="overflow:hidden;" title="ID Loại Món">ID Loại Món</th>
                        <th style="overflow:hidden;" title="ID User">ID User</th>
                        <th style="overflow:hidden;" title="Created_at">Created_at</th>
                        <th style="overflow:hidden;" title="Updated_at">Updated_at</th>
                        <th style="overflow:hidden;" title="Xóa">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bv_lienquan as $bvlq)
                    <tr class="odd gradeX" align="center">
                        <td style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;" title="{{$bvlq -> id}}">{{$bvlq -> id}}</td>
                        <td style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;" title="{{$bvlq -> noidung}}">{{$bvlq -> tieude}}</td>
                        <td style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;" title="{{$bvlq -> noidung}}">{{$bvlq -> noidung}}</td>
                        <td style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;" title="{{$bvlq -> soluotxem}}">{{$bvlq -> soluotxem}}</td>
                        <td style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;" title="{{$bvlq -> soluotthich}}">{{$bvlq -> soluotthich}}</td>
                        <td style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;" title="{{$bvlq -> soluong_comment}}">{{$bvlq -> soluong_comment}}</td>
                        <td style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;" title="{{$bvlq -> id_loaimon}}">{{$bvlq -> id_loaimon}}</td>
                        <td style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;" title="{{$bvlq -> id_user}}">{{$bvlq -> id_user}}</td>
                        <td style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;" title="{{$bvlq -> created_at}}">{{$bvlq -> created_at}}</td>
                        <td style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;" title="{{$bvlq -> updated_at}}">{{$bvlq -> updated_at}}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('XoaBaiVietLienQuan', [$bvlq -> id, $ma -> id] )}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"> Xóa</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
        </div>
        <!-- /#page-wrapper -->
        @endsection