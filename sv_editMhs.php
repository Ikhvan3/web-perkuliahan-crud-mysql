<?php

require "fungsi.php";


$id=$_POST["id"];
$nama=$_POST["nama"];
$email=$_POST["email"];
$uploadOk=1;

//membuat query
$sql="update mhs set nama='$nama',
					 email='$email'
					 where id='$id'";
mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));
header("location:ajaxUpdateMhs.php");
?>