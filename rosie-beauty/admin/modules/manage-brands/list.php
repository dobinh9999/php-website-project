<?php
    include_once "../config/database.php";
    $stmt = $conn->prepare("SELECT * FROM brands");
    $stmt->execute();
    $result = $stmt->get_result();
?>
    <table border="1">
        <tr>
            <th>Tên thương hiệu</th>
            <th>Logo</th>
            <th>Thao tác</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['name']; ?></td>
            <td><img src="<?php $row['logo_url'] = str_replace('../..', '../admin', $row['logo_url']); echo $row['logo_url']; ?>" width="100" height="100"></td>
            <td><a href="modules/manage-brands/handle.php?brand_id=<?php echo $row['brand_id']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</a> | <a href="?action=manage-brands&query=update&brand_id=<?php echo $row['brand_id']; ?>">Sửa</a></td>
        </tr>
        <?php } ?>
    </table>
<?php
    $stmt->close();
    $conn->close();
?>