<!DOCTYPE html>
<html>
<head>
	<title>Ahmad Fatih Abror - A12.2022.06901</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Bootstrap lokal -->
    <link rel="stylesheet" href="bootstrap-5.1.3/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/styleku.css">
	<!-- script src="bootstrap4/jquery/3.3.1/jquery-3.3.1.js"></script -->
	<!-- script src="bootstrap4/js/bootstrap.js"></script -->
	<script src="bootstrap-5.1.3/jquery/3.3.1/jquery-3.3.1.js"></script>
	<script src="bootstrap-5.1.3/dist/js/bootstrap.js"></script>
</head>
<body>
	<?php
	require "fungsi.php";
	require "head.html";
	$npp=$_GET['kode'];
	$sql="select * from dosen where npp='$npp'";
	$qry=mysqli_query($koneksi,$sql);
	$row=mysqli_fetch_assoc($qry);
	?>
	<div class="utama">
		<h2 class="mb-3 text-center">EDIT DATA DOSEN</h2>	
		<div class="row">
		<div class="col-sm-9">
			<form enctype="multipart/form-data" method="post" action="sv_editDosen.php">
				<div class="form-group">
					<label for="npp">NPP:</label>
					<input class="form-control" type="text" name="npp" id="npp" value="<?php echo $row['npp']?>" readonly>
				</div>
				<div class="form-group">
					<label for="namadosen">Nama Dosen:</label>
					<input class="form-control" type="text" name="namadosen" id="namadosen" value="<?php echo $row['namadosen']?>">
				</div>
				<div class="form-group">
					<label for="homebase">Email:</label>
					<input class="form-control" type="text" name="homebase" id="homebase" value="<?php echo $row['homebase']?>">
				</div>				
				<div>		
					<button class="btn btn-primary" type="submit" id="submit">Simpan</button>
				</div>
				<input type="hidden" name="id" id="id" value="<?php echo $npp?>">
			</form>
		</div>
		</div>
	</div>
	
</body>
</html>