<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kuis Nilai Gizi</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/menu.css'); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
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

    <div class="container">
        <h1 class="title text-center mt-4">🎮Kuis Nilai Gizi</h1>

        <?php
        // Ambil progres dari session (default = 1)
        $progress = $this->session->userdata('level_progress') ?? 1;
        ?>

        <div class="row justify-content-center mt-5 g-4">

            <!-- Level 1 -->
            <div class="col-10 col-md-4">
                <div class="card text-center p-4 level-card shadow">
                    <i class="fa-solid fa-gamepad icon-level"></i>
                    <h4>Level 1</h4>
                    <p>Dasar Makanan Bergizi</p>
                    <a href="<?= base_url('level1'); ?>" class="btn btn-play">Mainkan</a>
                </div>
            </div>

            <!-- Level 2 -->
            <div class="col-10 col-md-4">
                <div class="card text-center p-4 level-card shadow <?= ($progress >= 2) ? '' : 'locked'; ?>">
                    <i class="icon-level <?= ($progress >= 2) ? 'fa-solid fa-gamepad' : 'fas fa-lock'; ?>"></i>
                    <h4>Level 2</h4>
                    <p>Lanjutan Gizi Seimbang</p>
                    <?php if ($progress >= 2): ?>
                        <a href="<?= base_url('level2'); ?>" class="btn btn-play">Mainkan</a>
                    <?php else: ?>
                        <button class="btn btn-secondary" disabled><i class="fas fa-lock"></i> Terkunci</button>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Level 3 -->
            <div class="col-10 col-md-4">
                <div class="card text-center p-4 level-card shadow <?= ($progress >= 3) ? '' : 'locked'; ?>">
                    <i class="icon-level <?= ($progress >= 3) ? 'fa-solid fa-gamepad' : 'fas fa-lock'; ?>"></i>
                    <h4>Level 3</h4>
                    <p>Ahli Gizi</p>
                    <?php if ($progress >= 3): ?>
                        <a href="<?= base_url('level3'); ?>" class="btn btn-play">Mainkan</a>
                    <?php else: ?>
                        <button class="btn btn-secondary" disabled><i class="fas fa-lock"></i> Terkunci</button>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Level 4 -->
            <div class="col-10 col-md-4">
                <div class="card text-center p-4 level-card shadow <?= ($progress >= 4) ? '' : 'locked'; ?>">
                    <i class="icon-level <?= ($progress >= 4) ? 'fa-solid fa-gamepad' : 'fas fa-lock'; ?>"></i>
                    <h4>Level 4</h4>
                    <p>Pakar Gizi</p>
                    <?php if ($progress >= 4): ?>
                        <a href="<?= base_url('level4'); ?>" class="btn btn-play">Mainkan</a>
                    <?php else: ?>
                        <button class="btn btn-secondary" disabled><i class="fas fa-lock"></i> Terkunci</button>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Level 5 -->
            <div class="col-10 col-md-4">
                <div class="card text-center p-4 level-card shadow <?= ($progress >= 5) ? '' : 'locked'; ?>">
                    <i class="icon-level <?= ($progress >= 5) ? 'fa-solid fa-gamepad' : 'fas fa-lock'; ?>"></i>
                    <h4>Level 5</h4>
                    <p>Master Gizi</p>
                    <?php if ($progress >= 5): ?>
                        <a href="<?= base_url('level5'); ?>" class="btn btn-play">Mainkan</a>
                    <?php else: ?>
                        <button class="btn btn-secondary" disabled><i class="fas fa-lock"></i> Terkunci</button>
                    <?php endif; ?>
                </div>
            </div>

            <div class="text-center mt-4">
                <a href="<?= base_url('opsi'); ?>" class="btn btn-warning">
                    <i class="fas fa-arrow-left"></i> Kembali ke Materi
                </a>
            </div>


        </div>
    </div>

    <script src="<?= base_url('assets/js/menu.js'); ?>"></script>
</body>

</html>