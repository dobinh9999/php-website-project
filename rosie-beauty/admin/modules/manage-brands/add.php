<form action="modules/manage-brands/handle.php" method="POST" enctype="multipart/form-data">
    <table>
        <tr>
            <td colspan="2"><center><h3>Thêm thương hiệu sản phẩm</h3></center></td>
        </tr>
        <tr>
            <td>Tên thương hiệu</td>
            <td><input type="text" name="brand-name"></td>
        </tr>
        <tr>
            <td>Logo</td>
            <td><input type="file" name="brand-logo"></td>
        </tr>
        <tr>
            <td>Thao tác</td>
            <td>
                <input type="submit" name = "add_brand" value = "Thêm">
                <input type="reset" name = "btnHuy" value = "Hủy">
            </td>
        </tr>
    </table>
</form>
