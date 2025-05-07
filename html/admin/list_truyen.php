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
    
    $sql = "SELECT * FROM data_truyen WHERE id_nguoi_dang = $id";
    $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../../css/app.css">
    <link rel="stylesheet" href="../../css/list_truyen.css">

    <title>Danh sách truyện đã đăng - Demo Truyện</title>
    <meta name="description" content="Quản lý danh sách truyện đã đăng trên hệ thống Demo Truyện">
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

    <div class="stories-container">
        <div class="stories-header">
            <h1 class="stories-title"><i class="fas fa-book-open me-2"></i>Danh sách truyện đã đăng</h1>
            <a href="list_tac_gia.php" class="add-story-btn">
                <i class="fas fa-plus"></i> Thêm truyện mới
            </a>
        </div>
        
        <div class="stories-grid">
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <div class="story-card">
                        <img src="../<?php echo $row['image_truyen']; ?>" alt="<?php echo $row['ten_truyen']; ?>" class="story-image">
                        <div class="story-content">
                            <h3 class="story-title"><?php echo $row['ten_truyen']; ?></h3>
                            <div class="story-meta">
                                <span><i class="fas fa-layer-group me-1"></i> <?php echo $row['so_chuong']; ?> chương</span>
                            </div>
                            <div class="story-actions">
                                <a href="add_chapter.php?id=<?php echo $row['id']; ?>" class="action-btn add-chapter-btn">
                                    <i class="fas fa-plus-circle me-1"></i> Chương
                                </a>
                                <a href="edit_story.php?id=<?php echo $row['id']; ?>" class="action-btn edit-btn">
                                    <i class="fas fa-edit me-1"></i> Sửa
                                </a>
                                <a href="../../../php/delete_truyen.php?id=<?php echo $row['id']; ?>" class="action-btn delete-btn" onclick="return confirm('Bạn chắc chắn muốn xóa truyện này?')">
                                    <i class="fas fa-trash me-1"></i> Xóa
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="empty-state">
                    <i class="fas fa-book"></i>
                    <h4>Bạn chưa đăng truyện nào</h4>
                    <p>Bấm vào nút "Thêm truyện mới" để bắt đầu</p>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script src="../../js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.story-card, .empty-state');
            
            cards.forEach((card, index) => {
                card.style.opacity = 0;
                card.style.transform = 'translateY(20px)';
                card.style.transition = `all 0.4s ease ${index * 0.1}s`;
                
                setTimeout(() => {
                    card.style.opacity = 1;
                    card.style.transform = 'translateY(0)';
                }, 100);
            });
        });
    </script>
</body>
</html>