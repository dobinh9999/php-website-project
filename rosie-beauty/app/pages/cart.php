<?php
    session_start();
    $isLogin = isset($_SESSION['username']) ? true : false;

    if($isLogin){
        $user_id = $_SESSION["user_id"];
        $stmt = $conn->prepare(
        "SELECT order_detail.order_detail_id, orders.order_id AS order_id, 
                order_detail.product_id AS product_id, order_detail.quantity, 
                products.name, products.category_id, 
                products.created_at, products.image_url, product_detail.price
        FROM order_detail 
        JOIN orders ON order_detail.order_id = orders.order_id
        JOIN products ON order_detail.product_id = products.product_id
        JOIN product_detail ON order_detail.product_id = product_detail.product_id
        WHERE orders.user_id = ?"
    );
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
    }else{
        header("Location: ?action=account");
        exit();
    }

    // Kiểm tra nếu giá trị 'total_price' được gửi qua phương thức POST
    if (isset($_POST['total_price'])) {
        $_SESSION['total_price'] = $_POST['total_price'];
    }
?>

<link rel="stylesheet" href="app/assets/css/cart.css">

<div class="cart-container">
    <table class="cart-table">
        <thead>
            <tr>
                <th><input type="checkbox" id="select-all" onclick="toggleSelectAll()"> Chọn tất cả</th>
                <th>Thông tin sản phẩm</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
            </tr>
        </thead>
        <tbody>
            <form action="app/util/handleCart.php" method="POST">   
                <?php while ($order = $result->fetch_assoc()) { ?>
                    <tr class="cart-item">
                        <td><input type="checkbox" class="product-checkbox" name="product_id[]" value="<?php echo $order['product_id'];?>"></td>
                        <td class="product-info flex">
                            <img src="<?php $order['image_url'] = str_replace('../..', 'admin', $order['image_url']); echo $order['image_url']; ?>">
                            <span><?php echo $order['name']; ?></span>
                            <button name="btnDelete" class="delete-btn" value="<?php echo $order['product_id']; ?>"><i class="fa-solid fa-trash"></i></button>
                        </td>
                        <td class="price"><?php echo $order['price']; ?> đ</td>
                        <td class="product-quantity">
                            <button type="button" class="decrease" id="decrease-btn">-</button>
                            <input class="quantity-input text-center" type="number" value="<?php echo $order['quantity']; ?>" min="1">
                            <button type="button" class="increase" id="increase-btn">+</button>
                        </td>
                        <td><?php echo $order['price'] * $order['quantity']; ?> đ</td>
                    </tr>
                <?php } ?>
                <div class="cart-total flex f-wt-bold">
                    <span class="ml-10">Tổng tiền:</span>
                    <span class="total-price"></span>
                </div>

                <button name="btnCheckout" class="checkout-btn" disabled>Thanh toán</button>
            </form>
        </tbody>
    </table>
</div>

<script src="app/assets/js/handle_quantity_input.js"></script>
<script src="app/assets/js/cart.js"></script>