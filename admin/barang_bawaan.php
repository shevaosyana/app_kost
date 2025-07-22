<h2>Data Barang Bawaan Penghuni Kost</h2>
<a href="?page=barang_bawaan&action=tambah" class="btn btn-success mb-3">+ Tambah Data</a>

<?php
if (isset($_GET['action']) && $_GET['action'] == 'tambah' && $_POST) {
  $id_penghuni = $_POST['id_penghuni'];
  $id_barang = $_POST['id_barang'];

  $conn->query("INSERT INTO tb_brng_bawaan(id_penghuni, id_barang) VALUES('$id_penghuni','$id_barang')");
  echo "<div class='alert alert-success'>Data berhasil ditambahkan</div>";
}

if (isset($_GET['action']) && $_GET['action'] == 'tambah') {
  $penghuni = $conn->query("SELECT * FROM tb_penghuni WHERE tgl_keluar IS NULL");
  $barang = $conn->query("SELECT * FROM tb_barang");
?>
  <form method="POST">
    <div class="mb-3">
      <label>Penghuni</label>
      <select name="id_penghuni" class="form-control" required>
        <?php while ($p = $penghuni->fetch_assoc()) echo "<option value='{$p['id']}'>{$p['nama']}</option>"; ?>
      </select>
    </div>
    <div class="mb-3">
      <label>Barang</label>
      <select name="id_barang" class="form-control" required>
        <?php while ($b = $barang->fetch_assoc()) echo "<option value='{$b['id']}'>{$b['nama']}</option>"; ?>
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
  </form>
<?php
} else {
  $sql = "SELECT p.nama, b.nama AS barang 
          FROM tb_brng_bawaan bb
          JOIN tb_penghuni p ON p.id = bb.id_penghuni
          JOIN tb_barang b ON b.id = bb.id_barang
          ORDER BY bb.id DESC";
  $result = $conn->query($sql);

  echo "<table class='table table-bordered'>";
  echo "<thead><tr><th>Nama Penghuni</th><th>Barang</th></tr></thead><tbody>";
  while ($row = $result->fetch_assoc()) {
    echo "<tr><td>{$row['nama']}</td><td>{$row['barang']}</td></tr>";
  }
  echo "</tbody></table>";
}
?>

