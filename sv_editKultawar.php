<?php
require "fungsi.php"; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idmatkul = $_POST['idmatkul'];
    $npp = $_POST['npp'];
    $klp=$_POST["klp1"].".".$_POST["klp2"];
    $hari = $_POST['hari'];
    $jamkul = $_POST['jamkul'];
    $ruang = $_POST['ruang'];

    // Buat query update
    $sql = "UPDATE kultawar SET npp='$npp', klp='$klp', hari='$hari', jamkul='$jamkul', ruang='$ruang' WHERE idmatkul='$idmatkul'";

    mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));
	header("location:ajaxUpdateKultawar.php");
}
?>
