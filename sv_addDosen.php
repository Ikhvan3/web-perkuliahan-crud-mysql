<?php
//memanggil file pustaka fungsi
require "fungsi.php";

//memindahkan data kiriman dari form ke var biasa
$npp=$_POST["npp"];
$namadosen=$_POST["namadosen"];
$homebase=$_POST["homebase"];

		$sql="insert dosen values('$npp','$namadosen','$homebase')";
		mysqli_query($koneksi,$sql);
    echo '<script>alert("Data berhasil ditambahkan!")</script>';
            echo '<script>window.location="ajaxUpdateDosen.php"</script>';
?>