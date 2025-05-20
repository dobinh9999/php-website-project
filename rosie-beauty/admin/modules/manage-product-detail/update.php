<?php
    $query = "SELECT * FROM product_detail where product_id = '$_GET[product_id]' LIMIT 1";
    $row_alter_products = mysqli_query($conn, $query);
?>
<!-- tạo một form update các thông tin của product_detail -->
<form method="POST" action="modules/manage-product-detail/handle.php?detail_id=<?php echo $_GET['detail_id']; ?>">
    <?php while ($row = mysqli_fetch_array($row_alter_products)) { ?>
        <input type="text" name="description" value="<?php echo $row['description']; ?>">
        <input type="number" name="stock_quantity" value="<?php echo $row['stock_quantity']; ?>">
        <input type="number" name="price" value="<?php echo $row['price']; ?>">
        <input type="submit" name="update_detail" value="Sửa mô tả sản phẩm">
    <?php } ?>
</form>