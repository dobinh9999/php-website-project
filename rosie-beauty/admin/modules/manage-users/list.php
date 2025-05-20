<?php
    include_once "../config/database.php";
    $stmt = $conn->prepare("SELECT * FROM user");
    $stmt->execute();
    $result = $stmt->get_result();
?>
    <table border="1">
        <tr>
            <th>Mã</th>
            <th>Họ và tên</th>
            <th>Email</th>
            <th>Mật khẩu</th>
            <th>Quyền</th>
            <th>Ngày đăng ký</th>
            <th>Trạng thái</th>
            <th>Thao tác</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['user_id']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['password']; ?></td>
            <td><?php echo $row['role'] == 1 ? 'Admin' : 'Người dùng'; ?></td>
            <td><?php echo $row['created_at']; ?></td>
            <td><?php echo $row['is_active'] == 1 ? 'Đang hoạt động' : 'Ngừng hoạt động'; ?></td>
            <td><a href="modules/manage-users/handle.php?user_id=<?php echo $row['user_id']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</a> | <a href="?action=manage-users&query=update&user_id=<?php echo $row['user_id']; ?>">Sửa</a></td>
        </tr>
        <?php } ?>
    </table>
<?php
    $stmt->close();
    $conn->close();
?>