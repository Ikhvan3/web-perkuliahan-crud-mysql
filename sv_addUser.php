
<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once 'db_connect.php';

    $firstname = $_POST['firstname'] ?? '';
    $lastname = $_POST['lastname'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $status = $_POST['status'] ?? '';

    if (empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($status)) {
        echo "Semua field harus diisi.";
    } else {
        // Gunakan password_hash untuk mengenkripsi password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO users (firstname, lastname, email, password, status) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $firstname, $lastname, $email, $hashed_password, $status);
        
        if ($stmt->execute()) {
            $_SESSION['user_id'] = $conn->insert_id;
            header("Location: addUser.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
        
        $stmt->close();
    }
    $conn->close();
} else {
    echo "This script only accepts POST requests.";
}

?>