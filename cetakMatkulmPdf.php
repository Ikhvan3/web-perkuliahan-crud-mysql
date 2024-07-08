<!DOCTYPE html>
<html>
<head>
	 <title>Slamet Ikhvan Nurhana Rifki - A12.2022.06882</title>
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

							.tengah{
								text-align: center;
							}
			</style>
	<table>
	<tr>
	<th>No</th>
	<th>Kode</th>
	<th>Nama mata kuliah</th>
	<th>SKS</th>
	<th>Jenis</th>
	<th>Semester</th>
	</tr>
	<?php 
	// koneksi  database
	$koneksi = mysqli_connect("localhost","root","","akademikfatih");

	// menampilkan data pegawai
	$data = mysqli_query($koneksi,"select * from matkul");
	while($d = mysqli_fetch_array($data)){
	?>
	<tr>
	<td style='text-align: center;'><?php echo $d['idmatkul'] ?></td>
	<td><?php echo $d["idmatkul"]?></td>
	<td><?php echo $d["namamatkul"]?></td>
	<td><?php echo $d["sks"]?></td>
    <td><?php echo $d["jns"]?></td>
	<td><?php echo $d["smt"]?></td>
	
	</tr>
	<?php 
	}
	?>
		</table>
		<script>
	window.print();
	</script>
</body>
</html>