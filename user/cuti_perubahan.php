<div class="page-title">
  <div class="title_left">
    <h3>Cuti Perubahan</h3>
  </div>

  <div class="title_right">
    <div class="col-md-3 col-sm-3 col-xs-12 pull-right">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="#">Cuti Perubahan</a></li>
        </ol>
    </div>
  </div>
</div>

<div class="clearfix"></div>

<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Daftar Cuti Perubahan</h2>
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
        <table id="datatable" class="table table-striped table-bordered">
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
              $query = mysqli_query($koneksi,"SELECT * FROM cuti_pegawai cuti, pegawai pg WHERE cuti.id_pegawai = pg.id_pegawai and nip='$nip' and status_cuti='Perubahan'");
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
                 <a href="#" class="btn btn-danger btn-xs "> <?php echo $row['status_cuti']; ?></a>
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
