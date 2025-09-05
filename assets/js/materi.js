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


// let suaraID = null;

// function loadSuaraID() {
//     const suaraTersedia = window.speechSynthesis.getVoices();
//     suaraID = suaraTersedia.find(voice => voice.lang === 'id-ID');

//     if (!suaraID) {
//         console.warn("Bahasa Indonesia tidak ditemukan. Akan menggunakan default.");
//     }
// }

// window.speechSynthesis.onvoiceschanged = loadSuaraID;

// function bacaTeks(teks) {
//     const ucapan = new SpeechSynthesisUtterance(teks);
//     ucapan.lang = 'id-ID';
//     if (suaraID) ucapan.voice = suaraID;
//     speechSynthesis.speak(ucapan);
// }