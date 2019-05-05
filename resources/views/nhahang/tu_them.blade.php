@extends('nhahang.master')
@section('content')
<script>
    function validateForm() {
        var a = document.forms["tuthemmonan"]["tenmon"].value.trim();
        var b = document.forms["tuthemmonan"]["gia"].value.trim();
        var c = document.forms["tuthemmonan"]["khuyenmai"].value.trim();
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
                        <h1 class="page-header">Thêm Món Ăn
                            <small style="color: red;">(thêm)</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="{{route('nhahang.tuthemmonan.submit')}}" method="POST" name="tuthemmonan" enctype="multipart/form-data" onsubmit="return validateForm()">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <div class="form-group">
                                <label>Tên Món</label>
                                <input type="text" class="form-control" name="tenmon" placeholder="Nhập tên món ăn" required="" />
                            </div>
                            <div class="form-group">
                                <label>Giá Bán</label>
                                <input type="number" class="form-control" name="gia" placeholder="Giá bán" required="" />
                            </div>
                            <div class="form-group">
                                <label>Khuyến Mại</label>
                                <input type="number" class="form-control" name="khuyenmai" placeholder="khuyến mại" required="" />
                            </div>
                            <div class="form-group">
                                <label>Nội Dung</label>
                                <textarea class="form-control" name="noidung" placeholder="Nội dung" rows="5" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Ảnh Món Ăn<label>
                                <input type="file" name="anh" required />
                            </div>

                            <button type="submit" class="btn btn-success">Lưu</button>
                            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                            <a class="btn btn-warning pull-right" href="admin/user/danhsach">Huỷ bỏ</a>
                        <form>
                    </div>
                    <div class="col-md-5 alert-success">
                    <label>Hướng Dẫn:</label>
                    <pre>

        Nhà hàng tự thêm món ăn của mình:

    B1: Thêm Tên Món (chú ý món ăn không được trùng tên)
    B2: Thêm Giá Bán ( số nguyên không âm)
    B3: Thêm Khuyến mại ( nếu không có thì để 0)
    B4: Thêm Nội Dung(viết về món ăn đó)
    B5: Thêm Ảnh Cho Món Ăn(ảnh là file có đuôi : .jpg,.png,.jpge,.gif)

        Chý ý khi gặp lỗi:
    B1: Nhấn F5 để load lại trang
    B2: Mở tab mới và vào lại trang dành tro nhà hàng





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
