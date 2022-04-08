setInterval('checkTime()', 1000);

function checkTime() {
    const now = dayjs().format('HHmmss');
    if (now == '152800') {
        resetStamps();
    } else {
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
    const stamps = document.getElementsByClassName('btn-stamp');
    console.log(stamps);

    //atte_startを活性にする
    stamps[0].removeAttribute('disabled');
    stamps[0].setAttribute('name', 'stamp-ok');

    //他3つを非活性にする
    for (let i = 1; i <= 3; i++) {
        stamps[i].setAttribute('disabled', 'true');
        stamps[i].setAttribute('name', 'stamp-ng');
    }
}
