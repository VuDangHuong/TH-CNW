<?php
require 'flowers.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
    <h1>Quản Lý Các Loài Hoa</h1>
    <table >
        <thead>
            <tr>
                <th>Tên Hoa</th>
                <th>Mô Tả</th>
                <th>Hình Ảnh</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        
        <tbody>
        <?php foreach ($flowers as $key => $flower): ?>
            <tr>
                <td><?= $flower['name'] ?></td>
                <td><?= $flower['description']?></td>
                <td><img src="<?= $flower['imges'] ?>" alt="<?= $flower['name'] ?>"></td>
                <td>
                    <button>Sửa</button>
                    <button>Xóa</button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    </table>
</body>
</html>