<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard RW 8</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <style>
    :root {
      --putih: #FFFFFF;
      --teks: #333333;
      --hover-gradient: linear-gradient(to right, #FBC02D, #FFA726);
    }

    body {
      background-color: var(--putih);
      font-family: 'Segoe UI', Tahoma, sans-serif;
      color: var(--teks);
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    header {
      background: linear-gradient(to right, #2E7D32, #FBC02D);
      color: var(--putih);
      padding: 30px 20px;
      text-align: center;
      position: relative;
    }

    .logo-kiri, .logo-kanan {
      position: absolute;
      top: 20px;
      height: 70px;
      width: auto;
    }

    .logo-kiri { left: 20px; }
    .logo-kanan { right: 20px; }

    .logo-tengah {
      max-width: 100px;
      margin-bottom: 15px;
    }

    h1 {
      font-size: 26px;
      font-weight: 600;
      margin-top: 10px;
      color: var(--putih);
    }

    .menu-container {
      padding: 50px 20px;
      text-align: center;
    }

    .btn-custom {
      background: linear-gradient(to right, #66BB6A, #FFF176);
      border: none;
      padding: 14px 28px;
      border-radius: 40px;
      font-weight: 500;
      margin: 10px;
      transition: all 0.3s ease;
      color: var(--teks);
      text-decoration: none;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
    }

    .btn-custom:hover {
      background: var(--hover-gradient);
      color: white;
    }

    footer {
      background: linear-gradient(to right, #2E7D32, #FBC02D);
      color: var(--putih);
      text-align: center;
      padding: 20px 15px;
      margin-top: auto;
      font-size: 14px;
      border-top: 1px solid rgba(255, 255, 255, 0.2);
    }

    .icon-maps {
      margin-right: 6px;
      color: #FFF59D;
    }

    @media (max-width: 768px) {
      .logo-kiri, .logo-kanan {
        height: 50px;
      }

      h1 {
        font-size: 22px;
      }

      .btn-custom {
        padding: 12px 20px;
        font-size: 14px;
      }
    }
  </style>
</head>
<body>

<header>
  <img src="https://i.imgur.com/Tx8vsV2.png" alt="Logo LPPM" class="logo-kiri">
  <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjrbmVRfLrLQ_W0S8TyeY-ITGn2b4USxdM0xVBBliS2O8CpZKeGhIj_wDGJDcGJrLP3Y_z-5GPlZ5B8K1bc6bIfOGrDfwUY523y9eaevm1tY6dd3oxnKa7Mqa_pdjTckw0DqxNNm3-XS90/s1600/LOGO+USMJAYA.png" alt="Logo USM" class="logo-kanan">
  <img src="https://plamongansari.semarangkota.go.id/templates/default/images/plamongansari.png" alt="Logo RW 8" class="logo-tengah">
  <h1>Selamat Datang di Dashboard RW 8</h1>
</header>

<main class="menu-container">
  <img src="https://i.imgur.com/Lze74Gi.png" alt="Logo RW 8 Tambahan" style="max-width: 220px; margin-bottom: 30px;">
  <p class="text-muted">Pilih menu di bawah untuk melihat informasi kegiatan dan produk warga:</p>
  <a href="kegiatan.php" class="btn-custom"><i class="fas fa-users"></i> Kegiatan Warga</a>
  <a href="kontak.php" class="btn-custom"><i class="fas fa-store"></i> Hasil Produk Warga</a>
</main>

<footer>
  2025 KKN PPM XXVI Plamongansari | Universitas Semarang<br>
  <i class="fas fa-map-marker-alt icon-maps"></i> JL. Agatis Perum Plamongan Indah No 1031, Pedurungan, Kota Semarang
</footer>

</body>
</html>
