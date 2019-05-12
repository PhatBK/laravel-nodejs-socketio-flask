var socket = io.connect('http://127.0.0.1:1108');

function clicksenduserpost(id_user_online) {
    var selDiv = $("#selectedFiles");
    var list_image = selDiv.find(".selFile");
    console.log(list_image.length);
    var list_image_src = [];
    $('.selFile').each(function(index, value) {
        list_image_src.push($(this).attr('src'));
    });
    var noi_dung = $('.textarea-post-post').val().trim();
    if (noi_dung == '') {

        alert('Bạn Chưa Điền Đủ Thông Tin Bài Viết');
        return;
    }
    var id_user = $('.user-posts-post').attr("id");

    var id_loaimon = $('.select-post-post-type-dish option:selected').val();
    console.log(id_loaimon);
    if (id_loaimon == 0 || id_loaimon == "-Chọn loại món-") {
        alert('ban chua dien loai mon');
        return;
    }
    var tieude = $('#input-post-title').val().trim();
    if (tieude == '') {
        alert('ban chua dien tieu de');
        return;
    }
    console.log({ 'tieude': tieude, 'noi_dung': noi_dung, 'id_loaimon': id_loaimon, 'list_image_src': list_image_src });
    socket.emit('user posts post', { 'id_user': id_user_online, 'tieude': tieude, 'noi_dung': noi_dung, 'id_loaimon': id_loaimon, 'list_image_src': list_image_src });
    $('.textarea-post-post').val('');
    $('#input-post-title').val('');
    $('.sub-img-post-post').remove();
    $('.action-post-post').hide();
    return false;
}

function clickReviewCommentArea(id) {
    var arr = id.split("-");
    var text = $("#" + id).val().trim();
    if (text.length > 0) {
        $("#" + arr[0] + "-user-post-action-review-comment").show();
    } else {
        $("#" + arr[0] + "-user-post-action-review-comment").hide();
    }

}

function keyupReviewCommentArea(id) {
    var arr = id.split("-");
    var text = $("#" + id).val().trim();
    if (text.length > 0) {
        $("#" + arr[0] + "-user-post-action-review-comment").show();
    } else {
        $("#" + arr[0] + "-user-post-action-review-comment").hide();
    }
}

function deleteReviewComment(id) {
    var arr = id.split("-");
    $("#" + arr[0] + "-user-post-action-review-comment").hide();
}

function answerReviewComment(id, id_user_online) {
    var id_user = $('.user-posts-post').attr("id");
    var arr = id.split("-");
    var text = $('#' + arr[0] + '-user-post-review-comment-area').val();
    socket.emit('comment user post', { 'id_user': id_user_online, 'noi_dung': text, 'id_userpost': arr[0] });
    $('#' + arr[0] + '-user-post-review-comment-area').val('');
    $("#" + arr[0] + "-user-post-action-review-comment").hide();
    return false;
}

function replyCommentPost(id) {
    var arr = id.split("-");
    $("#" + arr[0] + "-user-post-reply-area").toggle();
    $("#" + arr[0] + "-user-post-reply-comment").focus();
    var text = $("#" + arr[0] + "-user-post-reply-comment").val();
    if (text.length > 0) {
        $("#" + arr[0] + "-user-post-answer-reply-comment").removeClass("disabled");
    } else {
        $("#" + arr[0] + "-user-post-answer-reply-comment").addClass("disabled");
    }
}

function deleteReplyComment(id) {
    var arr = id.split("-");
    $("#" + arr[0] + "-user-post-reply-comment").val("");
    $("#" + arr[0] + "-user-post-reply-area").hide();
}

function answerReplyComment(id, id_user_online) {
    var id_user = $('.user-posts-post').attr("id");
    var arr = id.split("-");
    var text = $('#' + arr[0] + '-user-post-reply-comment').val();
    socket.emit('reply comment user post', { 'id_user': id_user_online, 'noi_dung': text, 'id_commentpost': arr[0] });
    $('#' + arr[0] + '-user-post-reply-comment').val('');
    return false;
}

function keyupReplyComment(id) {
    var arr = id.split("-");
    var text = $("#" + arr[0] + "-user-post-reply-comment").val();
    if (text.length > 0) {
        $("#" + arr[0] + "-user-post-answer-reply-comment").removeClass("disabled");
    } else {
        $("#" + arr[0] + "-user-post-answer-reply-comment").addClass("disabled");
    }
}

function clickButtonComment(id) {
    var arr = id.split("-");
    console.log(arr[0]);
    $("#" + arr[0] + "-user-post-review-comment-area").focus();
}

function clickLike(id, id_user_online) {
    var arr = id.split("-");
    var check = $("#" + arr[0] + "-user-post-button-like").attr("aria-pressed");
    var id_user = $('.user-posts-post').attr("id");
    console.log(check);
    if (check == "true") {
        $("#" + arr[0] + "-user-post-button-like").removeClass("like");
        $("#" + arr[0] + "-user-post-button-like").addClass("unlike");
        $("#" + arr[0] + "-user-post-button-like").attr("aria-pressed", "false");
        console.log(1);
    } else {
        $("#" + arr[0] + "-user-post-button-like").removeClass("unlike");
        $("#" + arr[0] + "-user-post-button-like").addClass("like");
        $("#" + arr[0] + "-user-post-button-like").attr("aria-pressed", "true");
        console.log(2);
    }
    socket.emit('like unlike user post', { 'id_user': id_user_online, 'id_userpost': arr[0], 'check': check });
    return false;

}

$(document).ready(function() {


    $(".select-image-button-post-post").click(function() {
        var sum = $("#selectedFiles .sub-img-post-post").length;
        if (sum > -1) {
            $(".action-post-post").show();
        }

    });

    $("#selectedFiles").change(function() {
        $(".action-post-post").hide();
    });

    function A2(id) {
        var arr = id.split("-");
        var text = $("#" + id).val();
        if (text.length > 0) {
            $("#" + arr[0] + "-user-post-action-review-comment").show();
        } else {
            $("#" + arr[0] + "-user-post-action-review-comment").hide();
        }
    }

    $(".textarea-post-post").keyup(function() {
        var text = $(".textarea-post-post").val();
        if (text.length > 0) {
            $(".action-post-post").show();
        } else {
            $(".action-post-post").hide();
        }

    });

    $(".textarea-post-post").click(function() {
        var text = $(".textarea-post-post").val();
        if (text.length > 0) {
            $(".action-post-post").show();
        } else {
            $(".action-post-post").hide();
        }

    });

    $(".delete-post-post").click(function() {
        $(".action-post-post").hide();
    });


    $(".signin").click(function() {
        $("#modal-signin").modal();
    });

    $(".signup").click(function() {
        $("#modal-signup").modal();
    });

    $(".modal-recipient").click(function() {
        $("#modal-recipient").modal();
    });

    $("#a-signup").click(function() {
        $("#modal-signin").modal("hide");
        $("#modal-signup").modal();
    });

    $(".send-post-post").click(function() {
        $(".send-post-post").css("background-color", "428bca");
        $(".send-post-post").css("opacity", "80");
        $(".send-post-post").css("color", "#fff");
    });

    $(".delete-post-post").click(function() {
        $(".delete-post-post").css("border-radius", "4px");
        $(".delete-post-post").css("background-color", "#fff");
        $(".delete-post-post").css("color", "black");
        $(".delete-post-post").css("min-width", "50px");
        $(".delete-post-post").css("height", "30px");
        $(".delete-post-post").css("font-size", "13px");
    });



});

var selDiv = "";
var storedFiles = [];

$(document).ready(function() {
    $("#files").on("change", handleFileSelect);

    selDiv = $("#selectedFiles");
    $(".send-post-post").click(function() {
        storedFiles = [];
    });

    $("body").on("click", ".selFile", removeFile);
});

function handleFileSelect(e) {
    var files = e.target.files;
    var filesArr = Array.prototype.slice.call(files);
    filesArr.forEach(function(f) {

        if (!f.type.match("image.*")) {
            return;
        }
        storedFiles.push(f);

        var reader = new FileReader();
        reader.onload = function(e) {
            var html = "<div class='col-sm-3 sub-img-post-post'><img src=\"" + e.target.result + "\" data-file='" + f.name + "' class='selFile img-responsive' title='Click to remove' style='width:100%;height:100px'>" + "<br clear=\"left\"/></div>";
            selDiv.append(html);
        }
        reader.readAsDataURL(f);
    });

}

function handleForm(e) {
    e.preventDefault();
    var data = new FormData();

    for (var i = 0, len = storedFiles.length; i < len; i++) {
        data.append('files', storedFiles[i]);
    }

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'handler.cfm', true);

    xhr.onload = function(e) {
        if (this.status == 200) {
            console.log(e.currentTarget.responseText);
            alert(e.currentTarget.responseText + ' items uploaded.');
        }
    }

    xhr.send(data);
}

function removeFile(e) {
    var file = $(this).data("file");
    for (var i = 0; i < storedFiles.length; i++) {
        if (storedFiles[i].name === file) {
            storedFiles.splice(i, 1);
            break;
        }
    }
    $(this).parent().remove();
}


$(document).ready(function() {

    socket.on('user posts post', function(data) {
        console.log("-----------------------------------")
        console.log(data);

        var arr_img = data.list_name_image;
        var str_img = '';
        console.log(arr_img);
        for (var i = 0; i < arr_img.length; i++) {
            str_img = str_img + `<img src="` + arr_img[i] + `" class="img-responsive">`
        }
        console.log(str_img);

        var str_like = '';
        var ava_user_online = $("#ava-user-online").attr("src");
        var id_user_online = $('.user-posts-post').attr("id");
        $(document).ready(function() {
            var element = `<div class="panel panel-default user-post" id="` + data.id_userpost + `-user-post">
                    <div class="panel-body">
                        <div class="row user-post-header">                      
                            <div class="col-sm-2">

                                <img src="` + data.anh_dai_dien + `" class="card-img rounded-circle img-circle avatar-user">
                         
                            </div>

                            <div class="col-sm-5" style="margin-left: -40px ">
                                <div class="row">
                                    <p class="name-user-post" >` + data.ten_tai_khoan + `</p>
                                </div>
                                <div class="row">
                                    <p class="info-recipe-user-post">` + data.noi_bat + ` nổi bật</p>
                                </div>                                          
                            </div>
                        
                            <div class="pull-right timestamp-user-post" style="margin-right: 10px">
                                <span style="font-size: 12px">` + data.created_at + `</span>
                                <span> <i class="fa fa-globe" aria-hidden="true"></i></span> 
                            </div>
                        </div>           

                        <div class="row user-post-title" style="margin-top: 20px">
                            <div class="container">
                                <div class="col-sm-12">
                                    <p class="user-post-title-p1">` + data.tieude + ` </p>
                                </div>
                            </div>                          
                        </div>

                        <hr style="margin-top: 5px">

                        <div class="user-post-content" >                        
                            <div class="row user-post-text-content" style="margin: 0px">
                                <div class="col-sm-12">
                                    <p>
                                        ` + data.noi_dung.replace(/\n/g, '</br>') + ` 
                                    </p>
                                </div>
                            </div>
                            <div class="row user-post-img-content" style="margin: 0px">
                                <div class="col-sm-12" style="padding-top: 20px;padding-bottom: 20px">        
                                    ` + str_img + `                        
                                </div>                              
                            </div>  
                            
                        </div>
                        <div class="user-post-review-acts">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="pull-left"> 
                                        <div style="padding-left: 20px">
                                            <a class="user-post-button-like like-unlike btn unlike" aria-pressed="false" onclick="clickLike('` + data.id_userpost + `-user-post-button-like','` + id_user_online + `')" id="` + data.id_userpost + `-user-post-button-like">
                                                <span style="font-size: 15px">
                                                    <i class="fa fa-thumbs-o-up" aria-hidden="true"></i> thích
                                                </span>
                                            </a> 
                                            <a class="user-post-button-comment btn" onclick="clickButtonComment('` + data.id_userpost + `-user-post-button-comment')" id="` + data.id_userpost + `-user-post-button-comment">
                                                <span  style="font-size: 15px">
                                                    <i class="fa fa-comments-o " aria-hidden="true"></i> bình luận
                                                </span>
                                            </a>
                                            <a class="user-post-button-share btn" href="https://www.facebook.com/sharer/sharer.php?u=http://bkcook.ddns.net/bkcook.vn/public/baidangchitiet/` + data.id_userpost + `&amp;src=sdkpreparse" target="_blank">
                                                <span  style="font-size: 15px">
                                                    <i class="fa fa-share-square-o" aria-hidden="true"></i> chia sẻ
                                                </span>
                                            </a>
                                        </div>
                                    
                                    </div>
                                    <div class="pull-right user-post-view">
                                        <span style="font-size: 14px">` + data.view + ` lượt xem <i class="fa fa-eye" aria-hidden="true"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="user-post-react" id="` + data.id_userpost + `-user-post-react">
                        ` + str_like + `
                        </div>
                        <hr style="margin: 10px">

                        <div class="user-post-comment-area">
                            <div class="user-post-list-comment" id="` + data.id_userpost + `-user-post-list-comment">
                                
                            </div>

                            <!-- review comment -->
                            <div class="user-post-review-comment-container" id="` + data.id_userpost + `-user-post-review-comment-container">
                                <form>
                                    <div class="row">
                                        <div class="col-sm-1 img-ava">
                                            <img src="` + ava_user_online + `" class="img-circle img-responsive user-post-item-avatar-img">
                                        </div>
                                        <div class="col-sm-11" style="margin-left: -10px">
                                            <span>                          
                                                 <textarea type="text" class="form-control user-post-review-comment-area" onclick='clickReviewCommentArea("` + data.id_userpost + `-user-post-review-comment-area")' onkeyup='keyupReviewCommentArea("` + data.id_userpost + `-user-post-review-comment-area")' id="` + data.id_userpost + `-user-post-review-comment-area" placeholder="thảo luận của bạn ..."></textarea>
                                            </span>                                     
                                        </div>
                                    </div>
                                    <div class="row user-post-action-review-comment" id="` + data.id_userpost + `-user-post-action-review-comment" style="display: none">
                                        <div class="pull-right" style="padding-right: 30px;margin-top: -10px" >
                                            <a class="btn btn-default user-post-delete-review-comment" onclick="deleteReviewComment('` + data.id_userpost + `-user-post-delete-review-comment')" id="` + data.id_userpost + `-user-post-delete-review-comment">Hủy</a>
                                            <a class="btn btn-default user-post-answer-review-comment" onclick="answerReviewComment('` + data.id_userpost + `-user-post-answer-review-comment','` + id_user_online + `')" id="` + data.id_userpost + `-user-post-answer-review-comment">Trả lời</a>
                                        </div> 
                                    </div>  
                                </form>
                            </div>
                        </div>
                    </div>               
                </div>`;
            $('.list-user-post').prepend(element);
        });
    });

    socket.on('comment user post', function(data) {
        console.log("-----------------------------------")
        console.log(data);
        var id_user_online = $('.user-posts-post').attr("id");
        var ava_user_online = $("#ava-user-online").attr("src");
        console.log(id_user_online);
        console.log(ava_user_online);

        var element = `<div class="user-post-item-comment row" id="` + data.id_commentpost + `-user-post-item-comment" style="margin-bottom: 20px">   
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-1 user-post-item-comment-avatar">
                                                <img src="` + data.anh_dai_dien + `" class="img-circle img-responsive user-post-item-avatar-img">
                                            </div>                              
                                            <div class="col-sm-11 user-post-item-comment-content" id="` + data.id_commentpost + `-user-post-item-comment-content">
                                                <div class="row">
                                                    
                                                    <p class="user-post-item-comment-username">` + data.ten_tai_khoan + `</p> 
                                                       
                                                </div>
                                                <div class="row">
                                                    <p>` + data.noi_dung + `</p>
                                                </div>
                                                <div class="row">
                                                    <a style="font-size: 14px;font-weight: 400;" href="javascript:void(0)" class="reply" onclick="replyCommentPost('` + data.id_commentpost + `-reply')" id="` + data.id_commentpost + `-reply">Trả lời</a>                                           
                                                </div>

                                                <!-- list reply comment -->
                                                <div class="row list-reply-comment" id="` + data.id_commentpost + `-list-reply-comment">
                                                    
                                                </div>

                                                <!-- -->
                                                <div class="row user-post-reply-area" id="` + data.id_commentpost + `-user-post-reply-area" style="display: none">
                                                    <div class="">
                                                        <div class="col-sm-1 img-ava">
                                                            <img src="` + ava_user_online + `" class="img-circle img-responsive user-post-item-avatar-img">
                                                        </div>
                                                        <div class="col-sm-11" style="margin-left: -10px">
                                                            <span>                          
                                                                <textarea type="text" class="form-control user-post-reply-comment" onkeyup="keyupReplyComment('` + data.id_commentpost + `-user-post-reply-comment')" id="` + data.id_commentpost + `-user-post-reply-comment"></textarea>
                                                            </span>                                                        
                                                        </div>
                                                    </div>

                                                    <div class="">
                                                            <div class="pull-right" style="padding-right: 30px;margin-top: -10px">
                                                                <a class="user-post-delete-reply-comment btn" onclick="deleteReplyComment('` + data.id_commentpost + `-user-post-delete-reply-comment')" id="` + data.id_commentpost + `-user-post-delete-reply-comment">Hủy</a>
                                                                <a class="user-post-answer-reply-comment btn disabled" onclick="answerReplyComment('` + data.id_commentpost + `-user-post-answer-reply-comment','` + id_user_online + `')" id="` + data.id_commentpost + `-user-post-answer-reply-comment">Trả lời</a>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                               
                                                <!-- <div class="reply-comment">
                                                    <p>hai con bo an co dong xanh</p>
                                                </div> -->
                                            </div>
                                        </div>                          
                                        
                                    </div> 
                                    

                                </div>`;
        console.log(element);
        console.log('#' + data.id_userpost + '-user-post-list-comment');
        $('#' + data.id_userpost + '-user-post-list-comment').prepend(element);

    });


    socket.on('reply comment user post', function(data) {
        console.log("-----------------------------------")
        console.log(data);
        var element = `<div class="reply-comment">
                                <div class="col-sm-12" style="margin-bottom: 10px">
                                    <div class="row">
                                        <div class="col-sm-1 img-ava">
                                            <img src="` + data.anh_dai_dien + `" class="img-circle img-responsive user-post-item-avatar-img">
                                        </div>
                                        <div class="col-sm-10 comment-content">
                                            <div class="row">
                                                <p class="user-post-item-comment-username">` + data.ten_tai_khoan + `</p>
                                            </div>
                                            <div class="row">
                                                <p>` + data.noi_dung + `</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>`;
        $('#' + data.id_commentpost + '-list-reply-comment').prepend(element);

    });

    socket.on("like unlike user post", function(data) {
        console.log("-----------------------------------")
        console.log(data);
        var like = data.like;
        console.log(like);
        var id_user_online = $('.user-posts-post').attr("id");
        var check = data.check;
        var likeposts = data.like_post;
        var check_like = "false";
        for (var i = 0; i < likeposts.length; i++) {
            if (id_user_online == likeposts[i].id_user) {
                check_like = "true";
                break;
            }
        }

        if (id_user_online == null) {
            if (like > 0) {
                var element = `
                                <div class="row">
                                    <div class="col-sm-12" >
                                        <p>
                                            <i class="fa fa-heart" aria-hidden="true"></i>
                                            ` + like + ` người thích bài viết này
                                        </p>
                                    </div>                              
                                </div>
                            `;
            } else {
                var element = ``;
            }
        } else if (id_user_online != data.id_user) {
            if (check_like == "true" && like > 1) {
                var element = `
                                <div class="row">
                                    <div class="col-sm-12" >
                                        <p>
                                            <i class="fa fa-heart" aria-hidden="true"></i>
                                            ban va ` + (like - 1) + ` người thích bài viết này
                                        </p>
                                    </div>                              
                                </div>
                            `;
            } else if (check_like == "true" && like == 1) {
                var element = `
                                <div class="row">
                                    <div class="col-sm-12" >
                                        <p>
                                            <i class="fa fa-heart" aria-hidden="true"></i>
                                            ban thích bài viết này
                                        </p>
                                    </div>                              
                                </div>
                            `;
            } else if (check_like == "false" && like > 0) {
                var element = `
                                <div class="row">
                                    <div class="col-sm-12" >
                                        <p>
                                            <i class="fa fa-heart" aria-hidden="true"></i>
                                            ` + like + ` người thích bài viết này
                                        </p>
                                    </div>                              
                                </div>
                            `;
            } else {
                var element = ``;
            }

        } else {
            if (check == "true" && like > 1) {
                var element = `
                                <div class="row">
                                    <div class="col-sm-12" >
                                        <p>
                                            <i class="fa fa-heart" aria-hidden="true"></i>
                                            ban va ` + (like - 1) + ` người thích bài viết này
                                        </p>
                                    </div>                              
                                </div>
                            `;
            } else if (check == "true" && like == 1) {
                var element = `
                                <div class="row">
                                    <div class="col-sm-12" >
                                        <p>
                                            <i class="fa fa-heart" aria-hidden="true"></i>
                                            ban thích bài viết này
                                        </p>
                                    </div>                              
                                </div>
                            `;
            } else if (check == "false" && like > 0) {
                var element = `
                                <div class="row">
                                    <div class="col-sm-12" >
                                        <p>
                                            <i class="fa fa-heart" aria-hidden="true"></i>
                                            ` + like + ` người thích bài viết này
                                        </p>
                                    </div>                              
                                </div>
                            `;
            } else {
                var element = ``;
            }
        }




        $('#' + data.id_userpost + '-user-post-react').html(element);
    });
});