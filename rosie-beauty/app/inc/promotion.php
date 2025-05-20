<?php
    $stmt1 = $conn->prepare("SELECT 
                pp.promotion_id, pp.product_id, 
                p.name as product_name, p.category_id, p.image_url,
                pd.description, pd.stock_quantity, pd.price, 
                pr.name as promotion_name, pr.discount_type, pr.value,
                pr.start_date, pr.end_date, pr.is_active        
            FROM product_promotions AS pp
            JOIN products AS p ON pp.product_id = p.product_id
            JOIN promotion AS pr ON pp.promotion_id = pr.promotion_id
            JOIN product_detail AS pd ON p.product_id = pd.product_id");
    if ($stmt1) {
        $stmt1->execute();
        $result1 = $stmt1->get_result();
    } else {
        echo "Lỗi trong truy vấn: " . $conn->error;
    }
?>

<link rel="stylesheet" href="app/assets/css/promotion_inc.css">

<!-- Promotion -->
<div class="promotion-container text-center p-20">
    <div class="promotion-title">
        <img src="app/assets/img/background-title/promotion_module_background.png" alt="KHUYẾN MẠI">
        <a class="f-wt-bold f-22" href="">KHUYẾN MẠI</a>
    </div>  
    <div class="promotion-content flex flex-center-2">
        <div class="image-slider-promotion">
            <?php while ($product = $result1->fetch_assoc()) { ?>
                <div class="image-item">      
                    <div class="image">
                        <a href="?action=productDetail&id=<?php echo $product['product_id']; ?>">
                            <img src="<?php $product['image_url'] = str_replace('../..', 'admin', $product['image_url']); echo $product['image_url']; ?>">
                        </a>
                    </div>
                    <p class="product-name text-center f-14">
                        <a href="?action=productDetail&id=<?php echo $product['product_id']; ?>">
                            <?php echo $product['product_name']; ?>
                        </a>
                    </p>
                    <div class="price-container">
                        <p class="old-price">
                            <?php echo number_format($product['price'], 0, ',', '.'); ?>đ
                        </p>
                        <?php if($product['discount_type'] == 'percentage') { ?>
                            <p class="new-price">
                                <?php echo number_format($product['price'] - ($product['price'] * $product['value'] / 100), 0, ',', '.'); ?>đ
                            </p>
                        <?php } else { ?>
                            <p class="new-price">
                                <?php echo number_format($product['price'] - $product['value'], 0, ',', '.'); ?>đ
                            </p>
                        <?php } ?>
                    </div>
                </div>  
            <?php } ?>
        </div>

        <div class="image-banner flex-1">
            <img src="app/assets/img/promotion/banner_promotion.jpg" alt="Promotion Banner">
        </div>
    </div>
</div>

<?php
    $stmt2 = $conn->prepare("SELECT * FROM products WHERE created_at >= NOW() - INTERVAL 16 DAY");
    $stmt2->execute();
    $result2 = $stmt2->get_result();
?>

<!-- New Arrival -->
<div class="promotion-container text-center p-20">
    <div class="promotion-title">
        <img src="app/assets/img/background-title/new_module_background.png" alt="KHUYẾN MẠI">
        <a class="f-wt-bold f-22" style="color: #225a21;" href="">HÀNG MỚI VỀ</a>
    </div>  
    <div class="new-arrival-content flex flex-center-2">
        <div class="image-slider-new-arrival">
            <?php while ($product = $result2->fetch_assoc()) { ?>
                <div class="image-item">      
                    <div class="image">
                        <a href="?action=productDetail&id=<?php echo $product['product_id']; ?>">
                            <img src="<?php $product['image_url'] = str_replace('../..', 'admin', $product['image_url']); echo $product['image_url']; ?>">
                        </a>
                    </div>
                    <p class="text-center f-14">
                        <a href="?action=productDetail&id=<?php echo $product['product_id']; ?>">
                            <?php echo $product['name']; ?>
                        </a>
                    </p>
                    <?php if($product['discount_type'] == 'percentage') { ?>
                        <p class="new-price"><?php echo number_format($product['price'] - ($product['price'] * $product['value'] / 100), 0, ',', '.'); ?>đ</p>
                    <?php } else { ?>
                        <p class="new-price"><?php echo number_format($product['price'] - $product['value'], 0, ',', '.'); ?>đ</p>
                    <?php } ?>
                </div>  
            <?php } ?>
        </div>
    </div>
</div>

<script src="app/assets/js/slidesToShow.js"></script>
<script>
    initializeSlider('.image-slider-promotion', 3, true);
    initializeSlider('.image-slider-new-arrival', 5, true);
</script>