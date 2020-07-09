<?php
include "../database/koneksi.php";
  $id = $_GET['id_kgb'];

  $query = "DELETE FROM kgb_pegawai WHERE id_kgbpegawai='$id'";

  $hasil = mysqli_query($koneksi, $query);
  if ($hasil) {
    echo "<script>alert('Berhasil Dihapus'); document.location='index.php?page=daftar_kgb';</script>";
  } else {
    echo "<script>alert('Gagal Dihapus'); document.location='index.php?page=daftar_kgb';</script>";
  }

?>
