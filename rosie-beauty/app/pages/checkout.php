<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Checkout</title>
    <link rel="stylesheet" href="app/assets/css/checkout.css">
</head>
<body>

<?php
    $product_ids = $_SESSION['selected_products'];
    foreach ($product_ids as $product_id) {
        echo $product_id;
    }
    $query = "SELECT * FROM user_detail where user_id = '$_SESSION[user_id]' LIMIT 1";
    $row_user_detail = mysqli_query($conn, $query);
?>


<form action="app/util/handleCheckout.php" method="POST" id="multiStepForm">
<div class="form-container">
        <!-- Step 1 -->
        <?php while ($row = mysqli_fetch_array($row_user_detail)) { ?>
        <div class="form-step active" id="step-1">
            <div class="form-group">
                <label for="username">Tên người dùng:</label>
                <input type="text" id="username" name="username" value="<?php echo $row['full_name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="phone_number">Số điện thoại:</label>
                <input type="tel" id="phone_number" name="phone_number" value="<?php echo $row['phone_number']; ?>" required>
            </div>
            <div class="form-group">
                <label for="address">Địa chỉ:</label>
                <input type="text" id="address" name="address" required>
            </div>
            <div class="form-group">
                <label for="province">Tỉnh/Thành phố:</label>
                <select id="province" name="province" required>
                    <option value="">Chọn tỉnh/thành phố</option>
                </select>
            </div>
            <div class="form-group">
                <label for="district">Quận/Huyện:</label>
                <select id="district" name="district" required>
                    <option value="">Chọn quận/huyện</option>
                </select>
            </div>
            <div class="form-group">
                <label for="commune">Xã/Phường:</label>
                <select id="commune" name="commune" required>
                    <option value="">Chọn xã/phường</option>
                </select>
            </div>
            <div class="form-group">
                <label for="note">Ghi chú (nếu có):</label>
                <input type="text" id="note" name="note">
            </div>
            <div class="btn-group">
                <button type="button" id="nextBtn">Next</button>
            </div>
        </div>

        <!-- Step 2 -->
        <div class="form-step" id="step-2">
            <div class="form-group">
                <label for="payment_method">Phương thức thanh toán:</label>
                <select id="payment_method" name="payment_method" required>
                    <option value="Thẻ tín dụng">Thẻ tín dụng</option>
                    <option value="Chuyển khoản">Chuyển khoản</option>
                    <option value="Thanh toán khi nhận hàng">Thanh toán khi nhận hàng</option>
                </select>
            </div>
            
            <!-- QR Code Container -->
            <div id="qrCodeContainer" class="qr-code-container" style="display: none;">
                <h4>Quét mã QR để thanh toán:</h4>
                <div id="qrcode"></div>
            </div>
            <div class="form-group">
                <label for="coupon_code">Mã giảm giá:</label>
                <input type="text" id="coupon_code" name="coupon_code">
            </div>
            <div class="form-group">
                <label for="temp_total">Tạm tính:</label>
                <input type="number" id="temp_total" name="temp_total" step="0.01" value="<?php echo $_SESSION['total_price']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="ship_fee">Phí vận chuyển:</label>
                <input type="number" id="ship_fee" name="ship_fee" step="0.01" readonly>
            </div>
            <div class="form-group">
                <label for="total">Tổng cộng:</label>
                <input type="number" id="total" name="total" step="0.01" readonly>
            </div>
            <div class="btn-group">
                <button type="button" id="prevBtn">Previous</button>
                <button type="submit" name="btnAdd">Submit</button>
            </div>
        </div>
        <?php } ?>
    </div>
</form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
<script src="app/assets/js/checkout.js"></script>
</body>
</html>