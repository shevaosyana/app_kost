<?php
// koneksi sudah otomatis terhubung dari index.php

// Proses tambah kamar
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nomor = $_POST['nomor'];
  $harga = $_POST['harga'];

  $stmt = $conn->prepare("INSERT INTO tb_kamar (nomor, harga) VALUES (?, ?)");
  $stmt->bind_param("si", $nomor, $harga);
  $stmt->execute();

  echo "<div class='alert alert-success'>Kamar berhasil ditambahkan.</div>";
}

// Proses hapus kamar
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $conn->query("DELETE FROM tb_kamar WHERE id = $id");
  echo "<div class='alert alert-danger'>Kamar berhasil dihapus.</div>";
}

// Ambil data kamar
$kamar = $conn->query("SELECT * FROM tb_kamar ORDER BY id DESC");
?>

<h2>Data Kamar</h2>

<form method="post" class="row g-3 mb-4">
  <div class="col-md-4">
    <input type="text" name="nomor" class="form-control" placeholder="Nomor Kamar" required>
  </div>
  <div class="col-md-4">
    <input type="number" name="harga" class="form-control" placeholder="Harga Sewa" required>
  </div>
  <div class="col-md-2">
    <button type="submit" class="btn btn-primary">+ Tambah</button>
  </div>
</form>

<table class="table table-bordered table-striped">
  <thead class="table-light">
    <tr>
      <th>#</th>
      <th>Nomor Kamar</th>
      <th>Harga Sewa</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $no = 1; while($row = $kamar->fetch_assoc()) : ?>
    <tr>
      <td><?= $no++ ?></td>
      <td><?= htmlspecialchars($row['nomor']) ?></td>
      <td>Rp<?= number_format($row['harga']) ?></td>
      <td>
        <a href="?page=kamar&delete=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus kamar ini?')">Hapus</a>
      </td>
    </tr>
    <?php endwhile; ?>
  </tbody>
    </table>
    

