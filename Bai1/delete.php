<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "flowers_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM flowers WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo "Xóa thành công!";
        header("Location: index.php");
    } else {
        echo "Lỗi: " . $conn->error;
    }
}

$conn->close();
?>
