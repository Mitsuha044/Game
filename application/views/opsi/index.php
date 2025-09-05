<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pilih Opsi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/opsi.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="bg-light">
    <div class="container py-5 text-center">
        <h1 class="fw-bold text-primary mb-4">👋 Selamat Datang!</h1>

        <div class="row justify-content-center g-4">
            <!-- Opsi Materi -->
            <div class="col-md-5">
                <div class="card h-100 shadow-lg border-0">
                    <div class="card-body">
                        <i class="fas fa-book-open fa-3x icon-level"></i>
                        <h4 class="card-title">Materi Makanan Bergizi</h4>
                        <p class="card-text">Pelajari tentang makanan sehat, kandungan gizinya, dan manfaatnya untuk tubuh.</p>
                        <a href="<?= base_url('materi'); ?>" class="btn btn-icon mt-3">Buka Materi</a>
                    </div>
                </div>
            </div>

            <!-- Opsi Soal -->
            <div class="col-md-5">
                <div class="card h-100 shadow-lg border-0">
                    <div class="card-body">
                        <img src="<?= base_url('assets/img/soal.png'); ?>" alt="Ilustrasi latihan soal dengan kertas ujian pensil dan kalkulator di atas meja dengan latar belakang terfokus" class="fa-3x icon mb-3">
                        <h4 class="card-title">Soal Kuis</h4>
                        <p class="card-text">Uji pemahamanmu dengan menjawab soal kuis tentang gizi seimbang!</p>
                        <a href="<?= base_url('menu'); ?>" class="btn btn-level mt-3">Mulai Kuis</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>