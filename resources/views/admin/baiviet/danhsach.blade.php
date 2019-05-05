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
                    @if (session('thongbaoloi'))
                    <div class="alert alert-danger">
                        {{session('thongbaoloi')  }}
                    </div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Danh Sách Bài Viết Của Người Dùng
                            <small>(danh sach)</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="dataTables-example" style="table-layout:fixed;">
                        <thead>
                            <tr align="center">
                                    <th style="overflow:hidden;" title="ID">ID</th>
                                    <th style="overflow:hidden;" title="Tiêu Đề">Tiêu Đề</th>
                                    <th style="overflow:hidden;" title="Nội Dungg">Nội Dung</th>
                                    <th style="overflow:hidden;" title="Số Lượt Xem">Số Lượt Xem</th>
                                    <th style="overflow:hidden;" title="Số Lượt Thích">Số Lượt Thích</th>
                                    <th style="overflow:hidden;" title="Số Lượng ảnh">Số Lượng Ảnh</th>
                                    <th style="overflow:hidden;" title="Số Lượng Comment">Số Lượng Comment</th>
                                    <th style="overflow:hidden;" title="Loại Món">Loại Món</th>
                                    <th style="overflow:hidden;" title="Người Đăng">Người Đăng</th>
                                    <th style="overflow:hidden;" title="Ngày Đăng">Ngày Đăng</th>
                                    <th style="overflow:hidden;" title="Xem Chi Tiết">Xem Chi Tiết</th>
                                    <th style="overflow:hidden;" title="Xóa Bài Viết">Xóa Bài Viết</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($baiviets as $baiviet)
                            <tr class="odd gradeX" align="center">
                                    <td style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">{{$baiviet->id }}</td>
                                    <td style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;" data-toggle="tooltip" data-placement="top" title="{{$baiviet->tieude }}">{{$baiviet->tieude }}</td>
                                    <td style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;" title="{{$baiviet->noidung }}">{{$baiviet->noidung }}</td>
                                    <td style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;" title="{{$baiviet->soluotxem }}">{{$baiviet->soluotxem }}</td>
                                    <td style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;" title="{{$baiviet->soluotthich }}">{{$baiviet->soluotthich }}</td>
                                    <td style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;" title="">{{count($baiviet->postimage )}}</td>
                                    <td style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;" title="">{{ count($baiviet->commentpost) }}</td>
                                    <td style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;" title="{{$baiviet->loaimon->ten}}">{{$baiviet->loaimon->ten}}</td>
                                    <td style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;" title="{{$baiviet->user->tentaikhoan }}">{{$baiviet->user->tentaikhoan }}</td>
                                    <td style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;" title="{{$baiviet->created_at  }}">{{$baiviet->created_at  }}</td>
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/baiviet/xemchitiet/{{$baiviet->id }}">Xem Chi Tiết</a></td>
                                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/baiviet/xoa/{{ $baiviet->id}}">Xóa Bài Viết</a></td>
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