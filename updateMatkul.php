<!DOCTYPE html>
<html>
<head>
	<title>Slamet Ikhvan Nurhana Rifki - A12.2022.06882</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap-5.1.3/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/styleku.css">
	<script src="bootstrap-5.1.3/jquery/3.3.1/jquery-3.3.1.js"></script>
	<script src="bootstrap-5.1.3/dist/js/bootstrap.js"></script>
</head>
<body>
<?php


require "fungsi.php";
require "head.html";

/*	cetak data	*/
if (isset($_POST['cari'])){
	$cari=$_POST['cari'];
	$sql="select * from matkul where idmatkul like'%$cari%' or
						  namamatkul like '%$cari%' or
						  sks like '%$cari%' or
						  jns like '%$cari%' or
						  smt like '%$cari%'";
}else{
	$sql="select * from matkul;";		
}
$hasil=mysqli_query($koneksi,$sql) or die(mysql_error($koneksi));
$kosong=false;
if (!mysqli_num_rows($hasil)){
	$kosong=true;
}
?>
<div class="utama">
	<h2 class="text-center">Daftar Mata Kuliah</h2>
	<span class="float-left">
		<a class="btn btn-danger" href="addMatkul.php">Tambah Data</a>
	</span>
	<span class="float-right">
		<form action="" method="post" class="form-inline">
			<button class="btn btn-danger" type="submit">Cari</button>
			<input class="form-control mr-2 ml-2" type="text" name="cari" placeholder="cari data mata kuliah..." autofocus autocomplete="off">
		</form>
	</span>
	<br><br>	
	<!-- Cetak data dengan tampilan tabel -->
	<table class="table table-hover">
	<thead class="thead-light">
	<tr>
		<th>No.</th>
		<th>Kode</th>
		<th>Nama mata kuliah</th>
		<th>SKS</th>
		<th>Jenis</th>
		<th>Semester</th>
		<th>Aksi</th>
	</tr>
	</thead>
	<tbody>
	<?php
	//jika data tidak ada
	if ($kosong){
		?>
		<tr><th colspan="6">
			<div class="alert alert-info alert-dismissible fade show text-center">
			<!--<button type="button" class="close" data-dismiss="alert">&times;</button>-->
			Data tidak ada
			</div>
		</th></tr>
		<?php
	}else{	
		$no=1;
		while($row=mysqli_fetch_assoc($hasil)){
			?>	
			<tr>
				<td><?php echo $no?></td>
				<td><?php echo $row["idmatkul"]?></td>
				<td><?php echo $row["namamatkul"]?></td>
				<td><?php echo $row["sks"]?></td>
				<td><?php echo $row["jns"]?></td>
				<td><?php echo $row["smt"]?></td>
				<td>
				<a class="btn btn-outline-primary btn-sm" href="editMatkul.php?kode=<?php echo $row['idmatkul']?>">Edit</a>
				<a class="btn btn-outline-danger btn-sm" href="hpsMatkul.php?kode=<?php echo $row["idmatkul"]?>"onclick="return confirm('Yakin dihapus nih?')">Hapus</a></td>
			</tr>
			<?php 
			$no++;
		}
	}
	?>
	</tbody>
	</table>
</div>
</body>
</html>	
