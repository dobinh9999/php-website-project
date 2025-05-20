<?php
    include "../../config/database.php";
    session_start();
    if (isset($_POST['btnAdd'])) {
        $product_id = intval($_SESSION['product_id']);
        $user_id = intval($_SESSION['user_id']);
        $quantity = intval($_POST['quantity-input']);

        // Kiểm tra xem user_id đã tồn tại trong bảng orders chưa
        $stmt = $conn->prepare("SELECT order_id FROM orders WHERE user_id = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $stmt->bind_result($order_id);
        $stmt->fetch();
        $stmt->close();

        if ($order_id) {
            // Nếu tồn tại, chèn vào bảng order_detail
            $stmt = $conn->prepare("INSERT INTO order_detail (order_id, product_id, quantity, create_at) VALUES (?, ?, ?, NOW())");
            $stmt->bind_param("iii", $order_id, $product_id, $quantity);
            $_SESSION['order_id'] = $order_id;
        } else {
            // Nếu không tồn tại, chèn vào bảng orders trước
            $stmt = $conn->prepare("INSERT INTO orders (user_id) VALUES (?)");
            $stmt->bind_param("i", $user_id);
            if ($stmt->execute()) {
                $order_id = $stmt->insert_id; // Lấy order_id vừa chèn
                // Chèn vào bảng order_detail
                $stmt = $conn->prepare("INSERT INTO order_detail (order_id, product_id, quantity, create_at) VALUES (?, ?, ?, NOW())");
                $stmt->bind_param("iii", $order_id, $product_id, $quantity);
                $_SESSION['order_id'] = $order_id;
            } else {
                echo "Lỗi khi thêm đơn hàng: " . $stmt->error;
            }
        }

        if ($stmt->execute()) {
            header("Location: ../../?action=productDetail&id=" . $product_id);
        } else {
            echo "Lỗi khi thêm sản phẩm vào giỏ hàng: " . $stmt->error;
        }

        $stmt->close();
    }else if (isset($_POST['btnDelete'])) {
        $order_id = $_SESSION['order_id'];
        $product_id = $_POST['btnDelete'];

        //Xóa các bản ghi trong bảng order_detail trước
        $stmt = $conn->prepare("DELETE FROM order_detail WHERE order_id = ? and product_id = ?");
        if ($stmt === false) {
            die("Lỗi chuẩn bị câu lệnh: " . $conn->error);
        }
        $stmt->bind_param("ii", $order_id, $product_id);
        if (!$stmt->execute()) {
            echo "Lỗi khi xóa chi tiết đơn hàng: " . $stmt->error;
        }else{
            header("Location: ../../?action=cart");
        }
        $stmt->close();
    }else if (isset($_POST['btnCheckout'])) {
        $product_ids = $_POST['product_id'];
        
        // Lưu danh sách product_id vào session để sử dụng trong trang checkout
        $_SESSION['selected_products'] = $product_ids;

        header("Location: ../../?action=checkout");
    }
?>