<div class="clear"></div>
<div class="main">
    <?php
        if (isset($_GET['action']) && $_GET['query']) {
            $temp = $_GET['action'];
            $query = $_GET['query'];
        } else {
            $temp = ''; 
            $query = '';
        }
        if($temp == 'manage-category' && $query == 'add') {
            include "modules/manage-category/add.php";
            include "modules/manage-category/list.php";
        }else if($temp == 'manage-category' && $query == 'update'){
            include "modules/manage-category/update.php";
        }else if($temp == 'manage-brands' && $query == 'add'){
            include "modules/manage-brands/add.php";
            include "modules/manage-brands/list.php";
        }else if ($temp == 'manage-brands' && $query == 'update') {
            include "modules/manage-brands/update.php";
        }else if ($temp == 'manage-users' && $query == 'add') {
            include "modules/manage-users/list.php";
        }else if ($temp == 'manage-users' && $query == 'update') {
            include "modules/manage-users/update.php";
        }else if ($temp == 'manage-products' && $query == 'add') {
            include "modules/manage-products/add.php";
        }else if ($temp == 'manage-products' && $query == 'list') {
            include "modules/manage-products/list.php";
        }else if ($temp == 'manage-products' && $query == 'update') {
            include "modules/manage-products/update.php";
        }else if ($temp == 'manage-blogs' && $query == 'add') {
            include "modules/manage-blogs/add.php";
            include "modules/manage-blogs/list.php";
        }else if ($temp == 'manage-blogs' && $query == 'update') {
            include "modules/manage-blogs/update.php";
        }else if ($temp == 'manage-product-detail' && $query == 'add') {
            include "modules/manage-product-detail/add.php";
        }else if ($temp == 'manage-product-detail' && $query == 'list') {
            include "modules/manage-product-detail/list.php";
        }else if ($temp == 'manage-product-detail' && $query == 'update') {
            include "modules/manage-product-detail/update.php";
        }else if ($temp == 'manage-order' && $query == 'list') {
            include "modules/manage-order/list.php";
        }else if ($temp == 'manage-promotion' && $query == 'add') {
            include "modules/manage-promotion/add.php";
        }else if ($temp == 'manage-promotion' && $query == 'list') {
            include "modules/manage-promotion/list.php";
        }else if ($temp == 'manage-promotion' && $query == 'signToProduct') {
            include "modules/manage-promotion/signToProduct.php";
        }else {
            //include "modules/index_admin.php";
        }
    ?>
</div>