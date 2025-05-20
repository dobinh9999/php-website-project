<?php
    if (isset($_POST['btnSign'])) {
        $promotion_id = $_POST['promotion_id'];
        $product_id = $_GET['product_id']; // Lấy product_id từ query string

        //Chèn promotion_id và product_id vào bảng promotion_products
        $insert_query = "INSERT INTO product_promotions (promotion_id, product_id) VALUES ('$promotion_id', '$product_id')";
        if (mysqli_query($conn, $insert_query)) {
            $success_message = "Kích hoạt thành công!"; // Lưu thông báo thành công
        } else {
            $error_message = "Lỗi khi kích hoạt: " . mysqli_error($conn);
        }
    }

    // Lấy danh sách promotions
    $query = "SELECT promotion_id, name FROM promotion";
    $result = mysqli_query($conn, $query);
?>

<style>
    .sign-to-product select {
        width: 100%;
        padding: 10px;
        margin-top: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .button-container {
        text-align: right; /* Căn chỉnh nút về bên phải */
    }

    .sign-to-product button {
        background-color: #28a745;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }

    .sign-to-product button:hover {
        background-color: #218838;
    }

    .sign-to-product .modal {
        display: none; /* Ẩn modal mặc định */
        position: fixed;
        bottom: 20px;
        right: 20px;
        background-color: #28a745;
        color: white;
        padding: 15px;
        border-radius: 5px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        z-index: 1000;
    }
</style>

<div class="sign-to-product">
    <form action="" method="post">
        <label for="promotion_id">Chọn khuyến mại:</label>
        <select name="promotion_id" id="promotion_id" required>
            <?php
                if ($result) {
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<option value='" . $row['promotion_id'] . "'>" . $row['name'] . "</option>";
                    }
                } else {
                    echo "<option value=''>Không có promotion nào</option>";
                }
            ?>
        </select>
        <div class="button-container">
            <button type="submit" name="btnSign">Kích hoạt</button>
        </div>
    </form>

    <!-- Modal thông báo -->
    <div class="modal" id="successModal">
        <?php echo $success_message; ?>
    </div>
</div>

<script>
    // Hiển thị modal nếu có thông báo thành công
    const successMessage = "<?php echo $success_message; ?>";
    if (successMessage) {
        const modal = document.getElementById('successModal');
        modal.style.display = 'block'; // Hiển thị modal

        // Tự động ẩn modal sau 3 giây
        setTimeout(() => {
            modal.style.display = 'none';
            window.location.href = '?action=manage-products&query=list'; 
        }, 2000);
    }
</script>