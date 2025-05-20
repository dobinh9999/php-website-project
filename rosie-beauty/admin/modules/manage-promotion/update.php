<?php
    $query = "SELECT * FROM blogs where blog_id = '$_GET[blog_id]' LIMIT 1";
    $row_alter_blogs = mysqli_query($conn, $query);
?>

<p>Sua bai viet</p>
<table border="1" width = "50%" style="border-collapse: collapse;">
    <form method="POST" action="modules/manage-blogs/handle.php?blog_id=<?php echo $_GET['blog_id']; ?>">
        <?php
            while($row = mysqli_fetch_array($row_alter_blogs)){
                echo '
                    <tr>
                        <td>Tiêu đề</td>
                        <td><input type="text" value = "'.$row['title'].'" name="blog-name"></td>
                        <td>Nội dung</td>
                        <td><textarea id="blog-content" name="blog-content" rows="4" placeholder="Nhập nội dung...">'.$row['content'].'</textarea></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" name="update_blog" value="Sửa bài viết"></td>
                    </tr>';
        }
        ?>
    </form>
</table>