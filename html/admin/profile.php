<!DOCTYPE html>
<html lang="en">
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
    $result = $conn->query($sql_account);
    $user = $result->fetch_assoc();
?>
<head>
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../../css/app.css">
    <link rel="stylesheet" href="../../css/profile.css">

    <title>Admin Dashboard - Demo Truyện</title>
    <meta name="description"
        content="Admin dashboard for managing stories, authors, and user permissions on Demo Truyện.">
</head>

<body class="admin-dashboard">
    <header class="admin-header">
        <nav class="navbar navbar-expand-lg navbar-dark admin-navbar p-md-0">
            <div class="container">
                <a class="navbar-brand" href="../home.php">
                    <img src="../../images/logo/logo.png" alt="" srcset="" class="img-fluid"
                        style="width: 100px;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a href = "profile.php?id=<?php echo $user['id']; ?>" class="nav-link" role="button" aria-expanded="false">
                                <i class="fas fa-user-circle me-1"></i> <?php echo $user['name']; ?>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href = "../../php/logout.php" class="nav-link" role="button" aria-expanded="false">
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
        <div class="welcome-message">
            <h2 class="welcome-title">Xin chào, <?php echo $user['name']; ?>!</h2>
            <p class="welcome-text">Bạn đang ở trang quản trị của Demo Truyện. Tại đây bạn có thể quản lý các tác giả, truyện và phân quyền cho người dùng.</p>
        </div>
        
        <div class="admin-card">
            <div class="admin-card-header">
                <h3><i class="fas fa-tachometer-alt me-2"></i> Bảng điều khiển quản trị</h3>
            </div>
            <div class="admin-card-body">
                <div class="admin-feature">
                    <div class="admin-feature-icon">
                        <i class="fas fa-book"></i>
                    </div>
                    <div class="admin-feature-content">
                        <h4 class="admin-feature-title">Quản lý truyện</h4>
                        <p class="admin-feature-desc">Thêm, chỉnh sửa hoặc xóa các truyện trên hệ thống</p>
                    </div>
                    <a href="list_truyen.php" class="admin-feature-link">
                        Truy cập <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
                
                <div class="admin-feature">
                    <div class="admin-feature-icon">
                        <i class="fas fa-user-edit"></i>
                    </div>
                    <div class="admin-feature-content">
                        <h4 class="admin-feature-title">Quản lý tác giả</h4>
                        <p class="admin-feature-desc">Thêm mới hoặc quản lý thông tin các tác giả</p>
                    </div>
                    <a href="list_tac_gia.php" class="admin-feature-link">
                        Truy cập <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
                
                <div class="admin-feature">
                    <div class="admin-feature-icon">
                        <i class="fas fa-users-cog"></i>
                    </div>
                    <div class="admin-feature-content">
                        <h4 class="admin-feature-title">Quản lý người dùng</h4>
                        <p class="admin-feature-desc">Phân quyền admin cho các tài khoản khác</p>
                    </div>
                    <a href="manage_users.php" class="admin-feature-link">
                        Truy cập <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
        
        <!-- <div class="admin-card">
            <div class="admin-card-header">
                <h3><i class="fas fa-chart-line me-2"></i> Thống kê nhanh</h3>
            </div>
            <div class="admin-card-body">
                <div class="row text-center">
                    <div class="col-md-4 mb-4">
                        <div class="p-3 bg-primary bg-opacity-10 rounded">
                            <h2 class="text-primary">1,024</h2>
                            <p class="mb-0">Truyện đang có</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="p-3 bg-success bg-opacity-10 rounded">
                            <h2 class="text-success">256</h2>
                            <p class="mb-0">Tác giả</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="p-3 bg-warning bg-opacity-10 rounded">
                            <h2 class="text-warning">5,678</h2>
                            <p class="mb-0">Người dùng</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>

    <!-- Bootstrap JS -->
    <script src="../../js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script>
        // Add animation to cards when they come into view
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.admin-card');
            
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