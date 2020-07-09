<?php
include "../database/koneksi.php";
  $id = $_GET['id_cuti'];

  $query = "DELETE FROM cuti_pegawai WHERE id_cutipegawai='$id'";

  $hasil = mysqli_query($koneksi, $query);
  if ($hasil) {
    echo "<script>alert('Berhasil Dihapus'); document.location='index.php?page=daftar_cuti';</script>";
  } else {
    echo "<script>alert('Gagal Dihapus'); document.location='index.php?page=daftar_cuti';</script>";
  }

?>
