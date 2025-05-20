<?php
    $isLogin = isset($_SESSION['username']) ? true : false;

    $_SESSION['product_id'] = $_GET['id'];
    $query = "SELECT products.product_id, products.name, products.category_id, products.image_url, 
                     product_detail.description, product_detail.stock_quantity, product_detail.price 
              FROM products 
              JOIN product_detail ON product_detail.product_id = products.product_id
              WHERE products.product_id = '$_GET[id]' LIMIT 1";
    $row_alter_products = mysqli_query($conn, $query);
?>

<link rel="stylesheet" href="app/assets/css/productDetail.css">
<div class="main-product-detail">
    <?php while ($row = mysqli_fetch_array($row_alter_products)) { ?>
        <div class="product-detail flex p-20">
        <form action="app/util/handleCart.php" method="POST" class="form-product-detail flex">
        
            <div class="product-image">
                <img src="<?php $row['image_url'] = str_replace('../..', 'admin', $row['image_url']); echo $row['image_url']; ?>">
            </div>
            <div class="product-info">
                <!-- thêm số sản phẩm đã bán -->
                <!-- Nếu sản phẩm là sản phẩm trong khuyến mãi thì hiển thị giá khuyến mãi -->
                <h1 class="product-title f-22"><?php echo $row['name']; ?></h1>
                <div class="price f-22"><?php echo number_format($row['price'], 0, ',', '.') . "₫"; ?></div>
                <?php if($row['stock_quantity'] > 0): ?>
                    <div class="stock-info f-14">Tình trạng: Còn hàng</div>
                <?php else: ?>
                    <div class="stock-info f-14">Tình trạng: Hết hàng</div>
                <?php endif; ?>
                <div class="shipping-info">
                    <ul>
                        <div class="column">
                            <li>
                                <img src="app/assets/img/service/giao-hang-toan-quoc.png">
                                <span>Giao hàng toàn quốc</span>
                            </li>
                            <li>
                                <img src="app/assets/img/service/thanh-toan-khi-nhan-hang.png">
                                <span>Thanh toán khi nhận hàng</span>
                            </li>
                        </div>
                        <div class="column">
                            <li>
                                <img src="app/assets/img/service/doi-tra-hang.png">
                                <span>Cam kết đổi - trả miễn phí</span>
                            </li>
                            <li>
                                <img src="app/assets/img/service/hang-chinh-hang-bao-hanh.png">
                                <span>Cam kết sản phẩm chính hãng</span>
                            </li>
                        </div>
                    </ul>
                </div>
                <p class="f-14">Số lượng:</p>
                <div class="quantity flex">
                    <button type="button" class="decrease" id="decrease-btn">-</button>
                    <input type="number" name="quantity-input" value="1" min="1" max="<?php echo $row['stock_quantity']; ?>" class="quantity-input text-center p-5" id="quantity-input">
                    <button type="button" class="increase-product-detail" id="increase-btn">+</button>
                </div>
                <?php if($isLogin): ?>
                    <button class="add-to-cart text-center f-16 f-wt-bold" name="btnAdd">Thêm vào giỏ hàng</button>
                    <button class="buy-now text-center f-16 f-wt-bold">Mua ngay</button>
                <?php else: ?>
                    <a class="add-to-cart text-center f-16 f-wt-bold ml-10" href="?action=account">Đăng nhập để mua hàng</a>
                <?php endif; ?>`
                </div>
            </form>
        </div>

        <!-- Mô tả sản phẩm -->
        <div class="product-description">
            <h2 class="f-22">Mô tả sản phẩm</h2>
            <p class="f-14"><?php echo $row['description']; ?></p>
        </div>
    <?php } ?>
</div>

<script src="app/assets/js/handle_quantity_input.js"></script>