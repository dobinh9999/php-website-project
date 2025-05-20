<h2 style="text-align: center;">Thêm Danh Mục Sản Phẩm</h2>
    <table border="1">
        <form method="POST" action="modules/manage-category/handle.php">
            <tr>
                <td>Mã danh mục</td>
                <td><input type="text" name="category-id" required></td>
            </tr>
            <tr>
                <td>Tên danh mục</td>
                <td><input type="text" name="category-name" required></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="add_category" value="Thêm danh mục sản phẩm"></td>
            </tr>
        </form>
    </table>