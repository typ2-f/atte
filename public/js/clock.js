function set2fig(num) {
    // 桁数が1桁だったら先頭に0を加えて2桁に調整する
    var ret;
    if (num < 10) {
        ret = "0" + num;
    } else {
        ret = num;
    }
    return ret;
}
function showClock2() {
    const nowTime = new Date();
    const nowHour = set2fig(nowTime.getHours());
    const nowMin = set2fig(nowTime.getMinutes());
    const nowSec = set2fig(nowTime.getSeconds());
    const msg =
        "現在時刻は、" + nowHour + ":" + nowMin + ":" + nowSec + " です。";
    document.getElementById("RealtimeClockArea").innerHTML = msg;
}
setInterval("showClock2()", 1000);
