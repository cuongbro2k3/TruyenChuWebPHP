<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: error.php");
    exit();
}

include 'check_is_admin.php';

$id_tac_gia = $_GET['id'] ?? 0;

include 'db_connection.php';

$sql_check = "SELECT * FROM data_tac_gia WHERE id = $id_tac_gia";
$result = $conn->query($sql_check);

if ($result->num_rows == 0) {
    $_SESSION['error'] = "Tác giả không tồn tại!";
    header("Location: ../html/admin/list_tac_gia.php");
    exit();
}

$conn->begin_transaction();

try {
    $sql_get_images = "SELECT image_truyen FROM data_truyen WHERE tac_gia = $id_tac_gia";
    $result_images = $conn->query($sql_get_images);
    $images_to_delete = [];
    
    while ($row = $result_images->fetch_assoc()) {
        if (!empty($row['image_truyen'])) {
            $images_to_delete[] = $row['image_truyen'];
        }
    }

    $sql_delete_chapters = "DELETE c FROM data_chapter c 
                          JOIN data_truyen t ON c.id_truyen = t.id 
                          WHERE t.tac_gia = $id_tac_gia";
    $conn->query($sql_delete_chapters);
    
    $sql_delete_stories = "DELETE FROM data_truyen WHERE tac_gia = $id_tac_gia";
    $conn->query($sql_delete_stories);
    
    $sql_delete_author = "DELETE FROM data_tac_gia WHERE id = $id_tac_gia";
    $conn->query($sql_delete_author);
    
    $conn->commit();
    
    foreach ($images_to_delete as $image_path) {
        if (file_exists($image_path)) {
            unlink($image_path);
        }
    }
    
    $_SESSION['success'] = "Đã xóa tác giả, tất cả truyện liên quan và ảnh bìa thành công!";
} catch (Exception $e) {
    $conn->rollback();
    $_SESSION['error'] = "Lỗi khi xóa: " . $e->getMessage();
}

$conn->close();

header("Location: ../html/admin/list_tac_gia.php");
exit();
?>