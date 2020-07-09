<?php
include "../database/koneksi.php";
  $id = $_GET['id_jabatan'];
  $namajabatan = $_GET['nama_jabatan'];

  $query = "UPDATE jabatan SET nama_jabatan='$namajabatan' WHERE id_jabatan='$id'";
  $hasil = mysqli_query($koneksi, $query);
  if ($hasil) {
    echo "<script>alert('Berhasil Edit'); document.location='index.php?page=data_jabatan';</script>";
  } else {
    echo "<script>alert('Gagal Edit'); document.location='index.php?page=data_jabatan';</script>";
  }

?>
