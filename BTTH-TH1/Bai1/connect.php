<?php
$servername = "localhost";
$username = "root"; // Tài khoản mặc định của XAMPP
$password = "";     // Mật khẩu mặc định là rỗng
$dbname = "flower_db";

// Kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>
