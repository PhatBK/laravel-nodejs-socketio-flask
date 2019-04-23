function tracking_handler (player) {
    var ip_private = null;
    var ip_public = null;
    // sét thời gian tự động gửi dữ liệu
    var TIMEOUT = 20000;
    // định danh dich vụ lấy từ server
    var service_code = {
        'token': null,
    };
    // thông tin dịch vụ
    var serviceApp = {
        'name': 'FiveDMax',
        'type': 'web',
    };
    // thông tin server nhận logs
    var logging_host = {
        'host': 'http://171.255.192.86:80/web/all/event/log-datas',
        'getToken': 'http://171.255.192.86:80/api/util-service/call-service/help-me/token/web',
        // 'host': 'http://192.168.146.77:9999/web/all/event/log-datas',
        // 'getToken': 'http://192.168.146.77:9999/api/util-service/call-service/help-me/token/web',
    };
    // thông tin media đang xem bởi người dùng
    var media_infos = {
        'current_uri': window.location.pathname,
        'media_id': document.getElementById('media_id') == null ? null : document.getElementById('media_id').value,
        'media_category': document.getElementById('media_category') == null ? null : document.getElementById('media_category').value,
        'media_name': document.getElementById('media_name') == null ? null : document.getElementById('media_name').value,
        'media_duration': document.getElementById('media_duration') == null ? null : document.getElementById('media_duration').value,
    };



    var host = logging_host.host;
    var UserID = null;
    var user_agent = navigator.userAgent;
    var timer = null;
    var performanceFlag = false;
    var endedFlag = false;
    var backupObject = null;
    var errorSRC = null;
    // function utils
    function TimeNormalFormat(time) {
        var month  = time.getMonth() + 1;
        var day = time.getDate();
        var hour = time.getHours();
        var minute = time.getMinutes();
        var seconds = time.getSeconds();

        if (month < 10) {
            month = "0" + month;
        }
        if (day < 10) {
            day = "0" + day;
        }
        if (hour < 10) {
            hour = "0" + hour;
        }
        if (minute < 10) {
            minute = "0" + minute;
        }
        if (seconds < 10) {
            seconds = "0" + seconds;
        }
        var normal = time.getFullYear() + "-"
            + month + "-"
            + day + "T"
            + hour + ":"
            + minute + ":"
            + seconds + "Z";
        return normal;
    };
    function findCookie(cname) {
        var result = null;
        var allCookie = document.cookie.split(';');
        for (var i = 0; i < allCookie.length; i++) {
            if(allCookie[i].split('=')[0] === cname) {
                result = allCookie[i].split('=')[1];
            }
        }
        return result;
    };
    function checkUserID() {
        if (findCookie('user_id') === null) {
            var user_name = 'KenhHai' + Math.floor((Math.random() * 1000000) + 1);
            UserID = "00668800" + Math.floor(Math.random() * 1000000) + 1 +"5dmax_web_wap", document.cookie = "user_id= " + UserID + "; expires=Thu, 18 Dec 2025 12:00:00 UTC";
            document.cookie = "username=" + user_name + "; expires=Thu, 18 Dec 2025 12:00:00 UTC";
        } else {
            UserID = findCookie('user_id');
        }
    };
    // định nghĩa các trường dữ liệu gửi đi
    var dataLogs = {
        'mediaInfos': {
            'mediaID': media_infos.media_id,
            'mediaName': media_infos.media_name,
            'mediaCategory': media_infos.media_category,
            'mediaDuration': media_infos.media_duration,
        },
        'userID': '000000000000000000000000000_undefined',
        'ipPublic': ip_public,
        'ipPrivate': ip_private,
        'userAgent': navigator.userAgent || 'undefined',
        'time': TimeNormalFormat(new Date()) || 'undefined',
        'connectType': 'undefined',
        'bitrateNetwork': 0,
        'birateVideo': 0,

        'seekCount': 0,
        'pauseCount': 0,
        'bufferCount': 0,
        'suspendCount': 0,

        'initialLoadTime': 0,
        'watchedDuration': 0,
        'bufferDuration': 0,
        'currentTime': 0,
        'watchingTime': 0,

        'errorCode': -1,
        'errorMessage': 'undefined',
        'srcErrorCurrent': 'undefined',
        'status': 'undefined',
        'event': 'undefined',
        'bufferInfinite': false,
        'isCloseTab': false,
        'timeout': TIMEOUT,

        'count_bufferTimeOver3s': 0,
    };
    // reset lại tât cả các tham số
    function resetDataLogs() {

        dataLogs.seekCount = 0;
        dataLogs.pauseCount = 0;
        dataLogs.bufferCount = 0;
        dataLogs.suspendCount = 0;
        dataLogs.initialLoadTime = 0;
        dataLogs.watchedDuration = 0;
        dataLogs.bufferDuration = 0;
        dataLogs.currentTime = 0;
        dataLogs.watchingTime = 0;
        dataLogs.bitrateNetwork = 0;
        dataLogs.connectType = null;
        dataLogs.timeout = 0;
        dataLogs.errorCode = -1;
        dataLogs.errorMessage = null;
        dataLogs.isCloseTab = false;
        dataLogs.event = null;

        dataLogs.birateVideo = 0;
        dataLogs.srcErrorCurrent = null;
        dataLogs.count_bufferTimeOver3s = 0;

    };
    // check cookie của user xem userID đã tồn tại hay chưa
    checkUserID();
    // new function send data log for nodejs server
    var newAjaxSendDataNodejs = function newAjaxSendDataNodejs(url, data) {
        // console.log('AJAX sended...');
        // console.log(TimeNormalFormat(new Date()));
        // console.log(data);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'service_token': service_code.token,
            }
        });
        $.ajax({
            url: url,
            type: "POST",
            contentType: "application/json",
            data: JSON.stringify(data),
            dataType: "json",
            cache: false,
            success : function(response) {
                // console.log(response);
            },
            // error : function(error) {
            //     //console.log(error);
            // }
        });
    };
    // lấy service_token khi mà người dùng click vào xem một phim/video
    window.onload = function(event) {
        if (service_code.token === null) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                }
            });
            $.ajax({
                url: logging_host.getToken,
                type: "POST",
                contentType: "application/json",
                data: JSON.stringify({
                    'request': 'token',
                    'type': serviceApp.type,
                    'service': serviceApp.name,
                }),
                dataType: "json",
                cache: false,
                success : function(response) {
                    service_code.token = response.token;
                    // console.log('service token reciveced...');
                },
                // error : function(error) {
                //
                // }
            });
        } else {
            // console.log('Service Token Already...');
        }
    };
    // lưu dữ liệu xuống local stogre của người dùng khi mất internet
    function backupDataFunction (source, callback) {
        callback = Object.assign({}, source);
        if (typeof(Storage) !== "undefined") {
            localStorage.setItem("beforeData", JSON.stringify(callback));
            // console.log('Saved data to local storge html5');
        } else {
            // console.log('Not saved data');
        }
        return callback;
    };
    var finalSendData = function finalSendData(event) {
        var url = logging_host.host;
        dataLogs.status = 'success';
        dataLogs.event = event;
        newAjaxSendDataNodejs(url, dataLogs);
        clearInterval(timer);
        resetDataLogs();
    };
    // get total duration of media element

    player.on('loadedmetadata', function() {
        if (media_infos.media_duration == '' || media_infos.media_duration == null || media_infos.media_duration == undefined) {
            media_infos.media_duration = parseInt(player.duration().toFixed(0));
            dataLogs.mediaInfos.mediaDuration = parseInt(player.duration().toFixed(0));
        } else {
            dataLogs.mediaInfos.mediaDuration = parseInt(media_infos.media_duration);
        }
        dataLogs.mediaInfos.mediaID = media_infos.media_id;
        dataLogs.mediaInfos.mediaName = media_infos.media_name;
        dataLogs.mediaInfos.mediaCategory = media_infos.media_category;

        dataLogs.event = "loaded_metadata";
        dataLogs.status = "unsuccess";

        dataLogs.bitrateNetwork = player.tech_.hls.bandwidth;
        dataLogs.birateVideo = player.tech_.hls.options_.bandwidth;

        if (navigator.connection.effectiveType !== undefined) {
            dataLogs.connectType = navigator.connection.effectiveType;
        }
        if (player.duration() < 300) {
            TIMEOUT = 10000;
            dataLogs.timeout = 10000;
        } else if (player.duration() < 3600) {
            TIMEOUT = 20000;
            dataLogs.timeout = 20000;
        } else if (player.duration() < 10800) {
            TIMEOUT = 60000;
            dataLogs.timeout  = 60000;
        } else {
            TIMEOUT = 300000;
            dataLogs.timeout = 300000;
        }
        // console.log(parseInt(player.tech_.hls.mediaSource.duration_.toFixed(0)));
    });
    player.eventTracking({
        performance: function(data) {
            dataLogs.pauseCount = data.pauseCount;
            dataLogs.seekCount = data.seekCount;
            dataLogs.bufferCount = data.bufferCount;
            dataLogs.suspendCount = data.suspendCount;
            dataLogs.initialLoadTime = data.initialLoadTime;
            dataLogs.bufferDuration = data.bufferDuration;
            dataLogs.watchedDuration = data.watchedDuration;

            performanceFlag = true;
            dataLogs.status = 'success';
            dataLogs.event = 'performance';
            dataLogs.time = TimeNormalFormat(new Date());
        }
    });
    player.on('tracking:firstplay', function(e, data) {
        if (findCookie('user_id') === null) {
            var user_name = 'KenhHai' + Math.floor((Math.random() * 1000000) + 1);
            UserID = "8866phatnh" + Math.floor(Math.random() * 1000000) + 1 + "kenh_hai_web";
            document.cookie = "user_id= " + UserID + "; expires=Thu, 18 Dec 2020 12:00:00 UTC";
            document.cookie = "username=" + user_name + "; expires=Thu, 18 Dec 2020 12:00:00 UTC";
        } else {
            UserID = findCookie('user_id');
        }
        dataLogs.userID = UserID;
        dataLogs.initialLoadTime = data.secondsToLoad;
        dataLogs.ipPrivate = ip_private;
        dataLogs.ipPublic = ip_public;
        dataLogs.userAgent = user_agent;
        dataLogs.event = "first-play";
        dataLogs.status = 'unsuccess';
    });
    player.on('tracking:seek', function(e, data) {
        dataLogs.seekCount = data.seekCount;
        dataLogs.watchingTime = parseFloat(data.watchedTime);
        dataLogs.watchedDuration = parseFloat(data.watchedTime);
        dataLogs.event = 'seeking';
        dataLogs.status = 'unsuccess';
    });
    player.on('tracking:performance', function(e, data) {
        dataLogs.pauseCount = data.pauseCount;
        dataLogs.seekCount = data.seekCount;
        dataLogs.bufferCount = data.bufferCount;
        dataLogs.suspendCount = data.suspendCount;
        dataLogs.initialLoadTime = data.initialLoadTime;
        dataLogs.bufferDuration = data.bufferDuration.toFixed(3);
        dataLogs.watchedDuration = data.watchedDuration;
        performanceFlag = true;
        dataLogs.status = 'success';
        dataLogs.event = 'performance';
    });
    player.on('tracking:buffered', function(e, data) {
        dataLogs.currentTime =  parseInt(data.currentTime);
        dataLogs.bufferDuration += (+data.secondsToLoad.toFixed(3));
        dataLogs.bufferCount =  parseInt(data.bufferCount);
        dataLogs.watchingTime = parseFloat(data.watchedTime);
        dataLogs.watchedDuration = parseFloat(data.watchedTime);
        dataLogs.count_bufferTimeOver3s = parseInt(data.count_bufferTimeOver3s);
        dataLogs.event = 'buffered';
        dataLogs.status = 'unsuccess';
    });
    player.on('tracking:suspend', function(e, data) {
        dataLogs.suspendCount = data.suspendCount;
        dataLogs.event = 'suspend';
        dataLogs.status = 'unsuccess';
    });
    player.on('tracking:pause', function(e, data) {
        dataLogs.pauseCount = data.pauseCount;
        dataLogs.watchingTime = parseFloat(data.watchedTime);
        dataLogs.watchedDuration = parseFloat(data.watchedTime);
        dataLogs.event = 'pause';
        dataLogs.status = 'unsuccess';
    });
    player.on('tracking:buffer-infinite', function(e, data) {
        dataLogs.event = 'buffer-infinite';
        dataLogs.status = 'success';
        // console.log(data);
    });
    player.on('play', function() {
        player.on('tracking:watched-time', function(e, data) {
            dataLogs.watchingTime = parseFloat(data.watchedTime);
            dataLogs.watchedDuration = parseFloat(data.watchedTime);
        });
        timer = window.setInterval(function() {
            player.on('tracking:watched-time', function(e, data) {
                dataLogs.watchingTime = parseFloat(data.watchedTime);
                dataLogs.watchedDuration = parseFloat(data.watchedTime);
            });
            player.on('tracking:buffered', function(e, data) {
                dataLogs.bufferCount = data.bufferCount;
                dataLogs.bufferDuration += (+data.secondsToLoad.toFixed(3));
            });

            dataLogs.time = TimeNormalFormat(new Date());
            var url = logging_host.host;
            newAjaxSendDataNodejs(url, dataLogs);
            dataLogs.status = null || 'undefined';
            dataLogs.event = null || 'undefined';
        }, TIMEOUT);

        // console.log('Set Timer Object when player play...');
    });
    player.on('pause', function() {
        dataLogs.status = 'unsuccess';
        dataLogs.event = 'pause';
        clearInterval(timer);
        // console.log("Clear Timer Object when player Pause...");
    });
    player.on('ended', function() {
        if (performanceFlag) {
            clearInterval(timer);
            var url = logging_host.host;
            dataLogs.status = 'success';
            dataLogs.event = 'ended';
            dataLogs.time = TimeNormalFormat(new Date());
            newAjaxSendDataNodejs(url, dataLogs);
            clearInterval(timer);
            resetDataLogs();
            // console.log('Destroy Send Data...');
        }
        endedFlag = true;
    });
    player.on('dispose', function() {
        dataLogs.status = 'success';
        dataLogs.event = 'dispose';
        newAjaxSendDataNodejs(url, dataLogs);
        clearInterval(timer);
        resetDataLogs();
    });
    player.on('stalled ', function(data) {
        var url = logging_host.host;
        dataLogs.status = 'success';
        dataLogs.event = 'stalled';
        newAjaxSendDataNodejs(url, dataLogs);
        clearInterval(timer);
        resetDataLogs();
    });
    player.on('tracking:error', function(e, data) {
        dataLogs.errorCode = data.error_code;
        dataLogs.errorMessage = data.error_message;
        dataLogs.status = 'success';
        dataLogs.event = 'error';
        dataLogs.srcErrorCurrent = errorSRC;
        var url = logging_host.host;
        newAjaxSendDataNodejs(url, dataLogs);
        resetDataLogs();

        clearInterval(timer);
        clearInterval(videoHandle);
        //
        // console.log('Player error...');
        // console.log(player.tech_.hls);
    });
    player.on('waiting', function() {
        dataLogs.event = 'waiting';
        dataLogs.status = 'unsuccess';
        errorSRC = player.tech_.hls.source_.src;
    });
    // bắt sự kiện load trang hoặc đóng trình duyệt
    var areYouReallySure = false;
    function closeTabBefore() {
        clearInterval(timer);
        if(allowPrompt){
            if (!areYouReallySure && true && !endedFlag) {
                dataLogs.isCloseTab = true;
                var event = 'beforeunload' || 'closeTab';
                finalSendData(event);
                resetDataLogs();
                areYouReallySure = true;
            }
        }else{
            allowPrompt = true;
        }
    }
    var allowPrompt = true;
    window.onbeforeunload = closeTabBefore;
}
