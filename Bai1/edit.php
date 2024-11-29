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
    
    $sql = "SELECT * FROM flowers WHERE id = $id";
    $result = $conn->query($sql);
    $flower = $result->fetch_assoc();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $image = $_POST['image'];


        $sql = "UPDATE flowers SET name='$name', description='$description', image='$image' WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            echo "Cập nhật thành công!";
        } else {
            echo "Lỗi: " . $conn->error;
        }
    }
}

?>
<html>
<head>
    <title>Sửa thông tin hoa</title>
</head>
<body>
    <h2>Sửa thông tin hoa</h2>
    <form method="POST" action="">
        <label for="name">Tên hoa:</label>
        <input type="text" id="name" name="name" value="<?php echo $flower['name']; ?>" required><br><br>

        <label for="description">Mô tả:</label>
        <textarea id="description" name="description" required><?php echo $flower['description']; ?></textarea><br><br>

        <label for="image">Ảnh:</label>
        <input type="text" id="image" name="image" value="<?php echo $flower['image']; ?>" required><br><br>

        <input type="submit" value="Cập nhật">
    </form>
</body>
</html>
<?php
$conn->close();
?>
