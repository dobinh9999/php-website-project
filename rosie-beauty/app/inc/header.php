<?php
    session_start();
    error_reporting(0);
    $isLogin = isset($_SESSION['username']) ? true : false;
    $isAdmin = isset($_SESSION['role']) && intval($_SESSION['role']) == 1;

    // Hàm đăng xuất
    if (isset($_POST['logout'])) {
        session_unset(); 
        session_destroy();
        header("Location: Home.php");
        exit();
    }

    function createSlug($string) {
        $string = strtolower($string); // Chuyển thành chữ thường
        $string = preg_replace('/[^a-z0-9\s-]/', '', $string); // Xóa ký tự đặc biệt
        $string = preg_replace('/[\s-]+/', '-', $string); // Thay dấu cách và ký tự '-' thành 1 dấu '-'
        return trim($string, '-'); // Loại bỏ dấu '-' ở đầu/cuối
    }

    $user_id = $_SESSION["user_id"];
    $stmt = $conn->prepare("SELECT profile_picture_url FROM user_detail WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?= SITENAME; ?> </title>
    <link rel="stylesheet" href="app/assets/css/header.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">  
</head>
    <body>
        <div id="header" class="flex">
            <div id="left-header">
                <a href="<?= URLROOT; ?>"><img src="app/assets/img/Logo/logo.png"></a>
            </div>
            <ul id="center-header" class="flex">
                <li><a href="<?= URLROOT; ?>">TRANG CHỦ</a></li>
                <li><a href="?action=introduce">GIỚI THIỆU</a></li>
                <li>
                    <a href="?action=products">
                        SẢN PHẨM
                        <i class="nav-arrow-down fa-solid fa-caret-down ml-10 f-12"></i>
                    </a>
                    <!-- lấy ra các category từ database -->
                     <?php
                        $stmt = $conn->prepare("SELECT name FROM categories");
                        $stmt->execute();
                        $result = $stmt->get_result();
                     ?>
                    <ul class="subnav">
                        <?php while ($row = $result->fetch_assoc()) { ?>
                            <li><a href="?action=products&category=<?php echo urldecode($row['name']); ?>"><?php echo $row['name']; ?></a></li>
                        <?php } ?>
                    </ul>
                </li>
                <li><a href="?action=contact">LIÊN HỆ</a></li>
                <li><a href="?action=blogs">TIN TỨC</a></li>
                <li><a href="?action=cart">GIỎ HÀNG</a></li>
                <li><a href="?action=search"><i class="fa-solid fa-magnifying-glass"></i></a></li>
            </ul>
            <div id="right-header" class="flex">
                <ul id="nav-right">   
                    <?php if ($isLogin): ?>
                        <li class="account-icon">
                            <a href="?action=accountDetail">
                                <?php if(isset($row["profile_picture_url"])): ?>
                                    <img class="icon-user" src="<?php $row['profile_picture_url'] = str_replace('../../', '', $row['profile_picture_url']); echo $row['profile_picture_url']; ?>">
                                <?php else: ?>
                                    <img class="icon-user" src="app/assets/img/Logo/icon_user.png" alt="">
                                <?php endif; ?>
                            </a>
                            <ul class="subnav-two">
                                <li><a href="?action=accountDetail">Thông tin tài khoản</a></li>
                                <li><a href="?action=orderHistory">Lịch sử đơn hàng</a></li>
                                <li><a href="?action=changePassword">Đổi mật khẩu</a></li>
                                <li>
                                    <form method="post">
                                        <button class="btn-logout" type="submit" name="logout">Đăng Xuất</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    <?php else: ?>
                        <li>
                            <a href="?action=account">
                                <img class="icon-user" src="app/assets/img/Logo/icon_user.png" alt="">
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
                <?php if ($isAdmin): ?>
                    <div class="btn-admin">
                        <a href="admin/index_admin.php" class="admin ml-10 border-radius-10 ">Trang Admin</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </body>
</html>