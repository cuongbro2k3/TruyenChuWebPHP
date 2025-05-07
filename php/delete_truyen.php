<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: error.php");
    exit();
}

include 'check_is_admin.php';

$id_truyen = $_GET['id'] ?? 0;

include 'db_connection.php';

// Kiểm tra truyện có tồn tại không
$sql_check = "SELECT * FROM data_truyen WHERE id = $id_truyen";
$result = $conn->query($sql_check);

if ($result->num_rows == 0) {
    $_SESSION['error'] = "Truyện không tồn tại!";
    header("Location: ../html/admin/list_truyen.php");
    exit();
}

$row_truyen = $result->fetch_assoc();
$image_path = $row_truyen['image_truyen'];

$conn->begin_transaction();

try {
    // Xóa tất cả chương của truyện
    $sql_delete_chapters = "DELETE FROM data_chapter WHERE id_truyen = $id_truyen";
    $conn->query($sql_delete_chapters);

    // Xóa truyện
    $sql_delete_story = "DELETE FROM data_truyen WHERE id = $id_truyen";
    $conn->query($sql_delete_story);

    $conn->commit();

    // Xóa ảnh nếu có
    if (!empty($image_path) && file_exists($image_path)) {
        unlink($image_path);
    }

    $_SESSION['success'] = "Đã xóa truyện và tất cả chương liên quan thành công!";
} catch (Exception $e) {
    $conn->rollback();
    $_SESSION['error'] = "Lỗi khi xóa truyện: " . $e->getMessage();
}

$conn->close();

header("Location: ../html/admin/list_truyen.php");
exit();
?>
