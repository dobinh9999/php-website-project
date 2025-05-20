<?php
    include_once "../config/database.php";
    
    $stmt = $conn->prepare("SELECT * FROM promotion");
    $stmt->execute();
    $result = $stmt->get_result();
?>
    <table border="1">
        <tr>
            <th>Tiêu đề</th>
            <th>Loại khuyến mãi</th>
            <th>Giá trị</th>
            <th>Ngày bắt đầu</th>
            <th>Ngày kết thúc</th>
            <th>Trạng thái</th>
            <th>Thao tác</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['discount_type'] == 'fixed_amount' ? 'Tiền mặt' : 'Phần trăm'; ?></td>
            <td><?php echo $row['value']; ?></td>
            <td><?php echo $row['start_date']; ?></td>
            <td><?php echo $row['end_date']; ?></td>
            <td><?php echo $row['is_active'] == 1 ? 'Đang hoạt động' : 'Không hoạt động'; ?></td>
            <td><a href="modules/manage-promotion/handle.php?promotion_id=<?php echo $row['promotion_id']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</a> | <a href="?action=manage-promotion&query=update&promotion_id=<?php echo $row['promotion_id']; ?>">Sửa</a></td>
        </tr>
        <?php } ?>
    </table>
<?php
    $stmt->close();
    $conn->close();
?>