<div class="page-title">
  <div class="title_left">
    <h3>View KNP Pegawai</h3>
  </div>
</div>

<div class="clearfix"></div>

<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>View KNP Pegawai <small>Daftar KNP pegawai</small></h2>
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
              <th>NIP</th>
              <th>Jabatan</th>
              <th>Golongan</th>
              <th>KNP terakhir</th>
              <th>KNP yang akan datang</th>
              <th>Keterangan</th>
            </tr>
          </thead>



          <tbody>
            <?php
            include "../database/koneksi.php";

              $nip = $_GET['nip'];
              $i = 1;

              $selectpegawai = mysqli_query($koneksi, "SELECT * FROM pegawai pg WHERE nip='$nip'");

              $hasilselect = mysqli_fetch_array($selectpegawai);

              $idpegawai = $hasilselect['id_pegawai'];

              $query = mysqli_query($koneksi, "SELECT * FROM knp_pegawai knp, pegawai pg, jabatan jb, golongan gl where knp.id_pegawai = pg.id_pegawai and knp.id_pegawai='$idpegawai' and pg.id_jabatan=jb.id_jabatan and pg.id_golongan=gl.id_golongan");

              while ($row = mysqli_fetch_array($query) ) {

                ?>

                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $row['nama_pegawai']; ?></td>
                  <td><?php echo $row['nip']; ?></td>
                  <td><?php echo $row['nama_jabatan']; ?></td>
                  <td><?php echo $row['nama_golongan']; ?></td>
                  <td><?php echo $row['knp_terakhir']; ?></td>
                  <td><?php echo $row['knp_datang']; ?></td>
                  <td><?php echo $row['keterangan']; ?></td>
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
