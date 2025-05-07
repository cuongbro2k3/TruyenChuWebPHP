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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../../css/app.css">
    <link rel="stylesheet" href="../../css/list.css">
    <title>Quản lý Tác giả - Demo Truyện</title>
    <meta name="description" content="Quản lý danh sách tác giả trên hệ thống Demo Truyện">
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

    <div class="admin-container">
        <div class="authors-header">
            <h1 class="authors-title"><i class="fas fa-user-edit me-2"></i>Danh sách tác giả</h1>
            <a href="add_tac_gia.php" class="add-author-btn">
                <i class="fas fa-plus"></i> Thêm tác giả
            </a>
        </div>
        
        <div class="authors-grid">
            <?php
                $sql = "SELECT * FROM data_tac_gia";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<div class="author-card">';
                        echo '<a href="add_truyen.php?id='.$row['id'].'" class="author-link">';
                        echo '<div class="author-name"><i class="fas fa-user-pen"></i> '.$row['ten_tac_gia'].'</div>';
                        echo '</a>';
                        echo '<div class="author-actions">';
                        echo '<a href="edit_tac_gia.php?id='.$row['id'].'" class="edit-btn"><i class="fas fa-edit me-1"></i> Sửa</a>';
                        echo '<a href="add_truyen.php?id='.$row['id'].'" class="edit-btn"><i class="fas fa-edit me-1"></i> Thêm truyện</a>';
                        echo '<a href="../../../php/delete_tac_gia.php?id='.$row['id'].'" class="delete-btn" onclick="return confirm(\'Bạn chắc chắn muốn xóa tác giả này?\')"><i class="fas fa-trash me-1"></i> Xóa</a>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo '<div class="alert alert-info">Chưa có tác giả nào trong hệ thống</div>';
                }
            ?>
        </div>
    </div>

    <script src="../../js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.author-card');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = 1;
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, { threshold: 0.1 });
            
            cards.forEach(card => {
                card.style.opacity = 0;
                card.style.transform = 'translateY(20px)';
                card.style.transition = 'all 0.6s ease';
                observer.observe(card);
            });
        });
    </script>
</body>
</html>