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
              <h3 class="name">Selamat Datang</h3>
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
<div class="row top_tiles">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Daftar Pengajuan Cuti Anda<small>Daftar Menunggu approval cuti dari atasan</small></h2>
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
                <th>Jenis Cuti</th>
                <th>Alasan Cuti</th>
                <th>Lama Cuti</th>
                <th>Dari Tanggal</th>
                <th>Sampai Dengan</th>
                <th>Status</th>
                <th>Keterangan</th>
            </tr>
          </thead>



          <tbody>
            <?php
              include '../database/koneksi.php';
              $nippegawai = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE nip='$nip'");
              $rowselect = mysqli_fetch_array($nippegawai);
              $idpegawai = $rowselect['id_pegawai'];
              $query = mysqli_query($koneksi,"SELECT * FROM cuti_pegawai cuti, pegawai pg WHERE cuti.id_pegawai = pg.id_pegawai and nip='$nip' and status_cuti='Diajukan'");
              $i = 1;
              while ($row = mysqli_fetch_array($query)) {
             ?>
             <tr>
               <td><?php echo $i ?></td>
               <td><?php echo $row['nama_pegawai'] ?></td>
               <td><?php echo $row['jenis_cuti'] ?></td>
               <td><?php echo $row['alasan_cuti'] ?></td>
               <td><?php echo $row['lama_cuti'];?> <?php echo $row['ket_lama_cuti'];  ?></td>
               <td><?php echo $row['dari_tanggal']; ?></td>
               <td><?php echo $row['sampai_dengan']; ?></td>
               <td class="text-center">
                 <a href="#" class="btn btn-success btn-xs "> <?php echo $row['status_cuti']; ?></a>
               </td>
               <td class="text-center">
                 <a href="#" class="btn btn-primary btn-xs "> <?php echo $row['ket_status_cuti']; ?></a>
               </td>
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
      <h1><i class="fa fa-university"></i> DPPA</h1>
      <p>Data Pegawai Pengadilan Agama</p>
      <p></p>
      <p>©2020 Pengadilan Agama Karawang, All Rights Reserved.</p>
    </div>
  </div>
</div>
</div>
