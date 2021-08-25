addEventListener('load', cargaInicial());

function cargaInicial(){
    cargaVideo();
}

function cargaVideo(){
    var video = document.getElementById('crvideo');
    video.play(); video.muted = true; video.autoplay = true, video.loop = 1;
}