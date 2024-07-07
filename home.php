<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ahmad Fatih Abror - A12.2022.06901</title>
    <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/styleku.css">
		<script src="bootstrap-5.1.3/jquery/3.3.1/jquery-3.3.1.js"></script>
	<script src="bootstrap-5.1.3/dist/js/bootstrap.js"></script>
		<!-- Bootstrap lokal -->
		<link rel="stylesheet" href="bootstrap-5.1.3/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f0f2f5;
            font-family: 'Poppins', sans-serif;
        }
        .dashboard-container {
            max-width: 1300px;
            margin-left: 190px;
            padding: 0 10px;
        }
        .header {
            background: linear-gradient(135deg, #6e8efb, #a777e3);
            color: white;
            padding: 40px;
            border-radius: 20px;
            margin-bottom: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        .card {
            border: none;
            border-radius: 20px;
            transition: all 0.3s ease;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            background: white;
        }
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }
        .card-body {
            padding: 30px;
            position: relative;
            z-index: 1;
        }
        .card-icon {
            font-size: 3rem;
            margin-bottom: 20px;
            background: linear-gradient(135deg, #6e8efb, #a777e3);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .card-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 10px;
        }
        .card-text {
            font-size: 2.5rem;
            font-weight: 700;
            color: #6e8efb;
            margin-bottom: 20px;
        }
        .more-info {
            color: #a777e3;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            transition: all 0.3s ease;
            display: inline-block;
            padding: 5px 15px;
            border-radius: 20px;
            background: #f0f2f5;
        }
        .more-info:hover {
            background: linear-gradient(135deg, #6e8efb, #a777e3);
            color: white;
        }
        .card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            bottom: -50%;
            left: -50%;
            background: linear-gradient(to bottom right, rgba(110, 142, 251, 0.1), rgba(167, 119, 227, 0.1));
            transform: rotate(12deg);
            z-index: 0;
        }
    </style>
</head>
<body>
    <?php
    require "head.html";
    require "fungsi.php";
    
    $jumlahMahasiswa = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as count FROM mhs"))['count'];
    $jumlahDosen = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as count FROM dosen"))['count'];
    $jumlahMataKuliah = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as count FROM matkul"))['count'];
    $jumlahKuliahTawar = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as count FROM kultawar"))['count'];
    $jumlahRegisterUser = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as count FROM users"))['count'];
    ?>

    <div class="dashboard-container">
        <div class="header text-center">
            <h1 class="display-4 fw-bold mb-3">Dashboard Sistem Informasi Akademik</h1>
            <p class="lead mb-0">Ringkasan data dari berbagai bagian akademik</p>
        </div>
        
        <div class="row g-4">
            <div class="col-md-4 col-lg-3">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="card-icon"><i class="fas fa-user-graduate"></i></div>
                        <h5 class="card-title">Mahasiswa</h5>
                        <p class="card-text"><?= $jumlahMahasiswa ?></p>
                        <a href="ajaxUpdateMhs.php" class="more-info">Selengkapnya <i class="fas fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-3">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="card-icon"><i class="fas fa-chalkboard-teacher"></i></div>
                        <h5 class="card-title">Dosen</h5>
                        <p class="card-text"><?= $jumlahDosen ?></p>
                        <a href="ajaxUpdateDosen.php" class="more-info">Selengkapnya <i class="fas fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-3">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="card-icon"><i class="fas fa-book"></i></div>
                        <h5 class="card-title">Mata Kuliah</h5>
                        <p class="card-text"><?= $jumlahMataKuliah ?></p>
                        <a href="updateMatkul.php" class="more-info">Selengkapnya <i class="fas fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-3">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="card-icon"><i class="fas fa-calendar-alt"></i></div>
                        <h5 class="card-title">Kuliah Tawar</h5>
                        <p class="card-text"><?= $jumlahKuliahTawar ?></p>
                        <a href="ajaxUpdateKultawar.php" class="more-info">Selengkapnya <i class="fas fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-3">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="card-icon"><i class="fas fa-user-plus"></i></div>
                        <h5 class="card-title">Register User</h5>
                        <p class="card-text"><?= $jumlahRegisterUser ?></p>
                        <a href="addUser.php" class="more-info">Selengkapnya <i class="fas fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>