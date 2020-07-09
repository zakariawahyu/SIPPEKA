<div class="page-title">
  <div class="title_left">
    <h3>Users</h3>
  </div>

  <div class="title_right">
    <div class="col-md-3 col-sm-3 col-xs-12 pull-right">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="#">Users</a></li>
        </ol>
    </div>
  </div>
</div>

<div class="clearfix"></div>

<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <a href="#" title="Tambah User" class="btn btn-info pull-right" data-toggle="modal" data-target=".btn-tambah-user"><i class="fa fa-plus-circle"></i> Tambah User</a>
    <div class="x_panel">
      <div class="x_title">
        <h2>Data User <small>User yang menggunakan aplikasi DPPA</small></h2>
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
              <th>NIP</th>
              <th>Nama Pegawai</th>
              <th>Jabatan</th>
              <th>Hak Akses</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>
            <tbody>
              <?php
                include '../database/koneksi.php';
                $query = mysqli_query($koneksi,"SELECT * FROM user us, pegawai pg, jabatan jb, golongan gl WHERE us.nip = pg.nip and pg.id_jabatan=jb.id_jabatan and pg.id_golongan=gl.id_golongan order by jb.id_jabatan");
                $i = 1;
                while ($row = mysqli_fetch_array($query)) {
               ?>
               <tr>
                 <td><?php echo $i ?></td>
                 <td><?php echo $row['nip'] ?></td>
                 <td><?php echo $row['nama_pegawai'] ?></td>
                 <td><?php echo $row['nama_jabatan']; ?></td>
                 <td><?php echo $row['role'] ?></td>
                 <td class="text-center">
                   <a href="#" class="btn btn-info" data-toggle="modal" data-target="#modalviewuser<?php echo $row['nip'] ?>"><i class="fa fa-eye"></i> View</a>
                   <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modaledituser<?php echo $row['nip'] ?>"><i class="fa fa-edit"></i> Edit</a>
                 </td>
               </tr>

               <div class="modal fade" id="modaledituser<?php echo $row['nip']; ?>">
                 <div class="modal-dialog">
                   <div class="modal-content">
                     <div class="modal-header">
                       <h4 class="modal-title">Form Edit User</h4>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                       </button>
                     </div>
                     <div class="modal-body">
                       <form class="" action="edit_user.php" method="get">
                         <div class="form-group">
                           <label>Pegawai</label>
                           <select class="form-control" name="pegawai">
                             <option value="<?php echo $row['nip']; ?>"> <?php echo $row['nama_pegawai']; ?></option>
                           </select>
                         </div>
                         <div class="form-group">
                           <label>Password</label>
                           <input type="password" name="password" class="form-control" placeholder="Masukkan Password">
                         </div>
                         <div class="form-group">
                           <label>Hak Akses</label>
                           <select class="form-control" name="hak_akses">
                             <?php if ($row['role'] == "User"): ?>
                               <option value="User" selected>User</option>
                               <option value="Admin">Admin</option>
                             <?php endif?>

                             <?php if ($row['role'] == "Admin"): ?>
                              <option value="User">User</option>
                              <option value="Admin" selected>Admin</option>
                             <?php endif; ?>
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

               <div class="modal fade" id="modalviewuser<?php echo $row['nip']; ?>">
                 <div class="modal-dialog">
                   <div class="modal-content">
                     <div class="modal-header">
                       <h4 class="modal-title">View User <?php echo $row['nama_pegawai']; ?></h4>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                       </button>
                     </div>
                     <div class="modal-body">
                       <h3 class="profile-username text-center"><?php echo $row['role']; ?></h3>
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
                       <strong>Hak Akses Akun</strong>
                       <p class="text-muted"><?php echo $row['role']; ?></p>
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
        <div class="modal fade btn-tambah-user" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Form Tambah User </h4>
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
                         <option value="<?php echo $row['nip']; ?>"><?php echo $row['nama_pegawai']; ?> | <?php echo $row['nip']; ?></option>
                         <?php
                         $i++;
                       }
                          ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Password</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input class="form-control col-md-7 col-xs-12" type="password" name="password" placeholder="Masukkan Password">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Hak Akses</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select class="form-control" name="hak_akses">
                        <option selected disabled>-- Pilih Hak Akses--</option>
                        <option value="User">User</option>
                        <option value="Admin">Admin</option>
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
  <?php
  include'../database/koneksi.php';

  if (isset($_POST['submit'])) {
      $nip = $_POST['pegawai'];
      $password = md5($_POST['password']);
      $hakakses = $_POST['hak_akses'];


      $selectnip = mysqli_query($koneksi, "SELECT * FROM user where nip=$nip");
      $data = mysqli_fetch_array($selectnip);

      if (empty($data['nip'])) {
        $query = mysqli_query($koneksi, "INSERT INTO user VALUES (null, '$nip','$password', '$hakakses', null)");

        if ($query) {
          echo "<script>alert('Data Berhasil Ditambahkan'); document.location='index.php?page=data_user';</script>";
        }else {
          echo "<script>alert('Data Gagal Ditambahkan'); document.location='index.php?page=data_user';</script>";
        }
      } elseif (!empty($data['nip'])) {
        echo "<script>alert('Akun sudah didaftarkan'); document.location='index.php?page=data_user';</script>";
      }

  }
  ?>
</div>
