<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: ../../../../php/error.php");
    exit();
}

include '../../php/check_is_admin.php';

$id = $_SESSION['id'];
include '../../php/db_connection.php';
$sql_account = "SELECT * FROM account WHERE id = $id";
$result_account = $conn->query($sql_account);
$user = $result_account->fetch_assoc();

$story_id = $_GET['id'] ?? 0;

$sql_story = "SELECT * FROM data_truyen WHERE id = $story_id";
$result_story = $conn->query($sql_story);
$story = $result_story->fetch_assoc();

$sql_categories = "SELECT * FROM data_the_loai";
$result_categories = $conn->query($sql_categories);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $category_id = $_POST['category'];
    $status = $_POST['status']; 
    
    if (!empty($_FILES['image']['name'])) {
        $target_dir = "../../images/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
    
        if (!empty($story['image_truyen']) && file_exists("../../" . $story['image_truyen'])) {
            unlink("../../" . $story['image_truyen']);
        }
    
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        $image_path = $target_file;
    } else {
        $image_path = $story['image_truyen'];
    }
    

    $sql_update = "UPDATE data_truyen 
                  SET ten_truyen = '$name', 
                      gioi_thieu = '$description', 
                      the_loai = $category_id, 
                      image_truyen = '$image_path',
                      trang_thai = $status
                  WHERE id = $story_id";

    if ($conn->query($sql_update) === TRUE) {
        $success = "Cập nhật truyện thành công!";
        $result_story = $conn->query($sql_story);
        $story = $result_story->fetch_assoc();
    } else {
        $error = "Lỗi khi cập nhật: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../../css/app.css">
    <link rel="stylesheet" href="../../css/edit_story.css">

    <title>Chỉnh Sửa Truyện - Demo Truyện</title>
    <meta name="description" content="Chỉnh sửa thông tin truyện trên hệ thống Demo Truyện">
</head>

<body>
    <header class="header d-none d-lg-block">
        <nav class="navbar navbar-expand-lg navbar-dark header__navbar p-md-0">
            <div class="container">
                <a class="navbar-brand" href="../home.php">
                    <img src="../../images/logo/logo.png" alt="" class="img-fluid" style="width: 100px;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a href="profile.php?id=<?php echo $user['id']; ?>" class="nav-link" role="button" aria-expanded="false">
                                <i class="fas fa-user-circle me-1"></i> <?php echo $user['name']; ?>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="../../php/logout.php" class="nav-link" role="button" aria-expanded="false">
                                <i class="fas fa-sign-out-alt me-1"></i> Đăng xuất
                            </a>
                        </li>
                    </ul>

                    <form class="d-flex header__form-search" action="../search.php" method="GET">
                        <input class="form-control search-story" type="text" placeholder="Tìm kiếm" name="key" value="">
                        <button class="btn" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>
            </div>
        </nav>
    </header>

    <div class="container my-5">
        <div class="edit-container">
            <a href="list_truyen.php" class="back-btn">
                <i class="fas fa-arrow-left me-2"></i> Quay lại danh sách truyện
            </a>
            
            <div class="edit-header">
                <h1 class="edit-title"><i class="fas fa-edit me-2"></i>Chỉnh Sửa Truyện</h1>
            </div>
            
            <?php if(isset($success)): ?>
                <div class="alert alert-success mb-4"><?php echo $success; ?></div>
            <?php endif; ?>
            
            <?php if(isset($error)): ?>
                <div class="alert alert-danger mb-4"><?php echo $error; ?></div>
            <?php endif; ?>
            
            <form method="POST" enctype="multipart/form-data">
                <div class="mb-4">
                    <label for="storyName" class="form-label">Tên truyện</label>
                    <input type="text" class="form-control" id="storyName" name="name" 
                           value="<?php echo htmlspecialchars($story['ten_truyen'] ?? ''); ?>" required>
                </div>
                
                <div class="mb-4">
                    <label class="form-label">Ảnh bìa hiện tại</label>
                    <?php if (!empty($story['image_truyen'])): ?>
                        <img src="../<?php echo $story['image_truyen']; ?>" class="current-image" alt="Ảnh bìa hiện tại">
                    <?php else: ?>
                        <p class="text-muted">Chưa có ảnh bìa</p>
                    <?php endif; ?>
                    
                    <label class="form-label">Cập nhật ảnh bìa (nếu muốn thay đổi)</label>
                    <div class="file-upload">
                        <div class="file-upload-btn">
                            <i class="fas fa-cloud-upload-alt fa-2x mb-2" style="color: var(--primary-color);"></i>
                            <p>Kéo thả ảnh vào đây hoặc click để chọn</p>
                            <p class="text-muted small">(Định dạng: JPG, PNG. Kích thước tối đa: 5MB)</p>
                        </div>
                        <input type="file" class="file-upload-input" id="imageUpload" name="image" accept="image/*">
                        <img id="imagePreview" class="preview-image" src="#" alt="Preview">
                    </div>
                </div>
                
                <div class="mb-4">
                    <label for="storyDescription" class="form-label">Giới thiệu truyện</label>
                    <textarea class="form-control" id="storyDescription" rows="5" 
                              name="description" required><?php echo htmlspecialchars($story['gioi_thieu'] ?? ''); ?></textarea>
                </div>
                
                <div class="mb-4">
                    <label for="storyCategory" class="form-label">Thể loại</label>
                    <select class="form-select" id="storyCategory" name="category" required>
                        <?php while($category = $result_categories->fetch_assoc()): ?>
                            <option value="<?php echo $category['id']; ?>" 
                                <?php if ($category['id'] == $story['the_loai']) echo 'selected'; ?>>
                                <?php echo htmlspecialchars($category['ten_the_loai']); ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>
                
                <div class="mb-4">
                    <label class="form-label">Trạng thái truyện</label>
                    <div class="status-radio">
                        <div class="status-option">
                            <input type="radio" id="statusCompleted" name="status" value="1" 
                                <?php echo ($story['trang_thai'] ?? 0) == 1 ? 'checked' : ''; ?>>
                            <label for="statusCompleted">Chưa hoàn thành</label>
                        </div>
                        <div class="status-option">
                            <input type="radio" id="statusIncomplete" name="status" value="0" 
                                <?php echo ($story['trang_thai'] ?? 0) == 0 ? 'checked' : ''; ?>>
                            <label for="statusIncomplete">Đã hoàn thành</label>
                        </div>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary submit-btn">
                    <i class="fas fa-save me-2"></i> Lưu Thay Đổi
                </button>
            </form>
        </div>
    </div>

    <script src="../../js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('imageUpload').addEventListener('change', function(e) {
            const preview = document.getElementById('imagePreview');
            const file = e.target.files[0];
            const reader = new FileReader();
            
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            
            if (file) {
                reader.readAsDataURL(file);
            }
        });
        
        const textarea = document.getElementById('storyDescription');
        textarea.style.height = 'auto';
        textarea.style.height = (textarea.scrollHeight) + 'px';
        
        textarea.addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        });
        
        document.getElementById('storyName').focus();
    </script>
</body>
</html>