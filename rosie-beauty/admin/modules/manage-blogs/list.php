<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        padding: 10px;
        text-align: left;
        border: 1px solid #ddd;
    }
    th {
        background-color: #f2f2f2;
    }
    tr:hover {
        background-color: #f5f5f5;
    }
</style>
<?php
    include_once "../config/database.php";
    
    $stmt = $conn->prepare("SELECT * FROM blogs");
    $stmt->execute();
    $result = $stmt->get_result();
?>
    <table border="1">
        <tr>
            <th>Mã</th>
            <th>Tiêu đề</th>
            <th>Nội dung</th>
            <th>Ảnh</th>
            <th>Thao tác</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['blog_id']; ?></td>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['content']; ?></td>
            <td><img src="<?php $row['img_url'] = str_replace('../..', '../admin', $row['img_url']); echo $row['img_url']; ?>" width="100" height="100"></td>
            <td><a href="modules/manage-blogs/handle.php?blog_id=<?php echo $row['blog_id']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</a> | <a href="?action=manage-blogs&query=update&blog_id=<?php echo $row['blog_id']; ?>">Sửa</a></td>
        </tr>
        <?php } ?>
    </table>
<?php
    $stmt->close();
    $conn->close();
?>