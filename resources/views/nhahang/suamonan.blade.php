@extends('nhahang.master')
@section('content')

<script>
    function validateForm() {
        var a = document.forms["suaMonAnNhaHang"]["tenmon"].value.trim();
        var b = document.forms["suaMonAnNhaHang"]["gia"].value.trim();
        var c = document.forms["suaMonAnNhaHang"]["khuyenmai"].value.trim();
        if(a == "") {
            alert('Bạn chưa nhập tên món ăn');
            return false;
        } else if(b <= 1000) {
            alert('Gía món ăn phải lớn hơn hoặc bằng 1000');
            return false;
        } else if(c < 0) {
            alert('Khuyên Mại phải là sô dương');
            return false;
        } else {
            return true;
        }
    }
</script>
<!-- Page Content -->
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row" id="error">
                    @if(count($errors) > 0)
                    <div class="alert alert-danger">
                    @foreach ($errors->all() as $err)
                        {{$err}} <br />
                    @endforeach
                    </div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sửa Món Ăn
                            <small style="color: red;">(sửa)</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="nhahang/monan/sua/{{$monan->id}}" method="POST" name="suaMonAnNhaHang" enctype="multipart/form-data" onsubmit="return validateForm()">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <div class="form-group">
                                <label>Tên Món</label>
                                <input class="form-control" name="tenmon" value="{{ $monan->tenmon }}" placeholder="Nhập tên món ăn" required="" />
                            </div>
                            <div class="form-group">
                                <label>Giá Bán</label>
                                <input type="number" class="form-control" name="gia" value="{{ $monan->gia }}" placeholder="Giá bán" required="" />
                            </div>
                            <div class="form-group">
                                <label>Khuyến Mại</label>
                                <input type="number" class="form-control" name="khuyenmai" value="{{ $monan->khuyenmai }}" placeholder="khuyến mại" required="" />
                            </div>
                            <div class="form-group">
                                <label>Nội Dung</label>
                                <textarea class="form-control" name="noidung" placeholder="Nội dung" rows="5" required>{{ $monan->noidung }}</textarea>
                            </div>
                            <label>Ảnh Đại Diện</label>
                            <br>
                            <div class="form-group">
                                <img src="{{ $monan->image}}" alt="Kết nối Internet không ổn định" style="width: 580px;height: 400px;" >
                            </div>
                            <div class="form-group">
                                <label>Thay Ảnh Món Ăn<label>
                                <input type="file" name="anh" />
                            </div>
                            <button type="submit" class="btn btn-success">Lưu</button>
                            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                            <a class="btn btn-warning pull-right" href="admin/user/danhsach">Huỷ bỏ</a>
                        <form>
                    </div>
                    <div class="col-md-5 alert-warning">
                    <label>Hướng Dẫn:</label>
                    <pre>

                    </pre>
                    </div>
                </div>
                <!-- /.row -->
            </div>
 <!-- /.container-fluid -->
</div>
{{-- có thể sử dụng ajax để hiển thị lỗi --}}
<!-- /#page-wrapper -->
@endsection
