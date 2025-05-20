<style>
    form {
    max-width: 500px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 8px;
    background-color: #f9f9f9;
}

p {
    text-align: center;
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

.form-group input[type="text"],
.form-group select {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

.form-group input[type="submit"] {
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    background-color: #4CAF50;
    color: white;
    cursor: pointer;
    width: 100%;
    font-size: 16px;
}
</style>

<?php
    $query = "SELECT * FROM products where product_id = '$_GET[product_id]' LIMIT 1";
    $row_alter_products = mysqli_query($conn, $query);

    $query = "SELECT * FROM categories";
    $row_alter_categories = mysqli_query($conn, $query);
?>

<p>Sửa sản phẩm</p>
<form method="POST" action="modules/manage-products/handle.php?product_id=<?php echo $_GET['product_id']; ?>">
    <?php while ($row = mysqli_fetch_array($row_alter_products)) { ?>
        <div class="form-group">
            <label for="product-name">Tên sản phẩm</label>
            <input type="text" id="product-name" name="product-name" value="<?php echo htmlspecialchars($row['name']); ?>">
        </div>

        <div class="form-group">
            <label for="product-category">Danh mục</label>
            <select id="product-category" name="product-category">
                <?php
                    while ($category = mysqli_fetch_array($row_alter_categories)) {
                        $selected = ($category['category_id'] == $row['category_id']) ? 'selected' : '';
                        echo '<option value="' . $category['category_id'] . '" ' . $selected . '>' . htmlspecialchars($category['name']) . '</option>';
                    }
                ?>
            </select>
        </div>

        <div class="form-group">
            <input type="submit" name="update_brand" value="Sửa thương hiệu sản phẩm">
        </div>
    <?php } ?>
</form>