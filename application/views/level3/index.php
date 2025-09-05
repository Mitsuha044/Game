<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Level 3 - Kuis Gizi Anak</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/level3.css'); ?>">
</head>

<body data-base-url="<?= base_url(); ?>">

    <div class="quiz-container shadow-lg bg-white p-4 mt-4 rounded">

        <!-- level 3 -->
        <div class="quiz-counter" id="quiz-counter">Level 3</div>

        <!-- Intruksi -->
        <h5 class="text-center text-dark fw-bold mb-3" style="max-height: 200px;">
            Perhatikan gambar di bawah ini
        </h5>

        <!-- Gambar -->
        <img id="question-image" src="" alt="Ilustrasi soal" />

        <!-- Soal -->
        <h4 id="question-text" class="text-center"></h4>

        <!-- tombol -->
        <div id="answer-buttons" class="mt-3"></div>
        <button id="next-btn" class="btn btn-primary w-100 d-none">Berikutnya</button>

        <!-- Tombol selesai otomatis dari JS -->
        <form action="<?= base_url('level3/selesai'); ?>" method="post" id="form-selesai" class="mt-3 d-none">
            <input type="hidden" name="nilai" id="input-nilai">
            <input type="hidden" name="benar" id="input-benar">
            <input type="hidden" name="salah" id="input-salah">
        </form>
    </div>

    <!-- Efek suara -->
    <audio id="correctSound" src="<?= base_url('assets/mp3/benar.mp3'); ?>" preload="auto"></audio>
    <audio id="wrongSound" src="<?= base_url('assets/mp3/salah.mp3'); ?>" preload="auto"></audio>
    <audio id="clickSound" src="<?= base_url('assets/mp3/click.mp3'); ?>" preload="auto"></audio>

    <script src="<?= base_url('assets/js/level3.js'); ?>"></script>
</body>

</html>