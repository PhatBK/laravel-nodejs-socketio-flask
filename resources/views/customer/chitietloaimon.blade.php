@extends('customer.layouts.master')
@section('content')

<section id="loaimon" class="danhmucchitiet">
    <div class="container">

        <!--Danh sách thể loại -->
        <h3 class="text-success text-center">Danh sách thể loại</h3>
        <div class="row list-group-item">
            @foreach($theloai as $tl)
            <div class="col-sm-3 col-xs-6">
                <input type="checkbox" name="checkbox-theloai" onclick="show_hide(this.id)" value="{{$tl->id}}" id="item-theloai-{{$tl->id}}">
                <label for="item-theloai-{{$tl->id}}">{{$tl->ten}}</label>
            </div>
            @endforeach
        </div>


        <h3 class="text-success text-center" style="margin: 40px;">Danh sách loại món</h3>
        <div class="row list-group-item">
            <form method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                @foreach($loaimon as $lm)
                <div class="col-sm-3 col-xs-6 item-theloai-{{$lm->id_theloai}} loaimon">
                    <input type="checkbox" name="checkbox-loaimon" id="{{$lm->id}}" value="{{$lm->id}}">
                    <label for="{{$lm->id}}">{{$lm->ten}}</label>
                </div>
                @endforeach
            </form>
        </div>

        <h3 class="text-success text-center" style="margin-top:3em;">Danh sách món ăn</h3>
        <div id="danhsachcon">
             @foreach($monan as $m)
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
</section>

<script type="text/javascript">
    $(".loaimon").hide(50);
    $(".gioithieu-theloai").hide(50);
    $(".gioithieu-loaimon").hide(50);
    function show_hide(a){
        var id="#"+a;
        var str="."+ a;
        if($(id).is(":checked")){
            $(str).show(100);
        }else{
            $(str).hide(50);
        }
    };

     $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
       $( "input" ).on( "click", function() {
            var all_check=$('input[name=checkbox-loaimon]:checked').map(function() {
                return $(this).val();
            }).get();
            console.log(all_check);
            var url="{{route('monan_loaimon')}}";
            console.log(url);
            $.ajax({
                type: "POST",
                url: url,
                data: {ids: all_check},
                success: function(response){
                        console.log(response);
                        var list_monan= response;
                        var str="";
                        for (var i =0; i< list_monan.length; i++) {
                            str+=
                            "<a href='chitietmonan/"+list_monan[i].id +"'class='fooditem col-sm-3 col-xs-12 item-lienhoan'>"
                             + "<h5 class='tieude'>"+ list_monan[i].ten_monan+ "</h5>"
                             + "<img src='uploads/monan/"+ list_monan[i].anh_monan +"'>"
                             + '<div class="thongtin"><span><i class="fa fa-clock-o"></i> 60 phút</span>'
                        +'<span><i class="fa fa-bolt"></i>' + list_monan[i].do_kho + '</span>'
                        +'<span><i class="fa fa-bar-chart"></i>' + list_monan[i].so_luot_xem + ' lượt xem</span></div>'
                            + "<p class='mota'>"+ list_monan[i].gioithieu +"</p>"
                            + "<span class='thechia'></span>"
                            + "<span class='social'>"
                            + "<span><i class='fa fa-heart'></i> " + list_monan[i].so_luot_thich + " yêu thích</span>"
                            + "<span><i class='fa fa-comments'></i> 11 bình luận</span></span></a>";
                        }
                        document.getElementById('danhsachcon').innerHTML=str;
                },
                error: function(error){
                    console.log(error);
                }

            });
        });
});


</script>

@endsection