<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dokumentasi Kegiatan RW 8</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <style>
    :root {
      --hijau: #2E7D32;
      --kuning: #FBC02D;
      --hijau-cerah: #66BB6A;
      --kuning-lembut: #FFF176;
      --hover-grad: linear-gradient(45deg, #FBC02D, #FFA726);
      --teks: #333333;
      --putih: #FFFFFF;
    }

    html, body {
      margin: 0;
      font-family: 'Segoe UI', Tahoma, sans-serif;
      background-color: var(--putih);
      color: var(--teks);
      height: 100%;
      display: flex;
      flex-direction: column;
    }

    header {
      background: linear-gradient(to right, var(--hijau), var(--kuning));
      color: var(--putih);
      padding: 30px 20px 60px;
      text-align: center;
      position: relative;
      box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    }

    .btn-custom {
      position: absolute;
      top: 15px;
      font-size: 0.85rem;
      padding: 6px 16px;
      border-radius: 25px;
      background: linear-gradient(to right, var(--hijau-cerah), var(--kuning-lembut));
      color: var(--teks);
      font-weight: 600;
      border: none;
      transition: 0.3s ease-in-out;
    }

    .btn-custom:hover {
      background: var(--hover-grad);
      color: white;
      transform: translateY(-2px);
    }

    .btn-back { left: 15px; }
    .btn-upload { left: 140px; }
    .btn-pesan { right: 15px; }

    main {
      flex: 1;
      padding: 50px 20px;
    }

    .kegiatan-card {
      background-color: white;
      border-radius: 12px;
      box-shadow: 0 6px 16px rgba(0,0,0,0.06);
      overflow: hidden;
      transition: all 0.3s ease-in-out;
      height: 100%;
      display: flex;
      flex-direction: column;
    }

    .kegiatan-card:hover {
      transform: translateY(-4px);
    }

    .kegiatan-card img {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }

    .kegiatan-card .p-3 {
      padding: 20px;
      flex-grow: 1;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .kegiatan-card h5 {
      font-weight: 600;
      margin-bottom: 10px;
      color: var(--hijau);
    }

    footer {
      background: linear-gradient(to right, var(--hijau), var(--kuning));
      color: var(--putih);
      text-align: center;
      padding: 20px 15px;
      font-size: 14px;
    }

    .icon-maps {
      margin-right: 6px;
      color: #FFD54F;
    }

    @media (max-width: 576px) {
      .btn-upload {
        top: 55px;
        left: 15px;
      }

      header h2 {
        font-size: 1.2rem;
      }
    }
  </style>
</head>
<body>
<?php
$file = 'data.json';
$dataUpload = file_exists($file) ? json_decode(file_get_contents($file), true) : [];
?>

<header>
  <a href="index.php" class="btn btn-custom btn-back"><i class="fas fa-home"></i> Beranda</a>
  <a href="upload.php" class="btn btn-custom btn-upload"><i class="fas fa-upload"></i> Upload</a>
  <a href="kontak.php" class="btn btn-custom btn-pesan"><i class="fas fa-store"></i> Galeri Produk</a>
  <h2 class="mt-4">DOKUMENTASI KEGIATAN DI RW 8</h2>
</header>

<main class="container">
  <div class="row g-4">
    <?php if (!empty($dataUpload)): ?>
      <?php foreach (array_reverse($dataUpload) as $item): ?>
        <div class="col-md-6 col-lg-4 d-flex">
          <div class="kegiatan-card w-100">
            <img src="<?= htmlspecialchars($item['file']) ?>" alt="Kegiatan">
            <div class="p-3">
              <div>
                <h5><?= htmlspecialchars($item['judul']) ?></h5>
                <p><?= htmlspecialchars($item['deskripsi']) ?></p>
              </div>
              <small><?= htmlspecialchars($item['tanggal']) ?></small>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <div class="col-12 text-center">
        <p class="text-muted">Belum ada dokumentasi kegiatan yang diunggah.</p>
      </div>
    <?php endif; ?>
  </div>
</main>

<footer>
  <p>2025 Dokumentasi Kegiatan RW 8 Plamongansari | KKN PPM Universitas Semarang</p>
  <p><i class="fas fa-map-marker-alt icon-maps"></i> JL. Agatis Perum Plamongan Indah No 1031, Pedurungan, Kota Semarang</p>
</footer>

</body>
</html>
