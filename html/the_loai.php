<!DOCTYPE html>
<html lang="en">

<head>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/app.css">
    <title>Demo Truyện</title>
    <meta name="description"
        content="Đọc truyện online, truyện hay. Demo Truyện luôn tổng hợp và cập nhật các chương truyện một cách nhanh nhất.">
</head>

<?php
    session_start();
?>

<body>
<header class="header d-none d-lg-block">
        <!-- place navbar here -->
        <nav class="navbar navbar-expand-lg navbar-dark header__navbar p-md-0">
            <div class="container">
            <a class="navbar-brand" href="home.php">
                    <img src="../images/logo/logo.png" alt="" srcset="" class="img-fluid"
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
                                echo '<a href = "login.php" class="nav-link"  role="button" aria-expanded="false">';
                                echo 'Đăng nhập';
                                echo '</a></li>';
                            }else{
                                $id = $_SESSION['id'];
                                include '../php/db_connection.php';
                                $sql_account = "SELECT * FROM account WHERE id = $id";
                                $result = $conn->query($sql_account);
                                if ($result->num_rows > 0){
                                    $row = $result->fetch_assoc();
                                    echo '<li class="nav-item dropdown">';
                                    if($row['is_admin'] == 1){
                                        echo '<a href = "admin/profile.php?id='.$row['id'].'" class="nav-link"  role="button" aria-expanded="false">';
                                    }else{
                                        echo '<a href = "user/profile_user.php?id='.$row['id'].'" class="nav-link"  role="button" aria-expanded="false">';
                                    }
                                    echo $row['name'];

                                    echo '</a></li>';
                                    echo '<li class="nav-item dropdown">';
                                    echo '<a href = "../php/logout.php" class="nav-link"  role="button" aria-expanded="false">';
                                    echo 'Đăng xuất';
                                    echo '</a></li>';
                                }else{
                                }
                            }
                        ?>
                    </ul>

                    <div class="form-check form-switch me-3 d-flex align-items-center">
                    </div>

                    <form class="d-flex header__form-search" action="search.php" method="GET">
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


    <div class="bg-light header-bottom">
        <div class="container py-1">
            <p class="mb-0">                
                <?php 
                    include '../php/db_connection.php';
                    $sql = "SELECT * FROM data_thong_bao";
                    $result = $conn->query($sql);
                    if($result -> num_rows > 0){
                        while($row = $result -> fetch_assoc()){
                            echo nl2br($row['noi_dung_tb']);    
                        }
                    }else{
                        echo "Hiện không có thông báo nào!";
                    }
                ?></p>
        </div>
    </div>


    <main>
        <?php 
            include '../php/db_connection.php';
            if (isset($_GET['id'])) {
                $id = $_GET['id']; 
            } 
            $sql = "SELECT * FROM data_the_loai WHERE id = $id";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $ten_the_loai = $row['ten_the_loai'];
            $mo_ta_the_loai = $row['mo_ta_the_loai'];
        ?>
        <div class="container">
            <div class="row align-items-start">
                <div class="col-12 col-md-8 col-lg-9 mb-3">
                    <div class="head-title-global d-flex justify-content-between mb-2">
                        <div class="col-12 col-md-12 col-lg-12 head-title-global__left d-flex">
                            <h2 class="me-2 mb-0 border-bottom border-secondary pb-1">
                                <span href="#" class="d-block text-decoration-none text-dark fs-4 category-name"
                                    title=""><?php echo $ten_the_loai?></span>
                            </h2>
                        </div>
                    </div>

                    <div class="list-story-in-category section-stories-hot__list">
                    <?php
                            include '../php/db_connection.php';
                            if (isset($_GET['id'])) {
                                $id = $_GET['id']; 
                            } 
                            $sql = "SELECT * FROM data_truyen WHERE the_loai = $id";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo '<div class="story-item">';
                                    echo '<a href="thong_tin_truyen.php?id=' . $row["id"] . '" class="d-block text-decoration-none">';
                                    echo '<div class="story-item__image">';
                                    echo '<img src="'.$row["image_truyen"].'" class="img-fluid" width="150" height="230" loading="lazy" style = "border-radius: 10px;">';
                                    echo '</div>';
                                    echo '<h3 class="story-item__name text-one-row story-name" style = "border-radius: 10px;">';
                                    echo $row["ten_truyen"];
                                    echo '</h3>';
                                    echo '<div class="list-badge">';
                                    if($row["trang_thai"] == 0) {
                                        echo '<span class="story-item__badge badge text-bg-success">Full</span>';
                                    }
                                    if($row["truyen_hot"] == 0) {
                                        echo '<span class="story-item__badge story-item__badge-hot badge text-bg-danger">Hot</span>';
                                    }
                                    // echo '<span class="story-item__badge story-item__badge-new badge text-bg-info text-light">New</span>';
                                    echo '</div>';
                                    echo '</a>';
                                    echo '</div>';
                                }
                            } else {
                                echo "0 kết quả";
                            }
                            $conn->close();
                            ?>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-3 sticky-md-top">
                    <div class="category-description bg-light p-2 rounded mb-3 card-custom">
                        <p class="mb-0 text-secondary"></p>
                        <p><?php echo $mo_ta_the_loai?>
                        </p>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <div id="footer" class="footer border-top pt-2">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-5">
                    <strong>Truyện Bro</strong> - <a title="Đọc truyện online" class="text-dark text-decoration-none"
                        href="#">Đọc truyện</a> online một cách nhanh nhất. Hỗ trợ mọi thiết bị như
                    di
                    động và máy tính bảng.
                </div>
                <ul class="col-12 col-md-7 list-unstyled d-flex flex-wrap list-tag">

                    <li>
                        <span class="badge text-bg-light"><a class="text-dark text-decoration-none"
                                href="#" title="truyện xuyên nhanh">truyện
                                xuyên
                                nhanh</a></span>
                    </li>
                </ul>

            </div>
        </div>
    </div>
    <div id="loadingPage" class="loading-full">
        <div class="loading-full_icon">
            <div class="spinner-grow"><span class="visually-hidden">Loading...</span></div>
        </div>
    </div>

</body>

</html>