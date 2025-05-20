<?php
    $stmt = $conn->prepare("SELECT products.*, product_detail.* FROM products JOIN product_detail ON products.product_id = product_detail.product_id LIMIT 10");
    $stmt->execute();
    $result = $stmt->get_result();
?>

<link rel="stylesheet" href="app/assets/css/products_inc.css">

<div class="products-container text-center">
    <div class="section-title">
        <img src="app/assets/img/promotion/most_sales.png" alt="SẢN PHẨM BÁN CHẠY">
        <p class="section-name f-wt-bold f-20" href="">SẢN PHẨM BÁN CHẠY</p>
    </div> 
    <div class="products-grid flex wrap mt-10">
        <?php while ($row = $result->fetch_assoc()) { ?>
            <div class="product-card text-center p-10 m-10 border-radius-10">
                <a href="?action=productDetail&id=<?php echo $row['product_id']; ?>"><img src="<?php $row['image_url'] = str_replace('../..', 'admin', $row['image_url']); echo $row['image_url']; ?>"></a>
                <a href="?action=productDetail&id=<?php echo $row['product_id']; ?>"><p class="product-name f-14"><?php echo $row['name']; ?></p></a>
                <p class="product-price f-16"><?php echo number_format($row['price'], 0, ',', '.') . "₫"; ?></p>
            </div>
        <?php } ?>
    </div>
</div>