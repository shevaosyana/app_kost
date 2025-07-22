<h2>Data Pembayaran</h2>

<!-- Form Tambah Pembayaran -->
<h5>Tambah Pembayaran</h5>
<form method="POST" class="row g-3 mb-4">
  <div class="col-md-4">
    <label for="id_tagihan" class="form-label">Tagihan</label>
    <select name="id_tagihan" class="form-select" required>
      <option value="">-- Pilih Tagihan --</option>
      <?php
        $tagihan = $conn->query("SELECT t.id, p.nama, k.nomor, t.jml_tagihan
          FROM tb_tagihan t
          JOIN tb_kmr_penghuni kp ON kp.id = t.id_kmr_penghuni
          JOIN tb_penghuni p ON kp.id_penghuni = p.id
          JOIN tb_kamar k ON kp.id_kamar = k.id");
        while ($row = $tagihan->fetch_assoc()) {
          echo "<option value='{$row['id']}'>[{$row['nama']}] Kamar {$row['nomor']} - Rp" . number_format($row['jml_tagihan']) . "</option>";
        }
      ?>
    </select>
  </div>
  <div class="col-md-3">
    <label for="jml_bayar" class="form-label">Jumlah Bayar</label>
    <input type="number" name="jml_bayar" class="form-control" required>
  </div>
  <div class="col-md-3">
    <label for="status" class="form-label">Status</label>
    <select name="status" class="form-select" required>
      <option value="lunas">Lunas</option>
      <option value="cicil">Cicil</option>
    </select>
  </div>
  <div class="col-md-2 align-self-end">
    <button name="simpan" class="btn btn-success w-100">💾 Simpan</button>
  </div>
</form>

<?php
if (isset($_POST['simpan'])) {
  $id_tagihan = $_POST['id_tagihan'];
  $jml_bayar = $_POST['jml_bayar'];
  $status = $_POST['status'];

  $conn->query("INSERT INTO tb_bayar (id_tagihan, jml_bayar, status) VALUES ('$id_tagihan', '$jml_bayar', '$status')");
  echo "<div class='alert alert-success'>Pembayaran berhasil disimpan.</div>";
}
?>

<!-- Tabel Pembayaran -->
<h5>Riwayat Pembayaran</h5>
<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>Nama Penghuni</th>
      <th>Kamar</th>
      <th>Jumlah Bayar</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $query = "SELECT p.nama, k.nomor, b.jml_bayar, b.status
                FROM tb_bayar b
                JOIN tb_tagihan t ON b.id_tagihan = t.id
                JOIN tb_kmr_penghuni kp ON kp.id = t.id_kmr_penghuni
                JOIN tb_penghuni p ON kp.id_penghuni = p.id
                JOIN tb_kamar k ON kp.id_kamar = k.id
                ORDER BY b.id DESC";
      $result = $conn->query($query);
      while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['nama']}</td>
                <td>{$row['nomor']}</td>
                <td>Rp" . number_format($row['jml_bayar']) . "</td>
                <td>{$row['status']}</td>
              </tr>";
      }
    ?>
  </tbody>
</table>
