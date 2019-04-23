<?php $__env->startSection('content'); ?>

<section id="vungmien" class="vungmien danhmucchitiet">
    <div class="container">
        <h3 class="text-success text-center" style="margin-top: 0em;">Danh sách món ăn</h3>
        <div id="danhsachcon">
            <?php $__currentLoopData = $monan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="chitietmonannhahang/<?php echo e($m->id); ?>" class=" fooditem col-sm-3 col-xs-12">
                <h5 class='tieude'><?php echo e($m->tenmon); ?></h5>
                <img src="<?php echo e($m->image); ?>">
                <div class="thongtin">
                    
                    <span><i class="fa fa-bar-chart"></i> <?php echo e($m->luotxem); ?> Lượt xem</span>
                </div>
                <p class='mota'><?php echo e($m->noidung); ?></p>
                <span class='thechia'></span>
                <span class='social'>
                <span><i class='fa fa-cutlery'></i>Giá: <?php echo e($m->gia); ?>(vnđ)</span>
                <span><i class='fa fa-comments'></i>Sale: <?php echo e($m->khuyenmai); ?>(vnđ)</span></span>
            </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <h3 class="text-success text-center" style="margin-top: 1em;">Danh sách Nhà Hàng</h3>
        <div class="row list-group-item">
            <form method="post">
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                <?php $__currentLoopData = $nhahang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nh): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-sm-3 col-xs-6 check">
                    <input type="checkbox" name="checkbox" value="<?php echo e($nh->id); ?>" id="<?php echo e($nh->id); ?>">
                    <label for="<?php echo e($nh->id); ?>"><?php echo e($nh->ten); ?></label>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
            var url="<?php echo e(route('monan_nhahang')); ?>";
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('customer.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* E:\Xampp.7.3\htdocs\bkcook.vn\resources\views/customer/chitietnhahang.blade.php */ ?>