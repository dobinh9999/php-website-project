<style>
    form {
    max-width: 500px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 8px;
    background-color: #f9f9f9;
}

h3 {
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
.form-group textarea {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

.form-group input[type="submit"],
.form-group input[type="reset"] {
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-right: 10px;
}

.form-group input[type="submit"] {
    background-color: #4CAF50;
    color: white;
}

.form-group input[type="reset"] {
    background-color: #f44336;
    color: white;
}

</style>

<form action="modules/manage-blogs/handle.php" method="POST" enctype="multipart/form-data">
    <h3 style="text-align: center;">Thêm bài viết</h3>

    <div class="form-group">
        <label for="blog-name">Tiêu đề</label>
        <input type="text" id="blog-name" name="blog-name" placeholder="Nhập tiêu đề...">
    </div>

    <div class="form-group">
        <label for="blog-content">Nội dung</label>
        <textarea id="blog-content" name="blog-content" rows="4" placeholder="Nhập nội dung..."></textarea>
    </div>

    <div class="form-group">
        <label for="blog-image">Ảnh</label>
        <input type="file" id="blog-image" name="blog-image">
    </div>

    <div class="form-group">
        <input type="submit" name="add_blog" value="Thêm">
        <input type="reset" name="btnHuy" value="Hủy">
    </div>
</form>
