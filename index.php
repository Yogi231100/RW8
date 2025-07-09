<?php
$file = 'produk.json';
$produkData = file_exists($file) ? json_decode(file_get_contents($file), true) : [];
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Produk UMKM RW 8</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <style>
    :root {
      --putih: #ffffff;
      --teks: #343a40;
      --gradasi-header: linear-gradient(to right, #2E7D32, #FBC02D);
      --gradasi-btn: linear-gradient(to right, #66BB6A, #FFF176);
      --gradasi-hover: linear-gradient(to right, #FBC02D, #FFA726);
    }

    body {
      background-color: #f8f9fa;
      font-family: 'Segoe UI', sans-serif;
      color: var(--teks);
      margin: 0;
    }

    header {
      background: var(--gradasi-header);
      padding: 30px 20px 60px;
      text-align: center;
      color: var(--putih);
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.04);
      position: relative;
      border-bottom: 1px solid #eaeaea;
    }

    header h2 {
      font-size: 26px;
      font-weight: 600;
      margin-top: 20px;
    }

    .btn-navigasi, .btn-kegiatan {
      position: absolute;
      top: 20px;
      display: flex;
      gap: 10px;
    }

    .btn-navigasi { left: 20px; }
    .btn-kegiatan { right: 20px; }

    .btn-custom {
      background: var(--gradasi-btn);
      color: var(--teks);
      border: none;
      padding: 6px 16px;
      border-radius: 25px;
      font-size: 14px;
      font-weight: 500;
      text-decoration: none;
      transition: 0.3s ease;
    }

    .btn-custom:hover {
      background: var(--gradasi-hover);
      color: white;
      transform: translateY(-1px);
    }

    .section-produk {
      max-width: 1100px;
      margin: 50px auto;
      padding: 0 20px;
    }

    .produk-card {
      background: #ffffff;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
      overflow: hidden;
      margin-bottom: 30px;
      transition: 0.2s ease;
    }

    .produk-card:hover {
      transform: translateY(-4px);
    }

    .produk-card img {
      width: 100%;
      height: 220px;
      object-fit: cover;
    }

    .produk-card .card-body {
      padding: 20px;
    }

    .produk-card h5 {
      font-size: 18px;
      font-weight: 600;
      color: #333;
    }

    .produk-card p {
      font-size: 14px;
      color: #555;
      margin-top: 8px;
    }

    .section-kontak {
      background-color: #ffffff;
      border-radius: 12px;
      padding: 25px 30px;
      margin-top: 50px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.04);
    }

    .section-kontak h5 {
      text-align: center;
      font-weight: 600;
      color: #333;
      margin-bottom: 25px;
    }

    .contact-item {
      font-size: 15px;
      margin-bottom: 12px;
    }

    .contact-item i {
      margin-right: 10px;
      color: #495057;
    }

    .contact-item a {
      color: #0d6efd;
      text-decoration: none;
    }

    .contact-item a:hover {
      text-decoration: underline;
    }

    footer {
      background: var(--gradasi-header);
      text-align: center;
      padding: 20px 10px;
      color: var(--putih);
      font-size: 14px;
      border-top: 1px solid rgba(255, 255, 255, 0.2);
      margin-top: 60px;
    }

    .icon-maps {
      margin-right: 5px;
      color: #FFF59D;
    }

    @media (max-width: 576px) {
      .btn-navigasi, .btn-kegiatan {
        position: static;
        justify-content: center;
        margin-bottom: 10px;
        flex-wrap: wrap;
      }

      header h2 {
        font-size: 20px;
        margin-top: 40px;
      }
    }
  </style>
</head>
<body>

<header>
  <div class="btn-navigasi">
    <a href="index.php" class="btn-custom"><i class="fas fa-home"></i> Beranda</a>
    <a href="upload_produk.php" class="btn-custom"><i class="fas fa-upload"></i> Upload Produk</a>
  </div>

  <div class="btn-kegiatan">
    <a href="kegiatan.php" class="btn-custom"><i class="fas fa-clipboard-list"></i> Kegiatan</a>
  </div>

  <h2>Galeri Produk UMKM RW 8</h2>
</header>

<section class="section-produk">
  <div class="row">
    <?php foreach ($produkData as $item): ?>
      <div class="col-md-6 col-lg-4">
        <div class="produk-card">
          <img src="<?= htmlspecialchars($item['file']) ?>" alt="<?= htmlspecialchars($item['judul']) ?>">
          <div class="card-body">
            <h5><?= htmlspecialchars($item['judul']) ?></h5>
            <p><?= htmlspecialchars($item['deskripsi']) ?></p>
            <?php if (!empty($item['harga'])): ?>
              <p><strong>Harga:</strong> <?= htmlspecialchars($item['harga']) ?></p>
            <?php endif; ?>
            <?php if (!empty($item['wa'])): ?>
              <p><strong>WhatsApp:</strong> <a href="https://wa.me/<?= htmlspecialchars($item['wa']) ?>" target="_blank"><?= htmlspecialchars($item['wa']) ?></a></p>
            <?php endif; ?>
            <a href="edit_produk.php?id=<?= $item['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
            <a href="hapus_produk.php?id=<?= $item['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus produk ini?')">Hapus</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <div class="section-kontak mt-5">
    <h5>Kontak Pengurus RW</h5>
    <div class="contact-item"><i class="fas fa-user"></i> Nama: Bapak Muji Slamet</div>
    <div class="contact-item"><i class="fab fa-whatsapp"></i>
      <a href="https://wa.me/628122526579" target="_blank">+62 812-2526-579 (Klik untuk WhatsApp)</a>
    </div>
    <div class="contact-item"><i class="fas fa-map-marker-alt"></i> RW 8, Kelurahan Plamongansari, Semarang</div>
    <div class="contact-item"><i class="fas fa-envelope"></i>
      <a href="mailto:kontakrw8@gmail.com">kontakrw8@gmail.com</a>
    </div>
  </div>
</section>

<footer>
  <div>© 2025 RW 8 Plamongansari - Produk Warga</div>
  <div><i class="fas fa-map-marker-alt icon-maps"></i> JL. Agatis Perum Plamongan Indah No 1031, Pedurungan, Semarang</div>
</footer>

</body>
</html>
