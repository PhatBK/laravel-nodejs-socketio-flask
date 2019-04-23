@extends('customer.layouts.master')
@section('content')

<section id="monan" class="monan">
<div class="container" style="margin-top: 1.5em;">
    <h3 class="text-success text-center">Tất Cả Các Món Ăn</h3>
    <div class="row">
        <div style="text-align: center; ">
            {{$monans->links()}}
        </div>
        <div class="container">
            <div class="content">
                    @foreach ($monans as $m)
                        <a href="chitietmonan/{{$m->id}}" class="fooditem col-sm-3 col-xs-12">
                            <h5 class='tieude'>{{$m->ten_monan}}</h5>
                            <img src="uploads/monan/{{$m->anh_monan}}">
                            <div class="thongtin">
                                <span><i class="fa fa-clock-o"></i> {{$m->thoigian}} phút</span>
                                <span><i class="fa fa-bolt"></i> {{$m->do_kho}}</span>
                                <span><i class="fa fa-bar-chart"></i> {{$m->so_luot_xem}} Lượt xem</span>
                            </div>
                            <p class='mota'>{{$m->gioithieu}}</p>
                            <span class='thechia'></span>
                            <span class="social">
                                <span><i class="fa fa-heart"></i> {{$m->so_luot_thich}} Yêu thích</span>
                                <span><i class="fa fa-comments"></i> {{count($m->comment)}} Bình luận</span>
                            </span>
                        </a>
                    @endforeach
            </div>
        </div>
        <div style="text-align: center;">
            {{$monans->links()}}
        </div>
    </div>
</div>
<script>
        /*==================== phân trang với Ajax=========================*/
        $(window).on('hashchange',function(){
            page = window.location.hash.replace('#','');
            getProducts(page);
        });
        $(document).on('click','.pagination a', function(e){
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            location.hash = page;
            //getProducts(page);
        });
        function getProducts(page){
            $.ajax({
                url: 'monan/ajax?page=' + page
            }).done(function(data){
                $('.content').html(data);
                console.log('Load trang bang ajax thành công...');
            }).fail(function () {
                console.log("lỗi phiên trở lại ..ahihi");
            });
        }
    </script>
</section>
@endsection