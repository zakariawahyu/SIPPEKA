<div class="page-title">
  <div class="title_left">
    <h3>Approval Cuti</h3>
  </div>

  <div class="title_right">
    <div class="col-md-3 col-sm-3 col-xs-12 pull-right">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="#">Approval Cuti</a></li>
        </ol>
    </div>
  </div>
</div>

<div class="clearfix"></div>

<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Daftar Approval Cuti <small>Cuti yang perlu persetujuan</small> </h2>
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
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIP</th>
                <th>Jabatan</th>
                <th>Jenis Cuti</th>
                <th>Alasan Cuti</th>
                <th>Durasi Cuti</th>
                <th>Dari Tanggal</th>
                <th>Sampai Dengan</th>
                <th>Status</th>
                <th>Keterangan</th>
                <th>Action</th>
              </tr>
            </tr>
          </thead>


          <tbody>
            <?php
              include '../database/koneksi.php';
              $selectjabatan = mysqli_query($koneksi, "SELECT * FROM pegawai pg, jabatan jb WHERE nip='$nip' and pg.id_jabatan=jb.id_jabatan");
              $rowselect = mysqli_fetch_array($selectjabatan);
              $jabatanpegawai = $rowselect['nama_jabatan'];
              if ($jabatanpegawai =='PANMUD HUKUM' || $jabatanpegawai =='PANMUD HUKUM GUGATAN' || $jabatanpegawai =='PANMUD HUKUM PERMOHONAN' || $jabatanpegawai =='KASUBAG KEPEGAWAIAN DAN ORTALA' || $jabatanpegawai =='KASUBAG PERNCANAAN, IT DAN PELAPORAN' || $jabatanpegawai =='KASUBAG UMUM DAN KEUANGAN') {
                $query = mysqli_query($koneksi, "SELECT *  FROM cuti_pegawai ct, pegawai pg, jabatan jb, golongan gl WHERE panmud_kasubag='$nip' and app_panmud_kasubag=0 and ct.id_pegawai=pg.id_pegawai and pg.id_jabatan=jb.id_jabatan and pg.id_golongan=gl.id_golongan and status_cuti='Diajukan'");
              } elseif ($jabatanpegawai == 'PANITERA' || $jabatanpegawai == 'SEKRETARIS') {
                $query = mysqli_query($koneksi, "SELECT * FROM cuti_pegawai ct, pegawai pg, jabatan jb, golongan gl WHERE panitera_sekretaris='$nip' and app_panitera_sekretaris=0 and ct.id_pegawai=pg.id_pegawai and pg.id_jabatan=jb.id_jabatan and pg.id_golongan=gl.id_golongan and status_cuti='Diajukan'");
              } elseif ($jabatanpegawai == 'KETUA') {
                $query = mysqli_query($koneksi, "SELECT * FROM cuti_pegawai ct, pegawai pg, jabatan jb, golongan gl WHERE ketua='$nip' and app_ketua=0 and ct.id_pegawai=pg.id_pegawai and pg.id_jabatan=jb.id_jabatan and pg.id_golongan=gl.id_golongan and status_cuti='Diajukan'");
              }

              $i = 1;
              while ($row = mysqli_fetch_array($query)) {
             ?>
             <tr>
               <td><?php echo $i ?></td>
               <td><?php echo $row['nama_pegawai'] ?></td>
               <td><?php echo $row['nip']; ?></td>
               <td><?php echo $row['nama_jabatan'] ?></td>
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
               <td>
                 <a href="#" class="btn btn-info" data-toggle="modal" data-target="#modalviewcuti<?php echo $row['id_cutipegawai'] ?>"><i class="fa fa-eye"></i> View</a>
                 <a href="index.php?page=approval_cuti&nip=<?php echo $row['nip']; ?>&id=<?php echo $row['id_cutipegawai']; ?>" class="btn btn-danger"><i class="fa fa-check"></i> Approve</a>
               </td>
             </tr>

             <div class="modal fade" id="modalviewcuti<?php echo $row['id_cutipegawai']; ?>">
               <div class="modal-dialog">
                 <div class="modal-content">
                   <div class="modal-header">
                     <h4 class="modal-title">Detail Pengajuan Cuti Pegawai <?php echo $row['nama_pegawai']; ?></h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                     </button>
                   </div>
                   <div class="modal-body">
                     <strong>Nama lengkap</strong>
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
                     <strong>Jenis pengajuan cuti</strong>
                     <p class="text-muted"><?php echo $row['jenis_cuti']; ?></p>
                     <hr>
                     <strong>Alasan cuti</strong>
                     <p class="text-muted"><?php echo $row['alasan_cuti']; ?></p>
                     <hr>
                     <strong>Durasi cuti selama</strong>
                     <p class="text-muted"><?php echo $row['lama_cuti']; ?> <?php echo $row['ket_lama_cuti']; ?></p>
                     <hr>
                     <strong>Tanggal mulai cuti</strong>
                     <p class="text-muted"><?php echo $row['dari_tanggal']; ?></p>
                     <hr>
                     <strong>Tanggal akhir cuti</strong>
                     <p class="text-muted"><?php echo $row['sampai_dengan']; ?></p>
                     <hr>
                     <strong>Status</strong>
                     <p class="text-muted"><?php echo $row['status_cuti'];  ?> <?php echo $row['ket_status_cuti']; ?></p>
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
      </div>
    </div>
  </div>

</div>
