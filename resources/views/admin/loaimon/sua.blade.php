@extends('admin.layouts.index')
@section('content')
<script>
    function validateForm() {
        var x = document.forms["loaimon"]["ten"].value.trim();
        if (x == "") {
            alert("Bạn chưa nhập tên loại món");
            return false;
        } else {
            return true;
        }
    }
</script>
<!-- Page Content -->
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Loại Món
                            <small>Sửa</small>
                        </h1>
                    </div>
                     @if(count($errors) > 0)
                    <div class="col-lg-12">
                        <div class="alert alert-danger">
                            @foreach($errors -> all() as $err)
                            {{$err}}<br>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form name="loaimon" action="{{route('suaLoaiMon',$loaimon->id)}}" enctype="multipart/form-data"  method="POST" onsubmit="return validateForm()">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>Tên</label>
                                <input class="form-control" name="ten" required  value="{{$loaimon->ten}}" placeholder="nhập tên loại món"/>
                            </div>
                             <div class="form-group">
                                <label>thể Loại</label>
                               <select name="idtheloai" class="form-control form-control-sm">
                                   @foreach($theloai as $tl)
                                   <option value="{{$tl->id}}" @if($tl->id==$loaimon->id_theloai) selected @endif>{{$tl->ten}}</option>
                                   @endforeach
                               </select>

                            </div>
                             <div class="form-group">
                              <label >Chọn ảnh đại diện</label>
                              <input  value="{{$tl->anh}}" type="file" name="anh">
                             </div>
                             <div class="form-group">
                                <td><img src="{{$loaimon->anh}}" alt="" width="150px" height="150px"></td>
                             </div>
                           <div class="form-group" >
                                <div class="col-md-4 col-md-offset-3 container-fluid">
                                    <button type="submit" class="btn btn-primary pull-left">Lưu</button>
                                    <button type="button" class="btn btn-warning pull-right" onclick="window.location='{{ URL::previous() }}'">Huỷ bỏ</button>
                                </div>
                            </div>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection