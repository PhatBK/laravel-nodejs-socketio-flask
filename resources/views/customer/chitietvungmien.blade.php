@extends('customer.layouts.master')
@section('content')

<section id="vungmien" class="vungmien danhmucchitiet">
    <div class="container">
        <h3 class="text-success text-center">Danh sách vùng miền</h3>
        <div class="row list-group-item">
            <form method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                @foreach($vungmien as $vm)
                <div class="col-sm-3 col-xs-6 check">
                    <input type="checkbox" name="checkbox" value="{{$vm->id}}" id="{{$vm->id}}">
                    <label for="{{$vm->id}}">{{$vm->ten}}</label>
                </div>
                @endforeach
            </form>
        </div>


        <h3 class="text-success text-center" style="margin-top:3em;">Danh sách món ăn</h3>

        <div id="danhsachcon">
            @foreach($monan as $m)
            <a href="chitietmonan/{{$m->id}}" class=" fooditem col-sm-3 col-xs-12">
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
                        <span><i class="fa fa-comments"></i> {{$m->so_luot_thich}} Bình luận</span>
                    </span>
            </a>
            @endforeach
        </div>
    </div>
</section>

<script type="text/javascript">

 $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
       $( "input" ).on( "click", function() {
            var all_check=$('input[name=checkbox]:checked').map(function() {
                return $(this).val();
            }).get();
            console.log(all_check);
            var url="{{route('monan_vungmien')}}";
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
                             + '<div class="thongtin"><span><i class="fa fa-clock-o"></i>'+ list_monan[i].thoigian +'phút</span>'
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