@extends('admin.layouts.index')
@section('content')

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Món Ăn
                    <small>Xem chi tiết</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="" method="" name="suaMonAn" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Tên món ăn</label>
                        <div class="form-control" name="tenMonAn">{{$monan -> ten_monan}}</div>
                    </div>
                    <div class="form-group">
                        <label>Giới thiệu</label>
                        <div class="form-control" style="height: 100px;" name="gioiThieu">{{$monan -> gioithieu}}</div>
                    </div>
                    <div class="form-group">
                        <label>Nguyên liệu chính</label>
                        <div class="form-control" style="height: 100px;" name="nLChinh">{{$monan -> nguyen_lieu_chinh}}</div>
                    </div>
                    <div class="form-group">
                        <label>Nguyên liệu phụ</label>
                        <div class="form-control" style="height: 100px;" name="nLPhu">{{$monan -> nguyen_lieu_phu}}</div>
                    </div>
                    <div class="form-group">
                        <label>Gia vị</label>
                        <div class="form-control" style="height: 100px;" name="giaVi">{{$monan -> giavi}}</div>
                    </div>
                    <div class="form-group">
                        <label>Thời gian thực hiện</label>
                        <div class="form-control" name="thoiGian">{{$monan -> thoigian}}</div>
                    </div>
                    <div class="form-group">
                        <label>Độ khó</label>
                        <div class="form-control" name="doKho">{{$monan -> do_kho}}</div>
                    </div>
                    <div class="form-group">
                        <label>Số bước thực hiện</label>
                        <div class="form-control" name="soBuoc">{{$monan -> so_buoc}}</div>
                    </div>
                    <div class="form-group">
                        <label>Tên mục đích</label>
                        <div class="form-control" name="mucDich"> 
                            @if($mucdich -> id == $monan -> id_mucdich)
                                {{$mucdich -> ten}}
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Tên loại món</label>
                        <div class="form-control" name="loaiMon">
                            @if($loaimon -> id == $monan -> id_loaimon)
                                {{$loaimon -> ten}}
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Tên công dụng</label>
                        <div class="form-control" name="congDung">
                            @if($congdung -> id == $monan -> id_congdung)
                                {{$congdung -> ten}}
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Tên vùng miền</label>
                        <div class="form-control" name="vungMien">
                            @if($vungmien -> id == $monan -> id_vungmien)
                                {{$vungmien -> ten}}
                            @endif             
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Ảnh món ăn</label>
                        @if($monan -> anh_monan != null)
                        <div class="form-control" name="tenAnh">{{$monan -> anh_monan}}</div><br>
                        <img src="uploads/monan/{{$monan -> anh_monan}}" style="height: 200px; width: 200px;">
                        @else
                        <h4 class="form-control">Không có ảnh nào!</h4><br>
                        @endif
                    </div><br>
                    <a href="{{route('danhSachMonAn')}}" class="btn btn-default">Cancel</a>
                    <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
        @endsection