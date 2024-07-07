<!DOCTYPE html>
<html>
<head>
	<title>Ahmad Fatih Abror - A12.2022.06901</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap-5.1.3/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/styleku.css">
	
	<script src="bootstrap-5.1.3/jquery/3.3.1/jquery-3.3.1.js"></script>
	<script src="bootstrap-5.1.3/dist/js/bootstrap.js"></script>
</head>
<body>
	<?php
	require "head.html";
	?>
	<div class="utama">		
		<br><br><br>
		<h3>TAMBAH DATA KULIAH TAWAR</h3>
		<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
	  		<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
		</div>	
		<form id="faddMatkul">
			<div class="form-group">
				<label for="idmatkul1">Kode matkul:</label>
				<select class="form-control-ku" name="idmatkul1" id="idmatkul1">
					<option value=''>--- pilih ---
					<?php
					$arrhobe=array('A11','A12','A14','A15','A16','A17','A22','A24','P31');
					foreach($arrhobe as $hb){
						echo "<option value=$hb>$hb";
					}
					?>
				</select>
				<input class="form-control-ku" type="text" name="idmatkul2" id="idmatkul2">
			</div>
			<div class="form-group">
				<label for="nama">NPP :</label>
				<input class="form-control" type="text" name="npp" id="npp">
			</div>
			<div class="form-group">
				<label for="klp1">Kode Kelompok:</label>
				<select class="form-control-ku" name="klp1" id="klp1">
					<option value=''>--- pilih ---
					<?php
					$arrhobe=array('A11','A12','A14','A15','A16','A17','A22','A24','P31');
					foreach($arrhobe as $hb){
						echo "<option value=$hb>$hb";
					}
					?>
				</select>
				<input class="form-control-ku" type="text" name="klp2" id="klp2">
			</div>
			<div class="form-group">
				<label for="sks">Hari :</label>
				<select class="form-control" name="hari" id="hari">
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
				<input class="form-control" type="text" name="jamkul" id="jamkul">
			</div>
			<div class="form-group">
				<label for="nama">Ruang :</label>
				<input class="form-control" type="text" name="ruang" id="ruang">
			</div>
			<div>		
				<button class="btn btn-primary" type="button" id="btnSimpan">Simpan</button>
			</div>
		</form>
	</div>
	<script>
	$(document).ready(function(){
		$("#btnSimpan").on('click', function(){
			var idmatkul1 = $("#idmatkul1").val();
			var idmatkul2 = $("#idmatkul2").val();			
			var npp = $("#npp").val();
			var klp1 = $("#klp1").val();
			var klp2 = $("#klp2").val();
			var hari = $("#hari").val();
			var jamkul = $("#jamkul").val();
			var ruang = $("#ruang").val();
			$.ajax({
				type	: "post",
				url 	: "sv_addKultawar.php",
				data 	: {
					idmatkul1	: idmatkul1,
					idmatkul2 	: idmatkul2,
					npp 	: npp,
					klp1  	: klp1,
					klp2 	: klp2,
					hari 	: hari,
					jamkul  : jamkul,
					ruang   : ruang
				},
				success : function(data){
					$("#idmatkul1").val('');
					$('#idmatkul2').val('');
					$("#npp").val('');
					$('#klp1').val('');
					$('#klp2').val('');
					$('#hari').val('');
					$('#jamkul').val('');
					$('#ruang').val('');
					$('#success').show();
					$('#success').html(data);
				}
			});
		});
	});
	</script>	
</body>
</html>