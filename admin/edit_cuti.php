<?php
include "../database/koneksi.php";

  date_default_timezone_set('Asia/Jakarta');
  $id = $_GET['id_cuti'];
  $cutitahunan = $_GET['ct_tahunan'];
  $cutisakit = $_GET['ct_sakit'];
  $cutibersalin = $_GET['ct_bersalin'];
  $cutibersalinanakketiga = $_GET['ct_bersalin_anakketiga'];
  $cutimusibah = $_GET['ct_musibah'];
  $ketcutimusibah = $_GET['ket_ct_musibah'];
  $cutiselainmusibah = $_GET['ct_selain_musibah'];
  $ketcutiselainmusibah = $_GET['ket_ct_selain_musibah'];
  $cutibesar = $_GET['ct_besar'];
  $cutidiluar = $_GET['ct_diluar_tanggungan'];
  $tgl = date('d-M-Y / H:i:s a');

  $query = "UPDATE cuti_pegawai SET cuti_tahunan='$cutitahunan', cuti_sakit='$cutisakit', cuti_bersalin='$cutibersalin', cuti_bersalin_anakketiga='$cutibersalinanakketiga', cuti_musibah='$cutimusibah', ket_cuti_musibah='$ketcutimusibah', cuti_selain_musibah='$cutiselainmusibah', ket_cuti_selain_musibah='$ketcutiselainmusibah', cuti_besar='$cutibesar', cuti_diluar_tanggungan_negara='$cutidiluar', tgl='$tgl' WHERE id_cutipegawai='$id'";
  $hasil = mysqli_query($koneksi, $query);
  if ($hasil) {
    echo "<script>alert('Berhasil Edit'); document.location='index.php?page=daftar_cuti';</script>";
  } else {
    echo "<script>alert('Gagal Edit'); document.location='index.php?page=daftar_cuti';</script>";
  }

?>
