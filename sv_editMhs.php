<?php
require "fungsi.php";

$id = $_POST["id"];
$nama = $_POST["nama"];
$email = $_POST["email"];
$foto_lama = $_POST["foto_lama"];
$uploadOk = 1;

// Proses upload foto baru jika ada
if(isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
    $folder_upload = "foto/";
    $nama_file = basename($_FILES['foto']['name']);
    $target_file = $folder_upload . $nama_file;
    $jenis_file = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    // Cek jenis file
    if($jenis_file != "jpg" && $jenis_file != "png" && $jenis_file != "jpeg" && $jenis_file != "gif") {
        echo "Maaf, hanya file JPG, JPEG, PNG & GIF yang diperbolehkan.";
        $uploadOk = 0;
    }
    
    // Upload file
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
            // Hapus foto lama jika ada
            if (!empty($foto_lama) && file_exists("foto/" . $foto_lama)) {
                unlink("foto/" . $foto_lama);
            }
            $foto = $nama_file;
        } else {
            echo "Maaf, terjadi kesalahan saat mengupload file.";
            $uploadOk = 0;
        }
    }
} else {
    $foto = $foto_lama; // Jika tidak ada foto baru diupload, gunakan foto lama
}

if ($uploadOk == 1) {
    // Update data mahasiswa
    $sql = "UPDATE mhs SET nama='$nama', email='$email', foto='$foto' WHERE id='$id'";
    if(mysqli_query($koneksi, $sql)) {
        header("location:ajaxUpdateMhs.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }
}
?>