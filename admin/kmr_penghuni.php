<?php
// Ambil data kamar & penghuni untuk select option
$kamar = $conn->query("SELECT * FROM tb_kamar");
$penghuni = $conn->query("SELECT * FROM tb_penghuni");

// Proses simpan data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id_kamar = $_POST['id_kamar'];
  $id_penghuni = $_POST['id_penghuni'];
  $tgl_masuk = $_POST['tgl_masuk'];
  $tgl_keluar = $_POST['tgl_keluar'] ?: null;

  $stmt = $conn->prepare("INSERT INTO tb_kmr_penghuni (id_kamar, id_penghuni, tgl_masuk, tgl_keluar) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("iiss", $id_kamar, $id_penghuni, $tgl_masuk, $tgl_keluar);
  $stmt->execute();

  echo "<div class='alert alert-success'>Data kamar penghuni berhasil ditambahkan.</div>";
}

// Hapus
if (isset($_GET['delete'])) {
  $conn->query("DELETE FROM tb_kmr_penghuni WHERE id = " . $_GET['delete']);
  echo "<div class='alert alert-danger'>Data berhasil dihapus.</div>";
}

// Tampilkan data
$data = $conn->query("SELECT kp.*, p.nama AS penghuni, k.nomor AS kamar
                      FROM tb_kmr_penghuni kp
                      JOIN tb_penghuni p ON p.id = kp.id_penghuni
                      JOIN tb_kamar k ON k.id = kp.id_kamar
                      ORDER BY kp.id DESC");
?>

<h2>Data Kamar Penghuni</h2>

<form method="post" class="row g-3 mb-4">
  <div class="col-md-3">
    <label class="form-label">Pilih Kamar</label>
    <select name="id_kamar" class="form-select" required>
      <option value="">-- Pilih Kamar --</option>
      <?php while($k = $kamar->fetch_assoc()): ?>
        <option value="<?= $k['id'] ?>">Kamar <?= $k['nomor'] ?></option>
      <?php endwhile; ?>
    </select>
  </div>
  <div class="col-md-3">
    <label class="form-label">Pilih Penghuni</label>
    <select name="id_penghuni" class="form-select" required>
      <option value="">-- Pilih Penghuni --</option>
      <?php while($p = $penghuni->fetch_assoc()): ?>
        <option value="<?= $p['id'] ?>"><?= $p['nama'] ?></option>
      <?php endwhile; ?>
    </select>
  </div>
  <div class="col-md-3">
    <label class="form-label">Tanggal Masuk</label>
    <input type="date" name="tgl_masuk" class="form-control" required>
  </div>
  <div class="col-md-3">
    <label class="form-label">Tanggal Keluar (opsional)</label>
    <input type="date" name="tgl_keluar" class="form-control">
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">+ Tambah</button>
  </div>
</form>

<table class="table table-bordered">
  <thead class="table-light">
    <tr>
      <th>#</th>
      <th>Kamar</th>
      <th>Penghuni</th>
      <th>Masuk</th>
      <th>Keluar</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $no=1; while($row = $data->fetch_assoc()): ?>
    <tr>
      <td><?= $no++ ?></td>
      <td>Kamar <?= $row['kamar'] ?></td>
      <td><?= $row['penghuni'] ?></td>
      <td><?= $row['tgl_masuk'] ?></td>
      <td><?= $row['tgl_keluar'] ?: '-' ?></td>
      <td>
        <a href="?page=kmr_penghuni&delete=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus data ini?')">Hapus</a>
      </td>
    </tr>
    <?php endwhile; ?>
  </tbody>
</table>
