<?php
include "../database/koneksi.php";
  $id = $_GET['id_knp'];

  $query = "DELETE FROM knp_pegawai WHERE id_knppegawai='$id'";

  $hasil = mysqli_query($koneksi, $query);
  if ($hasil) {
    echo "<script>alert('Berhasil Dihapus'); document.location='index.php?page=daftar_knp';</script>";
  } else {
    echo "<script>alert('Gagal Dihapus'); document.location='index.php?page=daftar_knp';</script>";
  }

?>
