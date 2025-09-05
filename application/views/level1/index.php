<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Level 1 - Kuis Gizi Anak</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/level1.css'); ?>" />
</head>

<!-- ✅ Kirim base_url ke JS -->

<body data-base-url="<?= base_url(); ?>">


    <div class="quiz-container shadow-lg bg-white p-4 mt-4 rounded">

        <div class="text-center fw-bold fs-4 mb-3" id="quiz-counter">Level 1</div>

        <!-- ✅ Intruksi (tetap di atas gambar) -->
        <h5 class="text-center text-dark fw-bold mb-3" style="max-height: 200px;">
            Perhatikan gambar di bawah ini
        </h5>

        <!-- Soal & Gambar -->
        <img id="question-image" src="" alt="Ilustrasi soal" class="img-fluid d-block mx-auto mb-3" style="max-height: 200px;" />
        <h4 id="question-text" class="text-center mb-4"></h4>

        <!-- Opsi Jawaban -->
        <div id="answer-buttons" class="mb-3"></div>

        <!-- Tombol Berikutnya -->
        <button id="next-btn" class="btn btn-primary w-100 d-none">Berikutnya</button>
    </div>

    <!-- 🔊 Efek suara -->
    <audio id="correctSound" src="<?= base_url('assets/mp3/benar.mp3'); ?>" preload="auto"></audio>
    <audio id="wrongSound" src="<?= base_url('assets/mp3/salah.mp3'); ?>" preload="auto"></audio>
    <audio id="clickSound" src="<?= base_url('assets/mp3/click.mp3'); ?>" preload="auto"></audio>

    <!-- 🧠 Script Level -->
    <script src="<?= base_url('assets/js/level1.js'); ?>"></script>
</body>

</html>