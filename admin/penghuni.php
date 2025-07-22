<?php
// koneksi sudah terhubung lewat index.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Simpan data
  $nama = $_POST['nama'];
  $no_ktp = $_POST['no_ktp'];
  $no_hp = $_POST['no_hp'];
  $tgl_masuk = $_POST['tgl_masuk'];
  $tgl_keluar = $_POST['tgl_keluar'] ?: null;

  $stmt = $conn->prepare("INSERT INTO tb_penghuni (nama, no_ktp, no_hp, tgl_masuk, tgl_keluar) VALUES (?, ?, ?, ?, ?)");
  $stmt->bind_param("sssss", $nama, $no_ktp, $no_hp, $tgl_masuk, $tgl_keluar);
  $stmt->execute();
  echo "<div class='alert alert-success'>Data berhasil ditambahkan.</div>";
}

if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $conn->query("DELETE FROM tb_penghuni WHERE id=$id");
  echo "<div class='alert alert-danger'>Data berhasil dihapus.</div>";
}

$penghuni = $conn->query("SELECT * FROM tb_penghuni ORDER BY id DESC");
?>

<h2>Data Penghuni</h2>

<form method="post" class="row g-3 mb-4">
  <div class="col-md-4">
    <input type="text" name="nama" class="form-control" placeholder="Nama" required>
  </div>
  <div class="col-md-3">
    <input type="text" name="no_ktp" class="form-control" placeholder="No. KTP" required>
  </div>
  <div class="col-md-3">
    <input type="text" name="no_hp" class="form-control" placeholder="No. HP" required>
  </div>
  <div class="col-md-3">
    <input type="date" name="tgl_masuk" class="form-control" required>
  </div>
  <div class="col-md-3">
    <input type="date" name="tgl_keluar" class="form-control" placeholder="Tgl Keluar (optional)">
  </div>
  <div class="col-md-2">
    <button type="submit" class="btn btn-success">+ Tambah</button>
  </div>
</form>

<table class="table table-bordered table-striped">
  <thead class="table-light">
    <tr>
      <th>#</th>
      <th>Nama</th>
      <th>No KTP</th>
      <th>No HP</th>
      <th>Tanggal Masuk</th>
      <th>Tanggal Keluar</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $no = 1;
    while($row = $penghuni->fetch_assoc()) : ?>
    <tr>
      <td><?= $no++ ?></td>
      <td><?= htmlspecialchars($row['nama']) ?></td>
      <td><?= $row['no_ktp'] ?></td>
      <td><?= $row['no_hp'] ?></td>
      <td><?= $row['tgl_masuk'] ?></td>
      <td><?= $row['tgl_keluar'] ?: '-' ?></td>
      <td>
        <a href="?page=penghuni&delete=<?= $data['id'] ?>" class="btn btn-danger" onclick="return confirm('Hapus data ini?')">Hapus</a>
        </td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</body>
</html>
