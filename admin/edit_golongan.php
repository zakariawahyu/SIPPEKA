<?php
include "../database/koneksi.php";
  $id = $_GET['id_golongan'];
  $namagolongan = $_GET['nama_golongan'];

  $query = "UPDATE golongan SET nama_golongan='$namagolongan' WHERE id_golongan='$id'";
  $hasil = mysqli_query($koneksi, $query);
  if ($hasil) {
    echo "<script>alert('Berhasil Edit'); document.location='index.php?page=data_golongan';</script>";
  } else {
    echo "<script>alert('Gagal Edit'); document.location='index.php?page=data_golongan';</script>";
  }

?>
