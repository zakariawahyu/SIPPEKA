<!DOCTYPE html>
<html>
<head>
	<title>Export Data Cuti</title>
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
	header("Content-Disposition: attachment; filename=Data Cuti Pegawai.xls");
	?>
	<table border="1">
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Jabatan</th>
      <th>Golongan</th>
      <th>Jenis Cuti</th>
      <th>Alasan Cuti</th>
      <th>Lama Cuti</th>
      <th>Dari Tanggal</th>
      <th>Sampai Dengan</th>
    </tr>
    <?php
      include '../database/koneksi.php';
      $query = mysqli_query($koneksi,"SELECT * FROM cuti_pegawai cuti, pegawai pg, golongan gl, jabatan jb WHERE cuti.id_pegawai = pg.id_pegawai and pg.id_jabatan = jb.id_jabatan and pg.id_golongan = gl.id_golongan");
      $i = 1;
      while ($row = mysqli_fetch_array($query)) {
     ?>
     <tr>
       <td><?php echo $i ?></td>
       <td><?php echo $row['nama_pegawai'] ?></td>
       <td><?php echo $row['nama_jabatan'] ?></td>
       <td><?php echo $row['nama_golongan'] ?></td>
       <td><?php echo $row['jenis_cuti'] ?></td>
       <td><?php echo $row['alasan_cuti']; ?></td>
       <td><?php echo $row['lama_cuti']; ?> <?php echo $row['ket_lama_cuti']; ?></td>
       <td><?php echo $row['dari_tanggal']; ?></td>
       <td><?php echo $row['sampai_dengan']; ?></td>
     </tr>

     <?php
     $i++;
    }
      ?>
	</table>
</body>
</html>
