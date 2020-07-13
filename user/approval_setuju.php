<?php
include "../database/koneksi.php";


  if (isset($_POST['simpan'])) {
    $id = $_POST['idcuti'];
    $action = $_POST['aksi'];
    $ket = $_POST['reject'];

    if ($action == 'panitera_sekretaris') {
      $ketua = '196507021992031005';
      $query = mysqli_query($koneksi, "UPDATE cuti_pegawai SET app_panitera_sekretaris=1, ketua='$ketua', status_cuti='Diajukan', ket_status_cuti='Menunggu Approval Ketua' WHERE id_cutipegawai='$id'");
    } elseif ($action == 'ketua') {
        $query = mysqli_query($koneksi, "UPDATE cuti_pegawai SET app_ketua=1 , status_cuti='Disetujui' , ket_status_cuti='Pengajuan Cuti Diterima'WHERE id_cutipegawai='$id'");
    } elseif ($action == '196311151993031004') {
        $query = mysqli_query($koneksi, "UPDATE cuti_pegawai SET app_panmud_kasubag=1 , status_cuti='Diajukan' , ket_status_cuti='Menunggu Approval Panitera' , panitera_sekretaris='196311151993031004' WHERE id_cutipegawai='$id'");
    } elseif ($action == '197208161994031002') {
        $query = mysqli_query($koneksi, "UPDATE cuti_pegawai SET app_panmud_kasubag=1 , status_cuti='Diajukan' , ket_status_cuti='Menunggu Approval Sekretaris' , panitera_sekretaris='197208161994031002' WHERE id_cutipegawai='$id'");
    } else if ($action == 'Perubahan') {
      $query = mysqli_query($koneksi, "UPDATE cuti_pegawai SET  status_cuti='Perubahan', ket_status_cuti='$ket' WHERE id_cutipegawai='$id'");
    } else if ($action == 'Ditangguhkan') {
      $query = mysqli_query($koneksi, "UPDATE cuti_pegawai SET  status_cuti='Ditangguhkan', ket_status_cuti='$ket' WHERE id_cutipegawai='$id'");
    } else if ($action == 'Tidak Disetujui') {
      $query = mysqli_query($koneksi, "UPDATE cuti_pegawai SET  status_cuti='Tidak Disetujui', ket_status_cuti='$ket' WHERE id_cutipegawai='$id'");
    } else if ($action == 'disetujuipaniterasekretaris') {
      $query = mysqli_query($koneksi, "UPDATE cuti_pegawai SET app_panitera_sekretaris=1 , status_cuti='Disetujui' , ket_status_cuti='Pengajuan Cuti Diterima'WHERE id_cutipegawai='$id'");
    }

    if ($query) {
      echo "<script>alert('Sukses'); document.location='index.php?page=approve_cuti';</script>";
    } else {
      echo "<script>alert('Gagal'); document.location='index.php?page=approve_cuti';</script>";
    }
  }
 ?>
