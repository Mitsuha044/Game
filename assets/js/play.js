// name.js
const music = document.getElementById("game");
const musicBtn = document.getElementById("musicBtn");

// Cek status musik saat halaman dimuat
window.addEventListener("load", () => {
    const isPlaying = localStorage.getItem("musicStatus") === "on";
    const currentTime = parseFloat(localStorage.getItem("musicTime")) || 0;

    music.currentTime = currentTime;

    if (isPlaying) {
        music.play();
        musicBtn.innerHTML = '<i class="fas fa-volume-up"></i>';
    } else {
        music.pause();
        musicBtn.innerHTML = '<i class="fas fa-volume-mute"></i>';
    }
});

// Simpan waktu setiap detik
setInterval(() => {
    if (!music.paused) {
        localStorage.setItem("musicTime", music.currentTime);
    }
}, 1000);

// Tombol toggle musik
musicBtn.addEventListener("click", () => {
    if (music.paused) {
        music.play();
        musicBtn.innerHTML = '<i class="fas fa-volume-up"></i>';
        localStorage.setItem("musicStatus", "on");
    } else {
        music.pause();
        musicBtn.innerHTML = '<i class="fas fa-volume-mute"></i>';
        localStorage.setItem("musicStatus", "off");
    }
});
