@extends('admin.layouts.index')
@section('content')
<!-- Page Content -->
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    @if (session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')  }}
                    </div>
                    @endif
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Chi Tiết Bài Viết:
                            <small style="color: red;">{{ $baiviet->tieude }}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="row" style="padding-bottom: 130px;">
                            <div class="col-lg-6" style="padding-bottom:40px;">
                                {{-- <form action="admin/user/them" method="POST" enctype="multipart/form-data"> --}}
                                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                    <div class="form-group">
                                        <label>ID Bài Viết:</label>
                                        <input class="form-control" name="fullname" value="{{ $baiviet->id }}" disabled="" />
                                    </div>
                                    <div class="form-group">
                                        <label>Tiêu Đề:</label>
                                        <textarea  class="form-control" rows="2" disabled="">{{ $baiviet->tieude }}</textarea>
                                    </div>
                                   <div class="form-group">
                                        <label>Loại Món Liên Quan:</label>
                                        <input class="form-control" name="fullname" value="{{ $baiviet->loaimon->ten }}" disabled="" />
                                    </div>
                                    <div class="form-group">
                                        <label>Người Đăng:</label>
                                         <input class="form-control" name="fullname" value="{{ $baiviet->user->tentaikhoan }}" disabled="" />
                                    </div>
                                    <div class="form-group">
                                        <label>Số Lượt Xem</label>
                                        <input type="text"  class="form-control" value="{{ $baiviet->soluotxem }}" disabled="">
                                    </div>
                                    <div class="form-group">
                                        <label>Số Lượt Thích</label>
                                        <input type="text" class="form-control" value="{{ $baiviet->soluotthich }}" disabled="">
                                    </div>
                                    <div class="form-group">
                                        <label>Ngày Đăng:</label>
                                        <input class="form-control" name="fullname" value="{{ $baiviet->created_at }}" disabled="" />
                                    </div>
                            </div>
                            <div class="col-lg-6" style="padding-bottom:40px;">
                                <div class="form-group">
                                    <label>Nội Dung</label><br>
                                    <textarea id="demo" name="gioithieu" class="form-control ckeditor" disabled="">{{$baiviet->noidung }}</textarea>
                                </div>
                            </div>
                            <div class="">
                                <a class="btn btn-danger pull-left" href="admin/baiviet/xoa/{{ $baiviet->id }}">Xóa Bài Viết</a>
                            </div>
                    </div>
                </div>
                <!-- /.row -->
            <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Comment Bài Viết
                            <small>(danh sách)</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @if (session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                     <table class="table table-striped table-bordered table-hover" id="dataTables-example" style="table-layout:fixed;">
                        <thead>
                            <tr align="center">
                                <th>ID Comment</th>
                                <th>ID Bài Viết</th>
                                <th>Người Comment</th>
                                <th>Nội Dung</th>
                                <th>Số Lượng Report-Comment</th>
                                <th>Ngày đăng</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($comments as $comment)
                                <tr class="odd gradeX" align="center">
                                <td>{{ $comment->id }}</td>
                                <td>{{ $baiviet->id }}</td>
                                <td>{{ $comment->user->tentaikhoan }}</td>
                                <td>{{ $comment->noidung }}</td>
                                <td>{{ count($comment->reportcommentpost) }}</td>
                                <td>{{ $comment->created_at }}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/baiviet/comment/xoa/{{ $comment->id }}/{{ $baiviet->id }}">Xóa</a></td>
                            @endforeach
                        </tbody>
                    </table>
                 </div>
        </div>
<!-- /.container-fluid -->
</div>
{{-- Script check validate form với JavaScript --}}
<script type="text/javascript">
</script>
<!-- /#page-wrapper -->
@endsection
