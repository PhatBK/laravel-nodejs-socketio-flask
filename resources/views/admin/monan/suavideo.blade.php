@extends('admin.layouts.index')
@section('content')

<script>
    function checkVideo(target) {
        if(target.files[0].type.indexOf("video") == -1) {
            alert("File bạn chọn không phải file video");
            return false;
        } else {
            return true;
        }
    }

    function validateForm() {
        var a = document.forms["suaVideo"]["tenVideo"].value.trim();

        if (a == "") {
            alert("Bạn chưa nhập tên video");
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
                <h1 class="page-header">Video
                    <small>Sửa</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="{{route('suaVideo', [$video -> id_monan, $video -> id])}}" method="POST" name="suaVideo" onsubmit="return validateForm()" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                        <label>Video</label>
                        @if($video -> ten != null)
                        <input class="form-control" name="tenVideo" value="{{$video -> ten}}" required="" /><br>
                        <input type="file" name="suaVideo" multiple="multiple" onchange="checkVideo(this)"/>
                        @else
                        <h4 class="form-control">Không có Video nào!</h4><br>
                        @endif
                    </div>
                    <div class="col-md-3"><button type="submit" class="btn btn-default">Sửa</button></div>
                    <div class="col-md-3"><a href="{{route('suaMonAn', $video -> id_monan)}}" class="btn btn-default">Cancel</a></div>
                    <form>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
        </div>
        <!-- /#page-wrapper -->
        @endsection