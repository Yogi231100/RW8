<?php
$file = 'produk.json';
$data = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = htmlspecialchars($_POST['judul']);
    $deskripsi = htmlspecialchars($_POST['deskripsi']);
    $harga = htmlspecialchars($_POST['harga']);
    $nomor_hp = htmlspecialchars($_POST['nomor_hp']);

    $uploadDir = 'uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    $uploadedFile = $_FILES['file']['tmp_name'];
    $fileName = uniqid() . '_' . basename($_FILES['file']['name']);
    $targetPath = $uploadDir . $fileName;

    if (move_uploaded_file($uploadedFile, $targetPath)) {
        $data[] = [
            'id' => uniqid(),
            'judul' => $judul,
            'deskripsi' => $deskripsi,
            'harga' => $harga,
            'nomor_hp' => $nomor_hp,
            'file' => $targetPath
        ];
        file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));
        $success = true;
    } else {
        $error = "Gagal mengupload gambar.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Upload Produk UMKM</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    :root {
      --warna-putih: #FFFFFF;
      --warna-hijau: #2E7D32;
      --warna-hijau-muda: #66BB6A;
      --warna-hover: #FBC02D;
      --warna-abu: #f1f3f5;
      --warna-teks: #333333;
    }

    body {
      background: linear-gradient(to right, var(--warna-hijau), var(--warna-hijau-muda));
      font-family: 'Segoe UI', sans-serif;
      padding-top: 60px;
      color: var(--warna-teks);
    }

    .container {
      max-width: 700px;
      background-color: var(--warna-putih);
      padding: 30px;
      border-radius: 16px;
      box-shadow: 0 0 20px rgba(0,0,0,0.05);
    }

    h3 {
      color: var(--warna-hijau);
      text-align: center;
      margin-bottom: 25px;
    }

    .form-label {
      font-weight: 500;
    }

    .btn-success {
      background-color: var(--warna-hijau-muda);
      border: none;
      transition: all 0.3s ease;
    }

    .btn-success:hover {
      background-color: var(--warna-hover);
      color: var(--warna-teks);
    }

    .btn-secondary {
      background-color: #dee2e6;
      color: #000;
    }

    .alert-success {
      background-color: #d4edda;
      color: #155724;
    }

    .alert-danger {
      background-color: #f8d7da;
      color: #721c24;
    }
  </style>
</head>
<body>
<div class="container">
  <h3>Form Upload Produk UMKM RW 8</h3>

  <?php if (isset($success)): ?>
    <div class="alert alert-success">✅ Produk berhasil diupload.</div>
  <?php elseif (isset($error)): ?>
    <div class="alert alert-danger"><?= $error ?></div>
  <?php endif; ?>

  <form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
      <label class="form-label">Nama Produk</label>
      <input type="text" name="judul" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Deskripsi Produk</label>
      <textarea name="deskripsi" class="form-control" rows="3" required></textarea>
    </div>

    <div class="mb-3">
      <label class="form-label">Harga Produk</label>
      <input type="number" name="harga" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Nomor WhatsApp Penjual</label>
      <input type="text" name="nomor_hp" class="form-control" placeholder="Contoh: 6281234567890" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Gambar Produk</label>
      <input type="file" name="file" accept="image/*" class="form-control" required>
    </div>

    <div class="d-flex justify-content-between">
      <button type="submit" class="btn btn-success">Upload Produk</button>
      <a href="kontak.php" class="btn btn-secondary">Lihat Produk</a>
    </div>
  </form>
</div>
</body>
</html>
