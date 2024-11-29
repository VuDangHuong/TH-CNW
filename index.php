<?php
require 'flowers.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Người Dùng</title>
    
</head>
<body>
    <h1>Danh sách các loài hoa</h1>
    <div class="flower-list">
    <?php foreach ($flowers as $flower): ?>
            <div class="flower-item">
            <img src="<?= $flower['imges'] ?>" alt="<?= $flower['name'] ?>">
                <h2><?= $flower['name'] ?></h2>
                <p><?= $flower['description']?></p>
            </div>
            <?php endforeach;?>
    </div>
</body>
</html>