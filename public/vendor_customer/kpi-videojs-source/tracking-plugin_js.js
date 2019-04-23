/**
 * @ Phat Nguyen
 * @ github: https://github.com/PhatBK
 */
(function (global, factory) {
	typeof exports === 'object' && typeof module !== 'undefined' ? module.exports = factory(require('video.js')) :
	typeof define === 'function' && define.amd ? define(['video.js'], factory) :
	(global.videojsEventTracking = factory(global.videojs));
}(this, (function (videojs) { 'use strict';

videojs = 'default' in videojs ? videojs['default'] : videojs;

var version = "0.9.9";
// tất cả các event của html DOM
var EVENT_LABELS = {
    'abort': 'abort',
    'emptied': 'emptied',
    'ended': 'ended',
    'error': 'error',
    'interruptbegin': 'interruptbegin',
    'interruptend': 'interruptend',
    'loadeddata': 'loadeddata',
    'loadedmetadata': 'loadedmetadata',
    'loadstart': 'loadstart',
    'load': 'load',
    'loadend': 'loadend',
    'mozaudioavailable': 'mozaudioavailable',
    'pause': 'pause',
    'play': 'play',
    'playing': 'playing',
    'progress': 'progress',
    'ratechange': 'ratechange', // sự kiện xảy ra khi tốc độ phát của media thay đổi
    'seeked': 'seeked',
    'seeking': 'seeking',
    'timeupdate': 'timeupdate',
    'volumechange': 'volumechange',
    'waiting': 'waiting', // sự kiện xảy ra khi tạm dừng để đệm thêm dữ liệu
    'durationchange': 'durationchange',
    'stalled': 'stalled', // sự kiện xảy ra khi trình duyệt đang cố gắng tìm và nạp dữ liệu nhưng không có
    'suspend': 'suspend', // sự kiện xảy ra khi trình duyệt cố tình không tải dữ liệu
};
// theo dõi sự kiện đệm video
var BufferTracking = function BufferTracking(config) {
    var _this = this;

    var timer = null;
    var scrubbing = false;
    var bufferPosition = false;
    var bufferStart = false;
    var bufferEnd = false;
    var bufferCount = 0;
    var readyState = false;

    var watchedTime = 0;
    var count_bufferTimeOver3s = 0;
    
    // Tốc độ mạng và chất lượng video
    // var bitrateNetwork = 0;
    // var resolution = null;

    var reset = function reset() {
      if (timer) {
        clearTimeout(timer);
      }
      scrubbing = false;
      bufferPosition = false;
      bufferStart = false;
      bufferEnd = false;
      bufferCount = 0;
      readyState = false;

      watchedTime = 0;

    };
    
    var onPause = function onPause() {
      bufferStart = false;
      if (_this.scrubbing()) {
        scrubbing = true;
        timer = setTimeout(function () {
          scrubbing = false;
        }, 200);
      }
    };
    // Player đang chờ để play video
    var onPlayerWaiting = function onPlayerWaiting() {
      if (bufferStart === false && scrubbing === false && _this.currentTime() > 0) {
        bufferStart = new Date();
        bufferPosition = +_this.currentTime().toFixed(0);
        readyState = +_this.readyState();
      }
    };
    // Player bắt đầu play lại video sau khi buffer
    var onTimeupdate = function onTimeupdate() {

      var curTime = +_this.currentTime().toFixed(0);

      if (bufferStart && curTime !== bufferPosition) {
        bufferEnd = new Date();

        var secondsToLoad = (bufferEnd - bufferStart) / 1000;
        secondsToLoad.toFixed(3);

        if (secondsToLoad > 3) {
          count_bufferTimeOver3s++;
        }

        bufferStart = false;
        bufferPosition = false;
        bufferCount++;
        // kích hoạt sự kiện và lưu lại dữ liệu
        _this.trigger('tracking:buffered', {
          currentTime: +curTime,
          readyState: +readyState,
          secondsToLoad: +secondsToLoad.toFixed(3),
          bufferCount: +bufferCount,
          watchedTime: +watchedTime,
          count_bufferTimeOver3s: +count_bufferTimeOver3s,

          // bitrateNetwork: bitrateNetwork,
          // resolution: resolution,
        });
      }
    };
    // theo dõi tốc độ mạng, độ phân giải
    // player.on('tracking:resolution', function(e, data) {
    //   bitrateNetwork = data.bitrateNetwork;
    //   resolution = '"' + data.videoWidth + 'x' + data.videoHeigth + '"';
    // });
    player.on('tracking:watched-time', function(e, data) {
        watchedTime = data.watchedTime;
    });
    // Lắng nghe các sự kiện, kích hoạt sự kiện đã được định nghĩa
    this.on('dispose', reset);
    this.on('loadstart', reset);
    this.on('ended', reset);
    this.on('pause', onPause);
    this.on('waiting', onPlayerWaiting);
    this.on('timeupdate', onTimeupdate);
  
};
// theo dõi sự kiện người dùng pause
var PauseTracking = function PauseTracking(config) {
    var player = this;
    var pauseCount = 0;
    var timer = null;
    var locked = false;
    var watchedTime = 0;
    var reset = function reset(e) {
      if (timer) {
        clearTimeout(timer);
      }
      pauseCount = 0;
      locked = false;
      watchedTime = 0;
    };

    player.on('dispose', reset);
    player.on('loadstart', reset);
    player.on('ended', reset);
    player.on('pause', function () {
      if (player.scrubbing() || locked) {
        return;
      }

      timer = setTimeout(function () {
        var currentTime = player.currentTime().toFixed(0);
        pauseCount++;
        player.trigger('tracking:pause', { pauseCount: pauseCount, currentTime: currentTime, watchedTime: watchedTime });
      }, 300);
    });

    player.on('tracking:watched-time', function(e, data) {
        watchedTime = data.watchedTime;
    });
};
// theo dõi người người dùng khi xem qua các phần tư của video
var PercentileTracking = function PercentileTracking(config) {
    var player = this;
    var first = false;
    var second = false;
    var third = false;
    var duration = 0;
    var pauseCount = 0;
    var seekCount = 0;

    var reset = function reset(e) {
      first = false;
      second = false;
      third = false;
      duration = 0;
      pauseCount = 0;
      seekCount = 0;
    };

    var incPause = function incPause() {
      return pauseCount++;
    };
    var incSeek = function incSeek() {
      return seekCount++;
    };

    player.on('dispose', reset);
    player.on('loadstart', reset);
    player.on('tracking:pause', incPause);
    player.on('tracking:seek', incSeek);

    player.on('timeupdate', function () {
      var curTime = +player.currentTime().toFixed(0);
      var data = {
        seekCount: seekCount,
        pauseCount: pauseCount,
        currentTime: curTime,
        duration: duration
      };

      switch (curTime) {
        case first:
          first = false;
          player.trigger('tracking:first-quarter', data);
          break;
        case second:
          second = false;
          player.trigger('tracking:second-quarter', data);
          break;
        case third:
          third = false;
          player.trigger('tracking:third-quarter', data);
          break;
      }
    });

    player.on('ended', function () {
      var data = {
        seekCount: seekCount,
        pauseCount: pauseCount,
        currentTime: duration,
        duration: duration
      };

      player.trigger('tracking:fourth-quarter', data);
    });

    player.on('durationchange', function () {
      duration = +player.duration().toFixed(0);
      if (duration > 0) {
        var quarter = (duration / 4).toFixed(0);

        first = +quarter;
        second = +quarter * 2;
        third = +quarter * 3;
      }
    });
};
// theo dõi thay đổi độ phân giả video, chất lượng mạng
// var ResolutionsTracking = function() {
//     var player = this;
//     var videoWidth = null;
//     var videoHeigth = null;
//     var resolutionChangeCount = 0;
//     var bitrateNetwork = null;
//     var connectionType = null;

//     var reset = function reset() {
//       videoWidth = null;
//       videoHeigth = null;
//       resolutionChangeCount = 0;
//       bitrateNetwork = null;
//       connectionType = null;
//     };
//     // lấy đối tượng api network của chrome
//     var connection = navigator.connection || navigator.mozConnection || navigator.webkitConnection;
//     var type = navigator.connection.effectiveType || navigator.connection.type;
//     bitrateNetwork = connection.downlink;
//     connectionType = type;
//     function updateConnectionStatus() {
//       bitrateNetwork = connection.downlink;
//       connectionType = type;
//     };
//     connection.addEventListener('change', updateConnectionStatus);

//     player.on('dispose', reset);
//     player.on('loadstart', reset);
//     player.on('ended', reset);
//     player.on('error', reset);

//     player.on('suspend', function() {
//         resolutionChangeCount++;
//         videoWidth = player.videoWidth();
//         videoHeigth = player.videoHeight();
//         bitrateNetwork = navigator.connection.downlink;
        
//         player.trigger('tracking:resolution', {
//             videoWidth: videoWidth,
//             videoHeigth: videoHeigth,
//             resolutionChangeCount: resolutionChangeCount,
//             bitrateNetwork: bitrateNetwork,
//             connectionType: connectionType,
//         });
//     });
// };
// theo dõi các lỗi xảy ra
var ErrorTracking = function ErrorTracking(config) {
    var MEDIA_ERRORS = [
      'MEDIA_ERR_CUSTOM',
      'MEDIA_ERR_ABORTED',
      'MEDIA_ERR_NETWORK',
      'MEDIA_ERR_DECODE',
      'MEDIA_ERR_SRC_NOT_SUPPORTED',
      'MEDIA_ERR_ENCRYPTED'
    ];

    player.on('error', function() {
      var error_code = player.error().code;
      var error_message = player.error().message;
      var error_type = null;
      for (var i = 0; i < MEDIA_ERRORS.length; i++) {
          if (error_code === i) {
              error_type = MEDIA_ERRORS[i];
          }
      }
      var data = {
          'error_code': error_code,
          'error_type' : error_type,
          'error_message': error_message,
      }
      player.trigger('tracking:error', data);
    });
};
// theo dõi tổng hợp các tham số khi người dungfxem hết video hoặc load lại video hoặc xem video khác
var PerformanceTracking = function PerformanceTracking(config) {

    if (typeof config === 'undefined' || typeof config.performance !== 'function') {
      return;
    }

    var player = this;
    var seekCount = 0;
    var pauseCount = 0;
    var bufferCount = 0;
    var totalDuration = 0;
    var watchedDuration = 0;
    var bufferDuration = 0;
    var initialLoadTime = 0;
    var timestamps = [];
    var suspendCount = 0;
    
    // tốc độ, chất lượng video

    var reset = function reset() {
      seekCount = 0;
      pauseCount = 0;
      bufferCount = 0;
      totalDuration = 0;
      watchedDuration = 0;
      bufferDuration = 0;
      initialLoadTime = 0;
      timestamps = [];
      suspendCount = 0;
    };

    var trigger = function trigger() {
      var data = {
        pauseCount: pauseCount,
        seekCount: seekCount,
        bufferCount: bufferCount,
        totalDuration: totalDuration,
        watchedDuration: watchedDuration,
        bufferDuration: bufferDuration,
        initialLoadTime: initialLoadTime,
        suspendCount: suspendCount,
      };
      config.performance.call(player, data);
    };

    var triggerAndReset = function triggerAndReset() {
        trigger();
        reset();
    };

    if (typeof window.addEventListener === 'function') {
      window.addEventListener('beforeunload', triggerAndReset);
      player.on('dispose', function () {
        window.removeEventListener('beforeunload', triggerAndReset);
      });
    }

    player.on('loadstart', function () {
      if (totalDuration > 0) {
        trigger();
      }
      reset();
    });
    player.on('ended', triggerAndReset);
    player.on('dispose', triggerAndReset);
    player.on('timeupdate', function () {
      var curTime = +player.currentTime().toFixed(0);

      if (timestamps.indexOf(curTime) < 0) {
          timestamps.push(curTime);
      }
      watchedDuration = timestamps.length;
    });
    player.on('loadedmetadata', function(e, data) {
        totalDuration = +player.duration().toFixed(0);
    })
    player.on('loadeddata', function (e, data) {
        totalDuration = +player.duration().toFixed(0);
    });
    player.on('tracking:seek', function (e, data) {
        seekCount = data.seekCount;
    });
    player.on('tracking:pause', function (e, data) {
        pauseCount = data.pauseCount;
    });
    player.on('tracking:buffered', function (e, data) {
        bufferCount = data.bufferCount;
        bufferDuration = +(bufferDuration + data.secondsToLoad).toFixed(3);
    });
    player.on('tracking:firstplay', function (e, data) {
        initialLoadTime = data.secondsToLoad;
    });
    player.on('tracking:suspend', function(e, data) {
        suspendCount = data.suspendCount;
    });
};
// theo dõi sự kiện play
var PlayTracking = function PlayTracking(config) {
    var _this = this;

    var firstplay = false;
    var loadstart = 0;
    var loadend = 0;
    var secondsToLoad = 0;

    var reset = function reset() {
      firstplay = false;
      loadstart = 0;
      loadend = 0;
      secondsToLoad = 0;
    };

    var onLoadStart = function onLoadStart() {
      reset();
      loadstart = new Date();
    };

    var onLoadedData = function onLoadedData() {
      loadend = new Date();
      secondsToLoad = (loadend - loadstart) / 1000;
    };

    var onPlaying = function onPlaying() {
      if (!firstplay) {
        firstplay = true;
        _this.trigger('tracking:firstplay', {
          secondsToLoad: +secondsToLoad.toFixed(3)
        });
      }
    };

    this.on('dispose', reset);
    this.on('loadstart', onLoadStart);
    this.on('loadeddata', onLoadedData);
    this.on('playing', onPlaying);
};
// theo dõi sự kiện seek
var SeekTracking = function SeekTracking(config) {
    var player = this;
    var seekCount = 0;
    var locked = true;
    var watchedTime = 0;
    var reset = function reset() {
      seekCount = 0;
      locked = true;
      watchedTime = 0;
    };

    player.on('dispose', reset);
    player.on('loadstart', reset);
    player.on('ended', reset);
    player.on('error', reset);
    player.on('play', function () {
      locked = false;
    });
    player.on('tracking:watched-time', function(e, data) {
        watchedTime = data.watchedTime;
    });
    player.on('pause', function () {
      if (locked || !player.scrubbing()) {
        return;
      }
      var curTime = +player.currentTime().toFixed(0);

      seekCount++;
      player.trigger('tracking:seek', {
        seekCount: +seekCount,
        seekTo: curTime,
        watchedTime: watchedTime,
      });
    });
};
// Tracking suspend count when video playing 
var SuspendTracking = function SuspendTracking(config) {
    var player = this;
    var suspendCount = 0;
    var timeUpdated = false;

    var reset = function reset() {
      suspendCount = 0;
      timeUpdated = false;
    };

    player.on('dispose', reset);
    player.on('loadstart', reset);
    player.on('ended', reset);
    player.on('error', reset);

    player.on('suspend', function() {
      if (player.scrubbing() || timeUpdated) {
          return;
      }
      suspendCount++;
      player.trigger('tracking:suspend', {
          suspendCount: suspendCount,
      });
    });
};
// theo dõi thời gian xem video của người dùng
var WatchedTimeTracking = function WatchedTimeTracking() {
    var watchedTime = 0;
    var timestamps = [];

    var reset = function reset() {
        watchedTime = 0;
        timestamps = [];
    };

    player.on('dispose', reset);
    player.on('loadstart', reset);
    player.on('ended', reset);
    player.on('error', reset);

    player.on('timeupdate', function() {
      var curTime = +player.currentTime().toFixed(0);

      if (timestamps.indexOf(curTime) < 0) {
          timestamps.push(curTime);
      }
      watchedTime = timestamps.length;
      player.trigger('tracking:watched-time', {
          watchedTime: watchedTime.toFixed(3),
      })
    });
};
/**
 * bắt đầu khi sự kiện: wait được kích hoạt
 * sau một thời gian cố định, check xem sự kiện: timeupdate có đang được kích hoạt hay không
 * nếu không chứng tỏ player đang chờ buffer quá lâu
 */
// theo dõi sự kiện buffer quá lâu hoặc vô hạn khiến player không thể play được
var BufferInfiniteTracking = function BufferInfiniteTracking(config) {
    var player = this;
    var timer = null;
    var positionBufferInfinite = null;
    var waitFlag = false;
    var timeUpdateFlas = false;
    var readyStateInfinite = null;
    var endBufferInfinite = false;
    var totalBufferTime = 0;
    var event = null;

    var reset = function reset() {
        if (timer) {
            clearTimeout(timer);
        }
        positionBufferInfinite = null;
        waitFlag = false;
        timeUpdateFlas = false;
        readyStateInfinite = false;
        endBufferInfinite = false;
    };

    var onTimeWaiting = function onTimeWaiting() {
        if (player.currentTime() > 0 && positionBufferInfinite === null) {
            positionBufferInfinite = player.currentTime();
            waitFlag = true;
            timeUpdateFlas = true;
            readyStateInfinite = player.readyState();
        }
    };
    var onTimeUpdateBegin = function onTimeUpdateBegin() {
        readyStateInfinite = player.readyState();
        endBufferInfinite = true;
        waitFlag = false;
        
    };
    var handleBufferInfinite = function handleBufferInfinite() {
      if (waitFlag) {
        timer = setInterval(function(){
            if (!endBufferInfinite) {
                totalBufferTime += 20;
                event = 'buffer-infinite';
                readyStateInfinite = player.readyState();
            }
          }, 20000);
      } else {
          clearInterval(timer);
      }
      
    };

    this.on('dispose', reset);
    this.on('loadstart', reset);
    this.on('ended', reset);
    // this.on('pause', onPause);
    this.on('waiting', onTimeWaiting);
    this.on('timeupdate', onTimeUpdateBegin);
    handleBufferInfinite();
    player.trigger('tracking:buffer-infinite', {
        readyStateInfinite: readyStateInfinite,
        totalBufferTime: totalBufferTime,
        event: event,
    });
};

// Đang ký plugin với videojs
var registerPlugin = videojs.registerPlugin || videojs.plugin;
var getPlugin = videojs.getPlugin || videojs.plugin;
// sử dụng các function để lấy dữ liệu từ các sự kiện
var eventTracking = function eventTracking(options) {

    PauseTracking.apply(this, arguments);
    BufferTracking.apply(this, arguments);
    PercentileTracking.apply(this, arguments);
    PlayTracking.apply(this, arguments);
    SeekTracking.apply(this, arguments);
    PerformanceTracking.apply(this, arguments);
    ErrorTracking.apply(this, arguments);
    SuspendTracking.apply(this, arguments);
    // ResolutionsTracking.apply(this, arguments);
    WatchedTimeTracking.apply(this, arguments);
    // FinishedPlayerTracking.apply(this, arguments);
    BufferInfiniteTracking.apply(this, arguments);

};
// check xem plugin đã được đăng ký chưa, nếu chưa thì mới đăng ký
if (typeof getPlugin('eventTracking') === 'undefined') {
    registerPlugin('eventTracking', eventTracking);
}

eventTracking.VERSION = version;

return eventTracking;

})));
