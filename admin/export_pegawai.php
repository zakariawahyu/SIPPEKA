<!DOCTYPE html>
<html>
<head>
	<title>Export Data Pegawai</title>
</head>
<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;

	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>
  <?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data Pegawai.xls");
	?>

	<table border="1">
		<tr>
      <th>No</th>
      <th>Nama</th>
      <th>Jabatan</th>
      <th>Golongan</th>
      <th>KNP terakhir</th>
      <th>KNP yang akan datang</th>
      <th>Keterangan KNP</th>
      <th>Pensiun</th>
      <th>KGB terakhir</th>
      <th>KGB yang akan datang</th>
      <th>Keterangan KGB</th>
      <th>Jenis Cuti</th>
      <th>Alasan Cuti</th>
      <th>Lama Cuti</th>
      <th>Dari Tanggal</th>
      <th>Sampai Dengan</th>
		</tr>
    <?php
      include '../database/koneksi.php';
      $query = mysqli_query($koneksi,"SELECT * FROM pegawai pg, jabatan jb, golongan gl WHERE pg.id_jabatan = jb.id_jabatan and pg.id_golongan = gl.id_golongan");
      $i = 1;
      while ($row = mysqli_fetch_array($query)) {
        $id = $row['id_pegawai']
     ?>
     <tr>
       <td><?php echo $i ?></td>
       <td><?php echo $row['nama_pegawai'] ?></td>
       <td><?php echo $row['nama_jabatan'] ?></td>
       <td><?php echo $row['nama_golongan'] ?></td>
       <td>
         <?php
            $query1 = mysqli_query($koneksi,"SELECT * FROM pegawai pg, knp_pegawai knp where pg.id_pegawai = knp.id_pegawai and knp.id_pegawai='$id'");

            while ($row1 = mysqli_fetch_array($query1)) {
              echo $row1['knp_terakhir'];
              ?>
              <br><br>
              <?php
            }
          ?>
       </td>
       <td>
         <?php
            $query1 = mysqli_query($koneksi,"SELECT * FROM pegawai pg, knp_pegawai knp where pg.id_pegawai = knp.id_pegawai and knp.id_pegawai='$id'");

            while ($row1 = mysqli_fetch_array($query1)) {
              echo $row1['knp_datang'];
              ?>
              <br><br>
              <?php
            }
          ?>
       </td>
       <td>
         <?php
            $query1 = mysqli_query($koneksi,"SELECT * FROM pegawai pg, knp_pegawai knp where pg.id_pegawai = knp.id_pegawai and knp.id_pegawai='$id'");

            while ($row1 = mysqli_fetch_array($query1)) {
              echo $row1['keterangan'];
              ?>
              <br><br>
              <?php
            }
          ?>
       </td>
       <td>
         <?php
            $query1 = mysqli_query($koneksi,"SELECT * FROM pegawai pg, knp_pegawai knp where pg.id_pegawai = knp.id_pegawai and knp.id_pegawai='$id'");

            while ($row1 = mysqli_fetch_array($query1)) {
              echo $row1['pensiun'];
              ?>
              <br><br>
              <?php
            }
          ?>
       </td>
       <td>
         <?php
            $query1 = mysqli_query($koneksi,"SELECT * FROM pegawai pg, kgb_pegawai kgb where pg.id_pegawai = kgb.id_pegawai and kgb.id_pegawai='$id'");

            while ($row1 = mysqli_fetch_array($query1)) {
              echo $row1['kgb_terakhir'];
              ?>
              <br><br>
              <?php
            }
          ?>
       </td>
       <td>
         <?php
            $query1 = mysqli_query($koneksi,"SELECT * FROM pegawai pg, kgb_pegawai kgb where pg.id_pegawai = kgb.id_pegawai and kgb.id_pegawai='$id'");

            while ($row1 = mysqli_fetch_array($query1)) {
              echo $row1['kgb_datang'];
              ?>
              <br><br>
              <?php
            }
          ?>
       </td>
       <td>
         <?php
            $query1 = mysqli_query($koneksi,"SELECT * FROM pegawai pg, kgb_pegawai kgb where pg.id_pegawai = kgb.id_pegawai and kgb.id_pegawai='$id'");

            while ($row1 = mysqli_fetch_array($query1)) {
              echo $row1['keterangan'];
              ?>
              <br><br>
              <?php
            }
          ?>
       </td>
       <td>
         <?php
            $query1 = mysqli_query($koneksi,"SELECT * FROM pegawai pg, cuti_pegawai cuti where pg.id_pegawai = cuti.id_pegawai and cuti.id_pegawai='$id'");

            while ($row1 = mysqli_fetch_array($query1)) {
              echo $row1['jenis_cuti'];
              ?>
              <br><br>
              <?php
            }
          ?>
       </td>
       <td>
         <?php
            $query1 = mysqli_query($koneksi,"SELECT * FROM pegawai pg, cuti_pegawai cuti where pg.id_pegawai = cuti.id_pegawai and cuti.id_pegawai='$id'");

            while ($row1 = mysqli_fetch_array($query1)) {
              echo $row1['alasan_cuti'];
              ?>
              <br><br>
              <?php
            }
          ?>
       </td>
       <td>
         <?php
            $query1 = mysqli_query($koneksi,"SELECT * FROM pegawai pg, cuti_pegawai cuti where pg.id_pegawai = cuti.id_pegawai and cuti.id_pegawai='$id'");

            while ($row1 = mysqli_fetch_array($query1)) {
               $lama = $row1['lama_cuti'];
               $ket = $row1['ket_lama_cuti'];

               echo '$lama'.' '.'$ket';
              ?>
              <br><br>
              <?php
            }
          ?>
       </td>
       <td>
         <?php
            $query1 = mysqli_query($koneksi,"SELECT * FROM pegawai pg, cuti_pegawai cuti where pg.id_pegawai = cuti.id_pegawai and cuti.id_pegawai='$id'");

            while ($row1 = mysqli_fetch_array($query1)) {
              echo $row1['dari_tanggal'];
              ?>
              <br><br>
              <?php
            }
          ?>
       </td>
       <td>
         <?php
            $query1 = mysqli_query($koneksi,"SELECT * FROM pegawai pg, cuti_pegawai cuti where pg.id_pegawai = cuti.id_pegawai and cuti.id_pegawai='$id'");

            while ($row1 = mysqli_fetch_array($query1)) {
              echo $row1['sampai_dengan'];
              ?>
              <br><br>
              <?php
            }
          ?>
       </td>
       
     </tr>

     <?php
     $i++;
   }
      ?>
	</table>
</body>
</html>
