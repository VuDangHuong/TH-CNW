function showEditModal(id, name, description, image) {
    // Gán dữ liệu vào modal
    document.getElementById('editId').value = id;
    document.getElementById('editName').value = name;
    document.getElementById('editDescription').value = description;

    // Không thể gán giá trị trực tiếp vào input file, chỉ hiển thị tên ảnh cũ
    const imagePreview = document.getElementById('imagePreview');
    imagePreview.src = image;
    imagePreview.alt = name;

    // Hiển thị modal
    $('#editModal').modal('show');
}
