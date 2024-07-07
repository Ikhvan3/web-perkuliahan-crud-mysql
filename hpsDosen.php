
<?php 
require_once("fungsi.php");

	if(isset($_GET['kode'])){
		$delete = mysqli_query($koneksi, "DELETE FROM dosen WHERE npp = '".$_GET['kode']."' ");
		echo '<script>window.location="ajaxUpdateDosen.php"</script>';
	}

?>
