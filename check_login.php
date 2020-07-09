<?php
include 'database/koneksi.php';
if (isset($_POST['login'])) {
  $nip = $_POST['nip'];
  $pass = md5($_POST['password']);

  $query = "SELECT * FROM user WHERE nip='$nip' AND password='$pass'";
  $hasil = mysqli_query($koneksi, $query);
  $rowselect = mysqli_fetch_array($hasil);

  $row = $rowselect['role'];

  if ($row == "Admin") {
    session_start();
    $_SESSION['nip'] = $nip;
    echo "<script>alert('Login Berhasil'); document.location='admin/index.php';</script>";
  } elseif ($row == "User") {
    session_start();
    $_SESSION['nip'] = $nip;
    echo "<script>alert('Login Berhasil'); document.location='user/index.php';</script>";
  }  else {
    echo "<script>alert('Username & Password Salah !'); document.location='index.php';</script>";
  }
}
 ?>
