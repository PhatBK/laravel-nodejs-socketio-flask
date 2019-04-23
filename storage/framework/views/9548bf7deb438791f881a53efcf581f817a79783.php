<?php $__env->startSection('content'); ?>
<section id="chitietmonan" class="chitietmonan" style="margin-top:3em;">
	<div class="container">
		<div id='tongquan' class="row">
			<div class="tongquan-left col-md-9">
				<div id="anh" class="col-md-5">
					<img id="anh-monan" src="uploads/monan/<?php echo e($monan->anh_monan); ?>" class="img-responsive img-rounded" alt="<?php echo e($monan->ten_monan); ?>">
					<br>
					<b><u>Ngày Đăng :</u>&nbsp;</b><i style="color: green;"><?php echo e($monan->created_at); ?></i>
					<br>
					<div class="star-rating" id="old-star">
							<span  class="fa fa-star-o" data-rating="1" id="o1" ></span>
							<span  class="fa fa-star-o" data-rating="2" id="o2" ></span>
							<span  class="fa fa-star-o" data-rating="3" id="o3" ></span>
							<span  class="fa fa-star-o" data-rating="4" id="o4" ></span>
							<span  class="fa fa-star-o" data-rating="5" id="o5" ></span>
							<span  class="fa fa-star-o" data-rating="6" id="o6" ></span>
							<span  class="fa fa-star-o" data-rating="7" id="o7" ></span>
							<input type="hidden" name="whatever1" class="rating-value" value="<?php echo e($trungbinh); ?>">
							<span style="font-size: 14px;" id="lx">Trung Bình :<b style="color:red;"><?php echo e($trungbinh); ?></b></span>
							<br>
							<span style="font-size: 14px; color: blue;" id="lx">Lượt Xem:<b style="color:orangered;"><?php echo e($monan->so_luot_xem); ?></b></span>
					</div>
					<br>
					<a style="background-color: #90b3ed;" class="user-post-button-share btn" href="https://www.facebook.com/sharer/sharer.php?u=http://bkcook.ddns.net/bkcook.vn/public/chitietmonan/<?php echo e($monan->id); ?>&amp;src=sdkpreparse" target="_blank">
                        <span style="font-size: 15px">
                            <i class="fa fa-share-square-o" aria-hidden="true"></i>Chia Sẻ Facebook
                        </span>
                    </a>
				</div>
				<div id="gioithieu" class="col-md-7">
						<div id="tag">
							<span class="tagmucdich">Loại Món: <a href=""><?php echo e($monan->loaimon->ten); ?></a></span>
		              		<span class="tagmucdich">Mục đích: <a href=""><?php echo e($monan->mucdich->ten); ?></a></span>
		              		<span class="tagmucdich">Vùng miền: <a href=""><?php echo e($monan->vungmien->ten); ?></a></span>
						</div>

						<div id="tenmon"><h3><?php echo e($monan->ten_monan); ?></h3></div>

						<?php if(!Auth::user()): ?>
						<div id="vote" class="container signin">
								<div class="star-rating">
								<span  class="fa fa-star-o" data-rating="1" id="1" ></span>
								<span  class="fa fa-star-o" data-rating="2" id="2" ></span>
								<span  class="fa fa-star-o" data-rating="3" id="3" ></span>
								<span  class="fa fa-star-o" data-rating="4" id="4" ></span>
								<span  class="fa fa-star-o" data-rating="5" id="5" ></span>
								<span  class="fa fa-star-o" data-rating="6" id="6" ></span>
								<span  class="fa fa-star-o" data-rating="7" id="7" ></span>
								<input type="hidden" name="whatever1" class="rating-value" value="4.1">
								<span style="font-size: 14px;" id="lx"></span>
								</div>
							</div>
						<?php endif; ?>
						<?php if(Auth::user()): ?>
						<div id="vote" class="container">
								<div class="star-rating"
									<?php if(!Auth::user()): ?>
										onclick="login_for_rate()"
									<?php endif; ?>
								>
								<span  class="fa fa-star-o" data-rating="1" id="1" ></span>
								<span  class="fa fa-star-o" data-rating="2" id="2" ></span>
								<span  class="fa fa-star-o" data-rating="3" id="3" ></span>
								<span  class="fa fa-star-o" data-rating="4" id="4" ></span>
								<span  class="fa fa-star-o" data-rating="5" id="5" ></span>
								<span  class="fa fa-star-o" data-rating="6" id="6" ></span>
								<span  class="fa fa-star-o" data-rating="7" id="7" ></span>
								<input type="hidden" name="whatever1" class="rating-value" value="4.1">
								<span style="font-size: 14px;" id="lx"></span>
								<?php if(Auth::user() && $monan->danhgiamonan ): ?>
										<?php $__currentLoopData = $monan->danhgiamonan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<?php if(($dg->id_monan == $monan->id) && ($dg->id_user == Auth::user()->id)): ?>
												<script>
													for( i = 1 ;i <= <?php echo e($dg->danhgia); ?>; i++){
														document.getElementById(i).classList.remove('fa-star-o');
														document.getElementById(i).classList.add('fa-star');
													}
												</script>
												<?php break; ?>
											<?php endif; ?>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<?php endif; ?>
								<?php if(Auth::user()): ?>
								&nbsp;&nbsp;<b style="color: gray;">(đánh giá của bạn)</b>
								<?php endif; ?>
								</div>
							</div>
						<?php endif; ?>
						
				<div id="mota">
					<p><?php echo e($monan->gioithieu); ?></p>
				</div>
				<div id="thongso">
						<div id="songuyenlieu">
							<p>Số Bước</p>
							<b> <?php echo e($monan->so_buoc); ?></b>
						</div>
						<div id="thoigian">
							<p>Thực hiện</p>
							<b> <?php echo e($monan->thoigian); ?> phút</b>
						</div>
						<div id="dokho">
							<p>Độ khó</p>
							<b> <?php echo e($monan->do_kho); ?></b>
						</div>
						<div style="text-align: center;">
							<button type="button" style="background: red;" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">
								<p>Gợi Ý Món Ăn Cho Bạn !!</p>
							</button>
							<!-- Modal chứa các món ăn có thể nấu cùng món đan xem -->
							<div id="myModal" class="modal fade" role="dialog">
								  <div class="modal-dialog">
								    <!-- Modal content-->
								    <div class="modal-content">
								      <div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal">&times;</button>
								        <h4 class="modal-title">Các Món Có Thể Ăn Cùng Với :<?php echo e($monan->ten_monan); ?>!!</h4>
								      </div>
								      <div class="modal-body">
								      	<div class="row">
									      	<div class="col-md-3">
										      	
										      	<a href="" title="Xem chi tiết món ăn:<?php echo e($monan->ten_monan); ?>" target="_blank">
										      	<p style="color: red;"><?php echo e($monan->ten_monan); ?></p>
										      	<img src="uploads/monan/<?php echo e($monan->anh_monan); ?>" alt="kết nối kém.." width="100px" height="120px">
										      	<br><br>
										      	<u>Xem chi tiết</u> 
										        </a>

										    </div>
										    <div class="col-md-3">
												
												<p style="color: red;"><?php echo e($monan->ten_monan); ?></p>
										        <img src="uploads/monan/<?php echo e($monan->anh_monan); ?>" alt="kết nối kém.." width="100px" height="120px">
									      	</div>
									      	<div class="col-md-3">
												
												<p style="color: red;"><?php echo e($monan->ten_monan); ?></p>
										        <img src="uploads/monan/<?php echo e($monan->anh_monan); ?>" alt="kết nối kém.." width="100px" height="120px">
									      	</div>
									    </div>
									    
										<div class="row" style="margin-top:5em;overflow: auto; ">
											<div class="col-md-12">
												<b>
												– Không cho mì chính vào những món món ăn có nhiều vị chua. Vì mì chính khó hòa tan trong nước chua, đồng thời còn phát sinh ra một loại axít mới có hại cho sức khỏe.
												– Không cho thêm nước lạnh khi đang hầm xương, thịt. Vì trong thịt, xương có chứa một hàm lượng lớn protein và lipid. Nếu cho thêm nước lạnh, nhiệt độ trong nồi hạ đột ngột, protein và lipid đông lại, món ăn không còn chất bố dưỡng nữa
											    </b>
											</div>
										</div>
								      </div>
								      <div class="modal-footer">
								        <button type="button" class="btn btn-default" data-dismiss="modal" style="background: black;">
								        	Thoát
								        </button>
								      </div>
								    </div>
								  </div>
							</div>
							
						</div>
				</div>
			</div>
				<?php if($monan->video): ?>
					<div class="modal fade" id="yourModal<?php echo e($monan->video->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
						<div class="modal-dialog" role="document">
							<div class="modal-content" style="width: 720px;">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title" id="myModalLabel"><?php echo e($monan->ten_monan); ?></h4>
									</div>
									<div class="modal-body">
											<video id="video" width="700" controls>
											  <source id="svideo" src="uploads\video\<?php echo e($monan->video->ten); ?>" type="video/mp4">
											</video>
									</div>
									<div class="modal-footer">

									</div>
							</div>
						</div>
					</div>
				<?php endif; ?>
			</div>
			
			<div id="monanlienquan_xem_nhieu_nhat" class="col-md-3">
				<h5 style="text-align: center;">Thịnh Hành</h5>
				<?php $__currentLoopData = $monan_lienquan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $md): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div id="baiviet">
					<img src="uploads/monan/<?php echo e($md->anh_monan); ?>">
					<p><a href="chitietmonan/<?php echo e($md->id); ?>"><?php echo e($md->ten_monan); ?></a></p>
				</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
			
			
		</div>
 		<!-- id="nguyenlieu-monanlienquan"  -->
		<div  class="row" >
			<div id="nguyenlieu" class="col-md-8"  style="background-color: white; font-family: 'segoe ui light'; padding-left: 40px;" >
				<div class="col-md-4">
					<div id="tieude" >
						<h5 style="border-bottom: solid 1px #eee;">Nguyên liệu chính</h5>
					</div>
					<div id="nguyenlieuchinh">
					</div>
				</div>
				<div class="col-md-4">
					<div id="tieude">
						<h5 style="border-bottom: solid 1px #eee;">Nguyên liệu phụ</h5>
					</div>
					<div id="nguyenlieuphu">
					</div>
				</div>
				<div class="col-md-4">
					<div id="tieude">
						<h5 style="border-bottom: solid 1px #eee;">Gia vị</h5>
					</div>
					<div id="giavi">
					</div>
				</div>
			</div>
			
			<div id="monanlienquan" class="col-md-3">
				<h5 style="text-align: center;">Món Ăn Liên Quan</h5>
				<?php $__currentLoopData = $monan_lienquan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $md): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div id="baiviet">
					<img src="uploads/monan/<?php echo e($md->anh_monan); ?>">
					<p><a href="chitietmonan/<?php echo e($md->id); ?>"><?php echo e($md->ten_monan); ?></a></p>
				</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>

			
	
		</div>
		<br>
		<div class="row">
			<div class="col-md-9" id="tab">
				<div class="row">
	                <div class="col-md-12">
	            		<div class="card">
				            <ul class="nav nav-tabs" role="tablist">
				                <li role="presentation" class="active">
				                	<a href="#congthuc" aria-controls="congthuc" role="tab" data-toggle="tab">Công Thức</a>
				                </li>
				                <li role="presentation">
				                	<a href="#hinhanh" aria-controls="hinhanh" role="tab" data-toggle="tab">Hình Ảnh</a>
				                </li>
				                <?php if($monan->video): ?>
					                <li role="presentation">
					                	<a  aria-controls="video" role="tab"  data-toggle="modal" data-target="#yourModal<?php echo e($monan->video->id); ?>" onclick="check_video_played()">Video</a>
					                </li>
				                <?php endif; ?>
				                <?php if(!$monan->video): ?>
				                	<li role="presentation">
					                	<a href="#video" aria-controls="video" role="tab" data-toggle="modal" data-target="">Chưa Có Video</a>
					                </li>
				                <?php endif; ?>
				            </ul>
		                    <!-- Tab panes -->
	                    <div class="tab-content">
	                        <div role="tabpanel" class="tab-pane active" id="congthuc">
	                        	<?php $i = 1?>
	                        	<?php $__currentLoopData = $cacbuocnau; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<h5><strong>Bước <?php echo $i++; ?>:</strong></h5>
									<p><?php echo e($cb->noidung); ?></p>
									<div class="row text-center">
										<img id="buoc1-1" src="uploads/monan/<?php echo e($cb->image); ?>">
									</div>
									<hr>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	                        </div>
	                        <div role="tabpanel" class="tab-pane" id="hinhanh">
	                        	<h4>Hình ảnh món ăn</h4><hr>
	                        </div>
	                        <div role="tabpanel" class="tab-pane" id="video">
	                        	<h4>Video món ăn</h4><hr>
	                        	<?php if($monan->video): ?>
		                        <video width="775" controls>
								  <source src="uploads\video\<?php echo e($monan->video->ten); ?>" type="video/mp4">
								</video>
								<?php endif; ?>
								<?php if(!$monan->video): ?>
									<div class="alert-warning">
										<h3 style="text-align: center;">Món Ăn Chưa Có Video,rất xin lỗi... </h3>
									</div>
								<?php endif; ?>
	                        </div>
	                    </div>	<!--End tab panel -->
						</div>
	                </div>
				</div>
			</div>
			<div class="col-md-3 khoibaiviet">
				
				
				<div id="baivietlienquan" class="col-md-3" style="background-color: white;; font-family: 'segoe ui light';" >
					<h5 style="text-align: center;">Mọi Người Hay Xem Cùng</h5>
					<div id="baiviet">
						
					</div>
				</div>

				
				<div id="baivietlienquan" class="col-md-3" style="background-color: white;; font-family: 'segoe ui light';" >
					<h5 style="text-align: center;">Cùng Nguyên Liệu</h5>
					<div id="baiviet">
						
					</div>
				</div>
				<div id="baivietlienquan" class="col-md-12">
					<h5 style="text-align: center;">Bài Viết Liên Quan</h5>
					<?php if(count($baiviet_lienquans) > 0): ?>
						<?php $__currentLoopData = $baiviet_lienquans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $baiviet_lienquan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div id="baiviet">
								<?php if(count($baiviet_lienquan->postimage) > 0): ?>
									<img src="<?php echo e($baiviet_lienquan->postimage[0]->image); ?>" alt="Mất kết nối..anh bai post">
								<?php else: ?>
									<img src="<?php echo e($baiviet_lienquan->user->anhdaidien); ?>" alt="Mất kết nối..anh user">
								<?php endif; ?>
								<p><a href="baidangchitiet/<?php echo e($baiviet_lienquan->id); ?>" target="_blank">
								&nbsp;&nbsp;Tác Giả:<b style="color: orange;"><?php echo e($baiviet_lienquan->user->hovaten); ?></b>
								</a>
								</p>
							</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php else: ?>
						<p style="color:green; text-align: center;">Không có bài viết nào !!</p>
					<?php endif; ?>
				</div>

				<!-- Comment món ăn của người dùng có tài khoản-->
				<div class="detailBox container col-md-12">
				    <div class="titleBox" style="text-align: center;">
				  	<label>Bình luận</label>
				        <button type="button" class="close" aria-hidden="true">&times;</button>
				    </div>
				    <div class="actionBox" style="overflow: auto; height:20% ">
				        <ul class="commentList">
				            <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
					                <div class="commenterImage">
					                  <img src="<?php echo e($comment->user->anhdaidien); ?>" />
					                </div>
					                <div class="commentText">
					                	<p><?php echo e($comment->user->tentaikhoan); ?></p>
					                    <p class=""><?php echo e($comment->noi_dung); ?></p> <span class="date sub-text"><?php echo e($comment->created_at); ?></span>

					                </div>
					            </li>
				            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				        </ul>
				    </div>
				   
			           <?php if(Auth::user()): ?>
			            <div class="form-group">
			            	<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
			                <input id="input-comment" class="form-control" type="text" placeholder="Bình luận của bạn.." />
			                <button class="btn btn-sm disabled btn-primary" id="btn-comment" onclick="sendComment('<?php echo e(Auth::user()->id); ?>','<?php echo e($monan->id); ?>' )">Thêm</button>
			            </div>
			           <?php endif; ?>
			           <?php if(!Auth::user()): ?>
				           <br>
				           <div class="form-group" style="align-content: center;">
				                <a href="javascript:void(0);" class="form-control signin" style="text-align: center;color: green;">Bình Luận</a>
						   </div>
			           <?php endif; ?>
			      
				</div>	<!-- End comment -->
				
			</div>
		</div>
	</div>
	<!-- </div> -->
</section>



	
<?php if(Auth::user()): ?>
	<script>
		var user_id = `<?php echo e(Auth::user()->id); ?>`;
	</script>
<?php else: ?>
	<script>
        var user_id = findCookie("user_id") || null;
		// if (!findCookie("user_id")) {
		// 	var user_id = null;
        // } else {
		// 	var user_id = findCookie("user_id");
		// }
	</script>
<?php endif; ?>
<script>
	console.log("Starting caculator logs data...");
	var id_mon_an = `<?php echo e($monan->id); ?>`;
	var ten_mon_an = `<?php echo e($monan->ten_monan); ?>`;
	var date_visit = null;
	var time_visit_start = null;
	var start = null;
	var play_video = null;
	var referer = document.referrer;
	var mon_an_id_referrer = 0;

	if (referer) {
		var split_referrer = parseInt(referer.split('/').pop());
		if (split_referrer == NaN) {
			mon_an_id_referrer = 0;
		}
		if (Number.isInteger(split_referrer)) {
			mon_an_id_referrer = split_referrer
		} else {
			mon_an_id_referrer = 0;
		}
	}
	function normal_date(time) {
		let normal = time.getFullYear() + "-" 
                + (time.getMonth()+1) + "-" 
                + time.getDate();
        return normal;
	};
	function normal_time(time) {
		var hour = time.getHours();
		var minute = time.getMinutes();
		var normal = hour + ":" + minute;
		return normal;
	};
	function check_video_played() {
		play_video = true;
		console.log("Playing video");
		console.log(play_video);
	};
	window.addEventListener('load', (event) => {
		console.log('Starting caculator time...');
		start = Date.now();
		var date = new Date();
		date_visit = normal_date(date);
		time_visit_start = normal_time(date);
	});
	
	window.onbeforeunload = function(event) {
		console.log("Before unload event");
		var time = Date.now() - start;
		$.ajaxSetup({
		headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			type:'POST',
			url: 'user/logs/data/page-time',
			data:{
				'time' : time,
				'id_mon_an': id_mon_an,
				'ten_mon_an': ten_mon_an,
				'user_id': user_id,
				'referer': referer,
				'mon_an_id_referrer': mon_an_id_referrer,
				'play_video': play_video,
				'date_visit': date_visit,
				'time_visit_start': time_visit_start,

			},
			success:function(response){
				console.log(response);
				if (findCookie("user_id") == null) {
                    setCookieMy("user_id", response[response.length -1], 1);
                }
				if (user_loged) {
				    deleteCookie("user_id")
                }
			},
			error:function( err) {
				console.log(err);
			}
		});
	};
	
	// Tự động gửi dữ liệu đi sau một khoảng thời gian được set
	
	setInterval(function() {
    	var time = Date.now() - start;
    	$.ajaxSetup({
    	headers: {
    			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    		}
    	});
    	$.ajax({
    		type:'POST',
			url: 'user/logs/data/page-time',
			data:{
				'time' : time,
				'id_mon_an': id_mon_an,
				'ten_mon_an': ten_mon_an,
				'user_id': user_id,
				'referer': referer,
				'mon_an_id_referrer': mon_an_id_referrer,
				'play_video': play_video,
				'date_visit': date_visit,
				'time_visit_start': time_visit_start,
			},
			success:function(response){
				console.log(response);
			},
			error:function( err) {
				console.log(err);
			}
		});
	}, 10000);
</script>

<script src="vendor_customer/vendor/js/socket.io.js"></script>


<?php if($monan->video): ?>
	<script>
		console.log('modal turn off');
		$('#yourModal<?php echo e($monan->video->id); ?>').on('hidden.bs.modal', function (e) {
			// $('#yourModal<?php echo e($monan->video->id); ?>')[0].pause();
			$('#yourModal<?php echo e($monan->video->id); ?> svideo').attr("src", $("#yourModal<?php echo e($monan->video->id); ?>  svideo").attr("src"));
			console.log('ID video :'+ <?php echo e($monan->video->id); ?>);
			e.preventDefault();
		    $('.videoplayer').children('iframe').attr('src', '');
		    $('.modal-background').fadeOut();
		});
	</script>
<?php endif; ?>


<script type="text/javascript">
	function split(data,id){
		var nguyenlieu=data;
		if(nguyenlieu != " "){
			var arr = [];
			arr= nguyenlieu.split(".");
			var str="<ul class='list-nguyenlieu'>";
			for (var i = 0;i< arr.length-1; i++) {
				arrLuong = arr[i].split(",");

				str+="<li>"+ arrLuong[0].trim() + " <span class='luong'> " + arrLuong[1].trim() + "</span></li>";
			}
			str+="</ul>";
			document.getElementById(id).innerHTML= str;
		}else{

		}
	}
	var data=[
		{
			'data': "<?php echo e($monan->nguyen_lieu_chinh); ?>",
			'str': 'nguyenlieuchinh'
		},
		{
			'data': "<?php echo e($monan->nguyen_lieu_phu); ?>",
			'str': 'nguyenlieuphu'
		},
		{
			'data': "<?php echo e($monan->giavi); ?>",
			'str': 'giavi'
		}];

	split(data[0].data,data[0].str);
	split(data[1].data,data[1].str);
	split(data[2].data,data[2].str);

	$(document).ready(function(){
        $("#input-comment").keyup(function() {
	    	var text = $("#input-comment").val().trim();
	        if(text.length>0) {
	        	$("#btn-comment").removeClass("disabled");
	        } else {
	        	$("#btn-comment").addClass("disabled");
	        }
	    })
    });

    var socket = io.connect('http://127.0.0.1:1108');

	function sendComment(id_user,id_monan) {
		var text = $("#input-comment").val();
		console.log(text);
        socket.emit('comment monan',{'id_user':id_user,'noi_dung':text,'id_monan':id_monan });
        $("#input-comment").val("");
        $("#btn-comment").addClass("disabled");
        return false;
	};

    socket.on('comment monan',function(data){
    	var element = `<li>
			                <div class="commenterImage">
			                  <img src="`+data.anh_dai_dien+`" />
			                </div>
			                <div class="commentText">
			                	<p>`+data.ten_tai_khoan+`</p>
			                    <p class="">`+data.noi_dung+`</p> <span class="date sub-text">`+data.created_at+`</span>
			                </div>
			            </li>`;
    	$(".commentList").append(element);
    });
</script>

<?php if(Auth::user()): ?>
	<script type="text/javascript">
	    $(document).ready(function() {
	        $.ajaxSetup({
	            headers: {
	                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	            }
	        });
	        $("span").click(function() {
	            var sao = $(this).attr("id");
	            var moni = `<?php echo e($monan->id); ?>`;
	            var useri = `<?php echo e(Auth::user()->id); ?>`;
	            if((sao=="1")||(sao=="2")||(sao=="3")||(sao=="4")||(sao=="5")||(sao=="6")||(sao == "7")){
	            var saoi = parseInt(sao);
				console.log(useri + ' :da danh gia mon:' + moni);
				var url = "<?php echo e(route('danhgia_monan')); ?>";
	            var op='';
	            $.ajax({
	                type:'POST',
	                url: url,
	                data:{'moni':moni,
	            	      'useri':useri,
	            	  	  'saoi':saoi},
	                success:function(response){
	                    console.log(response);
	                    for( i = 1 ;i <= saoi ; i++){
							document.getElementById(i).classList.remove('fa-star-o');
							document.getElementById(i).classList.add('fa-star');
						}
						alert('Bạn đã đánh giá '+ saoi +' sao cho món ' +'<?php echo e($monan->ten_monan); ?>');
	                },
	                error:function() {
	                    console.log('error');
	                }
	            });
	            }else{
	            	console.log("đay không phải là sao..ahihi");
	            }
	        });
	    });
	</script>
<?php endif; ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('customer.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* E:\Xampp.7.3\htdocs\bkcook.vn\resources\views/customer/chitietmonan.blade.php */ ?>