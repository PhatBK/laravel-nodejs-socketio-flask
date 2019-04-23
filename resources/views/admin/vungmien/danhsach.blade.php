@extends('admin.layouts.index')
@section('content')
<!-- Page Content -->
<style type="text/css">
th,td {
    text-align: justify;
    max-width: 250px;
}
</style>
<script type="text/javascript">
    function checkout(){
            return confirm('bạn có muốn xoá không?');
        }
</script>
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
                        <h1 class="page-header">Vùng Miền
                            <small>Danh sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @if(!empty($vungmien))

                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th style="overflow:hidden;" title="Tên">Tên</th>
                                <th style="overflow:hidden;" title="Tên không dấu">tên không dấu</th>
                                <th style="overflow:hidden;" title="Ảnh">Ảnh</th>
                                 <th style="overflow:hidden;" title="vị trí">Vị trí</th>
                                 <th style="overflow:hidden;" title="giới thiệu">Giới thiệu</th>
                                <th style="overflow:hidden;" title="Xoá vùng miền">Xoá</th>
                                <th style="overflow:hidden;" title="Sửa vùng miền">Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($vungmien as $md)
                            <tr class="even gradeC" align="center">
                                <td style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;" title="{{$md->ten }}">{{$md->ten}}</td>
                                <td style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;" title="{{$md->tenkhongdau }}">{{$md->tenkhongdau}}</td>
                                <td><img src="{{$md->anh}}" alt="" width="50px" height="50px"></td>
                                <td style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;" title="{{$md->vitri}}">{{$md->vitri}}</td>
                                <td style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;" title="{{$md->gioithieu }}">{{$md->gioithieu}}</td>
                                <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="{{route('xoaVungMien',$md->id)}}" onclick="return confirm('bạn có muốn xoá không?');">Xoá</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('suaVungMien',$md->id)}}">Sửa</a></td>
                            </tr>
                             @endforeach
                        </tbody>
                    </table>
                    @else
                        <h3 class="text-muted">không có loại công dụng nào</h3>
                    @endif
                </div>
                <!-- /.row -->
            </div>
<!-- /.container-fluid -->
</div>
@endsection