<?php
    $query = "SELECT * FROM categories";
    $row_list_danhmuc = mysqli_query($conn, $query);
?>

<p>Danh sách danh mục sảnh phẩm</p>
<table border="1" style="border-collapse: collapse; width: 100%;background-color: #f2f2f2;">
    <tr>
        <th>Mã danh mục</th>
        <th>Tên danh mục</th>
        <th>Quản lý</th>
    </tr>
    <?php
        $i = 0;
        while($row = mysqli_fetch_array($row_list_danhmuc)){
            $i++;
            echo '<tr>';
            echo '<td>'.$row['category_id'].'</td>';
            echo '<td>'.$row['name'].'</td>';
            echo '<td><a href="modules/manage-category/handle.php?category_id='.$row['category_id'].'" onclick="return confirm(\'Bạn có chắc chắn muốn xóa?\');">Xóa</a> | <a href="?action=manage-category&query=update&category_id='.$row['category_id'].'">Sửa</a></td>'; 
            echo '</tr>';
        }
    ?>
</table>