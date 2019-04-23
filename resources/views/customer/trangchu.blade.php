@extends('customer.layouts.master')
@include("customer.layouts.home")
@section('content')
    <section id="monan" class="monan gioithieu">
            <div class="container">
                <h3 class="text-center"><a class="text-success" href="monan">Món ăn</a></h3>
                <div class="row">
                    @foreach($monan as $m)
                    <a href="{{route('chitietmonan',$m->id)}}" class="fooditem col-sm-3 col-xs-12">
                        <h5 class="tieude">{{$m->ten_monan}}</h5>
                        <img src="uploads/monan/{{$m->anh_monan}}" >
                        <div class="thongtin">
                            <span><i class="fa fa-clock-o"></i> {{$m->thoigian}} phút</span>
                            <span><i class="fa fa-bolt"></i> {{$m->do_kho}}</span>
                            <span><i class="fa fa-bar-chart"></i> {{$m->so_luot_xem}} Lượt xem</span>
                        </div>
                        <p class="mota">{{$m->gioithieu}}</p>
                        <span class="thechia"></span>
                        <span class="social">
                            <span><i class="fa fa-heart"></i> {{$m->so_luot_thich}}</span>
                            <span><i class="fa fa-comments"></i> {{count($m->comment)}} Bình luận</span>
                        </span>
                    </a>
                @endforeach
                </div>
            </div>
    </section>

    <section id="nhahang-thanhvien" class="nhahang-thanhvien gioithieu">
            <div class="container">
                <div class="row">
                    <div id="nhahang" class="col-sm-9 nhahang">
                        @foreach($nhahang as $nh)
                            <h3 class="text-center"><a class="text-success">{{$nh->ten}}</a></h3>
                            <div class="row">
                                @foreach($nh->nhahangmonan->take(3) as $mon)
                                    <a href="{{route('chitietmonannhahang',$mon->id)}}" class="fooditem col-sm-3 col-xs-12">
                                        <h5 class="tieude">{{$mon->tenmon}}</h5>
                                        <img src="{{$mon->image}}" alt="">

                                        <div class="thongtin">
                                            <span><i class="fa fa-clock-o"></i>Ship:{{ $mon->ship }}</span>
                                            <span><i class="fa fa-bolt"></i> {{$mon->khauphan}}(ngươi)</span>
                                            <span><i class="fa fa-bar-chart"></i> {{$mon->luotxem}}(lượt xem)</span>
                                        </div>
                                        <p class="mota">{{$mon->noidung}}</p>
                                        <span class='thechia'></span>
                                        <span class="social">
                                            <span><i class="fa fa-heart"></i> Giá:{{$mon->gia}}(vnđ)</span>
                                            <span><i class="fa fa-comments"></i> Sale:{{$mon->khuyenmai}}(vnđ)</span>
                                        </span>
                                    </a>
                                @endforeach
                            </div>
                            <br>
                            <br>
                            <br>
                        @endforeach
                    </div>
                    <h3 class="text-center"><a class="text-success" href="chitietnhahang">Top thành viên</a></h3>
                    <div id="thanhvien" class="col-sm-3 thanhvien">
                        <div class="row">
                            @foreach($topthanhvien as $thanhvien)
                                <div class="col-sm-12">
                                    <div id="tacgia">
                                        <img id="anhtacgia" src="{{$thanhvien->anhdaidien}}" height="70px" width="70px" alt="Tên thành viên" class="img-circle">
                                        <div id='thongtintacgia'>
                                            <p id='tentacgia'><a href="#">{{$thanhvien->hovaten}}</a></p>
                                            <p>
                                                <b>Nổi bật: </b><span class="text-info">{{$thanhvien->noibat}}</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    
@endsection