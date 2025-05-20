<?php
    $query = "SELECT * FROM product_detail where product_id = '$_GET[product_id]' LIMIT 1";
    $row_alter_products = mysqli_query($conn, $query);
?>
    <table border="1">
        <tr>
            <th>Mã mô tả</th>
            <th>Mã sản phẩm</th>
            <th>Mô tả</th>
            <th>Số lượng trong kho</th>
            <th>Giá</th>
            <th>Ngày tạo</th>
        </tr>
        <?php while ($row = mysqli_fetch_array($row_alter_products)) { ?>
        <tr>
            <td><?php echo $row['detail_id']; ?></td>
            <td><?php echo $row['product_id']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['stock_quantity']; ?></td>
            <td><?php echo $row['price']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
        </tr>
        <?php } ?> 
    </table>
<?php
?>