<?php
require "fungsi.php";

if (isset($_POST['nim'])) {
    $nim = $_POST['nim'];

    // Prepared statement untuk mencegah SQL injection
    $stmt = $koneksi->prepare("SELECT nim FROM mhs WHERE nim = ?");
    $stmt->bind_param("s", $nim);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "exists";
    } else {
        echo "not_exists";
    }

    $stmt->close();
}
