<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Kuis Nilai Gizi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/hasil.css'); ?>">
</head>

<body>
    <div class="container hasil-wrapper py-5">

        <div class="hasil-card mx-auto shadow-lg p-4">
            <div class="text-center mb-4">
                <h2 class="fw-bold">📋 Hasil Akhir Kuis Nilai Gizi</h2>
                <p class="text-muted">Berikut hasil dari setiap level yang telah kamu kerjakan.</p>
            </div>

            <!-- Informasi Pemain -->
            <div class="info-card d-flex align-items-center justify-content-between p-3 mb-4 rounded shadow-sm">
                <div class="d-flex align-items-center">
                    <img src="<?= base_url('assets/img/laughing.png'); ?>" alt="User Icon" class="user-icon me-3">
                    <div>
                        <h5 class="mb-1">Nama: <strong><?= $this->session->userdata('nama'); ?></strong></h5>
                        <h5 class="mb-0">Kelas: <strong><?= $this->session->userdata('kelas'); ?></strong></h5>
                    </div>
                </div>
            </div>

            <!-- Kategori Nilai Info -->
            <div class="info-box mb-4 p-3 rounded shadow-sm">
                <p><strong>Info Kategori Nilai:</strong></p>
                <p>A – Cerdas (≥ 90) | B – Baik (75–89) | C – Cukup (60–74) | D – Perlu Latihan (< 60)</p>
            </div>

            <?php
            function kategori_nilai($nilai)
            {
                if ($nilai >= 90) return "A – Cerdas";
                if ($nilai >= 75) return "B – Baik";
                if ($nilai >= 60) return "C – Cukup";
                return "D – Perlu Latihan";
            }

            $level_deskripsi = [
                1 => 'Dasar Makanan Bergizi',
                2 => 'Lanjutan Gizi Seimbang',
                3 => 'Ahli Nutrisi Cilik',
                4 => 'Pakar Gizi Hebat',
                5 => 'Master Gizi'
            ];
            ?>

            <!-- Tabel Hasil -->
            <div class="table-responsive">
                <table class="table table-bordered align-middle text-center">
                    <thead class="table-primary">
                        <tr>
                            <th>Level</th>
                            <th>Deskripsi</th>
                            <th>Nilai</th>
                            <th>Benar</th>
                            <th>Salah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i = 1; $i <= 5; $i++):
                            $nilaiVar = ${"nilai_level" . $i} ?? null;
                            $benarVar = ${"benar_level" . $i} ?? null;
                            $salahVar = ${"salah_level" . $i} ?? null;
                        ?>
                            <tr class="spacer-row"></tr>
                            <tr>
                                <td>Level <?= $i ?></td>
                                <td><?= $level_deskripsi[$i] ?></td>
                                <td class="nilai">
                                    <?php
                                    if ($nilaiVar !== null) {
                                        echo $nilaiVar . " (" . kategori_nilai($nilaiVar) . ")";
                                    } else {
                                        echo "";
                                    }
                                    ?>
                                </td>
                                <td><?= $benarVar ?? '-' ?></td>
                                <td><?= $salahVar ?? '-' ?></td>
                            </tr>
                        <?php endfor; ?>
                    </tbody>
                </table>
            </div>

            <!-- Tombol -->
            <div class="text-center mt-4">
                <a href="<?= base_url('menu'); ?>" class="btn btn-primary btn-lg me-2">Kembali ke Menu</a>
                <a href="<?= base_url('input/logout'); ?>" class="btn btn-danger btn-lg">Logout</a>
            </div>

        </div>
    </div>
</body>

</html>