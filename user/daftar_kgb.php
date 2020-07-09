<div class="page-title">
  <div class="title_left">
    <h3>KGB</h3>
  </div>

  <div class="title_right">
    <div class="col-md-3 col-sm-3 col-xs-12 pull-right">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="#">KGB</a></li>
        </ol>
    </div>
  </div>
</div>

<div class="clearfix"></div>

<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Daftar KGB <small>Daftar KGB pegawai pengadilan agama karawang</small></h2>
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
              <th>Jabatan</th>
              <th>Golongan</th>
              <th>KNP terakhir</th>
              <th>KNP yang akan datang</th>
              <th>Keterangan</th>
            </tr>
          </thead>


          <tbody>
            <?php
              include '../database/koneksi.php';
              $query = mysqli_query($koneksi,"SELECT * FROM kgb_pegawai kgb, pegawai pg, jabatan jb, golongan gl WHERE kgb.id_pegawai = pg.id_pegawai and nip='$nip' and pg.id_jabatan=jb.id_jabatan and pg.id_golongan=gl.id_golongan");
              $i = 1;
              while ($row = mysqli_fetch_array($query)) {
             ?>
             <tr>
               <td><?php echo $i ?></td>
               <td><?php echo $row['nama_pegawai'] ?></td>
               <td><?php echo $row['nama_jabatan'] ?></td>
               <td><?php echo $row['nama_golongan'] ?></td>
               <td><?php echo $row['kgb_terakhir'] ?></td>
               <td><?php echo $row['kgb_datang'] ?></td>
               <td><?php echo $row['keterangan']; ?></td>
             </tr>
             <?php
             $i++;
           }
              ?>
          </tbody>
        </table>

        <div class="modal fade btn-tambah-kgb" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">

              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Form Tambah KGB </h4>
              </div>
              <div class="modal-body">
                <form data-parsley-validate class="form-horizontal form-label-left" method="POST">

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Pegawai</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select class="form-control" name="pegawai">
                        <option selected disabled>-- Pilih Pegawai--</option>
                        <?php
                          include '../database/koneksi.php';
                          $query = mysqli_query($koneksi,"SELECT * FROM pegawai");
                          $i = 1;
                          while ($row = mysqli_fetch_array($query)) {
                         ?>
                         <option value="<?php echo $row['id_pegawai']; ?>"><?php echo $row['nama_pegawai']; ?> | <?php echo $row['nip']; ?></option>
                         <?php
                         $i++;
                       }
                          ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">KGB Terakhir</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input class="form-control col-md-7 col-xs-12" type="date" name="kgb_terakhir" value="">
                    </div>
                  </div>


                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">KGB yang akan datang </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input class="form-control col-md-7 col-xs-12" type="date" name="kgb_datang" value="">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input class="form-control col-md-7 col-xs-12" type="text" name="keterangan" placeholder="Masukkan Keterangan">
                    </div>
                  </div>

                  <div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </div>
                  </div>

                </form>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
  include'../database/koneksi.php';

  if (isset($_POST['submit'])) {
      $id = $_POST['pegawai'];
      $kgbterakhir = $_POST['kgb_terakhir'];
      $kgbdatang = $_POST['kgb_datang'];
      $ket = $_POST['keterangan'];


      $query = mysqli_query($koneksi, "INSERT INTO kgb_pegawai VALUES (null, '$id', '$kgbterakhir', '$kgbdatang', '$ket')");

      if ($query) {
        echo "<script>alert('Data Berhasil Ditambahkan'); document.location='index.php?page=daftar_kgb';</script>";
      }else {
        echo "<script>alert('Data Gagal Ditambahkan'); document.location='index.php?page=daftar_kgb';</script>";
      }
  }
  ?>
</div>
