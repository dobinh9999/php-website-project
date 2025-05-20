<!-- Thiết kế một trang tìm kiếm với 1 form đơn giản , xử lý tại trang này luôn-->
 <!-- thêm chút css để form này đẹp hơn -->

 <style>
    .mainSearch form {
        text-align: center;
        margin: 20px 0;
    }

    .mainSearch input[type="text"] {
        width: 300px;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 5px;
        outline: none;
    }

    .mainSearch button {
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        font-size: 16px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .search-result{
        border: 1px solid #eee;
        background-color: #fff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .products-container {
        max-width: 1200px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    /* .products-container {
        width: 85%;
        margin: 0 auto;
        position: relative;
    } */

    .products-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
    }

    .search-result:hover {
        transform: scale(1.05);
        transition: transform 0.4s ease;
    }

    .search-result img {
        width: 170px;
        height: 170px;
        object-fit: cover;
        border-radius: 8px;
        margin-bottom: 10px;
    }

    .product-name {
        margin: 10px 0;
        color: var(--color-link);
    }

 </style>

<div class="mainSearch">    
    <form action="" method="POST">
        <input type="text" name="search" placeholder="Tìm kiếm sản phẩm">
        <button name="btnSearch" type="submit">Tìm kiếm</button>
    </form>
</div>

<?php
    if (isset($_POST['btnSearch'])) {
        // viết truy vấn vào cơ sở dữ liệu , hiển thị kết quả tìm kiếm
        $search = $_POST['search'];
        $query = "SELECT * FROM products WHERE name LIKE '%$search%'";
        $result = mysqli_query($conn, $query);
    }
?>

<div class="products-container text-center">
    <div class="products-grid flex wrap mt-10">
        <?php if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="search-result text-center p-10 m-10 border-radius-10">
                <a href="?action=productDetail&id=<?php echo $row['product_id']; ?>"><img src="<?php $row['image_url'] = str_replace('../..', 'admin', $row['image_url']); echo $row['image_url']; ?>"></a>
                <a href="?action=productDetail&id=<?php echo $row['product_id']; ?>"><p class="product-name f-14"><?php echo $row['name']; ?></p></a>
                <p class="product-price f-16"><?php echo number_format($row['price'], 0, ',', '.') . "₫"; ?></p>
            </div>
            <?php } ?>
        <?php } else { ?>
            <p>Không tìm thấy sản phẩm nào.</p>
        <?php } ?>
    </div>
</div>