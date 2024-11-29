<?php
include('connect.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Xóa hoa trong cơ sở dữ liệu
    $sql = "DELETE FROM flowers WHERE id = $id";
    if(mysqli_query($conn, $sql)) {
        echo "Xóa thành công!";
        header('Location: index.php'); // Quay lại trang danh sách
    } else {
        echo "Lỗi: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
