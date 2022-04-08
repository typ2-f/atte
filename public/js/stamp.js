//毎秒checkTImeを実行->深夜12時0分0秒ならresetStasmpsを実行
setInterval('checkTime()', 1000);

function checkTime() {
    const now = dayjs().format('HHmmss');
    if (now == '000000') {
        resetStamps();
    }
}

function resetStamps() {
    /**打刻ボタン4つを取得=[
     * atte_start,
     * atte_end,
     * rest_start,
     * rest_end
     * ]
     * の順
    */
    const stamps = document.getElementsByClassName('btn_stamp');
    console.log(stamps);

    //atte_startを活性にする
    stamps[0].removeAttribute('disabled');
    stamps[0].setAttribute('name', 'stamp_ok');

    //他3つを非活性にする
    for (let i = 1; i <= 3; i++) {
        stamps[i].setAttribute('disabled', 'true');
        stamps[i].setAttribute('name', 'stamp_ng');
    }
}
