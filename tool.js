/**
 * 获取video标签中duration（持续时间）的秒数或h:i:s格式的时间戳
 * @param time (duration)
 * @param result
 * @returns {*}
 */
function formatTime(time,result = 'str') {
    // time = Math.ceil(time)
    time = parseInt(time);
    var m = 0;
    var h = 0;
    var str = '';
    if (time > 60) {
        m = parseInt(time / 60);
        time = parseInt(time % 60);
        if (m > 60) {
            h = parseInt(m / 60);
            m = parseInt(m % 60);
        }
    }
    if(result === 'str'){
        str += parseInt(time) > 10 ? parseInt(time) : '0'+parseInt(time);
        str = (parseInt(m) > 10 ? parseInt(m) : '0' + parseInt(m)) + ':' + str;
        str = (parseInt(h) > 10 ? parseInt(h) : '0' + parseInt(h)) + ':' + str;
        return str
    }else{
        return parseInt(h) * 3600 + parseInt(m) * 60 + parseInt(time)
    }
}