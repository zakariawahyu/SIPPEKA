<div class="page-title">
  <div class="title_left">
    <h3>Golongan</h3>
  </div>

  <div class="title_right">
    <div class="col-md-3 col-sm-3 col-xs-12 pull-right">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="#">Golongan</a></li>
        </ol>
    </div>
  </div>
</div>

<div class="clearfix"></div>

<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <a href="#" class="btn btn-info pull-right" data-toggle="modal" data-target=".btn-tambah-golongan"><i class="fa fa-plus-circle"></i> Tambah Golongan</a>
    <div class="x_panel">
      <div class="x_title">
        <h2>Data Golongan <small>Data golongan pegawai Pengadilan Agama Karawang</small></h2>
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
              <th style="width:5%" >No</th>
              <th>Nama Golongan</th>
              <th class="text-center" style="width:20%">Action</th>
            </tr>
          </thead>
            <tbody>
              <?php
                include '../database/koneksi.php';
                $query = mysqli_query($koneksi,"SELECT * FROM golongan");
                $i = 1;
                while ($row = mysqli_fetch_array($query)) {
               ?>
               <tr>
                 <td><?php echo $i ?></td>
                 <td><?php echo $row['nama_golongan'] ?></td>
                 <td class="text-center">
                   <a href="#" class="btn btn-info" data-toggle="modal" data-target="#modalviewgolongan<?php echo $row['id_golongan'] ?>"><i class="fa fa-eye"></i> View</a>
                   <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modaleditgolongan<?php echo $row['id_golongan'] ?>"><i class="fa fa-edit"></i> Edit</a>
                 </td>
               </tr>

               <div class="modal fade" id="modaleditgolongan<?php echo $row['id_golongan']; ?>">
                 <div class="modal-dialog">
                   <div class="modal-content">
                     <div class="modal-header">
                       <h4 class="modal-title">Form Edit Golongan</h4>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                       </button>
                     </div>
                     <div class="modal-body">
                       <form class="" action="edit_golongan.php" method="get">
                         <div class="form-group">
                           <label>Nama Golongan</label>
                           <input type="hidden" name="id_golongan" value="<?php echo $row['id_golongan']; ?>">
                           <input type="text" name="nama_golongan" class="form-control" value="<?php echo $row['nama_golongan']; ?>">
                         </div>
                         <hr>
                         <div class="form-group">
                           <button type="submit" class="btn btn-primary">Save changes</button>
                         </div>
                       </form>
                     </div>
                   </div>
                 </div>
               </div>

               <div class="modal fade" id="modalviewgolongan<?php echo $row['id_golongan']; ?>">
                 <div class="modal-dialog">
                   <div class="modal-content">
                     <div class="modal-header">
                       <h4 class="modal-title">Nama golongan : <?php echo $row['nama_golongan']; ?></h4>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                       </button>
                     </div>
                     <div class="modal-body">

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
        <div class="modal fade btn-tambah-golongan" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Form Tambah Golongan </h4>
              </div>
              <div class="modal-body">
                <form data-parsley-validate class="form-horizontal form-label-left" method="POST">

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Golongan</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input class="form-control col-md-7 col-xs-12" type="text" name="namagolongan" placeholder="Masukkan nama golongan">
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
      $golongan = $_POST['namagolongan'];

      $selectgol = mysqli_query($koneksi, "SELECT * FROM golongan where nama_golongan='$golongan'");
      $data =  mysqli_fetch_array($selectgol);

      if (empty($data['nama_golongan'])) {
        $query = mysqli_query($koneksi, "INSERT INTO golongan VALUES (null, '$golongan')");

        if ($query) {
          echo "<script>alert('Data Berhasil Ditambahkan'); document.location='index.php?page=data_golongan';</script>";
        }else {
          echo "<script>alert('Data Gagal Ditambahkan'); document.location='index.php?page=data_golongan';</script>";
        }
      } elseif (!empty($data['nama_golongan']) ) {
        echo "<script>alert('Data golongan sudah ada di database !'); document.location='index.php?page=data_golongan';</script>";
      }

  }
  ?>
</div>
