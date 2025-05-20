<?php
    session_start();
    $isAdmin = isset($_SESSION['role']) && intval($_SESSION['role']) == 1;
    if (!$isAdmin) {
        header("Location: ../");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <link rel="stylesheet" href="public/css/index_admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"/>
</head>
<body>
    <button><a href="../Home.php">Trở về trang chủ</a></button>
    <h3 class = "title-admin">WELCOME TO ADMIN</h3>

    <?php include "../config/database.php"; ?>
    <div class="wrapper">
        <div class="menu">
            <ul class="list-admin">
                <li><a href="index_admin.php?action=manage-category&query=add">Danh mục</a></li>
                <li><a href="index_admin.php?action=manage-brands&query=add">Thương hiệu</a></li>
                <li><a href="index_admin.php?action=manage-users&query=add">Người dùng</a></li>
                <li>
                    <a href="javascript:void(0);" class="dropdown-toggle">Khuyến mãi</a>
                    <ul class="subnav">
                        <li><a href="index_admin.php?action=manage-promotion&query=add">Thêm khuyến mãi</a></li>
                        <li><a href="index_admin.php?action=manage-promotion&query=list">Xem khuyến mãi</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="dropdown-toggle">Sản phẩm</a>
                    <ul class="subnav">
                        <li><a href="index_admin.php?action=manage-products&query=add">Thêm sản phẩm</a></li>
                        <li><a href="index_admin.php?action=manage-products&query=list">Xem sản phẩm</a></li>
                    </ul>
                </li>
                <li><a href="index_admin.php?action=manage-blogs&query=add">Bài viết</a></li>
                <li><a href="index_admin.php?action=manage-order&query=list">Đơn hàng</a></li>
            </ul>
        </div>
        <div class="display">
            <?php include "modules/route.php"; ?>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dropdownToggles = document.querySelectorAll('.dropdown-toggle'); // Chọn tất cả các dropdown-toggle

            dropdownToggles.forEach((dropdownToggle) => {
                const subnav = dropdownToggle.nextElementSibling; // Lấy phần tử subnav tương ứng

                dropdownToggle.addEventListener('click', function() {
                    subnav.style.display = subnav.style.display === 'block' ? 'none' : 'block';
                });
            });
        });
    </script>
</body>
</html>