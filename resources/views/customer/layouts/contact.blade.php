<section id="contact" class="footer_widget">
    <div class="container">
        <div class="row">
            <div class="main_widget">
                <div class="row">
                    <div class="col-sm-3  col-xs-12">
                        <div class="single_widget wow fadeIn" data-wow-duration="800ms">
                            <h4 class="footer_title">Liên Hệ</h4>
                            <div class="separator4"></div>
                            <ul>
                                <li><a href="https://accounts.google.com/ServiceLogin?hl=vi&passive=true&continue=https://www.google.com/search%3Fq%3Dmail%26oq%3Dmail%26aqs%3Dchrome.0.69i59j69i57j69i65j69i60j69i65j69i60.1207j0j4%26sourceid%3Dchrome%26ie%3DUTF-8" target="_blank"><i class="fa fa-envelope"></i>Phatnh96@gmail.com</a></li>
                                <li><a href=""><i class="fa fa-phone"></i> 0328846219</a></li>
                                <li><a href=""><i class="fa fa-map-marker"></i>Tòa nhà CIT, 15/78 Duy Tân, Hà Nội</a>
                                </li>
                                <li><a href=""><i class="fa fa-fax"></i> 0242 113 311 115</a></li>
                            </ul>
                        </div>
                    </div>
                    @if(Auth::user())
                        <div class="col-sm-6 col-xs-12">
                            <div class="single_widget wow fadeIn" data-wow-duration="800ms">
                                <h4 class="footer_title">Phản Hồi Hệ Thống</h4>
                                <div class="separator4"></div>
                                <div class="footer_gellary">
                                  <form role="form">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                    <div class="form-group">
                                      <label for="usrname" style="color: black"><span><i class="fa fa-user" aria-hidden="true"></i></span> Tiêu Đề</label>
                                      <input type="text" class="form-control" id="survey_title" name="username" required="" placeholder="Tiêu đề">
                                    </div>
                                    <div class="form-group" >
                                      <label for="psw" style="color: black"><span><i class="fa fa-eye" aria-hidden="true"></i></span>Nội Dung</label>
                                      <textarea type="text" class="form-control" id="survey_content" name="password" required="" placeholder="Nội dung"></textarea>
                                    </div>
                                    <a onclick="sendFeedBack()" class="btn btn-success btn-block" style="color: black;"><span><i class="fa fa-power-off" aria-hidden="true"></i></span>Gửi</a>
                                  </form>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if(!Auth::user())
                        <div class="col-sm-6 col-xs-12">
                            <div class="single_widget wow fadeIn signin" data-wow-duration="800ms">
                                <h4 class="footer_title">Phản Hồi Hệ Thống</h4>
                                <div class="separator4"></div>
                                <div class="footer_gellary">
                                  <form role="form">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                    <div class="form-group">
                                      <label for="usrname" style="color: black"><span><i class="fa fa-user" aria-hidden="true"></i></span> Tiêu Đề</label>
                                      <input type="text" class="form-control" id="survey_title" name="title" required="" placeholder="Tiêu đề" disabled="">
                                    </div>
                                    <div class="form-group" >
                                      <label for="psw" style="color: black"><span><i class="fa fa-eye" aria-hidden="true"></i></span>Nội Dung</label>
                                      <textarea type="text" class="form-control" id="survey_content" name="content" required="" placeholder="Nội dung" disabled=""></textarea>
                                    </div>
                                    <a class="btn btn-success btn-block signin" style="color: black;"><span><i class="fa fa-power-off" aria-hidden="true"></i></span>Gửi</a>
                                  </form>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function sendFeedBack() {
        var title = document.getElementById('survey_title').value;
        var content = document.getElementById('survey_content').value;
        var user_id = null;
        @if (Auth::user())
            user_id = `{{Auth::user()->id}}`;
                @endif
        var confirm_ = confirm("Bạn Chắc Chắn Muốn Gửi Chứ?");
        if (confirm_ && (title != null && content != null && title != "" && content != "" && title != undefined && content != undefined)) {
            console.log(confirm_);
            $.ajaxSetup({
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type:'POST',
                url: 'user/data/feedback/v1',
                data:{
                    'user_id': user_id,
                    'title': title,
                    'content_': content,
                },
                success:function(response){
                    console.log(response);
                    document.getElementById('notifi-content').innerHTML = response;
                    document.getElementById('notification-body').setAttribute("style", "background-color: #84eda4; text-align:center;");
                    $("#modal-notification").modal();
                    document.getElementById('survey_title').value = '';
                    document.getElementById('survey_content').value = '';
                },
                error:function( err) {
                    console.log(err);
                }
            });
        }
        if (title == null || content == null || title == "" || content == "" || title == undefined || content == undefined) {
            alert("Không được để trống: title hoặc content");
        }
    }
</script>