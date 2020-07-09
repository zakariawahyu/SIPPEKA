<div class="row">
  <div class="ccol-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_content text-center">
        <div class="flex">
          <ul class="list-inline widget_profile_box">
            <li>
              <a>
                <i class="fa fa-lock"></i>
              </a>
            </li>
            <li>
              <?php
              include '../database/koneksi.php';

              $selectfoto = mysqli_query($koneksi, "SELECT * FROM user WHERE nip='$nip'");
              $row2 = mysqli_fetch_array($selectfoto);
              if (empty($row2['foto'])) {
              ?>
                  <img src="../build/images/user.png" class="img-circle profile_img">
              <?php
            } elseif (!empty($row2['foto'])) {
              ?>
                  <img src="../build/images/thump_<?php echo $row2['foto']; ?>" class="img-circle profile_img">
              <?php
              }
               ?>
            </li>
            <li>
              <a>
                <i class="fa fa-lock"></i>
              </a>
            </li>
          </ul>
        </div>
        <div class="flex">
          <ul class="list-inline count2">
            <li>
              <h3 class="name">Selamat Datang Admin</h3>
              <?php
              include '../database/koneksi.php';
               $select = mysqli_query($koneksi,"SELECT * FROM pegawai WHERE nip='$nip'");

              $selectnama = mysqli_fetch_array($select);

              ?>
               <h3 class="name"><?php echo $selectnama['nama_pegawai'] ?></h3>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
  include '../database/koneksi.php';

  $queryuser = mysqli_query($koneksi, "SELECT count(*) as total from user");
  $user=mysqli_fetch_assoc($queryuser);

  $querypegawai = mysqli_query($koneksi, "SELECT count(*) as total from pegawai");
  $pegawai=mysqli_fetch_assoc($querypegawai);

 ?>
<div class="row top_tiles">
   <div class="animated flipInY col-md-6 col-sm-6 col-xs-12">
     <div class="tile-stats">
       <div class="icon"><i class="fa fa-users"></i></div>
       <div class="count"><?php echo $user['total']; ?></div>
       <h3>Users</h3>
       <p>Jumlah users yang memakai aplikasi DPPA</p>
       <hr>
       <div class="text-center small-box">
         <a href="index.php?page=data_user" class="small-box-footer">Tampilkan lebih banyak <i class="fa fa-arrow-circle-right"></i></a>
       </div>
     </div>
   </div>
   <div class="animated flipInY col-md-6 col-sm-6 col-xs-12">
     <div class="tile-stats">
       <div class="icon"><i class="fa fa-database"></i></div>
       <div class="count"><?php echo $pegawai['total']; ?></div>
       <h3>Pegawai</h3>
       <p>Jumlah seluruh pegawai di Pengadilan Agama Karawang</p>
       <hr>
       <div class="text-center small-box">
         <a href="index.php?page=data_pegawai" class="small-box-footer">Tampilkan lebih banyak <i class="fa fa-arrow-circle-right"></i></a>
       </div>
     </div>
   </div>
</div>
<div class="row top_tiles">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Data Pegawai <small>Daftar pegawai pengadilan agama karawang</small></h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Settings 1</a>
              </li>
              <li><a href="#">Settings 2</a>
              </li>
            </ul>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <table id="datatable" class="table table-striped table-bordered table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>NIP</th>
              <th>Jabatan</th>
              <th>Golongan</th>
              <th>Cuti</th>
              <th>KNP</th>
              <th>KGB</th>
            </tr>
          </thead>



          <tbody>
            <?php
              include '../database/koneksi.php';
              $query = mysqli_query($koneksi,"SELECT * FROM pegawai pg, jabatan jb, golongan gl WHERE pg.id_jabatan=jb.id_jabatan and pg.id_golongan=gl.id_golongan order by pg.id_jabatan");
              $i = 1;
              while ($row = mysqli_fetch_array($query)) {
             ?>
             <tr>
               <td><?php echo $i ?></td>
               <td><?php echo $row['nama_pegawai'] ?></td>
               <td><?php echo $row['nip'] ?></td>
               <td><?php echo $row['nama_jabatan'] ?></td>
               <td><?php echo $row['nama_golongan'] ?></td>
               <td><a href="index.php?page=viewcutipegawai&nip=<?php echo $row['nip'] ?>" class="label label-success">Lihat Detail</a> </td>
               <td><a href="index.php?page=viewknppegawai&nip=<?php echo $row['nip'] ?>"  class="label label-success">Lihat Detail</a> </td>
               <td><a href="index.php?page=viewkgbpegawai&nip=<?php echo $row['nip'] ?>"  class="label label-success">Lihat Detail</a> </td>
             </tr>

             <?php
             $i++;
            }
              ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<div class="row">
<div class="ccol-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_content text-center">
      <h1><i class="fa fa-university"></i> SIPPEKA</h1>
      <p>Sistem Informasi Pegawai Pengadilan Agama Karawang</p>
      <p></p>
      <p>©2020 Pengadilan Agama Karawang, All Rights Reserved.</p>
    </div>
  </div>
</div>
</div>
