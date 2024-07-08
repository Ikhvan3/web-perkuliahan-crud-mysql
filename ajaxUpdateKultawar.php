<!DOCTYPE html>
<html>
	<head>
		<title>Slamet Ikhvan Nurhana Rifki - A12.2022.06882</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/styleku.css">
		<script src="bootstrap-5.1.3/jquery/3.3.1/jquery-3.3.1.js"></script>
	<script src="bootstrap-5.1.3/dist/js/bootstrap.js"></script>
		<!-- Bootstrap lokal -->
		<link rel="stylesheet" href="bootstrap-5.1.3/dist/css/bootstrap.min.css">
		<!-- Use fontawesome 5-->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	</head>
	<body>
		<?php
			//memanggil file berisi fungsi2 yang sering dipakai
			require "fungsi.php";
			require "head.html";

			/*	---- cetak data per halaman ---------	*/

			//--------- konfigurasi
			//jumlah data per halaman
			$jmlDataPerHal = 4;

			//pencarian data
			if (isset($_POST['cari'])){
				$cari=$_POST['cari'];
				$sql="select * from kultawar where idmatkul like'%$cari%' or
									npp like '%$cari%' or
									klp like '%$cari%' or
									hari like '%$cari%' or
									jamkul like '%$cari%' or
									ruang like '%$cari%'";
			}else{
				$sql="select * from kultawar";		
			}

			$qry = mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));
			$jmlData = mysqli_num_rows($qry);

			// CEIL() digunakan untuk mengembalikan nilai integer terkecil yang lebih besar dari 
			//atau sama dengan angka.
			$jmlHal = ceil($jmlData / $jmlDataPerHal);

			if (isset($_GET['hal'])){
				$halAktif=$_GET['hal'];
			}else{
				$halAktif=1;
			}

			$awalData=($jmlDataPerHal * $halAktif)-$jmlDataPerHal;

			//Jika tabel data kosong
			$kosong=false;
			if (!$jmlData){
				$kosong=true;
			}

			//Klausa LIMIT digunakan untuk membatasi jumlah baris yang dikembalikan oleh pernyataan SELECT
			//data berdasar pencarian atau tidak
			if (isset($_POST['cari'])){
				$cari=$_POST['cari'];
				$sql="select * from kultawar where idmatkul like'%$cari%' or
									npp like '%$cari%' or
									klp like '%$cari%' or
									hari like '%$cari%' or
									jamkul like '%$cari%' or
									ruang like '%$cari%'
									limit $awalData,$jmlDataPerHal";
			}else{
				$sql="select * from kultawar limit $awalData,$jmlDataPerHal";		
			}

			//Ambil data untuk ditampilkan
			$hasil=mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));

		?>
		<div class="utama">
			<h2 class="text-center">Daftar Kuliah Tawar</h2>
			<div class="text-center"><a href="cetakKultawarmPdf.php"><span class="fas fa-print">&nbsp;Print</span></a></div>
			<span class="float-left">
				<a class="btn btn-success" href="addKultawar.php">Tambah Data</a>
			</span>
			<span class="float-right">
				<form action="" method="post" class="form-inline">
					<button class="btn btn-success" type="submit" name="cari" id="tombol-cari"> Cari</button>
					<input class="form-control mr-2 ml-2" type="text" name="cari" placeholder="cari data kuliah tawar..." autofocus autocomplete="off" id="keyword">
				</form>
			</span>
			<br><br>

			<ul class="pagination">
				<?php
					//navigasi pagination
					//cetak navigasi back
					if ($halAktif>1){
						$back=$halAktif-1;
						//$back=$halAktif;
						echo "<li class='page-item'><a class='page-link' href=?hal=$back>&laquo;</a></li>";
					}
					//cetak angka halaman
					for($i=1;$i<=$jmlHal;$i++){
						if ($i==$halAktif){
							echo "<li class='page-item'><a class='page-link' href=?hal=$i style='font-weight:bold;color:red;'>$i</a></li>";
						}else{
							
							echo "<li class='page-item'><a class='page-link' href=?hal=$i>$i</a></li>";
						}	
					}
					//cetak navigasi forward
					if ($halAktif<$jmlHal){
						$forward=$halAktif+1;
						echo "<li class='page-item'><a class='page-link' href=?hal=$forward>&raquo;</a></li>";
					}
				?>
			</ul>	

		<div id="container">		
			<!-- Cetak data dengan tampilan tabel -->
			<table class="table table-hover">
				<thead class="thead-light">
					<tr>
						<th>No.</th>
						<th>Kode Matkul</th>
						<th>NPP</th>
						<th>Kelompok</th>
						<th>Hari</th>
						<th>Jam Kuliah</th>
						<th>Ruang</th>
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
						// $awalData==0, data kalau tampail di page pertama, maka 
						if($awalData==0){
							$no=$awalData+1;
						}else{
							//$no=$awalData;
							$no=$awalData+1;
						}
						while($row=mysqli_fetch_assoc($hasil)){
					?>	
						<tr>
							<td><?php echo $no?></td>
							<td><?php echo $row["idmatkul"]?></td>
							<td><?php echo $row["npp"]?></td>
							<td><?php echo $row["klp"]?></td>
							<td><?php echo $row["hari"]?></td>
							<td><?php echo $row["jamkul"]?></td>
							<td><?php echo $row["ruang"]?></td>
							<td>
								<a class="btn btn-outline-primary btn-sm" href="editKultawar.php?kode=<?php echo $row['idmatkul']?>">Edit</a>
								<a class="btn btn-outline-danger btn-sm" href="hpsKultawar.php?kode=<?php echo $row["idmatkul"]?>" id="linkHps" onclick="return confirm('Yakin dihapus nih?')">Hapus</a>
							</td>
						</tr>
								<?php 
									$no++;
						}
					}
							?>
				</tbody>
			</table>
		</div>	
		
	</div>
	<script src="js/scriptKultawar.js"> </script>

</body>
</html>	
