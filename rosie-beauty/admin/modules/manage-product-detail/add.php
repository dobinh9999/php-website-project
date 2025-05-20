<h2 style="text-align: center;">Thêm Mô tả sản phẩm</h2>
    <table border="1">
        <form method="POST" action="modules/manage-product-detail/handle.php">
            <tr>
                <td>Mã sản phẩm</td>
                <td><input type="text" name="product-id" value="<?php echo $_GET['product_id']; ?>"></td>
            </tr>
            <tr>
                <td>Mô tả</td>
                <td><textarea name="description" required></textarea></td>
            </tr>
            <tr>
                <td>Số lượng</td>
                <td><input type="number" name="stock_quantity" required></td>
            </tr>
            <tr>
                <td>Giá</td>
                <td><input type="number" name="price" required></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="add_detail" value="Thêm mô tả sản phẩm"></td>
            </tr>
        </form>
    </table>