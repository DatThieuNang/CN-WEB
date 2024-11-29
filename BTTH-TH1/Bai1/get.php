<?php
include "../connect.php";

$sql = "SELECT * FROM flowers";
$result = $conn->query($sql);

$data = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

header("Content-Type: application/json");
echo json_encode(["success" => true, "data" => $data]);

$conn->close();
?>
