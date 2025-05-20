<?php
    include "../../../config/database.php";

    $brand_name = $_POST["brand-name"];

    function handleFileUpload( $action){
        $upload_dir = '../../uploads/';
        if (!is_dir($upload_dir)) {
            echo "Không tồn tại thư mục uploads";
            exit();
        }else{
            if (isset($_FILES['brand-logo'])) {
                $tmp_file = $_FILES['brand-logo']['tmp_name'];
                $new_filename = basename($_FILES['brand-logo']['name']);
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

    if(isset($_POST['add_brand']) && ($_POST['add_brand'])){
        $upload_file = handleFileUpload( "add");
        
        $stmt = $conn->prepare("INSERT INTO brands (name, logo_url) VALUES (?, ?)");
        if ($stmt === false) {
            die('Chuẩn bị câu lệnh thất bại: ' . $conn->error);
        }

        $stmt->bind_param("ss", $brand_name, $upload_file);

        if ($stmt->execute()) {
            header("Location: ../../index_admin.php?action=manage-brands&query=add");
            exit();
        } else {
            echo "Lỗi khi insert dữ liệu: " . $stmt->error;
        }

        $stmt->close();
    }else if(isset($_POST['update_brand'])){
        $upload_file = handleFileUpload( 'update');

        $stmt = $conn->prepare("UPDATE brands SET name = ?, logo_url = ? WHERE brand_id = ?");
        if ($stmt === false) {
            die('Chuẩn bị câu lệnh thất bại: ' . $conn->error);
        }

        $stmt->bind_param("ssi", $brand_name, $upload_file, $_GET['brand_id']);

        if ($stmt->execute()) {
            header("Location: ../../index_admin.php?action=manage-brands&query=add");
            exit();
        } else {
            echo "Lỗi khi insert dữ liệu: " . $stmt->error;
        }

        $stmt->close();
    }else{
        $id = $_GET['brand_id'];
        $stmt = $conn->prepare("DELETE FROM brands WHERE brand_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
        header('Location: ../../index_admin.php?action=manage-brands&query=add');
    }
    mysqli_close($conn);
?>