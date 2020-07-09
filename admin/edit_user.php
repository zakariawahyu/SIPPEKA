<?php
include "../database/koneksi.php";
  $nip = $_GET['pegawai'];
  $pass = md5($_GET['password']);
  $hakakses = $_GET['hak_akses'];

  $query = "UPDATE user SET password='$pass', role='$hakakses' WHERE nip='$nip'";
  $hasil = mysqli_query($koneksi, $query);
  if ($hasil) {
    echo "<script>alert('Berhasil Edit'); document.location='index.php?page=data_user';</script>";
  } else {
    echo "<script>alert('Gagal Edit'); document.location='index.php?page=data_user';</script>";
  }

?>
