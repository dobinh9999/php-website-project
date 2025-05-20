<?php
    include "../../../config/database.php";

    $product_id = $_POST["product-id"];
    $description = $_POST["description"];
    $stock_quantity = $_POST["stock_quantity"];
    $price = $_POST["price"];

    if(isset($_POST['add_detail']) && ($_POST['add_detail'])){
        
        $stmt = $conn->prepare("INSERT INTO product_detail (product_id, description, stock_quantity, price) VALUES (?, ?, ?, ?)");
        if ($stmt === false) {
            die('Chuẩn bị câu lệnh thất bại: ' . $conn->error);
        }

        $stmt->bind_param("isii", $product_id, $description, $stock_quantity, $price);

        if ($stmt->execute()) {
            header("Location: ../../index_admin.php?action=manage-products&query=list");
            exit();
        } else {
            echo "Lỗi khi insert dữ liệu: " . $stmt->error;
        }

        $stmt->close();
    }else if(isset($_POST['update_detail'])){

        $stmt = $conn->prepare("UPDATE product_detail SET description = ?, stock_quantity = ?, price = ? WHERE detail_id = ?");
        if ($stmt === false) {
            die('Chuẩn bị câu lệnh thất bại: ' . $conn->error);
        }

        $stmt->bind_param("siii", $description, $stock_quantity, $price, $_GET['detail_id']);

        if ($stmt->execute()) {
            header("Location: ../../index_admin.php?action=manage-products&query=add");
            exit();
        } else {
            echo "Lỗi khi insert dữ liệu: " . $stmt->error;
        }

        $stmt->close();
    }else{
        // đây là trường hợp xóa mô tả sản phẩm
        // nhưng sẽ không thực hiện xóa cứng như này
        // mà tôi sẽ sử dụng on_update_delete để tự động xóa
        // vì có liên kết với bảng product 
        //nên khi xóa sản phẩm này thì chi tiết sản phẩm cũng sẽ xóa theo 
    }
    mysqli_close($conn);
?>