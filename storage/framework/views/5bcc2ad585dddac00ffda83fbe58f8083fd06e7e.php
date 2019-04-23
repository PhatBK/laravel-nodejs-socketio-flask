<?php $__env->startSection('content'); ?>

<script>
function validateForm() {
var a = document.forms["suaMonAn"]["tenMonAn"].value.trim();
var b = document.forms["suaMonAn"]["gioiThieu"].value.trim();
var c = document.forms["suaMonAn"]["nLChinh"].value.trim();
var d = document.forms["suaMonAn"]["nLPhu"].value.trim();
var e = document.forms["suaMonAn"]["giaVi"].value.trim();
var f = document.forms["suaMonAn"]["doKho"].value.trim();
var g = document.forms["suaMonAn"]["soBuoc"].value.trim();
var h = document.forms["suaMonAn"]["tenAnh"].value.trim();
var i = document.forms["suaMonAn"]["thoiGian"].value.trim();

if (a == "") {
    alert("Bạn chưa nhập tên món ăn");
    return false;
} else if (b == "") {
    alert("Bạn chưa nhập giới thiệu");
    return false;
} else if (c == "") {
    alert("Bạn chưa nhập nguyên liệu chính");
    return false;
} else if (d == "") {
    alert("Bạn chưa nhập nguyên liệu phụ");
    return false;
} else if (e == "") {
    alert("Bạn chưa nhập gia vị");
    return false;
} else if (f == "") {
    alert("Bạn chưa nhập độ khó");
    return false;
} else if (g == "") {
    alert("Bạn chưa nhập tên ảnh");
    return false;
} else if (h == "") {
    alert("Bạn chưa nhập số bước");
    return false;
} else if (i == "") {
    alert("Bạn chưa nhập thời gian thực hiện");
    return false;
} else if (isNaN(g)) {
    alert("Số bước phải là chữ số");
    return false;
} else if(g <= 0) {
    alert("Số bước phải là sô dương");
    return false;
} else {
    return true;
}
}

function checkImage(target) {
if(target.files[0].type.indexOf("image") == -1) {
    alert("File bạn chọn không phải file ảnh");
    return false;
} else {
    return true;
}
}
</script>

<!-- Page Content -->
<div id="page-wrapper">
<div class="container-fluid">
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Món Ăn
            <small>Sửa</small>
        </h1>
    </div>
    <!-- /.col-lg-12 -->
    <div class="col-lg-7" style="padding-bottom:120px">
        <form action="<?php echo e(route('suaMonAn', $monan -> id)); ?>" method="POST" name="suaMonAn" onsubmit="return validateForm()" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <div class="form-group">
                <label>Tên món ăn</label>
                <input class="form-control" name="tenMonAn" value="<?php echo e($monan ->ten_monan); ?>" required="" />
            </div>
            <div class="form-group">
                <label>Giới thiệu</label>
                <textarea class="form-control" style="height: 100px;" name="gioiThieu" required=""><?php echo e($monan ->gioithieu); ?></textarea>
            </div>
            <div class="form-group">
                <label>Nguyên liệu chính</label>
                <textarea class="form-control" style="height: 100px;" name="nLChinh" required=""><?php echo e($monan ->nguyen_lieu_chinh); ?></textarea>
            </div>
            <div class="form-group">
                <label>Nguyên liệu phụ</label>
                <textarea class="form-control" style="height: 100px;" name="nLPhu" required=""><?php echo e($monan ->nguyen_lieu_phu); ?></textarea>
            </div>
            <div class="form-group">
                <label>Gia vị</label>
                <textarea class="form-control" style="height: 100px;" name="giaVi" required=""><?php echo e($monan ->giavi); ?></textarea>
            </div>
            <div class="form-group">
                <label>Thời gian thực hiện</label>
                <input type="number" class="form-control" name="thoiGian" value="<?php echo e($monan ->thoigian); ?>" required=""/>
            </div>
            <div class="form-group">
                <label>Độ khó</label>
                <input class="form-control" name="doKho" value="<?php echo e($monan ->do_kho); ?>" required=""/>
            </div>
            <div class="form-group">
                <label>Số bước thực hiện</label>
                <input class="form-control" name="soBuoc" value="<?php echo e($monan ->so_buoc); ?>" required="" />
            </div>
            <div class="form-group">
                <label>Tên mục đích</label>
                <select class="form-control" name="mucDich">
                    <?php $__currentLoopData = $mucdich; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $md): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($md->id); ?>"
                        <?php if($md->id == $monan ->id_mucdich): ?>
                            selected
                        <?php endif; ?>
                        ><?php echo e($md->ten); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="form-group">
                <label>Tên loại món</label>
                <select class="form-control" name="loaiMon">
                    <?php $__currentLoopData = $loaimon; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($lm -> id); ?>"
                    <?php if($lm -> id == $monan ->id_loaimon): ?>
                        selected
                    <?php endif; ?>
                    ><?php echo e($lm -> ten); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="form-group">
                <label>Tên công dụng</label>
                <select class="form-control" name="congDung">
                    <?php $__currentLoopData = $congdung; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($cd -> id); ?>"
                    <?php if($cd -> id == $monan -> id_congdung): ?>
                        selected
                    <?php endif; ?>
                    ><?php echo e($cd -> ten); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="form-group">
                <label>Tên vùng miền</label>
                <select class="form-control" name="vungMien">
                    <?php $__currentLoopData = $vungmien; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($vm -> id); ?>"
                        <?php if($vm -> id == $monan -> id_vungmien): ?>
                        selected
                        <?php endif; ?>
                    >
                        <?php echo e($vm -> ten); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="form-group">
                <label>Chọn ảnh</label>
                <?php if($monan -> anh_monan != null): ?>
                <div class="form-group">
                    <img src="uploads/monan/<?php echo e($monan -> anh_monan); ?>" alt="Kết nối Internet không ổn định" style="width: 580px;height: 350px">
                </div>
                
                <input type="file" name="image" multiple="multiple" onchange="checkImage(this)">
                <?php else: ?>
                <h4 class="form-control">Không có ảnh nào!</h4><br>
                <?php endif; ?>
            </div>
            <div class="col-md-3"><button type="submit" class="btn btn-default">Sửa</button></div>
            <div class="col-md-3"><a href="<?php echo e(route('danhSachMonAn')); ?>" class="btn btn-default">Cancel</a></div>
            <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* E:\Xampp.7.3\htdocs\bkcook.vn\resources\views/admin/monan/sua.blade.php */ ?>