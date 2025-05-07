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
    
    $id_truyen = $_GET['id'] ?? 0;
    $sql_story = "SELECT * FROM data_truyen WHERE id = $id_truyen";
    $result_story = $conn->query($sql_story);
    $story = $result_story->fetch_assoc();
    
    $next_chapter_number = ($story['so_chuong'] ?? 0) + 1;
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $noi_dung = $_POST['noi_dung'];
        $stt = $next_chapter_number;
        
        $sql = "INSERT INTO data_chapter (id_truyen, ten_chapter, noi_dung, id_chapter) 
                VALUES ('$id_truyen', '$name', '$noi_dung', '$stt')";
        
        if ($conn->query($sql)) {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $time_now = date("Y-m-d H:i:s");
            $sql_update = "UPDATE data_truyen 
                           SET so_chuong = so_chuong + 1, 
                               time_update = '$time_now' 
                           WHERE id = $id_truyen";
            $conn->query($sql_update);
            
            $success = "Thêm chương mới thành công! Chương #$stt đã được tạo.";
            
            $_POST['name'] = '';
            $_POST['noi_dung'] = '';
            $next_chapter_number++; 
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
    <link rel="stylesheet" href="../../css/add_chapter.css">

    <title>Thêm Chương Mới - Demo Truyện</title>
    <meta name="description" content="Thêm chương mới vào truyện trên hệ thống Demo Truyện">
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
        <div class="chapter-container">
            <a href="list_truyen.php" class="back-btn">
                <i class="fas fa-arrow-left me-2"></i> Quay lại danh sách truyện
            </a>
            
            <div class="chapter-header">
                <h1 class="chapter-title"><i class="fas fa-plus-circle me-2"></i>Thêm Chương Mới</h1>
                <p class="story-info">Truyện: <strong><?php echo $story['ten_truyen'] ?? ''; ?></strong> | Số chương hiện tại: <strong><?php echo $story['so_chuong'] ?? 0; ?></strong></p>
                <div class="chapter-number-display">
                    <i class="fas fa-hashtag me-2"></i>Chương mới sẽ là: <?php echo $next_chapter_number; ?>
                </div>
            </div>
            
            <?php if(isset($success)): ?>
                <div class="alert alert-success mb-4"><?php echo $success; ?></div>
            <?php endif; ?>
            
            <?php if(isset($error)): ?>
                <div class="alert alert-danger mb-4"><?php echo $error; ?></div>
            <?php endif; ?>
            
            <form method="POST">
                <input type="hidden" name="stt" value="<?php echo $next_chapter_number; ?>">
                
                <div class="mb-4">
                    <label for="chapterName" class="form-label">Tên chương</label>
                    <input type="text" class="form-control" id="chapterName" name="name" value="<?php echo $_POST['name'] ?? ''; ?>" required>
                </div>
                
                <div class="mb-4">
                    <label for="chapterContent" class="form-label">Nội dung chương</label>
                    <textarea class="form-control" id="chapterContent" rows="15" name="noi_dung" required><?php echo $_POST['noi_dung'] ?? ''; ?></textarea>
                </div>
                
                <button type="submit" class="btn btn-primary submit-btn">
                    <i class="fas fa-save me-2"></i> Lưu Chương
                </button>
            </form>
        </div>
    </div>

    <script src="../../js/bootstrap.bundle.min.js"></script>
    <script>
        const textarea = document.getElementById('chapterContent');
        textarea.addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        });
        
        textarea.style.height = textarea.scrollHeight + 'px';
        
        document.getElementById('chapterName').focus();
    </script>
</body>
</html>