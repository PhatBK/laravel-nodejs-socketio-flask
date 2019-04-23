<?php $__env->startSection('content'); ?>

<section id="monan" class="monan">
<div class="container" style="margin-top: 1.5em;">
    <h3 class="text-success text-center">Tất Cả Các Món Ăn</h3>
    <div class="row">
        <div style="text-align: center; ">
            <?php echo e($monans->links()); ?>

        </div>
        <div class="container">
            <div class="content">
                    <?php $__currentLoopData = $monans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
        <div style="text-align: center;">
            <?php echo e($monans->links()); ?>

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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('customer.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* E:\Xampp.7.3\htdocs\bkcook.vn\resources\views/customer/monan.blade.php */ ?>