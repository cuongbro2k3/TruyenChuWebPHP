<!DOCTYPE html>
<html lang="vi">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hồ sơ cá nhân</title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/app.css">
    <link rel="stylesheet" href="../../css/profile_user.css">
</head>
<body>
<?php
    session_start();
    include '../../php/db_connection.php';
    if (!isset($_SESSION['id'])) {
        header("Location: ../login.php");
    }
    $id = $_SESSION['id'];
    $sql_account = "SELECT * FROM account WHERE id = $id";
    $result = $conn->query($sql_account);
    if ($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $ngay_sinh = $row['ngay_sinh'];
        $image_user = $row['image_user'];
        $gioi_tinh = $row['gioi_tinh'];
        $email = $row['email'];
        $so_thich = $row['so_thich'];
        $sdt = $row['sdt'];
    }else{
        header("Location: ../login.php");
    }
?>
    <header class="header d-none d-lg-block">
        <!-- place navbar here -->
        <nav class="navbar navbar-expand-lg navbar-dark header__navbar p-md-0">
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
                <?php
                            if (!isset($_SESSION['id'])) {
                                echo '<li class="nav-item dropdown">';
                                echo '<a href = "../login.php" class="nav-link"  role="button" aria-expanded="false">';
                                echo 'Đăng nhập';
                                echo '</a></li>';
                            }else{
                                $id = $_SESSION['id'];
                                include '../../php/db_connection.php';
                                $sql_account = "SELECT * FROM account WHERE id = $id";
                                $result = $conn->query($sql_account);
                                if ($result->num_rows > 0){
                                    $row = $result->fetch_assoc();
                                    echo '<li class="nav-item dropdown">';
                                    echo '<a href = "profile_user.php?id='.$row['id'].'" class="nav-link"  role="button" aria-expanded="false">';
                                    echo $row['name'];
                                    echo '</a></li>';

                                    echo '<li class="nav-item dropdown">';
                                    echo '<a href = "../../php/logout.php" class="nav-link"  role="button" aria-expanded="false">';
                                    echo 'Đăng xuất';
                                    echo '</a></li>';
                                }else{
                                }
                            }
                        ?>
                    </ul>

                    <div class="form-check form-switch me-3 d-flex align-items-center">
                    </div>

                    <form class="d-flex header__form-search" action="../search.php" method="GET">
                        <input class="form-control search-story" type="text" placeholder="Tìm kiếm" name="key"
                            value="">

                        <button class="btn" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                <path
                                    d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z">
                                </path>
                            </svg>

                        </button>
                    </form>
                </div>
            </div>
        </nav>
    </header>

    <div class="profile">
        <?php 
            if($image_user == ""){
                $image_user = "../../images/user/user.png";
            }
        ?>
        <img src="<?php echo $image_user ?>" alt="Avatar">
        <h2><?php echo $name ?></h2>
        <p><?php echo $so_thich ?></p>
        <div>
            <p style="color: black"><strong>Email: </strong><?php echo $email ?></p>
            <p style="color: black"><strong>SDT: </strong><?php echo $sdt ?></p>
        </div>
        <div class="social-icons">
            <a href="#">🔗 Chỉnh sửa</a>
            <a href="#">🐦 Thêm sở thích</a>
            <a href="#">💼 Liên hệ admin</a>
        </div>
    </div>
</body>
</html>
