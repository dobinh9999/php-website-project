<?php
    $limit = 1; 
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Lấy số trang từ URL
    $offset = ($page - 1) * $limit; // Tính toán offset

    // Truy vấn để lấy tổng số đơn hàng
    $total_query = "SELECT COUNT(*) FROM checkout";
    $total_result = mysqli_query($conn, $total_query);
    $total_rows = mysqli_fetch_array($total_result)[0];
    $total_pages = ceil($total_rows / $limit); // Tính tổng số trang

    $query = "SELECT * FROM checkout LIMIT $limit OFFSET $offset";
    $row_list_order = mysqli_query($conn, $query);
?>

<p>Danh sách đơn hàng</p>
<table border="1" style="border-collapse: collapse; width: 100%;background-color: #f2f2f2;">
    <tr>
        <th>Mã đơn hàng</th>
        <th>Tên khách hàng</th>
        <th>Số điện thoại</th>
        <th>Địa chỉ</th>
        <th>Phương thức thanh toán</th>
        <th>Tổng tiền</th>
        <th>Ngày đặt hàng</th>
        <th>Trạng thái</th>
    </tr>
    <?php
        $i = 0;
        while($row = mysqli_fetch_array($row_list_order)){
            $i++;
            echo '<tr>';
            echo '<td>'.$row['checkout_id'].'</td>';
            echo '<td>'.$row['username'].'</td>';
            echo '<td>'.$row['phone_number'].'</td>';
            echo '<td>'.$row['Address']. ', ' .$row['commune']. ' - ' .$row['district']. ' - ' .$row['province'].'</td>';
            echo '<td>'.$row['payment_method'].'</td>';
            echo '<td>'.$row['total'].'</td>';
            echo '<td>'.$row['create_at'].'</td>';
            echo $row['status'] == 0 ? '<td>Đã thanh toán</td>' : '<td>Chưa thanh toán</td>';
            echo '</tr>';
        }
    ?>
</table>

<?php
    // Hiển thị phân trang
    for ($i = 1; $i <= $total_pages; $i++) {
        echo '<a href="?action=manage-order&query=list&page=' . $i . '">' . $i . '</a> ';
    }
?>