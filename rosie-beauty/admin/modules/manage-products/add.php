<?php
    $query = "SELECT * FROM categories";
    $row_alter_categories = mysqli_query($conn, $query);
?>

<form action="modules/manage-products/handle.php" method="POST" enctype="multipart/form-data">
    <table>
        <tr>
            <td colspan="2"><center><h3>Thêm sản phẩm</h3></center></td>
        </tr>
        <tr>
            <td>Tên sản phẩm</td>
            <td><input type="text" name="product-name"></td>
        </tr>
        <tr>
            <td>Danh mục</td>
            <td>
                <select id="product-category" name="product-category">
                    <?php
                        while($row = mysqli_fetch_array($row_alter_categories)){
                            echo '<option value="'.$row['category_id'].'">'.$row['name'].'</option>';
                        }
                    ?>
                </select>
            </td>
        </tr>

        <tr>
            <td>Ảnh sản phẩm</td>
            <td><input type="file" name="product-image"></td>
        </tr>
        <tr>
            <td>Thao tác</td>
            <td>
                <input type="submit" name = "add_product" value = "Thêm">
                <input type="reset" name = "btnHuy" value = "Hủy">
            </td>
        </tr>
    </table>
</form>
