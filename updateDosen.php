<!DOCTYPE html>
<html>
	<head>
		<title>Ahmad Fatih Abror - A12.2022.06901</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- Bootstrap lokal -->
    <link rel="stylesheet" href="bootstrap-5.1.3/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/styleku.css">

		
		<script src="bootstrap-5.1.3/jquery/3.3.1/jquery-3.3.1.js"></script>
		<script src="bootstrap-5.1.3/dist/js/bootstrap.js"></script>
		
		
	</head>
	<body>
		<?php
			
			require "fungsi.php";
			require "head.html";

			
			$jmlDataPerHal = 5;

			//pencarian data
			if (isset($_POST['cari'])){
				$cari=$_POST['cari'];
				$sql="select * from dosen where npp like'%$cari%' or
									namadosen like '%$cari%' or
									homebase like '%$cari%'";
			}else{
				$sql="select * from dosen";		
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
				$sql="select * from dosen where npp like'%$cari%' or
									namadosen like '%$cari%' or
									homebase like '%$cari%'
									limit $awalData,$jmlDataPerHal";
			}else{
				$sql="select * from dosen limit $awalData,$jmlDataPerHal";		
			}

			//Ambil data untuk ditampilkan
			$hasil=mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));

		?>
		<div class="utama">
			<h2 class="text-center">Daftar Dosen</h2>
			<div class="text-center"><a href="prnDosenPdf.php"><span class="fas fa-print">&nbsp;Print</span></a></div>
			<span class="float-left">
				<a class="btn btn-success" href="addDosen.php">Tambah Data</a>
								
			</span>
			
			<!-- pencarian dapat mengcopy dari bootstrap ambil dari navbar di modifikasi -->
			<form class="d-flex" action="" method="POST" style="float:right;">
        		<button class="btn btn-outline-success" style="background-color:green" type="submit">pencarian</button>
				<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="cari">
        		
      </form>
			

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

			<!-- Cetak data dengan tampilan tabel -->
			<table class="table table-hover">
				<thead class="thead-light">
					<tr>
						<th>No.</th>
						<th>NPP</th>
						<th>Nama Dosen</th>
						<th>Homebase</th>
						<th>Aksi</th>
					</tr>
				</thead>
				
				<tbody>
					<?php
						//jika data tidak ada
						if ($kosong){
					?>
						<tr><th colspan="5">
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
							<td><?php echo $row["npp"]?></td>
							<td><?php echo $row["namadosen"]?></td>
							<td><?php echo $row["homebase"]?></td>
							<td>
								<a class="btn btn-outline-primary btn-sm" href="editDosen.php?kode=<?php echo $row['npp']?>">Koreksi</a>
								<a class="btn btn-outline-danger btn-sm" href="hpsDosen.php?kode=<?php echo $row["npp"]?>" id="linkHps" onclick="return confirm('Apakah yakin ingin menghapus data?')">Hapus</a>
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
</body>
</html>	