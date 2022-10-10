<?php
include('connect.php');
if (!isset($_SESSION['id_admin'])) {
    header("Location:../index.php");
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- <link rel="stylesheet" href="../customer/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/update.css">
    <title>Foody Website</title>
</head>

<body>
    <input type="checkbox" id="sidebar-toggle">
    <div class="sidebar">
        <div class="header-sidebar">
            <h3 class="brand">
                <span class="fa-solid fa-seedling"></span>
                <span>Foody</span>
            </h3>
            <label for="sidebar-toggle" class="ti-menu-alt"></label>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="index.php">
                        <span class="fas fa-home"></span>
                        <span>Trang chủ</span>
                        <!-- Thống kê -->
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="fas fa-user"></span>
                        <span>Người dùng</span>
                        <!-- Thêm 3 thẻ con: Tài khoản, Nhân viên, Khách hàng -->
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="fa-solid fa-spa"></span>
                        <span>Sản phẩm</span>
                        <!-- Thêm 2 thẻ con: Loại sản phẩm, Sản phẩm -->
                    </a>
                </li>
                <li>
                    <a href="typeProduct.php">
                        <span class="fa-solid fa-spa"></span>
                        <span>Loại sản phẩm</span>
                        <!-- Thêm 2 thẻ con: Loại sản phẩm, Sản phẩm -->
                    </a>
                </li>
                <li>
                    <div>
                        <div id="headingOne">
                            <h5 class="mb-0">
                                <a data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                                    aria-controls="collapseOne">
                                    <span class="fa-solid fa-spa"></span>
                                    <span>Sản phẩm<i class="fa-solid fa-sort-down flex-right" style="margin-left: 50px;"></i></span>
                                    
                                </a>
                            </h5>
                        </div>
                        <ul id="collapseOne" class="collapse" aria-labelledby="headingOne"
                            data-parent="#accordionExample">
                            <li>
                                <a href="typeProduct.php">
                                    <i class="fa-regular fa-circle-stop"></i>
                                    <span>Quản lý loại sản phẩm</span>
                                </a>
                            </li>
                            <li>
                                <a href="typeProduct.php">
                                    <i class="fa-regular fa-circle-stop"></i>
                                    <span>Quản lý sản phẩm</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#">
                        <span class="fa-solid fa-house-chimney"></span>
                        <span>Hóa đơn</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="fa-solid fa-house-circle-check"></span>
                        <span>Bài viết</span>
                    </a>
                </li>
                <li>
                    <a href="logout.php">
                        <span class="fas fa-power-off"></span>
                        <span>Đăng xuất</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- SEARCH -->
    <div class="main-content">
        <header>
            <div class="search-wrapper">
                <!-- <span class="ti-search"></span>
                        <input type="text" placeholder="Tìm kiếm"> -->
            </div>
            <div class="social-icons">
                <div>
                    <?php
$id_admin = $_SESSION['id_admin'];
$sql = "SELECT * FROM tbl_user WHERE id = '$id_admin'";
$result = mysqli_query($connect, $sql);
if ($result == TRUE) {
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $image_user = $row['image'];
        }
    }
}
?>
                    <img src="../image/<?php echo $image_user; ?>" alt="">
                </div>
            </div>
        </header>