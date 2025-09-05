<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Formulir Siswa</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/name.css'); ?>" />
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

</head>

<body>



    <!-- Wrapper Form -->
    <div class="form-wrapper">
        <img src="<?= base_url('assets/img/laughing.png'); ?>" alt="Mascot" class="icon" />
        <h1>Halo Semua</h1>
        <p>Isi nama dan kelas sebelum memulai game Quiz tentang gizi.</p>

        <?= form_open('input'); ?>

        <div class="input-group">
            <label for="nama"><i class="fas fa-user"></i> Nama Lengkap</label>
            <input type="text" name="nama" id="nama" value="<?= set_value('nama'); ?>" placeholder="Contoh: Rina Putri" />
            <?= form_error('nama', '<small style="color:red;">', '</small>'); ?>
        </div>

        <div class="input-group">
            <label for="kelas"><i class="fas fa-school"></i> Kelas</label>
            <input type="text" name="kelas" id="kelas" value="<?= set_value('kelas'); ?>" placeholder="Contoh: 6A" />
            <?= form_error('kelas', '<small style="color:red;">', '</small>'); ?>
        </div>

        <button type="submit" class="play-button">Play</button>
        <?= form_close(); ?>
    </div>


    <script src="<?= base_url('assets/js/name.js'); ?>"></script>
</body>

</html>