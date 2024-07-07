<!DOCTYPE html>
<html>
<head>
	<title>Ahmad Fatih Abror - A12.2022.06901</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap-5.1.3/dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/styleku.css">
	<script src="bootstrap-5.1.3/jquery/3.3.1/jquery-3.3.1.js"></script>
	<script src="bootstrap-5.1.3/dist/js/bootstrap.js"></script>
</head>
<body>
	<?php
	require "fungsi.php";
	require "head.html";
	$idmatkul=$_GET['kode'];
	$sql="select * from kultawar where idmatkul='$idmatkul'";
	$qry=mysqli_query($koneksi,$sql);
	$row=mysqli_fetch_assoc($qry);
	?>
	<div class="utama">
		<h2 class="mb-3 text-center">EDIT DATA KULIAH TAWAR</h2>			
			<form enctype="multipart/form-data" method="post" action="sv_editKultawar.php">
			<div class="form-group">
				<label for="idmatkul">Kode Kuliah Tawar:</label>				
				<input class="form-control" type="text" name="idmatkul" id="idmatkul" value="<?php echo $row['idmatkul']?>" readonly>
				</div>
			<div class="form-group">
				<label for="nama">NPP :</label>
				<input class="form-control" type="text" name="npp" id="npp" value="<?php echo $row['npp']?>" >
			</div>
			<div class="form-group">
				<label for="klp1">Kode Kelompok:</label>
				<select class="form-control-ku" name="klp1" id="klp1" >
					<option value=''>--- pilih ---
					<?php
					$arrhobe=array('A11','A12','A14','A15','A16','A17','A22','A24','P31');
					foreach($arrhobe as $hb){
						echo "<option value=$hb>$hb";
					}
					?>
				</select>
				<input class="form-control-ku" type="text" name="klp2" id="klp2" >
			</div>
			<div class="form-group">
				<label for="sks">Hari :</label>
				<select class="form-control" name="hari" id="hari" >
				<option value=''>--- pilih ---
				<?php
				$arrjns=array('Senin','Selasa','Rabu','Kamis','Jumat');
				foreach($arrjns as $jns){
					echo "<option value=$jns>$jns";
				}
				?>
				</select>
			</div>
			<div class="form-group">
				<label for="nama">Jam Kuliah :</label>
				<input class="form-control" type="text" name="jamkul" id="jamkul" value="<?php echo $row['jamkul']?>" >
			</div>
			<div class="form-group">
				<label for="nama">Ruang :</label>
				<input class="form-control" type="text" name="ruang" id="ruang" value="<?php echo $row['ruang']?>" >
			</div>		
				<div>		
					<button class="btn btn-primary" type="submit">Simpan</button>
				</div>
			</form>
	</div>
</body>
</html>