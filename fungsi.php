<?php
$koneksi = mysqli_connect("localhost","root","","akademikfatih");
 

if (mysqli_connect_errno()){
	echo "Gagal melakukan koneksi ke MySQL: " . mysqli_connect_error();
}
echo "Koneksi sukses";
//mysqli_close($koneksi);
?>