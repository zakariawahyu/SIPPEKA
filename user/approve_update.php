<?php
	include("../database/koneksi.php");
  include("../build/config/library.php");
  $nippegawai = $_GET['nip'];
  $id = $_GET['id'];
	$now = date('Y-m-d');
	$Sql = "SELECT * FROM cuti_pegawai ct, pegawai pg, jabatan jb, golongan gl WHERE ct.id_pegawai=pg.id_pegawai AND pg.id_jabatan=jb.id_jabatan AND pg.id_golongan=gl.id_golongan AND pg.nip='$nippegawai' and ct.id_cutipegawai='$id'";
	$Qry = mysqli_query($koneksi, $Sql);
	$data = mysqli_fetch_array($Qry);
  $jabatan = $data['nama_jabatan'];



?>



<div class="page-title">
  <div class="title_left">
    <h3>Approve Cuti Pegawai</h3>
  </div>

  <div class="title_right">
    <div class="col-md-3 col-sm-3 col-xs-12 pull-right">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="#">Approve Cuti</a></li>
        </ol>
    </div>
  </div>
</div>

<div class="clearfix"></div>

<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_content">
        <form class="form-horizontal" name="cuti" action="approval_setuju.php" method="POST">
          <div class="panel panel-default">
            <div class="panel-heading"><h3>Review Pengajuan Cuti</h3></div>
            <div class="panel-body">
              <div class="form-group">
                <label class="control-label col-sm-3">Nama Pegawai</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" value="<?php echo $data['nama_pegawai'];?> " readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3">NIP Pegawai</label>
                <div class="col-sm-4">
                  <input type="text"  class="form-control" value="<?php echo $data['nip'];?> " readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3">Jabatan Pegawai</label>
                <div class="col-sm-4">
                  <input type="text"  class="form-control" value="<?php echo $data['nama_jabatan'];?> " readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3">Golongan</label>
                <div class="col-sm-4">
                  <input type="text"  class="form-control" value="<?php echo $data['nama_golongan'];?> " readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3">Jenis Cuti</label>
                <div class="col-sm-4">
                  <input type="text"  class="form-control" value="<?php echo $data['jenis_cuti'];?> " readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3">Alasan Cuti</label>
                <div class="col-sm-4">
                  <input type="text"  class="form-control" value="<?php echo $data['alasan_cuti'];?> " readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3">Durasi</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" value="<?php echo $data['lama_cuti']?> <?php echo $data['ket_lama_cuti']; ?> " readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3">Tanggal Mulai Cuti</label>
                <div class="col-sm-4">
                  <input type="text"  class="form-control" value="<?php echo IndonesiaTgl($data['dari_tanggal']);?> " readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3">Tanggal Akhir Cuti</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" value="<?php echo IndonesiaTgl($data['sampai_dengan']);?> " readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3">Status Pengajuan</label>
                <div class="col-sm-4">
                  <input type="hidden" name="idcuti" value="<?php echo $data['id_cutipegawai']; ?>">
                  <input type="text" class="form-control" value="<?php echo $data['status_cuti'];?> <?php echo $data['ket_status_cuti']; ?> " readonly>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3">Aksi</label>
                <div class="col-sm-4">
                  <select name="aksi" id="aksi" class="form-control" required>
                    <option value="" selected disabled>---- Pilih Aksi ----</option>
                    <?php
                    if ($jabatan == 'JURU SITA' || $jabatan =='JURU SITA PENGGANTI' || $jabatan == 'PANITERA PENGGANTI' || $jabatan == 'PANMUD HUKUM' || $jabatan == 'PANMUD GUGATAN' || $jabatan == 'PANMUD HUKUM' || $jabatan == 'KASUBAG KEPEGAWAIAN DAN ORTALA' || $jabatan == 'KASUBAG PERNCANAAN, IT DAN PELAPORAN' || $jabatan == 'KASUBAG UMUM DAN KEUANGAN') {
                      // Approval Panitera / Sekretaris
                      $qrystatus = mysqli_query($koneksi, "SELECT * FROM cuti_pegawai ct, pegawai pg WHERE ct.id_pegawai=pg.id_pegawai and pg.nip='$nippegawai' and app_panmud_kasubag=1 and app_panitera_sekretaris=0 and app_ketua=1 and panitera_sekretaris='$nip'");
                      $hasil = mysqli_fetch_array($qrystatus);

                      if (!empty($hasil['nama_pegawai'])) {

                        ?>
                        <option value="panitera_sekretaris">Disetujui</option>
                        <option value="Perubahan">Perubahan</option>
                        <option value="Ditangguhkan">Ditangguhkan</option>
                        <option value="Tidak Disetujui">Tidak Disetujui</option>
                        <?php
                      }

                    } elseif ($jabatan == 'PANITERA' || $jabatan == 'SEKRETARIS' || $jabatan == 'HAKIM UTAMA MUDA' || $jabatan=='HAKIM MADYA UTAMA' || $jabatan =='WAKIL KETUA') {
                      // Approval Ketua
                      $qrystatus = mysqli_query($koneksi, "SELECT * FROM cuti_pegawai ct, pegawai pg WHERE ct.id_pegawai=pg.id_pegawai and pg.nip='$nippegawai' and app_panmud_kasubag=1 and app_panitera_sekretaris=1 and app_ketua=0 and ketua='$nip'");
                      $hasil = mysqli_fetch_array($qrystatus);

                      if (!empty($hasil['nama_pegawai'])) {

                        ?>
                        <option value="ketua">Disetujui</option>
                        <option value="Perubahan">Perubahan</option>
                        <option value="Ditangguhkan">Ditangguhkan</option>
                        <option value="Tidak Disetujui">Tidak Disetujui</option>
                        <?php
                      }
                    } elseif ($jabatan == 'STAFF PELAKSANA PANMUD HUKUM' || $jabatan == 'STAFF PELAKSANA PANMUD GUGATAN' || $jabatan == 'STAFF PELAKSANA PANMUD PERMOHONAN') {
                      // Approval staff Panmud
                      $qrystatus = mysqli_query($koneksi, "SELECT * FROM cuti_pegawai ct, pegawai pg WHERE ct.id_pegawai=pg.id_pegawai and pg.nip='$nippegawai' and app_panmud_kasubag=0 and app_panitera_sekretaris=0 and app_ketua=1 and panmud_kasubag='$nip'");
                      $hasil = mysqli_fetch_array($qrystatus);

                      $qrystatus2 = mysqli_query($koneksi, "SELECT * FROM cuti_pegawai ct, pegawai pg WHERE ct.id_pegawai=pg.id_pegawai and pg.nip='$nippegawai' and app_panmud_kasubag=1 and app_panitera_sekretaris=0 and app_ketua=1 and panitera_sekretaris='$nip'");
                      $hasil2 = mysqli_fetch_array($qrystatus2);

                      if (!empty($hasil['nama_pegawai'])) {

                        ?>
                        <option value="196311151993031004">Disetujui</option>
                        <option value="Perubahan">Perubahan</option>
                        <option value="Ditangguhkan">Ditangguhkan</option>
                        <option value="Tidak Disetujui">Tidak Disetujui</option>
                        <?php
                      } elseif (!empty($hasil2['nama_pegawai'])) {
                        ?>
                        <option value="panitera_sekretaris">Disetujui</option>
                        <option value="Perubahan">Perubahan</option>
                        <option value="Ditangguhkan">Ditangguhkan</option>
                        <option value="Tidak Disetujui">Tidak Disetujui</option>
                        <?php
                      }
                    } elseif ($jabatan == 'STAFF PELAKSANA KEPEGAWAIAN DAN ORTALA' || $jabatan == 'STAFF PELAKSANA PERNCANAAN, IT DAN PELAPORAN' || $jabatan == 'STAFF PELAKSANA UMUM DAN KEUANGAN') {
                      // Approval staff Kasubag
                      $qrystatus = mysqli_query($koneksi, "SELECT * FROM cuti_pegawai ct, pegawai pg WHERE ct.id_pegawai=pg.id_pegawai and pg.nip='$nippegawai' and app_panmud_kasubag=0 and app_panitera_sekretaris=0 and app_ketua=1 and panmud_kasubag='$nip'");
                      $hasil = mysqli_fetch_array($qrystatus);

                      $qrystatus2 = mysqli_query($koneksi, "SELECT * FROM cuti_pegawai ct, pegawai pg WHERE ct.id_pegawai=pg.id_pegawai and pg.nip='$nippegawai' and app_panmud_kasubag=1 and app_panitera_sekretaris=0 and app_ketua=1 and panitera_sekretaris='$nip'");
                      $hasil2 = mysqli_fetch_array($qrystatus2);

                      if (!empty($hasil['nama_pegawai'])) {

                        ?>
                        <option value="197208161994031002">Disetujui</option>
                        <option value="Perubahan">Perubahan</option>
                        <option value="Ditangguhkan">Ditangguhkan</option>
                        <option value="Tidak Disetujui">Tidak Disetujui</option>
                        <?php
                      } elseif (!empty($hasil2['nama_pegawai'])) {
                        ?>
                        <option value="panitera_sekretaris">Disetujui</option>
                        <option value="Perubahan">Perubahan</option>
                        <option value="Ditangguhkan">Ditangguhkan</option>
                        <option value="Tidak Disetujui">Tidak Disetujui</option>
                        <?php
                      }
                    }

                     ?>

                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3">Keterangan</label>
                <div class="col-sm-4">
                  <textarea name="reject" id="reject" class="form-control" placeholder="Masukkan Keterangan" rows="3" disabled></textarea>
                </div>
              </div>
            </div>
            <div class="panel-footer">
              <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
            </div>
          </div><!-- /.panel -->
        </form>
      </div>
    </div>
  </div>
</div>
