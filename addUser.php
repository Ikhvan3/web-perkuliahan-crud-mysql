<!DOCTYPE html>
<html>
<head>
	<title>Slamet Ikhvan Nurhana Rifki - A12.2022.06882</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Bootstrap lokal -->
    <link rel="stylesheet" href="bootstrap-5.1.3/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/styleku.css">
	<script src="bootstrap-5.1.3/jquery/3.3.1/jquery-3.3.1.js"></script>
	<script src="bootstrap-5.1.3/dist/js/bootstrap.js"></script>
	
	<style>
        body {
            font-family: 'Poppins', sans-serif;
            /* background: linear-gradient(to right, #6a11cb, #2575fc); */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .utama {
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 400px;
        }
        .utama h3 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .input-box {
            position: relative;
            margin-bottom: 20px;
        }
        .input-field {
            width: 100%;
            padding: 10px 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }
        .input-box i {
            position: absolute;
            top: 50%;
            left: 10px;
            transform: translateY(-50%);
            color: #666;
        }
        .submit {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background: blue;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        .submit:hover {
            background: #2575fc;
        }
    </style>

</head>
<body>
	<?php
		require "head.html";
	?>
	<div class="utama">		
		<br><br><br>		
		<h3>TAMBAH USER</h3>
		<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
	  		<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
		</div>	
		<form method="post" action="sv_addUser.php" enctype="multipart/form-data">
		<div class="two-forms">
                <div class="input-box">
                    <input type="text" class="input-field" name="firstname" placeholder="Firstname">
                    <i class="bx bx-user"></i>
                </div>
                <div class="input-box">
                    <input type="text" class="input-field" name="lastname" placeholder="Lastname">
                    <i class="bx bx-user"></i>
                </div>
            </div>
            <div class="input-box">
                <input type="text" class="input-field" name="email" placeholder="Email">
                <i class="bx bx-envelope"></i>
            </div>
            <div class="input-box">
                <input type="password" class="input-field" name="password" placeholder="Password">
                <i class="bx bx-lock-alt"></i>
            </div>
            <div class="input-box">
                <input type="status" class="input-field" name="status" placeholder="Status">
                <i class="bx bx-lock-alt"></i>
            </div>
            <div class="input-box">
                <input type="submit" class="submit" value="Register">
            </div>
		</form>
	</div>

</body>
</html>