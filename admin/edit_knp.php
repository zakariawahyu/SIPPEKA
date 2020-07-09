<?php
include "../database/koneksi.php";

  date_default_timezone_set('Asia/Jakarta');
  $id = $_GET['id_knp'];
  $knpterakhir = $_GET['knp_terakhir'];
  $knpdatang = $_GET['knp_datang'];
  $ket = $_GET['golongan'];
  $tgl = date('d-M-Y / H:i:s a');
  $pensiun = $_GET['pensiun'];

  $query = "UPDATE knp_pegawai SET knp_terakhir='$knpterakhir', knp_datang='$knpdatang', keterangan='$ket', timestamp='$tgl', pensiun='$pensiun' WHERE id_knppegawai='$id'";
  $hasil = mysqli_query($koneksi, $query);
  if ($hasil) {
    echo "<script>alert('Berhasil Edit'); document.location='index.php?page=daftar_knp';</script>";
  } else {
    echo "<script>alert('Gagal Edit'); document.location='index.php?page=daftar_knp';</script>";
  }

?>
