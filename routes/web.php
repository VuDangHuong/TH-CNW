<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IssueController;

// Đường dẫn hiển thị danh sách .. (trang chủ)

Route::get('/', [IssueController::class, 'index'])->name('issues.index');

// Đường dẫn để tạo mới một .. (hiển thị form thêm mới)
Route::get('/issues/create', [IssueController::class, 'create'])->name('issues.create');

// Đường dẫn để lưu dữ liệu .. mới (thực hiện thêm mới)
Route::post('/issues', [IssueController::class, 'store'])->name('issues.store');

// Đường dẫn để hiển thị chi tiết một .. cụ thể (tuỳ chọn)
Route::get('/issues/{id}', [IssueController::class, 'show'])->name('issues.show');

// Đường dẫn để chỉnh sửa thông tin .. (hiển thị form chỉnh sửa)
Route::get('/issues/{id}/edit', [IssueController::class, 'edit'])->name('issues.edit');

Route::put('/issues/{id}', [IssueController::class, 'update'])->name('issues.update');


// Đường dẫn để xóa .. (thực hiện xóa sau khi có modal xác nhận)
 Route::delete('/issues/{id}', [IssueController::class, 'destroy'])->name('issues.destroy');
