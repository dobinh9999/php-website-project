<!-- thiết kế cho tôi 1 filter option select với các danh mục sản phẩm -->
<style>
    /* Toàn bộ container chính */
    .main-products {
        display: flex;
        max-width: 1200px;
        margin: 20px auto;
        gap: 20px;
    }

    /* Menu bên trái */
    .left-menu {
        flex: 1; /* Chiếm 1 phần nhỏ */
        max-width: 250px;
        background-color: #f8f9fa;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .left-menu form {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .left-menu select,
    .left-menu button {
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 16px;
    }

    .left-menu button {
        background-color: #007bff;
        color: white;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .left-menu button:hover {
        background-color: #0056b3;
    }

    /* Nội dung hiển thị sản phẩm */
    .content {
        flex: 3; /* Chiếm phần lớn không gian */
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    /* Container tổng cho sản phẩm */
    .products-container {
        text-align: center;
    }

    /* Grid hiển thị sản phẩm */
    .products-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); /* Tự động co giãn */
        gap: 20px;
    }

    /* Card sản phẩm */
    .search-result {
        padding: 15px;
        border: 1px solid #eee;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .search-result:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    }

    /* Hình ảnh sản phẩm */
    .search-result img {
        width: 100%;
        height: 150px;
        object-fit: cover;
        border-radius: 8px;
        margin-bottom: 10px;
    }

    /* Tên sản phẩm */
    .product-name {
        font-size: 16px;
        font-weight: 600;
        color: #007bff;
        margin-bottom: 5px;
        text-decoration: none;
    }

    .product-name:hover {
        text-decoration: underline;
    }

    /* Giá sản phẩm */
    .product-price {
        font-size: 18px;
        font-weight: bold;
        color: #28a745;
    }
</style>


<div class="main-products">
    <div class="left-menu">
        <form action="?action=products" method="post">
            <select name="category" id="category">
                <!-- <option value="<?php echo $category; ?>"><?php echo $category; ?></option> -->
                <option value="" disabled selected>Chọn danh mục</option>
                <option value="Kem dưỡng da">Kem dưỡng da</option>
                <option value="Sữa rửa mặt">Sữa rửa mặt</option>
                <option value="Dầu gội">Dầu gội</option>
                <option value="Sữa tắm">Sữa tắm</option>
            </select>
                <button name="btnFilter" type="submit">Lọc</button>
        </form>
    </div>
    <div class="content">
        <?php
            if(isset($_GET['category'])){
                $category = $_GET['category'];
            }else if(isset($_POST['btnFilter'])){
                $category = $_POST['category'];
            }else{
                $category = "";
            }

            echo $category;

            $limit = 6; 
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Lấy số trang từ URL
            $offset = ($page - 1) * $limit; // Tính toán offset

            // Truy vấn để lấy tổng số đơn hàng
            $total_query = "SELECT COUNT(*) FROM products";
            $total_result = mysqli_query($conn, $total_query);
            $total_rows = mysqli_fetch_array($total_result)[0];
            $total_pages = ceil($total_rows / $limit); // Tính tổng số trang

            if($category != ""){
                // Truy vấn để lấy tổng số đơn hàng
                $total_query = "SELECT COUNT(*) FROM products p JOIN product_detail pd ON p.product_id = pd.product_id WHERE p.name LIKE '%$category%'";
                $total_result = mysqli_query($conn, $total_query);
                $total_rows = mysqli_fetch_array($total_result)[0];
                $total_pages = ceil($total_rows / $limit); // Tính tổng số trang
                // cột price nằm trong bảng product_detail , hãy join với bảng product_detail để lấy ra price
                $query = "SELECT * FROM products p JOIN product_detail pd ON p.product_id = pd.product_id WHERE p.name LIKE '%$category%' LIMIT $limit OFFSET $offset";
                $result = mysqli_query($conn, $query);
                // Hiển thị phân trang
                for ($i = 1; $i <= $total_pages; $i++) {
                    echo '<a href="?action=products&category=' . $category . '&page=' . $i . '">' . $i . '</a> ';
                }
            }else{
                $query = "SELECT * FROM products p JOIN product_detail pd ON p.product_id = pd.product_id LIMIT $limit OFFSET $offset";
                $result = mysqli_query($conn, $query);
                // Hiển thị phân trang
                for ($i = 1; $i <= $total_pages; $i++) {
                    echo '<a href="?action=products&page=' . $i . '">' . $i . '</a> ';
                }
            }
        ?>
        <div class="products-container text-center"> 
            <div class="products-grid flex wrap mt-10">
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <div class="search-result text-center p-10 m-10 border-radius-10">
                        <a href="?action=productDetail&id=<?php echo $row['product_id']; ?>"><img src="<?php $row['image_url'] = str_replace('../..', 'admin', $row['image_url']); echo $row['image_url']; ?>"></a>
                        <a href="?action=productDetail&id=<?php echo $row['product_id']; ?>"><p class="product-name f-14"><?php echo $row['name']; ?></p></a>
                        <p class="product-price f-16"><?php echo number_format($row['price'], 0, ',', '.') . "₫"; ?></p>
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php
            
        ?>
    </div>
</div>



