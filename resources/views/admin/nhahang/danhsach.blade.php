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
                        <h1 class="page-header">Nhà Hàng Liên Kết
                            <small>(danh sách)</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example" style="table-layout:fixed;">
                        <thead>
                            <tr align="center">
                                <th style="overflow:hidden;" title="ID">ID</th>
                                <th style="overflow:hidden;" title="Tên Nhà Hàng">Tên Nhà Hàng</th>
                                <th style="overflow:hidden;" title="Tên Không Dấu">Tên Không Dấu</th>
                                <th style="overflow:hidden;" title="Tên Đăng Nhập">Tên Đăng Nhập</th>
                                <th style="overflow:hidden;" title="Mật Khẩu">Mật Khẩu</th>
                                <th style="overflow:hidden;" title="Số Lượt Xem">Số Lượt Xem</th>
                                <th style="overflow:hidden;" title="Nổi Bật">Nổi Bật</th>
                                <th style="overflow:hidden;" title="Liên Hệ">Liên Hệ</th>

                                <th style="overflow:hidden;" title="Giờ Mở Của">Mở Cửa</th>
                                <th style="overflow:hidden;" title="Giờ Đóng Cửa">Đóng Cửa</th>

                                <th style="overflow:hidden;" title="Vị Chí">Bản Đồ</th>
                                <th style="overflow:hidden;" title="Giới Thiệu">Giới Thiệu</th>
                                <th style="overflow:hidden;" title="Ảnh Đại Diện">Ảnh Đại Diện</th>
                                <th style="overflow:hidden;" title="Ngày Lập Tài Khoản">Ngày Lập</th>
                                <th style="overflow:hidden;" title="Sửa Tài Khoản">Sửa Tài Khoản</th>
                                <th style="overflow:hidden;" title="Xóa Tài Khoản">Xóa Tài Khoản</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($nhahangs as $nhahang)
                            <tr class="odd gradeX" align="center">
                                <td style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;" data-toggle="tooltip" data-placement="top" title="{{ $nhahang->id }}">{{ $nhahang->id }}</td>
                                <td style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;" data-toggle="tooltip" data-placement="top" title="{{ $nhahang->ten }}">{{ $nhahang->ten }}</td>
                                <td style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;" data-toggle="tooltip" data-placement="top" title="{{ $nhahang->tenkhongdau }}">{{ $nhahang->tenkhongdau }}</td>
                                <td style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;" data-toggle="tooltip" data-placement="top" title="{{ $nhahang->username }}">{{ $nhahang->username }}</td>
                                <td style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;" data-toggle="tooltip" data-placement="top" title="{{ $nhahang->password }}">{{ $nhahang->password }}</td>
                                <td style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;" data-toggle="tooltip" data-placement="top" title="{{ $nhahang->luotxem }}">{{ $nhahang->luotxem }}</td>
                                <td style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;" data-toggle="tooltip" data-placement="top" title="{{ $nhahang->noibat }}">{{ $nhahang->noibat }}</td>
                                <td style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;" data-toggle="tooltip" data-placement="top" title="{{ $nhahang->lienhe }}">{{ $nhahang->lienhe }}</td>

                                <td style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;" data-toggle="tooltip" data-placement="top" title="{{ $nhahang->giomocua }}"><time>{{ $nhahang->giomocua }}</time></td>
                                <td style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;" data-toggle="tooltip" data-placement="top" title="{{ $nhahang->giodongcua}}"><time>{{ $nhahang->giodongcua}}</time></td>

                                <td style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;" data-toggle="tooltip" data-placement="top" title="{{ $nhahang->vitri }}">{{ $nhahang->vitri }}</td>
                                <td style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;" data-toggle="tooltip" data-placement="top" title="{{ $nhahang->gioithieu }}">{{ $nhahang->gioithieu }}</td>
                                <td style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;" data-toggle="tooltip" data-placement="top" title="{{ $nhahang->anh }}"><img src="{{$nhahang->anh }}" alt="" width="50px" height="50px"></td>
                                <td style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;" data-toggle="tooltip" data-placement="top" title="{{ $nhahang->created_at }}">{{ $nhahang->created_at }}</td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i><a href="admin/nhahang/sua/{{ $nhahang->id }}/{{ $nhahang->ten }}">Sửa</a></td>
                                <td class="center"><i class="fa fa-trash-o fa-fw"></i> <a href="admin/nhahang/xoa/{{ $nhahang->id }}" onclick="return confirm('bạn có muốn xoá không?');">Xóa</a></td>
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