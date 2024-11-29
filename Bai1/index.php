<?php
include('connect.php');

$sql = "SELECT * FROM flowers";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vườn Hoa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Vườn Hoa Đại Học Thuỷ lợi</h1>
    <table>
        <thead>
            <tr>
                <th>Tên hoa</th>
                <th>Mô tả</th>
                <th>Hình ảnh</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
        <?php
            while ($row = mysqli_fetch_assoc($result)) {
              echo "<tr>";
              echo "<td>{$row['name']}</td>";
              echo "<td>{$row['description']}</td>";
              echo "<td><img src='{$row['image']}' alt='{$row['name']}' width='100'></td>";
              echo "<td>
                    <a href='edit.php?id={$row['id']}' title='Sửa'><i class='fas fa-pen-to-square'></i></a> | 
                    <a href='delete.php?id={$row['id']}' title='Xóa' onclick='return confirm(\"Bạn có chắc chắn muốn xóa hoa này không?\")'><i class='fas fa-trash'></i></a>
                    </td>";
              echo "</tr>";
}
        ?>
        </tbody>
    </table>
</body>
</html>

<?php
mysqli_close($conn);
?>
<script src="https://kit.fontawesome.com/80a3f9c11b.js" crossorigin="anonymous"></script>