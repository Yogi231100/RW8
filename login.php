<?php
session_start();

// Jika sudah login, langsung arahkan ke halaman kegiatan.php
if (isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
  header("Location: kegiatan.php");
  exit;
}

// Login admin default
$usernameAdmin = 'admin';
$passwordAdmin = '12345'; // Bisa diubah

$error = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $username = $_POST['username'];
  $password = $_POST['password'];

  if ($username === $usernameAdmin && $password === $passwordAdmin) {
    $_SESSION['admin'] = true;
    header("Location: kegiatan.php");
    exit;
  } else {
    $error = "Username atau password salah!";
  }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(to right, #2E7D32, #66BB6A);
      font-family: 'Segoe UI', sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .login-box {
      background-color: white;
      padding: 30px;
      border-radius: 16px;
      box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 400px;
    }

    .btn-success {
      background-color: #66BB6A;
      border: none;
      border-radius: 25px;
    }

    .btn-success:hover {
      background-color: #FBC02D;
      color: #333;
    }

    h3 {
      text-align: center;
      margin-bottom: 25px;
      color: #2E7D32;
    }
  </style>
</head>
<body>
  <div class="login-box">
    <h3>Login Admin</h3>

    <?php if ($error): ?>
      <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST">
      <div class="mb-3">
        <label class="form-label">Username</label>
        <input type="text" name="username" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" required>
      </div>
      <div class="d-grid">
        <button type="submit" class="btn btn-success">Login</button>
      </div>
    </form>
  </div>
</body>
</html>
