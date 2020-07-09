<!DOCTYPE html>
<html>
<head>
	<title>Export Data KNP</title>
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
	header("Content-Disposition: attachment; filename=Data KNP Pegawai.xls");
	?>
	<table border="1">
		<tr>
      <th>No</th>
      <th>Nama</th>
      <th>Jabatan</th>
      <th>Golongan</th>
      <th>KNP terakhir</th>
      <th>KNP yang akan datang</th>
      <th>Keterangan</th>
		</tr>
    <?php
      include '../database/koneksi.php';
      $query = mysqli_query($koneksi,"SELECT * FROM knp_pegawai knp, pegawai pg WHERE knp.id_pegawai = pg.id_pegawai");
      $i = 1;
      while ($row = mysqli_fetch_array($query)) {
     ?>
     <tr>
       <td><?php echo $i ?></td>
       <td><?php echo $row['nama_pegawai'] ?></td>
       <td><?php echo $row['jabatan'] ?></td>
       <td><?php echo $row['gol'] ?></td>
       <td><?php echo $row['knp_terakhir'] ?></td>
       <td><?php echo $row['knp_datang'] ?></td>
       <td><?php echo $row['keterangan']; ?></td>
     </tr>

     <?php
     $i++;
   }
      ?>
	</table>
</body>
</html>
