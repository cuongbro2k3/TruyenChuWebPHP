<?php
if (isset($_GET['id'])) {
    $id = $_GET['id']; 
} else {
    echo "<h1>Không tìm thấy ID truyện!</h1>";
}
?>

<?php
    session_start();
    include '../php/db_connection.php';
    $sql = "SELECT * FROM data_truyen WHERE id = $id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $name = $row['ten_truyen'];
            $image = $row['image_truyen'];
            $gioi_thieu = nl2br($row['gioi_thieu']);
            $trang_thai = $row['trang_thai'];
            $the_loai_id = $row['the_loai'];
            $view_truyen = $row['view_truyen'];
            $sql_the_loai = "SELECT ten_the_loai FROM data_the_loai WHERE id = $the_loai_id";
            $result_the_loai = $conn->query($sql_the_loai);
            if ($result_the_loai->num_rows > 0) {
                while ($row_the_loai = $result_the_loai->fetch_assoc()) {
                    $the_loai = $row_the_loai['ten_the_loai'];
                }
            }
        }
    }
?>


<!DOCTYPE html>
<!-- saved from url=(0021)https://suustore.com/ -->
<html lang="en">

<head>


    <!-- Bootstrap CSS v5.2.1 -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/app.css">
    <title>Demo Truyện</title>
    <meta name="description"
        content="Đọc truyện online, truyện hay. Demo Truyện luôn tổng hợp và cập nhật các chương truyện một cách nhanh nhất.">
</head>

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
                                viewBox="0 0 512 512">
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
                ?>
            </p>
        </div>
    </div>


    <main>

        <input type="hidden" id="story_slug" value="nang-khong-muon-lam-hoang-hau">
        <div class="container">
            <div class="row align-items-start">
                <div class="col-12 col-md-7 col-lg-8">
                    <div class="head-title-global d-flex justify-content-between mb-4">
                        <div class="col-12 col-md-12 col-lg-4 head-title-global__left d-flex">
                            <h2 class="me-2 mb-0 border-bottom border-secondary pb-1">
                                <span class="d-block text-decoration-none text-dark fs-4 title-head-name"
                                    title="Thông tin truyện">Thông
                                    tin truyện</span>
                            </h2>
                        </div>
                    </div>

                    <div class="story-detail">
                        <div class="story-detail__top d-flex align-items-start">
                            <div class="row align-items-start">
                                <div class="col-12 col-md-12 col-lg-3 story-detail__top--image">
                                    <div class="book-3d">
                                        <img src="<?php echo $image ?>"
                                            alt="<?php echo $name ?>" class="img-fluid w-100" width="200"
                                            height="300" loading="lazy">
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-9">
                                    <h3 class="text-center story-name">
                                        <?php echo $name ?>
                                    </h3>
                                    <div class="rate-story mb-2">
                                        <!-- <div class="rate-story__holder" data-score="7.0">
                                            <img alt="1" src="./assets/images/star-on.png">
                                            <img alt="2" src="./assets/images/star-on.png">
                                            <img alt="3" src="./assets/images/star-on.png">
                                            <img alt="4" src="./assets/images/star-on.png">
                                            <img alt="5" src="./assets/images/star-on.png">
                                            <img alt="6" src="./assets/images/star-on.png">
                                            <img alt="7" src="./assets/images/star-half.png">
                                            <img alt="8" src="./assets/images/star-off.png">
                                            <img alt="9" src="./assets/images/star-off.png">
                                            <img alt="10" src="./assets/images/star-off.png">
                                        </div> -->
                                        <em class="rate-story__text"></em>
                                        <div class="rate-story__value" itemprop="aggregateRating" itemscope=""
                                            itemtype="https://schema.org/AggregateRating">
                                            <em>Lượt xem:
                                                <strong>
                                                    <span itemprop="ratingValue"> 
                                                    <?php 
                                                        function formatViewCount($views) {
                                                            if ($views >= 1000000) {
                                                                return number_format($views / 1000000, 1) . 'M';
                                                            } elseif ($views >= 1000) {
                                                                return number_format($views / 1000, 1) . 'K';
                                                            } else {
                                                                return $views;
                                                            }
                                                        }

                                                        echo formatViewCount($view_truyen);
                                                        ?>

                                                    </span>
                                                </strong>
                                            </em>
                                        </div>
                                    </div>

                                    <div class="story-detail__top--desc px-3">
                                            <?php echo $gioi_thieu ?>
                                    </div> 
<!-- 
                                    <div class="info-more">
                                        <div class="info-more--more active" id="info_more">
                                            <span class="me-1 text-dark">Xem thêm</span>
                                            <svg width="14" height="8" viewBox="0 0 14 8" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M7.70749 7.70718L13.7059 1.71002C14.336 1.08008 13.8899 0.00283241 12.9989 0.00283241L1.002 0.00283241C0.111048 0.00283241 -0.335095 1.08008 0.294974 1.71002L6.29343 7.70718C6.68394 8.09761 7.31699 8.09761 7.70749 7.70718Z"
                                                    fill="#2C2C37"></path>
                                            </svg>
                                        </div>

                                        <a class="info-more--collapse text-decoration-none"
                                            href="story.html#info_more">
                                            <span class="me-1 text-dark">Thu gọn</span>
                                            <svg width="14" height="8" viewBox="0 0 14 8" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M7.70749 0.292817L13.7059 6.28998C14.336 6.91992 13.8899 7.99717 12.9989 7.99717L1.002 7.99717C0.111048 7.99717 -0.335095 6.91992 0.294974 6.28998L6.29343 0.292817C6.68394 -0.097606 7.31699 -0.0976055 7.70749 0.292817Z"
                                                    fill="#2C2C37"></path>
                                            </svg>
                                        </a>
                                    </div> -->
                                </div>
                            </div>
                        </div>

                        <div class="story-detail__bottom mb-3">
                            <div class="row">
                                <div class="col-12 col-md-12 col-lg-5 story-detail__bottom--info">
                                    <p class="mb-1">
                                        <strong>Tác giả:</strong>
                                        <a href="#"
                                            class="text-decoration-none text-dark hover-title">Thâm Bích Sắc</a>
                                    </p>
                                    <div class="d-flex align-items-center mb-1 flex-wrap">
                                        <strong class="me-1">Thể loại:</strong>
                                        <div class="d-flex align-items-center flex-warp">
                                            <a href="the_loai.php?id=<?php echo $the_loai_id ?>"
                                                class="text-decoration-none text-dark hover-title  me-1 "
                                                style="width: max-content;">
                                                <?php echo $the_loai ?>
                                            </a>
                                        </div>
                                    </div>
                                    <p class="me-1">
                                        <strong>Trạng thái:</strong>
                                        <span class="text-info">                                            
                                            <?php
                                            if($trang_thai == 1){
                                                echo "Đang ra";
                                            }else if($trang_thai == 0){
                                                echo "Hoàn thành";
                                            }else{
                                                echo "Tạm ngưng";
                                            }
                                            ?></span>
                                    </p>
                                </div>

                            </div>
                        </div>

                        <div class="story-detail__list-chapter">
                            <div class="head-title-global d-flex justify-content-between mb-4">
                                <div class="col-6 col-md-12 col-lg-6 head-title-global__left d-flex">
                                    <h2 class="me-2 mb-0 border-bottom border-secondary pb-1">
                                        <span href="#"
                                            class="d-block text-decoration-none text-dark fs-4 title-head-name"
                                            title="Truyện hot">Danh sách chương</span>
                                    </h2>
                                </div>
                            </div>

                            <div class="story-detail__list-chapter--list">
                                <div class="row">
                                    <div class="col-12 col-sm-6 col-lg-6 story-detail__list-chapter--list__item">
                                        <ul>
                                            <?php
                                                include '../php/db_connection.php';
                                                $id = $_GET['id'];
                                                $sql_chapter = "SELECT * FROM data_chapter WHERE id_truyen = $id";
                                                $result = $conn->query($sql_chapter);
                                                if($result -> num_rows > 0){
                                                    while($row = $result -> fetch_assoc()){
                                                        echo '<li><a href="chapter.php?id='.$row['id'].'" class="text-decoration-none text-dark hover-title">';
                                                        echo $row['ten_chapter'];
                                                        echo '</a></li>';
                                                    }
                                                }else{
                                                    echo '<li>Hiện không có chương nào</li>';
                                                }
                                            ?>
                                                                                  
                                        </ul>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="pagination" style="justify-content: center;">
                            <!-- <ul>
                                <li class="pagination__item  page-current">
                                    <a class="page-link story-ajax-paginate"
                                        data-url="https://suustore.com/truyen/nang-khong-muon-lam-hoang-hau?page=1"
                                        style="cursor: pointer;">1</a>
                                </li>
                                <li class="pagination__item ">
                                    <a class="page-link story-ajax-paginate"
                                        data-url="https://suustore.com/truyen/nang-khong-muon-lam-hoang-hau?page=2"
                                        style="cursor: pointer;">2</a>
                                </li>

                                <div class="dropup-center dropup choose-paginate me-1">
                                    <button class="btn btn-success dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Chọn trang
                                    </button>
                                    <div class="dropdown-menu">
                                        <input type="number" class="form-control input-paginate me-1" value="">
                                        <button class="btn btn-success btn-go-paginate">
                                            Đi
                                        </button>
                                    </div>
                                </div>

                                <li class="pagination__arrow pagination__item">
                                    <a data-url="https://suustore.com/truyen/nang-khong-muon-lam-hoang-hau?page=2"
                                        style="cursor: pointer;"
                                        class="text-decoration-none w-100 h-100 d-flex justify-content-center align-items-center story-ajax-paginate">
                                        &gt;&gt;
                                    </a>
                                </li>
                            </ul> -->

                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-5 col-lg-4 sticky-md-top">

                    <div class="row top-ratings">
                        <div class="col-12 top-ratings__tab mb-1">
                                <strong class="d-block text-center fs-4">Top truyện xem nhiều</strong>
                                <div style="border-bottom: 2px solid #000; width: 100%; margin-top: 5px;"></div>

                        </div>
                        <div class="col-12 top-ratings__content">
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="top-day" role="tabpanel"
                                    aria-labelledby="top-day-list">
                                    <ul>
                                    <?php
                                        include '../php/db_connection.php';
                                        $sql = "SELECT * FROM data_truyen ORDER BY view_truyen DESC LIMIT 5";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            $stt = 1;
                                            while($row = $result->fetch_assoc()) {

                                                $bg_color = "bg-white"; // Mặc định là màu trắng
                                                $text_color = "text-dark"; // Mặc định là màu đen
                                                if ($stt == 1) {
                                                    $text_color = "text-white"; // Màu trắng
                                                    $bg_color = "bg-danger"; // Đỏ
                                                } elseif ($stt == 2) {
                                                    $text_color = "text-white";
                                                    $bg_color = "bg-success"; // Xanh lá cây
                                                } elseif ($stt == 3) {
                                                    $text_color = "text-white";
                                                    $bg_color = "bg-primary"; // Xanh da trời
                                                }
                                                echo '<li>';
                                                echo '    <div class="rating-item d-flex align-items-center">';
                                                echo '        <div class="rating-item__number ' . $bg_color . ' rounded-circle">';
                                                echo '            <span class="'.$text_color.'">'.$stt.'</span>';
                                                echo '        </div>';
                                                echo '        <div class="rating-item__story">';
                                                echo '            <a href="thong_tin_truyen.php?id=' . $row["id"] . '" class="text-decoration-none hover-title rating-item__story--name text-one-row">';
                                                echo $row["ten_truyen"];
                                                echo '            </a>';
                                                echo '            <div class="d-flex flex-wrap rating-item__story--categories">';
                                                echo '                <a href="thong_tin_truyen.php?id=' . $row["id"] . '" class="text-decoration-none text-dark hover-title me-1">';
                                                $tac_gia_id = $row["tac_gia"];
                                                $sql_tac_gia = "SELECT * FROM data_tac_gia WHERE id = $tac_gia_id";
                                                $result_tac_gia = $conn->query($sql_tac_gia);
                                                if ($result_tac_gia->num_rows > 0) {
                                                    while($row_tac_gia = $result_tac_gia->fetch_assoc()) {
                                                        echo $row_tac_gia["ten_tac_gia"];
                                                    }
                                                }
                                                echo '                </a>';
                                                echo '            </div>';
                                                echo '        </div>';
                                                echo '    </div>';
                                                echo '</li>';
                                                $stt++;
                                            }
                                        }
                                        else
                                        {
                                            echo "0 có j hết á bro";
                                        }
                                        ?>

                                    </ul>   
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section-list-category bg-light p-2 rounded card-custom">
                        <div class="head-title-global mb-2">
                            <div class="col-12 col-md-12 head-title-global__left">
                                <h2 class="mb-0 border-bottom border-secondary pb-1">
                                    <span href="#" class="d-block text-decoration-none text-dark fs-4"
                                        title="Truyện đang đọc">Thể loại truyện</span>
                                </h2>
                            </div>
                        </div>
                        <div class="row">
                            <!-- Horizontal under breakpoint -->
                            <ul class="list-category">
                            <?php 
                                include '../php/db_connection.php';
                                $sql = "SELECT * FROM data_the_loai";
                                $result = $conn->query($sql);
                                if($result -> num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        echo '<li>';
                                        echo '<a href="the_loai.php?id='.$row['id'].'" class="text-decoration-none text-dark hover-title">';
                                        echo $row["ten_the_loai"];
                                        echo '</a>';
                                        echo '</li>';
                                    }
                                }else {
                                    echo "0 kết quả";
                                }
                                $conn->close();
                            ?>                
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </main>


    <div id="footer" class="footer border-top pt-2">
        <div class="container">
            <div class="row">
                <ul class="col-12 col-md-7 list-unstyled d-flex flex-wrap list-tag">
                    <li class="me-1">
                        <span class="badge text-bg-light"><a class="text-dark text-decoration-none"
                                href="#" title="">Facebook</a></span>
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