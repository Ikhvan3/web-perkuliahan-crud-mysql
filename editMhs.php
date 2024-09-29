<!DOCTYPE html>
<html>
<head>
    <title>Slamet Ikhvan Nurhana Rifki - A12.2022.06882</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap-5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/styleku.css">
    <script src="bootstrap-5.1.3/jquery/3.3.1/jquery-3.3.1.js"></script>
    <script src="bootstrap-5.1.3/dist/js/bootstrap.js"></script>
</head>
<body>
    <?php
    require "fungsi.php";
    require "head.html";
    $id = $_GET['kode'];
    $sql = "SELECT * FROM mhs WHERE id='$id'";
    $qry = mysqli_query($koneksi, $sql);
    $row = mysqli_fetch_assoc($qry);
    ?>
    <div class="utama">
        <h2 class="mb-3 text-center">EDIT DATA MAHASISWA</h2>    
        <div class="row">
            <div class="col-sm-3 text-center">
                <img class="rounded img-thumbnail" src="foto/<?php echo $row['foto']?>" id="preview">
            </div>
            <div class="col-sm-9">
                <form enctype="multipart/form-data" method="post" action="sv_editMhs.php">
                    <div class="form-group">
                        <label for="nim">NIM:</label>
                        <input class="form-control" type="text" name="nim" id="nim" value="<?php echo $row['nim']?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input class="form-control" type="text" name="nama" id="nama" value="<?php echo $row['nama']?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input class="form-control" type="email" name="email" id="email" value="<?php echo $row['email']?>">
                    </div>
                    <div class="form-group">
                        <label for="foto">Ganti Foto:</label>
                        <input class="form-control" type="file" name="foto" id="foto" onchange="previewImage(this);">
                    </div>
                    <div class="mt-3">        
                        <button class="btn btn-primary" type="submit" id="submit">Simpan</button>
                    </div>
                    <input type="hidden" name="id" id="id" value="<?php echo $id?>">
                    <input type="hidden" name="foto_lama" value="<?php echo $row['foto']?>">
                </form>
            </div>
        </div>
    </div>
    
    <script>
    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    </script>
</body>
</html>