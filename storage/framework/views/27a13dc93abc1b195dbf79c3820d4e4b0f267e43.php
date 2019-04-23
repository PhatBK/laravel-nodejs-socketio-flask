<?php $__env->startSection('content'); ?>

<section id="vungmien" class="vungmien danhmucchitiet">
    <div class="container">
        <h3 class="text-success text-center">Danh sách vùng miền</h3>
        <div class="row list-group-item">
            <form method="post">
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                <?php $__currentLoopData = $vungmien; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-sm-3 col-xs-6 check">
                    <input type="checkbox" name="checkbox" value="<?php echo e($vm->id); ?>" id="<?php echo e($vm->id); ?>">
                    <label for="<?php echo e($vm->id); ?>"><?php echo e($vm->ten); ?></label>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </form>
        </div>


        <h3 class="text-success text-center" style="margin-top:3em;">Danh sách món ăn</h3>

        <div id="danhsachcon">
            <?php $__currentLoopData = $monan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="chitietmonan/<?php echo e($m->id); ?>" class=" fooditem col-sm-3 col-xs-12">
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
                        <span><i class="fa fa-comments"></i> <?php echo e($m->so_luot_thich); ?> Bình luận</span>
                    </span>
            </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
            var url="<?php echo e(route('monan_vungmien')); ?>";
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('customer.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* E:\Xampp.7.3\htdocs\bkcook.vn\resources\views/customer/chitietvungmien.blade.php */ ?>