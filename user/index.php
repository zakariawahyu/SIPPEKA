<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="../build/images/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SIPPEKA | Dashboard User</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php?page=dashboard" class="site_title"><i class="fa fa-university"></i><span>  SIPPEKA</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="../build/images/logo.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Pengadilan Agama</span>
                <span>Karawang</span>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                <?php

                if ($_SESSION['nip']) {
                  $nip = $_SESSION['nip'];

                 include'menu.php'; ?>
            </div>
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <?php



                      include '../database/koneksi.php';

                      $selectfoto = mysqli_query($koneksi, "SELECT * FROM user WHERE nip='$nip'");
                      $row2 = mysqli_fetch_array($selectfoto);
                      if (empty($row2['foto'])) {
                      ?>
                          <img src="../build/images/user.png"><?php echo $nip; ?>
                      <?php
                    } elseif (!empty($row2['foto'])) {
                      ?>
                          <img src="../build/images/thump_<?php echo $row2['foto']; ?>"><?php echo $nip; ?>
                      <?php
                      }
                       ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="index.php?page=profile"><i class="fa fa-user pull-right"></i> Profile</a></li>
                    <li><a href="#"><i class="fa fa-book pull-right"></i> User Manual</a></li>
                    <li><a href="../index.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                <?php


                include '../database/koneksi.php';

                $selectjabatan = mysqli_query($koneksi, "SELECT * FROM pegawai pg, jabatan jb WHERE nip='$nip' and pg.id_jabatan=jb.id_jabatan");
                $rowselect = mysqli_fetch_array($selectjabatan);
                $jabatanpegawai = $rowselect['nama_jabatan'];

                if ($jabatanpegawai == 'PANITERA' || $jabatanpegawai == 'SEKRETARIS' || $jabatanpegawai =='KETUA' || $jabatanpegawai =='PANMUD HUKUM' || $jabatanpegawai =='PANMUD HUKUM GUGATAN' || $jabatanpegawai =='PANMUD HUKUM PERMOHONAN' || $jabatanpegawai =='KASUBAG KEPEGAWAIAN DAN ORTALA' || $jabatanpegawai =='KASUBAG PERNCANAAN, IT DAN PELAPORAN' || $jabatanpegawai =='KASUBAG UMUM DAN KEUANGAN') {
                  ?>

                  <li role="presentation" class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                      <i class="fa fa-envelope-o"></i>
                      <?php

                      if ($jabatanpegawai =='PANMUD HUKUM' || $jabatanpegawai =='PANMUD HUKUM GUGATAN' || $jabatanpegawai =='PANMUD HUKUM PERMOHONAN' || $jabatanpegawai =='KASUBAG KEPEGAWAIAN DAN ORTALA' || $jabatanpegawai =='KASUBAG PERNCANAAN, IT DAN PELAPORAN' || $jabatanpegawai =='KASUBAG UMUM DAN KEUANGAN') {
                        $querycuti = mysqli_query($koneksi, "SELECT COUNT(*) AS total  FROM cuti_pegawai ct, pegawai pg WHERE panmud_kasubag='$nip' and app_panmud_kasubag=0 and ct.id_pegawai=pg.id_pegawai and status_cuti='Diajukan'");
                        $querycuti2 = mysqli_query($koneksi, "SELECT *  FROM cuti_pegawai ct, pegawai pg, user us WHERE panmud_kasubag='$nip' and app_panmud_kasubag=0 and ct.id_pegawai=pg.id_pegawai and pg.nip=us.nip and status_cuti='Diajukan'");
                        $count = mysqli_fetch_array($querycuti);
                        ?>
                          <span class="badge bg-green"><?php echo $count['total']; ?></span>
                        <?php

                      } elseif ($jabatanpegawai == 'PANITERA' || $jabatanpegawai == 'SEKRETARIS') {
                        $querycuti = mysqli_query($koneksi, "SELECT COUNT(*) AS total  FROM cuti_pegawai ct, pegawai pg WHERE panitera_sekretaris='$nip' and app_panitera_sekretaris=0 and ct.id_pegawai=pg.id_pegawai and status_cuti='Diajukan'");
                        $querycuti2 = mysqli_query($koneksi, "SELECT * FROM cuti_pegawai ct, pegawai pg, user us WHERE panitera_sekretaris='$nip' and app_panitera_sekretaris=0 and ct.id_pegawai=pg.id_pegawai and pg.nip=us.nip and status_cuti='Diajukan'");
                        $count = mysqli_fetch_array($querycuti);
                        ?>
                          <span class="badge bg-green"><?php echo $count['total']; ?></span>
                        <?php
                      } elseif ($jabatanpegawai =='KETUA') {
                        $querycuti = mysqli_query($koneksi, "SELECT COUNT(*) AS total  FROM cuti_pegawai ct, pegawai pg WHERE ketua='$nip' and app_ketua=0 and ct.id_pegawai=pg.id_pegawai and status_cuti='Diajukan'");
                        $querycuti2 = mysqli_query($koneksi, "SELECT * FROM cuti_pegawai ct, pegawai pg, user us WHERE ketua='$nip' and app_ketua=0 and ct.id_pegawai=pg.id_pegawai and pg.nip=us.nip and status_cuti='Diajukan'");
                        $count = mysqli_fetch_array($querycuti);
                        ?>
                          <span class="badge bg-green"><?php echo $count['total']; ?></span>
                        <?php
                      } else {
                        ?>
                        <span class="badge bg-green">0</span>
                        <?php
                      }

                       ?>

                    </a>

                    <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                      <?php



                      while ($row = mysqli_fetch_array($querycuti2)) {
                        // code...

                       ?>
                      <li>
                        <a>
                          <?php
                        if (empty($row['foto'])) {
                        ?>
                            <span class="image"><img src="../build/images/user.png"></span>
                        <?php
                      } elseif (!empty($row['foto'])) {
                        ?>
                            <span class="image"><img src="../build/images/thump_<?php echo $row2['foto']; ?>"></span>
                        <?php
                        }
                         ?>
                          <span>
                            <span><?php echo $row['nama_pegawai']; ?></span>
                          </span>
                          <br>
                          <span>
                            <span><?php echo $row['nip']; ?></span>
                          </span>
                          <span class="message">
                          <?php echo $row['ket_status_cuti']; ?>
                          </span>

                        </a>
                      </li>

                      <?php

                      } ?>

                      <li>
                        <div class="text-center">
                          <a href="index.php?page=approve_cuti" class="btn btn-success">
                            <strong>Approve sekarang</strong>
                          </a>
                        </div>
                      </li>
                    </ul>
                  </li>

                  <?php
                }

                 ?>

              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <?php
          if (isset($_GET['page'])) {
            switch ($_GET['page']) {

              case 'daftar_cuti': include'daftar_cuti.php'; break;
              case 'daftar_knp': include'daftar_knp.php'; break;
              case 'daftar_kgb': include'daftar_kgb.php'; break;

              case 'profile': include'profile.php'; break;
              case 'dashboard': include'dashboard.php'; break;

              case 'ajukan_cuti': include'pengajuan_cuti.php'; break;
              case 'daftar_approval': include'daftar_approval.php'; break;

              case 'disetujui': include'cuti_disetujui.php'; break;
              case 'perubahan': include'cuti_perubahan.php'; break;
              case 'ditangguhkan': include'cuti_ditangguhkan.php'; break;
              case 'tidakdisetujui': include'cuti_tidakdisetujui.php'; break;

              case 'approve_cuti': include'approve_cuti.php'; break;
              case 'approval_cuti': include'approve_update.php'; break;

              case '': include'dashboard.php';break;
            }
          } else {
            include 'dashboard.php';
          }
         ?>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            SIPPEKA - Copyright © 2020</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
  <?php } ?>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        $('#aksi').change(function(){
            if($(this).val() == 'Perubahan' || $(this).val() == 'Ditangguhkan' || $(this).val() == 'Tidak Disetujui'){
                $('#spv').attr('disabled', 'disabled');
                $('#reject').attr('disabled', false);
            }else{
                $('#spv').attr('disabled', false);
                $('#reject').attr('disabled', 'disabled');
            }
        });

    });
    </script>

  </body>
</html>
