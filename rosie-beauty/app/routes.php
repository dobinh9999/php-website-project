<?php
    if (isset($_GET['action']) ) {
        $temp = $_GET['action'];
    } else {
        $temp = ''; 
    }

    $pages = [
        'account' => 'pages/account.php',
        'accountDetail' => 'pages/accountDetail.php',
        'productDetail' => 'pages/productDetail.php',
        'cart' => 'pages/cart.php',
        'checkout' => 'pages/checkout.php',
        'introduce' => 'pages/introduce.php',
        'search' => 'pages/search.php',
        'products' => 'pages/products.php',
    ];

    if (array_key_exists($temp, $pages)) {
        include $pages[$temp];
    } else {
        include_once 'app/inc/slideshow.php';
        include_once 'app/inc/service.php';
        include_once 'app/inc/promotion.php';
        include_once 'app/inc/products.php';
        include_once 'app/inc/review.php';
        include_once 'app/inc/blogs.php';
    }
?>