<?php
    //memanggil file pustaka fungsi
    require "fungsi.php";

    //memindahkan data kiriman dari form ke var biasa
    $id=$_GET["kode"];

    $sql=$koneksi->query("select * from kultawar where idmatkul='$id'");
    $data=$sql->fetch_assoc();
    $sql=$koneksi->query("select * from kultawar where idmatkul='$id'");
    //membuat query hapus data
    $sql = "delete from kultawar where idmatkul='$id'";
    mysqli_query($koneksi,$sql);
    header("location:ajaxUpdateKultawar.php");
?>