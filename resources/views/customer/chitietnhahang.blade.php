@extends('customer.layouts.master')
@section('content')

<section id="vungmien" class="vungmien danhmucchitiet">
    <div class="container">
        <h3 class="text-success text-center" style="margin-top: 0em;">Danh sách món ăn</h3>
        <div id="danhsachcon">
            @foreach($monan as $m)
            <a href="chitietmonannhahang/{{$m->id}}" class=" fooditem col-sm-3 col-xs-12">
                <h5 class='tieude'>{{$m->tenmon}}</h5>
                <img src="{{$m->image}}">
                <div class="thongtin">
                    {{-- <span><i class="fa fa-clock-o"></i> {{$m->thoigian}} phút</span>
                    <span><i class="fa fa-bolt"></i> {{$m->do_kho}}</span> --}}
                    <span><i class="fa fa-bar-chart"></i> {{$m->luotxem}} Lượt xem</span>
                </div>
                <p class='mota'>{{$m->noidung}}</p>
                <span class='thechia'></span>
                <span class='social'>
                <span><i class='fa fa-cutlery'></i>Giá: {{$m->gia}}(vnđ)</span>
                <span><i class='fa fa-comments'></i>Sale: {{$m->khuyenmai}}(vnđ)</span></span>
            </a>
            @endforeach
        </div>
        <h3 class="text-success text-center" style="margin-top: 1em;">Danh sách Nhà Hàng</h3>
        <div class="row list-group-item">
            <form method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                @foreach($nhahang as $nh)
                <div class="col-sm-3 col-xs-6 check">
                    <input type="checkbox" name="checkbox" value="{{$nh->id}}" id="{{$nh->id}}">
                    <label for="{{$nh->id}}">{{$nh->ten}}</label>
                </div>
                @endforeach
            </form>
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
            var url="{{route('monan_nhahang')}}";
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
                            "<a href='chitietmonannhahang/"+list_monan[i].id +"'class='fooditem col-sm-3 col-xs-12 item-lienhoan'>"
                            + "<h5 class='tieude'>"+ list_monan[i].tenmon+ "</h5>"
                            + "<img src='"+ list_monan[i].image +"'>"
                            + '<div class="thongtin">'
                            +'<span><i class="fa fa-bar-chart"></i>' +list_monan[i].luotxem+ ' lượt xem</span></div>'
                            + "<p class='mota'>"+ list_monan[i].noidung +"</p>"
                            + "<span class='thechia'></span>"
                            + "<span class='social'>"
                            + "<span><i class='fa fa-heart'>Giá:</i> " + list_monan[i].gia + "(vnđ)</span>"
                            + "<span><i class='fa fa-comments'></i>Sale:</span>"+ list_monan[i].gia +"(vnđ)</span></a>";
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