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

<<<<<<< HEAD
	<!-- Tambahkan style untuk menampilkan pesan kesalahan -->
=======
>>>>>>> 3fc7d5f5d34d94ed7132acf7854cea7a7411c973
	<style>
		.error {
			color: red;
			font-size: 0.9em;
			display: none;
		}
<<<<<<< HEAD
	</style>

	<!-- Tambahkan JavaScript untuk validasi real-time -->
	<script>
		// Fungsi untuk memvalidasi NIM
=======

		#nim {
			width: 150px;
		}
	</style>

	<script>
		// Fungsi untuk mengecek NIM di database
		function checkNIMExists(nim) {
			$.ajax({
				url: 'check_nim.php',
				type: 'POST',
				data: {
					nim: nim
				},
				success: function(response) {
					if (response === 'exists') {
						showError("* Data sudah ada, silahkan isikan yang lain");
						document.getElementById("nim").value = "";
						document.getElementById("nim").focus();
						return false;
					} else {
						hideError();
						document.getElementById("nama").focus();
					}
				}
			});
		}

>>>>>>> 3fc7d5f5d34d94ed7132acf7854cea7a7411c973
		function validateNIM() {
			var nim = document.getElementById("nim").value;
			var errorMsg = "";

			// Cek apakah NIM kosong
<<<<<<< HEAD
			if (nim === "") {
				errorMsg = "NIM tidak boleh kosong.";
			}
			// Cek apakah NIM kurang dari 14 karakter
			else if (nim.length < 14) {
				errorMsg = "NIM harus terdiri dari 14 karakter.";
			}
			

			// Tampilkan pesan kesalahan jika ada
			var errorElement = document.getElementById("nimError");
			if (errorMsg !== "") {
				errorElement.innerText = errorMsg;
				errorElement.style.display = "block";
				document.getElementById("nim").value = ""; // Kosongkan input NIM
				document.getElementById("nim").focus(); // Kembalikan fokus ke input NIM
				return false;
			} else {
				errorElement.style.display = "none"; // Sembunyikan pesan kesalahan jika valid
				return true;
			}
		}

		// Event listener untuk menangani enter key pada input NIM
		function handleEnter(event) {
			if (event.key === "Enter") {
				// Cegah form untuk submit saat menekan Enter
				event.preventDefault();
				// Lakukan validasi NIM saat Enter ditekan
				if (!validateNIM()) {
					// Kosongkan NIM dan kembalikan fokus ke input NIM
					document.getElementById("nim").value = ""; // Kosongkan input NIM
					document.getElementById("nim").focus(); // Kembalikan fokus ke awal
=======
			if (nim.trim() === "") {
				errorMsg = "* NIM tidak boleh kosong!";
				showError(errorMsg);
				return false;
			}
			// Cek panjang NIM
			else if (nim.length !== 14) {
				errorMsg = "* NIM harus terdiri dari 14 karakter (contoh: A12.2023.12345)";
				showError(errorMsg);
				return false;
			}
			// Cek format NIM
			else if (!/^[A-Z]\d{2}\.\d{4}\.\d{5}$/.test(nim)) {
				errorMsg = "* Format NIM tidak sesuai. Gunakan format: A12.2023.12345";
				showError(errorMsg);
				return false;
			}

			return true;
		}

		function showError(message) {
			var errorElement = document.getElementById("nimError");
			errorElement.innerText = message;
			errorElement.style.display = "block";
		}

		function hideError() {
			document.getElementById("nimError").style.display = "none";
		}

		function handleEnter(event) {
			if (event.key === "Enter") {
				event.preventDefault();

				if (validateNIM()) {
					var nim = document.getElementById("nim").value;
					checkNIMExists(nim);
>>>>>>> 3fc7d5f5d34d94ed7132acf7854cea7a7411c973
				}
			}
		}

<<<<<<< HEAD
		// Tambahkan event listener untuk validasi ketika NIM di-enter atau pindah dari field
		window.onload = function() {
			document.getElementById("nim").addEventListener("blur", validateNIM); // Saat keluar dari input NIM
			document.getElementById("nim").addEventListener("keypress", handleEnter); // Tangani Enter key
			document.getElementById("nim").addEventListener("input", function() {
				document.getElementById("nimError").style.display = "none"; // Sembunyikan pesan saat mengetik ulang
			});
=======
		function formatNIM(input) {
			var value = input.value.replace(/\D/g, '');
			var formattedValue = '';

			if (value.length > 0) {
				if (!/[A-Z]/.test(input.value[0])) {
					formattedValue = 'A';
				} else {
					formattedValue = input.value[0];
				}

				if (value.length > 2) {
					formattedValue += value.substr(0, 2) + '.';
				} else {
					formattedValue += value;
				}

				if (value.length > 6) {
					formattedValue += value.substr(2, 4) + '.';
				} else if (value.length > 2) {
					formattedValue += value.substr(2);
				}

				if (value.length > 6) {
					formattedValue += value.substr(6, 5);
				}
			}

			input.value = formattedValue.substr(0, 14);
		}

		window.onload = function() {
			var nimInput = document.getElementById("nim");

			// Event ketika field NIM kehilangan fokus
			nimInput.addEventListener("blur", function() {
				if (validateNIM()) {
					checkNIMExists(this.value);
				}
			});

			nimInput.addEventListener("keypress", handleEnter);

			nimInput.addEventListener("input", function() {
				formatNIM(this);
				hideError();
			});

			nimInput.setAttribute("maxlength", "14");
>>>>>>> 3fc7d5f5d34d94ed7132acf7854cea7a7411c973
		};
	</script>
</head>

<body>
<<<<<<< HEAD
	<div class="utama">		
		<br><br><br>		
		<h3>TAMBAH DATA MAHASISWA</h3>
		<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
	  		<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
		</div>	
		<form method="post" action="sv_addMhs.php" enctype="multipart/form-data" onsubmit="return validateNIM()">
			<div class="form-group">
				<label for="nim">NIM:</label>
				<input class="form-control" type="text" name="nim" id="nim" required>
				<span id="nimError" class="error"> <!-- Pesan error untuk NIM akan ditampilkan di sini --> </span>
=======
	<div class="utama">
		<br><br><br>
		<h3>TAMBAH DATA MAHASISWA</h3>
		<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
		</div>
		<form method="post" action="sv_addMhs.php" enctype="multipart/form-data" onsubmit="return validateNIM()">
			<div class="form-group">
				<label for="nim">NIM:</label>
				<input class="form-control" type="text" name="nim" id="nim"
					placeholder="A12.2023.12345" required>
				<span id="nimError" class="error"></span>
>>>>>>> 3fc7d5f5d34d94ed7132acf7854cea7a7411c973
			</div>
			<div class="form-group">
				<label for="nama">Nama:</label>
				<input class="form-control" type="text" name="nama" id="nama" required>
			</div>
			<div class="form-group">
				<label for="email">Email:</label>
				<input class="form-control" type="email" name="email" id="email" required>
			</div>
			<div class="form-group">
				<label for="foto">Foto</label>
				<input class="form-control" type="file" name="foto" id="foto">
			</div><br>
			<div>
				<button type="submit" class="btn btn-primary" value="Simpan">Simpan</button>
			</div>
		</form>
	</div>
</body>
<<<<<<< HEAD
</html>
=======

</html>
>>>>>>> 3fc7d5f5d34d94ed7132acf7854cea7a7411c973
