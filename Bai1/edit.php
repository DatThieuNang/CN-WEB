<?php
include('connect.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Lấy thông tin hoa từ cơ sở dữ liệu
    $sql = "SELECT * FROM flowers WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
}

if(isset($_POST['submit'])) {
    // Lấy dữ liệu từ form
    $name = $_POST['name'];
    $description = $_POST['description'];
    $image = $_POST['image'];

    // Cập nhật dữ liệu vào cơ sở dữ liệu
    $sql = "UPDATE flowers SET name = '$name', description = '$description', image = '$image' WHERE id = $id";
    if(mysqli_query($conn, $sql)) {
        header('Location: index.php');
    } else {
        echo "Lỗi: " . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sửa Hoa</title>
</head>
<body>
    <h1>Sửa thông tin hoa</h1>
    <form action="" method="POST">
        <label for="name">Tên hoa:</label><br>
        <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>"><br><br>

        <label for="description">Mô tả:</label><br>
        <textarea id="description" name="description"><?php echo $row['description']; ?></textarea><br><br>

        <label for="image">Hình ảnh:</label><br>
        <input type="text" id="image" name="image" value="<?php echo $row['image']; ?>"><br><br>

        <input type="submit" name="submit" value="Cập nhật">
    </form>
</body>
</html>
