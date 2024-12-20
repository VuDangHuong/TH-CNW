<?php
// lấy dữ liêu ud cần xóa
include 'ketnoi.php';
$flower_id = $_GET['sid'];
//echo $id

//cau lenh sql
 // Kiểm tra xem ID có tồn tại trong bảng
 $check_sql = "SELECT * FROM flowers WHERE id = $flower_id";
 $result = mysqli_query($conn, $check_sql);
 if (mysqli_num_rows($result) > 0) {
    // Thực hiện câu lệnh xóa
    $xoa_sql = "DELETE FROM flowers WHERE id = $flower_id";
    if (mysqli_query($conn, $xoa_sql)) {
        // Xóa thành công
        echo "<script>alert('Xóa thành công!'); window.location.href = 'lietke.php';</script>";
    } else {
        // Lỗi trong khi xóa
        echo "<script>alert('Có lỗi xảy ra khi xóa dữ liệu!'); window.location.href = 'lietke.php';</script>";
    }
} else {
    // ID không tồn tại
    echo "<script>alert('Không tìm thấy ID tương ứng!'); window.location.href = 'lietke.php';</script>";
}
//echo "<h1>Xóa thành công</h1>";
//trở về trang liệt kể
//header("Location: lietke.php");
mysqli_close($conn);
?>