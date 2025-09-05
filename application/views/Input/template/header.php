<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title><?= isset($title) ? $title : "Aplikasi Kuis"; ?></title>

    <!-- Bootstrap & Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <!-- CSS kamu -->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">

    <!-- Musik -->
    <audio id="game" loop>
        <source src="<?= base_url('assets/mp3/game.mp3'); ?>" type="audio/mpeg">
    </audio>
    <button class="music-toggle" id="musicBtn">
        <i class="fas fa-volume-up"></i>
    </button>
</head>

<body>