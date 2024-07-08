<?php 

	include "fungsi.php";

	$data = mysqli_query($koneksi, "SELECT * FROM matkul");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Slamet Ikhvan Nurhana Rifki - A12.2022.06882</title>
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
			
	<?php	
	}
	?>

	</tbody>
</table>
<br>

</body>
</html>

<?php 

	//Meload library mPDF
	require 'vendor/autoload.php';

	//Membuat inisialisasi objek mPDF
	$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4','margin_top' => 25, 'margin_bottom' => 25, 'margin_left' => 25, 'margin_right' => 25]);

	//Memasukkan output yang diambil dari output buffering ke variabel html
	$html = ob_get_contents();

	//Menghapus isi output buffering
	ob_end_clean();

	$mpdf->WriteHTML(utf8_encode($html));

	//Membuat output file
	$content = $mpdf->Output("daftar matakuliah.pdf", "D");

?>