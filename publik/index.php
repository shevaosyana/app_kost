<?php 
$base = realpath(__DIR__ . '/..'); // ke root project (app_kost/)
include("$base/config/db.php"); 
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Info Kost Bapak ADiMT</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Segoe UI', sans-serif;
    }
    .sidebar {
      min-height: 100vh;
      background-color: #ffffff;
      box-shadow: 2px 0 5px rgba(0,0,0,0.1);
    }
    .sidebar .nav-link {
      color: #111827;
      font-weight: 500;
    }
    .sidebar .nav-link:hover, .sidebar .nav-link.active {
      background-color: #e2e8f0;
    }
    .content {
      padding: 2rem;
    }
    .logout-label {
  background-color: #dc3545; /* Merah */
  color: white;
  padding: 0.5rem 1rem;
  border-radius: 6px;
  font-weight: bold;
  display: inline-block;
  cursor: default;
  user-select: none;
}
.register-label {
  background-color: #0d6efd; /* Biru Bootstrap */
  color: white;
  padding: 0.5rem 1rem;
  border-radius: 6px;
  font-weight: bold;
  display: inline-block;
  cursor: default;
  user-select: none;
}


  </style>
</head>
<body>
<div class="container-fluid">
  <div class="row">
    <!-- Sidebar -->
    <nav class="col-md-2 d-none d-md-block sidebar p-3">
      <h5>Menu</h5>
      <ul class="nav flex-column">
        <li class="nav-item"><a class="nav-link <?= ($_GET['page'] ?? '') == '' ? 'active' : '' ?>" href="index.php">Dashboard</a></li>
        <li class="nav-item"><a class="nav-link <?= ($_GET['page'] ?? '') == 'penghuni' ? 'active' : '' ?>" href="index.php?page=penghuni">Data Penghuni</a></li>
        <li class="nav-item"><a class="nav-link <?= ($_GET['page'] ?? '') == 'kamar' ? 'active' : '' ?>" href="index.php?page=kamar">Data Kamar</a></li>
        <li class="nav-item"><a class="nav-link <?= ($_GET['page'] ?? '') == 'barang' ? 'active' : '' ?>" href="index.php?page=barang">Data Barang</a></li>
        <li class="nav-item"><a class="nav-link <?= ($_GET['page'] ?? '') == 'kmr_penghuni' ? 'active' : '' ?>" href="index.php?page=kmr_penghuni">Kamar Penghuni</a></li>
        <li class="nav-item"><a class="nav-link <?= ($_GET['page'] ?? '') == 'barang_bawaan' ? 'active' : '' ?>" href="index.php?page=barang_bawaan">Barang Bawaan</a></li>
        <li class="nav-item"><a class="nav-link <?= ($_GET['page'] ?? '') == 'tagihan' ? 'active' : '' ?>" href="index.php?page=tagihan">Tagihan</a></li>
        <li class="nav-item"><a class="nav-link <?= ($_GET['page'] ?? '') == 'pembayaran' ? 'active' : '' ?>" href="index.php?page=pembayaran">Pembayaran</a></li>
      </ul>

      <hr>
<div class="mt-3 text-center">
  <span class="logout-label">Logout</span><br><br>
  <span class="register-label">Register</span>
</div>
    </nav>

    <!-- Content -->
    <main class="col-md-10 ms-sm-auto content">
      <?php
        $page = $_GET['page'] ?? '';
        $allowed_pages = [
          'penghuni', 'kamar', 'barang', 
          'kmr_penghuni', 'barang_bawaan', 
          'tagihan', 'pembayaran'
        ];

       if (in_array($page, $allowed_pages)) {
  include("$base/admin/$page.php");
} else {
  echo "
  <h2>Selamat Datang di Info Kost Bapak Aduy</h2>
  <p>Silakan pilih menu di samping.</p>
  <p>
    Kosan Bapak Aduy berlokasi strategis di daerah Jayanti, Bandung, dekat dengan berbagai fasilitas umum seperti warung makan, minimarket, dan transportasi umum. 
    Kos ini menyediakan kamar bersih dan nyaman dengan harga terjangkau. 
    Setiap kamar dilengkapi fasilitas dasar, dan tersedia pilihan barang tambahan dengan biaya ringan.
    Sistem administrasi kosan ini sudah terkomputerisasi, sehingga memudahkan pengecekan data penghuni, kamar, barang, tagihan, dan riwayat pembayaran.
    Silakan gunakan menu di samping untuk mengelola data atau melihat informasi kost.
  </p>
 <img src='Rumah.jpg.jpg' alt='Kosan Bapak Aduy' style='width:30%; max-width:800px; margin-top:20px; border-radius:10px; box-shadow:0 4px 10px rgba(0,0,0,0.1);'>

  ";
}
      ?>
    </main>
  </div>
</div>
</body>
</html>
