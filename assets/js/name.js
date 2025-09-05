// Fungsi untuk lanjut ke menu
function lanjutMateri() {
    const nama = document.getElementById("nama").value.trim();
    const kelas = document.getElementById("kelas").value.trim();

    if (!nama || !kelas) {
        alert("Mohon isi semua data terlebih dahulu.");
        return;
    }

    localStorage.setItem("nama", nama);
    localStorage.setItem("kelas", kelas);

    window.location.href = "../menu/menu.html";
}

