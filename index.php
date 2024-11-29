<?php
include 'ketnoi.php';
$lietke_sql = "SELECT *FROM flowers";
$result = mysqli_query($conn, $lietke_sql);
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
        <?php while ($r = mysqli_fetch_assoc($result)) { ?>
            <div class="flower-item">
                <img src="<?php echo $r['image']; ?>" alt="<?php echo $r['name']; ?>">
                <h2><?php echo $r['name']; ?></h2>
                <p><?php echo $r['description']; ?></p>
            </div>
        <?php } ?>
    </div>
</body>
</html>