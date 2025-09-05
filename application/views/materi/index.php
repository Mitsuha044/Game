<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Materi Makanan Bergizi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/materi.css'); ?>">
</head>


<body>
    <!-- Musik tanpa muted -->
    <audio id="game" loop>
        <source src="<?= base_url('assets/mp3/game.mp3'); ?>" type="audio/mpeg">
    </audio>

    <!-- Tombol Musik ON/OFF -->
    <button class="music-toggle" id="musicBtn">
        <i class="fas fa-volume-up"></i>
    </button>
    <?php
    $nama  = $this->session->userdata('nama');
    $kelas = $this->session->userdata('kelas');
    ?>
    <section class="judul">
        <div class="container">
            <h1>Materi Makanan Bergizi</h1>
            <p>Kenali makanan sehat dan kandungan gizinya!</p>
            <div class="info-pemain">
                <p><strong> Nama:</strong> <?= $nama; ?></p>
                <p><strong> Kelas:</strong> <?= $kelas; ?></p>
            </div>

        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="row gy-4">
                <!-- Susu -->
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100">
                        <img src="<?= base_url('assets/img/milk.png'); ?>" class="card-img-top" alt="Susu">
                        <div class="card-body">
                            <h5 class="card-title">🥛 Susu</h5>
                            <p class="card-text">Susu penting untuk tulang dan gigi. Minumlah setiap hari agar tubuh
                                kuat!</p>
                            <ul class="gizi-list">
                                <li>💪 Protein: 6.8 gram</li>
                                <li>🦴 Kalsium: 125 mg</li>
                                <li>⚡ Energi: 61 kalori</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- tempe -->
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100">
                        <img src="<?= base_url('assets/img/tempe.png'); ?>" class="card-img-top" alt="Tempe">
                        <div class="card-body">
                            <h5 class="card-title">🍽️ Tempe</h5>
                            <p class="card-text">Tempe terbuat dari kedelai. Kaya protein dan baik untuk pertumbuhan
                                otot.</p>
                            <ul class="gizi-list">
                                <li>💪 Protein: 19 gram</li>
                                <li>🦴 Kalsium: 111 mg</li>
                                <li>⚡ Energi: 193 kalori</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Tahu -->
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100">
                        <img src="<?= base_url('assets/img/tofu.png'); ?>" class="card-img-top" alt="Tahu">
                        <div class="card-body">
                            <h5 class="card-title">🍽️ Tahu</h5>
                            <p class="card-text">Tahu lembut dan bergizi. Cocok untuk semua anak dan mudah dimasak!</p>
                            <ul class="gizi-list">
                                <li>💪 Protein: 8.1 gram</li>
                                <li>🦴 Kalsium: 111 mg</li>
                                <li>⚡ Energi: 76 kalori</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Daging ikan -->
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100">
                        <img src="<?= base_url('assets/img/fish.png'); ?>" class="card-img-top" alt="Ikan">
                        <div class="card-body">
                            <h5 class="card-title">🐟 Daging Ikan</h5>
                            <p class="card-text">Ikan bagus untuk otak karena mengandung omega-3 dan protein tinggi.</p>
                            <ul class="gizi-list">
                                <li>💪 Protein: 20 gram</li>
                                <li>🦴 Kalsium: 20 mg</li>
                                <li>⚡ Energi: 175 kalori</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Daging sapi -->
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100">
                        <img src="<?= base_url('assets/img/Sapi-removebg-preview.png'); ?>" class="card-img-top" alt="Daging sapi">
                        <div class="card-body">
                            <h5 class="card-title">🥩 Daging Sapi</h5>
                            <p class="card-text">Daging sapi kaya protein dan zat besi. Memberikan energi dan kekuatan!
                            </p>
                            <ul class="gizi-list">
                                <li>💪 Protein: 26 gram</li>
                                <li>🦴 Kalsium: 11 mg</li>
                                <li>⚡ Energi: 250 kalori</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Nasi Putih -->
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100">
                        <img src="<?= base_url('assets/img/nasi.jpg'); ?>" class="card-img-top" alt="Nasi">
                        <div class="card-body">
                            <h5 class="card-title"> Nasi Putih</h5>
                            <p class="card-text">🍚 Nasi putih sumber karbohidrat. Memberikan energi supaya kuat beraktivitas.</p>
                            <ul class="gizi-list">
                                <li>💪 Protein: 2.7 gram</li>
                                <li>🦴 Karbohidrat: 28g</li>
                                <li>⚡ Energi: 130 kalori</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Brokoli -->
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100">
                        <img src="<?= base_url('assets/img/broccoli.png'); ?>" class="card-img-top" alt="Brokoli">
                        <div class="card-body">
                            <h5 class="card-title">🥦 Brokoli</h5>
                            <p class="card-text">Brokoli berwarna hijau dan penuh vitamin. Cocok untuk menjaga kesehatan
                                tubuh!</p>
                            <ul class="gizi-list">
                                <li>💪 Protein: 2.8 gram</li>
                                <li>🦴 Kalsium: 47 mg</li>
                                <li>⚡ Energi: 34 kalori</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Telur -->
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100">
                        <img src="<?= base_url('assets/img/fried-egg.png'); ?>" class="card-img-top" alt="Telur">
                        <div class="card-body">
                            <h5 class="card-title">🥚Telur</h5>
                            <p class="card-text">Telur mengandung protein tinggi dan baik untuk pertumbuhan anak-anak.
                            </p>
                            <ul class="gizi-list">
                                <li>💪 Protein: 13 gram</li>
                                <li>🦴 Kalsium: 56 mg</li>
                                <li>⚡ Energi: 155 kalori</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Telur -->
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100">
                        <img src="<?= base_url('assets/img/chicken-leg.png'); ?>" class="card-img-top" alt="Daging ayam">
                        <div class="card-body">
                            <h5 class="card-title">🍗 Ayam</h5>
                            <p class="card-text">Daging ayam adalah sumber protein yang mudah dicerna dan enak dimasak.
                            </p>
                            <ul class="gizi-list">
                                <li>💪 Protein: 27 gram</li>
                                <li>🦴 Kalsium: 15 mg</li>
                                <li>⚡ Energi: 239 kalori</li>
                            </ul>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>

    <footer>
        <a href="<?= base_url('menu'); ?>" class="btn btn-soal">🎯 Lanjut ke Soal</a>
    </footer>
    <script src="<?= base_url('assets/js/materi.js'); ?>"></script>

</body>

</html>