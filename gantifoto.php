<!DOCTYPE html>
<html>
<head>
	<title>Slamet Ikhvan Nurhana Rifki - A12.2022.06882</title>
	<link rel="stylesheet" type="text/css" href="bootstrap-5.1.3/dist/css/bootstrap.css">
</head>
<body>
	<?php
	//panggil file pustaka fungsi
	require "fungsi.php";
	
	//buat query
	$id=$_GET['id'];
	$sql="select * from mhs where id='$id'";
	$hasil=mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));
	$row=mysqli_fetch_assoc($hasil);
	
	//panggil file layout header
	require "head.html";
	?>
	<div class="container">
		<h2 class="mb-5 text-center">GANTI FOTO MAHASISWA</h2>	
		<div class="row">
			<div class="col-sm-4">
				<div class="text-center">
					<img class="img-fluid" src="<?php echo $row['foto']?>">
					<p><?php echo $row['nim']." - ".$row['nama']?></p>
				</div>	
			</div>	
			<div class="col-sm-8">
				<form class="form-inline" method="post" action="simpanGantifoto.php" enctype="multipart/form-data">				 
				<input class="form-control mr-2" type="file" name="foto" id="foto">
				<input type="hidden" name="id" value="<?php echo $id?>">
				<button class="btn btn-primary" type="submit">Simpan</button>
				</form>
			</div>
		</div>	
	</div>	
</body>
</html>