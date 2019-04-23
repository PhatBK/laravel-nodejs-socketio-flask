@extends('admin.layouts.index')
@section('content')
<script>
    function validateForm() {
        var x = document.forms["congdung"]["ten"].value.trim();
        if (x == "") {
            alert("Bạn chưa nhập tên công dụng");
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
                        <h1 class="page-header">Công Dụng
                            <small>Thêm</small>
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
                        <form name="congdung" action="{{route('themCongDung')}}" enctype="multipart/form-data" method="POST" onsubmit="return validateForm()">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>Tên</label>
                                <input class="form-control" name="ten" required placeholder="nhập tên công dụng"/>
                            </div>
                            <div class="form-group">
                               <label>chọn ảnh đại diện</label>
                              <input type="file" name="anh" required>
                            </div>
                            <div class="form-group" >
                                <div class="col-md-4 col-md-offset-3 container-fluid">
                                    <button type="submit" class="btn btn-primary pull-left">Thêm</button>
                                    <a class="btn btn-warning pull-right" href="{{route('danhSachCongDung')}}">Huỷ bỏ</a>
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