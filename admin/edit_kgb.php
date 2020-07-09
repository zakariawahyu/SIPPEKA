<?php
include "../database/koneksi.php";

  date_default_timezone_set('Asia/Jakarta');
  $id = $_GET['id_kgb'];
  $kgbterakhir = $_GET['kgb_terakhir'];
  $kgbdatang = $_GET['kgb_datang'];
  $ket = $_GET['keterangan'];
  $tgl = date('d-M-Y / H:i:s a');

  $query = "UPDATE kgb_pegawai SET kgb_terakhir='$kgbterakhir', kgb_datang='$kgbdatang', keterangan='$ket', timestamp='$tgl' WHERE id_kgbpegawai='$id'";
  $hasil = mysqli_query($koneksi, $query);
  if ($hasil) {
    echo "<script>alert('Berhasil Edit'); document.location='index.php?page=daftar_kgb';</script>";
  } else {
    echo "<script>alert('Gagal Edit'); document.location='index.php?page=daftar_kgb';</script>";
  }

?>
