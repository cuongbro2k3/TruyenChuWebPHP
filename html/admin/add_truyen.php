<?php
    session_start();
    
    if (!isset($_SESSION['id'])){
        header("Location: ../../../../php/error.php");
        exit();
    }
    
    include '../../php/check_is_admin.php';
    
    $id = $_SESSION['id'];
    include '../../php/db_connection.php';
    $sql_account = "SELECT * FROM account WHERE id = $id";
    $result_account = $conn->query($sql_account);
    $user = $result_account->fetch_assoc();
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $image = $_FILES['image']['name'];
        $target_dir = "../../images/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        $id_nguoi_dang = $_SESSION['id'];
        $id_tac_gia = $_GET['id'] ?? 0; 
        $id_the_loai = $_POST['category'];
        
        $sql = "INSERT INTO data_truyen (id_nguoi_dang, ten_truyen, image_truyen, gioi_thieu, trang_thai, so_chuong, tac_gia, the_loai, truyen_hot, view_truyen) 
                VALUES ('$id_nguoi_dang', '$name', '$target_file', '$description', 1, 0, $id_tac_gia, $id_the_loai, 0, 0)";
        
        if ($conn->query($sql) === TRUE) {
            $success = "Thêm truyện thành công!";
        } else {
            $error = "Lỗi: " . $conn->error;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../../css/app.css">
    <link rel="stylesheet" href="../../css/add_truyen.css">
    <title>Thêm Truyện Mới - Demo Truyện</title>
    <meta name="description" content="Thêm truyện mới vào hệ thống Demo Truyện">
    <style>

    </style>
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
        <div class="form-container">
            <h1 class="form-title"><i class="fas fa-book-medical me-2"></i>Thêm Truyện Mới</h1>
            
            <?php if(isset($success)): ?>
                <div class="alert alert-success mb-4"><?php echo $success; ?></div>
            <?php endif; ?>
            
            <?php if(isset($error)): ?>
                <div class="alert alert-danger mb-4"><?php echo $error; ?></div>
            <?php endif; ?>
            
            <form method="POST" enctype="multipart/form-data">
                <div class="mb-4">
                    <label for="storyName" class="form-label">Tên truyện</label>
                    <input type="text" class="form-control" id="storyName" name="name" required>
                </div>
                
                <div class="mb-4">
                    <label class="form-label">Ảnh bìa</label>
                    <div class="file-upload">
                        <div class="file-upload-btn">
                            <i class="fas fa-cloud-upload-alt fa-2x mb-2" style="color: var(--primary-color);"></i>
                            <p>Kéo thả ảnh vào đây hoặc click để chọn</p>
                            <p class="text-muted small">(Định dạng: JPG, PNG. Kích thước tối đa: 5MB)</p>
                        </div>
                        <input type="file" class="file-upload-input" id="imageUpload" name="image" accept="image/*" required>
                        <img id="imagePreview" class="preview-image" src="#" alt="Preview">
                    </div>
                </div>
                
                <div class="mb-4">
                    <label for="storyDescription" class="form-label">Giới thiệu truyện</label>
                    <textarea class="form-control" id="storyDescription" rows="5" name="description" required></textarea>
                </div>
                
                <div class="mb-4">
                    <label for="storyCategory" class="form-label">Thể loại</label>
                    <select class="form-select" id="storyCategory" name="category" required>
                        <?php 
                            $sql = "SELECT * FROM data_the_loai";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0){
                                while($row = $result->fetch_assoc()){
                                    echo '<option value="'.$row['id'].'">'.$row['ten_the_loai'].'</option>';
                                }
                            }
                        ?>
                    </select>
                </div>
                
                <button type="submit" class="btn btn-primary submit-btn">
                    <i class="fas fa-plus-circle me-2"></i> Thêm Truyện
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
        
        const fileUploadBtn = document.querySelector('.file-upload-btn');
        
        fileUploadBtn.addEventListener('dragover', (e) => {
            e.preventDefault();
            fileUploadBtn.style.borderColor = 'var(--primary-color)';
            fileUploadBtn.style.backgroundColor = 'rgba(108, 92, 231, 0.1)';
        });
        
        fileUploadBtn.addEventListener('dragleave', () => {
            fileUploadBtn.style.borderColor = '#e0e0e0';
            fileUploadBtn.style.backgroundColor = '';
        });
        
        fileUploadBtn.addEventListener('drop', (e) => {
            e.preventDefault();
            fileUploadBtn.style.borderColor = '#e0e0e0';
            fileUploadBtn.style.backgroundColor = '';
            
            const fileInput = document.getElementById('imageUpload');
            fileInput.files = e.dataTransfer.files;
            
            const event = new Event('change');
            fileInput.dispatchEvent(event);
        });
    </script>
</body>
</html>