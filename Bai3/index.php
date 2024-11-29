<?php
// Đường dẫn tới tệp CSV
$filename = "KTPM3.csv";

// Mảng để lưu trữ dữ liệu sinh viên
$students = [];

// Mở tệp CSV và đọc dữ liệu
if (($file = fopen($filename, "r")) !== FALSE) {
    // Lấy tiêu đề từ dòng đầu tiên
    $columns = fgetcsv($file, 1000, ",");

    // Đọc dữ liệu từng sinh viên
    while (($row = fgetcsv($file, 1000, ",")) !== FALSE) {
        $students[] = array_combine($columns, $row); // Kết hợp tiêu đề với dữ liệu
    }
    fclose($file); // Đóng tệp sau khi đọc xong
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Sinh Viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center text-primary mb-4">Thông Tin Sinh Viên</h2>
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Mã Sinh Viên</th>
                    <th>Mật Khẩu</th>
                    <th>Họ</th>
                    <th>Tên</th>
                    <th>Thành Phố</th>
                    <th>Email</th>
                    <th>Khóa Học 1</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Duyệt qua mảng sinh viên và hiển thị từng dòng dữ liệu
                foreach ($students as $student) {
                    echo "<tr>";
                    echo "<td>{$student['username']}</td>";
                    echo "<td>{$student['password']}</td>";
                    echo "<td>{$student['lastname']}</td>";
                    echo "<td>{$student['firstname']}</td>";
                    echo "<td>{$student['city']}</td>";
                    echo "<td>{$student['email']}</td>";
                    echo "<td>{$student['course1']}</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
