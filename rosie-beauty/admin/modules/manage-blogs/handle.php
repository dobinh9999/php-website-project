<?php
    include "../../../config/database.php";

    $blog_name = $_POST["blog-name"];
    $blog_content = $_POST["blog-content"];

    function handleFileUpload( $action){
        $upload_dir = '../../uploads/';
        if (!is_dir($upload_dir)) {
            echo "Không tồn tại thư mục uploads";
            exit();
        }else{
            if (isset($_FILES['blog-image'])) {
                $tmp_file = $_FILES['blog-image']['tmp_name'];
                $new_filename = basename($_FILES['blog-image']['name']);
                $upload_file = $upload_dir . $new_filename;
    
                if (move_uploaded_file($tmp_file, $upload_file)) {
                    echo "File đã được upload thành công!";
                } else {
                    echo "Có lỗi xảy ra khi upload file!";
                    exit();
                }

                return $upload_file;
            } else {
                echo "Không có file nào được upload.";
                exit(); 
            }
        }
    }

    if(isset($_POST['add_blog']) && ($_POST['add_blog'])){
        $upload_file = handleFileUpload( "add");
        
        $stmt = $conn->prepare("INSERT INTO blogs (title, content, img_url) VALUES (?, ?, ?)");
        if ($stmt === false) {
            die('Chuẩn bị câu lệnh thất bại: ' . $conn->error);
        }

        $stmt->bind_param("sss", $blog_name, $blog_content, $upload_file);

        if ($stmt->execute()) {
            header("Location: ../../index_admin.php?action=manage-blogs&query=add");
            exit();
        } else {
            echo "Lỗi khi insert dữ liệu: " . $stmt->error;
        }

        $stmt->close();
    }else if(isset($_POST['update_blog'])){
        $stmt = $conn->prepare("UPDATE blogs SET title = ?, content = ? WHERE blog_id = ?");

        $stmt->bind_param("ssi", $blog_name, $blog_content, $_GET['blog_id']);

        if ($stmt->execute()) {
            header("Location: ../../index_admin.php?action=manage-blogs&query=add");
            exit();
        } else {
            echo "Lỗi khi insert dữ liệu: " . $stmt->error;
        }

        $stmt->close();
    }else{
        $id = $_GET['blog_id'];
        $stmt = $conn->prepare("DELETE FROM blogs WHERE blog_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
        header('Location: ../../index_admin.php?action=manage-blogs&query=add');
    }
    mysqli_close($conn);
?>