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
        
        $check_sql = "SELECT * FROM data_tac_gia WHERE ten_tac_gia = '$name'";
        $check_result = $conn->query($check_sql);
        
        if ($check_result->num_rows > 0) {
            $error = "Tác giả đã tồn tại trong hệ thống!";
        } else {
            $sql = "INSERT INTO data_tac_gia (ten_tac_gia) VALUES ('$name')";
            if ($conn->query($sql) === TRUE) {
                $success = "Thêm tác giả thành công!";
                $_POST['name'] = ''; 
            } else {
                $error = "Lỗi: " . $conn->error;
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../../css/app.css">
    <link rel="stylesheet" href="../../css/add_tac_gia.css">
    <title>Thêm Tác Giả - Demo Truyện</title>
    <meta name="description" content="Thêm tác giả mới vào hệ thống Demo Truyện">
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
        <div class="author-container">
            <a href="list_tac_gia.php" class="back-btn">
                <i class="fas fa-arrow-left me-2"></i> Quay lại danh sách tác giả
            </a>
            
            <div class="author-header">
                <h1 class="author-title"><i class="fas fa-user-pen me-2"></i>Thêm Tác Giả Mới</h1>
            </div>
            
            <?php if(isset($success)): ?>
                <div class="alert alert-success mb-4"><?php echo $success; ?></div>
            <?php endif; ?>
            
            <?php if(isset($error)): ?>
                <div class="alert alert-danger mb-4"><?php echo $error; ?></div>
            <?php endif; ?>
            
            <form method="POST">
                <div class="mb-4">
                    <label for="authorName" class="form-label">Tên tác giả</label>
                    <input type="text" class="form-control" id="authorName" name="name" 
                           value="<?php echo $_POST['name'] ?? ''; ?>" required>
                </div>
                
                <button type="submit" class="btn btn-primary submit-btn">
                    <i class="fas fa-plus-circle me-2"></i> Thêm Tác Giả
                </button>
            </form>
        </div>
    </div>

    <script src="../../js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('authorName').focus();
        });
    </script>
</body>
</html>