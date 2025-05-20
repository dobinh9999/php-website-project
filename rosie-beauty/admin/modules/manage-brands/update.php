<?php
    $query = "SELECT * FROM brands where brand_id = '$_GET[brand_id]' LIMIT 1";
    $row_alter_brands = mysqli_query($conn, $query);
?>




<p>Sua thuong hieu san pham</p>
<table border="1" width = "50%" style="border-collapse: collapse;">
    <form method="POST" action="modules/manage-brands/handle.php?brand_id=<?php echo $_GET['brand_id']; ?>">
        <?php
            while($row = mysqli_fetch_array($row_alter_brands)){
                echo '
                    <tr>
                        <td>Tên thuong hieu</td>
                        <td><input type="text" value = "'.$row['name'].'" name="brand-name"></td>
                        <td>Logo</td>
                        <td><input type="file" value = "'.$row['logo_url'].'" name="brand-logo"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" name="update_brand" value="Sửa thương hiệu sản phẩm"></td>
                    </tr>';
        }
        ?>
    </form>
</table>