<?php 

	include "fungsi.php";

	$data = mysqli_query($koneksi, "SELECT * FROM kultawar");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Ahmad Fatih Abror - A12.2022.06901</title>
	<style type="text/css">
		td{
			padding: 3px 3px;
		}
	</style>
</head>
<body>
<h3 align="center">Data Kuliah Tawar</h3>
<table style="border-collapse:collapse;border-spacing:0;" align="center" border="1">
	<thead>
		<tr>
			<th>No.</th>
			<th>Kode Matkul</th>
			<th>NPP</th>
			<th>Kelompok</th>
			<th>Hari</th>
			<th>Jam Kuliah</th>
			<th>Ruang</th>
			
			
		</tr>
	</thead>
	<tbody>
	<?php 
	$no=0;
		while ($row = mysqli_fetch_assoc($data)) {
		$no++;
	?>	
		<tr>
			<td><?php echo $no?></td>
			<td><?php echo $d['idmatkul']; ?></td>
	<td><?php echo $d['npp']; ?></td>
	<td><?php echo $d['klp']; ?></td>
	<td><?php echo $d['hari']; ?></td>
	<td><?php echo $d['jamkul']; ?></td>
	<td><?php echo $d['ruang']; ?></td>
			
		</tr>
	<?php	
	}
	?>

	</tbody>
</table>
<br>
<div align="center"><a href="cetakPrinterKULTAWARmPdf.php" target="_blank"><button>Cetak PDF</button></a></div>
</body>
</html>