let bool1 = 1;
document.getElementById('btn-toggle').onclick = function(){
    if (bool1 % 2 == 1) {
        document.getElementById('sait_content').style.height = '20vw';
        bool1 ++;
    }
    else {
        document.getElementById('sait_content').style.height = '0';
        bool1 ++;
    }
}
// должен убирать в яндексе вынос видео в новое окно
document.querySelectorAll('video').forEach(v => { v.setAttribute('pip', 'false'); });