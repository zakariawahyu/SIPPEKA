<div class="page-title">
  <div class="title_left">
    <h3>Pegawai</h3>
  </div>

  <div class="title_right">
    <div class="col-md-3 col-sm-3 col-xs-12 pull-right">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item"><a href="#">Pegawai</a></li>
                </ol>
              </div>
  </div>
</div>

<div class="clearfix"></div>

<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <a href="export_pegawai.php" title="Tambah User" class="btn btn-success pull-right" ><i class="fa fa-download"></i> Export Excel</a>
    <a href="#" title="Tambah User" class="btn btn-info pull-right" data-toggle="modal" data-target=".btn-tambah-pegawai"><i class="fa fa-plus-circle"></i> Tambah Pegawai</a>
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
        <table id="datatable" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>NIP</th>
              <th>Jabatan</th>
              <th>Golongan</th>
              <th>Unit Kerja</th>
              <th class="text-center" style="width:25%">Action</th>
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
               <td><?php echo $row['unit_kerja']; ?></td>
               <td class="text-center">
                 <a href="#" class="btn btn-info" data-toggle="modal" data-target="#modalviewpegawai<?php echo $row['nip'] ?>"><i class="fa fa-eye"></i> View</a>
                 <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modaleditpegawai<?php echo $row['nip'] ?>"><i class="fa fa-edit"></i> Edit</a>
                 <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#modaldeletepegawai<?php echo $row['nip'] ?>"><i class="fa fa-trash"></i> Delete</a>
               </td>
             </tr>

             <div class="modal fade" id="modaldeletepegawai<?php echo $row['nip']; ?>">
               <div class="modal-dialog">
                 <div class="modal-content">
                   <div class="modal-header">
                     <h4 class="modal-title">Hapus Pegawai <?php echo $row['nama_pegawai']; ?></h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                     </button>
                   </div>
                   <div class="modal-body">
                     <form class="" action="delete_pegawai.php" method="get">
                       <div class="form-group">
                         <label>Anda ingin menghapus Pegawai <?php echo $row['nama_pegawai']; ?></label>
                         <label>Semua data user, cuti, knp dan kgb akan hilang</label>
                         <input type="hidden" name="id_pegawai" class="form-control" value="<?php echo $row['id_pegawai']; ?>">
                       </div>
                       <div class="form-group">
                         <button type="submit" class="btn btn-primary">Yes</button>
                         <button type="button" class="btn btn-default" data-dismiss="modal"s>No</button>
                       </div>
                     </form>
                   </div>
                 </div>
               </div>
             </div>

             <div class="modal fade" id="modaleditpegawai<?php echo $row['nip']; ?>">
               <div class="modal-dialog">
                 <div class="modal-content">
                   <div class="modal-header">
                     <h4 class="modal-title">Form Edit Pegawai</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                     </button>
                   </div>
                   <div class="modal-body">
                     <form class="" action="edit_pegawai.php" method="get">
                       <div class="form-group">
                         <label>Nama Pegawai</label>
                         <input type="hidden" name="nip" value="<?php echo $row['nip']; ?>">
                         <input type="text" class="form-control" name="pegawai" value="<?php echo $row['nama_pegawai']; ?>">
                       </div>
                       <div class="form-group">
                         <label>Jabatan</label>
                         <select class="form-control" name="jabatan">
                           <option selected disabled>-- Pilih Jabatan--</option>
                           <?php
                           $jabatan = mysqli_query($koneksi, "SELECT * FROM jabatan");
                           while ($rowjab = mysqli_fetch_array($jabatan)) {
                             ?>
                             <option value="<?php echo $rowjab['id_jabatan']; ?>"><?php echo $rowjab['nama_jabatan']; ?></option>
                             <?php
                           }
                            ?>
                         </select>
                       </div>
                       <div class="form-group">
                          <label>Golongan</label>
                         <select class="form-control" name="golongan">
                           <option selected disabled>-- Pilih Golongan--</option>
                           <?php
                           $jabatan = mysqli_query($koneksi, "SELECT * FROM golongan");

                           while ($rowjab = mysqli_fetch_array($jabatan)) {
                             ?>
                             <option value="<?php echo $rowjab['id_golongan']; ?>"><?php echo $rowjab['nama_golongan']; ?></option>
                             <?php
                           }
                            ?>
                         </select>
                       </div>
                       <div class="form-group">
                         <button type="submit" class="btn btn-primary">Save changes</button>
                       </div>
                     </form>
                   </div>
                 </div>
               </div>
             </div>

             <div class="modal fade" id="modalviewpegawai<?php echo $row['nip']; ?>">
               <div class="modal-dialog">
                 <div class="modal-content">
                   <div class="modal-header">
                     <h4 class="modal-title">View Pegawai <?php echo $row['nama_pegawai']; ?></h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                     </button>
                   </div>
                   <div class="modal-body">
                     <strong>Nama Lengkap</strong>
                     <p class="text-muted"><?php echo $row['nama_pegawai']; ?></p>
                     <hr>
                     <strong>NIP</strong>
                     <p class="text-muted"><?php echo $row['nip']; ?></p>
                     <hr>
                     <strong>Jabatan</strong>
                     <p class="text-muted"><?php echo $row['nama_jabatan']; ?></p>
                     <hr>
                     <strong>Golongan</strong>
                     <p class="text-muted"><?php echo $row['nama_golongan']; ?></p>
                     <hr>
                   </div>
                 </div>
               </div>
             </div>

             <?php
             $i++;
            }
              ?>
          </tbody>
        </table>
        <div class="modal fade btn-tambah-pegawai" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">

              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Form Tambah Pegawai </h4>
              </div>
              <div class="modal-body">
                <form data-parsley-validate class="form-horizontal form-label-left" method="POST">

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Lengkap</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input class="form-control col-md-7 col-xs-12" type="text" name="nama_lengkap" placeholder="Masukkan Nama">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">NIP</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input class="form-control col-md-7 col-xs-12" type="number" name="nip" placeholder="Masukkan NIP">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Jabatan</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select class="form-control" name="jabatan">
                        <option selected disabled>-- Pilih Jabatan--</option>
                        <?php
                        $jabatan = mysqli_query($koneksi, "SELECT * FROM jabatan");

                        while ($rowjab = mysqli_fetch_array($jabatan)) {
                          ?>
                          <option value="<?php echo $rowjab['id_jabatan']; ?>"><?php echo $rowjab['nama_jabatan']; ?></option>
                          <?php
                        }
                         ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Golongan</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select class="form-control" name="golongan">
                        <option selected disabled>-- Pilih Golongan--</option>
                        <?php
                        $jabatan = mysqli_query($koneksi, "SELECT * FROM golongan");

                        while ($rowjab = mysqli_fetch_array($jabatan)) {
                          ?>
                          <option value="<?php echo $rowjab['id_golongan']; ?>"><?php echo $rowjab['nama_golongan']; ?></option>
                          <?php
                        }
                         ?>
                      </select>
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

</div>

<?php
include'../database/koneksi.php';

if (isset($_POST['submit'])) {
    $namapegawai = $_POST['nama_lengkap'];
    $nippegawai = $_POST['nip'];
    $jabatanpegawai = $_POST['jabatan'];
    $golpegawai = $_POST['golongan'];

    $query = mysqli_query($koneksi, "INSERT INTO pegawai VALUES (null, '$namapegawai','$nippegawai', '$jabatanpegawai', '$golpegawai', 'PENGADILAN AGAMA KARAWANG')");

    if ($query) {
      echo "<script>alert('Data Berhasil Ditambahkan'); document.location='index.php?page=data_pegawai';</script>";
    }else {
      echo "<script>alert('Data Gagal Ditambahkan'); document.location='index.php?page=data_pegawai';</script>";
    }
}
?>
