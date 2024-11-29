<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Quản lý hoa</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <h1>Quản lý danh sách hoa</h1>
  <table id="flower-table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Tên Hoa</th>
        <th>Mô Tả</th>
        <th>Ảnh</th>
        <th>Hành Động</th>
      </tr>
    </thead>
    <tbody></tbody>
  </table>
  <button onclick="addFlower()">Thêm Hoa</button>

  <script>
    function loadFlowers() {
      fetch("api/get_flowers.php")
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            const tbody = document.querySelector("#flower-table tbody");
            tbody.innerHTML = "";
            data.data.forEach(flower => {
              const row = document.createElement("tr");
              row.innerHTML = `
                <td>${flower.id}</td>
                <td>${flower.tenHoa}</td>
                <td>${flower.moTa}</td>
                <td><img src="${flower.anh}" width="100"></td>
                <td>
                  <button onclick="editFlower(${flower.id})">Sửa</button>
                  <button onclick="deleteFlower(${flower.id})">Xóa</button>
                </td>
              `;
              tbody.appendChild(row);
            });
          }
        });
    }

    function addFlower() {
      const tenHoa = prompt("Tên hoa:");
      const moTa = prompt("Mô tả:");
      const anh = prompt("Link ảnh:");
      fetch("api/add_flower.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: new URLSearchParams({ tenHoa, moTa, anh })
      }).then(() => loadFlowers());
    }

    function deleteFlower(id) {
      fetch("api/delete_flower.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: new URLSearchParams({ id })
      }).then(() => loadFlowers());
    }

    loadFlowers();
  </script>
</body>
</html>
