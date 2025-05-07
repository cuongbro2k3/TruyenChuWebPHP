<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: ../../../../php/error.php");
    exit();
}

include '../../php/check_is_admin.php';

include '../../php/db_connection.php';

$author_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($author_id <= 0) {
    die("ID tác giả không hợp lệ");
}

$sql_author = "SELECT * FROM data_tac_gia WHERE id = $author_id";
$result_author = $conn->query($sql_author);

if (!$result_author) {
    die("Lỗi khi truy vấn thông tin tác giả: " . $conn->error);
}

$author = $result_author->fetch_assoc();

if (!$author) {
    die("Không tìm thấy tác giả với ID: $author_id");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    
    $sql_update = "UPDATE data_tac_gia SET ten_tac_gia = '$name' WHERE id = $author_id";

    if ($conn->query($sql_update) === TRUE) {
        $success = "Cập nhật tên tác giả thành công!";
        $result_author = $conn->query($sql_author);
        $author = $result_author->fetch_assoc();
    } else {
        $error = "Lỗi khi cập nhật: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh Sửa Tác Giả</title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .edit-container {
            max-width: 600px;
            margin: 30px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .form-label {
            font-weight: 600;
        }
        .submit-btn {
            background-color: #6c5ce7;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        .submit-btn:hover {
            background-color: #5649c0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="edit-container">
            <h2 class="text-center mb-4">Chỉnh Sửa Tên Tác Giả</h2>
            
            <?php if(isset($success)): ?>
                <div class="alert alert-success"><?php echo $success; ?></div>
            <?php endif; ?>
            
            <?php if(isset($error)): ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php endif; ?>
            
            <form method="POST">
                <div class="mb-3">
                    <label for="authorName" class="form-label">Tên tác giả</label>
                    <input type="text" class="form-control" id="authorName" name="name" 
                           value="<?php echo htmlspecialchars($author['ten_tac_gia'] ?? ''); ?>" required>
                </div>
                
                <div class="text-center">
                    <button type="submit" class="submit-btn">
                        <i class="fas fa-save"></i> Lưu Thay Đổi
                    </button>
                    <a href="list_tac_gia.php" class="btn btn-secondary ms-2">
                        <i class="fas fa-arrow-left"></i> Quay lại
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>