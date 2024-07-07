<?php 

	include "fungsi.php";

	$data = mysqli_query($koneksi, "SELECT * FROM matkul");

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
<h3 align="center">Data Mata Kuliah</h3>
<table style="border-collapse:collapse;border-spacing:0;" align="center" border="1">
	<thead>
		<tr>
			<th>No.</th>
			<th>Kode</th>
						<th>Nama mata kuliah</th>
						<th>SKS</th>
						<th>Jenis</th>
						<th>Semester</th>
			
			
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
			<td><?php echo $d["idmatkul"]?></td>
							<td><?php echo $d["namamatkul"]?></td>
							<td><?php echo $d["sks"]?></td>
							<td><?php echo $d["jns"]?></td>
							<td><?php echo $d["smt"]?></td>
			
		</tr>
	<?php	
	}
	?>

	</tbody>
</table>
<br>
<div align="center"><a href="cetakPrinterMATKULmPdf.php" target="_blank"><button>Cetak PDF</button></a></div>
</body>
</html>