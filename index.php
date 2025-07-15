<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard RW 8 - Beranda</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    /* --- Definisi Variabel Warna Hijau Alam --- */
    :root {
      --hijau-tua: #2C5E1A;
      --hijau-hutan: #3A7D44;
      --hijau-limau: #99BC85;
      --hijau-limau-gelap: #82a370;
      --putih-gading: #EBF3E8;
      --putih-murni: #FFFFFF;
      --bayangan: rgba(0, 0, 0, 0.5);
    }

    /* --- Reset dan Pengaturan Dasar Body --- */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    html, body {
      height: 100%;
      font-family: 'Poppins', 'Segoe UI', sans-serif;
      overflow-x: hidden;
      background-color: #333; /* Fallback color */
    }

    body {
      display: flex;
      flex-direction: column;
    }

    /* --- Pengaturan Header --- */
    header {
      background: linear-gradient(90deg, var(--hijau-tua), var(--hijau-hutan));
      color: var(--putih-gading);
      padding: 10px 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      position: relative;
      z-index: 10;
      box-shadow: 0 2px 10px rgba(0,0,0,0.2);
    }

    .logo-header {
      height: 50px;
      transition: transform 0.3s ease;
    }
    .logo-header:hover {
      transform: scale(1.1);
    }

    header h1 {
      font-size: 1.5rem;
      font-weight: 700;
      margin: 0;
      color: var(--putih-murni);
      text-shadow: 1px 1px 3px rgba(0,0,0,0.2);
    }

    /* --- Area Konten Utama (Slideshow) --- */
    .slideshow-container {
      flex: 1;
      position: relative;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      overflow: hidden;
      text-align: center;
      padding: 20px;
    }

    .slideshow-container::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.55);
      z-index: 2;
    }

    .slide {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      opacity: 0;
      transition: opacity 1.5s ease-in-out, transform 8s ease-in-out;
      z-index: 1;
      transform: scale(1.1);
    }

    .slide.active {
      opacity: 1;
      transform: scale(1);
    }

    /* Konten yang menyatu dengan background */
    .main-content {
      position: relative;
      z-index: 3;
      color: var(--putih-murni);
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }
    
    .main-content h2 {
      font-size: 3rem;
      font-weight: 700;
      margin-bottom: 10px;
      text-shadow: 2px 2px 8px var(--bayangan);
    }

    .main-content p {
      font-size: 1.2rem;
      max-width: 600px;
      margin-bottom: 30px;
      text-shadow: 1px 1px 5px var(--bayangan);
    }

    .menu-buttons {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 20px;
    }

    /* --- Tombol dengan Animasi Baru --- */
    .btn-custom {
      background: var(--hijau-limau);
      border: 2px solid var(--putih-gading);
      padding: 15px 35px;
      border-radius: 50px;
      font-weight: 600;
      font-size: 1.1rem;
      color: var(--hijau-tua);
      text-decoration: none;
      box-shadow: 0 5px 20px rgba(0,0,0,0.3);
      width: 100%;
      max-width: 320px;
      transition: all 0.3s ease;
      transform: scale(1);
    }

    .btn-custom:hover {
      background-color: var(--hijau-limau-gelap);
      color: var(--putih-gading);
      border-color: var(--hijau-limau);
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0,0,0,0.4);
    }

    .btn-custom:active {
      transform: translateY(0) scale(0.98);
      box-shadow: 0 5px 15px rgba(0,0,0,0.3);
    }

    .btn-custom i {
      margin-right: 12px;
    }

    /* --- Pengaturan Footer --- */
    footer {
      background: linear-gradient(90deg, var(--hijau-tua), var(--hijau-hutan));
      color: var(--putih-gading);
      text-align: center;
      padding: 15px;
      font-size: 0.9rem;
      position: relative;
      z-index: 10;
    }
    
    footer .icon-maps {
      color: var(--hijau-limau);
    }

    /* --- Media Queries untuk Tampilan Mobile --- */
    @media (max-width: 768px) {
      header h1 { font-size: 1.3rem; }
      .main-content h2 { font-size: 2.5rem; }
      .main-content p { font-size: 1.1rem; }
    }

    @media (max-width: 576px) {
      header { padding: 10px 15px; }
      .logo-header { height: 40px; }
      header h1 { font-size: 1.1rem; }
      
      .main-content h2 { font-size: 2rem; }
      .main-content p { font-size: 1rem; }
      .btn-custom { font-size: 1rem; padding: 12px 25px; }
    }
  </style>
</head>
<body>

<header>
  <img src="https://i.imgur.com/Tx8vsV2.png" alt="Logo LPPM" class="logo-header">
  <h1>RW 8 Plamongansari</h1>
  <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjrbmVRfLrLQ_W0S8TyeY-ITGn2b4USxdM0xVBBliS2O8CpZKeGhIj_wDGJDcGJrLP3Y_z-5GPlZ5B8K1bc6bIfOGrDfwUY523y9eaevm1tY6dd3oxnKa7Mqa_pdjTckw0DqxNNm3-XS90/s1600/LOGO+USMJAYA.png" alt="Logo USM" class="logo-header">
</header>

<!-- Kontainer utama untuk slideshow -->
<main class="slideshow-container" id="slideshow">
  <!-- Gambar-gambar untuk slideshow akan ditambahkan oleh JavaScript -->
  
  <!-- Konten yang ditampilkan di atas slideshow -->
  <div class="main-content">
      <h2>Membangun Komunitas, Merajut Asa</h2>
      <p>Jelajahi informasi terbaru seputar kegiatan dan produk unggulan dari warga kami.</p>
      <div class="menu-buttons">
        <a href="kegiatan.php" class="btn-custom"><i class="fas fa-users"></i> Kegiatan Warga</a>
        <a href="kontak.php" class="btn-custom"><i class="fas fa-store"></i> Galeri Produk</a>
      </div>
  </div>
</main>

<footer>
  <p>2025 KKN PPM XXVI Plamongansari | Universitas Semarang</p>
  <p><i class="fas fa-map-marker-alt icon-maps"></i> JL. Agatis Perum Plamongan Indah No 1031, Pedurungan, Kota Semarang</p>
</footer>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const slideshowContainer = document.getElementById('slideshow');
    
    const images = [
      'uploads/img_6867de07d92dd9.32024290.jpg',
      'uploads/img_68591113c165d7.00034958.jpg',
    ];
    
    let currentImageIndex = 0;

    function preloadImages() {
      for (let i = 0; i < images.length; i++) {
        const slideElement = document.createElement('img');
        slideElement.src = images[i];
        slideElement.classList.add('slide');
        if (i === 0) {
          slideElement.classList.add('active');
        }
        slideshowContainer.prepend(slideElement);
      }
    }

    function changeSlide() {
      const allSlides = slideshowContainer.querySelectorAll('.slide');
      
      allSlides[currentImageIndex].classList.remove('active');
      currentImageIndex = (currentImageIndex + 1) % images.length;
      allSlides[currentImageIndex].classList.add('active');
    }

    preloadImages();
    setInterval(changeSlide, 5000);
  });
</script>

</body>
</html>
