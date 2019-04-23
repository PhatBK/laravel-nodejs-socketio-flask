@extends('admin.layouts.index')
@section('content')

<script>
    function checkImage(target) {
        if(target.files[0].type.indexOf("image") == -1) {
            alert("File bạn chọn không phải file ảnh");
            return false;
        } else {
            return true;
        }
    }

    function validateForm() {
        var a = document.forms["suaBuocNau"]["noiDungBuoc"].value.trim();

        if (a == "") {
            alert("Bạn chưa nhập nội dung bước nấu");
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
                <h1 class="page-header">Bước nấu
                    <small>Sửa</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="{{route('suaBuocNau', [$buocnau -> id_monan, $buocnau -> id])}}" method="POST" name="suaBuocNau" onsubmit="return validateForm()" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea name="noiDungBuoc" class="form-control" style="height: 250px" required="">{{$buocnau -> noidung}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Ảnh</label>
                        @if($buocnau -> image != null)
                        <input class="form-control" name="tenAnh" value="{{$buocnau -> image}}" required="" /><br>
                        <input type="file" name="image" multiple="multiple" onchange="checkImage(this)"/>
                        @else
                        <h4 class="form-control">Không có ảnh nào!</h4><br>
                        @endif
                    </div>
                    <div class="col-md-3"><button type="submit" class="btn btn-default">Sửa</button></div>
                    <div class="col-md-3"><a href="{{route('suaMonAn', $buocnau -> id_monan)}}" class="btn btn-default">Cancel</a></div>
                    <form>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
        </div>
        <!-- /#page-wrapper -->
        @endsection