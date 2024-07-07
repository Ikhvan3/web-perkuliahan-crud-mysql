<?php
//memanggil file pustaka fungsi
require "fungsi.php";

//memindahkan data kiriman dari form ke var biasa
$idmatkul=$_POST["idmatkul1"].".".$_POST["idmatkul2"];
$npp=$_POST["npp"];
$klp=$_POST["klp1"].".".$_POST["klp2"];
$hari=$_POST["hari"];
$jamkul=$_POST["jamkul"];
$ruang=$_POST["ruang"];

// simpan data
$sql = "INSERT INTO kultawar (idmatkul, npp, klp, hari, jamkul, ruang) VALUES ('$idmatkul', '$npp', '$klp', '$hari', '$jamkul', '$ruang')";
if (mysqli_query($koneksi, $sql)) {
    echo "Data telah tersimpan";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
}

// header("location:addKultawar.php");
?>