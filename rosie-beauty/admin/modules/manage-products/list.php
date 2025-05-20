<?php
    include_once "../config/database.php";

    $limit = 4; 
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Lấy số trang từ URL
    $offset = ($page - 1) * $limit; // Tính toán offset

    // Truy vấn để lấy tổng số đơn hàng
    $total_query = "SELECT COUNT(*) FROM products";
    $total_result = mysqli_query($conn, $total_query);
    $total_rows = mysqli_fetch_array($total_result)[0];
    $total_pages = ceil($total_rows / $limit); // Tính tổng số trang

    $stmt = $conn->prepare("SELECT * FROM products ORDER BY created_at DESC LIMIT $limit OFFSET $offset");
    $stmt->execute();
    $result = $stmt->get_result();
    $stt = 1;
?>

<style>
    /* thiết kế các link có css giống như button */
    .detail-button {
        background-color: #007BFF;
        color: white;
        padding: 5px;
        border-radius: 5px;
    }
    .delete-button {
        background-color: red;
        color: white;
        padding: 5px;
        border-radius: 5px;
    }
    .update-button {
        background-color: orange;
        color: white;
        padding: 5px;
        border-radius: 5px;
    }
    .promotion-button {
        background-color: purple;
        color: white;
        padding: 5px;
        border-radius: 5px;
    }
</style>
    <table border="1">
        <tr>
            <th>STT</th>
            <th>Tên</th>
            <th>Danh mục</th>
            <th>Ảnh</th>
            <th>Ngày nhập</th>
            <th>Thao tác</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $stt++; $_SESSION['product_id']=$row['product_id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td>
                <?php
                    $query = "SELECT * FROM categories WHERE category_id = '$row[category_id]'";
                    $row_alter_categories = mysqli_query($conn, $query);
                    $row_alter_categories = mysqli_fetch_array($row_alter_categories);
                    echo $row_alter_categories['name'];
                ?>
            </td>
            <td><img src="<?php $row['image_url'] = str_replace('../..', '../admin', $row['image_url']); echo $row['image_url']; ?>" width="100" height="100"></td>
            <td><?php echo $row['created_at']; ?></td>
            <?php
                // kiểm tra xem có promotion nào kích hoạt với product này không
                $query_check_promotion = "SELECT * FROM product_promotions WHERE product_id = '$row[product_id]'";
                $result_check_promotion = mysqli_query($conn, $query_check_promotion);
                $is_promotion = mysqli_num_rows($result_check_promotion) > 0 ? true : false;
            ?>
            <td>
                <div class="columns">
                    <div class="column">
                        <a class='detail-button' href='?action=manage-product-detail&query=list&product_id=<?php echo $row['product_id']; ?>'>Xem chi tiết</a> 
                        <?php if ($is_promotion) { ?>
                            <a class='promotion-button'>Đang áp dụng</a>
                        <?php }else { ?>
                            <a class='promotion-button' href='?action=manage-promotion&query=signToProduct&product_id=<?php echo $row['product_id']; ?>'>Khuyến mại</a>
                        <?php } ?>
                    </div>
                    <div class="column">
                        <a class='update-button' href='?action=manage-products&query=update&product_id=<?php echo $row['product_id']; ?>'>Sửa</a>
                        <a class='delete-button' href='modules/manage-products/handle.php?product_id=<?php echo $row['product_id']; ?>' onclick='return confirm("Bạn có chắc chắn muốn xóa?");'>Xóa</a> 
                    </div>
                </div>
            </td>
        </tr>
        <?php } ?>
    </table>
    <?php
    // Hiển thị phân trang
    for ($i = 1; $i <= $total_pages; $i++) {
        echo '<a href="?action=manage-products&query=list&page=' . $i . '">' . $i . '</a> ';
    }
?>
<?php
    $stmt->close();
    $conn->close();
?>