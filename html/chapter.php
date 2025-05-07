<!DOCTYPE html>
<html lang="en">

<head>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="https://suustore.com/assets/frontend/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/app.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <title>Demo Truyện</title>  
    <meta name="description" content="Hello Viet Nam">
    <style>
        .chapter-content {
            font-size: 1.4em;
            font-family: 'Arial, sans-serif';
            line-height: 1.6;
            padding: 20px 0;
        }
        .chapter-nav-btn {
            min-width: 150px;
            padding: 8px 15px;
        }
        .disabled-nav-btn {
            background-color: #e9ecef !important;
            border-color: #dee2e6 !important;
            color: #6c757d !important;
            cursor: not-allowed;
            pointer-events: none;
        }
        .chapter-title {
            margin-bottom: 15px;
            color: #2c3e50;
        }
        .chapter-name {
            font-size: 1.2em;
            color: #7f8c8d;
            margin-bottom: 25px;
        }
        .chapter-divider {
            margin: 25px 0;
            border-color: #ecf0f1;
        }
        .select-chapter__list {
            max-height: 400px;
            overflow-y: auto;
        }
        .dropdown-item.active {
            background-color: #6c5ce7;
            color: white;
        }
        .story-title {
            color: #27ae60;
            margin-bottom: 10px;
        }
        .header-bottom {
            background-color: #f8f9fa;
            padding: 10px 0;
            border-bottom: 1px solid #e9ecef;
        }
    </style>
</head>

<body>
<?php
    session_start();
    $id = $_GET['id'];
    include '../php/db_connection.php';

    // Get current chapter data
    $sql = "SELECT * FROM data_chapter WHERE id = $id";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $name_chapter = $row['ten_chapter'];
        $noi_dung = nl2br($row['noi_dung']);
        $id_chapter = $row['id_chapter'];
        $id_truyen = $row['id_truyen'];
    }

    // Get story info
    $sql_story = "SELECT * FROM data_truyen WHERE id = $id_truyen";
    $result_story = $conn->query($sql_story);
    $story = $result_story->fetch_assoc();

    // Get previous and next chapter IDs
    $prev_chapter = null;
    $next_chapter = null;
    
    // Get previous chapter
    $sql_prev = "SELECT id, ten_chapter FROM data_chapter 
                WHERE id_truyen = $id_truyen AND id_chapter < $id_chapter 
                ORDER BY id_chapter DESC LIMIT 1";
    $result_prev = $conn->query($sql_prev);
    if($result_prev->num_rows > 0) {
        $prev_data = $result_prev->fetch_assoc();
        $prev_chapter = $prev_data['id'];
        $prev_chapter_name = $prev_data['ten_chapter'];
    }
    
    // Get next chapter
    $sql_next = "SELECT id, ten_chapter FROM data_chapter 
                WHERE id_truyen = $id_truyen AND id_chapter > $id_chapter 
                ORDER BY id_chapter ASC LIMIT 1";
    $result_next = $conn->query($sql_next);
    if($result_next->num_rows > 0) {
        $next_data = $result_next->fetch_assoc();
        $next_chapter = $next_data['id'];
        $next_chapter_name = $next_data['ten_chapter'];
    }

    // Update view count
    $sql_view = "UPDATE data_truyen SET view_truyen = view_truyen + 1 WHERE id = $id_truyen";
    $conn->query($sql_view);
?>

    <header class="header d-none d-lg-block">
        <nav class="navbar navbar-expand-lg navbar-dark header__navbar p-md-0">
            <div class="container">
                <a class="navbar-brand" href="home.php">
                    <img src="../images/logo/logo.png" alt="" srcset="" class="img-fluid" style="width: 100px;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <?php
                            if (!isset($_SESSION['id'])) {
                                echo '<li class="nav-item dropdown">';
                                echo '<a href="login.php" class="nav-link" role="button" aria-expanded="false">';
                                echo 'Đăng nhập';
                                echo '</a></li>';
                            } else {
                                $id = $_SESSION['id'];
                                include '../php/db_connection.php';
                                $sql_account = "SELECT * FROM account WHERE id = $id";
                                $result = $conn->query($sql_account);
                                if ($result->num_rows > 0) {
                                    $row = $result->fetch_assoc();
                                    echo '<li class="nav-item dropdown">';
                                    if($row['is_admin'] == 1) {
                                        echo '<a href="admin/profile.php?id='.$row['id'].'" class="nav-link" role="button" aria-expanded="false">';
                                    } else {
                                        echo '<a href="user/profile_user.php?id='.$row['id'].'" class="nav-link" role="button" aria-expanded="false">';
                                    }                                    
                                    echo $row['name'];
                                    echo '</a></li>';

                                    echo '<li class="nav-item dropdown">';
                                    echo '<a href="../php/logout.php" class="nav-link" role="button" aria-expanded="false">';
                                    echo 'Đăng xuất';
                                    echo '</a></li>';
                                }
                            }
                        ?>
                    </ul>

                    <div class="form-check form-switch me-3 d-flex align-items-center">
                    </div>

                    <form class="d-flex header__form-search" action="search.php" method="GET">
                        <input class="form-control search-story" type="text" placeholder="Tìm kiếm" name="key" value="">
                        <button class="btn" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                <path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"></path>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </nav>
    </header>

    <div class="bg-light header-bottom">
        <div class="container py-1">
            <p class="mb-0">
                <?php 
                    $sql = "SELECT * FROM data_thong_bao";
                    $result = $conn->query($sql);
                    if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo nl2br($row['noi_dung_tb']);    
                        }
                    } else {
                        echo "Hiện không có thông báo nào!";
                    }
                ?>
            </p>
        </div>
    </div>

    <main>
        <div class="chapter-wrapper container my-5">
            <div class="text-center">
                <h1 class="story-title"><?php echo htmlspecialchars($story['ten_truyen']); ?></h1>
                <p class="chapter-name"><?php echo htmlspecialchars($name_chapter); ?></p>
            </div>
            
            <hr class="chapter-divider">
            
            <div class="chapter-nav text-center mb-4">
                <div class="d-flex align-items-center justify-content-center flex-wrap">
                    <!-- Previous Chapter Button -->
                    <?php if($prev_chapter): ?>
                        <a class="btn btn-success me-2 chapter-nav-btn" 
                           href="chapter.php?id=<?php echo $prev_chapter; ?>" 
                           title="<?php echo htmlspecialchars($prev_chapter_name); ?>">
                            <i class="fas fa-arrow-left me-1"></i> Chương trước
                        </a>
                    <?php else: ?>
                        <button class="btn disabled-nav-btn me-2 chapter-nav-btn" disabled>
                            <i class="fas fa-arrow-left me-1"></i> Chương trước
                        </button>
                    <?php endif; ?>

                    <!-- Chapter Selection Dropdown -->
                    <div class="dropdown me-2">
                        <button class="btn btn-secondary dropdown-toggle chapter-nav-btn" type="button" 
                                id="chapterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-list-ul me-1"></i> Danh sách chương
                        </button>
                        <ul class="dropdown-menu select-chapter__list" aria-labelledby="chapterDropdown">
                            <?php 
                                $sql_chapters = "SELECT * FROM data_chapter WHERE id_truyen = $id_truyen ORDER BY id_chapter";
                                $result_chapters = $conn->query($sql_chapters);
                                if ($result_chapters->num_rows > 0) {
                                    while ($row = $result_chapters->fetch_assoc()) {
                                        $active_class = ($row['id'] == $id) ? 'active' : '';
                                        echo '<li>';
                                        echo '<a class="dropdown-item '.$active_class.'" href="chapter.php?id='.$row['id'].'">';
                                        echo 'Chương '.$row['id_chapter'].': '.htmlspecialchars(mb_strimwidth($row['ten_chapter'], 0, 50, "..."));
                                        echo '</a>';
                                        echo '</li>';
                                    }
                                }
                            ?>
                        </ul>
                    </div>

                    <!-- Next Chapter Button -->
                    <?php if($next_chapter): ?>
                        <a class="btn btn-success chapter-nav-btn" 
                           href="chapter.php?id=<?php echo $next_chapter; ?>" 
                           title="<?php echo htmlspecialchars($next_chapter_name); ?>">
                            Chương tiếp <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    <?php else: ?>
                        <button class="btn disabled-nav-btn chapter-nav-btn" disabled>
                            Chương tiếp <i class="fas fa-arrow-right ms-1"></i>
                        </button>
                    <?php endif; ?>
                </div>
            </div>

            <hr class="chapter-divider">

            <div class="chapter-content mb-5">
                <?php echo $noi_dung; ?>
            </div>

            <hr class="chapter-divider">

            <div class="chapter-nav text-center mt-4">
                <div class="d-flex align-items-center justify-content-center flex-wrap">
                    <!-- Repeat navigation at bottom -->
                    <?php if($prev_chapter): ?>
                        <a class="btn btn-success me-2 chapter-nav-btn" 
                           href="chapter.php?id=<?php echo $prev_chapter; ?>" 
                           title="<?php echo htmlspecialchars($prev_chapter_name); ?>">
                            <i class="fas fa-arrow-left me-1"></i> Chương trước
                        </a>
                    <?php else: ?>
                        <button class="btn disabled-nav-btn me-2 chapter-nav-btn" disabled>
                            <i class="fas fa-arrow-left me-1"></i> Chương trước
                        </button>
                    <?php endif; ?>

                    <div class="dropdown me-2">
                        <button class="btn btn-secondary dropdown-toggle chapter-nav-btn" type="button" 
                                id="chapterDropdownBottom" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-list-ul me-1"></i> Danh sách chương
                        </button>
                        <ul class="dropdown-menu select-chapter__list" aria-labelledby="chapterDropdownBottom">
                            <?php 
                                $result_chapters->data_seek(0); // Reset pointer
                                if ($result_chapters->num_rows > 0) {
                                    while ($row = $result_chapters->fetch_assoc()) {
                                        $active_class = ($row['id'] == $id) ? 'active' : '';
                                        echo '<li>';
                                        echo '<a class="dropdown-item '.$active_class.'" href="chapter.php?id='.$row['id'].'">';
                                        echo 'Chương '.$row['id_chapter'].': '.htmlspecialchars(mb_strimwidth($row['ten_chapter'], 0, 50, "..."));
                                        echo '</a>';
                                        echo '</li>';
                                    }
                                }
                            ?>
                        </ul>
                    </div>

                    <?php if($next_chapter): ?>
                        <a class="btn btn-success chapter-nav-btn" 
                           href="chapter.php?id=<?php echo $next_chapter; ?>" 
                           title="<?php echo htmlspecialchars($next_chapter_name); ?>">
                            Chương tiếp <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    <?php else: ?>
                        <button class="btn disabled-nav-btn chapter-nav-btn" disabled>
                            Chương tiếp <i class="fas fa-arrow-right ms-1"></i>
                        </button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </main>

    <div id="footer" class="footer border-top pt-4 pb-3">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 mb-3 mb-md-0">
                    <strong>Truyện Demo</strong> - <a title="Đọc truyện online" class="text-dark text-decoration-none" href="#">Đọc truyện</a> online một cách nhanh nhất. Hỗ trợ mọi thiết bị như di động và máy tính bảng.
                </div>
                <div class="col-12 col-md-6">
                    <ul class="list-unstyled d-flex flex-wrap justify-content-md-end list-tag">
                        <li class="me-2 mb-2">
                            <span class="badge text-bg-light"><a class="text-dark text-decoration-none" href="#" title="truyện xuyên nhanh">truyện xuyên nhanh</a></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div id="loadingPage" class="loading-full">
        <div class="loading-full_icon">
            <div class="spinner-grow"><span class="visually-hidden">Loading...</span></div>
        </div>
    </div>

    <!-- Font Awesome for icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>