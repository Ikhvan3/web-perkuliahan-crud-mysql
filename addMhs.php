<!DOCTYPE html>
<html>
<head>
	<title>Slamet Ikhvan Nurhana Rifki - A12.2022.06882</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Bootstrap lokal -->
    <link rel="stylesheet" href="bootstrap-5.1.3/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/styleku.css">
	<!-- script src="bootstrap-5.3.0-alpha2-dist/jquery/3.3.1/jquery-3.3.1.js"></script -->
	<!-- script src="bootstrap-5.3.0-alpha2-dist/js/bootstrap.js"></script -->
	<script src="bootstrap-5.1.3/jquery/3.3.1/jquery-3.3.1.js"></script>
	<script src="bootstrap-5.1.3/dist/js/bootstrap.js"></script>
</head>
<body>
	<?php
	//require "head.html";
	?>
	<div class="utama">		
		<br><br><br>		
		<h3>TAMBAH DATA MAHASISWA</h3>
		<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
	  		<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
		</div>	
		<form method="post" action="sv_addMhs.php" enctype="multipart/form-data">
			<div class="form-group">
				<label for="nim">NIM:</label>
				<input class="form-control" type="text" name="nim" id="nim" required>
			</div>
			<div class="form-group">
				<label for="nama">Nama:</label>
				<input class="form-control" type="text" name="nama" id="nama" required>
			</div>
			<div class="form-group">
				<label for="email">Email:</label>
				<input class="form-control" type="email" name="email" id="email" required>
			</div>
			<div class="form-group">
				<label for="foto">Foto</label> 
				<input class="form-control" type="file" name="foto" id="foto">
			</div><br>
			<div>		
				<button type="submit" class="btn btn-primary" value="Simpan">Simpan</button>
			</div>
		</form>
	</div>
</body>
</html>