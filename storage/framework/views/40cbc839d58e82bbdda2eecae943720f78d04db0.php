<?php $__env->startSection('content'); ?>

<style>
    .tqnhahang{
        overflow: hidden;
        margin-bottom: 20px;
        margin-left: 14px;
        background-color: white;
        padding: 20px 0 20px 0;
        box-shadow: 0 2px 4px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12)!important;
        width: 68%;
        height: 30%;
    }
    .cungnhahang {
        overflow: hidden;
        background-color: white;
        padding: 20px 10px 10px 20px;
        box-shadow: 0 2px 4px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12)!important;
        width: 26%;
        height: 26.9em;
        margin-left: 40px;
    }
    .ndnhahang {
        overflow: hidden;
        margin-bottom: 20px;
        margin-left: 0px;
        background-color: white;
        padding: 20px 30px 20px 30px;
        box-shadow: 0 2px 4px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12)!important;
        width: 69.8%;
        font-family: 'segoe ui light';
    }

</style>
<section id="chitietmonan" class="chitietmonan" style="margin-top: 3em;">
    <div class="container-fluid">
        <div class="row">
            <div class='tqnhahang col-md-9'>
                        <div id="anh" class="col-md-6">
                            <img src="<?php echo e($monan->image); ?>" class="img-responsive img-rounded" alt="Kết nói Internet không ổn định..">
                            <br>
                            <b>Ngày Đăng:&nbsp;</b><i style="color:blue;"><?php echo e($monan->created_at); ?></i>&nbsp;
                            <b>Lượt Xem:&nbsp;</b><i style="color:green;"><?php echo e($monan->luotxem); ?></i>
                            <br>
                            <a style="background-color: #90b3ed;" class="user-post-button-share btn" href="https://www.facebook.com/sharer/sharer.php?u=http://bkcook.ddns.net/bkcook.vn/public/chitietmonannhahang/<?php echo e($monan->id); ?>&amp;src=sdkpreparse" target="_blank">
                                <span style="font-size: 15px">
                                    <i class="fa fa-share-square-o" aria-hidden="true"></i>Chia Sẻ Facebook
                                </span>
                            </a>
                        </div>
                        <div id="gioithieu" class="col-md-6">
                            <div id="tag">
                                <span id="tagmucdich">Nhà Hàng: <a href=""><?php echo e($monan->nhahang->ten); ?></a></span>
                            </div>
                            <div id="tenmon"><h3><?php echo e($monan->tenmon); ?></h3></div>
                            <div id="vote" class="container">
                                    <b>Ngày Đăng:</b>
                                    <p><?php echo e($monan->created_at); ?></p>
                            </div>
                            <div id="mota">
                                <p><?php echo e($monan->gioithieu); ?></p>
                            </div>
                            <div id="tacgia">
                                <img id="anhtacgia" src="<?php echo e($monan->nhahang->anh); ?>" alt="" style="width: 50px;height: 50px;" class="img-circle">
                                <div id='thongtintacgia'>
                                    <p id='tentacgia'><a href=""><?php echo e($monan->nhahang->username); ?></a></p>
                                    <p>
                                        <b><?php echo e(count($monan->nhahang->nhahangmonan)); ?></b> : Món Ăn &nbsp;&nbsp;
                                        <b><?php echo e($monan->nhahang->luotxem); ?></b>&nbsp;(Lượt Truy Cập)
                                    </p>
                                    <p>
                                        <b>Mở Cửa:&nbsp;&nbsp;<time style="color: red;"><?php echo e($monan->nhahang->giomocua); ?></time></b>
                                    </p>
                                    <p>
                                        <b>Đóng Cửa:&nbsp;&nbsp;<time  style="color: red;"><?php echo e($monan->nhahang->giodongcua); ?></time></b>
                                    </p>
                                </div>
                                </div>
                            </div>
                            <div id="thongso">
                                <div id="songuyenlieu">
                                    <p>Giá Bán:</p>
                                    <b><?php echo e($monan->gia); ?></b>
                                </div>
                                <div id="thoigian">
                                    <p>Khuyến Mại:</p>
                                    <b><?php echo e($monan->khuyenmai); ?></b>
                                </div>
                                <div id="phan">
                                    <p>Phần Ăn</p>
                                    <b><?php echo e($monan->khauphan); ?>&nbsp;(người)</b>
                                </div>
                                <div id="dokho">
                                    <p>Đặt Hàng</p>
                                    <b><?php echo e($monan->ship); ?></b>
                                </div>
                            </div>
            </div>
            <div class="cungnhahang col-md-3 actionBox" style="overflow: auto;height:" id="cungnhahang">
               <marquee behavior="alternate"><h4 class="text-center text-danger">Cùng Nhà Hàng</h4></marquee>
               <?php $__currentLoopData = $cungnhahangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cungnhahang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <div id="baiviet">
                        <img src="<?php echo e($cungnhahang->image); ?>" width="45px" height="45px">
                        <a href="chitietmonannhahang/<?php echo e($cungnhahang->id); ?>"><?php echo e($cungnhahang->tenmon); ?></a>
                        <br>
                    </div>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <hr class="bg alert-warning">
        <div class="row ndnhahang">
                <h4 style="text-align: center;color: green;">Nội Dung</h4>
                <div class="clearfix"></div>
                <div class="row text-center" id="noidung" >
                        <?php echo e($monan->noidung); ?>

                </div>
        </div>
     </div>
<!-- </div> -->
</section>
<section>
</section>
<script type="text/javascript">
    // function split(data,id){
    //     var nguyenlieu=data;
    //     if(nguyenlieu!=" "){
    //         var arr=[];
    //         arr= nguyenlieu.split(".");
    //         var str="<ul>";
    //         for (var i = 0;i< arr.length-1; i++) {
    //             str+="<li>"+ arr[i].trim() + "</li>";
    //         }
    //         str+="</ul>";
    //         document.getElementById(id).innerHTML=str;
    //     }else{

    //     }
    // }
    // var data=[
    //     {
    //         'data': "<?php echo e($monan->nguyen_lieu_chinh); ?>",
    //         'str': 'nguyenlieuchinh'
    //     },
    //     {
    //         'data': "<?php echo e($monan->nguyen_lieu_phu); ?>",
    //         'str': 'nguyenlieuphu'
    //     }];
    // split(data[0].data,data[0].str);
    // split(data[1].data,data[1].str);
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('customer.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* E:\Xampp.7.3\htdocs\bkcook.vn\resources\views/customer/monannhahangchitiet.blade.php */ ?>