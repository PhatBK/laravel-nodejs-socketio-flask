<?php echo $__env->make("customer.layouts.home", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startSection('content'); ?>
    <section id="monan" class="monan gioithieu">
            <div class="container">
                <h3 class="text-center"><a class="text-success" href="monan">Món ăn</a></h3>
                <div class="row">
                    <?php $__currentLoopData = $monan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('chitietmonan',$m->id)); ?>" class="fooditem col-sm-3 col-xs-12">
                        <h5 class="tieude"><?php echo e($m->ten_monan); ?></h5>
                        <img src="uploads/monan/<?php echo e($m->anh_monan); ?>" >
                        <div class="thongtin">
                            <span><i class="fa fa-clock-o"></i> <?php echo e($m->thoigian); ?> phút</span>
                            <span><i class="fa fa-bolt"></i> <?php echo e($m->do_kho); ?></span>
                            <span><i class="fa fa-bar-chart"></i> <?php echo e($m->so_luot_xem); ?> Lượt xem</span>
                        </div>
                        <p class="mota"><?php echo e($m->gioithieu); ?></p>
                        <span class="thechia"></span>
                        <span class="social">
                            <span><i class="fa fa-heart"></i> <?php echo e($m->so_luot_thich); ?></span>
                            <span><i class="fa fa-comments"></i> <?php echo e(count($m->comment)); ?> Bình luận</span>
                        </span>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
    </section>

    <section id="nhahang-thanhvien" class="nhahang-thanhvien gioithieu">
            <div class="container">
                <div class="row">
                    <div id="nhahang" class="col-sm-9 nhahang">
                        <?php $__currentLoopData = $nhahang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nh): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <h3 class="text-center"><a class="text-success"><?php echo e($nh->ten); ?></a></h3>
                            <div class="row">
                                <?php $__currentLoopData = $nh->nhahangmonan->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="<?php echo e(route('chitietmonannhahang',$mon->id)); ?>" class="fooditem col-sm-3 col-xs-12">
                                        <h5 class="tieude"><?php echo e($mon->tenmon); ?></h5>
                                        <img src="<?php echo e($mon->image); ?>" alt="">

                                        <div class="thongtin">
                                            <span><i class="fa fa-clock-o"></i>Ship:<?php echo e($mon->ship); ?></span>
                                            <span><i class="fa fa-bolt"></i> <?php echo e($mon->khauphan); ?>(ngươi)</span>
                                            <span><i class="fa fa-bar-chart"></i> <?php echo e($mon->luotxem); ?>(lượt xem)</span>
                                        </div>
                                        <p class="mota"><?php echo e($mon->noidung); ?></p>
                                        <span class='thechia'></span>
                                        <span class="social">
                                            <span><i class="fa fa-heart"></i> Giá:<?php echo e($mon->gia); ?>(vnđ)</span>
                                            <span><i class="fa fa-comments"></i> Sale:<?php echo e($mon->khuyenmai); ?>(vnđ)</span>
                                        </span>
                                    </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <br>
                            <br>
                            <br>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <h3 class="text-center"><a class="text-success" href="chitietnhahang">Top thành viên</a></h3>
                    <div id="thanhvien" class="col-sm-3 thanhvien">
                        <div class="row">
                            <?php $__currentLoopData = $topthanhvien; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $thanhvien): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-sm-12">
                                    <div id="tacgia">
                                        <img id="anhtacgia" src="<?php echo e($thanhvien->anhdaidien); ?>" height="70px" width="70px" alt="Tên thành viên" class="img-circle">
                                        <div id='thongtintacgia'>
                                            <p id='tentacgia'><a href="#"><?php echo e($thanhvien->hovaten); ?></a></p>
                                            <p>
                                                <b>Nổi bật: </b><span class="text-info"><?php echo e($thanhvien->noibat); ?></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('customer.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* E:\Xampp.7.3\htdocs\bkcook.vn\resources\views/customer/trangchu.blade.php */ ?>