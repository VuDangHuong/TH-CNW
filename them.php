<?php
//nhan du lieu tu form
include 'ketnoi.php'; // Đảm bảo kết nối đã được include trước

$ten = $_POST['name'];
$mota = $_POST['description'];
// Xử lý file ảnh tải lên
$upload_dir = "hoadep/"; // Thư mục chứa ảnh
$file = $_FILES['image']; // Lấy thông tin file từ form
$file_name = basename($file['name']); // Lấy tên file gốc
$target_file = $upload_dir . $file_name; // Đường dẫn đầy đủ tới file
// Kiểm tra và di chuyển file vào thư mục `hoadep/`
if (move_uploaded_file($file['tmp_name'], $target_file)) {
    // Chèn dữ liệu vào database
    $them_sql = "INSERT INTO flowers(name, description, image) VALUES ('$ten', '$mota', '$target_file')";
    if (mysqli_query($conn, $them_sql)) {
        header("Location: lietke.php"); // Chuyển hướng về trang danh sách sau khi thêm
        exit;
    } else {
        echo "Lỗi thêm dữ liệu: " . mysqli_error($conn);
    }
} else {
    echo "Lỗi khi tải lên file.";
}
// Đóng kết nối database
mysqli_close($conn);
?>