<?php $__env->startSection('content'); ?>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Món Ăn
                    <small>Danh sách</small>
                </h1>
            </div>
            <div class="col-lg-12">
                <?php if(Session::has('themmonanthanhcong')): ?>
                <div class="alert alert-success"><strong><?php echo e(Session::get('themmonanthanhcong')); ?></strong></div>
                <?php elseif(Session::has('suamonanthanhcong')): ?>
                <div class="alert alert-success"><strong><?php echo e(Session::get('suamonanthanhcong')); ?></strong></div>
                <?php elseif(Session::has('xoamonanthanhcong')): ?>
                <div class="alert alert-success"><strong><?php echo e(Session::get('xoamonanthanhcong')); ?></strong></div>
                <?php endif; ?>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example" style="table-layout:fixed;">
                <thead>
                    <tr align="center">
                        <th style="overflow:hidden;" title="ID">ID</th>
                        <th style="overflow:hidden;" title="Tên món ăn">Tên món ăn</th>
                        <th style="overflow:hidden;" title="Ảnh">Ảnh</th>
                        <th style="overflow:hidden;" title="Giới thiệu">Giới thiệu</th>
                        <th style="overflow:hidden;" title="Ngày tạo">Ngày tạo</th>
                        <th style="overflow:hidden;" title="Ngày cập nhật">Ngày cập nhật</th>
                        <th style="overflow:hidden;" title="Xem chi tiết">Xem chi tiết</th>
                        <th style="overflow:hidden;" title="Thêm bước nấu">Các bước nấu</th>
                        <th style="overflow:hidden;" title="Thêm bước nấu">Video</th>
                        <th style="overflow:hidden;" title="Bình Luận">Bình luận</th>
                        <th style="overflow:hidden;" title="Bài Viết Liên Quan">Bài Viết Liên Quan</th>
                        <th style="overflow:hidden;" title="Sửa">Sửa</th>
                        <th style="overflow:hidden;" title="Xóa">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $monan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ma): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="odd gradeX" align="center">
                        <td style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;" title="<?php echo e($ma -> id); ?>"><?php echo e($ma -> id); ?></td>
                        <td style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;" title="<?php echo e($ma -> ten_monan); ?>"><?php echo e($ma -> ten_monan); ?></td>
                        <td style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;" title="<?php echo e($ma -> anh_monan); ?>"><img src="uploads/monan/<?php echo e($ma -> anh_monan); ?>" style="height: 50px; width: 40px;"></td>
                        <td style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;" title="<?php echo e($ma -> gioithieu); ?>"><?php echo e($ma -> gioithieu); ?></td>
                        <td style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;" title="<?php echo e($ma -> created_at); ?>"><?php echo e($ma -> created_at); ?></td>
                        <td style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;" title="<?php echo e($ma -> updated_at); ?>"><?php echo e($ma -> updated_at); ?></td>
                        <td class="center"><i class="fa"></i><a href="<?php echo e(route('chiTietMonAn', $ma -> id)); ?>"> Xem chi tiết</a></td>
                        <td class="center"><a href="<?php echo e(route('themBuocNau', $ma -> id)); ?>">Các bước nấu</a></td>
                        <td class="center"><a href="<?php echo e(route('themVideo', $ma -> id)); ?>">Video</a></td>
                        <td class="center"><a href="<?php echo e(route('binhLuan', $ma -> id)); ?>">Bình Luận</a></td>
                        <td class="center"><a href="<?php echo e(route('baiVietLienQuan', $ma -> id)); ?>">Bài viết liên quan</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="<?php echo e(route('suaMonAn', $ma -> id)); ?>">Sửa</a></td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="<?php echo e(route('xoaMonAn', $ma -> id)); ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"> Xóa</a></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* E:\Xampp.7.3\htdocs\bkcook.vn\resources\views/admin/monan/danhsach.blade.php */ ?>