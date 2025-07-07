<?php
$dataFile = 'data.json';
$uploadSuccess = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $judul = htmlspecialchars($_POST['judul']);
  $deskripsi = htmlspecialchars($_POST['deskripsi']);

  $targetDir = "uploads/";
  $originalFileName = basename($_FILES["gambar"]["name"]);
  $imageFileType = strtolower(pathinfo($originalFileName, PATHINFO_EXTENSION));
  $uniqueName = uniqid('img_', true) . '.' . $imageFileType;
  $targetFile = $targetDir . $uniqueName;

  $allowed = ["jpg", "jpeg", "png", "gif"];
  if (in_array($imageFileType, $allowed) && $_FILES["gambar"]["size"] <= 2 * 1024 * 1024 && getimagesize($_FILES["gambar"]["tmp_name"])) {
    if (!is_dir($targetDir)) {
      mkdir($targetDir, 0777, true);
    }
    if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $targetFile)) {
      $uploadSuccess = true;
      $uploadedData = [
        'id' => uniqid(),
        'judul' => $judul,
        'deskripsi' => $deskripsi,
        'file' => $targetFile,
        'tanggal' => date('d F Y')
      ];

      $existingData = file_exists($dataFile) ? json_decode(file_get_contents($dataFile), true) : [];
      array_unshift($existingData, $uploadedData);
      file_put_contents($dataFile, json_encode($existingData, JSON_PRETTY_PRINT));

      header("Location: kegiatan.php");
      exit;
    }
  }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Upload Kegiatan RW 8</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <style>
    :root {
      --warna-putih: #FFFFFF;
      --warna-hijau: #2E7D32;
      --warna-hijau-muda: #66BB6A;
      --warna-hover: #FBC02D;
      --warna-teks: #333333;
    }

    body {
      background: linear-gradient(to right, var(--warna-hijau), var(--warna-hijau-muda));
      font-family: 'Segoe UI', Tahoma, sans-serif;
      color: var(--warna-teks);
      padding-top: 60px;
    }

    .container {
      max-width: 650px;
      background-color: var(--warna-putih);
      padding: 30px;
      border-radius: 16px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
    }

    h2 {
      text-align: center;
      font-weight: bold;
      color: var(--warna-hijau);
      margin-bottom: 25px;
    }

    label {
      font-weight: 500;
    }

    .form-control:focus {
      border-color: var(--warna-hijau-muda);
      box-shadow: 0 0 0 0.2rem rgba(102, 187, 106, 0.25);
    }

    .btn-success {
      background-color: var(--warna-hijau-muda);
      border: none;
      padding: 10px 24px;
      border-radius: 30px;
      font-weight: 500;
      transition: 0.3s;
    }

    .btn-success:hover {
      background-color: var(--warna-hover);
      color: var(--warna-teks);
    }

    .btn-secondary {
      background-color: #e0e0e0;
      color: #000;
      border: none;
      border-radius: 30px;
      padding: 10px 24px;
      font-size: 14px;
      text-decoration: none;
    }

    .alert {
      margin-bottom: 20px;
    }

    .text-center .btn {
      margin-top: 20px;
    }
  </style>
</head>
<body>

  <div class="container my-5">
    <h2><i class="fas fa-upload"></i> Upload Dokumentasi Kegiatan RW 8</h2>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && !$uploadSuccess): ?>
  <div class="alert alert-danger">Gagal mengunggah gambar. Pastikan file valid dan ukuran tidak lebih dari 2MB.</div>
<?php endif; ?>


    <form method="POST" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="gambar" class="form-label">Pilih Gambar (max 2 MB)</label>
        <input type="file" class="form-control" name="gambar" id="gambar" accept=".jpg,.jpeg,.png,.gif" required>
      </div>
      <div class="mb-3">
        <label for="judul" class="form-label">Judul Kegiatan</label>
        <input type="text" class="form-control" name="judul" id="judul" required>
      </div>
      <div class="mb-3">
        <label for="deskripsi" class="form-label">Deskripsi</label>
        <textarea class="form-control" name="deskripsi" id="deskripsi" rows="4" required></textarea>
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Upload</button>
        <a href="kegiatan.php" class="btn btn-secondary"><i class="fas fa-images"></i> Lihat Dokumentasi</a>
      </div>
    </form>
  </div>

</body>
</html>
