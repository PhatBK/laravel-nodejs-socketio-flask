@extends('admin.layouts.index')
@section('content')

<script>
    function validateForm() {
        var a = document.forms["themMonAn"]["tenMonAn"].value.trim();
        var b = document.forms["themMonAn"]["gioiThieu"].value.trim();
        var c = document.forms["themMonAn"]["nLChinh"].value.trim();
        var d = document.forms["themMonAn"]["nLPhu"].value.trim();
        var e = document.forms["themMonAn"]["giaVi"].value.trim();
        var f = document.forms["themMonAn"]["doKho"].value.trim();
        var g = document.forms["themMonAn"]["soBuoc"].value.trim();
        var h = document.forms["themMonAn"]["thoiGian"].value.trim();

        if (a == "") {
            alert("Bạn chưa nhập tên món ăn");
            return false;
        } else if (b == "") {
            alert("Bạn chưa nhập giới thiệu");
            return false;
        } else if (c == "") {
            alert("Bạn chưa nhập nguyên liệu chính");
            return false;
        } else if (d == "") {
            alert("Bạn chưa nhập nguyên liệu phụ");
            return false;
        } else if (e == "") {
            alert("Bạn chưa nhập gia vị");
            return false;
        } else if (f == "") {
            alert("Bạn chưa nhập độ khó");
            return false;
        } else if (g == "") {
            alert("Bạn chưa nhập số bước");
            return false;
        } else if (h == "") {
            alert("Bạn chưa nhập thời gian thực hiện");
            return false;
        } else if (isNaN(g)) {
            alert("Số bước phải là chữ số");
            return false;
        } else if(g <= 0) {
            alert("Số bước phải là sô dương");
            return false;
        } else {
            return true;
        }
    }

    function checkImage(target) {
        if(target.files[0].type.indexOf("image") == -1) {
            alert("File bạn chọn không phải file ảnh");
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
                <h1 class="page-header">Món Ăn
                    <small>Thêm</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            @if(count($errors) > 0)
            <div class="col-lg-12">
                <div class="alert alert-danger">
                    @foreach($errors -> all() as $err)
                    {{$err}}<br>
                    @endforeach
                </div>
            </div>
            @endif
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="{{route('themMonAn')}}" method="POST" name="themMonAn" onsubmit="return validateForm()" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Tên món ăn</label>
                        <input class="form-control" name="tenMonAn" placeholder="Nhập tên món ăn" required="" />
                    </div>
                    <div class="form-group">
                        <label>Giới thiệu</label>
                        <textarea class="form-control" style="height: 100px;" name="gioiThieu" placeholder="Nhập giới thiệu" required=""></textarea>
                    </div>
                    <div class="form-group">
                        <label>Nguyên liệu chính</label>
                        <textarea class="form-control" style="height: 100px;" name="nLChinh" placeholder="Nhập nguyên liệu chính" required=""></textarea>
                    </div>
                    <div class="form-group">
                        <label>Nguyên liệu phụ</label>
                        <textarea class="form-control" style="height: 100px;" name="nLPhu" placeholder="Nhập nguyên liệu phụ" required=""></textarea>
                    </div>
                    <div class="form-group">
                        <label>Gia vị</label>
                        <textarea class="form-control" style="height: 100px;" name="giaVi" placeholder="Nhập gia vị" required=""></textarea>
                    </div>
                    <div class="form-group">
                        <label>Thời gian thực hiện</label>
                        <input type="number" class="form-control" name="thoiGian" placeholder="Nhập thời gian thực hiện" required=""/>
                    </div>
                    <div class="form-group">
                        <label>Độ khó</label>
                        <input class="form-control" name="doKho" placeholder="Nhập độ khó" required=""/>
                    </div>
                    <div class="form-group">
                        <label>Số bước thực hiện</label>
                        <input type="number" step="1" class="form-control" name="soBuoc" placeholder="Nhập số bước thực hiện (chữ số)" required="" />
                    </div>
                    <div class="form-group">
                        <label>Tên mục đích</label>
                        <select class="form-control" name="mucDich">
                            @foreach($mucdich as $md)
                            <option value="{{$md -> id}}">{{$md -> ten}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tên loại món</label>
                        <select class="form-control" name="loaiMon">
                            @foreach($loaimon as $lm)
                            <option value="{{$lm -> id}}">{{$lm -> ten}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tên công dụng</label>
                        <select class="form-control" name="congDung">
                            @foreach($congdung as $cd)
                            <option value="{{$cd -> id}}">{{$cd -> ten}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tên vùng miền</label>
                        <select class="form-control" name="vungMien">
                            @foreach($vungmien as $vm)
                            <option value="{{$vm -> id}}">{{$vm -> ten}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Chọn ảnh</label>
                        <input type="file" name="image" multiple="multiple" onchange="checkImage(this)">
                    </div>
                    <div class="col-md-3"><button type="submit" class="btn btn-default">Thêm</button></div>
                    <div class="col-md-3"><a href="{{route('danhSachMonAn')}}" class="btn btn-default">Cancel</a></div>
                    </form>
                    </div>
                    <div class="col-md-5">
                        <label>Hướng dẫn thêm dữ liệu</label>
                        <div class="form-control" style="height: 300px; width: 400px;">
                            <li>Tên món ăn: Bao gồm các ký tự [a-z], [A-Z], các chữ số, không được để trống</li>
                            <li>Giới thiệu: Bao gồm các ký tự [a-z], [A-Z], các chữ số, không được để trống</li>
                            <li>Nguyên liệu chính: Bao gồm các ký tự [a-z], [A-Z], các chữ số, không được để trống</li>
                            <li>Nguyên liệu phụ: Bao gồm các ký tự [a-z], [A-Z], các chữ số, không được để trống</li>
                            <li>Gia vị: Bao gồm các ký tự [a-z], [A-Z], các chữ số, không được để trống</li>
                            <li>Độ khó: Bao gồm các ký tự [a-z], [A-Z], không được để trống</li>
                            <li>Số bước thực hiện: Nhập chữ số</li>
                            <li>Chọn ảnh: Chỉ được chọn file ảnh</li>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>

            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
        @endsection