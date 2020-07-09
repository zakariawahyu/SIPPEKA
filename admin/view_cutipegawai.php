<div class="page-title">
  <div class="title_left">
    <h3>View Cuti Pegawai</h3>
  </div>
</div>

<div class="clearfix"></div>

<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>View Cuti Pegawai <small>Daftar Cuti pegawai</small></h2>
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
            include "../database/koneksi.php";

              $nip = $_GET['nip'];
              $i = 1;

              $query = mysqli_query($koneksi, "SELECT * FROM cuti_pegawai cuti, pegawai pg, jabatan jb, golongan gl WHERE cuti.id_pegawai = pg.id_pegawai and pg.id_jabatan=jb.id_jabatan and pg.id_golongan=gl.id_golongan and pg.nip='$nip'");

              while ($row = mysqli_fetch_array($query) ) {

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
                <a href="#" class="btn <?php if ($row['status_cuti'] == 'Diajukan' || $row['status_cuti'] == 'Disetujui') {
                  ?>
                  btn-success
                  <?php
                } else {
                  ?>
                  btn-danger
                  <?php
                }
                 ?> btn-xs "> <?php echo $row['status_cuti']; ?></a>
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
