<?php
include "../connect.php";

$tenHoa = $_POST['tenHoa'];
$moTa = $_POST['moTa'];
$anh = $_POST['anh'];

$sql = "INSERT INTO flowers (tenHoa, moTa, anh) VALUES ('$tenHoa', '$moTa', '$anh')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "error" => $conn->error]);
}

$conn->close();
?>
