@extends('admin.layouts.index')
@section('content')
<!-- Page Content -->
<script>
    function validateForm() {
        var x = document.forms["suaVungMien"]["ten"].value.trim();
        if (x == "") {
            alert("Bạn chưa nhập tên vùng miển");
            return false;
        } else {
            return true;
        }
    }
</script>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Vùng Miền
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
                        <form name="suaVungMien" action="{{route('suaVungMien',$vungmien->id)}}" enctype="multipart/form-data" method="POST" onsubmit="return validateForm()">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            
                                <div class="form-group">
                                    <label>Tên vùng miền</label>
                                    <input class="form-control" name="ten" required value="{{$vungmien->ten}}" placeholder="nhập tên công dụng"/>
                                </div>
                               <div class="form-group">
                                  <label >Chọn ảnh đại diện</label>
                                  <input value="{{$vungmien->anh}}" type="file" name="anh">
                             </div>
                             <div class="form-group">
                                <td><img src="{{$vungmien->anh}}" alt="" width="150px" height="150px"></td>
                             </div>
                                 <div class="form-group">
                                    <label>vị trí</label>
                                    <input class="form-control" name="vitri" value="{{$vungmien->vitri}}"  placeholder="nhập vị trí"/>
                                </div>
                                 <div class="form-group">
                                    <label>Giới thiệu</label>
                                    <input class="form-control" name="gioithieu" value="{{$vungmien->gioithieu}}"  placeholder="nhập tên không dấu"/>
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
@endsection