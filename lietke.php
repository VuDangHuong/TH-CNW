<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="style.css">
  <script src="https://kit.fontawesome.com/df7bf82e3d.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
    <h1>Danh sách hoa</h1>
    <!-- Button to Open the Modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Thêm mới
    </button>
    </br>
    <table class="table">
    <thead>
      <tr>
        <th>STT</th>
        <th>Ảnh Hoa</th>
        <th>Tên Hoa</th>
        <th>Mô Tả</th>
        <th>Sửa</th>
        <th>Xóa</th>
      </tr>
    </thead>
    <tbody>
    
    <?php
        //ketnoi
        require_once 'ketnoi.php';
        //câu lệnh
        $lietke_sql = "SELECT *FROM flowers";
        //thuc thi câu lệnh
        $result = mysqli_query($conn, $lietke_sql);
        //duyệt qua result và in ra
        while($r = mysqli_fetch_assoc($result)){
            ?>
            
            <tr>
            <td><?php echo $r['id'] ;?></td>
            <td><img src="<?php echo $r['image']; ?>" alt="<?php echo $r['name']; ?>"></td>
            <td><?php echo $r['name']; ?></td>
            <td><?php echo $r['description']; ?></td>
            <td>
            <button type="button" class="btn btn-primary" onclick="showEditModal(<?php echo $r['id']; ?>, '<?php echo $r['name']; ?>','<?php echo $r['description']; ?>', '<?php echo $r['image']; ?>')">
                <i class="fa-regular fa-pen-to-square"></i>
            </button>
            </td>

            <td><a onclick="return confirm('Bạn muốn xóa sản phẩm này không?');" href="xoa.php?sid=<?php echo $r['id'];?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a></td>
            </tr>
            <?php
        }
    ?>
    </tbody>
    </table>
    </div>
    <!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <h4>FORM Thêm Nhạc</h4>
      <form action="them.php" method="post" enctype="multipart/form-data">
      <div class="form-group">
                <label for="name">Tên Hoa</label>
                <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
                <label for="description">Mô tả</label>
                <input type="text" name="description" id="description" class="form-control">
            </div>
            <div class="form-group">
                <label for="image">Ảnh</label>
                <input type="file" name="image" id="image" class="form-control" accept="image/*" required>
            </div>
      <button type="submit" class="btn btn-primary">Thêm hoa</button>
    </form>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<!-- Modal Sửa -->
<div class="modal" id="editModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Chỉnh sửa sản phẩm</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <form action="update.php" method="post" enctype="multipart/form-data">
          <input type="hidden" id="editId" name="sid">
          <div class="form-group">
            <label for="editName">Tên Hoa</label>
            <input type="text" id="editName" class="form-control" name="name">
          </div>
          <div class="form-group">
            <label for="editDescription">Mô tả</label>
            <input type="text" id="editDescription" class="form-control" name="description">
          </div>
          <div class="form-group">
            <label for="editImage">Ảnh hiện tại</label>
            <img id="imagePreview" src="" alt="Image preview" style="width: 100px; height: auto; display: block; margin-bottom: 10px;">
            <label for="editImage">Chọn ảnh mới</label>
            <input type="file" name="image" id="editImage" class="form-control" accept="image/*">
        </div>
          <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
      </div>
    </div>
</body>
<script src="main.js"></script>
</html>