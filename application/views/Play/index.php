<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Halaman Utama Game Edukasi</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/play.css'); ?>" />
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

    <!-- Konten -->
    <div class="container">
        <h1>🎮 Game Edukasi Interaktif Gizi</h1>
        <form method="post" action="<?= site_url('Play/mulai'); ?>">
            <button type="submit" class="play-button"><i class="fas fa-play"></i></button>
        </form>
    </div>

    <script src="<?= base_url('assets/js/play.js'); ?>"></script>
</body>

</html>