document.addEventListener("DOMContentLoaded", function () {
    const music = document.getElementById("game");
    const musicBtn = document.getElementById("musicBtn");

    // Coba unmute dan play (browser mungkin blokir)
    let isPlaying = true;
    music.muted = false;
    const playAttempt = music.play();
    if (playAttempt !== undefined) {
        playAttempt.then(() => {
            isPlaying = true;
            musicBtn.innerHTML = '<i class="fas fa-volume-up"></i>';
        }).catch(() => {
            isPlaying = false;
            musicBtn.innerHTML = '<i class="fas fa-volume-mute"></i>';
        });
    }

    // Toggle musik
    musicBtn.addEventListener("click", function () {
        if (isPlaying) {
            music.pause();
            musicBtn.innerHTML = '<i class="fas fa-volume-mute"></i>';
        } else {
            music.play();
            musicBtn.innerHTML = '<i class="fas fa-volume-up"></i>';
        }
        isPlaying = !isPlaying;
    });
});
