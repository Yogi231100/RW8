<?php
session_start(); // Mulai sesi untuk cek admin
$file = 'produk.json';
$produkData = file_exists($file) ? json_decode(file_get_contents($file), true) : [];
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Kontak & Produk UMKM RW 8</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f4f4f4;
      font-family: 'Segoe UI', sans-serif;
      color: #333;
    }

    header {
      background: linear-gradient(to right, #2E7D32, #FBC02D);
      padding: 25px 20px;
      color: white;
      text-align: center;
    }

    .btn-custom {
      background: linear-gradient(to right, #66BB6A, #FFF176);
      color: #333;
      border: none;
      padding: 6px 16px;
      border-radius: 25px;
      text-decoration: none;
      font-weight: 500;
    }

    .produk-card {
      background-color: white;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 4px 12px rgba(0,0,0,0.05);
      margin-bottom: 30px;
    }

    .produk-card img {
      width: 100%;
      height: 220px;
      object-fit: cover;
    }

    .produk-card .card-body {
      padding: 20px;
    }

    .footer {
      background: linear-gradient(to right, #2E7D32, #FBC02D);
      color: white;
      text-align: center;
      padding: 15px;
      margin-top: 50px;
    }

    .contact-section {
      background: white;
      padding: 25px;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.04);
      margin-top: 40px;
    }
  </style>
</head>
<body>

<header>
  <h2>Galeri Produk UMKM RW 8</h2>
  <div class="mt-3">
    <a href="index.php" class="btn-custom"><i class="fas fa-home"></i> Beranda</a>
    <a href="kegiatan.php" class="btn-custom"><i class="fas fa-images"></i> Kegiatan</a>
    <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] === true): ?>
      <a href="upload_produk.php" class="btn-custom"><i class="fas fa-upload"></i> Upload Produk</a>
    <?php endif; ?>
  </div>
</header>

<div class="container mt-5">
  <div class="row">
    <?php foreach ($produkData as $item): ?>
      <div class="col-md-6 col-lg-4">
        <div class="produk-card">
          <img src="<?= htmlspecialchars($item['file']) ?>" alt="<?= htmlspecialchars($item['judul']) ?>">
          <div class="card-body">
            <h5><?= htmlspecialchars($item['judul']) ?></h5>
            <p><?= htmlspecialchars($item['deskripsi']) ?></p>
            <?php if (!empty($item['harga'])): ?>
              <p><strong>Harga:</strong> Rp <?= number_format($item['harga'], 0, ',', '.') ?></p>
            <?php endif; ?>
            <?php if (!empty($item['nomor_hp'])): ?>
              <p><strong>WA:</strong> <a href="https://wa.me/<?= htmlspecialchars($item['nomor_hp']) ?>" target="_blank"><?= htmlspecialchars($item['nomor_hp']) ?></a></p>
            <?php endif; ?>

            <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] === true): ?>
              <a href="edit_produk.php?id=<?= $item['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
              <a href="hapus_produk.php?id=<?= $item['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus produk ini?')">Hapus</a>
            <?php endif; ?>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <div class="contact-section">
    <h5>Kontak Pengurus RW</h5>
    <p><i class="fas fa-user"></i> Nama: Bapak Muji Slamet</p>
    <p><i class="fab fa-whatsapp"></i> <a href="https://wa.me/628122526579" target="_blank">+62 812-2526-579</a></p>
    <p><i class="fas fa-map-marker-alt"></i> RW 8, Kelurahan Plamongansari, Semarang</p>
    <p><i class="fas fa-envelope"></i> <a href="mailto:kontakrw8@gmail.com">kontakrw8@gmail.com</a></p>
  </div>
</div>

<div class="footer">
  <p>2025 © RW 8 Plamongansari | UMKM & Kegiatan Warga</p>
</div>

</body>
</html>
