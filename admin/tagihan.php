<h2>Generate Tagihan Bulanan</h2>

<?php
$bulan = date('Y-m');

if (isset($_POST['generate'])) {
  // Ambil semua kamar aktif
  $kmr_penghuni = $conn->query("SELECT kp.id, k.harga, p.id AS id_penghuni
    FROM tb_kmr_penghuni kp
    JOIN tb_kamar k ON kp.id_kamar = k.id
    JOIN tb_penghuni p ON kp.id_penghuni = p.id
    WHERE kp.tgl_keluar IS NULL");

  $count = 0;
  while ($kp = $kmr_penghuni->fetch_assoc()) {
    $id_kmr_penghuni = $kp['id'];
    $harga_kamar = $kp['harga'];
    $id_penghuni = $kp['id_penghuni'];

    // Hitung total harga barang bawaan
    $barang = $conn->query("SELECT SUM(b.harga) AS total FROM tb_brng_bawaan bb
      JOIN tb_barang b ON bb.id_barang = b.id
      WHERE bb.id_penghuni = $id_penghuni");
    $row_barang = $barang->fetch_assoc();
    $total_barang = $row_barang['total'] ?? 0;

    $jml_tagihan = $harga_kamar + $total_barang;

    // Cek apakah tagihan sudah ada untuk bulan ini
    $cek = $conn->query("SELECT * FROM tb_tagihan WHERE bulan='$bulan' AND id_kmr_penghuni=$id_kmr_penghuni");
    if ($cek->num_rows == 0) {
      $conn->query("INSERT INTO tb_tagihan (bulan, id_kmr_penghuni, jml_tagihan) VALUES ('$bulan', '$id_kmr_penghuni', '$jml_tagihan')");
      $count++;
    }
  }
  echo "<div class='alert alert-success'>$count tagihan berhasil dibuat untuk bulan $bulan.</div>";
}
?>

<form method="POST">
  <button name="generate" class="btn btn-primary">🔁 Generate Tagihan Bulan <?= $bulan ?></button>
</form>

<hr>

<h4>Daftar Tagihan Penghuni Bulan Ini</h4>
<table class="table table-bordered">
  <thead>
    <tr>
      <th>Nama Penghuni</th>
      <th>Kamar</th>
      <th>Jumlah</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $query = "SELECT p.nama, k.nomor, t.jml_tagihan
              FROM tb_tagihan t
              JOIN tb_kmr_penghuni kp ON kp.id = t.id_kmr_penghuni
              JOIN tb_penghuni p ON kp.id_penghuni = p.id
              JOIN tb_kamar k ON kp.id_kamar = k.id
              WHERE t.bulan = '$bulan'";
    $result = $conn->query($query);
    while ($row = $result->fetch_assoc()) {
      echo "<tr>
              <td>{$row['nama']}</td>
              <td>{$row['nomor']}</td>
              <td>Rp" . number_format($row['jml_tagihan']) . "</td>
            </tr>";
    }
  ?>
  </tbody>
</table>
