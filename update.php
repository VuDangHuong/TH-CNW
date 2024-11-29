<?php
// Nhận dữ liệu từ form
include 'ketnoi.php';
$id = $_POST['sid'];
$ten = $_POST['name'];
$mota = $_POST['description'];

// Thư mục chứa ảnh
$upload_dir = "hoadep/";
$file = $_FILES['image'];
$file_name = basename($file['name']); // Lấy tên file gốc
$target_file = $upload_dir . $file_name;

// Kiểm tra xem tệp ảnh mới có được tải lên không
if (!empty($file['tmp_name'])) {
    // Kiểm tra lỗi tải file
    if ($file['error'] !== UPLOAD_ERR_OK) {
        echo "Lỗi tải file: " . $file['error'];
        exit;
    }
    // Tải tệp lên thư mục
    if (!move_uploaded_file($file['tmp_name'], $target_file)) {
        echo "Lỗi khi tải lên file.";
        exit;
    }
} else {
    // Không tải lên ảnh mới, giữ lại ảnh cũ
    $image_sql = "SELECT image FROM flowers WHERE id = $id";
    $result = mysqli_query($conn, $image_sql);
    if ($row = mysqli_fetch_assoc($result)) {
        $target_file = $row['image']; // Sử dụng ảnh cũ
    } else {
        echo "Không tìm thấy bản ghi với ID: $id";
        exit;
    }
}

// Cập nhật dữ liệu
$update_sql = "UPDATE flowers SET name='$ten', description='$mota', image='$target_file' WHERE id=$id";
if (mysqli_query($conn, $update_sql)) {
    header("Location: lietke.php");
    exit;
} else {
    echo "Lỗi cập nhật dữ liệu: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
