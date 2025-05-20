<?php
    $query = "SELECT * FROM categories where category_id = '$_GET[category_id]' LIMIT 1";
    $row_alter_danhmuc = mysqli_query($conn, $query);
?>


<p>Sua danh muc san pham</p>
<table border="1" width = "50%" style="border-collapse: collapse;">
    <form method="POST" action="modules/manage-category/handle.php?category_id=<?php echo $_GET['category_id']; ?>">
        <?php
            while($row = mysqli_fetch_array($row_alter_danhmuc)){
                echo '
                    <tr>
                        <td>Tên danh mục</td>
                        <td><input type="text" value = "'.$row['name'].'" name="category-name"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" name="update_category" value="Sửa danh mục sản phẩm"></td>
                    </tr>';
        }
        ?>
    </form>
</table>