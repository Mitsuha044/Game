<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Level 4 - Tahu & Tempe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/level4.css'); ?>">
</head>

<body data-base-url="<?= base_url(); ?>">

    <div class="quiz-container shadow-lg bg-white p-4 mt-4 rounded">

        <div class="quiz-counter text-center fw-bold fs-4 mb-3">Level 4</div>

        <h5 class="text-center text-dark fw-bold mb-3">
            Perhatikan kandungan gizi, lalu pilih jawaban yang benar
        </h5>

        <img id="question-image" src="" alt="Ilustrasi soal" class="img-fluid d-block mx-auto mb-3" style="max-height: 200px;">
        <h4 id="question-text" class="text-center mb-4"></h4>

        <div id="answer-buttons" class="mb-3"></div>

        <button id="next-btn" class="btn btn-primary w-100 d-none">Berikutnya</button>

        <form action="<?= base_url('level4/selesai'); ?>" method="post" id="form-selesai" class="d-none">
            <input type="hidden" name="nilai" id="input-nilai">
            <input type="hidden" name="benar" id="input-benar">
            <input type="hidden" name="salah" id="input-salah">
        </form>
    </div>

    <audio id="correctSound" src="<?= base_url('assets/mp3/benar.mp3'); ?>" preload="auto"></audio>
    <audio id="wrongSound" src="<?= base_url('assets/mp3/salah.mp3'); ?>" preload="auto"></audio>
    <audio id="clickSound" src="<?= base_url('assets/mp3/click.mp3'); ?>" preload="auto"></audio>

    <script src="<?= base_url('assets/js/level4.js'); ?>"></script>
</body>

</html>