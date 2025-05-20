<?php
    include "../../../config/database.php";

    $product_name = $_POST["product-name"];
    $product_category = $_POST["product-category"];

    function handleFileUpload( $action){
        $upload_dir = '../../uploads/';
        if (!is_dir($upload_dir)) {
            echo "Không tồn tại thư mục uploads";
            exit();
        }else{
            if (isset($_FILES['product-image'])) {
                $tmp_file = $_FILES['product-image']['tmp_name'];
                $new_filename = basename($_FILES['product-image']['name']);
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

    if(isset($_POST['add_product']) && ($_POST['add_product'])){
        $upload_file = handleFileUpload( "add");

        $category_id= intval($product_category);
        
        $stmt = $conn->prepare("INSERT INTO products (name, category_id, image_url) VALUES (?, ?, ?)");
        $stmt->bind_param("sis", $product_name, $category_id, $upload_file);
        
        if ($stmt->execute()) {
            // Lấy product_id vừa insert
            $product_id = $conn->insert_id;
            header("Location: ../../index_admin.php?action=manage-product-detail&query=add&product_id=".$product_id);
            exit();
        } else {
            echo "Lỗi khi insert dữ liệu: " . $stmt->error;
        }

        $stmt->close();
    }else if(isset($_POST['update_brand'])){
        $stmt = $conn->prepare("UPDATE products SET name = ?, category_id = ? WHERE product_id = ?");
        if ($stmt === false) {
            die('Chuẩn bị câu lệnh thất bại: ' . $conn->error);
        }

        $stmt->bind_param("ssi", $product_name, $product_category, $_GET['product_id']);

        if ($stmt->execute()) {
            header("Location: ../../index_admin.php?action=manage-products&query=add");
            exit();
        } else {
            echo "Lỗi khi insert dữ liệu: " . $stmt->error;
        }

        $stmt->close();
    }else{
        $id = $_GET['product_id'];  
        $stmt = $conn->prepare("DELETE FROM products WHERE product_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
        header('Location: ../../index_admin.php?action=manage-products&query=add');
    }
    mysqli_close($conn);
?>