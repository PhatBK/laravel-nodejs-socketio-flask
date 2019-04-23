<?php $__env->startSection('content'); ?>

<section id="loaimon" class="danhmucchitiet">
    <div class="container">

        <!--Danh sách thể loại -->
        <h3 class="text-success text-center">Danh sách thể loại</h3>
        <div class="row list-group-item">
            <?php $__currentLoopData = $theloai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-sm-3 col-xs-6">
                <input type="checkbox" name="checkbox-theloai" onclick="show_hide(this.id)" value="<?php echo e($tl->id); ?>" id="item-theloai-<?php echo e($tl->id); ?>">
                <label for="item-theloai-<?php echo e($tl->id); ?>"><?php echo e($tl->ten); ?></label>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>


        <h3 class="text-success text-center" style="margin: 40px;">Danh sách loại món</h3>
        <div class="row list-group-item">
            <form method="post">
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                <?php $__currentLoopData = $loaimon; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-sm-3 col-xs-6 item-theloai-<?php echo e($lm->id_theloai); ?> loaimon">
                    <input type="checkbox" name="checkbox-loaimon" id="<?php echo e($lm->id); ?>" value="<?php echo e($lm->id); ?>">
                    <label for="<?php echo e($lm->id); ?>"><?php echo e($lm->ten); ?></label>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </form>
        </div>

        <h3 class="text-success text-center" style="margin-top:3em;">Danh sách món ăn</h3>
        <div id="danhsachcon">
             <?php $__currentLoopData = $monan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="chitietmonan/<?php echo e($m->id); ?>" class="fooditem col-sm-3 col-xs-12">
                    <h5 class='tieude'><?php echo e($m->ten_monan); ?></h5>
                    <img src="uploads/monan/<?php echo e($m->anh_monan); ?>">
                    <div class="thongtin">
                        <span><i class="fa fa-clock-o"></i> <?php echo e($m->thoigian); ?> phút</span>
                        <span><i class="fa fa-bolt"></i> <?php echo e($m->do_kho); ?></span>
                        <span><i class="fa fa-bar-chart"></i> <?php echo e($m->so_luot_xem); ?> Lượt xem</span>
                    </div>
                    <p class='mota'><?php echo e($m->gioithieu); ?></p>
                    <span class='thechia'></span>
                    <span class="social">
                        <span><i class="fa fa-heart"></i> <?php echo e($m->so_luot_thich); ?> Yêu thích</span>
                        <span><i class="fa fa-comments"></i> <?php echo e(count($m->comment)); ?> Bình luận</span>
                    </span>
            </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
            var url="<?php echo e(route('monan_loaimon')); ?>";
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('customer.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* E:\Xampp.7.3\htdocs\bkcook.vn\resources\views/customer/chitietloaimon.blade.php */ ?>