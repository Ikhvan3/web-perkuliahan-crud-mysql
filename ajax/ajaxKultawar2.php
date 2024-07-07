<?php
			//memanggil file berisi fungsi2 yang sering dipakai
			require "../fungsi.php";
			require "../head.html";
			$keyword=$_GET["keyword"];
			$jmlDataPerHal = 2;
			/*	---- cetak data per halaman ---------	*/
			//--------- konfigurasi
			//pencarian data
			$sql="select * from kultawar where idmatkul like'%$keyword%' or
							npp like '%$keyword%' or
							klp like '%$keyword%' or
							hari like '%$keyword%' or
							jamkul like '%$keyword%' or
							ruang like '%$keyword%'";
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
			
				$sql="select * from kultawar where idmatkul like'%$keyword%' or
							npp like '%$keyword%' or
							klp like '%$keyword%' or
							hari like '%$keyword%' or
							jamkul like '%$keyword%' or
							ruang like '%$keyword%'
									limit $awalData,$jmlDataPerHal";
			
									//$sql="select * from mhs limit $awalData,$jmlDataPerHal";		
			//Ambil data untuk ditampilkan
			$hasil=mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));
		?>
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
					$hasil=mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));
					$no=1;
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
					
							?>
				</tbody>
			</table>
		</div>	
</body>
</html>	