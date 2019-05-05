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
                <h1 class="page-header">Thể Loại
                    <small>Danh sách</small>
                </h1>
            </div>
            <div class="col-lg-12">
                @if(Session::has('themthanhcong'))
                <div class="alert alert-success"><strong>{{Session::get('themthanhcong')}}</strong></div>
                @elseif(Session::has('suathanhcong'))
                <div class="alert alert-success"><strong>{{Session::get('suathanhcong')}}</strong></div>
                @endif
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example" style="table-layout:fixed;">
                <thead>
                    <tr align="center">
                        <th style="overflow:hidden;" title="ID">ID</th>
                        <th style="overflow:hidden;" title="Tên">Tên</th>
                        <th style="overflow:hidden;" title="Ảnh đại diện">Ảnh</th>
                        <th style="overflow:hidden;" title="Tên">Calos</th>
                        <th style="overflow:hidden;" title="Tên">Carbon</th>
                        <th style="overflow:hidden;" title="Tên">Chất Xơ</th>
                        <th style="overflow:hidden;" title="Tên">Chất Béo</th>
                        <th style="overflow:hidden;" title="Tên">Chất Béo Bão Hòa</th>
                        <th style="overflow:hidden;" title="Tên">Protein</th>
                        <th style="overflow:hidden;" title="Ngày tạo">Ngày tạo</th>
                        <th style="overflow:hidden;" title="Ngày cập nhật">Ngày cập nhật</th>
                        <th style="overflow:hidden;" title="Xoá thể loại">Xoá</th>
                        <th style="overflow:hidden;" title="Sửa thể loại">Sửa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($nguyenlieus as $nl)
                    <tr class="odd gradeX" align="center">
                        <td style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">{{$nl ->id}}</td>
                        <td style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;"  title="{{$nl->ten}}">{{$nl ->ten}}</td>
                        <td><img src="{{$nl->anh}}" alt="" width="50px" height="50px"></td>
                        <td style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;"  title="{{$nl->calos}}">{{$nl ->calos}}</td>
                        <td style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;"  title="{{$nl->carbon}}">{{$nl ->carbon}}</td>
                        <td style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;"  title="{{$nl->xo}}">{{$nl ->xo}}</td>
                        <td style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;"  title="{{$nl->fat}}">{{$nl ->fat}}</td>
                        <td style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;"  title="{{$nl->fat_baohoa}}">{{$nl ->fat_baohoa}}</td>
                        <td style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;"  title="{{$nl->protein}}">{{$nl ->protein}}</td>
                        <td style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;"  title="{{$nl->created_at}}">{{$nl ->created_at}}</td>
                        <td style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;"  title="{{$nl->updated_at}}">{{$nl ->updated_at}}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/nguyenlieu/xoa/{{ $nl ->id }}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')""> Xóa</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/nguyenlieu/sua/{{ $nl ->id }}">Sửa</a></td>
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