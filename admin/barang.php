<?php
// koneksi sudah tersedia dari index.php

// Proses tambah barang
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nama = $_POST['nama'];
  $harga = $_POST['harga'];

  $stmt = $conn->prepare("INSERT INTO tb_barang (nama, harga) VALUES (?, ?)");
  $stmt->bind_param("si", $nama, $harga);
  $stmt->execute();

  echo "<div class='alert alert-success'>Barang berhasil ditambahkan.</div>";
}

// Proses hapus barang
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $conn->query("DELETE FROM tb_barang WHERE id = $id");
  echo "<div class='alert alert-danger'>Barang berhasil dihapus.</div>";
}

// Ambil data barang
$barang = $conn->query("SELECT * FROM tb_barang ORDER BY id DESC");
?>

<h2>Data Barang Berbayar</h2>

<form method="post" class="row g-3 mb-4">
  <div class="col-md-5">
    <input type="text" name="nama" class="form-control" placeholder="Nama Barang" required>
  </div>
  <div class="col-md-4">
    <input type="number" name="harga" class="form-control" placeholder="Harga Barang" required>
  </div>
  <div class="col-md-2">
    <button type="submit" class="btn btn-primary">+ Tambah</button>
  </div>
</form>

<table class="table table-bordered table-striped">
  <thead class="table-light">
    <tr>
      <th>#</th>
      <th>Nama Barang</th>
      <th>Harga</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $no = 1; while($row = $barang->fetch_assoc()) : ?>
    <tr>
      <td><?= $no++ ?></td>
      <td><?= htmlspecialchars($row['nama']) ?></td>
      <td>Rp<?= number_format($row['harga']) ?></td>
      <td>
        <a href="?page=barang&delete=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus barang ini?')">Hapus</a>
      </td>
    </tr>
    <?php endwhile; ?>
  </tbody>
</table>
